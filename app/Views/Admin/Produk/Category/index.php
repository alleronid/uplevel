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
										<h5 class="mb-3">Kategori Produk</h5>
										<a href="<?= base_url(); ?>/admin/produk/category/add" class="btn btn-primary">Tambah Kategori</a>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th width="10">No</th>
												<th>Games</th>
												<th>Kategori</th>
												<th>Total Produk</th>
												<th>Action</th>
											</tr>
											<?php $no = 1; foreach ($category as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $loop['games']; ?></td>
												<td>
													<?= $loop['category']; ?>
												</td>
												<td><?= $loop['product']; ?></td>
												<td width="10">
													<a href="<?= base_url(); ?>/admin/produk/category/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/produk/category/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
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