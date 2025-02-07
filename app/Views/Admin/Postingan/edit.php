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
												<h5 class="mb-3">Edit Postingan</h5>

												<?= alert(); ?>

												<form action="" method="POST" enctype="multipart/form-data">
												<div class="mb-10">
													<label class="col-form-label col-md-4 text-white">Gambar</label> <br>
													<img src="<?= base_url(); ?>/assets/images/post/<?= $post['image']; ?>" alt="" width="180" class="rounded mb-10">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile" name="image">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="mb-10">
													<label class="col-form-label col-md-4 text-white">Judul Post</label>
													<input type="text" class="form-control" autocomplete="off" name="title" value="<?= $post['title']; ?>">
												</div>
												<div class="mb-10">
													<label class="col-form-label col-md-4 text-white">Kategori</label>
													<input type="text" class="form-control" autocomplete="off" name="category" value="<?= $post['category']; ?>">
												</div>
												<div class="mb-20">
													<label class="col-form-label col-md-4 text-white">Konten</label>
													<textarea name="content"><?= $post['content']; ?></textarea>
												</div>
												<button class="btn btn-primary mt-3 py-3 w-100" type="submit" name="tombol" value="submit">Simpan</button>
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
					CKEDITOR.replace('content');
					$(".custom-file-input").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				<?php $this->endSection(); ?>