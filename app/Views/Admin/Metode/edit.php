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
												<h5 class="mb-3">Edit Metode</h5>
												<?= alert(); ?>
												<form action="" method="POST" enctype="multipart/form-data">
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Nama Metode</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="method" value="<?= $method['method']; ?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Gambar</label>
														<div class="col-md-8">
															<img src="<?= base_url(); ?>/assets/images/method/<?= $method['image']; ?>" alt="" class="mb-3 rounded" width="140">
															<div class="custom-file">
															    <input type="file" class="custom-file-input" id="method-image" name="image">
															    <label class="custom-file-label" for="method-image">Choose file</label>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Kode Unik</label>
														<div class="col-md-8">
															<select name="uniq" class="form-control">
																<option value="Y" <?= $method['uniq'] == 'Y' ? 'selected' : ''; ?>>Ya</option>
																<option value="N" <?= $method['uniq'] == 'N' ? 'selected' : ''; ?>>Tidak</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Kategori Pembayaran</label>
														<div class="col-md-8">
															<select name="type" class="form-control">
																<option value="Bank Transfer" <?= $method['type'] == 'Bank Transfer' ? 'selected' : ''; ?>>Bank Transfer</option>
																<option value="QRIS" <?= $method['type'] == 'QRIS' ? 'selected' : ''; ?>>QRIS</option>
																<option value="E-Wallet" <?= $method['type'] == 'E-Wallet' ? 'selected' : ''; ?>>E-Wallet</option>
																<option value="Virtual Account" <?= $method['type'] == 'Virtual Account' ? 'selected' : ''; ?>>Virtual Account</option>
																<option value="Convenience Store" <?= $method['type'] == 'Convenience Store' ? 'selected' : ''; ?>>Convenience Store</option>
																<option value="Pulsa" <?= $method['type'] == 'Pulsa' ? 'selected' : ''; ?>>Pulsa</option>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Provider</label>
														<div class="col-md-8">
															<select name="provider" class="form-control">
																<option value="Manual" <?= $method['provider'] == 'Manual' ? 'selected' : ''; ?>>Manual</option>
																<option value="Tripay" <?= $method['provider'] == 'Tripay' ? 'selected' : ''; ?> >Tripay</option>
																<option value="Duitku" <?= $method['provider'] == 'Duitku' ? 'selected' : ''; ?> hidden>Duitku</option>
																<option value="Xendit" <?= $method['provider'] == 'Xendit' ? 'selected' : ''; ?> hidden>Xendit</option>
															</select>
														</div>
													</div>
													<div class="form-group row <?= $method['provider'] == 'Tripay' ? 'd-none' : ''; ?> <?= $method['provider'] == 'Duitku' ? 'd-none' : ''; ?>" id="tipe-manual">
														<label class="col-form-label col-md-4 text-white">Rekening</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="rek" value="<?= $method['rek']; ?>">
														</div>
													</div>
													<div class="form-group row <?= $method['provider'] == 'Manual' ? 'd-none' : ''; ?>" id="tipe-tripay">
														<label class="col-form-label col-md-4 text-white">Kode Metode</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="code" value="<?= $method['code']; ?>">
															<small>Kode metode Tripay bisa di cek <a href="https://tripay.co.id/developer?tab=channels" class="text-warning" target="_blank">disini</a></small>
															<small >Kode metode Duitku bisa di cek <a href="https://docs.duitku.com/api/id/#metode-pembayaran" class="text-warning" target="_blank" hidden>disini</a></small>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Instruksi</label>
														<div class="col-md-8">
															<textarea type="text" class="form-control" autocomplete="off" name="instruksi"><?= $method['instruksi']; ?></textarea>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-md-4 text-white">Status</label>
														<div class="col-md-8">
															<select name="status" class="form-control">
																<option value="On" <?= $method['status'] == 'On' ? 'selected' : ''; ?>>On</option>
																<option value="Off" <?= $method['status'] == 'Off' ? 'selected' : ''; ?>>Off</option>
															</select>
														</div>
													</div>
													<a href="<?= base_url(); ?>/admin/metode" class="btn btn-warning float-left">Kembali</a>
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
					$("select[name=provider]").on('change', function() {
						if ($(this).val() == 'Manual') {
							$("#tipe-manual").removeClass('d-none');
							$("#tipe-tripay").addClass('d-none');
						} else {
							$("#tipe-manual").addClass('d-none');
							$("#tipe-tripay").removeClass('d-none');
						}
					});
					$(".custom-file-input").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				<script>
					CKEDITOR.replace('instruksi');
				</script>
				<?php $this->endSection(); ?>