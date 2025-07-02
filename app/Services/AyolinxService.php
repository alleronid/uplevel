<?php

namespace App\Services;

use App\Enums\AyolinxEnums;
use App\Models\M_Base;
use Exception;

class AyolinxService
{
  private $M_Base;
  private $timestamp;

  public function __construct()
  {
    $this->M_Base = new M_Base();
    $this->timestamp = date('c');
  }

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
        $baseUrl =  AyolinxEnums::URL_PROD.$url;


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

  public function get_token()
  {
    try {
      $client_key = $this->M_Base->u_get('ayolinx-key');
      $signature = $this->signature();
      $header = [
        'X-CLIENT-KEY: ' . $client_key,
        'X-SIGNATURE: ' . $signature
      ];
      $response = $this->api('/v1.0/access-token/b2b', $header);
      $result = json_decode($response, true);
      $accessToken = $result["accessToken"] ?? null;
      return $accessToken;
    } catch (\Exception $e) {
      return json_encode(['error' => $e]);
    }
  }

  public function base_interface($signature, $timestamp, $token, $url, $post)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => AyolinxEnums::URL_PROD . $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($post),
      CURLOPT_HTTPHEADER => array(
        'X-TIMESTAMP: ' . $timestamp,
        'X-SIGNATURE:' . $signature,
        'X-PARTNER-ID:' . $this->M_Base->u_get('ayolinx-key'),
        'X-EXTERNAL-ID:' . $this->randomNumber(),
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    insert_log(json_encode($post), json_encode(array( 
        'X-TIMESTAMP: ' . $timestamp,
        'X-SIGNATURE:' . $signature,
        'X-PARTNER-ID:' . $this->M_Base->u_get('ayolinx-key'),
        'X-EXTERNAL-ID:' . $this->randomNumber(),
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    )), 'payment.log', $response);
    curl_close($curl);
    return $response;
  }

  public function generateQris($data = []){
    $timestamp = $this->timestamp;
    $method = 'POST';
    $urlSignature = "/v1.0/qr/qr-mpm-generate";
    $token = $this->get_token();
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $body = $data;
    $hash = hash('sha256', json_encode($body));
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));

    $response = $this->base_interface($signature, $timestamp, $token, $urlSignature, $body);
    return $response;
  }

  public function walletDana($data = []){
    $timestamp = date('c');
    $method = 'POST';
    $urlSignature = '/direct-debit/core/v1/debit/payment-host-to-host';
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $token = $this->get_token();
    $body = $data;
    $hash = hash('sha256',json_encode($body));
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));

    $response = $this->base_interface($signature, $timestamp, $token, $urlSignature, $body);

    return $response;
  }

  public function generateVA($data = []){
    $timestamp = $this->timestamp;
    $method = 'POST';
    $urlSignature = '/v1.0/transfer-va/create-va';
    $client_secret = $this->M_Base->u_get('ayolinx-secret');
    $token = $this->get_token();
    $body = $data;
    $hash = hash('sha256',json_encode($body));
    $hexEncodedHash = strtolower($hash);
    $data = "{$method}:{$urlSignature}:{$token}:{$hexEncodedHash}:{$timestamp}";  
    $signature = base64_encode(hash_hmac('sha512', $data, $client_secret, true));

    $response =$this->base_interface($signature, $timestamp, $token, $urlSignature, $body);

    return $response;
  }

  public function randomNumber(){
    $number = strval(rand(11111111111 ,99999999999));
    return $number;
  }

  public function customerNo(){
    $number = strval(rand(11111111,999999999));
    return (string) $number;
  }
}
