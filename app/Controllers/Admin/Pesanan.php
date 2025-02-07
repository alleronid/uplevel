<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{

    public function index()
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $data = array_merge($this->base_data, [
            'title' => 'Pesanan',
            'orders' => $this->M_Base->all_data('orders'),
        ]);

        return view('Admin/Pesanan/index', $data);
    }

    public function get_orders_data()
    {
        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        }

        $orders = $this->M_Base->all_data('orders');
        $data = array();
        foreach ($orders as $index => $order) {
            if ($order['zone_id'] == 1) {
                $order['zone_id'] = '';
            }

            if (is_array($order['user_id'])) {
                $order['user_id'] = '';
            }

            if (strlen($order['user_id']) > 25) {
                $order['user_id'] = 'Klik No Transaksi untuk melihat Detail Pesanan ';
            } else {
                $order['user_id'] = $order['user_id'];
                // hide the data here
            }




            $data[$index] = array(
                'no' => $index + 1,
                'id' => $order['id'],
                'date_create' => $order['date_create'],
                'username' => $order['username'],
                'product' => $order['product'],
                'order_id' => $order['order_id'],
                'price' => 'Rp ' . number_format($order['price'], 0, ',', '.'),
                'tujuan' => $order['user_id'] . $order['zone_id'],
                'method' => $order['method'] . '<br>' . $order['provider'],
                'status' => $order['status'],
            );
        }
        echo json_encode($data);
    }


    public function proses($id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {

            $orders = $this->M_Base->data_where('orders', 'id', $id);

            if (count($orders) === 1) {

                if ($this->request->getPost('tombol')) {
                    $data_post = [
                        'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                        'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                        'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                        'games_id' => addslashes(trim(htmlspecialchars($this->request->getPost('games_id')))),
                        'provider' => addslashes(trim(htmlspecialchars($this->request->getPost('provider')))),
                    ];

                    if (empty($data_post['user_id'])) {
                        $this->session->setFlashdata('error', 'ID Player harus diisi');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (empty($data_post['product'])) {
                        $this->session->setFlashdata('error', 'Produk belum dipilih');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {

                        if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                            $customer_no = $data_post['user_id'] . $data_post['zone_id'];
                        } else {
                            $customer_no = $data_post['user_id'];
                        }

                        $status = 'Processing';

                        if ($data_post['provider'] === 'DF') {

                            $result = $this->M_Base->df_order($data_post['product'], $customer_no, $orders[0]['order_id']);

                            if (isset($result['data'])) {
                                if ($result['data']['status'] == 'Gagal') {
                                    $ket = $result['data']['message'];
                                } else {
                                    $ket = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                                }
                            } else {
                                $ket = 'Failed Order';
                            }

                        } else if ($data_post['provider'] === 'AG') {

                            $result = $this->M_Base->ag_v1_order($data_post['product'], $customer_no, $orders[0]['order_id']);

                            if (isset($result)) {
                                if ($result['status'] == 0) {
                                    $ket = $result['error_msg'];
                                } else {
                                    $ket = $result['data']['status'];
                                    if ($result['data']['status'] == 'Sukses') {
                                        $status = 'Success';

                                        //$this->M_Base->fonnte_sukses($data_post['wa'],$data_post['product'],$data_post['order_id'],"Sukses");
                                    }

                                }
                            } else {
                                $ket = 'Failed Order';
                            }

                            //

                        } else {
                            $this->session->setFlashdata('error', 'Provider tidak dikenali');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }

                        $this->M_Base->data_update('orders', [
                            'status' => $status,
                            'ket' => $ket,
                        ], $id);

                        $this->session->setFlashdata('success', 'Pesanan berhasil direorder');
                        return redirect()->to(base_url() . '/admin/pesanan');
                    }
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Proses Pesanan',
                    'orders' => $orders[0],
                    'product' => $this->M_Base->all_data('product'),
                ]);

                return view('Admin/Pesanan/proses', $data);

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function edit($id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $orders = $this->M_Base->data_where('orders', 'id', $id);

            if (count($orders) === 1) {

                if ($this->request->getPost('tombol')) {
                    $this->M_Base->data_update('orders', [
                        'username' => $this->request->getPost('username'),
                        'wa' => $this->request->getPost('wa'),
                        'product' => $this->request->getPost('product'),
                        'method' => $this->request->getPost('method'),
                        'user_id' => $this->request->getPost('user_id'),
                        'zone_id' => $this->request->getPost('zone_id'),
                        'nickname' => $this->request->getPost('nickname'),
                        'status' => $this->request->getPost('status'),
                        'ket' => $this->request->getPost('ket'),
                    ], $id);

                    if ($this->request->getPost('status') == 'Success') {

                        //$this->M_Base->fonnte_sukses($this->request->getPost('wa'),$orders[0]['product'],$orders[0]['order_id'],$orders[0]['method']);

                    }



                    $this->session->setFlashdata('success', 'Data pesanan berhasil disimpan');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                }

                $data = array_merge($this->base_data, [
                    'title' => 'Edit Pesanan',
                    'orders' => $orders[0],
                ]);





                return view('Admin/Pesanan/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function delete($id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else if (!is_numeric($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $orders = $this->M_Base->data_where('orders', 'id', $id);

            if (count($orders) === 1) {
                $this->M_Base->data_delete('orders', $id);

                $this->session->setFlashdata('success', 'Data pesanan berhasil dihapus');
                return redirect()->to(base_url() . '/admin/pesanan');
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }

    public function detail($order_id = null)
    {

        if ($this->admin == false) {
            $this->session->setFlashdata('error', 'Silahkan login dahulu');
            return redirect()->to(base_url() . '/admin/login');
        } else {
            $orders = $this->M_Base->data_where('orders', 'order_id', $order_id);

            if (count($orders) === 1) {

                $target = '';
                if ($orders[0]['zone_id'] == 'joki') {
                    $target .= '<div class="mb-3">';
                    $target .= '<button onclick="copyTable()" class="btn btn-primary btn-sm">Copy Data Joki</button>';
                    $target .= '</div>';
                    $target .= '<table id="myTable">';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        if (!in_array($key, ['request_hero', 'nickname', 'jumlah_star_poin'])) {
                            $target .= '
            <tr>
                <th style="padding-right:10px">' . str_replace([
                                    'email',
                                    'password',
                                    'request_hero',
                                    'catatan_joki',
                                    'nickname',
                                    'login_via',
                                    'jumlah_star_poin',
                                ], [
                                        'Email : ',
                                        'Password : ',
                                        '',
                                        'Catatan : ',
                                        '',
                                        'Login Via : ',
                                        '',
                                    ], $key) . '</th>
                <td class="pl-4">
                    ' . $value . '
                </td>
            </tr>';
                        }
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'skinml') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                        <tr>
                            <th>' . str_replace([
                                'email',
                                'login_via',
                                'request_hero',
                                'catatan_joki',
                                'nickname',
                            ], [
                                    'User ID',
                                    'Server ID',
                                    'Nama Hero',
                                    'Nama Skin / Item',
                                    'Nickname',
                                ], $key) . '</th>
                            <td class="pl-4">
                                ' . $value . '
                            </td>
                        </tr>
                        ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'videomontage') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                        <tr>
                            <th>' . str_replace([
                                'email',
                                'password',
                                'request_hero',
                                'catatan_videomontage',
                                'nickname',
                                'login_via',
                                'record_via',
                                'contoh_video',
                                'jumlah_menit',
                            ], [
                                    'Email',
                                    'Password',
                                    'Request Hero',
                                    'Catatan',
                                    'Nickname',
                                    'Login Via',
                                    'Record Via',
                                    'Contoh Video',
                                    'Jumlah Menit',
                                ], $key) . '</th>
                            <td class="pl-4">
                                ' . $value . '
                            </td>
                        </tr>
                        ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'topuplogin') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                            <tr>
                                <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                            ], [
                                    'Email',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                ], $key) . '</th>
                                <td class="pl-4">
                                    ' . $value . '
                                </td>
                            </tr>
                            ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-ragnarox') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-dragonhunter') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-fourgods') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-genshinimpact') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-ninokuni') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-neverafter') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                            <tr>
                                <th>' . str_replace([
                                'username',
                                'server',
                                'login',
                                'password',
                            ], [
                                    'ID / Username',
                                    'Server',
                                    'Login Via',
                                    'Password',
                                ], $key) . '</th>
                                <td class="pl-4">
                                    ' . $value . '
                                </td>
                            </tr>
                            ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'lg-clashofclans') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'username',
                                'login',
                            ], [
                                    'ID / Username',
                                    'Login Via',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginapex') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                            <tr>
                                <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Whatsapp',
                                ], $key) . '</th>
                                <td class="pl-4">
                                    ' . $value . '
                                </td>
                            </tr>
                            ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginefootball') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginff') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'logingenshin') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Server',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginml') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                <tr>
                                    <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'kode_cadangan',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Kode Cadangan / 2FA',
                                    'Whatsapp',
                                ], $key) . '</th>
                                    <td class="pl-4">
                                        ' . $value . '
                                    </td>
                                </tr>
                                ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginninokuni') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'character',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'server',
                                    'character',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginpokemon') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginraven') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Server',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'logintiktok') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'logintower') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'server',
                                'login_via',
                                'region',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Server',
                                    'Login Via',
                                    'Region',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'loginwildrift') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'email',
                                'password',
                                'nickname',
                                'login_via',
                                'wa',
                            ], [
                                    'Email / Username',
                                    'Password',
                                    'Nickname',
                                    'Login Via',
                                    'Whatsapp',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else if ($orders[0]['zone_id'] == 'tournament') {
                    $target = '<table>';
                    foreach (json_decode($orders[0]['user_id'], true) as $key => $value) {
                        $target .= '
                                    <tr>
                                        <th>' . str_replace([
                                'id',
                                'server',
                                'jam',
                                'tanggal',
                            ], [
                                    'id',
                                    'server',
                                    'jam',
                                    'tanggal',
                                ], $key) . '</th>
                                        <td class="pl-4">
                                            ' . $value . '
                                        </td>
                                    </tr>
                                    ';
                    }
                    $target .= '</table>';
                } else {
                    if (!empty($orders[0]['zone_id']) and $orders[0]['zone_id'] != 1) {
                        $target = $orders[0]['user_id'] . ' (' . $orders[0]['zone_id'] . ')';
                    } else {
                        $target = $orders[0]['user_id'];
                    }
                }

                echo '
                <table class="table table-white table-striped">
                    <tr>
                        <th>No Transaksi</th>
                        <td>' . $orders[0]['order_id'] . '</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>' . $orders[0]['username'] . '</td>
                    </tr>
                    <tr>
                        <th>Whatsapp</th>
                        <td>' . $orders[0]['wa'] . '</td>
                    </tr>
                    <tr>
                        <th>Produk</th>
                        <td id="namaproduk">' . $orders[0]['games'] . ' - ' . $orders[0]['product'] . '</td>
                    </tr>
                    <tr>
                        <th>ID Player</th>
                        <td>' . $target . '</td>
                    </tr>
                    <tr>
                        <th>Nickname</th>
                        <td>' . $orders[0]['nickname'] . '</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp ' . number_format($orders[0]['price'], 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>' . $orders[0]['status'] . '</td>
                    </tr>
                    <tr>
                        <th>Voucher</th>
                        <td>' . $orders[0]['voucher'] . '</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>' . $orders[0]['ket'] . '</td>
                    </tr>
                    <tr>
                        <th>Metode</th>
                        <td>' . $orders[0]['method'] . '</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>' . $orders[0]['date_create'] . '</td>
                    </tr>
                </table>
                ';
                if (in_array($orders[0]['status'], array('Pending', 'Processing', 'Canceled'))) {
                    echo '
                	<div class="p-2">
	                	<a href="' . base_url() . '/admin/pesanan/proses/' . $orders[0]['id'] . '" class="btn btn-primary w-100">Proses Manual</a>
	                </div>
                	';
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }
    }
}