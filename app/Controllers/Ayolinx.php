<?php

namespace App\Controllers;

use App\Enums\AyolinxEnums;
use Exception;

class Ayolinx extends BaseController
{

  private $timestamp;

  public function __construct() {
    $this->timestamp = date('c');
  }
  
  // public function create_private(){
  //   $config = [
  //     "private_key_bits" => 2048,
  //     "private_key_type" => OPENSSL_KEYTYPE_RSA,
  //   ];
    
  //   $resource = openssl_pkey_new($config);
  //   openssl_pkey_export($resource, $privateKey);
    
  //   file_put_contents('private_key.pem', $privateKey);
  // }

  public function signature()
  {
    $clientKey = $this->M_Base->u_get('ayolinx-key');
    $requestTimestamp = $this->timestamp;
    $string_to_sign = $clientKey . '|' . $requestTimestamp;
    $private_key = file_get_contents('../keys/private_key.pem');

    try {
      openssl_sign($string_to_sign, $signature, $private_key, OPENSSL_ALGO_SHA256);
    } catch (Exception $e) {
      echo $e;
    }
    $base64_signature = base64_encode($signature);
    return $base64_signature;
  }

  public function api($url ,$headers= [], $post =[]){
    $timestamp = $this->timestamp;
		$ch = curl_init();
		$defaultHeaders = array(
			'Content-Type: application/json',
      'X-TIMESTAMP: ' . $timestamp,
		);

    $headers = array_merge($defaultHeaders, $headers);
    $baseUrl =  "https://sandbox.ayolinx.id".$url;

		curl_setopt($ch, CURLOPT_URL, $baseUrl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post, JSON_UNESCAPED_SLASHES));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 0);

		return curl_exec($ch);
	}

  public function get_token() {
   try{
    $client_key = $this->M_Base->u_get('ayolinx-key');
    $signature = $this->signature();
    $header = ['X-CLIENT-KEY: ' . $client_key,
      'X-SIGNATURE: ' . $signature];
    $response = $this->api('/v1.0/access-token/b2b', $header);
    $result = json_decode($response, true);
    $accessToken = $result["accessToken"] ?? null;
    return $accessToken;
   }catch(\Exception $e){
    return json_encode(['error' => $e]);
   }
  }

  public function base_interface($signature, $timestamp, $token, $url, $post){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://sandbox.ayolinx.id'.$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>json_encode($post),
      CURLOPT_HTTPHEADER => array(
          'X-TIMESTAMP: '. $timestamp,
          'X-SIGNATURE:'. $signature,
          'X-PARTNER-ID: CKSandbox-90083f51-98e0-4425-bc7b-776a2eeb5fb7',
          'X-EXTERNAL-ID:'. $this->randomNumber() ,
          'Authorization: Bearer '. $token,
          'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }

  public function generateQris($data = []){
    $timestamp = date('c');
    $method = 'POST';
    $urlSignature = "/v1.0/qr/qr-mpm-generate";
    $token = $this->get_token();
    $client_secret = 'SKSandbox-c2382b29-2395-4002-9ac5-fee6a6bdc52e';
    $body = $data;
    $hash = hash('sha256', json_encode($body));
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));

    $response = $this->base_interface($signature, $timestamp, $token, $urlSignature, $body);
    return $response;
  }

  public function walletDana(){
    $timestamp = date('c');
    $method = 'POST';
    $urlSignature = '/direct-debit/core/v1/debit/payment-host-to-host';
    $client_secret = 'SKSandbox-c2382b29-2395-4002-9ac5-fee6a6bdc52e';

    $token = $this->get_token();
    $body = [
        "partnerReferenceNo" => "fd3f5af0-af57-4513-95a8-77df45721edw",
        "validUpTo" => "1746249942",
        "amount" => [
            "currency" => "IDR",
            "value" => "30.00"
        ],
        "urlParams" => [
            [
                "type" => "PAY_RETURN",
                "url" => "https://dev-payment.ayolinx.id/status?h=f13ce04d-34c5-4a03-ac46-d608cab468a2"
            ],
            [
                "type" => "NOTIFICATION",
                "url" => "https://dev-payment.ayolinx.id/status?h=f13ce04d-34c5-4a03-ac46-d608cab468a2"
            ]
        ],
        "additionalInfo" => [
            "channel" => AyolinxEnums::EWALLET
        ]
    ];

    $hash = hash('sha256',json_encode($body));
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));

    $response = $this->base_interface($signature, $timestamp, $token, $urlSignature, $body);
    $ret = json_decode($response, true);
    echo "<br>";

    if (isset($ret) && $ret['responseCode'] === AyolinxEnums::SUCCESS_DANA) {
        $webRedirect = $ret['webRedirectUrl'];
        echo "Redirect URL: " . $webRedirect;
    } else {
        echo "webRedirectUrl not found in response."; 
    }
    return $ret;
  }

  public function createVA(){
    $method = 'POST';
    $url = '/direct-debit/core/v1/debit/payment-host-to-host';
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $tokenAccess = $this->get_token();

    $body = '{"partnerServiceId":AyolinxEnums::BNI_SB,"customerNo":"30000000000000000001","virtualAccountNo":"4339382374532139","virtualAccountName":"Customer Name","trxId":"123321123321","virtualAccountTrxType":"C","totalAmount":{"value":"11500.00","currency":"IDR"},"additionalInfo":{"channel":"VIRTUAL_ACCOUNT_BCA"}}';
    $signature = $this->signatureReq($url, $tokenAccess, $body,$method, $client_secret);
      $header = [
        'X-SIGNATURE' => $signature,
        'X-PARTNER-ID' => $this->M_Base->u_get('ayolinx-key'),
        'X-EXTERNAL-ID' => 418075533589,
        'Authorization' => 'Bearer '. $tokenAccess
      ];

      $response = $this->api($url, $header, $body);
      return $response;
  }

  public function generateTest(){
    $timestamp = date('c');
    $method = 'POST';
    $urlSignature = "/v1.0/qr/qr-mpm-generate";
    $token = $this->get_token();
    $client_secret = 'SKSandbox-c2382b29-2395-4002-9ac5-fee6a6bdc52e';
    $body = [  
          "partnerReferenceNo" => "fd3f5af0-af57-4513-95a8-77df45721ed27",
          "amount" => [
              "currency" => "IDR",
              "value" => "100000.00"
          ],
          "additionalInfo" => [
              "channel" => "BNC_QRIS"
          ]
    ];
    $requestBody = '{"partnerReferenceNo":"fd3f5af0-af57-4513-95a8-77df45721ed21","amount":{"currency":"IDR","value":"10001.00"},"additionalInfo":{"channel":"BNC_QRIS"}}'; 
    $hash = hash('sha256', $requestBody);
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://sandbox.ayolinx.id/v1.0/qr/qr-mpm-generate',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "partnerReferenceNo":"fd3f5af0-af57-4513-95a8-77df45721ed21",
        "amount": {
            "currency": "IDR",
            "value":"10001.00"
        },
        "additionalInfo":{
            "channel":"BNC_QRIS"
        }
    }',
      CURLOPT_HTTPHEADER => array(
          'X-TIMESTAMP: '. $this->timestamp,
          'X-SIGNATURE:'. $signature,
          'X-PARTNER-ID: CKSandbox-90083f51-98e0-4425-bc7b-776a2eeb5fb7',
          'X-EXTERNAL-ID:'. $this->randomNumber() ,
          'Authorization: Bearer '. $token,
          'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function generateTestDana(){
    $method = 'POST';
    $urlSignature = "/direct-debit/core/v1/debit/payment-host-to-host";
    $token = $this->get_token();
    $timestamp = date('c');
    $client_secret = 'SKSandbox-c2382b29-2395-4002-9ac5-fee6a6bdc52e';
    $requestBody = '{"partnerReferenceNo":"fd3f5af0-af57-4513-95a8-77df45721edw","validUpTo":"1746249942","amount":{"currency":"IDR","value":"300000.00"},"urlParams":[{"type":"PAY_RETURN","url":"https://dev-payment.ayolinx.id/status?h=f13ce04d-34c5-4a03-ac46-d608cab468a2"},{"type":"NOTIFICATION","url":"https://dev-payment.ayolinx.id/status?h=f13ce04d-34c5-4a03-ac46-d608cab468a2"}],"additionalInfo":{"channel":"EMONEY_DANA_SNAP"}}'; 
    $hash = hash('sha256', $requestBody);
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://sandbox.ayolinx.id/direct-debit/core/v1/debit/payment-host-to-host',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
          "partnerReferenceNo": "fd3f5af0-af57-4513-95a8-77df45721edw",
          "validUpTo": "1746249942",
          "amount": {
              "currency": "IDR",
              "value":"300000.00"
          },
          "urlParams":[
              {
                  "type":"PAY_RETURN",
                  "url":"https://dev-payment.ayolinx.id/status?h=f13ce04d-34c5-4a03-ac46-d608cab468a2"
              },
              {
                  "type":"NOTIFICATION",
                  "url":"https://dev-payment.ayolinx.id/status?h=f13ce04d-34c5-4a03-ac46-d608cab468a2"
              }
          ],
          "additionalInfo":{
              "channel":"EMONEY_DANA_SNAP"
          }
        
      }',
      CURLOPT_HTTPHEADER => array(
          'X-TIMESTAMP: '. $this->timestamp,
          'X-SIGNATURE:'. $signature,
          'X-PARTNER-ID: CKSandbox-90083f51-98e0-4425-bc7b-776a2eeb5fb7',
          'X-EXTERNAL-ID:'. $this->randomNumber() ,
          'Authorization: Bearer '. $token,
          'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function randomNumber(){
    $number = rand(11111111111,99999999999);
    return $number;
  }

  public function generateQriss(){
    $body = [
      "partnerReferenceNo" => '12345678989',
      "amount" => [
          "currency" => "IDR",
          "value" => '13131313'
      ],
      "additionalInfo" => [
          "channel" => AyolinxEnums::QRIS
      ]
    ];
  }

  public function generateAccessToken()
  {
      $timestamp = $_SERVER['HTTP_X_TIMESTAMP'];
      $client_key = $_SERVER['HTTP_X_CLIENT_KEY'];
      $signature = $_SERVER['HTTP_X_SIGNATURE'];
      $body_raw = file_get_contents('php://input');


      $public_key_ayo_path = '../keys/public_key_notify_itg_sand.pem';
      $public_key_ayo = file_get_contents($public_key_ayo_path);
      $clientKey = $this->M_Base->u_get('ayolinx-key');

      // if ($client_key != $clientKey) {
      //     throw new Exception('Unauthorized client key!');
      // }
      //
      // if (empty($signature)) {
      //     throw new Exception('Empty Signature!');
      // }
      //
      // if (!file_exists($public_key_ayo_path)) {
      //     throw new Exception('Internal Server Error, Public Key File Not Exist');
      // }
      // if (empty($public_key_ayo)) {
      //     throw new Exception('Internal Server Error, Public Key Empty');
      // }
      //
      // $data = $client_key.'|'.$timestamp;
      // $sign = base64_decode($signature);
      // $sign_check = openssl_verify($data, $sign, $public_key_ayo, OPENSSL_ALGO_SHA256);
      //
      // if (!$sign_check) {
      //     throw new Exception('Invalid Signature, verify openssl');
      // }

      // Generate token (e99a18c428cb38d5f260853678922e03b20e8f5c5b8a3f0a1b2c3d4e5f6a7b8c9)
      $token_key = 'ayo_token_%s_%s';
      $time_val = microtime(true);
      $token_str = sprintf($token_key, $time_val, uniqid(true));
      $access_token = hash('sha256', $token_str);

      $ret = [
          'responseCode' => AyolinxEnums::SUCCESS_GET_TOKENVA,
          'responseMessage' => 'Successful',
          'accessToken' => $access_token,
          'tokenType' => 'Bearer',
          'expiresIn' => '3600',
      ];

      $json_ret = json_encode($ret, JSON_PRETTY_PRINT);

      $this->logCallback($body_raw, json_encode(getallheaders()), 'get_token_va.log', $json_ret);

      header('Content-Type: application/json');

      return $this->response->setJSON($ret);
  }

  private function verifySignatureCallback($headerSign, $body){
      $public_key_ayo_path = '../keys/public_key_notify_itg_sand.pem';
      $public_key_ayo = file_get_contents($public_key_ayo_path);

      if (!file_exists($public_key_ayo_path)) {
          throw new Exception('Internal Server Error, Public Key File Not Exist');
      }
      if (empty($public_key_ayo)) {
          throw new Exception('Internal Server Error, Public Key Empty');
      }

      $url = "/v1.0/qr/qr-mpm-notify";
      $method = "POST";
      $timestamp = $this->timestamp ?? date("c");
      $hash = hash('sha256', json_encode($body));
      $data = "{$method}:{$url}:{$hash}:{$timestamp}";
      $signature = base64_decode($headerSign);
      $isValidSignature = openssl_verify($data, $signature, $public_key_ayo, OPENSSL_ALGO_SHA256);

      if (!$isValidSignature) {
          throw new Exception('Signature not valid');
      }
  }

  public function paymentCallback(){
      $body_raw = file_get_contents('php://input');
      $body = json_decode($body_raw);
      $refNo = $this->request->getGet('refNo') ?? null;
      $headers = $this->request->getHeaders();
      //$headerSign = $headers['X-Signature']->getValue();

      $this->logCallback($body_raw, json_encode(getallheaders()), 'callback.log');
         $status_callback = $body->transactionStatusDesc ?? null;
       if ($refNo == null || $status_callback == null) {
          $refNo = $body->originalPartnerReferenceNo;
          $statusCallback = $body->latestTransactionStatus === "00" ? 'SUCCESS' : 'FAILED';
       }
    
    
      // verify signature matiin dulu
      // $this->verifySignatureCallback($headerSign, $body_raw);

    
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
          throw new Exception('Order not found!');
      }

      $check_callback = null;

      if (!empty($body->originalPartnerReferenceNo)) {
          $check_callback_where['partner_reference_no'] = $body->originalPartnerReferenceNo;
          $check_callback_where['status'] = 'SUCCESS';
          $check_callback = $this->M_Base->data_where_2('callback', $check_callback_where);
      }

      if (!empty($check_callback)) {
          return $this->response->setJSON(['responseCode' => 2005606, 'responseMessage' => 'Successfully']);
      }

      $check_order = null;

      $check_order_where['status'] = 'Success';
      $check_order_where[strtolower($payment_type).'_id'] = $refNo;
      if ($payment_type == 'Topup') {
          $check_order = $this->M_Base->data_where_2('topup', $check_order_where);
      }elseif($payment_type == 'Order'){
          $check_order = $this->M_Base->data_where_2('orders', $check_order_where);
      }

      if (!empty($check_order)) {
          throw new Exception('Payment order already done success!');
      }
    
      $callback_id = 'CLB'.date('Ymd') . rand(0000,9999);
      $callback_data = [
          'callback_id'                   => $callback_id,
          'payment_gateway'               => 'Ayolinx',
          'payment_type'                  => $payment_type,
          'payment_amount'                => $payment_amount,
          'status'                        => $status_callback,
          'partner_reference_no'          => $body->partnerReferenceNo ?? null, // nomor kita
          'original_reference_no'         => $body->originalReferenceNo ?? null, // nomor ayolink (PG)
          'original_partner_reference_no' => $body->originalPartnerReferenceNo ?? null, // nomor dana (merchant)
          'date_create'                   => date('Y-m-d G:i:s'),
          'request_body'                  => $body_raw,
      ];
    
    //   $this->M_Base->data_insert('callback', $callback_data);

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

              $this->M_Base->data_update('orders', [
                  'status' => 'Success'
              ], $order[0]['id']);
          }

          return $this->response->setJSON(['responseCode' =>AyolinxEnums::SUCCESS_CALLBACKVA, 'responseMessage' => 'Successful']);
      }

      return $this->response->setJSON(['responseCode' => 2005606, 'responseMessage' => 'Successfully']);
  }

  public function paymentVACallback(){
      $body_raw = file_get_contents('php://input');
      $body = json_decode($body_raw);
      $headers = $this->request->getHeaders();

      $this->logCallback($body_raw, json_encode(getallheaders()), 'callbackVA.log');

      // $header_timestamp = $headers['X-TIMESTAMP']->getValue();
      // $header_client_key = $headers['X-CLIENT-KEY']->getValue();
      // $header_signature = $headers['X-SIGNATURE']->getValue();

      // $checkCallback = $this->checkCallbackVA($body);
      // if (!$checkCallback) {
      //     throw new Exception('Failed check token VA callback!');
      // }

      $status_callback = 'SUCCESS';
      $refNo = $body->trxId ?? null;

      if (empty($body->additionalInfo->paymentTimeIso8601)) {
          $status_callback = 'Failed';
          throw new Exception('Invalid Mandatory Field paymentTimeIso8601');
      }

      if (empty($body->paidAmount->value)) {
          $status_callback = 'Failed';
          throw new Exception('Invalid Mandatory Field paidAmount value');
      }

      if (empty($body->additionalInfo->paymentNtb)) {
          $status_callback = 'Failed';
          throw new Exception('Invalid Mandatory Field paymentNtb');
      }

      $payment_amount = 0;
      $payment_type = '';

      if (empty($refNo)) {
          throw new Exception('refNo cannot be null!');
      }

      $order = $this->M_Base->data_where('orders', 'order_id', $refNo);
      if (empty($order)){
          // if not found in orders table then is topup
          $order = $this->M_Base->data_where('topup', 'topup_id', $refNo); 
          $payment_type = 'Topup';
      } else{
          $payment_type = 'Order';
      }
      $payment_amount = $body->paidAmount->value ?? 0;

      if(empty($order) || $payment_amount == 0){
          throw new Exception('Order not found!');
      }

      $check_callback = null;

      if (!empty($body->partnerReferenceNo)) {
          $check_callback_where['partner_reference_no'] = $body->trxId;
          $check_callback_where['status'] = 'SUCCESS';
          $check_callback = $this->M_Base->data_where_2('callback', $check_callback_where);
      }

      if (!empty($check_callback)) {
          throw new Exception('Payment already done success!');
      }

      $check_order = null;

      $check_order_where['status'] = 'Success';
      $check_order_where[strtolower($payment_type).'_id'] = $refNo;
      if ($payment_type == 'Topup') {
          $check_order = $this->M_Base->data_where_2('topup', $check_order_where);
      }elseif($payment_type == 'Order'){
          $check_order = $this->M_Base->data_where_2('orders', $check_order_where);
      }

      if (!empty($check_order)) {
          throw new Exception('Payment order already done success!');
      }

      $callback_id = 'CLB'.date('Ymd') . rand(0000,9999);
      $callback_data = [
          'callback_id'                   => $callback_id,
          'payment_gateway'               => 'Ayolinx',
          'payment_type'                  => $payment_type,
          'payment_amount'                => $payment_amount,
          'status'                        => $status_callback,
          'partner_reference_no'          => $body->trxId ?? null, // nomor kita
          'original_reference_no'         => $body->paymentRequestId ?? null, // nomor ayolink (PG)
          'original_partner_reference_no' => $body->additionalInfo->paymentNtb ?? null, // nomor BNI (merchant)
          'date_create'                   => date('Y-m-d G:i:s', strtotime($body->additionalInfo->paymentTimeIso8601)),
          'request_body'                  => $body_raw,
      ];

      $this->M_Base->data_insert('callback', $callback_data);

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

              $this->M_Base->data_update('orders', [
                  'status' => 'Success'
              ], $order[0]['id']);
          }

          $resp = [
              'responseCode' => AyolinxEnums::SUCCESS_CALLBACKVA,
              'responseMessage' => 'Success',
              'virtualAccountData' => [
                  'partnerServiceId' => $body->partnerServiceId,
                  'customerNo' => $body->customerNo,
                  'virtualAccountNo' => $body->virtualAccountNo,
                  'trxId' => $body->trxId,
                  'paidAmount' => $body->paidAmount,
                  'paymentRequestId' => $body->paymentRequestId,
                  'virtualAccountTrxType' => $body->virtualAccountTrxType,
                  'additionalInfo' => $body->additionalInfo,
              ],
          ];

          header('Content-Type: application/json');
          return $this->response->setJSON($resp);
  }
  }

  private function checkCallbackVA($param)
  {
      $timestamp = $_SERVER['HTTP_X_TIMESTAMP'];
      $partner_id = $_SERVER['HTTP_X_PARTNER_ID'];
      $signature = $_SERVER['HTTP_X_SIGNATURE'];
      $external_id = $_SERVER['HTTP_X_EXTERNAL_ID'];
      $channel_id = $_SERVER['HTTP_X_CHANNEL_ID'];

      $auth = $_SERVER['HTTP_AUTHORIZATION'];
      $access_token = trim(str_replace('Bearer ','', $auth));

      $client_id = $this->M_Base->u_get('ayolinx-key');
      $client_secret = $this->M_Base->u_get('ayolinx-secret');

      if ($partner_id != $client_id) {
          throw new Exception('Unauthorized client key!');
      }

      if (empty($signature)) {
          throw new Exception('Empty Signature!');
      }

      // mikirin cara nyimpen token hasil generate-an
      // $redis_config = Conf::get('component/redis');
      // $cache = new Cache($redis_config);
      // $token_ret = $cache->get($access_token);
      // if (empty($token_ret) || $token_ret != $client_id) {
      //     throw new BusinessException(ErrorCode::ERR_AYOLINK_PAYMENT_NO_AUTH_ERROR, 'Unauthorized Client');
      // }

      $method = 'POST';
      $url = '/v1.0/transfer-va/payment';
      $hashedBody = hash('sha256', json_encode($param));
      $str = "{$method}:{$url}:{$access_token}:{$hashedBody}:{$timestamp}";
      $sign_local = base64_encode(hash_hmac('sha512', $str, $client_secret, true));

      if ($signature != $sign_local) {
          throw new Exception('Invalid Signature');
      }

      return true;
  }

  private function logCallback($body, $header, $log_name = null, $ret = null){
      $logname = $log_name ?? 'callback.log';
      $logFile = "logs/$logname";
      if ($ret) {
          $message = "[" . date('Y-m-d H:i:s') . "]: BODY: ".$body ." HEADER: ". $header. " RESPONSE: ". $ret.PHP_EOL;
      }else{
          $message = "[" . date('Y-m-d H:i:s') . "]: BODY: ".$body ." HEADER: ". $header. PHP_EOL;
      }

      file_put_contents($logFile, $message, FILE_APPEND);
  }
}

