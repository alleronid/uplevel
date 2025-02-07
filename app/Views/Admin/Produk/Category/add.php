<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<?= $this->include('header-admin'); ?>

								<?= alert(); ?>
								
							</div>
							<div class="col-md-8">
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Tambah Kategori</h5>
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label class="text-white">Games</label>
												<select name="games_id" class="form-control">
													<option value="">Pilih salah satu</option>
													<?php foreach ($games as $loop): ?>
													<option value="<?= $loop['id']; ?>"><?= $loop['games']; ?></option>
													<?php endforeach ?>
												</select>
											</div>

											<div class="form-group">
												<label class="text-white">Nama Kategori</label>
												<input type="text" class="form-control" autocomplete="off" name="category">
											</div>
											<a href="<?= base_url(); ?>/admin/produk/category" class="btn btn-warning float-left">Kembali</a>
											<div class="text-right">
												<button class="btn" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<script>
					$(".custom-file-input").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				<?php $this->endSection(); ?>