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
												<h5 class="mb-3 text-white">Markup Harga Produk</h5>
												<p class="text-white">Update Harga Jual berdasar kenaikan persentase atau penambahan nominal dari Harga Modal</p>

												<?= alert(); ?>

												<form action="" method="POST" enctype="multipart/form-data">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Pilih Tipe</label>
														<div class="col-md-8">
															<select name="tipeharga" class="form-control">
																<option value="publik">Harga Publik</option>
																<option value="silver" >Harga Silver</option>
																<option value="gold" >Harga Gold</option>
																
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Games</label>
														<div class="col-md-8">
															<select name="games_id" class="form-control">
																<option value="all">Semua Games</option>
																<?php foreach ($games as $loop): ?>
																<option value="<?= $loop['id']; ?>"><?= $loop['games']; ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Pilih Provider</label>
														<div class="col-md-8">
															<select name="provider" class="form-control">
																<option value="all">Semua Provider</option>
																<option value="DF" >Digiflazz</option>
																<option value="AG" >Apigames</option>
																<option value="BM" hidden>Games Bigmedia</option>
																<option value="PBM" hidden>Prepaid Bigmedia</option>
																<option value="Manual">Manual</option>
																<option value="WG" hidden>Warunk Gamers</option>
																<option value="OC" hidden>Oke Connect</option>
																<option value="BJ" hidden>Bang Jeff</option>
																<option value="VR" hidden>Games VIP Reseller</option>
																<option value="SVR" hidden>Sosmed VIP Reseller</option>
																<option value="PVR" hidden>Prepaid VIP Reseller</option>
																<option value="TV" hidden>Tokovoucher</option>
																<option value="LG" hidden>Lapakgaming</option>
																
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Markup by Persentase (%)</label>
														<div class="col-md-8">
															<input placeholder="5" value="5" type="text" class="form-control" autocomplete="off" name="persentase">
															<p class="text-white">isi 0 jika tidak ingin ada penambahan harga by Persentase</p>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Markup by Nominal (Rp)</label>
														<div class="col-md-8">
															<input placeholder="1000" value="0" type="text" class="form-control" autocomplete="off" name="nominal">
															<p class="text-white">isi 0 jika tidak ingin ada penambahan harga by Nominal</p>
														</div>
													</div>
													
													
													<a href="<?= base_url(); ?>/admin/produk" class="btn btn-warning float-left">Kembali</a>
													<div class="text-right">
														<button class="btn text-white" type="reset">Batal</button>
														<button class="btn btn-primary" type="submit" name="tombol" value="submit">Update Harga</button>
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