<?php

namespace App\Controllers;

use App\Enums\AyolinxEnums;
use Exception;

class Ayolinx extends BaseController
{

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
    $timestamp = date('Y-m-d\TH:i:sP');
    $clientKey = $this->M_Base->u_get('ayolinx-key');
    $requestTimestamp = $timestamp;
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
    $timestamp = date('Y-m-d\TH:i:sP');
    $hashBody = hash('sha256', json_encode($body));
    $data = "{$method}:{$url}:{$tokenAccess}:{$hashBody}:{$timestamp}";
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));
    return $signature;
  }

  public function api($url ,$headers= [], $post =[]){
    $timestamp = date('Y-m-d\TH:i:sP');
		$ch = curl_init();
		$defaultHeaders = array(
			'Content-Type: application/json',
      'X-TIMESTAMP: ' . $timestamp,
		);

    $headers = array_merge($defaultHeaders, $headers);

    $baseUrl =  "https://sandbox.ayolinx.id/$url";

		curl_setopt($ch, CURLOPT_URL, $baseUrl);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
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

  public function generateQris(){
    $url = '/v1.0/qr/qr-mpm-generate';
    $tokenAccess = $this->get_token();
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $body = [  
          "partnerReferenceNo" => "fd3f5af0-af57-4513-95a8-77df45721ed27",
          "amount" => [
              "currency" => "IDR",
              "value" => '100000'
          ],
          "additionalInfo" => [
              "channel" => "BNC_QRIS"
          ]
    ];
    $signature = $this->signatureReq($url, $tokenAccess, $body, 'POST', $client_secret);
    $header = [
      'X-SIGNATURE' => $signature,
      'X-PARTNER-ID' => $this->M_Base->u_get('ayolinx-key'),
      'X-EXTERNAL-ID' => 418075533589,
      'Authorization' => 'Bearer '. $tokenAccess
    ];

    $response = $this->api($url, $header, $body);
    return $response;
  }

  public function queryQris()
  {
    $method = "POST";
    $tokenAccess = $this->get_token();
    $url = '/v1.0/qr/qr-mpm-query';
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $body = [
        'originalPartnerReferenceNo' => '',
        'additionalInfo' => [
          'channel' => AyolinxEnums::QRIS
        ]
    ];
    $signature = $this->signatureReq($url, $tokenAccess, $body, $method, $client_secret);
    $header = [
      'X-SIGNATURE' => $signature,
      'X-PARTNER-ID' => $this->M_Base->u_get('ayolinx-key'),
      'X-EXTERNAL-ID' => 418075533589,
      'Authorization' => 'Bearer '. $tokenAccess
    ];

    $response = $this->api($url, $header, $body);
    return $response; 
  }

  public function cancelQris()
  {
    $method = "POST";
    $tokenAccess = $this->get_token();
    $url = '/v1.0/qr/qr-mpm-cancel';
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $body = [
        'originalPartnerReferenceNo' => 'uihfuehfuiefuinefiefueu',
        'additionalInfo' => [
          'channel' => AyolinxEnums::QRIS
        ]
    ];
    $signature = $this->signatureReq($url, $tokenAccess, $body, $method, $client_secret);
    $header = [
      'X-SIGNATURE' => $signature,
      'X-PARTNER-ID' => $this->M_Base->u_get('ayolinx-key'),
      'X-EXTERNAL-ID' => 418075533589,
      'Authorization' => 'Bearer '. $tokenAccess
    ];

    $response = $this->api($url, $header, $body);
    return $response; 
  }

  public function walletDana(){
    $method = 'POST';
    $url = '/direct-debit/core/v1/debit/payment-host-to-host';
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $tokenAccess = $this->get_token();
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
}