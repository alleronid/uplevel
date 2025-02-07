				<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>

				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content" style="min-height: 580px;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Pengguna</h5>
										<a href="<?= base_url(); ?>/admin/pengguna/add" class="btn btn-primary">Tambah Akun</a>
										<?= alert(); ?>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Username</th>
												<th>Level</th>
												<th>Whatsapp</th>
												<th>Saldo</th>
												<th hidden>Ref</th>
												<th hidden>Ref By</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
											<?php $no = 1; foreach ($account as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $loop['username']; ?></td>
												<td>
												
												<?php
            									if ($loop['level'] == 'Member') {
            										echo "Member";
            									} else if ($loop['level'] == 'Silver') {
            										echo "Silver";														
            									} else if ($loop['level'] == 'Gold') {
            										echo "Gold";
            									} else {
            										echo "Member";
            									}
            									?>
												
												</td>
												<td><?= $loop['wa']; ?></td>
												<td>Rp <?= number_format($loop['balance'],0,',','.'); ?></td>
												<td hidden><code><?= $loop['ref']; ?></code></td>
												<td hidden><?= $loop['ref_by']; ?></td>
												<td><?= $loop['status']; ?></td>
												<td width="10">
													<a href="<?= base_url(); ?>/admin/pengguna/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/pengguna/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
												</td>
											</tr>
											<?php endforeach ?>
											<?php if (count($account) == 0): ?>
											<tr>
												<td colspan="6" align="center">Tidak ada pengguna</td>
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