<?php

namespace App\Controllers;

class Pages extends BaseController {

    public function postingan() {

        $data = array_merge($this->base_data, [
    		'title' => 'Artikel',
            'menu_active' => 'postingan',
            'post' => $this->M_Base->all_data('post'),
    	]);


        return view('Pages/postingan', $data);
    }
    
    public function tabelharga() {


    $product = [];
                foreach (array_reverse($this->M_Base->all_data('product')) as $loop) {

                    $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

                    if (count($games) == 1) {

                        $price_silver = $loop['price'];
                        $price_gold = $loop['price'];

                        $find_price_silver = $this->M_Base->data_where_array('price', [
                            'method_id' => 10001,
                            'product_id' => $loop['id'],
                            'level' => 'Silver',
                        ]);

                        if (count($find_price_silver) == 1) {
                            $price_silver = $find_price_silver[0]['price'];
                        }

                        $find_price_gold = $this->M_Base->data_where_array('price', [
                            'method_id' => 10001,
                            'product_id' => $loop['id'],
                            'level' => 'Gold',
                        ]);

                        if (count($find_price_gold) == 1) {
                            $price_gold = $find_price_gold[0]['price'];
                        }

                        $product[] = [
                            'games' => $games[0]['games'],
                            'image' => $games[0]['image'],
                            'product' => $loop['product'],
                            'id' => $loop['id'],
                            'sku' => $loop['sku'],
                            'status' => $games[0]['status'],
                            'price' => [
                                'member' => $loop['price'],
                                'silver' => $price_silver,
                                'gold' => $price_gold,
                            ],
                        ];
                    }

                }
        
        $data = array_merge($this->base_data, [
    		'title' => 'Tabel Harga Member',
            'tabel' => $product,
            'menu_active' => 'tabelharga',
    	]);

        return view('Pages/tabelharga', $data);
    }
    
        public function kalkulatorwr() {

        $data = array_merge($this->base_data, [
    		'title' => 'Kalkulator WR',
            'menu_active' => 'kalkulatorwr',
    	]);

        return view('Pages/kalkulatorwr', $data);
    }
    
    public function hpmagicwheel() {

        $data = array_merge($this->base_data, [
    		'title' => 'HP Magic Wheel',
            'menu_active' => 'hpmagicwheel',
    	]);

        return view('Pages/hpmagicwheel', $data);
    }

    public function sk() {

    	$data = array_merge($this->base_data, [
    		'title' => 'Syarat & Ketentuan',
            'page_sk' => $this->M_Base->u_get('page_sk'),
    	]);

        return view('Pages/sk', $data);
    }

    public function price() {

        $product = [];
        foreach (array_reverse($this->M_Base->all_data_order('games', 'sort')) as $game) {
            $data_product = $this->M_Base->data_where_array('product', [
                'games_id' => $game['id']
            ], 'price');

            if (count($data_product) !== 0) {
                $product[] = [
                    'games' => $game['games'],
                    'image' => $game['image'],
                    'product' => array_reverse($data_product),
                ];
            }
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Harga',
            'price' => $product,
            'menu_active' => 'Price',
    	]);

        return view('Pages/price', $data);
    }

    public function method() {

    	$data = array_merge($this->base_data, [
    		'title' => 'Metode',
            'method' => $this->M_Base->all_data('method'),
            'menu_active' => 'Method',
    	]);

        return view('Pages/method', $data);
    }

    public function register($ref = '') {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }

        if ($this->request->getPost('tombol')) {

            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
                'passwordb' => addslashes(trim(htmlspecialchars($this->request->getPost('passwordb')))),
                'ref' => addslashes(trim(htmlspecialchars($this->request->getPost('ref')))),
            ];

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['wa'])) {
                $this->session->setFlashdata('error', 'No. Whatsapp tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['passwordb'])) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['wa']) < 10 OR strlen($data_post['wa']) > 14) {
                $this->session->setFlashdata('error', 'No. Whatsapp tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (substr($data_post['wa'], 0, 2) != '08') {
                $this->session->setFlashdata('error', 'No. Whatsapp harus diawali 08');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($data_post['password'] !== $data_post['passwordb']) {
                $this->session->setFlashdata('error', 'Konfirmasi password tidak sesuai');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) < 6) {
                $this->session->setFlashdata('error', 'Password minimal 6 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (strlen($data_post['password']) > 24) {
                $this->session->setFlashdata('error', 'Password maksimal 24 karakter');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {

                $user_ref = '';
                if (!empty($data_post['ref'])) {
                    $data_ref = $this->M_Base->data_where('users', 'ref', $data_post['ref']);

                    if (count($data_ref) == 1) {
                        if ($data_ref[0]['ref'] == $data_post['ref']) {
                            $user_ref = $data_ref[0]['username'];
                        } else {
                            $this->session->setFlashdata('error', 'Kode Referal tidak dikenali');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    } else {
                        $this->session->setFlashdata('error', 'Kode Referal tidak dikenali');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $data_users = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($data_users) == 0) {
                    $this->M_Base->data_insert('users', [
                        'username' => $data_post['username'],
                        'password' => password_hash($data_post['password'], PASSWORD_DEFAULT),
                        'balance' => 0,
                        'wa' => $data_post['wa'],
                        'ref' => $this->M_Base->random_string(5),
                        'ref_by' => $user_ref,
                        'level' => 'Member',
                        'status' => 'On',
                        'date_create' => date('Y-m-d G:i:s'),
                    ]);

                    $this->session->setFlashdata('success', 'Pendaftaran akun berhasil');
                    return redirect()->to(base_url() . '/login');
                } else {
                    $this->session->setFlashdata('error', 'Username sudah digunakan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Register',
            'menu_active' => 'Login',
            'ref' => $ref,
        ]);

        return view('Pages/register', $data);
    }


    public function login() {

        if ($this->users !== false) {
            return redirect()->to(base_url());
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                'password' => addslashes(trim(htmlspecialchars($this->request->getPost('password')))),
            ];

            if (empty($data_post['username'])) {
                $this->session->setFlashdata('error', 'Username tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if (empty($data_post['password'])) {
                $this->session->setFlashdata('error', 'Password tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $users = $this->M_Base->data_where('users', 'username', $data_post['username']);

                if (count($users) === 1) {
                    if ($users[0]['username'] === $data_post['username']) {
                        if ($users[0]['status'] === 'On') {
                            if (password_verify($data_post['password'], $users[0]['password'])) {

                                $this->session->set('username', $users[0]['username']);

                                $this->session->setFlashdata('success', 'Login berhasil');
                                return redirect()->to(base_url() . '/user');
                            } else {
                                $this->session->setFlashdata('error', 'Username atau password salah');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $this->session->setFlashdata('error', 'Akun kamu telah dinonaktifkan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    } else {
                        $this->session->setFlashdata('error', 'Username atau password salah');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                } else {
                    $this->session->setFlashdata('error', 'Username atau password salah');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Login',
            'menu_active' => 'Login',
    	]);

        return view('Pages/login', $data);
    }

    public function logout() {

        $this->session->remove('username');

        $this->session->setFlashdata('success', 'Logout berhasil');
        return redirect()->to(base_url() . '/login');
    }
}
