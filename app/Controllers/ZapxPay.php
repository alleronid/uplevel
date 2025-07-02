<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Enums\ZapxPayEnums;

class ZapxPay extends BaseController
{
  public function paymentCallback()
  {
    $bodyRaw = file_get_contents('php://input');
    $body = json_decode($bodyRaw);
    $refNo = $this->request->getGet('refno') ?? null;
    $headers = $this->request->getHeaders();
    
    insert_log($bodyRaw, json_encode(getallheaders()), 'callback_zapxpay.log');
    
    $status_callback = $body->orderStatus;

    if($refNo == null || $status_callback == null) {
      $refNo = $body->mchOrderNo;
      $status_callback = $body->orderStatus == 2 ? "SUCCESS" : "FAILED";
    }

    $payment_amount = 0;
    $payment_type = '';

    $order = $this->M_Base->data_where('orders', 'order_id', $refNo);

    if(empty($order)){
      $order = $this->M_Base->data_where('topup', 'topup_id', $refNo); 
      $payment_type = 'Topup';
      $payment_amount = $order[0]['amount'] ?? 0;
    }else{
      $payment_type = 'Order';
      $payment_amount = $order[0]['price'] ?? 0;
    }

    if(empty($order) || $payment_amount == 0){
    return $this->response->setJSON(['status' => 'SUCCESS']);
    }

    $callback_id = 'CLB'.date('Ymd') . rand(0000,9999);
    $callback_data = [
        'callback_id'                   => $callback_id,
        'payment_gateway'               => 'ZapxPay',
        'payment_type'                  => $payment_type,
        'payment_amount'                => $payment_amount,
        'status'                        => $status_callback,
        'partner_reference_no'          => $body->orderNo ?? null, // nomor kita
        'original_reference_no'         => $body->nonceStr ?? null, // nomor ayolink (PG)
        'original_partner_reference_no' => $body->mchOrderNo ?? null, // nomor dana (merchant)
        'date_create'                   => date('Y-m-d G:i:s'),
        'request_body'                  => $bodyRaw,
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
        return $this->response->setJSON(['status' => 'SUCCESS']);
    }

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

      return $this->response->setJSON(['status' => 'SUCCESS']);
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

    return $this->response->setJSON(['status' => 'SUCCESS']);
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