<?php

namespace App\Enums;

class AyolinxEnums
{
  //channel 
  const QRIS = 'BNC_QRIS';
  const EWALLET = 'EMONEY_DANA_SNAP';
  const VirtualAccount = 'VIRTUAL_ACCOUNT_BNI';

  //partnerID
  const BNI_SB = 98829172;
  const BNI_PROD = 98828222;

  //status code 
  const SUCCESS_CODE = 00;
  const INITIATED_CODE = 01;
  const PAYING_CODE = 02;
  const PENDING_CODE = 03;
  const REFUNDED_CODE = 04;
  const CANCEL_CODE = 05;
  const FAILED_CODE = 06;
  const NOT_FOUND = 07;  
}