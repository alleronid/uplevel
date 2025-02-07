				<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>

				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content" style="min-height: 580px;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>

								<div class="row justify-content-center">
									<div class="col-md-8">
										<div class="card">
											<div class="card-body">
												<h5 class="mb-3">Ganti Password</h5>

												<?= alert(); ?>

												<form action="" method="POST">
													<div class="form-group row">
														<label class="col-form-label text-white col-md-4">Password Lama</label>
														<div class="col-md-8">
															<input type="password" class="form-control" autocomplete="off" name="passwordl">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label text-white col-md-4">Password Baru</label>
														<div class="col-md-8">
															<input type="password" class="form-control" autocomplete="off" name="passwordb">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label text-white col-md-4">Ulangi Password Baru</label>
														<div class="col-md-8">
															<input type="password" class="form-control" autocomplete="off" name="passwordbb">
														</div>
													</div>
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