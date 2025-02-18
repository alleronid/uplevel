<?php

namespace App\Enums;

class AyolinxEnums
{
  //links
  const URL_PROD = 'https://openapi.ayolinx.id';
  const URL_DEV = 'https://sandbox.ayolinx.id';

  //channel 
  const QRIS = 'BNC_QRIS';
  const EWALLET = 'EMONEY_DANA_SNAP';
  const VABNI = 'VIRTUAL_ACCOUNT_BNI';
  const VACIMB = 'VIRTUAL_ACCOUNT_CIMB';
  const VAMANDIRI = 'VIRTUAL_ACCOUNT_MANDIRI';

  //partnerID
  const BNI_SB = "98829172";
  const BNI_PROD = "98828222";
  const CIMB_SB = "2056";
  const CIMB_PROD = "2056";
  const MANDIRI_SB = "666";
  const MANDIRI_PROD = "999";

  //status code 
  const SUCCESS_CODE = 00;
  const INITIATED_CODE = 01;
  const PAYING_CODE = 02;
  const PENDING_CODE = 03;
  const REFUNDED_CODE = 04;
  const CANCEL_CODE = 05;
  const FAILED_CODE = 06;
  const NOT_FOUND = 07;  

  //response code
  const SUCCESS_DANA = '2005400';
  const SUCCESS_QRIS = '2004700';
  const SUCCESS_VA_BNI = '2002700';
  const UNAUTHORIZED = '581000001';
  const SUCCESS_GET_TOKENVA = '2007300';
  const SUCCESS_CALLBACKVA = '2002500';
  const SUCCESS_CALLBACK = '2005600';
  
}
