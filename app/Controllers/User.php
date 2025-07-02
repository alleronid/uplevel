<?php

namespace App\Controllers;

use App\Enums\AyolinxEnums;
use App\Services\AyolinxService;
use App\Services\ZapxPayService;

class User extends BaseController {

    private $ayolinxService;
    private $zipzapService;

    public function __construct()
    {
        $this->ayolinxService = new AyolinxService();
        $this->zipzapService = new ZapxPayService();
    }

    public function index() {

        if ($this->users === false) {
            return redirect()->to(base_url() . '/login');
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            if ($this->request->getPost('btn_password')) {
                $data_post = [
                    'passwordl' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordl')))),
                    'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
                    'passwordbb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordbb')))),
                ];

                if (empty($data_post['passwordl'])) {
                    $this->session->setFlashdata('error', 'Password lama tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['passwordb'])) {
                    $this->session->setFlashdata('error', 'Password baru tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['passwordbb'])) {
                    $this->session->setFlashdata('error', 'Konfirmasi password tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['passwordb']) < 6) {
                    $this->session->setFlashdata('error', 'Password minimal 6 karakter');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['passwordb']) > 24) {
                    $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if ($data_post['passwordb'] !== $data_post['passwordbb']) {
                    $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (!password_verify($data_post['passwordl'], $this->users['password'])) {
                    $this->session->setFlashdata('error', 'Password lama tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', [
                        'password' => password_hash($data_post['passwordb'], PASSWORD_DEFAULT),
                    ], $this->users['id']);

                    $this->session->setFlashdata('success', 'Password berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }

            if ($this->request->getPost('tombol')) {
                $data_post = [
                    'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                ];

                if (empty($data_post['wa'])) {
                    $this->session->setFlashdata('error', 'Nomor whatsapp tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (strlen($data_post['wa']) < 10 OR strlen($data_post['wa']) > 14) {
                    $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->M_Base->data_update('users', $data_post, $this->users['id']);

                    $this->session->setFlashdata('success', 'Data berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }

            $data = array_merge($this->base_data, [
                'title' => 'Beranda',
                'username' => $users[0]['username'] ?? '',
                'orders' => $this->M_Base->data_count('orders', ['username' => $this->users['username']]),
                'jumlahorder' => $this->M_Base->jumlah('orders','price', [
                    'status' => 'Success',
                    'username' => $this->users['username'],
                    ]) + $this->M_Base->jumlah('orders','price', [
                    'status' => 'Finished',
                    'username' => $this->users['username'],
                    ]) ,
                'riwayat' => $this->M_Base->data_where('orders', 'username', $this->users['username']),
                'riwayatpen' => $this->M_Base->data_count('orders', [
                    'status' => 'Pending',
                    'username' => $this->users['username'],
                    ]) + $this->M_Base->data_count('orders', [
                    'status' => 'Processing',
                    'username' => $this->users['username'],
                    ]) ,
                'jumlahsukses' => $this->M_Base->data_count('orders', [
                    'status' => 'Success',
                    'username' => $this->users['username'],
                    ]) + $this->M_Base->data_count('orders', [
                    'status' => 'Processing',
                    'username' => $this->users['username'],
                    ]) ,
                
            ]);

            return view('User/index', $data);
        }
    }

    public function riwayat() {

        if ($this->users === false) {
            return redirect()->to(base_url() . '/login');
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $data = array_merge($this->base_data, [
                'title' => 'Riwayat',
                'riwayat' => $this->M_Base->data_where('orders', 'username', $this->users['username']),
            ]);

            return view('User/riwayat', $data);
        }
    }

    public function topup($topup_id = null) {

        if ($this->users === false) {
            return redirect()->to(base_url() . '/login');
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            if ($topup_id === null) {
                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'nominal' => addslashes(trim(htmlspecialchars($this->request->getPost('nominal')))),
                        'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                    ];

                    if (empty($data_post['nominal'])) {
                        $this->session->setFlashdata('error', 'Nominal tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['method'])) {
                        $this->session->setFlashdata('error', 'Metode tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if ($data_post['nominal'] < 0) {
                        $this->session->setFlashdata('error', 'Topup minimal Rp 10.000');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if ($data_post['nominal'] > 5000000) {
                        $this->session->setFlashdata('error', 'Topup maksimal Rp 5.000.000');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);
                        //  $all_method = $this->M_Base->data_where('method', 'status', 'On');

                        if (count($method) === 1) {
                            if ($method[0]['status'] == 'On') {
                                $topup_id = 'TPP'.date('Ymd') . rand(0000,9999);
                                $uniq = $method[0]['uniq'] == 'Y' ? rand(111,999) : 0;
                                $amount = $data_post['nominal'] + $uniq;
                                $biaya_admin = 0;
                                if ($method[0]['provider'] == 'Omnibayar'){

                                    $rate = number_format(1 + ($method[0]['mdr_rate'] / 100), 3, '.', '');
                                    if (strcasecmp($method[0]['method'], 'QRIS Omnibayar') == 0) {
                                        $price = round(($amount * $rate));
                                        $biaya_admin = max(0, $price - $amount);
                                        $username = $this->users['username'];

                                        $body = [
                                            "transaction_id" => $topup_id,
                                            "amount" => $price,
                                            "fullname" => $username,
                                            "email" => null,
                                            "phone_number" => null
                                        ];

                                        $result = $this->omnibayarService->generate_qris($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if (isset($result['QrContent'])) {
                                                $payment_code = $result['QrContent'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Response tidak memiliki QR Content');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Gagal terkoneksi ke omnibayar');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } elseif (strcasecmp($method[0]['method'], 'DANA') == 0) {
                                        $price = ceil($amount * $rate);
                                        $biaya_admin = max(0, $price - $amount);
                                        $currentTimestamp = time();
                                        $twoMonthsLater = strtotime("+1 months", $currentTimestamp);
                                        $body = [
                                            "partnerReferenceNo" => $topup_id,
                                            "validUpTo" => (string) $twoMonthsLater,
                                            "amount" => [
                                                "currency" => "IDR",
                                                "value" => $price
                                            ],
                                            "urlParams" => [
                                                [
                                                    "type" => "PAY_RETURN",
                                                    "url" => base_url() . '/user/topup/' . $topup_id
                                                ],
                                                [
                                                    "type" => "NOTIFICATION",
                                                    "url" => base_url() . '/ayolinx/paymentcallback?refNo=' . $topup_id
                                                ]
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::EWALLET
                                            ],
                                            "subMerchantId" => "216620060009008054580"
                                        ];

                                        $result = $this->ayolinxService->walletDana($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_DANA) {
                                                $payment_code = $result['webRedirectUrl'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } elseif (strcasecmp($method[0]['method'], 'BNI VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                            "partnerServiceId" => AyolinxEnums::BNI_SB,
                                            "customerNo" => AyolinxEnums::BNI_SB.$number,
                                            // "virtualAccountNo" => AyolinxEnums::BNI_SB."0169",
                                            "virtualAccountName" =>  $username,
                                            "trxId" => $topup_id,
                                            "virtualAccountTrxType" => "C",
                                            "totalAmount" => [
                                                "value" => $price,
                                                "currency" => "IDR"
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VABNI
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_BNI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } elseif (strcasecmp($method[0]['method'], 'CIMB VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                            "partnerServiceId" => AyolinxEnums::CIMB_SB,
                                            "customerNo" => AyolinxEnums::CIMB_SB.$number,
                                            // "virtualAccountNo" => AyolinxEnums::BNI_SB."0169",
                                            "virtualAccountName" =>  $username,
                                            "trxId" => $topup_id,
                                            "virtualAccountTrxType" => "C",
                                            "totalAmount" => [
                                                "value" => $price,
                                                "currency" => "IDR"
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VACIMB
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_BNI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } elseif (strcasecmp($method[0]['method'], 'MANDIRI VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                            "partnerServiceId" => AyolinxEnums::MANDIRI_SB,
                                            "customerNo" => AyolinxEnums::MANDIRI_SB.$number,
                                            // "virtualAccountNo" => AyolinxEnums::BNI_SB."0169",
                                            "virtualAccountName" =>  $username,
                                            "trxId" => $topup_id,
                                            "virtualAccountTrxType" => "C",
                                            "totalAmount" => [
                                                "value" => $price,
                                                "currency" => "IDR"
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VAMANDIRI
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_MANDIRI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    }
                                } elseif ($method[0]['provider'] == 'Ayolinx') {
                                    $rate = number_format(1 + ($method[0]['mdr_rate'] / 100), 3, '.', '');
                                    if (strcasecmp($method[0]['method'], 'QRIS') == 0) {
                                        $price = round(($amount * $rate));
                                        $biaya_admin = max(0, $price - $amount);
                                        $body = [
                                            "partnerReferenceNo" => $topup_id,
                                            "amount" => [
                                                "currency" => "IDR",
                                                "value" => $price
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::QRIS,
                                                // "subMerchantId" => "000580132685"
                                            ]
                                        ];
                                        $result = $this->ayolinxService->generateQris($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_QRIS) {
                                                $payment_code = $result['qrContent'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } elseif (strcasecmp($method[0]['method'], 'DANA') == 0) {
                                        $price = ceil($amount * $rate);
                                        $biaya_admin = max(0, $price - $amount);
                                        $currentTimestamp = time();
                                        $twoMonthsLater = strtotime("+1 months", $currentTimestamp);
                                        $body = [
                                            "partnerReferenceNo" => $topup_id,
                                            "validUpTo" => (string) $twoMonthsLater,
                                            "amount" => [
                                                "currency" => "IDR",
                                                "value" => $price
                                            ],
                                            "urlParams" => [
                                                [
                                                    "type" => "PAY_RETURN",
                                                    "url" => base_url() . '/user/topup/' . $topup_id
                                                ],
                                                [
                                                    "type" => "NOTIFICATION",
                                                    "url" => base_url() . '/ayolinx/paymentcallback?refNo=' . $topup_id
                                                ]
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::EWALLET
                                            ],
                                            "subMerchantId" => "216620060009008054580"
                                        ];
                                        
                                        $result = $this->ayolinxService->walletDana($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_DANA) {
                                                $payment_code = $result['webRedirectUrl'];
                                                } else {
                                                    $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            } else {
                                                $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                    } elseif (strcasecmp($method[0]['method'], 'BNI VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                                "partnerServiceId" => AyolinxEnums::BNI_SB,
                                                "customerNo" => AyolinxEnums::BNI_SB.$number,
                                                // "virtualAccountNo" => AyolinxEnums::BNI_SB."0169",
                                                "virtualAccountName" =>  $username,
                                                "trxId" => $topup_id,
                                                "virtualAccountTrxType" => "C",
                                                "totalAmount" => [
                                                  "value" => $price,
                                                  "currency" => "IDR"
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VABNI
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_BNI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                                } else {
                                                    $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            } else {
                                                $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                    } elseif (strcasecmp($method[0]['method'], 'CIMB VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                                "partnerServiceId" => AyolinxEnums::CIMB_SB,
                                                "customerNo" => AyolinxEnums::CIMB_SB.$number,
                                                // "virtualAccountNo" => AyolinxEnums::BNI_SB."0169",
                                                "virtualAccountName" =>  $username,
                                                "trxId" => $topup_id,
                                                "virtualAccountTrxType" => "C",
                                                "totalAmount" => [
                                                  "value" => $price,
                                                  "currency" => "IDR"
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VACIMB
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_BNI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                                } else {
                                                    $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            } else {
                                                $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                    } elseif (strcasecmp($method[0]['method'], 'MANDIRI VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                                "partnerServiceId" => AyolinxEnums::MANDIRI_PROD,
                                                "customerNo" => AyolinxEnums::MANDIRI_PROD.$number,
                                                "virtualAccountNo" => AyolinxEnums::MANDIRI_PROD."01699548",
                                                "virtualAccountName" =>  $username,
                                                "trxId" => $topup_id,
                                                "virtualAccountTrxType" => "O",
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VAMANDIRI
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_MANDIRI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                                } else {
                                                    $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            } else {
                                                $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                    } elseif (strcasecmp($method[0]['method'], 'BRI VIRTUAL ACCOUNT') == 0){
                                        $price = ceil($amount + ($amount * 0.002) + 4000);
                                        $biaya_admin = max(0, $price - $amount);
                                        $number = $this->ayolinxService->customerNo();
                                        $username = $this->users['username'];
                                        $body = [
                                                "partnerServiceId" => AyolinxEnums::BRI_PROD,
                                                "customerNo" => AyolinxEnums::BRI_PROD.$number,
                                                // "virtualAccountNo" => AyolinxEnums::BNI_SB."0169",
                                                "virtualAccountName" =>  $username,
                                                "trxId" => $topup_id,
                                                "virtualAccountTrxType" => "C",
                                                "totalAmount" => [
                                                  "value" => $price,
                                                  "currency" => "IDR"
                                            ],
                                            "additionalInfo" => [
                                                "channel" => AyolinxEnums::VABRI
                                            ]
                                        ];

                                        $result = $this->ayolinxService->generateVA($body);
                                        $result = json_decode($result, true);
                                        if ($result) {
                                            if ($result['responseCode'] == AyolinxEnums::SUCCESS_VA_MANDIRI) {
                                                $payment_code = $result['virtualAccountData']['virtualAccountNo'];
                                                } else {
                                                    $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            } else {
                                                $this->session->setFlashdata('error', 'Gagal terkoneksi ke ayolinx');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }
                                    }

                                } else if ($method[0]['provider'] == 'ZapxPay'){
                                    $amount = $amount + 2000;
                                    $body = [
                                        "productCode" => (integer) $method[0]['code'],
                                        "currency"=>  "IDR",
                                        "amount"=>  (string) $amount,
                                        "mchOrderNo"=>  (string) $topup_id,
                                        "remark"=>  "remark",
                                        "userName"=> "alleron-user",
                                        "expireTime" => "3600"
                                    ];

                                    if ($method[0]['code'] == '41') {
                                        $body['payReturnUrl'] = "https://alleron.id/payment-notify-callback?refNo=" . $topup_id;
                                        $body['notifyUrl']    = "https://alleron.id/payment-notify-callback";
                                    }

                                    $result = $this->zipzapService->generatePayment($body);
                                    $result = json_decode($result);
                                    if($result){
                                        if($result->code == 0){
                                            $payment_code = $result->data->payCode;
                                        }else{
                                            $this->session->setFlashdata('error', 'Result : ' . $result['responseMessage']);
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    }
                                }else if ($method[0]['provider'] == 'Manual') {
                                }

                                $this->M_Base->data_insert('topup', [
                                    'username' => $this->users['username'],
                                    'topup_id' => $topup_id,
                                    'method_id' => $method[0]['id'],
                                    'method' => $method[0]['method'],
                                    'amount' => $amount,
                                    'admin_fee' => $biaya_admin,
                                    'status' => 'Pending',
                                    'payment_code' => $payment_code,
                                    'payment_type'=> $method[0]['type'],
                                    'method_code' =>  $method[0]['code'],
                                    'payment_gateway' => $method[0]['provider'],
                                    'date_create' => date('Y-m-d G:i:s'),
                                    'saldodsb' => $this->users['balance']
                                ]);

                                $this->session->setFlashdata('success', 'Request Deposit');
                                return redirect()->to(base_url() . '/user/topup/' . $topup_id);

                            } else {
                                $this->session->setFlashdata('error', 'Metode tidak tersedia');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $this->session->setFlashdata('error', 'Metode tidak ditemukan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }
                }
                $all_method = $this->M_Base->data_where('method', 'status', 'On');
                $accordion_data = [];

                foreach ($all_method as $method) {
                    if (!isset($accordion_data[$method['type']])) {
                        $accordion_data[$method['type']] = [];
                }
                    array_push($accordion_data[$method['type']], array('mdr_rate' => $method['mdr_rate'], 'amount_fee' => $method['amount_fee'] ,'method' => $method['method'], 'image' => $method['image'], 'id' => $method['id'], 'code' => $method['code']));
                }
                
                $data = array_merge($this->base_data, [
                    'title' => 'Top Up',
                    'method' => $this->M_Base->data_where('method', 'status', 'On'),
                    'accordion_data' => $accordion_data,
                ]);

                return view('User/Topup/index', $data);
            } else {
                $topup = $this->M_Base->data_where_array('topup', [
                    'topup_id' => $topup_id,
                    'username' => $this->users['username'],
                ]);

                if (count($topup) === 1) {

                    $find_method = $this->M_Base->data_where('method', 'id', $topup[0]['method_id']);

                    $instruksi = count($find_method) == 1 ? $find_method[0]['instruksi'] : '-';

                    $data = array_merge($this->base_data, [
                        'title' => 'Top Up',
                        'topup' => array_merge($topup[0], [
                            'instruksi' => $instruksi,
                        ]),
                    ]);

                    return view('User/Topup/detail', $data);
                } else {
                    if ($topup_id === 'riwayat') {  
                        $data = array_merge($this->base_data, [
                            'title' => 'Top Up',
                            'topup' => $this->M_Base->data_where('topup', 'username', $this->users['username']),
                        ]);

                        return view('User/Topup/riwayat', $data);
                    } else {
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    }
                }
            }
        }
    }
}
