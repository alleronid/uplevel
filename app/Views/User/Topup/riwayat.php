			<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<style>
                    #datatable_wrapper {
                        padding: 0;
                    }
                
                    #datatable_wrapper .row:nth-child(1),
                    #datatable_wrapper .row:nth-child(3) {
                        padding: 20px 15px;
                    }
                    body {
                        font-size:11px !important;
                    }
                    label {
                        color:#fff;
                    }
                    .table thead th {
                    font-size: .52rem;}
                    
                    .form-select {
                    padding: 5px;
                    margin: 5px;
                    overflow: hidden;
                    font-size: 11px;
                    }
                    .filter-control .form-select {
                        width:90% !important;
                    }
                    
                    .table-dark {
                        color: #fff;
                        background: var(--warna_2);
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
			                    <h5>Riwayat Topup</h5>
			                    <span class="strip-primary"></span>
			                </div>
			                <div class="pb-3">
			                    <div class="section">

			                       <div class="table-responsive table-dark ">
                                    <table id="table" data-page-size="20" data-toggle="table" data-search-highlight="true" data-search="true"  data-filter-control="true"  data-pagination="true" class="table table-dark table-striped" >
                                        <thead>
											<tr>
												<th width="10">No</th>
												<th>Tanggal</th>
												<th>Topup ID</th>
												<th>Username</th>
												<th>Metode</th>
												<th>Jumlah</th>
												<th>Status</th>
												<th>Saldo</th>
											</tr>
											</thead>
										<tbody>
											<?php $no = 1; foreach ($topup as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $loop['date_create']; ?></td>
												<td>
												   <?php if ( in_array($loop['status'], array('Success','Finished')) ) : ?>
												        <b class="cursor-pointer text-success" onclick="detail('<?= $loop['topup_id']; ?>');">No Trx : <?= $loop['topup_id']; ?></b><br>
												    <?php elseif ( in_array($loop['status'], array('Pending')) ) : ?>
												        <b class="cursor-pointer text-warning" onclick="detail('<?= $loop['topup_id']; ?>');">No Trx : <?= $loop['topup_id']; ?></b><br>
												    <?php elseif ( in_array($loop['status'], array('Processing')) ) : ?>
												        <b class="cursor-pointer text-warning" onclick="detail('<?= $loop['topup_id']; ?>');">No Trx : <?= $loop['topup_id']; ?></b><br>
												    <?php elseif ( in_array($loop['status'], array('Canceled','Expired')) ) : ?>
												        <b class="cursor-pointer text-danger" onclick="detail('<?= $loop['topup_id']; ?>');">No Trx : <?= $loop['topup_id']; ?></b><br>
												    <?php endif ?>
												
												</td>
												<td><?= $loop['username']; ?></td>
												<td><?= $loop['method']; ?></td>
												<td>Rp <?= number_format($loop['amount'],0,',','.'); ?></td>
												<td>
												      <?php if ( in_array($loop['status'], array('Success','Finished')) ) : ?>
												        <b class="cursor-pointer text-success" > <?= $loop['status']; ?></b>
												    <?php elseif ( in_array($loop['status'], array('Pending')) ) : ?>
												        <b class="cursor-pointer text-warning" ><?= $loop['status']; ?></b>
												    <?php elseif ( in_array($loop['status'], array('Processing')) ) : ?>
												       <b class="cursor-pointer text-warning" ><?= $loop['status']; ?></b>
												    <?php elseif ( in_array($loop['status'], array('Canceled','Expired')) ) : ?>
												        <b class="cursor-pointer text-danger" ><?= $loop['status']; ?></b>
												    <?php endif ?>
												    
												</td>
												<td>
        											Saldo Sebelum : Rp <?= number_format($loop['saldosb'],0,',','.') ; ?><br>
        											Saldo Setelah : Rp <?= number_format($loop['saldost'],0,',','.') ; ?><br>
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
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
			<script>
    
                     $(function() {
                    $('#table').bootstrapTable()
                  })
                </script>
			<?php $this->endSection(); ?>