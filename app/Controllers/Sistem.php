<?php

namespace App\Controllers;

class Sistem extends BaseController
{

	public function product()
	{

		$df_user = $this->M_Base->u_get('digi-user');
		$df_key = $this->M_Base->u_get('digi-key');

		$post_data = json_encode([
			'cmd' => 'prepaid',
			'username' => $df_user,
			'sign' => md5($df_user . $df_key . "pricelist"),
		]);


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		echo $result;
		$result = json_decode($result, true);

		if (count($result['data']) > 20) {
			// Urutkan produk berdasarkan mereknya
			usort($result['data'], array($this->M_Base, 'compareProductsDigi'));
			$counters = array();

			foreach ($result['data'] as $loop) {

				$games = $this->M_Base->data_where_array('games', [
    							'games' => $loop['brand'],
    							'category' => $loop['category'],
    						]);

				$product = $this->M_Base->data_where('product', 'sku', $loop['buyer_sku_code']);

				if ($loop['buyer_product_status'] == true and $loop['seller_product_status'] == true) {


					if (count($games) === 1) {
						if (count($product) === 1) {
							// Berikan nomor urut untuk merek produk
							if (!array_key_exists($loop['brand'], $counters)) {
								$counters[$loop['brand']] = 1;
							}
							$this->M_Base->data_update('product', [
								'games_id' => $games[0]['id'],
								'product' => $loop['product_name'],
								'raw_price' => $loop['price'],
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'status' => 'On',
								'sort' => $counters[$loop['brand']],
								'check_status' => 'N',
								'check_code' => '',
							], $product[0]['id']);

							$counters[$loop['brand']]++;
							echo $loop['product_name'] . ' update ON <br>';

						} elseif (count($product) === 0) {
							// Berikan nomor urut untuk merek produk
							if (!array_key_exists($loop['brand'], $counters)) {
								$counters[$loop['brand']] = 1;
							}
							$this->M_Base->data_insert('product', [
								'games_id' => $games[0]['id'],
								'product' => $loop['product_name'],
								'raw_price' => $loop['price'],
								'price' => $loop['price'] * 110 / 100,
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'status' => 'On',
								'sort' => $counters[$loop['brand']],
								'check_status' => 'N',
								'check_code' => '',
							]);

							$counters[$loop['brand']]++;
							echo $loop['product_name'] . ' Insert ON <br>';
						}


					}
				} else {
					if (count($games) === 1) {
						if (count($product) === 1) {
							// Berikan nomor urut untuk merek produk
							if (!array_key_exists($loop['brand'], $counters)) {
								$counters[$loop['brand']] = 1;
							}
							$this->M_Base->data_update('product', [
								'games_id' => $games[0]['id'],
								'product' => $loop['product_name'],
								'raw_price' => $loop['price'],
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'status' => 'Off',
								'sort' => $counters[$loop['brand']],
								'check_status' => 'N',
								'check_code' => '',
							], $product[0]['id']);

							$counters[$loop['brand']]++;
							echo $loop['product_name'] . ' Update OFF <br>';

						}
					}
				}
			}

		}

	}


	public function rawprice()
	{

		$df_user = $this->M_Base->u_get('digi-user');
		$df_key = $this->M_Base->u_get('digi-key');

		$ag_merchant = $this->M_Base->u_get('ag-merchant');
		$ag_secret = $this->M_Base->u_get('ag-secret');


		$product_digi = $this->M_Base->data_where('product', 'provider', 'DF');


		if (count($product_digi) >= 1) {
			$post_data = json_encode([
				'cmd' => 'prepaid',
				'username' => $df_user,
				'sign' => md5($df_user . $df_key . "pricelist"),
			]);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
			$result = curl_exec($ch);
			$result = json_decode($result, true);

			if (count($result['data']) > 10) {
				foreach ($result['data'] as $loop) {

					if ($loop['buyer_product_status'] == true and $loop['seller_product_status'] == true) {

						$product = $this->M_Base->data_where_array('product', [
							'sku' => $loop['buyer_sku_code'],
							'provider' => 'DF'
						]);


						if (count($product) === 1) {
							$this->M_Base->data_update('product', [
								'raw_price' => $loop['price'],
								'provider' => 'DF',
								'sku' => $loop['buyer_sku_code'],
								'check_status' => 'N',
								'check_code' => '',
							], $product[0]['id']);

						}

						echo $loop['product_name'] . ' Success <br>';
					}
				}
			}

		}




	}
	public function gamesdigi()
	{

		$df_user = $this->M_Base->u_get('digi-user');
		$df_key = $this->M_Base->u_get('digi-key');

		$post_data = json_encode([
			'cmd' => 'prepaid',
			'username' => $df_user,
			'sign' => md5($df_user . $df_key . "pricelist"),
		]);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		if (count($result['data']) > 20) {
			foreach ($result['data'] as $loop) {

				if ($loop['buyer_product_status'] == true and $loop['seller_product_status'] == true) {

						$games = $this->M_Base->data_where_array('games', [
    							'games' => $loop['brand'],
    							'category' => $loop['category'],
    						]);

					if (count($games) === 1) {
					    $this->M_Base->data_update('games', [
								'slug' => url_title($loop['brand'].'-'.$loop['category'], '-', true),
								'category' => $loop['category'],
							], $order['id']);


					} else if (count($games) === 0) {

						$this->M_Base->data_insert('games', [
							'games' => $loop['brand'],
							'category' => $loop['category'],
							'image' => '' . url_title($loop['brand'], '-', true) . '-games.webp',
							'slug' => url_title($loop['brand'].'-'.$loop['category'], '-', true),
							'status' => 'On',
							'code' => $loop['brand'],
							'provider' => 'DF',
							'target' => 'default',
							'check_status' => 'N',
						]);

						echo $loop['brand'] . ' Success <br>';
					}

				}
			}
		}
	}

	public function status()
	{
		foreach ($this->M_Base->data_where('orders', 'status', 'Processing') as $order) {
			if ($order['provider'] == 'DF') {

				$product = $this->M_Base->data_where('product', 'id', $order['product_id']);

				if (count($product) == 1) {
					$df_user = $this->M_Base->u_get('digi-user');
					$df_key = $this->M_Base->u_get('digi-key');

					$post_data = json_encode([
						'username' => $df_user,
						'buyer_sku_code' => $product[0]['sku'],
						'customer_no' => $order['user_id'] . $order['zone_id'],
						'ref_id' => $order['order_id'],
						'sign' => md5($df_user . $df_key . $order['order_id']),
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

					if (isset($result['data'])) {

						if ($result['data']['status'] == 'Gagal') {
							$this->M_Base->data_update('orders', [
								'ket' => $result['data']['message'],
								'status' => 'Canceled',
							], $order['id']);

						} else {

							if ($result['data']['status'] == 'Sukses') {
								$note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
								$this->M_Base->data_update('orders', [
									'status' => 'Success',
									'ket' => $note,
								], $order['id']);

								$this->M_Base->wapisender_sukses($order['wa'], $order['product'], $order['order_id'], $order['method']);
							}
						}
					}
				}
			}

		}
	}


    public function mutasi($bank = null) {

    	if ($bank) {
    	    
            if ($bank === 'bca') {
                $url = 'https://mutasibank.co.id/api/v1/statements/'.$this->M_Base->u_get('cm_rek').'';
            }  else {
    			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    		}
            
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array('date_from' => date('Y-m-d'),'date_to' => date('Y-m-d')),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: '.$this->M_Base->u_get('cm_key'),
                    ),
                ));
                
                $result = curl_exec($curl);
                echo $result;
                $result = json_decode($result, true);
                
                if ($result['error'] == false) {
    					foreach ($result['data'] as $loop) {
    						$data_mutasi = $this->M_Base->data_where_array('mutasi', [
    							'status' => $loop['type'],
    							'keterangan' => $loop['description'],
    							'saldo' => $loop['balance'],
    							'bank' => $bank,
    						]);
    
    						if (count($data_mutasi) == 0) {
    							$this->M_Base->data_insert('mutasi', [
    								'bank' => $bank,
    								'keterangan' => $loop['description'],
    								'status' => $loop['type'],
    								'jumlah' => str_replace('.00', '', $loop['amount']),
    								'saldo' => str_replace('.00', '', $loop['balance']),
    								'date_create' => date('Y-m-d G:i:s'),
    							]);
    						}
    
    						$orders = $this->M_Base->data_where_array('orders', [
    							'price' => str_replace('.00', '', $loop['amount']),
    							'status' => 'Pending'
    						]);
    
    						if (count($orders) === 1) {
    
    							$status = 'Processing';
    
    							$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
    							$trx = $id;
    
    							if (count($product) === 1) {
    
    								switch ($orders[0]['provider']) {
    									case 'DF':
    									case 'LG':
    									case 'BJ':
    									case 'TV':
    										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '',$status, $ket, $trx);
    										break;
    									case 'VR':
    									case 'PVR':
    									case 'BM':
    									case 'PBM':
    									case 'AG':
    										$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'],$status, $ket, $trx);
    										break;
    									case 'Manual':
    										$status = 'Processing';
    										$ket = 'Pesanan siap diproses';
    										break;
    									default:
    										$ket = 'Provider tidak ditemukan';
    								}
    								
    							} else {
    								$ket = 'Produk tidak ditemukan';
    							}
    
    							$this->M_Base->data_update('orders', [
        							'status' => $status,
        							'ket' => $ket,
        							'trx_id' => $trx,
        						], $orders[0]['id']);
    
    						} else {
    							$topup = $this->M_Base->data_where_array('topup', [
    								'amount' => str_replace('.00', '', $loop['amount']),
    								'status' => 'Pending',
    							]);
    
    							if (count($topup) === 1) {
    								$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);
    
    								if (count($users) === 1) {
    									$this->M_Base->data_update('users', [
    										'balance' => $users[0]['balance'] + $topup[0]['amount'],
    									], $users[0]['id']);
    
    									$this->M_Base->data_update('topup', [
    										'status' => 'Success',
    									], $topup[0]['id']);
    
    									echo json_encode(['msg' => 'Berhasil {TOPUP}']);
    								} else {
    									echo json_encode(['msg' => 'Pengguna tidak ditemukan']);
    								}
    							} else {
    								echo json_encode(['msg' => 'Transaksi tidak ditemukan']);
    							}
    						}
    					}
    			} else {
    				echo $result['error_message'];
    			}

    	} else {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    }


	public function callback($action = null)
	{
		if ($action === 'tripay') {

			$json = file_get_contents('php://input');

			$callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';

			if ($callbackSignature !== hash_hmac('sha256', $json, $this->M_Base->u_get('tripay-private'))) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else if ('payment_status' !== $_SERVER['HTTP_X_CALLBACK_EVENT']) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			} else {

				$data = json_decode($json, true);

				if ($data) {
					if (is_array($data)) {
						$id = $data['merchant_ref'];

						if ($data['status'] === 'PAID') {
							$orders = $this->M_Base->data_where_array('orders', [
								'order_id' => $id,
								'status' => 'Pending'
							]);

							if (count($orders) === 1) {

								$status = 'Processing';

								echo json_encode([
									'success' => true,
									'message' => 'Pembayaran Berhasil diterima Sistem Website',
								]);

								$product = $this->M_Base->data_where('product', 'id', $orders[0]['product_id']);
								$trx = $id;

								if (count($product) === 1) {

									switch ($orders[0]['provider']) {
										case 'DF':
										case 'LG':
										case 'BJ':
										case 'TV':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], '', '', $status, $ket, $trx);
											break;
										case 'VR':
										case 'PVR':
										case 'BM':
										case 'PBM':
										case 'AG':
										case 'Manual':
											$this->processOrder($orders[0]['provider'], $product[0]['sku'], $orders[0]['user_id'], $orders[0]['zone_id'], $orders[0]['order_id'], $orders[0]['wa'], $orders[0]['method'], $status, $ket, $trx);
											break;
										default:
											$ket = 'Provider tidak ditemukan';
									}

								} else {
									$ket = 'Produk tidak ditemukan';
								}

								$this->M_Base->data_update('orders', [
									'status' => $status,
									'ket' => $ket,
									'trx_id' => $trx,
								], $orders[0]['id']);

							} else {
								$topup = $this->M_Base->data_where_array('topup', [
									'topup_id' => $id,
									'status' => 'Pending',
								]);

								if (count($topup) === 1) {
									$users = $this->M_Base->data_where('users', 'username', $topup[0]['username']);

									if (count($users) === 1) {
										$this->M_Base->data_update('users', [
											'balance' => $users[0]['balance'] + $topup[0]['amount'],
										], $users[0]['id']);

										$this->M_Base->data_update('topup', [
											'status' => 'Success',
										], $topup[0]['id']);

										echo json_encode([
											'success' => true,
											'msg' => 'Berhasil {TOPUP}',
										]);
									} else {
										echo json_encode([
											'success' => false,
											'msg' => 'Pengguna tidak ditemukan',
										]);
									}
								} else {
									echo json_encode([
										'success' => false,
										'message' => 'Pembayaran belum diterima Sistem',
									]);
								}
							}
						} else if ($data['status'] === 'EXPIRED') {

							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran Expired',
							]);

							$orders = $this->M_Base->data_where_array('orders', [
								'order_id' => $id,
								'status' => 'Expired'
							]);


						} else {
							echo json_encode([
								'success' => false,
								'message' => 'Pembayaran belum diterima Sistem',
							]);
						}
					} else {
						throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
					}
				} else {
					throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				}
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	private function processOrder($provider, $product, $userid, $zoneid, $orderid, $wacust, $method, &$status, &$ket, &$trx)
	{

		if (!empty($zoneid) and $zoneid != 1) {
			$customer_no = $userid . $zoneid;
		} else {
			$customer_no = $userid;
		}

		if ($provider == 'DF') {

			$result = $this->M_Base->df_order($product, $customer_no, $orderid);

			if (isset($result['data'])) {
				if ($result['data']['status'] == 'Gagal') {
					$ket = $result['data']['message'];
				} else {
					$ket = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];

					echo json_encode(['success' => true]);
				}
			} else {
				$ket = 'Failed Order';
			}

		} else if ($provider == 'AG') {

			$result = $this->M_Base->ag_v1_order($product, $customer_no, $orderid);

			if ($result['status'] == 0) {
				$ket = $result['error_msg'];
			} else {

				if ($result['data']['status'] == 'Sukses') {
					$status = 'Success';
					$this->M_Base->wapisender_sukses($wacust, $product, $orderid, $method);
				}

				$ket = $result['data']['sn'];
			}

		} else if ($provider == 'Manual') {
			$status = 'Processing';
			$ket = 'Pesanan siap diproses';

		} else {
			$ket = 'Provider tidak ditemukan';
		}

	}
}