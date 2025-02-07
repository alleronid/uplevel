<?php $this->extend('template'); ?>
			
<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>

<div class="clearfix pt-5"></div>
<div class="pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9">
				<div class="pt-3 pb-4" id="lsg-home">
					<h5>Detail Pesanan</h5>
					<span class="strip-primary"></span>
				</div>
				<div class="pb-3">
					<div class="section">
						<div class="card-body">
							<h4>Terima Kasih</h4> Pesanan anda berhasil dibuat. Masa berlaku untuk No. Transaksi ini 24 jam, segera lakukan pembayaran agar pesanan segera diproses. <br>
							<br> Simpan No. Transaksi anda untuk Cek Status Pesanan!
						</div>
					</div>
				</div>
				<div class="pb-3">
					<div class="section">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
    							    
    							    <?php 
    							     if ($orders['payment_gateway'] == 'Tripay') { 
                                        if ( in_array($orders['method_code'], array('QRIS','QRISC')) ) { 
                                             $fee = 800 ; 
                                             $harga = ($orders['price']*1.007) + $fee ; 
                                         } else if ( in_array($orders['method_code'], array('OVO','SHOPEEPAY')) ) { 
                                             $fee = 0 ; 
                                             $harga = ($orders['price']*1.03) + $fee ; 
                                         } else if ( in_array($orders['method_code'], array('MYBVA','PERMATAVA','BNIVA','BRIVA','MANDIRIVA','SMSVA','MUAMALATVA','CIMBVA','BSIVA','OCBCVA','DANAMONVA','BNCVA')) ) { 
                                             $fee = 4250 ; 
                                             $harga =  $orders['price'] + $fee ;  
                                         } else if ($orders['method_code'] == 'INDOMARET') { 
                                             $fee = 6500 ; 
                                             $harga =  $orders['price'] + $fee ;  
                                         } else if ($orders['method_code'] == 'BCAVA') { 
                                             $fee = 5500 ; 
                                             $harga =  $orders['price'] + $fee ;  
                                         } else if ( in_array($orders['method_code'], array('ALFAMART','ALFAMIDI')) ) { 
                                             $fee = 6000 ; 
                                             $harga = $orders['price'] + $fee ;  
                                         } else { 
                                             $harga = $orders['price'] ;  }
                                        
                                     } else if ($orders['payment_gateway'] == 'Duitku') { 
                                         if ( in_array($orders['method_code'], array('SP','NQ')) ) { 
                                             $harga = ($orders['price']*1) ; 
                                         } else if ($orders['method_code'] == 'LQ') { 
                                             $harga = ($orders['price']*1) ; 
                                         } else if ( in_array($orders['method_code'], array('OV','DA','LA')) ) { 
                                             $harga = ($orders['price']*1.0167) ; 
                                         } else if ($orders['method_code'] == 'SA') { 
                                             $harga = ($orders['price']*1.04) ; 
                                         }  else if ($orders['method_code'] == 'BC') { 
                                             $fee = 5000 ; 
                                             $harga = $orders['price'] + $fee ;
                                         }  else if ($orders['method_code'] == 'M2') { 
                                             $fee = 4000 ; 
                                             $harga = $orders['price'] + $fee ;
                                         }  else if ( in_array($orders['method_code'], array('VA','I1','B1','BT','A1','BR')) ) { 
                                             $fee = 3000 ; 
                                             $harga = $orders['price'] + $fee ; 
                                         }  else if ($orders['method_code'] == 'FT') { 
                                             $fee = 2500 ; 
                                             $harga = $orders['price'] + $fee ;  
                                         } else { 
                                             $harga = $orders['price'] ;  }
                                        
                                     } else if ($orders['payment_gateway'] == 'Xendit') { 
                                         $harga = $orders['price'];
                                     } else {
                                         $harga = $orders['price'];
                                     }
                                     
                                     ?>
										
									<div class="pb-4"> Metode Pembayaran
										<h5><?= $orders['method']; ?></h5>
									</div>
									<?php if ($orders['status'] == 'Pending'): ?>
									
									<?php if ($orders['payment_type'] == 'QRIS' && $orders['payment_gateway'] == 'Xendit'): ?>

        									<div class="pb-4"><b> SCAN QR CODE dibawah ini </b><br>
        									     <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $orders['payment_code']; ?>&amp;size=250x250" class="mt-3" alt="" title="" />
        									</div>
        									
									<?php endif ?>
									
									<?php if (filter_var($orders['payment_code'], FILTER_VALIDATE_URL)): ?>
    									<?php if ( in_array($orders['method_code'], array('QRIS','QRISC')) ) : ?>
    								    <div class="pb-4"><b> SCAN QR CODE dibawah ini </b><br>
    									     <img src="<?= $orders['payment_code']; ?>" class="mt-3" width="250" alt="" title="" />
    									</div>
    									<?php else: ?>
    									<div class="pb-4"> Klik tombol untuk melakukan Pembayaran <br>
    									    <a href="<?= $orders['payment_code']; ?>" class="btn btn-primary mt-2" target="_blank">Bayar Sekarang</a>
    									</div>
    									<?php endif ?>
    									
    									
    									
    								<?php elseif ($orders['payment_type'] == 'QRIS' && $orders['payment_gateway'] == 'Xendit'): ?>
    	
									<?php else: ?>
    									<div class="pb-4"> No Rekening / No. Virtual Account <br>
    										 <h5><b class="d-block mt-2"><?= $orders['payment_code']; ?><i class="fa fa-clone pl-2 clip" onclick="copy_rek()" data-clipboard-text="<?= $orders['payment_code']; ?>"></i></b></h5>
    									</div>
									<?php endif ?>
									
									
									
									<div class="pb-4"> Jumlah Pembayaran <h5 style="color:var(--warna_3) !important">Rp. <?= number_format($harga,0,',','.'); ?><i class="fa fa-clone pl-2 clip" onclick="copy_price()" data-clipboard-text="<?= $harga; ?>"></i></h5>
									</div>


									<?php else: ?>
									<div class="border p-2 rounded">Status : <b><?= $orders['status']; ?></b></div>
									<?php endif ?>
									<div class="pb-4 pt-4"> Keterangan/No Token/No Voucher <br>
										<h5><?= $orders['ket']; ?><i class="fa fa-clone pl-2 clip" onclick="copy_token()" data-clipboard-text="<?= $orders['ket']; ?>"></i></h5>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="pb-4"> No. Transaksi 
										<h5>
											<?= $orders['order_id']; ?> <i class="fa fa-clone pl-2 clip" onclick="copy_trx()" data-clipboard-text="<?= $orders['order_id']; ?>"></i>
										</h5>
									</div>
									<div class="pb-4"> Waktu Transaksi
										<h5><?= $orders['date_create']; ?></h5>
									</div>

									<div class="pb-4"> Rincian Pesanan <h5><?= $orders['games']; ?> - <?= $orders['product']; ?></h5>
										<?php if ($orders['zone_id'] == 'joki' ): ?>
										<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'email',
													'password',
													'request_hero',
													'catatan_joki',
													'nickname',
													'login_via',
													'jumlah_star_poin',
												], [
													'Email',
													'Password',
													'Request Hero',
													'Catatan',
													'Nickname',
													'Login Via',
													'Jumlah Star / Poin',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>


										
										<?php elseif ($orders['zone_id'] == 'skinml' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'email',
													'login_via',
													'request_hero',
													'catatan_joki',
													'nickname',
												], [
													'User ID',
													'Server ID',
													'Nama Hero / Item',
													'Nama Skin / Item',
													'Nickname',
												], $key); ?></th>
												<td class="pl-4">
												<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										
										<?php elseif ($orders['zone_id'] == 'videomontage' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										<?php elseif ($orders['zone_id'] == 'topuplogin' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'email',
													'password',
													'nickname',
													'login_via',
													'kode_cadangan',
												], [
													'Email / Username',
													'Password',
													'Nickname',
													'Login Via',
													'Kode Cadangan / 2FA',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										
										<?php elseif ($orders['zone_id'] == 'lg-ragnarox' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'server',
													'login',
												], [
													'ID / Username',
													'Server',
													'Login Via',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										<?php elseif ($orders['zone_id'] == 'lg-dragonhunter' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'server',
													'login',
												], [
													'ID / Username',
													'Server',
													'Login Via',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										<?php elseif ($orders['zone_id'] == 'lg-fourgods' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'server',
													'login',
												], [
													'ID / Username',
													'Server',
													'Login Via',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										<?php elseif ($orders['zone_id'] == 'lg-genshinimpact' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'server',
													'login',
												], [
													'ID / Username',
													'Server',
													'Login Via',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										<?php elseif ($orders['zone_id'] == 'lg-ninokuni' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'server',
													'login',
												], [
													'ID / Username',
													'Server',
													'Login Via',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>


										<?php elseif ($orders['zone_id'] == 'lg-neverafter' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'server',
													'login',
													'password',
												], [
													'ID / Username',
													'Server',
													'Login Via',
													'Password',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>

										<?php elseif ($orders['zone_id'] == 'lg-clashofclans' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'username',
													'login',
												], [
													'ID / Username',
													'Login Via',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'username') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>


										<?php elseif ($orders['zone_id'] == 'loginapex' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginefootball' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginff' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'logingenshin' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginml' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginninokuni' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginpokemon' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginraven' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'logintiktok' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'email',
													'password',
													'wa',
												], [
													'Email / Username',
													'Password',
													'Whatsapp',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'logintower' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'loginwildrift' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
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
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
										<?php elseif ($orders['zone_id'] == 'tournament' ): ?>
											<table>
											<?php foreach (json_decode($orders['user_id'], true) as $key => $value): ?>
											<tr>
												<th><?= str_replace([
													'id',
													'server',
													'jam',
													'tanggal',
												], [
													'id',
													'server',
													'jam',
													'tanggal',
												], $key); ?></th>
												<td class="pl-4">
													<?php 
													if ($key == 'email') {
														echo $value;
													} else if ($key == 'password') {
														echo "***********";
													} else {
														echo $value;
													}
													?>
												</td>
											</tr>
											<?php endforeach ?>
										</table>


										<?php else: ?>	
										<p>
										<?php 
										echo $orders['user_id'];

										if (!empty($orders['zone_id']) AND $orders['zone_id'] !== '1') {
											echo ' ('.$orders['zone_id'].') ';
										}

										if (!empty($orders['nickname'])) {
											echo $orders['nickname'];
										}
										?>
										</p>
										<?php endif ?>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ($orders['status'] == 'Pending'): ?>
				<div class="pb-3">
					<div class="section">
						<div class="card-body">
							<h4>Informasi Cara Pembayaran</h4>
							<?= htmlspecialchars_decode($orders['instruksi']); ?>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
	function copy_trx() {
		navigator.clipboard.writeText('<?= $orders['order_id']; ?>');

		Swal.fire('Berhasil', 'No Transaksi berhasil di salin', 'success');
	}
	
	function copy_price() {
		navigator.clipboard.writeText('<?= $harga; ?>');

		Swal.fire('Berhasil', 'Harga berhasil di salin', 'success');}
		
	function copy_rek() {
		navigator.clipboard.writeText('<?= $orders['payment_code']; ?>');

		Swal.fire('Berhasil', 'No Rekening / No VA / Kode Pembayaran berhasil di salin', 'success');}
		
	function copy_token() {
		navigator.clipboard.writeText('<?= $orders['ket']; ?>');

		Swal.fire('Berhasil', 'Keterangan / No Token PLN / Kode Voucher', 'success');}
</script>


<?php $this->endSection(); ?>