<?php

namespace App\Controllers;

class User extends BaseController {

    public function index() {

        if ($this->users === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
                'username' => $users[0]['username'],
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
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
                    } else if ($data_post['nominal'] < 10000) {
                        $this->session->setFlashdata('error', 'Topup minimal Rp 10.000');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if ($data_post['nominal'] > 5000000) {
                        $this->session->setFlashdata('error', 'Topup maksimal Rp 5.000.000');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);

                        if (count($method) === 1) {
                            if ($method[0]['status'] == 'On') {

                                $topup_id = date('Ymd') . rand(0000,9999);

                                $uniq = $method[0]['uniq'] == 'Y' ? rand(000,999) : 0;

                                $amount = $data_post['nominal'] + $uniq;

                                if ($method[0]['provider'] == 'Tripay') {

                                    $data = [
                                        'method'         => $method[0]['code'],
                                        'merchant_ref'   => $topup_id,
                                        'amount'         => $amount,
                                        'customer_name'  => $this->users['username'],
                                        'customer_email' => 'email@domain.com',
                                        'customer_phone' => $this->users['wa'],
                                        'order_items'    => [
                                            [
                                                'sku'         => 'DS',
                                                'name'        => 'Topup Saldo',
                                                'price'       => $amount,
                                                'quantity'    => 1,
                                            ]
                                        ],
                                        'return_url'   => base_url(),
                                        'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
                                        'signature'    => hash_hmac('sha256', $this->M_Base->u_get('tripay-merchant').$topup_id.$amount, $this->M_Base->u_get('tripay-private'))
                                    ];

                                    $curl = curl_init();

                                    curl_setopt_array($curl, [
                                        CURLOPT_FRESH_CONNECT  => true,
                                        CURLOPT_URL            => 'https://tripay.co.id/api/transaction/create',
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_HEADER         => false,
                                        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$this->M_Base->u_get('tripay-key')],
                                        CURLOPT_FAILONERROR    => false,
                                        CURLOPT_POST           => true,
                                        CURLOPT_POSTFIELDS     => http_build_query($data),
                                        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
                                    ]);

                                    $result = curl_exec($curl);
                                    $result = json_decode($result, true);

                                    if ($result) {
                                        if ($result['success'] == true) {
                                            if (array_key_exists('qr_url', $result['data'])) {
                                                $payment_code = $result['data']['qr_url'];
                                            } else {
                                                $payment_code = $result['data']['pay_code'];
                                            }
                                        } else {
                                            $this->session->setFlashdata('error', 'Result : ' . $result['message']);
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } else {
                                        $this->session->setFlashdata('error', 'Gagal terkoneksi ke Tripay');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }

                                } else if ($method[0]['provider'] == 'Manual') {
                                    $payment_code = $method[0]['rek'];
                                } else {
                                    $this->session->setFlashdata('error', 'Metode tidak terdaftar');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }

                                $this->M_Base->data_insert('topup', [
                                    'username' => $this->users['username'],
                                    'topup_id' => $topup_id,
                                    'method_id' => $method[0]['id'],
                                    'method' => $method[0]['method'],
                                    'amount' => $amount,
                                    'status' => 'Pending',
                                    'payment_code' => $payment_code,
                                    'date_create' => date('Y-m-d G:i:s'),
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

                $data = array_merge($this->base_data, [
                    'title' => 'Top Up',
                    'method' => $this->M_Base->all_data('method'),
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
