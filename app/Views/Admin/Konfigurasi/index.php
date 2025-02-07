<?php $this->extend('templateadmin'); ?>

				<?php $this->section('css'); ?>
				<style>
					.form-control-warna-box {
				width: 100% ;
				padding: 0rem;
				height: 40px;
				font-size: 1rem;
				font-weight: 400;
				line-height: 1.5;
				color: var(--warna_text) !important;
				background-color: var(--warna);
				background-clip: padding-box;
				border: 1px solid #afafaf9c;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				border-radius: 0.375rem;
				transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
				border-top-right-radius: 0.375rem !important;
				border-bottom-right-radius: 0.375rem !important;
			}
			.form-control-kode-hex {
				width: 20% ;
				padding: .5rem 1rem;
				font-size: 1rem;
				font-weight: 400;
				line-height: 1.5;
				color: var(--warna_text) !important;
				background-color: var(--warna);
				background-clip: padding-box;
				border: 1px solid #afafaf9c;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				border-radius: 0.375rem;
				transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
				border-top-right-radius: 0.375rem !important;
				border-bottom-right-radius: 0.375rem !important;
			}
				</style>
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
										<h5 class="mb-3">Umum</h5>
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Nama Website</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $web['name']; ?>" name="name" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Judul</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $web['title']; ?>" name="title" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Logo</label>
												<div class="col-md-8">
													<img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-3 rounded" width="100">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile" name="logo">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
													<small>Ukuran 512 x 512px</small>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Keywords</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $web['keywords']; ?>" name="keywords" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Deskripsi</label>
												<div class="col-md-8">
													<textarea name="descriptiona"><?= $web['description']; ?></textarea>
												</div>
											</div>
											<div class="form-group row" hidden>
												<label class="col-md-4 col-form-label text-white">Komisi Referal</label>
												<div class="col-md-8">
													<input type="number" class="form-control" value="<?= $komisi_ref; ?>" name="komisi_ref" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="umum">Simpan</button>
											</div>
										</form>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Banner</h5>
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Tambah Banner</label>
												<div class="col-md-8">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile-banner" name="image">
														<label class="custom-file-label" for="customFile-banner">Choose file</label>
													</div>
													<small>Ukuran 1280 × 586px</small>
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="banner">Simpan</button>
											</div>
										</form>
									</div>
									<table class="table table-striped table-white m-0">
										<tr>
											<th>No</th>
											<th>Banner</th>
											<th>Action</th>
										</tr>
										<?php $no = 1;
										foreach ($banner as $loop): ?>
														<tr>
															<td><?= $no++; ?></td>
															<td>
																<img src="<?= base_url(); ?>/assets/images/banner/<?= $loop['image']; ?>" alt="" width="120">
															</td>
															<td>
																<button class="btn btn-danger btn-sm" onclick="hapus('<?= base_url(); ?>/admin/konfigurasi/banner/delete/<?= $loop['id']; ?>');">Hapus</button>
															</td>
														</tr>
										<?php endforeach ?>

										<?php if (count($banner) == 0): ?>
														<tr>
															<td colspan="3" align="center">Tidak ada banner</td>
														</tr>
										<?php endif ?>
									</table>
								</div>
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Digiflazz</h5>
										<form action="" method="POST">
										<p>Silahkan arahkan Callback URL/IPN ke <code><?= base_url(); ?>/sistem/status</code></p>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Username</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $digi['user']; ?>" name="user" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Api Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $digi['key']; ?>" name="key" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="digi">Simpan</button>
											</div>
										</form>
									</div>
								</div>

								
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Api Games</h5>
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Merchant ID</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $ag['merchant']; ?>" name="merchant" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Secret Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $ag['secret']; ?>" name="secret" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="ag">Simpan</button>
											</div>
										</form>
									</div>
								</div>

								
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Tripay</h5>
										<form action="" method="POST">
											<p>Silahkan arahkan Callback ke <code><?= base_url(); ?>/sistem/callback/tripay</code></p>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Api Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $tripay['key']; ?>" name="key" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Private Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $tripay['private']; ?>" name="private" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Kode Merchant</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $tripay['merchant']; ?>" name="merchant" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="tripay">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								
								
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Mutasi Bank</h5>
										<form action="" method="POST">
										<p>Silahkan arahkan Callback URL/IPN ke <code><?= base_url(); ?>/sistem/mutasi/bca</code></p>
											<a href="<?= base_url(); ?>/admin/konfigurasi/mutasi" class="btn btn-primary mb-3">Data Mutasi</a>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Api Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $cm['key']; ?>" name="cm_key" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">No. Rekening BCA</label>

												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $cm['rek']; ?>" name="cm_rek" autocomplete="off">
												</div>
											</div>
											<p>Silahkan arahkan Callback URL/IPN ke <code><?= base_url(); ?>/sistem/mutasi/bca</code></p>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="cm">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								<div class="card" hidden>
									<div class="card-body">
										<h5 class="mb-3">Whatsapp Fonnte</h5>
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Token</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $wa_token; ?>" name="wa_token" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="wa">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								<div class="card" >
									<div class="card-body">
										<h5 class="mb-3">Wapisender</h5>
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Api key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $wapi['api']; ?>" name="api" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Device Key</label>
												<div class="col-md-8">
													<input type="text" class="form-control" value="<?= $wapi['device']; ?>" name="device" autocomplete="off">
												</div>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="wapi">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Sosial Media</h5>
										<form action="" method="POST">
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Whatsapp</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['wa']; ?>" name="wa" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Instagram</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['ig']; ?>" name="ig" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">YouTube</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['yt']; ?>" name="yt" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Facebook</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['fb']; ?>" name="fb" autocomplete="off">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-md-4 col-form-label text-white">Tiktok</label>
												<div class="col-md-8">
													<input type="url" class="form-control" value="<?= $sm['tw']; ?>" name="tw" autocomplete="off">
												</div>
											</div>

											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="sm">Simpan</button>
											</div>
										</form>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Syarat & Ketentuan</h5>
										<form action="" method="POST">
											<div class="form-group">
												<textarea name="page_sk"><?= $page_sk; ?></textarea>
											</div>
											<div class="text-right">
												<button class="btn text-white" type="reset">Batal</button>
												<button class="btn btn-primary" type="submit" name="tombol" value="sk">Simpan</button>
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
				// Add event listener to all color pickers
				var colorPickers = document.querySelectorAll('input[type="color"]');
				colorPickers.forEach(function(picker) {
					picker.addEventListener('input', function() {
						var hexColor = picker.value;
						var hexInput = document.querySelector('#color-input-' + picker.id.split('-')[2]);
						hexInput.value = hexColor;
					});
				});

				// Add event listener to all hex input boxes
				var hexInputs = document.querySelectorAll('.form-control-kode-hex');
				hexInputs.forEach(function(input) {
					input.addEventListener('input', function() {
						var hexColor = input.value;
						var picker = document.querySelector('#color-picker-' + input.id.split('-')[2]);
						picker.value = hexColor;
					});
				});
				</script>
				<script>
					// Ambil semua input warna
					const colorInputs = document.querySelectorAll('input[type="color"]');

					// Loop semua input warna
					colorInputs.forEach(colorInput => {
					  // Tambahkan event listener saat nilai input diubah
					  colorInput.addEventListener('input', () => {
						// Ambil nilai warna dari input
						const colorValue = colorInput.value;

						// Ambil elemen input yang terkait dengan input warna
						const relatedInput = document.querySelector(`input[name="${colorInput.name}"][type="text"]`);

						// Set nilai elemen input terkait dengan nilai warna
						relatedInput.value = colorValue;
					  });
					});
				</script>
				<script>
					const colorPicker1 = document.querySelector("#color-picker-1");
					const colorInput1 = document.querySelector("#color-input-1");
					const colorPreview1 = document.querySelector("#color-preview-1");

					const colorPicker2 = document.querySelector("#color-picker-2");
					const colorInput2 = document.querySelector("#color-input-2");
					const colorPreview2 = document.querySelector("#color-preview-2");

					const colorPicker3 = document.querySelector("#color-picker-3");
					const colorInput3 = document.querySelector("#color-input-3");
					const colorPreview3 = document.querySelector("#color-preview-3");

					const colorPicker4 = document.querySelector("#color-picker-4");
					const colorInput4 = document.querySelector("#color-input-4");
					const colorPreview4 = document.querySelector("#color-preview-4");

					const colorPicker5 = document.querySelector("#color-picker-5");
					const colorInput5 = document.querySelector("#color-input-5");
					const colorPreview5 = document.querySelector("#color-preview-5");

					const colorPicker6 = document.querySelector("#color-picker-6");
					const colorInput6 = document.querySelector("#color-input-6");
					const colorPreview6 = document.querySelector("#color-preview-6");

					const colorPicker7 = document.querySelector("#color-picker-7");
					const colorInput7 = document.querySelector("#color-input-7");
					const colorPreview7 = document.querySelector("#color-preview-7");

					colorPicker1.addEventListener("input", function() {
					  const colorValue = colorPicker1.value;
					  colorPreview1.style.backgroundColor = colorValue;
					  colorInput1.value = colorValue;
					});

					colorPicker2.addEventListener("input", function() {
					  const colorValue = colorPicker2.value;
					  colorPreview2.style.backgroundColor = colorValue;
					  colorInput2.value = colorValue;
					});

					colorPicker3.addEventListener("input", function() {
					  const colorValue = colorPicker3.value;
					  colorPreview3.style.backgroundColor = colorValue;
					  colorInput3.value = colorValue;
					});

					colorPicker4.addEventListener("input", function() {
					  const colorValue = colorPicker4.value;
					  colorPreview4.style.backgroundColor = colorValue;
					  colorInput4.value = colorValue;
					});

					colorPicker5.addEventListener("input", function() {
					  const colorValue = colorPicker5.value;
					  colorPreview5.style.backgroundColor = colorValue;
					  colorInput5.value = colorValue;
					});

					colorPicker6.addEventListener("input", function() {
					  const colorValue = colorPicker6.value;
					  colorPreview6.style.backgroundColor = colorValue;
					  colorInput6.value = colorValue;
					});
					colorPicker7.addEventListener("input", function() {
					  const colorValue = colorPicker7.value;
					  colorPreview7.style.backgroundColor = colorValue;
					  colorInput7.value = colorValue;
					});
				</script>

				<script>
					$(function () {
					  $('[data-toggle="tooltip"]').tooltip();
					});
				</script>

				<script>
					$("#customFile").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings("label[for=customFile]").addClass("selected").html(fileName);
					});

					$("#customFile-banner").on("change", function() {
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings("label[for=customFile-banner]").addClass("selected").html(fileName);
					});

					CKEDITOR.replace('popupdescription');
					CKEDITOR.replace('descriptiona');
					CKEDITOR.replace('page_sk', {
						height: 500,
					});
				</script>
				<?php $this->endSection(); ?>