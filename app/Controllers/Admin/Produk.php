<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Produk extends BaseController {

    public function index() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $product = [];
        foreach ($this->M_Base->all_data('product') as $loop) {
            $games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

            $nama_games = count($games) == 1 ? $games[0]['games'] : '-';

            $product[] = array_merge($loop, [
                'games' => $nama_games,
            ]);
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Produk',
            'product' => $product,
    	]);

        return view('Admin/Produk/index', $data);
    }
    
    public function get_products_data() {
    if ($this->admin == false) {
        $this->session->setFlashdata('error', 'Silahkan login dahulu');
        return redirect()->to(base_url() . '/admin/login');
    }

    $query = "SELECT p.*, g.games FROM product p JOIN games g ON p.games_id = g.id";
    $products = $this->db->query($query)->getResultArray();
    $data = array();
    foreach ($products as $index => $product) {
        $profit_price = $product['price'] - $product['raw_price'];
        $data[$index] = array(
            'no' => $index + 1,
            'id' => $product['id'],
            'sort' => $product['sort'],
            'games' => $product['games'],
            'product' => $product['product'],
            'sku' => $product['sku'],
            'status' => $product['status'],
            'provider' => $product['provider'],
            'price' => 'Rp ' . number_format($product['price'], 0, ',', '.'),
            'raw_price' => 'Rp ' . number_format($product['raw_price'], 0, ',', '.'),
            'profit_price' => 'Rp ' . number_format($profit_price, 0, ',', '.'),
        );
    }
    echo json_encode($data);
}
    

    
    public function category($page = null, $id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/Admin/login');
        }

        if ($page === null) {

            $category = [];
            foreach ($this->M_Base->all_data('product_category') as $loop) {

                $data_games = $this->M_Base->data_where('games', 'id', $loop['games_id']);

                $games = count($data_games) == 1 ? $data_games[0]['games'] : '-';

                $category[] = array_merge($loop, [
                    'games' => $games,
                    'product' => $this->M_Base->data_count('product', [
                        'category_id' => $loop['id'],
                    ]),
                ]);
            }

            $data = array_merge($this->base_data, [
                'title' => 'Kelola Games',
                'category' => $category,
            ]);

            return view('Admin/Produk/Category/index', $data);

        } else if ($page === 'add') {

            if ($this->request->getPost('tombol')) {

                $data_post = [
                    'games_id' => $this->request->getPost('games_id'),
                    'category' => $this->request->getPost('category'),
                ];

                if (empty($data_post['games_id'])) {
                    $this->session->setFlashdata('error', 'Games harus dipilih');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else if (empty($data_post['category'])) {
                    $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {


                        $this->M_Base->data_insert('product_category', array_merge($data_post));

                        $this->session->setFlashdata('success', 'Kategori berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    
                }
            }

            $data = array_merge($this->base_data, [
                'title' => 'Tambah Kategori',
                'games' => array_reverse($this->M_Base->all_data_order('games','games')),
            ]);

            return view('Admin/Produk/Category/add', $data);

        } else if ($page === 'edit') {

            if ($id) {

                $product_category = $this->M_Base->data_where('product_category', 'id', $id);

                if (count($product_category) == 1) {

                    if ($this->request->getPost('tombol')) {

                        $data_post = [
                            'games_id' => $this->request->getPost('games_id'),
                            'category' => $this->request->getPost('category'),
                        ];

                        if (empty($data_post['games_id'])) {
                            $this->session->setFlashdata('error', 'Games harus dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['category'])) {
                            $this->session->setFlashdata('error', 'Kategori tidak boleh kosong');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else {

                            $this->M_Base->data_update('product_category', array_merge($data_post), $id);

                            $this->session->setFlashdata('success', 'Kategori berhasil disimpan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }

                    $data = array_merge($this->base_data, [
                        'title' => 'Edit Kategori',
                        'category' => $product_category[0],
                        'games' => array_reverse($this->M_Base->all_data_order('games','games')),
                    ]);

                    return view('Admin/Produk/Category/edit', $data);

                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

        } else if ($page === 'delete') {

            if ($id) {

                $product_category = $this->M_Base->data_where('product_category', 'id', $id);

                if (count($product_category) == 1) {

                    $image = $product_category[0]['image'];

                    if (!empty($image)) {

                        $image_file = 'assets/images/category/' . $image;

                        if (file_exists($image_file)) {
                            unlink($image_file);
                        }
                    }

                    $this->M_Base->data_delete('product_category', $id);

                    $this->session->setFlashdata('success', 'Kategori berhasil dihapus');
                    return redirect()->to(base_url() . '/Admin/produk/category');

                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
    
  public function markupharga() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                'tipeharga' => $this->request->getPost('tipeharga'),
                'persentase' => $this->request->getPost('persentase'),
                'nominal' => $this->request->getPost('nominal'),
                'provider' => $this->request->getPost('provider'),
            ];

            if (empty($data_post['games_id']) OR empty($data_post['tipeharga']) OR empty($data_post['provider'])) {
                $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $games = $this->M_Base->data_where('games', 'id', $data_post['games_id']);
                
                $productWhere = [];

                if ($data_post['provider'] == 'all') {
                    $productWhere['status'] = 'On';
                } else {
                    $productWhere['games_id'] = $data_post['games_id'];
                }
                
                $products = $this->M_Base->data_where_2('product', $productWhere);
                
                foreach ($products as $product) {
                    $priceFields = ['price'];
                    if ($data_post['tipeharga'] == 'silver') {
                        $priceFields = ['price_silver'];
                    } else if ($data_post['tipeharga'] == 'gold') {
                        $priceFields = ['price_gold'];
                    } else if ($data_post['tipeharga'] == 'bronze') {
                        $priceFields = ['price_bronze'];
                    }
                    
                    $newPrices = [];
                    foreach ($priceFields as $field) {
                        $newPrices[$field] = ($product['raw_price'] / 100 * ($data_post['persentase'] + 100)) + $data_post['nominal'];
                    }
                
                    
                    
                    if ($data_post['provider'] == 'all') {
                       $updateData = $newPrices;
                    } else {
                        $updateData = array_merge($newPrices, ['games_id' => $data_post['games_id']]);
                    }
                    $this->M_Base->data_update('product', $updateData, $product['id']);
                }
                
                $this->session->setFlashdata('success', 'Harga Berhasil di Markup');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));

                
                
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Markup Harga Produk',
            'games' => $this->M_Base->all_data('games'),
        ]);

        return view('Admin/Produk/markupharga', $data);
    }
    public function add() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        if ($this->request->getPost('tombol')) {
            $data_post = [
                'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                'price' => addslashes(trim(htmlspecialchars($this->request->getPost('price')))),
                'price_silver' => addslashes(trim(htmlspecialchars($this->request->getPost('price_silver')))),
                'price_gold' => addslashes(trim(htmlspecialchars($this->request->getPost('price_gold')))),
                'raw_price' => addslashes(trim(htmlspecialchars($this->request->getPost('raw_price')))),
                'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                'sku' => addslashes(trim(htmlspecialchars($this->request->getPost('sku')))),
                'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
            ];

            if (empty($data_post['games_id']) OR empty($data_post['product']) OR empty($data_post['price']) OR empty($data_post['provider']) OR empty($data_post['sku'])) {
                $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
            } else {
                $games = $this->M_Base->data_where('games', 'id', $data_post['games_id']);
                $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/product/');


                if ($image) {
                    $this->M_Base->data_insert('product', array_merge($data_post, [
                        'image' => $image,
                    ]));

                    $this->session->setFlashdata('success', 'Produk berhasil ditambahkan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    
                 } else if (count($games) === 1) {
                    $this->M_Base->data_insert('product', $data_post);
                    
                    $this->session->setFlashdata('success', 'Produk berhasil ditambahkan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    
                } else  {
                        $this->session->setFlashdata('error', 'Gambar tidak sesuai');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }
            }
        }

        $data = array_merge($this->base_data, [
            'title' => 'Tambah Produk',
            'games' => $this->M_Base->all_data('games'),
        ]);

        return view('Admin/Produk/add', $data);
    }

    public function edit($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (is_numeric($id)) {
            $product = $this->M_Base->data_where('product', 'id', $id);

            if (count($product) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                        'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                        'price' => addslashes(trim(htmlspecialchars($this->request->getPost('price')))),
                        'price_silver' => addslashes(trim(htmlspecialchars($this->request->getPost('price_silver')))),
                        'price_gold' => addslashes(trim(htmlspecialchars($this->request->getPost('price_gold')))),
                        'raw_price' => addslashes(trim(htmlspecialchars($this->request->getPost('raw_price')))),
                        'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                        'sku' => addslashes(trim(htmlspecialchars($this->request->getPost('sku')))),
                        'status' => addslashes(trim(htmlspecialchars($this->request->getPost('status')))),
                        'sort' => addslashes(trim(htmlspecialchars($this->request->getPost('sort')))),
                    ];

                    if (empty($data_post['games_id']) OR empty($data_post['product']) OR empty($data_post['price']) OR empty($data_post['provider']) OR empty($data_post['sku'])) {
                        $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        $games = $this->M_Base->data_where('games', 'id', $data_post['games_id']);
                        $image = $this->M_Base->upload_file($this->request->getFiles()['image'], 'assets/images/product/');

                        if ($image) {
                            if (count($games) === 1) {
                            $file = 'assets/images/product/' . $product[0]['image'];

    
                            $this->M_Base->data_update('product', array_merge($data_post, [
                                'image' => $image,
                            ]), $id);
        
                            $this->session->setFlashdata('success', 'Produk berhasil disimpan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                            
                        } else if (count($games) === 1) {
                            $this->M_Base->data_update('product', $data_post, $id);

                            $this->session->setFlashdata('success', 'Produk berhasil disimpan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        
                        } else {
                            $this->session->setFlashdata('error', 'Games tidak ditemukan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Produk',
                    'product' => $product[0],
                    'games' => $this->M_Base->all_data('games'),
                ]);

                return view('Admin/Produk/edit', $data);

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete($id = null) {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (is_numeric($id)) {
            $product = $this->M_Base->data_where('product', 'id', $id);

            if (count($product) === 1) {

                $this->M_Base->data_delete('product', $id);
                
                $this->session->setFlashdata('success', 'Produk berhasil dihapus');
                return redirect()->to(base_url() . '/admin/produk');

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function get() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/product', []);

        $this->session->setFlashdata('success', 'Produk berhasil diget, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/produk');
    }

    public function getbj() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/productbj', []);

        $this->session->setFlashdata('success', 'Produk berhasil diget, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/produk');
    }

    public function rawprice() {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $this->M_Base->post(base_url() . '/sistem/rawprice', []);

        $this->session->setFlashdata('success', 'Harga Raw berhasil di update, silahkan tunggu 5-10 detik lalu refresh');
        return redirect()->to(base_url() . '/admin/produk');
    }
}

