<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>

								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="card">
											<div class="card-body">
												<h5 class="mb-3">Edit Games</h5>

												<?= alert(); ?>

												<form action="" method="POST" enctype="multipart/form-data">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Games</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="games" value="<?= $games['games']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Gambar</label>
														<div class="col-md-8">
															<img src="<?= base_url(); ?>/assets/images/games/<?= $games['image'] ?>" alt="" width="140" class="mb-3 rounded">
															<div class="custom-file">
															    <input type="file" class="custom-file-input" id="games-image" name="image">
															    <label class="custom-file-label" for="games-image">Choose file</label>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Kategori</label>
														<div class="col-md-8">
															<select name="category" class="form-control">
																<?php foreach ($category as $loop): ?>
																<option value="<?= $loop['category']; ?>" <?= $loop['category'] == $games['category'] ? 'selected' : ''; ?>><?= $loop['category']; ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Urutan</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="sort" value="<?= $games['sort']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Deskripsi</label>
														<div class="col-md-8">
															<textarea name="content" id="" cols="30" rows="5" class="form-control"><?= $games['content']; ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Sistem Target</label>
														<div class="col-md-8">
															<select name="target" class="form-control">
																<option value="default" <?= $games['target'] == 'default' ? 'selected' : ''; ?>>Default</option>
																<option value="ml" <?= $games['target'] == 'ml' ? 'selected' : ''; ?>>Mobile Legends</option>
																<option value="gi" <?= $games['target'] == 'gi' ? 'selected' : ''; ?> >DF Genshin Impact</option>
																<option value="tof" <?= $games['target'] == 'tof' ? 'selected' : ''; ?> >DF Tower of Fantasy</option>
																<option value="la" <?= $games['target'] == 'la' ? 'selected' : ''; ?> >DF Life After</option>
																<option value="joki" <?= $games['target'] == 'joki' ? 'selected' : ''; ?> >Joki ML</option>
																<option value="skinml" <?= $games['target'] == 'skinml' ? 'selected' : ''; ?> >Skin ML</option>
																
																<option value="videomontage" <?= $games['target'] == 'videomontage' ? 'selected' : ''; ?> >Video Montage</option>
																<option value="topuplogin" <?= $games['target'] == 'topuplogin' ? 'selected' : ''; ?> >Top Up via Login</option>
																<option value="tournament" <?= $games['target'] == 'tournament' ? 'selected' : ''; ?>>ML Tournament</option>
																<option value="logincustomfield" <?= $games['target'] == 'logincustomfield' ? 'selected' : ''; ?>>Top up Login Custom Field</option>
																<option value="voucher" <?= $games['target'] == 'voucher' ? 'selected' : ''; ?> >Voucher</option>
																<option value="pulsa" <?= $games['target'] == 'pulsa' ? 'selected' : ''; ?> >Pulsa</option>
																<option value="data" <?= $games['target'] == 'data' ? 'selected' : ''; ?> >Data</option>
																<option value="pln" <?= $games['target'] == 'pln' ? 'selected' : ''; ?> >PLN</option>
																<option value="ppob" <?= $games['target'] == 'ppob' ? 'selected' : ''; ?> >PPOB</option>

																<option value="loginapex" <?= $games['target'] == 'loginapex' ? 'selected' : ''; ?>>Apex via Login</option>
																<option value="loginefootball" <?= $games['target'] == 'loginefootball' ? 'selected' : ''; ?>>Fifa Mobile via Login</option>
																<option value="loginff" <?= $games['target'] == 'loginff' ? 'selected' : ''; ?>>Freefire via Login</option>
																<option value="logingenshin" <?= $games['target'] == 'logingenshin' ? 'selected' : ''; ?>>Genshin via Login</option>
																<option value="loginml" <?= $games['target'] == 'loginml' ? 'selected' : ''; ?>>ML via Login</option>
																<option value="loginninokuni" <?= $games['target'] == 'loginninokuni' ? 'selected' : ''; ?>>Ni No Kuni via Login</option>
																<option value="loginpokemon" <?= $games['target'] == 'loginpokemon' ? 'selected' : ''; ?>>Pokemon via Login</option>
																<option value="loginraven" <?= $games['target'] == 'loginraven' ? 'selected' : ''; ?>>Gray Raven via Login</option>
																<option value="logintiktok" <?= $games['target'] == 'logintiktok' ? 'selected' : ''; ?>>Tiktok via Login</option>
																<option value="logintower" <?= $games['target'] == 'logintower' ? 'selected' : ''; ?>>Tower of Fantasy via Login</option>
																<option value="loginwildrift" <?= $games['target'] == 'loginwildrift' ? 'selected' : ''; ?>>Wild Rift via Login</option>
																
																<option value="lg-clashofclans" <?= $games['target'] == 'lg-clashofclans' ? 'selected' : ''; ?>>LG Clash of Clans</option>
																<option value="lg-dragonhunter" <?= $games['target'] == 'lg-dragonhunter' ? 'selected' : ''; ?>>LG Dragon Hunter</option>
																<option value="lg-fourgods" <?= $games['target'] == 'lg-fourgods' ? 'selected' : ''; ?>>LG Four Gods</option>
																<option value="lg-genshinimpact" <?= $games['target'] == 'lg-genshinimpact' ? 'selected' : ''; ?>>LG Genshin Impact</option>
																<option value="lg-neverafter" <?= $games['target'] == 'lg-neverafter' ? 'selected' : ''; ?>>LG Never After</option>
																<option value="lg-ninokuni" <?= $games['target'] == 'lg-ninokuni' ? 'selected' : ''; ?>>LG Nino Kuni</option>
																<option value="lg-pokemonunite" <?= $games['target'] == 'lg-pokemonunite' ? 'selected' : ''; ?>>LG Pokemon Unite</option>
																<option value="lg-ragnaroxorigin" <?= $games['target'] == 'lg-ragnaroxorigin' ? 'selected' : ''; ?>>LG Ragnarox Origin</option>
																<option value="lg-ragnarox" <?= $games['target'] == 'lg-ragnarox' ? 'selected' : ''; ?>>LG Ragnarox</option>
																<option value="lg-sevenknights2" <?= $games['target'] == 'lg-sevenknights2' ? 'selected' : ''; ?>>LG Seven Knights 2</option>
																<option value="sosmed" <?= $games['target'] == 'sosmed' ? 'selected' : ''; ?> hidden>Sosmed VR</option>
																
																<option value="vr-genshinimpact" <?= $games['target'] == 'vr-genshinimpact' ? 'selected' : ''; ?>>VR Genshin Impact</option>
																<option value="vr-chimeraland" <?= $games['target'] == 'vr-chimeraland' ? 'selected' : ''; ?>>VR Chimeraland</option>
																<option value="vr-ragnarokmeternallove" <?= $games['target'] == 'vr-ragnarokmeternallove' ? 'selected' : ''; ?>>VR Ragnarok M Eternal Love</option>
																<option value="vr-lifeafter" <?= $games['target'] == 'vr-lifeafter' ? 'selected' : ''; ?>>VR LifeAfter</option>
																<option value="vr-onepunchman" <?= $games['target'] == 'vr-onepunchman' ? 'selected' : ''; ?>>VR One Punch Man</option>
																<option value="vr-hyperfront" <?= $games['target'] == 'vr-hyperfront' ? 'selected' : ''; ?>>VR Hyper Front</option>
																<option value="vr-toweroffantasy" <?= $games['target'] == 'vr-toweroffantasy' ? 'selected' : ''; ?>>VR Tower Of Fantasy</option>
																<option value="vr-betheking" <?= $games['target'] == 'vr-betheking' ? 'selected' : ''; ?>>VR Be The King</option>

																<option value="tv-genshinimpact" <?= $games['target'] == 'tv-genshinimpact' ? 'selected' : ''; ?>>TV Genshin Impact</option>
																<option value="tv-chimeraland" <?= $games['target'] == 'tv-chimeraland' ? 'selected' : ''; ?>>TV Chimeraland</option>
																<option value="tv-lifeafter" <?= $games['target'] == 'tv-lifeafter' ? 'selected' : ''; ?>>TV LifeAfter</option>
																<option value="tv-onepunchman" <?= $games['target'] == 'tv-onepunchman' ? 'selected' : ''; ?>>TV One Punch Man</option>
																<option value="tv-hyperfront" <?= $games['target'] == 'tv-hyperfront' ? 'selected' : ''; ?>>TV Hyper Front</option>
																<option value="tv-toweroffantasy" <?= $games['target'] == 'tv-toweroffantasy' ? 'selected' : ''; ?>>TV Tower Of Fantasy</option>
																<option value="tv-betheking" <?= $games['target'] == 'tv-betheking' ? 'selected' : ''; ?>>TV Be The King</option>
																<option value="tv-narutoslugfest" <?= $games['target'] == 'tv-narutoslugfest' ? 'selected' : ''; ?>>TV Naruto Slugfest X</option>

																<option value="bj-genshinimpact" <?= $games['target'] == 'bj-genshinimpact' ? 'selected' : ''; ?>>BJ Genshin Impact</option>
																<option value="bj-chimeraland" <?= $games['target'] == 'bj-chimeraland' ? 'selected' : ''; ?>>BJ Chimeraland</option>
																<option value="bj-lifeafter" <?= $games['target'] == 'bj-lifeafter' ? 'selected' : ''; ?>>BJ LifeAfter</option>
																<option value="bj-onepunchman" <?= $games['target'] == 'bj-onepunchman' ? 'selected' : ''; ?>>BJ One Punch Man</option>
																<option value="bj-hyperfront" <?= $games['target'] == 'bj-hyperfront' ? 'selected' : ''; ?>>BJ Hyper Front</option>
																<option value="bj-toweroffantasy" <?= $games['target'] == 'bj-toweroffantasy' ? 'selected' : ''; ?>>BJ Tower Of Fantasy</option>
																<option value="bj-betheking" <?= $games['target'] == 'bj-betheking' ? 'selected' : ''; ?>>BJ Be The King</option>
																<option value="bj-narutoslugfest" <?= $games['target'] == 'bj-narutoslugfest' ? 'selected' : ''; ?>>BJ Naruto Slugfest X</option>
																<option value="bj-goddessofvictory" <?= $games['target'] == 'bj-goddessofvictory' ? 'selected' : ''; ?>>BJ Goddess Of Victory</option>
																<option value="bj-heroesevolved" <?= $games['target'] == 'bj-heroesevolved' ? 'selected' : ''; ?>>BJ Heroes Evolved</option>
																<option value="bj-perfectworld" <?= $games['target'] == 'bj-perfectworld' ? 'selected' : ''; ?>>BJ Perfect World</option>
																<option value="bj-ragnarokmeternallove" <?= $games['target'] == 'bj-ragnarokmeternallove' ? 'selected' : ''; ?>>BJ Ragnarok M Eternal Love</option>
																
																<option value="valo" <?= $games['target'] == 'valo' ? 'selected' : ''; ?>>Valorant</option>
																
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Validasi Player</label>
														<div class="col-md-8">
															<select name="check_status" class="form-control">
															<option value="N" <?= $games['check_status'] == 'N' ? 'selected' : ''; ?>>Tidak</option>
															<option value="Y" <?= $games['check_status'] == 'Y' ? 'selected' : ''; ?>>Ya</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Kode Validasi</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="check_code" value="<?= $games['check_code']; ?>">
															<small>Kosongkan jika tidak menggunakan sistem validasi player</small><br>
															<small>Kode validasi bisa di cek <a href="https://hanz-digital.gitbook.io/admin-web-top-up-game/panduan-admin/kode-validasi-cek-id-game" class="text-warning" target="_blank">disini</a></small>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Status</label>
														<div class="col-md-8">
															<select name="status" class="form-control">
																<option value="On" <?= $games['status'] == 'On' ? 'selected' : ''; ?>>On</option>
																<option value="Off" <?= $games['status'] == 'Off' ? 'selected' : ''; ?>>Off</option>
															</select>
														</div>
													</div>
													<a href="<?= base_url(); ?>/admin/games" class="btn btn-warning float-left">Kembali</a>
													<div class="text-right">
														<button class="btn text-white" type="reset">Batal</button>
														<button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<script>
					CKEDITOR.replace('content');
					$(".custom-file-input").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				
				<?php $this->endSection(); ?>