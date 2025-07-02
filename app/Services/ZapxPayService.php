<?php

namespace App\Services;

use App\Enums\ZapxPayEnums;
use Exception;

class ZapxPayService
{
  private $timestamp;
  private $nonce;

  public function __construct()
  {
    $this->timestamp = round(microtime(true) * 1000);
    $this->nonce = self::generateUuid();
  } 

  public function signature($content)
  {
    $privateKey = file_get_contents('../keys/zapxpay/private_key.pem');
    openssl_sign($content, $signature, $privateKey, OPENSSL_ALGO_SHA256);
    return base64_encode($signature);
  }

  function sign($httpMethod, $httpRequestUri, $httpRequestBody, $timestamp) {
    $appId = ZapxPayEnums::APP_ID;
    $nonce = $this->nonce;

    $authString = "app_id={$appId},nonce={$nonce},timestamp={$timestamp}";
    $content = "{$authString}\n{$httpMethod}\n{$httpRequestUri}\n";
    $content .= empty($httpRequestBody) ? "\n" : "{$httpRequestBody}\n";
    $signature = $this->signature($content);  

    $content = "{$authString}\n{$httpMethod}\n{$httpRequestUri}\n";
    $content .= empty($httpRequestBody) ? "\n" : "{$httpRequestBody}\n";

    $signature = $this->signature($content);
    $authorization = "ZAPXPAY-SHA256withRSA {$authString},sign={$signature}";
    return $authorization;
  }

  public function base_interface($body, $url) { 

    $httpMethod = 'POST';
    $appId = ZapxPayEnums::APP_ID;
    $nonce = $this->nonce;
    $timestamp = $this->timestamp; // Ensure timestamp is initialized

    $authString = "app_id={$appId},nonce={$nonce},timestamp={$timestamp}";
    $bodyEncode = json_encode($body);
    $content = "{$authString}\n{$httpMethod}\n{$url}\n";
    $content .= empty($body) ? "\n" : "{$bodyEncode}\n";
    $auth = $this->sign("POST", $url, $bodyEncode, $timestamp);

    $defaultHeaders = array(
      'Content-Type: application/json',
      'Authorization: ' . $auth,
      'zapxpay-request-id: '.self::generateRequestID()
    );

    $curl = curl_init();

    $url = ZapxPayEnums::URL_PROD.$url;

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => json_encode($body),
      CURLOPT_HTTPHEADER => $defaultHeaders,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }

  public function generatePayment($body = []){
    $url = '/pay-in/create';
    $response = $this->base_interface($body, $url);
    return $response;
  }

  private function generateUuid()
{
    $data = random_bytes(16);
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x50);
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);

    $hex = bin2hex($data);

    return sprintf(
        '%s-%s-%s-%s-%s',
        substr($hex, 0, 8),
        substr($hex, 8, 4),
        substr($hex, 12, 4),
        substr($hex, 16, 4),
        substr($hex, 20, 12)
    );
}

  private function generateRequestID()
  {
    return bin2hex(random_bytes(16));
  }
}