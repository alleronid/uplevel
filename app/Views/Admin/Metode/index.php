				<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-0">Metode</h5>
										<div class="card-tools">
											<a href="<?= base_url(); ?>/admin/metode/add" class="btn btn-primary">Tambah Metode</a>
										</div>
										<form action="" method="POST">
											<div class="row mt-3">
												<div class="col-md-6">
													<div class="form-group">
														<label class="text-white">Pembayaran Saldo</label>
														<div class="input-group">
															<select name="pay_balance" class="form-control">
																<option value="Y" <?= $pay_balance == 'Y' ? 'selected' : ''; ?>>Ya</option>
																<option value="N" <?= $pay_balance == 'N' ? 'selected' : ''; ?>>Tidak</option>
															</select>
															<button class="btn btn-primary" type="submit">Simpan</button>
														</div>
													</div>
												</div>
											</div>
										</form>
										<?= alert(); ?>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Metode</th>
												<th>Provider</th>
												<th>Kategori</th>
												<th>Kode Unik</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
											<?php $no = 1; foreach ($method as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td>
													<img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" alt="" width="70" class="mr-2 rounded">
													<?= $loop['method']; ?>
												</td>
												<td>
													<?= $loop['provider']; ?>
													<p class="m-0"><?= $loop['code']; ?></p>
												</td>
												<td>
													<?= $loop['type']; ?>
												</td>
												<td>
													<?php
													if ($loop['uniq'] == 'Y') {
														echo "Ya";
													} else {
														echo "Tidak";
													}
													?>
												</td>
												<td><?= $loop['status']; ?></td>
												<td width="10">
													<a href="<?= base_url(); ?>/admin/metode/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/metode/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
												</td>
											</tr>
											<?php endforeach ?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<?php $this->endSection(); ?>