				<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>

								<?= alert(); ?>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-0">Voucher</h5>
										<div class="card-tools">
											<a href="<?= base_url(); ?>/admin/voucher/add" class="btn btn-primary btn-sm">Buat Voucher</a>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Voucher</th>
												<th>Diskon</th>
												<th>Min Transaksi</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
											<?php $no = 1; foreach ($voucher as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $loop['voucher']; ?></td>
												<td><?= $loop['diskon']; ?></td>
												<td>Rp <?= number_format($loop['min'],0,',','.'); ?></td>
												<td><?= $loop['status']; ?></td>
												<td width="10">
													<a href="<?= base_url(); ?>/admin/voucher/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/voucher/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
												</td>
											</tr>
											<?php endforeach ?>
											<?php if (count($voucher) == 0): ?>
											<tr>
												<td align="center" colspan="7">Tidak ada voucher</td>
											</tr>
											<?php endif ?>
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