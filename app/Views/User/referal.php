			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<?php $this->endSection(); ?>
			
			<?php $this->section('content'); ?>
			<div class="content" style="min-height: 580px;">
			    <div class="container">
			        <div class="row">
			            
			            <?= $this->include('header-user'); ?>

			            <div class="col-lg-9">
			            	<div class="pb-4">
			                    <h5>Referal</h5>
			                    <span class="strip-primary"></span>
			                </div>

			                <?= alert(); ?>

			                <div class="pb-3">
			                    <div class="section">
			                        <div class="card-body">
			                        	<p>Dapatkan makin banyak keuntungan dengan mengundang teman kamu menggunakan link referal kamu. Kamu akan menerima komisi sebesar <?= $komisi_ref; ?>% dari transaksi pertama pengguna yang menggunakan kode referal kamu.</p>
		                        		<div class="form-group">
		                        			<label class="text-white">Link Referal</label>
		                        			<input type="url" class="form-control bg-white" readonly="" value="<?= base_url(); ?>/register/<?= $users['ref']; ?>">
		                        		</div>
			                        </div>
			                        <div class="table-responsive">
			                        	<table class="table mb-0 table-white">
			                        		<tr>
			                        			<th>No</th>
			                        			<th>Username</th>
			                        			<th>Komisi</th>
			                        			<th>Terdaftar</th>
			                        		</tr>
			                        		<?php $no = 1; foreach ($user_ref as $loop): ?>
			                        		<tr>
			                        			<td><?= $no++; ?></td>
			                        			<td><?= substr($loop['username'], -3); ?>***</td>
			                        			<td><?= $loop['id']; ?></td>
			                        			<td><?= $loop['date_create']; ?></td>
			                        		</tr>
			                        		<?php endforeach ?>

			                        		<?php if (count($user_ref) == 0): ?>
			                        		<tr>
			                        			<td colspan="4" align="center">Tidak ada pengguna</td>
			                        		</tr>
			                        		<?php endif ?>
			                        	</table>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<?php $this->endSection(); ?>
			
			<?php $this->section('js'); ?>
			<?php $this->endSection(); ?>