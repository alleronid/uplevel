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
												<h5 class="mb-3">Tambah Pengguna</h5>
												<?= alert(); ?>
												<form action="" method="POST" enctype="multipart/form-data">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Username</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="username">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Password</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="password">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Saldo</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="balance">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Whatsapp</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="wa">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Level</label>
														<div class="col-md-8">
															<select name="level" class="form-control">
																<option value="Member">Member</option>
																<option value="Silver" >Silver</option>
																<option value="Gold" >Gold</option>
															</select>
														</div>
													</div>
													<a href="<?= base_url(); ?>/admin/pengguna" class="btn btn-warning float-left">Kembali</a>
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
				<?php $this->endSection(); ?>