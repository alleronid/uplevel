<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
		.card {
				background-color: transparent !important;
		}


		button.accordion-button {
				outline: none !important;
				border: none !important;
				box-shadow: none !important;
		}

		.text-end {
				text-align: right !important;
		}

		.icon-diamondx {
				height: 2.5rem;
				float: right;
		}

		.accordion {
				--bs-accordion-color: #000;
				--bs-accordion-bg: #fff;
				--bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
				--bs-accordion-border-color: var(--bs-border-color);
				--bs-accordion-border-width: 1px;
				--bs-accordion-border-radius: 0.375rem;
				--bs-accordion-inner-border-radius: calc(0.375rem - 1px);
				--bs-accordion-btn-padding-x: 1.25rem;
				--bs-accordion-btn-padding-y: 1rem;
				--bs-accordion-btn-color: var(--bs-body-color);
				--bs-accordion-btn-bg: var(--bs-accordion-bg);
				--bs-accordion-btn-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='var%28--bs-body-color%29'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
				--bs-accordion-btn-icon-width: 1.25rem;
				--bs-accordion-btn-icon-transform: rotate(-180deg);
				--bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
				--bs-accordion-btn-active-icon: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
				--bs-accordion-btn-focus-border-color: #86b7fe;
				--bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
				--bs-accordion-body-padding-x: 1.25rem;
				--bs-accordion-body-padding-y: 1rem;
				--bs-accordion-active-color: #0c63e4;
				--bs-accordion-active-bg: #e7f1ff;
		}

		.accordion-button::after {
				flex-shrink: 0;
				width: var(--bs-accordion-btn-icon-width);
				height: var(--bs-accordion-btn-icon-width);
				margin-left: auto;
				content: "";
				background-image: var(--bs-accordion-btn-icon);
				background-repeat: no-repeat;
				background-size: var(--bs-accordion-btn-icon-width);
				transition: var(--bs-accordion-btn-icon-transition);
		}

		.accordion-body {
				padding: var(--bs-accordion-body-padding-y) var(--bs-accordion-body-padding-x);
				background: var(--warna_2)
		}

		.accordion-button {
				box-shadow: none !important;
				position: relative;
				display: flex;
				align-items: center;
				width: 100%;
				padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x);
				font-size: 1rem;
				color: var(--bs-accordion-btn-color);
				text-align: left;
				background-color: var(--bs-accordion-btn-bg);
				border: 0;
				border-radius: 0;
				overflow-anchor: none;
				transition: var(--bs-accordion-transition);
		}

		.accordion-button.collapsed::after {
				background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
		}

		.accordion-button:not(.collapsed)::after {
				background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
		}

		.boks {
				box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
				border-radius: 6px;
		}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content" style="min-height: 580px;">
		<div class="container">
				<div class="row">

						<?= $this->include('header-user'); ?>

						<div class="col-lg-12">	
								<div class="pb-4">
										<div class="float-right mt-2">
												<a href="<?= base_url(); ?>/user/topup/riwayat">
														<h6><i class="fa fa-history mr-2"></i> Riwayat</h6>
												</a>
										</div>
										<h5>Top Up</h5>
										<span class="strip-primary"></span>
								</div>
								<div class="pb-3">
										<div class="section section-game" style="border: 0px;box-shadow: none!important;background:var(--warna_2);">
												<div class="card-body">
															<?= alert(); ?>
															<?= alert('Silakan Gunakan Method lain'); ?>
														<form action="" method="POST">
																<div class="form-group">
																		<label class="text-white">Nominal Topup</label>
																		<input type="number" class="form-control" autocomplete="off" name="nominal" id="nominal_topup" onchange="update_total()">
																</div>
																<div class="accordion mb-3 mt-3 boks" id="bbank">
																		<?php
																					$count = 0;
																					foreach ($accordion_data as $category => $methods):
																							$count++;
																					?>

																				<div class="accordion-item mb-3">
																						<h2 class="accordion-header mb-0">
																								<button class="accordion-button collapsed" style="background-color: var(--warna);height: 0;padding: 20px;border-radius: 7px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $count; ?>" aria-expanded="false" aria-controls="collapse<?= $count; ?>">
																										<div class="left text-white">
																												<?php if ($category == 'Bank Transfer'): ?>
																														<i class="fa fa-university"></i>&nbsp
																														<?= $category; ?>
																												<?php elseif ($category == 'QRIS'): ?>
																														<i class="fa fa-barcode"></i> &nbsp
																														<?= $category; ?>
																												<?php elseif ($category == 'Virtual Account'): ?>
																														<i class="fa fa-credit-card-alt"></i>&nbsp
																														<?= $category; ?>
																												<?php elseif ($category == 'E-Wallet'): ?>
																														<i class="fa fa-money"></i>&nbsp
																														<?= $category; ?>
																												<?php elseif ($category == 'Convenience Store'): ?>
																														<i class="fa fa-shopping-basket"></i>&nbsp
																														<?= $category; ?>
																												<?php elseif ($category == 'Pulsa'): ?>
																														<i class="fa fa-phone"></i>&nbsp
																														<?= $category; ?>
																												<?php endif ?>
																										</div>
																								</button>
																						</h2>
																						<div id="collapse<?= $count; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $count; ?>" data-bs-parent="blok<?= $count; ?>">
																								<div class="accordion-body">
																										<div class="row">

																												<?php foreach ($methods as $method): ?>
																														<div class="col-lg-12 ceklis" id="metode-<?= $method['id']; ?>">
																																<input class="radio-nominal" type="radio" name="method" value="<?= $method['id']; ?>" id="method-<?= $method['id']; ?>">
																																<label for="method-<?= $method['id']; ?>">
																																		<div class="row">
																																				<div class="col-4">
																																						<div class="mr-2 pb-0">
																																								<img src="<?= base_url(); ?>/assets/images/method/<?= $method['image']; ?>" class="rounded mb-1" style="height: 40px;width:auto">
																																						</div>
																																				</div>
																																				<div class="col-8 ">
																																						<div class="ml-2 mt-1 text-right">
																																								<b class="mb-2" style="font-weight: 600; font-size: 14px;" id="price-method-<?= $method['code']; ?>"></b>
																																								<input value="<?= $method['mdr_rate']; ?>" id="rate-<?= $method['code']; ?>" hidden />
																																								<input value="<?= $method['amount_fee']; ?>" id="fee-<?= $method['code']; ?>" hidden />
																																						</div>
																																				</div>
																																				<div style="font-size: 12px;" class="col-12">
																																						<b class="d-block mb-2 mx-1">
																																								<?= $method['method']; ?>
																																						</b>
																																						<b class="d-block"></b>
																																				</div>
																																		</div>
																																</label>
																														</div>
																												<?php endforeach; ?>


																										</div>
																								</div>
																						</div>
																						<div class="p-2 text-end " style="border-radius: 0 0 6px 6px;background: #fff;">
																								<?php foreach ($methods as $method): ?>
																										<img src="<?= base_url(); ?>/assets/images/method/<?= $method['image']; ?>" alt="" height="20" style="border-radius:5px" style="border-radius:5px">
																								<?php endforeach; ?>
																						</div>
																				</div>
																		<?php endforeach; ?>
																</div>
																<div class="text-right">
																		<button class="btn text-white" type="reset">Batal</button>
																		<button class="btn btn-primary" type="submit" name="tombol" value="submit">Topup Sekarang</button>
																</div>
														</form>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<style>
		#topuprow .col-sm-6 {
				-ms-flex: 0 0 50%;
				flex: 0 0 100%;
				max-width: 100%;
		}
</style>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
		function update_total() {
				var harga = parseFloat(document.getElementById("nominal_topup").value) || 0;
				var qrisc = document.getElementById("price-method-BNC_QRIS");
				var danad = document.getElementById("price-method-DANA");
				var vabni = document.getElementById("price-method-BNIVA");
				var vamandiri = document.getElementById("price-method-MANDIRIVA");
				var vacimbd = document.getElementById("price-method-CIMBVA");

				const mdrQris = $('#rate-BNC_QRIS').val()
				const mdrDana = $('#rate-DANA').val()
				const mdrBNI = $('#rate-BNIVA').val();
				const mdrCIMB = $('#rate-CIMBVA').val();
				const mdrMANDIRI = $('#rate-MANDIRIVA').val();

				const feeBNI = $('#fee-BNIVA').val()
				const feeCIMB = $('#fee-CIMBVA').val()
				const feeMANDIRI = $('#fee-MANDIRIVA').val()

				if (qrisc !== null) {
						let rate = (1 + (mdrQris / 100)).toFixed(3);
						qrisc.innerHTML = 'Rp ' + (Math.round((harga * rate))).toLocaleString('id-ID');
				}

				if (danad !== null) {
						let rate = (1 + (mdrDana / 100)).toFixed(3);
						danad.innerHTML = 'Rp ' + (Math.round(harga * rate)).toLocaleString('id-ID');
				}

				if (vamandiri !== null) {
						const rate = (mdrMANDIRI / 100).toFixed(3)
						vamandiri.innerHTML = 'Rp ' + (Math.round((harga * parseFloat(rate)) + harga + parseInt(feeMANDIRI))).toLocaleString('id-ID');
				}

				if (vabni !== null) {
						const rate = (mdrBNI / 100).toFixed(3)
						vabni.innerHTML = 'Rp ' + (Math.round((harga * parseFloat(rate)) + harga + parseInt(feeBNI))).toLocaleString('id-ID');
				}

				if (vacimbd !== null) {
						const rate = (mdrCIMB / 100).toFixed(3)
						vacimbd.innerHTML = 'Rp ' + (Math.round((harga * parseFloat(rate)) + harga + parseInt(feeCIMB))).toLocaleString('id-ID');
				}
		}
</script>
<?php $this->endSection(); ?>