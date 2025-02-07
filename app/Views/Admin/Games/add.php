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
												<h5 class="mb-3">Tambah Games</h5>

												<?= alert(); ?>

												<form action="" method="POST" enctype="multipart/form-data">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Games</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="games">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Gambar</label>
														<div class="col-md-8">
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
																<option value="<?= $loop['category']; ?>"><?= $loop['category']; ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Urutan</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="sort">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Deskripsi</label>
														<div class="col-md-8">
															<textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Sistem Target</label>
														<div class="col-md-8">
															<select name="target" class="form-control">
																<option value="default">Default</option>
																<option value="ml">Mobile Legends</option>
																<option value="gi">DF-Genshin Impact</option>
																<option value="tof" >DF Tower of Fantasy</option>
																<option value="la">DF Life After</option>
																<option value="joki" >Joki ML</option>
																<option value="skinml" >Skin ML</option>
																<option value="videomontage" >Video Montage</option>
																<option value="topuplogin" >Top Up via Login</option>
																<option value="tournament" >ML Tournament</option>
																<option value="logincustomfield" >Top up Login Custom Field</option>
																<option value="voucher" >Voucher</option>
																<option value="pulsa" >Pulsa</option>
																<option value="data" >Data</option>
																<option value="pln" >PLN</option>
																<option value="ppob" >PPOB</option>

																<option value="loginapex" >Apex via Login</option>
																<option value="loginefootball" >Fifa Mobile via Login</option>
																<option value="loginff" >Freefire via Login</option>
																<option value="logingenshin" >Genshin via Login</option>
																<option value="loginml" >ML via Login</option>
																<option value="loginninokuni" >Ni No Kuni via Login</option>
																<option value="loginpokemon" >Pokemon via Login</option>
																<option value="loginraven" >Gray Raven via Login</option>
																<option value="logintiktok" >Tiktok via Login</option>
																<option value="logintower" >Tower of Fantasy via Login</option>
																<option value="loginwildrift" >Wild Rift via Login</option>
																
																<option value="lg-clashofclans" >LG Clash of Clans</option>
																<option value="lg-dragonhunter" >LG Dragon Hunter</option>
																<option value="lg-fourgods" >LG Four Gods</option>
																<option value="lg-genshinimpact" >LG Genshin Impact</option>
																<option value="lg-neverafter" >LG Never After</option>
																<option value="lg-ninokuni" >LG Nino Kuni</option>
																<option value="lg-pokemonunite" >LG Pokemon Unite</option>
																<option value="lg-ragnaroxorigin" >LG Ragnarox Origin</option>
																<option value="lg-ragnarox" >LG Ragnarox</option>
																<option value="lg-sevenknights2" >LG Seven Knights 2</option>
																<option value="sosmed" hidden>Sosmed VR</option>
																
																<option value="vr-genshinimpact" >VR Genshin Impact</option>
																<option value="vr-genshin">VR-Genshin Impact 2</option>
																<option value="vr-chimeraland" >VR Chimeraland</option>
																<option value="vr-ragnarokmeternallove" >VR Ragnarok M Eternal Love</option>
																<option value="vr-lifeafter" >VR LifeAfter</option>
																<option value="vr-onepunchman" >VR One Punch Man</option>
																<option value="vr-hyperfront" >VR Hyper Front</option>
																<option value="vr-toweroffantasy" >VR Tower Of Fantasy</option>
																<option value="vr-betheking" >VR Be The King</option>

																<option value="tv-genshinimpact" >TV Genshin Impact</option>
																<option value="tv-chimeraland" >TV Chimeraland</option>
																<option value="tv-lifeafter" >TV LifeAfter</option>
																<option value="tv-onepunchman" >TV One Punch Man</option>
																<option value="tv-hyperfront" >TV Hyper Front</option>
																<option value="tv-toweroffantasy" >TV Tower Of Fantasy</option>
																<option value="tv-betheking" >TV Be The King</option>
																<option value="tv-narutoslugfest" >TV Naruto Slugfest X</option>

																<option value="bj-genshinimpact" >BJ Genshin Impact</option>
																<option value="bj-chimeraland" >BJ Chimeraland</option>
																<option value="bj-lifeafter" >BJ LifeAfter</option>
																<option value="bj-onepunchman" >BJ One Punch Man</option>
																<option value="bj-hyperfront" >BJ Hyper Front</option>
																<option value="bj-toweroffantasy" >BJ Tower Of Fantasy</option>
																<option value="bj-betheking" >BJ Be The King</option>
																<option value="bj-narutoslugfest" >BJ Naruto Slugfest X</option>
																<option value="bj-goddessofvictory" >BJ Goddess Of Victory</option>
																<option value="bj-heroesevolved" >BJ Heroes Evolved</option>
																<option value="bj-perfectworld" >BJ Perfect World</option>
																<option value="bj-ragnarokmeternallove" >BJ Ragnarok M Eternal Love</option>
																
																<option value="valo">Valorant</option>
																
																
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Validasi Player</label>
														<div class="col-md-8">
															<select name="check_status" class="form-control">
																<option value="N">Tidak</option>
																<option value="Y">Ya</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Kode Validasi</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="check_code">
															<small>Kosongkan jika tidak menggunakan sistem validasi player</small><br>
															<small>Kode validasi bisa di cek <a href="https://hanz-digital.gitbook.io/admin-web-top-up-game/panduan-admin/kode-validasi-cek-id-game" class="text-warning" target="_blank">disini</a></small>

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