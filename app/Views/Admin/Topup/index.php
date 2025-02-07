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
										<h5 class="mb-0">Topup Saldo</h5>
										<?= alert(); ?>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Topup ID</th>
												<th>Username</th>
												<th>Metode</th>
												<th>Jumlah</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
											<?php $no = 1; foreach ($topup as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><b onclick="detail('<?= $loop['topup_id']; ?>');"><?= $loop['topup_id']; ?></b></td>
												<td><?= $loop['username']; ?></td>
												<td><?= $loop['method']; ?></td>
												<td>Rp <?= number_format($loop['amount'],0,',','.'); ?></td>
												<td><?= $loop['status']; ?></td>
												<td width="10">
													<a href="<?= base_url(); ?>/admin/topup/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/topup/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
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
				<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				        <div class="modal-content" style="background: var(--warna_2);">
				            <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel">Detail Topup</h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
				            </div>
				            <div class="modal-body p-0">
				            	
				            </div>
				        </div>
				    </div>
				</div>
				<script>
					function detail(topup_id) {
						$.ajax({
							url: '<?= base_url(); ?>/admin/topup/detail/' + topup_id,
							success: function(result) {
								$("#modal-detail div div .modal-body").html(result);

								$("#modal-detail").modal('show');
							}
						});
					}
				</script>
				<?php $this->endSection(); ?>