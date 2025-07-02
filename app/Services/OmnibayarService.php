<?php

namespace App\Services;

use App\Enums\OmnibayarEnums;
use App\Models\M_Base;
use Exception;

class OmnibayarService
{
  private $M_Base;
  private $timestamp;

  public function __construct()
  {
    $this->M_Base = new M_Base();
    $this->timestamp = date('c');
  }

  private function get_token(string $key, string $secret){
      $url = OmnibayarEnums::URL_DEV . 'auth/generate-token';
      $token = null;

      $headers = [
          "x-api-key: $key",
          "secret-token: $secret"
      ];

      $curl = curl_init();

      curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POST => true,
          CURLOPT_HTTPHEADER => $headers
      ]);

      $jsonResponse = curl_exec($curl);
      $response = json_decode($jsonResponse, true);

      if (curl_errno($curl)) {
          echo 'Error: ' . curl_error($curl);
          return null;
      } 
      if($response['status'] != 'success'){
          echo 'Error: ' . $response['message'];
          return null;

      }
      curl_close($curl);

      $token = $response['data']['token'];
      return $token;
  }

  public function generate_qris($body){
      $url = OmnibayarEnums::URL_DEV . 'payment/generate-qris';
      $clientSecret = $this->M_Base->u_get('omnibayar-secret');
      $clientKey = $this->M_Base->u_get('omnibayar-key');

      $token = $this->get_token($clientKey, $clientSecret);
      $requestData = [
          "no_transaction"   => $body['transaction_id'], # TPP0123XXX
          "amount"           => $body['price'],
          "payment_channel"  => "qris",
          "email"            => $body['email'] ?? '',
          "fullname"         => $body['fullname'] ?? '',
          "phone_number"     => $body['phone_number'] ?? ''
      ];

      // Setup CURL
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
          "x-api-key: $clientKey",
          "Authorization: Bearer $token"
      ]);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));

      $response = curl_exec($ch);
      curl_close($ch);

      return $response;
  }

  public function payment_qris($body_raw, $headers)
  {
      $body = json_decode($body_raw);

      $status_callback = $body->status ?? null;
      $refNo = $body->paymentNo ?? null;

      $payment_amount = 0;
      $payment_type = '';

      $order = $this->M_Base->data_where('orders', 'order_id', $refNo);
      if (empty($order)){
          // if not found in orders table then is topup
          $order = $this->M_Base->data_where('topup', 'topup_id', $refNo); 
          $payment_type = 'Topup';
          $payment_amount = $order[0]['amount'] ?? 0;
      } else{
          $payment_type = 'Order';
          $payment_amount = $order[0]['price'] ?? 0;
      }

      if(empty($order) || $payment_amount == 0){
          throw new Exception("Order not found!");
      }

      $callback_id = 'CLB'.date('Ymd') . rand(0000,9999);
      $callback_data = [
          'callback_id'                   => $callback_id,
          'payment_gateway'               => 'Ayolinx',
          'payment_type'                  => $payment_type,
          'payment_amount'                => $payment_amount,
          'status'                        => $status_callback,
          'partner_reference_no'          => $body->paymentNo ?? null, // nomor kita
          // 'original_reference_no'         => $body->originalReferenceNo ?? null, // nomor ayolink (PG)
          // 'original_partner_reference_no' => $body->originalPartnerReferenceNo ?? null, // nomor dana (merchant)
          'date_create'                   => date('Y-m-d G:i:s'),
          'request_body'                  => $body_raw,
      ];

      $this->M_Base->data_insert('callback', $callback_data);

      $check_order = null;
      $check_order_where['status'] = 'Success';
      $check_order_where[strtolower($payment_type).'_id'] = $refNo;
      if ($payment_type == 'Topup') {
          $check_order = $this->M_Base->data_where_2('topup', $check_order_where);
      }elseif($payment_type == 'Order'){
          $check_order = $this->M_Base->data_where_2('orders', $check_order_where);
      }

      if (!empty($check_order)) {
          throw new Exception("Order not found!");
      }

      header('Content-Type: application/json');
      if ($status_callback == 'SUCCESS') {
          if ($payment_type == 'Topup') {
              $user = $this->M_Base->data_where('users', 'username', $order[0]['username']); 
              $balance = $user[0]['balance'] ?? 0;
              $new_balance = $balance + $payment_amount;

              $this->M_Base->data_update('users', [
                  'balance' => $new_balance
              ], $user[0]['id']);

              $this->M_Base->data_update('topup', [
                  'status' => 'Success'
              ], $order[0]['id']);
          }else{
              $user = $this->M_Base->data_where('users', 'username', $order[0]['username']) ?? null; 
              if ($order[0]['method_code'] == 'Balance' && !empty($user)) {
                  $balance = $user[0]['balance'] ?? 0;
                  $new_balance = $balance - $payment_amount;

                  $this->M_Base->data_update('users', [
                      'balance' => $new_balance
                  ], $user[0]['id']);
              }

              $this->updateOrder($status_callback, $order[0]['order_id']);
          }

          return ['status' => 'success', 'responseMessage' => 'Process completed successfully'];
      }else{
          if ($payment_type == 'Topup') {
              $this->M_Base->data_update('topup', [
                  'status' => 'Canceled'
              ], $order[0]['id']);
          }else{
              $this->M_Base->data_update('orders', [
                  'status' => 'Canceled'
              ], $order[0]['id']);

          }
      }

      return ['status' => 'success', 'responseMessage' => 'Process completed successfully'];
  }

  private function updateOrder($status_callback, $order_id){
      if ($status_callback === 'SUCCESS') {
          $orders = $this->M_Base->data_where_array('orders', [
              'order_id' => $order_id,
              'status' => 'Pending'
          ]);

          if (count($orders) === 1) {

              $status = 'Processing';

              $product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
              $trx = $order_id;

              if (count($product) === 1) {

                  switch ($orders[0]['provider']) {
                  case 'DF':
                  case 'LG':
                  case 'BJ':
                  case 'TV':
                      $this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
                      break;
                  case 'VR':
                  case 'PVR':
                  case 'BM':
                  case 'PBM':
                  case 'AG':
                  case 'Manual':
                      $this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
                      break;
                  default:
                      $ket = 'Provider tidak ditemukan';
                  }

              } else {
                  $ket = 'Produk tidak ditemukan';
              }

              $this->M_Base->data_update('orders', [
                  'status' => $status,
                  'ket' => $ket,
                  'trx_id' => $trx,
              ], $orders[0]['id']);

          } 
      }
  }

  private function processOrder($provider, $product, $userid, $zoneid, $orderid, $wacust, $method, &$status, &$ket, &$trx)
  {

      if (!empty($zoneid) and $zoneid != 1) {
          $customer_no = $userid . $zoneid;
      } else {
          $customer_no = $userid;
      }

      if ($provider == 'DF') {

          $result = $this->M_Base->df_order($product, $customer_no, $orderid);

          if (isset($result['data'])) {
              if ($result['data']['status'] == 'Gagal') {
                  $ket = $result['data']['message'];
              } else {
                  $ket = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
              }
          } else {
              $ket = 'Failed Order';
          }

      } else if ($provider == 'AG') {

          $result = $this->M_Base->ag_v1_order($product, $customer_no, $orderid);

          if ($result['status'] == 0) {
              $ket = $result['error_msg'];
          } else {

              if ($result['data']['status'] == 'Sukses') {
                  $status = 'Success';
                  $this->M_Base->wapisender_sukses($wacust, $product, $orderid, $method);
              }

              $ket = $result['data']['sn'];
          }

      } else if ($provider == 'Manual') {
          $status = 'Processing';
          $ket = 'Pesanan siap diproses';

      } else {
          $ket = 'Provider tidak ditemukan';
      }

  }
}
