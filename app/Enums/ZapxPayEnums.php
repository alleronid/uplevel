<?php

namespace App\Enums;

class ZapxPayEnums
{
  const URL_DEV = 'https://sandbox.zapxpay.com';
  const URL_PROD = 'https://openapi.zapxpay.com';

  // const APP_ID = 'Nob50xh5WZaUKqb6ckcERU3PIYhu1C37';
  const APP_ID = 'YTVu8vs9Z2xcqBQi9D53A5cKkLY3v8wP';
 
  public static array $errors = [
    '10011101' => '{0} parameters error.',
    '10011302' => 'Merchant status invalid.',
    '10011303' => 'Merchant auth failed.',
    '10011304' => 'Signature verification failed.{0}',
    '10011401' => 'Payin order create failed, please try again.',
    '10011402' => 'The current channel is inactive.',
    '10011403' => 'Order creation failed.',
    '10011404' => 'Order status update failed.',
    '10011405' => 'The order not exist.',
    '10011406' => 'Abnormal account status.',
    '10011408' => 'Merchant notify url empty.',
    '10011409' => 'Duplicate merchant order no.',
    '10011501' => 'Payment processing error.',
    '10011502' => 'Payment verification failed.',
    '10011503' => 'Order status is abnormal.',
    '10011504' => 'Channel response exception.',
    '10011505' => 'Create payin order failed, {0}',
    '10019999' => 'Unknown error.',
  ];

  const BNIVA = '11';
  const CIMBVA = '12';
  const MANDIRIVA = '13';
  const QRIS = '31';
  const DANA = '41';

  
}