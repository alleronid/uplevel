<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Base extends Model
{

	public function random_string($length = 24)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function data_where_2($table, $conditions)
	{
		return $this->db->table($table)->where($conditions)->get()->getResultArray();
	}

	public function priorityProduct($a, $b)
	{
		$priority = ['Mobile Legends', 'Free Fire']; // Array dengan urutan prioritas produk

		// Mendapatkan index produk a dan b dalam array priority
		$a_index = array_search($a['product'], $priority);
		$b_index = array_search($b['product'], $priority);

		// Jika produk a dan b ditemukan dalam array priority
		if ($a_index !== false && $b_index !== false) {
			// Mengurutkan berdasarkan urutan prioritas
			return $a_index - $b_index;
		}

		// Mengurutkan berdasarkan id produk secara default jika tidak ditemukan dalam array priority
		return $a['id'] - $b['id'];
	}

	public function compareProductsDigi($a, $b)
	{
		preg_match('/\d+/', $a['product_name'], $a_matches);
		preg_match('/\d+/', $b['product_name'], $b_matches);
		$a_num = intval($a_matches[0]);
		$b_num = intval($b_matches[0]);

		if ($a_num == $b_num) {
			return 0;
		}
		return ($a_num < $b_num) ? -1 : 1;
	}




	// CRUD Table
	public function select_distinct($table, $field)
	{
		return $this->db->table($table)->select($field)->distinct()->orderBy($field, 'ASC')->get()->getResultArray();
	}
	public function all_data($table, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->orderBy('id', 'DESC')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}

	public function all_data_random($table, $limit = null)
	{
		if ($limit) {
			return $this->db->table($table)->orderBy('id', 'RANDOM')->limit($limit)->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'RANDOM')->get()->getResultArray();
		}
	}

	public function all_data_order($table, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->orderBy('id', 'DESC')->get()->getResultArray();
		}
	}


	public function jumlah($table, $column, $where = null)
	{

		if ($where) {
			return $this->db->table($table)->where($where)->selectSum($column, 'sumQuantities')->get()->getRow()->sumQuantities;
		} else {
			return $this->db->table($table)->selectSum($column, 'sumQuantities')->get()->getRow()->sumQuantities;
		}

	}

	public function data_insert($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}
	public function data_where($table, $field, $value)
	{
		return $this->db->table($table)->where($field, $value)->get()->getResultArray();
	}
	public function data_where_array($table, $data, $order = null)
	{
		if ($order) {
			return $this->db->table($table)->where($data)->orderBy($order, 'DESC')->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($data)->get()->getResultArray();
		}
	}
	public function data_update($table, $data, $id)
	{
		return $this->db->table($table)->set($data)->where('id', $id)->update();
	}
	public function data_delete($table, $id)
	{
		return $this->db->table($table)->delete(['id' => $id]);
	}
	public function data_like($table, $filed, $data)
	{
		return $this->db->table($table)->like($filed, $data)->orderBy('id', 'DESC')->get()->getResultArray();
	}
	public function data_truncate($table)
	{
		return $this->db->table($table)->truncate();
	}
	public function data_avg($table, $filed, $data, $distinct = false)
	{
		if ($distinct === true) {
			return $this->db->table($table)->select('date')->where($filed . ' >=', $data[0])->where($filed . ' <=', $data[1])->distinct()->get()->getResultArray();
		} else {
			return $this->db->table($table)->where($filed . ' >=', $data[0])->where($filed . ' <=', $data[1])->get()->getResultArray();
		}
	}
	public function data_count($table, $where = null)
	{
		if ($where) {
			return $this->db->table($table)->where($where)->countAllResults();
		} else {
			return $this->db->table($table)->countAllResults();
		}
	}

	public function images($file, $path = null)
	{
		if ($file->getError() == 0) {
			if (in_array(strtolower($file->getClientExtension()), ['jpg', 'jpeg', 'png', 'webp'])) {
				$name = $file->getRandomName();

				$file->move($path, $name);

				return $name;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function u_get($key)
	{
		return $this->db->table('utility')->where('u_key', $key)->get()->getResultArray()[0]['u_value'];
	}
	public function u_update($key, $value)
	{
		return $this->db->table('utility')->set(['u_value' => $value])->where('u_key', $key)->update();
	}
	public function data_update_plus($satuan, $tipe, $jumlah)
	{
		if ($satuan === 'Angka') {
			return $this->db->table('services')->set('price', 'price' . $tipe . $jumlah, false)->update();
		} else {
			foreach ($this->db->table('services')->get()->getResultArray() as $service) {
				$total_up = ($jumlah / 100) * $service['price'];
				$this->db->table('services')->set('price', 'price' . $tipe . $total_up, false)->where('id', $service['id'])->update();
			}
		}
	}
	public function upload_file($file, $path, $custome_name = false, $ex = ['png', 'jpeg', 'jpg', 'webp'], $get_original = false)
	{
		if ($file) {
			if ($file->getError() == 0) {
				if (in_array(strtolower($file->getClientExtension()), $ex)) {
					if ($custome_name === false) {
						$nama_file = $file->getRandomName();
					} else {
						$nama_file = $custome_name . '.' . $file->getClientExtension();
					}

					$file->move($path, $nama_file);

					if ($get_original) {
						return [
							'name' => $nama_file,
							'original' => $file->getClientName(),
						];
					} else {
						return $nama_file;
					}

				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function post($link, $data)
	{
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $link,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER => false,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
		)
		);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		return $result;
	}

	public function wa($phone, $message)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.fonnte.com/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'target' => $phone,
				'message' => $message,
				'delay' => '1',
				'schedule' => '0',
				'countryCode' => '62',
			],
			CURLOPT_HTTPHEADER => [
				"Authorization: " . $this->u_get('wa_token'),
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function fonnte_pending($phone, $product, $orderid, $method)
	{

		$message = "
Halo kak,

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.fonnte.com/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'target' => $phone,
				'message' => $message,
				'delay' => '1',
				'schedule' => '0',
				'countryCode' => '62',
			],
			CURLOPT_HTTPHEADER => [
				"Authorization: " . $this->u_get('wa_token'),
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function fonnte_sukses($phone, $product, $orderid, $method)
	{

		$message = "
Pesanan anda telah berhasil kami kirimkan, silakan cek Akun Anda

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.fonnte.com/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'target' => $phone,
				'message' => $message,
				'delay' => '1',
				'schedule' => '0',
				'countryCode' => '62',
			],
			CURLOPT_HTTPHEADER => [
				"Authorization: " . $this->u_get('wa_token'),
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function watsap($phone, $message)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.watsap.id/send-message",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'id_device' => $this->u_get('watsap_device'),
				'api-key' => $this->u_get('watsap_api'),
				'no_hp' => $phone,
				'pesan' => $message
			],
			CURLOPT_HTTPHEADER => [
				"Content-Type: application/json ",
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}


	public function watsap_pending($phone, $product, $orderid, $method)
	{

		$message = "
Halo kak,

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$api_key = $this->u_get('watsap_api'); // API KEY Anda
		$id_device = $this->u_get('watsap_device'); // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $message; // Pesan yang dikirim


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp' => $no_hp,
			'pesan' => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;


	}

	public function watsap_sukses($phone, $product, $orderid, $method)
	{

		$message = "
Pesanan anda telah berhasil kami kirimkan, silakan cek Akun Anda

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$api_key = $this->u_get('watsap_api'); // API KEY Anda
		$id_device = $this->u_get('watsap_device'); // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $message; // Pesan yang dikirim


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp' => $no_hp,
			'pesan' => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	public function watsap_manual($phone, $product, $orderid, $method, $harga)
	{

		$message = "
Ada Pesanan dengan METODE PEMBAYARAN MANUAL

Berikut adalah rincian pesanannya :
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "
- Harga : " . $harga . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$api_key = $this->u_get('watsap_api'); // API KEY Anda
		$id_device = $this->u_get('watsap_device'); // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $message; // Pesan yang dikirim


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp' => $no_hp,
			'pesan' => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	public function wapisender($phone, $message)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'api_key' => $this->u_get('wapi_api'),
				'device_key' => $this->u_get('wapi_device'),
				'destination' => $phone,
				'message' => $message,
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}


	public function wapisender_pending($phone, $product, $orderid, $method)
	{

		$message = "
Halo kak,

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'api_key' => $this->u_get('wapi_api'),
				'device_key' => $this->u_get('wapi_device'),
				'destination' => $phone,
				'message' => $message,
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function wapisender_sukses($phone, $product, $orderid, $method)
	{

		$message = "
Pesanan anda telah berhasil kami kirimkan, silakan cek Akun Anda

Berikut adalah rincian pesanan Anda:
- Produk : " . $product . "
- No.Invoice : " . $orderid . "
- Metode Pembayaran : " . $method . "

Untuk selengkapnya silahkan lihat pada link yang tertera di bawah ini.
" . base_url() . "/payment/" . $orderid . "

Terima kasih.
												";

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://wapisender.id/api/v1/send-message",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => [
				'api_key' => $this->u_get('wapi_api'),
				'device_key' => $this->u_get('wapi_device'),
				'destination' => $phone,
				'message' => $message,
			],
		)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		sleep(1); #do not delete!
	}

	public function df_order($product, $customer, $refid)
	{

		$df_user = $this->u_get('digi-user');
		$df_key = $this->u_get('digi-key');

		$post_data = json_encode([
			'username' => $df_user,
			'buyer_sku_code' => $product,
			'customer_no' => $customer,
			'ref_id' => $refid,
			'sign' => md5($df_user . $df_key . $refid),
		]);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		$result = json_decode($result, true);
		return $result;
	}

	public function ag_v1_order($product, $customer, $orderid)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://v1.apigames.id/transaksi/http-get-v1?merchant=' . $this->u_get('ag-merchant') . '&secret=' . $this->u_get('ag-secret') . '&produk=' . $product . '&tujuan=' . $customer . '&ref=' . $orderid,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS => '',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded'
			),
		)
		);

		$result = curl_exec($curl);
		$result = json_decode($result, true);

		return $result;
	}


}