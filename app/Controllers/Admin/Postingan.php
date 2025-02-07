<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Postingan extends BaseController {

    public function index() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else { 

    		$data = array_merge($this->base_data, [
	    		'title' => 'Postingan',
                'post' => $this->M_Base->all_data('post'),
	    	]);

	        return view('Admin/Postingan/index', $data);
    	}
    }

    public function add() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else { 

            if ($this->request->getPost('tombol')) {
                $data_post = [
                    'title' => $this->request->getPost('title'),
                    'category' => $this->request->getPost('category'),
                    'content' => $this->request->getPost('content'),
                ];

                if (empty($data_post['title'])) {
                    $this->session->setFlashdata('error', 'Judul tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['category'])) {
                    $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {

                    $image = $this->M_Base->images($this->request->getFile('image'), 'assets/images/post/');

                    if ($image) {

                        $this->M_Base->data_insert('post', array_merge($data_post, [
                            'date_create' => date('Y-m-d G:i:s'),
                            'image' => $image,
                        ]));

                        $this->session->setFlashdata('success', 'Postingan berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));

                    } else {
                        $this->session->setFlashdata('error', 'Gambar post tidak sesuai');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }
            }

            $data = array_merge($this->base_data, [
                'title' => 'Tambah Postingan',
            ]);

            return view('Admin/Postingan/add', $data);
        }
    }

    public function edit($id = null) {

        
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
        	throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $post = $this->M_Base->data_where('post', 'id', $id);

            if (count($post) == 1) {

                if ($this->request->getPost('tombol')) {

                    $data_post = [
                        'title' => $this->request->getPost('title'),
                        'category' => $this->request->getPost('category'),
                        'content' => $this->request->getPost('content'),
                    ];

                    if (empty($data_post['title'])) {
                        $this->session->setFlashdata('error', 'Judul tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['category'])) {
                        $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {

                        $image = $this->M_Base->images($this->request->getFile('image'), 'assets/images/post/');

                        if ($image) {

                            if (!empty($post[0]['image'])) {
                                $image_old = 'assets/images/post/' . $post[0]['image'];

                                if (file_exists($image_old)) {
                                    unlink($image_old);
                                }
                            }
                        } else {
                            $image = $post[0]['image'];
                        }

                        $this->M_Base->data_update('post', array_merge($data_post, [
                            'image' => $image
                        ]), $id);

                        $this->session->setFlashdata('success', 'Postingan berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Postingan',
                    'post' => $post[0],
                ]);

                return view('Admin/Postingan/edit', $data);

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

            $post = $this->M_Base->data_where('post', 'id', $id);

            if (count($post) == 1) {

                $image = 'assets/images/post/' . $post[0]['image'];

                if (file_exists($image)) {
                    unlink($image);
                }

                $this->M_Base->data_delete('post', $id);

                $this->session->setFlashdata('success', 'Postingan berhasil dihapus');
                return redirect()->to(base_url() . '/admin/postingan');

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}