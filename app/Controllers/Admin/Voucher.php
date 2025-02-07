<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Voucher extends BaseController {

    public function index() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Voucher',
            'voucher' => $this->M_Base->all_data('voucher'),
    	]);

        return view('Admin/Voucher/index', $data);
    }

    public function add() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {

            $data_post = [
                'voucher' => $this->request->getPost('voucher'),
                'diskon' => $this->request->getPost('diskon'),
                'min' => $this->request->getPost('min'),
                'max_diskon' => $this->request->getPost('max_diskon'),
                'max_use' => $this->request->getPost('max_use'),
                'status' => $this->request->getPost('status'),
                'type_produk' => $this->request->getPost('type_produk'),
            ];

            if (empty($data_post['voucher'])) {
                $this->session->setFlashdata('error', 'Kode voucher tidak boleh kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $produk = '';
                if ($this->request->getPost('produk')) {
                    $produk = implode(',', $this->request->getPost('produk'));
                }

                $this->M_Base->data_insert('voucher', array_merge($data_post, [
                    'produk' => $produk,
                    'date_create' => date('Y-m-d G:i:s'),
                ]));

                $this->session->setFlashdata('success', 'Voucher berhasil dibuat');
                return redirect()->to(base_url() . '/admin/voucher');
            }
        }

        $product = [];
        foreach ($this->M_Base->all_data('product') as $loop) {

            $data_games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

            $games = count($data_games) == 1 ? $data_games[0]['games'] : '-';

            $product[] = array_merge($loop, [
                'games' => $games,
            ]);
        }

        $data = array_merge($this->base_data, [
            'title' => 'Buat Voucher',
            'product' => $product,
        ]);

        return view('Admin/Voucher/add', $data);
    }

    public function edit($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $voucher = $this->M_Base->data_where('voucher', 'id', $id);

            if (count($voucher) === 1) {

                if ($this->request->getPost('tombol')) {

                    $data_post = [
                        'voucher' => $this->request->getPost('voucher'),
                        'diskon' => $this->request->getPost('diskon'),
                        'min' => $this->request->getPost('min'),
                        'max_diskon' => $this->request->getPost('max_diskon'),
                        'max_use' => $this->request->getPost('max_use'),
                        'status' => $this->request->getPost('status'),
                        'type_produk' => $this->request->getPost('type_produk'),
                    ];

                    if (empty($data_post['voucher'])) {
                        $this->session->setFlashdata('error', 'Kode voucher tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $produk = '';
                        if ($this->request->getPost('produk')) {
                            $produk = implode(',', $this->request->getPost('produk'));
                        }

                        $this->M_Base->data_update('voucher', array_merge($data_post, [
                            'produk' => $produk,
                        ]), $id);

                        $this->session->setFlashdata('success', 'Voucher berhasil disimpan');
                        return redirect()->to(base_url() . '/admin/voucher');
                    }
                }

                $product = [];
                foreach ($this->M_Base->all_data('product') as $loop) {

                    $data_games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

                    $games = count($data_games) == 1 ? $data_games[0]['games'] : '-';

                    $product[] = array_merge($loop, [
                        'games' => $games,
                    ]);
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Voucher',
                    'voucher' => $voucher[0],
                    'product' => $product,
                ]);

                return view('Admin/Voucher/edit', $data);

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
            $voucher = $this->M_Base->data_where('voucher', 'id', $id);

            if (count($voucher) === 1) {
                $this->M_Base->data_delete('voucher', $id);

                $this->session->setFlashdata('success', 'Data voucher berhasil dihapus');
                return redirect()->to(base_url() . '/admin/voucher');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}