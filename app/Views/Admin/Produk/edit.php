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
												<h5 class="mb-3">Edit Produk</h5>

												<?= alert(); ?>

												<form action="" method="POST" enctype="multipart/form-data">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Games</label>
														<div class="col-md-8">
															<select name="games_id" class="form-control">
																<?php foreach ($games as $loop): ?>
																<option value="<?= $loop['id']; ?>" <?= $loop['id'] == $product['games_id'] ? 'selected' : ''; ?>><?= $loop['games']; ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Produk</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="product" value="<?= $product['product']; ?>">
														</div>
													</div>
				
													<br>
													<h5 class="mb-3">Harga Produk</h5>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Harga Modal (Raw)</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="raw_price" value="<?= $product['raw_price']; ?>">
														</div>
													</div>
										
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Harga Jual Publik</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="price" value="<?= $product['price']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Harga Member Silver</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="price_silver" value="<?= $product['price_silver']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Harga Member Gold</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="price_gold" value="<?= $product['price_gold']; ?>">
														</div>
													</div><br>
													<h5 class="mb-3">---</h5>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Urutan</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="sort" value="<?= $product['sort']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Provider</label>
														<div class="col-md-8">
															<select name="provider" class="form-control">
																<option value="DF" <?= $product['provider'] == 'DF' ? 'selected' : ''; ?>>Digiflazz</option>
																<option value="AG" <?= $product['provider'] == 'AG' ? 'selected' : ''; ?>>Api Games</option>
																<option value="Manual" <?= $product['provider'] == 'Manual' ? 'selected' : ''; ?>>Manual</option>
				
															
															</select>
														</div>
													</div>
													<div class="form-group row" >
														<label class="col-form-label col-md-4 text-white">Kode Produk</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="sku" value="<?= $product['sku']; ?>">
														</div>
													</div>
													<div class="form-group row" hidden>
														<label class="col-form-label col-md-4 text-white">Gambar/Icon Produk</label>
														<div class="col-md-8">
															<img src="<?= base_url(); ?>/assets/images/product/<?= $product['image'] ?>" alt="" width="140" class="mb-3 rounded">
															<div class="custom-file">
															    <input type="file" class="custom-file-input" id="product-image" name="image">
															    <label class="custom-file-label" for="product-image">Choose file</label>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Status</label>
														<div class="col-md-8">
															<select name="status" class="form-control">
																<option value="On" <?= $product['status'] == 'On' ? 'selected' : ''; ?>>On</option>
																<option value="Off" <?= $product['status'] == 'Off' ? 'selected' : ''; ?>>Off</option>
															</select>
														</div>
													</div>
													<a href="<?= base_url(); ?>/admin/produk" class="btn btn-warning float-left">Kembali</a>
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