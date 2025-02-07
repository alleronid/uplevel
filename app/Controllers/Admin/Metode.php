<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Metode extends BaseController {

    public function index() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('pay_balance')) {
            $this->M_Base->u_update('pay_balance', $this->request->getPost('pay_balance'));

            $this->session->setFlashdata('success', 'Sistem pembayaran berhasil disimpan');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Metode',
            'method' => $this->M_Base->all_data('method'),
            'pay_balance' => $this->M_Base->u_get('pay_balance'),
    	]);

        return view('Admin/Metode/index', $data);
    }

    public function add() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                'code' => addslashes(trim(htmlspecialchars($this->request->getPost('code')))),
                'uniq' => addslashes(trim(htmlspecialchars($this->request->getPost('uniq')))),
                'rek' => addslashes(trim(htmlspecialchars($this->request->getPost('rek')))),
                'type' => addslashes(trim(htmlspecialchars($this->request->getPost('type')))),
                'instruksi' => addslashes(trim(htmlspecialchars($this->request->getPost('instruksi')))),
            ];

            if (empty($data_post['method']) OR empty($data_post['uniq'])) {
                $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/method/');

                if ($image) {
                    $this->M_Base->data_insert('method', array_merge($data_post, [
                        'image' => $image,
                        'status' => 'On',
                    ]));

                    $this->session->setFlashdata('success', 'Metode berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->session->setFlashdata('error', 'Gambar tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Tambah Metode',
        ]);

        return view('Admin/Metode/add', $data);
    }

    public function edit($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $method = $this->M_Base->data_where('method', 'id', $id);

            if (count($method) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                        'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                        'code' => addslashes(trim(htmlspecialchars($this->request->getPost('code')))),
                        'uniq' => addslashes(trim(htmlspecialchars($this->request->getPost('uniq')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                        'rek' => addslashes(trim(htmlspecialchars($this->request->getPost('rek')))),
                        'type' => addslashes(trim(htmlspecialchars($this->request->getPost('type')))),
                        'instruksi' => addslashes(trim(htmlspecialchars($this->request->getPost('instruksi')))),
                    ];

                    if (empty($data_post['method']) OR empty($data_post['uniq'])) {
                        $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/method/');

                        if ($image) {
                            $file = 'assets/images/method/' . $method[0]['image'];

                            if (file_exists($file)) {
                                unlink($file);
                            }
                        } else {
                            $image = $method[0]['image'];
                        }

                        $this->M_Base->data_update('method', array_merge($data_post, [
                            'image' => $image,
                        ]), $id);

                        $this->session->setFlashdata('success', 'Metode berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Metode',
                    'method' => $method[0],
                ]);

                return view('Admin/Metode/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

    }

    public function delete($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $method = $this->M_Base->data_where('method', 'id', $id);

            if (count($method) === 1) {
                $this->M_Base->data_delete('method', $id);

                $this->session->setFlashdata('success', 'Metode berhasil dihapus');
                return redirect()->to(base_url() . '/admin/metode');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function price($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $product = $this->M_Base->data_where('product', 'id', $id);

            if (count($product) === 1) {

                if ($this->request->getPost('tombol')) {
                    foreach ($this->request->getPost('price') as $metode => $price) {
                        $data_price = $this->M_Base->data_where_array('price', [
                            'method_id' => 10001,
                            'product_id' => $product[0]['id'],
                            'level' => 'Member',
                        ]);
                        if ($price == 0) {
                            $price = $product[0]['price'];
                        }
                        if (count($data_price) == 1) {
                            $this->M_Base->data_update('price', [
                                'price' => $price,
                            ], $data_price[0]['id']);
                        } else if (count($data_price) == 0) {
                                $this->M_Base->data_insert('price', [
                                    'product_id' => $product[0]['id'],
                                    'method_id' => 10001,
                                    'price' => $price,
                                    'level' => 'Member',
                                ]);
                        }
                    }

                    foreach ($this->request->getPost('price_silver') as $metode => $price) {
                        $data_price = $this->M_Base->data_where_array('price', [
                            'method_id' => 10001,
                            'product_id' => $product[0]['id'],
                            'level' => 'Silver',
                        ]);
                        
                        if ($price == 0) {
                            $price = $product[0]['price'];
                        }

                        if (count($data_price) == 1) {
                            $this->M_Base->data_update('price', [
                                'price' => $price,
                            ], $data_price[0]['id']);
                        } else if (count($data_price) == 0) {
                            
                                $this->M_Base->data_insert('price', [
                                    'product_id' => $product[0]['id'],
                                    'method_id' => 10001,
                                    'price' => $price,
                                    'level' => 'Silver',
                                ]);
                            
                        }
                    }

                    foreach ($this->request->getPost('price_gold') as $metode => $price) {
                        $data_price = $this->M_Base->data_where_array('price', [
                            'method_id' => 10001,
                            'product_id' => $product[0]['id'],
                            'level' => 'Gold',
                        ]);
                        
                        if ($price == 0) {
                            $price = $product[0]['price'];
                        }

                        if (count($data_price) == 1) {
                            $this->M_Base->data_update('price', [
                                'price' => $price,
                            ], $data_price[0]['id']);
                        } else if (count($data_price) == 0) {
                            
                                $this->M_Base->data_insert('price', [
                                    'product_id' => $product[0]['id'],
                                    'method_id' => 10001,
                                    'price' => $price,
                                    'level' => 'Gold',
                                ]);
                            
                        }
                    }

                    $this->session->setFlashdata('success', 'Harga produk berhasil dikosum');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }

                $method = [];
                foreach ($this->M_Base->all_data('method') as $loop) {

                    $list_price = [];
                    foreach (['Member', 'Silver', 'Gold'] as $level) {

                        $data_price = $this->M_Base->data_where_array('price', [
                            'product_id' => $id,
                            'method_id' => $loop['id'],
                            'level' => $level,
                        ]);

                        $field = 'price';
                        if (in_array($level, ['Silver', 'Gold'])) {
                            $field = 'price_' . strtolower($level);
                        }

                        $price = count($data_price) == 1 ? $data_price[0]['price'] : $product[0][$field];

                        $list_price[$field] = $price;
                    }

                    $method[] = array_merge($loop, $list_price);
                }

                $list_price = [];
                foreach (['Member', 'Silver', 'Gold'] as $level) {

                    $find_price = $this->M_Base->data_where_array('price', [
                        'method_id' => 10001,
                        'product_id' => $product[0]['id'],
                        'level' => $level,
                    ]);

                    $field = 'price';
                    if (in_array($level, ['Silver', 'Gold'])) {
                        $field = 'price_' . strtolower($level);
                    }

                    $price = count($find_price) == 1 ? $find_price[0]['price'] : $product[0][$field];

                    $list_price[$field] = $price;
                }

                $price_balance = array_merge([
                    'id' => 10001,
                    'image' => 'balance.png',
                ], $list_price);

                $method = array_merge($method, [$price_balance]);

                $data = array_merge($this->base_data, [
                    'title' => 'Kostum Harga',
                    'method' => $method,
                ]);

                return view('Admin/Metode/price', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}