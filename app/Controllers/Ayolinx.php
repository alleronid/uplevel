<?php

namespace App\Controllers;

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

  public function signature(){
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

  public function get_token() {
    $timestamp = date('Y-m-d\TH:i:sP');
    $client_key = $this->M_Base->u_get('ayolinx-key');
    $signature = $this->signature();

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sandbox.ayolinx.id/v1.0/access-token/b2b',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
            "grant_type" => "client_credentials"
        )),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'X-TIMESTAMP: ' . $timestamp,
            'X-CLIENT-KEY: ' . $client_key,
            'X-SIGNATURE: ' . $signature
        ),
    ));
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'cURL Error: ' . curl_error($curl);
    } else {
        echo $response;
    }
    curl_close($curl);
    return $response;
  }
  
}