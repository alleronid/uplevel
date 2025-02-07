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
												<h5 class="mb-3">Kostum Harga Member</h5>
												<?= alert(); ?>
											</div>
											<form action="" method="POST">
												<table class="table table-white">
													<tr>
														<th>Metode</th>
														<th>Harga Member</th>
														<th hidden>Harga Silver</th>
														<th hidden>Harga Gold</th>
													</tr>
													<?php foreach ($method as $loop): ?>
													<tr id="method-<?= $loop['id']; ?>" style="display:none">
														<td><img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" alt="" width="100" class="rounded"></td>
														<td>
															<input type="number" class="form-control" autocomplete="off" value="<?= $loop['price']; ?>" name="price[<?= $loop['id']; ?>]">
														</td>
														<td hidden>
															<input type="number" class="form-control" autocomplete="off" value="<?= $loop['price_silver']; ?>" name="price_silver[<?= $loop['id']; ?>]">
														</td>
														<td hidden>
															<input type="number" class="form-control" autocomplete="off" value="<?= $loop['price_gold']; ?>" name="price_gold[<?= $loop['id']; ?>]">
														</td>
													</tr>
													<?php endforeach ?>
												</table>
												<div class="card-body">
													<a href="<?= base_url(); ?>/admin/produk" class="btn btn-warning float-left">Kembali</a>
													<div class="text-right">
														<button class="btn text-white" type="reset">Batal</button>
														<button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<style>
				    #method-10001 {Display:table-row !important;}
				</style>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<?php $this->endSection(); ?>