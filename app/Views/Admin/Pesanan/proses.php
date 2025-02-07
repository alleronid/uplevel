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
												<h5 class="mb-3">Edit Pesanan</h5>
												<?= alert(); ?>
												<form action="" method="POST">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">No Transaksi</label>
														<div class="col-md-8">
															<input type="text" class="form-control text-dark bg-white" name="order_id" value="<?= $orders['order_id']; ?>" readonly>
															<small>No transaksi tidak dapat diedit</small>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Games ID</label>
														<div class="col-md-8">
															<input type="text" class="form-control text-dark bg-white" name="games_id" value="<?= $orders['games_id']; ?>" readonly>
															<small>Games ID tidak dapat diedit</small>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Username</label>
														<div class="col-md-8">
															<input type="text" class="form-control text-dark bg-white" value="<?= $orders['username']; ?>" readonly>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Produk</label>
														<div class="col-md-8">
															<select name="product" class="form-control">
																<?php foreach ($product as $loop): ?>
																	<option value="<?= $loop['sku']; ?>" <?= $loop['id'] == $orders['product_id'] ? 'selected' : ''; ?>><?= $loop['product']; ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Provider</label>
														<div class="col-md-8">
															<select name="provider" class="form-control">
																<option value="DF" <?= 'DF' == $orders['provider'] ? 'selected' : ''; ?>>DigiFlazz</option>
																<option value="AG" <?= 'AG' == $orders['provider'] ? 'selected' : ''; ?>>ApiGames</option>
																
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">User ID</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="user_id" value="<?= $orders['user_id']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Zone ID</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="zone_id" value="<?= $orders['zone_id']; ?>">
														</div>
													</div>
													<a href="<?= base_url(); ?>/admin/pesanan" class="btn btn-warning float-left">Kembali</a>
													<div class="text-right">
														<button class="btn text-white" type="reset">Batal</button>
														<button class="btn btn-primary" type="submit" name="tombol" value="submit">Proses Pesanan</button>
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
				<?php $this->endSection(); ?>