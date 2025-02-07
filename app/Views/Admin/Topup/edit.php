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
												<h5 class="mb-3">Edit Topup</h5>
												<?= alert(); ?>
												<form action="" method="POST">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Topup ID</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" value="<?= $topup['topup_id']; ?>">
															<small>Topup ID tidak dapat diganti</small>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Username</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="username" value="<?= $topup['username']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Metode</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="method" value="<?= $topup['method']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Jumlah</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="amount" value="<?= $topup['amount']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Status</label>
														<div class="col-md-8">
															<select name="status" class="form-control">
																<option value="Pending" <?= $topup['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
																<option value="Success" <?= $topup['status'] == 'Success' ? 'selected' : ''; ?>>Success</option>
																<option value="Canceled" <?= $topup['status'] == 'Canceled' ? 'selected' : ''; ?>>Canceled</option>
															</select>
														</div>
													</div>
													<a href="<?= base_url(); ?>/admin/topup" class="btn btn-warning float-left">Kembali</a>
													<div class="text-right">
														<button class="btn text-white" type="reset">Batal</button>
														<button class="btn btn-success" type="button" onclick="terima();">Terima</button>
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
					function terima() {
						Swal.fire({
		                    title: 'Terima topup?',
		                    text: "Saldo akan dikirim ke pengguna",
		                    icon: 'warning',
		                    showCancelButton: true,
		                    confirmButtonColor: '#3085d6',
		                    cancelButtonColor: '#d33',
		                    cancelButtonText: 'Batal',
		                    confirmButtonText: 'Terima'
		                }).then((result) => {
		                    if (result.isConfirmed) {
		                        window.location.href = '<?= base_url(); ?>/admin/topup/accept/<?= $topup['id']; ?>';
		                    }
		                });
					}
				</script>
				<?php $this->endSection(); ?>