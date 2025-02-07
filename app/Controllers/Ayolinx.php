<?php

namespace App\Controllers;

class Ayolinx extends BaseController
{
  public function get_token(){
    $curl = curl_init();
    // $xSignature;
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://payment.dawn.dev.ayolinx.id/api/v1.0/access-token/b2b',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "grantType":"client_credentials"
    }',
      CURLOPT_HTTPHEADER => array(
          'X-TIMESTAMP: 2025-02-07T06:36:36+00:00',
          'X-CLIENT-KEY:'. $this->M_Base->u_get('ayolinx-key') ,
          'X-SIGNATURE:', $this->M_Base->u_get('ayolinx-secret'),
          'Content-Type:  application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
}