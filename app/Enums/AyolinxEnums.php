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
  const VABRI = "VIRTUAL_ACCOUNT_BRI";

  //partnerID
  const BNI_SB = "98829172";
  const BNI_PROD = "98828222";
  const CIMB_SB = "2056";
  const CIMB_PROD = "2056";
  const MANDIRI_SB = "87319";
  const MANDIRI_PROD = "87319";
  const BRI_SB = "15574";
  const BRI_PROD = "15574";

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
  const SUCCESS_VA_MANDIRI = '2002700';
  const UNAUTHORIZED = '581000001';
  const SUCCESS_GET_TOKENVA = '2007300';
  const SUCCESS_CALLBACKVA = '2002500';
  const SUCCESS_CALLBACK = '2005600';
  const ERR_AYOLINK_PAYMENT_BAD_REQ = 4007300;
  const ERR_AYOLINK_TOKEN_NO_AUTH_ERROR = 4017300;
  const ERR_AYOLINK_PAYMENT_INVALID_SIGN = 4012501;
  
}
