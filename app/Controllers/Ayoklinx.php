<?php

namespace App\Controllers;

use App\Enums\AyolinxEnums;
use Exception;

class Ayoklinx extends BaseController
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
    $private_key = file_get_contents('private_key.pem');

    try {
      openssl_sign($string_to_sign, $signature, $private_key, OPENSSL_ALGO_SHA256);
    } catch (Exception $e) {
      echo $e;
    }
    $base64_signature = base64_encode($signature);
    return $base64_signature;
  }

  public function signatureReq($url, $tokenAccess ,$body = [], $method = 'POST', $client_secret): String
  {
    $timestamp = $this->timestamp;
    $hashBody = hash('sha256', json_encode($body, JSON_UNESCAPED_SLASHES));
    $data = "{$method}:{$url}:{$tokenAccess}:{$hashBody}:{$timestamp}";
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));
    return $signature;
  }

  public function signatureInterface()
  { 
    return $signature;
  }

  public function signatureCallback($url, $body){
    $timestamp = $this->timestamp;
    $method = "POST";
    $hash = hash('sha256', json_encode($request_body));
    $data = "{$method}:{$url}:{$hash}:{$timestamp}";
    $signature = base64_decode($headerSign);
    $isValidSignature = openssl_verify($data, $signature, $publicKey, OPENSSL_ALGO_SHA256);
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

  public function generateQris(){
    $timestamp = date('c');
    $method = 'POST';
    $urlSignature = "/v1.0/qr/qr-mpm-generate";
    $token = $this->get_token();
    $client_secret = 'SKSandbox-c2382b29-2395-4002-9ac5-fee6a6bdc52e';
    $body = [  
      'partnerReferenceNo' => 'fd3f5af0-af57-4513-95a8-77df45721ed28',
      'amount' => [
          'currency' => 'IDR',
          'value' => '100000.00'
      ],
      'additionalInfo' => [
          'channel' => 'BNC_QRIS'
      ]
    ];
    $hash = hash('sha256', json_encode($body));
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));

    $response = $this->base_interface($signature, $timestamp, $token, $urlSignature, $body);
    echo $response;
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
}