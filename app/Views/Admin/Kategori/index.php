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
										<h5 class="mb-0">Kategori</h5>
										<div class="card-tools">
											<button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" type="button">Tambah Kategori</button>
										</div>
										<div class="mt-4">
											<div class="collapse" id="collapseExample">
												<form action="" method="POST">
													<div class="form-group row">
														<label class="col-form-label text-white col-md-4">Kategori Baru</label>
														<div class="col-md-8">
															<input type="text" class="form-control" autocomplete="off" name="category">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label text-white col-md-4">Urutan</label>
														<div class="col-md-8">
															<input type="number" class="form-control" autocomplete="off" name="sort">
														</div>
													</div>
													<div class="text-right">
														<button class="btn text-white" type="reset">Batal</button>
														<button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
													</div>
												</form>
											</div>
										</div>
										<?= alert(); ?>
									</div>
									<div class="table-responsive">
										<table class="table-white table table-striped">
											<tr>
												<th>No</th>
												<th>Kategori</th>
												<th>Urutan</th>
												<th>Action</th>
											</tr>
											<?php $no = 1; foreach ($kategori as $loop): ?>
											<tr>
												<td width="10"><?= $no++; ?></td>
												<td><?= $loop['category']; ?></td>
												<td>
													<div class="input-group">
														<input type="number" class="form-control" value="<?= $loop['sort']; ?>" style="width: 10px;" id="sort-<?= $loop['id']; ?>">
														<button class="btn btn-primary" type="button" onclick="save_sort('<?= $loop['id']; ?>');">Simpan</button>
													</div>
												</td>
												<td width="10">
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/kategori/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
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
				<script>
					function save_sort(id) {
						var sort = $("#sort-" + id).val();

						$.ajax({
							url: '<?= base_url(); ?>/admin/kategori/edit/' + id,
							type: 'POST',
							data: 'sort=' + sort,
							success: function(result) {
								Swal.fire('Berhasil', 'Urutan kategori berhasil disimpan', 'success');
							}
						});
					}
				</script>
				<?php $this->endSection(); ?>