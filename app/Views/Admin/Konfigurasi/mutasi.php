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
										<h5 class="mb-0">Mutasi</h5>
										<div class="card-tools">
											<a href="<?= base_url(); ?>/admin/konfigurasi/mutasidelete" class="btn btn-danger btn-sm">Delete Semua Data Mutasi</a>
											<a href="<?= base_url(); ?>/admin/konfigurasi/mutasigetdatabca" class="btn btn-success btn-sm">Update Data Mutasi BCA</a>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Tanggal</th>
												<th>Jumlah</th>
												<th>Status</th>
												<th>Saldo</th>
												<th>Keterangan</th>
											</tr>
											<?php $no = 1; foreach ($mutasi as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $loop['date_create']; ?></td>
												<td>Rp <?= number_format($loop['jumlah'],0,',','.'); ?></td>
												<td>Rp <?= number_format($loop['saldo'],0,',','.'); ?></td>
												<td><?= $loop['status']; ?></td>
												<td><?= $loop['keterangan']; ?></td>
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