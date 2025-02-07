<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Konfigurasi extends BaseController
{

    public function index()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {
            if ($this->request->getPost('tombol') == 'umum') {

                $this->M_Base->u_update('web-title', $this->request->getPost('title'));
                $this->M_Base->u_update('web-name', $this->request->getPost('name'));
                $this->M_Base->u_update('web-keywords', $this->request->getPost('keywords'));
                $this->M_Base->u_update('web-description', $this->request->getPost('descriptiona'));
                $this->M_Base->u_update('komisi_ref', $this->request->getPost('komisi_ref'));

                $logo = $this->M_Base->upload_file($this->request->getFiles()['logo'], 'assets/images/');
                if ($logo) {
                    $this->M_Base->u_update('web-logo', $logo);
                }

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'banner') {

                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/banner/');

                if ($image) {
                    $this->M_Base->data_insert('banner', [
                        'image' => $image,
                    ]);

                    $this->session->setFlashdata('success', 'Banner berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $this->session->setFlashdata('error', 'Gambar banner tidak sesuai');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            } else if ($this->request->getPost('tombol') == 'testimoni') {

                $data_post = [
                    'testimoni' => $this->request->getPost('testimoni'),
                ];

                if (empty($data_post['testimoni'])) {
                    $this->session->setFlashdata('error', 'Testimoni kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/testimoni/');



                    if ($image) {

                        $this->M_Base->data_insert('testimoni', array_merge($data_post, [
                            'image' => $image,
                        ]));

                        $this->session->setFlashdata('success', 'Testimoni berhasil ditambahkan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $this->session->setFlashdata('error', 'Gambar Testimoni tidak sesuai');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }
            } else if ($this->request->getPost('tombol') == 'digi') {
                $this->M_Base->u_update('digi-user', $this->request->getPost('user'));
                $this->M_Base->u_update('digi-key', $this->request->getPost('key'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'voca') {
                $this->M_Base->u_update('voca_merchant', $this->request->getPost('merchant'));
                $this->M_Base->u_update('voca_api ', $this->request->getPost('api'));
                $this->M_Base->u_update('voca_secret ', $this->request->getPost('secret'));
                $this->M_Base->u_update('voca_callback ', $this->request->getPost('callback'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'warunkgamer') {
                $this->M_Base->u_update('warunkgamer-key', $this->request->getPost('key'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'okeconnect') {
                $this->M_Base->u_update('memberid-oc', $this->request->getPost('memberid'));
                $this->M_Base->u_update('pin-oc', $this->request->getPost('pin'));
                $this->M_Base->u_update('password-oc', $this->request->getPost('password'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'bangjeff') {
                $this->M_Base->u_update('bangjeff-api', $this->request->getPost('api'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'lapakgaming') {
                $this->M_Base->u_update('lapakgaming-api', $this->request->getPost('api'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'ag') {
                $this->M_Base->u_update('ag-merchant', $this->request->getPost('merchant'));
                $this->M_Base->u_update('ag-secret', $this->request->getPost('secret'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'tv') {
                $this->M_Base->u_update('tv-merchant', $this->request->getPost('merchant'));
                $this->M_Base->u_update('tv-secret', $this->request->getPost('secret'));
                $this->M_Base->u_update('tv-signature', $this->request->getPost('signature'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'vr') {
                $this->M_Base->u_update('vr-id', $this->request->getPost('id'));
                $this->M_Base->u_update('vr-key', $this->request->getPost('key'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'tripay') {
                $this->M_Base->u_update('tripay-key', $this->request->getPost('key'));
                $this->M_Base->u_update('tripay-private', $this->request->getPost('private'));
                $this->M_Base->u_update('tripay-merchant', $this->request->getPost('merchant'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'duitku') {
                $this->M_Base->u_update('duitku-key', $this->request->getPost('key'));
                $this->M_Base->u_update('duitku-merchant', $this->request->getPost('merchant'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'xendit') {
                $this->M_Base->u_update('xendit_api', $this->request->getPost('api'));
                $this->M_Base->u_update('xendit_token', $this->request->getPost('callback'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'bm') {
                $this->M_Base->u_update('bm-id', $this->request->getPost('id'));
                $this->M_Base->u_update('bm-key', $this->request->getPost('key'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'cm') {

                $this->M_Base->u_update('cm_key', $this->request->getPost('cm_key'));
                $this->M_Base->u_update('cm_rek', $this->request->getPost('cm_rek'));
                $this->M_Base->u_update('cm_rek_bni', $this->request->getPost('cm_rek_bni'));
                $this->M_Base->u_update('cm_rek_mandiri', $this->request->getPost('cm_rek_mandiri'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'sm') {
                $this->M_Base->u_update('sm-wa', $this->request->getPost('wa'));
                $this->M_Base->u_update('sm-ig', $this->request->getPost('ig'));
                $this->M_Base->u_update('sm-yt', $this->request->getPost('yt'));
                $this->M_Base->u_update('sm-fb', $this->request->getPost('fb'));
                $this->M_Base->u_update('sm-tw', $this->request->getPost('tw'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'sk') {
                $this->M_Base->u_update('page_sk', $this->request->getPost('page_sk'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'wapi') {
                $this->M_Base->u_update('wapi_api', $this->request->getPost('api'));
                $this->M_Base->u_update('wapi_device', $this->request->getPost('device'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'video') {
                $this->M_Base->u_update('video', $this->request->getPost('video'));

                $this->session->setFlashdata('success', 'Data Video berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else if ($this->request->getPost('tombol') == 'wa') {
                $this->M_Base->u_update('wa_token', $this->request->getPost('wa_token'));

                $this->session->setFlashdata('success', 'Data konfigurasi berhasil disimpan');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Konfigurasi',
            'tripay' => [
                'key' => $this->M_Base->u_get('tripay-key'),
                'private' => $this->M_Base->u_get('tripay-private'),
                'merchant' => $this->M_Base->u_get('tripay-merchant'),
            ],

            'ag' => [
                'merchant' => $this->M_Base->u_get('ag-merchant'),
                'secret' => $this->M_Base->u_get('ag-secret'),

            ],
            'wapi' => [
                'api' => $this->M_Base->u_get('wapi_api'),
                'device' => $this->M_Base->u_get('wapi_device'),

            ],

            'digi' => [
                'user' => $this->M_Base->u_get('digi-user'),
                'key' => $this->M_Base->u_get('digi-key'),
            ],
            'games' => array_reverse($this->M_Base->all_data_order('games', 'games')),
            'product' => array_reverse($this->M_Base->all_data_order('product', 'product')),
            'banner' => $this->M_Base->all_data('banner'),
            'page_sk' => $this->M_Base->u_get('page_sk'),
            'wa_token' => $this->M_Base->u_get('wa_token'),
            'cm' => [
                'key' => $this->M_Base->u_get('cm_key'),
                'rek' => $this->M_Base->u_get('cm_rek'),
            ],
        ]);

        return view('Admin/Konfigurasi/index', $data);
    }

    public function getproduk()
    {
        $gameId = $this->request->getPost('gameId');
        $products = $this->M_Base->join_table_2('product', 'games', 'games_id', 'id', 'product.id as product_id, product.product', array('games_id' => $gameId));
        echo json_encode($products);
    }



    public function mutasi()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {

            $data = array_merge($this->base_data, [
                'title' => 'Mutasi',
                'mutasi' => $this->M_Base->all_data('mutasi'),
            ]);

            return view('Admin/Konfigurasi/mutasi', $data);
        }


    }

    public function mutasidelete()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $this->M_Base->data_truncate('mutasi');

            $this->session->setFlashdata('success', 'Data Mutasi berhasil dihapus');
            return redirect()->to(base_url() . '/Admin/Konfigurasi/mutasi');

        }


    }

    public function mutasigetdatabca()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $this->M_Base->post(base_url() . '/sistem/mutasi/bca', []);

            $this->session->setFlashdata('success', 'Data Mutasi BCA berhasil diupdate');
            return redirect()->to(base_url() . '/Admin/Konfigurasi/mutasi');

        }


    }


    public function banner($action = null, $id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if ($action === 'delete') {
            if (is_numeric($id)) {
                $this->M_Base->data_delete('banner', $id);

                $this->session->setFlashdata('success', 'Banner berhasil dihapus');
                return redirect()->to(base_url() . '/admin/konfigurasi');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }



    public function testimoni($action = null, $id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if ($action === 'delete') {
            if (is_numeric($id)) {
                $this->M_Base->data_delete('testimoni', $id);

                $this->session->setFlashdata('success', 'Testimoni berhasil dihapus');
                return redirect()->to(base_url() . '/admin/konfigurasi');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}