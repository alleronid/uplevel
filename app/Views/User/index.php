<?php $this->extend('template'); ?>
			
			<?php $this->section('css'); ?>
			<style>
			    @media (min-width: 1100px) {
                .fab-container {
                    right: 278px;
                }
			    }
			    .btn-logout {
			        background: red;
			        color: #fff !important;
			        padding: 9px 9px;
			    }
			    .tab-success {
			        background: #04b962;
			        color: #fff !important;
			        padding: 5px 10px;
			        border-radius: 32px;
			    }
			    .tab-pending {
			        background: #d3cc00;
			        color: #fff !important;
			        padding: 5px 10px;
			        border-radius: 32px;
			    }
			    .tab-processing {
			        background: orange;
			        color: #fff !important;
			        padding: 5px 10px;
			        border-radius: 32px;
			    }
			    .tab-canceled {
			        background: red;
			        color: #fff !important;
			        padding: 5px 10px;
			        border-radius: 32px;
			    }
			    
			</style>
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
                        background-color: #212529;
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
			                    <h5>Info Profile</h5>
			                    <span class="strip-primary mb-3"></span>
			                </div>
			            <div class="row" style="margin: 10px;">
		                	<div class="col-8 pb-4" style="align-self: center;">
                                <a>
                                    Tipe Membership : 
                                    <b>
                                    <?php
									if ($users['level'] == 'Member') {
										echo "Member Regular";
									} else if ($users['level'] == 'Silver') {
										echo "Reseller";														
									} else if ($users['level'] == 'Gold') {
										echo "Distributor";
									} else {
										echo "Member";
									}
									?>
                                    </b>
                                </a>
                            </div>
                            <div class="col-4 pb-4 text-right">
                                
                                    <a class="btn btn-logout d-block mb-1" href="<?= base_url(); ?>/logout"><i class="fa fa-sign-out mr-2"></i> Logout</a>
                            </div>
                        </div>
                            
			                <?= alert(); ?>

			         
			         
                
                 
                
                
			                
			            <div class="pb-0">
			                <div class="section-game shadow-md"> 
								<div class="body-games">
		                    	 <div class="row">
		                    	    <div class="col-12">
	                        		 <div class="d-flex" style="align-items:center;">
	                        		      <div class="mr-2">
                                              <i class="fa fa-user-circle-o" style="font-size:45px;"  aria-hidden="true"></i>
                                            </div>
	                        		    <div>  
	                        		    <h5>Hai, <?= $users['username']; ?></h5>
										<p><?= $users['wa']; ?></p>
	                        		    </div>
	                        		    </div>
										</div>
	                        		 </div>
	                        	</div>
							</div>
						</div>
			                
			                <div class="pb-3">
                    <div class="section-game shadow-md">
                        <div class="body-games saldo-user-up">
                            <div class="row">
	                        		<div class="col-12">
	                        		    <h5 style="color: #fff !important;">Saldo</h5>
	                        		    </div>
	                        	 <div class="col-12">
	                        		 <div class="d-flex align-items-center justify-content-center">
	                        		      <i class="fa fa-money" style="font-size:25px;color:#fff;padding:5px"  aria-hidden="true"></i>
	                        		    <div>  
	                        		    <h4 style="color: #fff !important;margin-bottom: 0rem !important;">Rp <?= number_format($users['balance'],0,',','.'); ?></h4>
	                        		    </div>
	                        		 </div>
	                        	</div>
        	                        
                           </div>
                        </div>
                        
                        <div class="body-games saldo-user-down">
                            <div class="row">
                                
	                        		<a href="<?= base_url(); ?>/user/topup" class="col-6" style="border-right: 1px solid;">
	                        		    <div class="d-flex mb-1" style="justify-content: center;">
	                        		    <div class="total-pesanan-bg" style="align-self:center;">
	                        		    <i class="fa fa-plus" style="font-size:15px;color:#fff;padding:10px"  aria-hidden="true"></i>
	                        		    </div>
	                        		    </div>
	                        		    <h6>Tambah Saldo</h6>
	                        		</a>
	                        		
	                        		<a href="<?= base_url(); ?>/user/topup/riwayat" class="col-6">
	                        		     
	                        		     <div class="d-flex mb-1" style="justify-content: center;">
	                        		    <div class="total-pesanan-bg" style="align-self:center;">
	                        		    <i class="fa fa-history"  class="p-2" style="font-size:15px;color:#fff;padding:10px"  aria-hidden="true"></i>
	                        		    </div>
	                        		    </div>
	                        		    <h6>Riwayat Deposit</h6>
	                        		</a>
 
                           </div>
                           
                           <div class="row mt-3">
                                
	                        		<a href="<?= base_url(); ?>" class="col-6" style="border-right: 1px solid;">
	                        		    <div class="d-flex mb-1" style="justify-content: center;">
	                        		    <div class="total-pesanan-bg" style="align-self:center;">
	                        		    <i class="fa fa-gamepad" style="font-size:15px;color:#fff;padding:10px"  aria-hidden="true"></i>
	                        		    </div>
	                        		    </div>
	                        		    <h6>Topup Game Sekarang</h6>
	                        		</a>
	                        		
	                        		<a href="<?= base_url(); ?>/tabelharga" class="col-6">
	                        		     
	                        		     <div class="d-flex mb-1" style="justify-content: center;">
	                        		    <div class="total-pesanan-bg" style="align-self:center;">
	                        		    <i class="fa fa-list-alt"  class="p-2" style="font-size:15px;color:#fff;padding:10px"  aria-hidden="true"></i>
	                        		    </div>
	                        		    </div>
	                        		    <h6>Tabel Harga</h6>
	                        		</a>
 
                           </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="pb-0">
                    <div class="section-game shadow-md">
                        <div class="body-games">
                            <div class="row">
	                        	 <div class="col-12">
	                        		 <div class="d-flex" style="align-items:center;">
	                        		      <div class="total-pesanan-bg mr-2" style="align-self:center;">
                                              <i class="fa fa-shopping-cart"  class="p-2" style="font-size:20px;color:#fff;padding:10px"  aria-hidden="true"></i>
                                            </div>
	                        		    <div>  
	                        		    <p style="margin-bottom: 0rem !important;">Total Pesanan</p>
	                        		    <h5 style="margin-bottom: 0rem !important;"><?= number_format($orders,0,',','.'); ?></h5>
	                        		    </div>
	                        		 </div>
	                        	</div>
        	                        
                           </div>
                        </div>
                    </div>
                </div>
                
                <div class="pb-0">
                    <div class="section-game shadow-md">
                        <div class="body-games">
                            <div class="row">
	                        	 <div class="col-12">
	                        		 <div class="d-flex" style="align-items:center;">
	                        		      <div class="total-belanja-bg mr-2" style="align-self:center;">
                                              <i class="fa fa-check"  class="p-2" style="font-size:20px;color:#fff;padding:10px"  aria-hidden="true"></i>
                                            </div>
	                        		    <div>  
	                        		    <p style="margin-bottom: 0rem !important;">Total Pesanan Sukses</p>
	                        		    <h5 style="margin-bottom: 0rem !important;"><?= number_format($jumlahsukses,0,',','.'); ?></h5>
	                        		    </div>
	                        		 </div>
	                        	</div>
        	                        
                           </div>
                        </div>
                    </div>
                </div>
                
                <div class="pb-0">
                    <div class="section-game shadow-md">
                        <div class="body-games">
                            <div class="row">
	                        	 <div class="col-12">
	                        		 <div class="d-flex" style="align-items:center;">
	                        		      <div class="total-belanja-bg mr-2" style="align-self:center;">
                                               <i class="fa fa-credit-card"  class="p-2" style="font-size:20px;color:#fff;padding:10px"  aria-hidden="true"></i>
                                            </div>
	                        		    <div>  
	                        		    <p style="margin-bottom: 0rem !important;">Total Belanja Sukses</p>
	                        		    <h5 style="margin-bottom: 0rem !important;">Rp <?= number_format($jumlahorder,0,',','.'); ?></h5>
	                        		    </div>
	                        		 </div>
	                        	</div>
        	                        
                           </div>
                        </div>
                    </div>
                </div>
                
                <div class="pb-3">
                    <div class="section-game shadow-md">
                        <div class="body-games">
                            <div class="row">
	                        	 <div class="col-12">
	                        		 <div class="d-flex" style="align-items:center;">
	                        		      <div class="pesanan-tertunda-bg mr-2" style="align-self:center;">
                                              <i class="fa fa-spinner"  class="p-2" style="font-size:20px;color:#fff;padding:10px"  aria-hidden="true"></i>
                                            </div>
	                        		    <div>  
	                        		    <p style="margin-bottom: 0rem !important;">Pesanan Tertunda / Proses </p>
	                        		    <h5 style="margin-bottom: 0rem !important;"><?= number_format($riwayatpen,0,',','.'); ?></h5>
	                        		    </div>
	                        		 </div>
	                        	</div>
        	                        
                           </div>
                        </div>
                    </div>
                </div>
                
                <div class="pb-3">
			                    <div class="section-game shadow-md">

			                        
			                        <div class="table-responsive table-dark ">
                                    <table id="table" data-page-size="20" data-toggle="table" data-search-highlight="true" data-search="true"  data-filter-control="true"  data-pagination="true" class="table table-dark table-striped" >
                                        <thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Username</th>
												<th>Produk</th>
												<th>Harga</th>
												<th>Tujuan</th>
												<th>Metode</th>
												<th data-filter-control="select" data-field="status" data-sortable="true">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach ($riwayat as $loop): ?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $loop['date_create']; ?></td>
												<td> 
												
												<?= $loop['username']; ?><br>
												
    												
												
												</td>
												<td>
													<p class="mb-1"><?= $loop['product']; ?></p>

													
													<?php if (!empty($loop['voucher'])): ?>
    													<i class="fa fa-ticket"></i>
    												<?php endif ?>
    												
													<?php if ( in_array($loop['status'], array('Success','Finished')) ) : ?>
												        <a href="<?= base_url(); ?>/payment/<?= $loop['order_id']; ?>"><b class="cursor-pointer text-success" ><i class="fa fa-hand-o-right" aria-hidden="true"></i>
No Trx : <?= $loop['order_id']; ?></b></a><br>
												    <?php elseif ( in_array($loop['status'], array('Pending')) ) : ?>
												        <a href="<?= base_url(); ?>/payment/<?= $loop['order_id']; ?>"><b class="cursor-pointer text-warning" ><i class="fa fa-hand-o-right" aria-hidden="true"></i>
No Trx : <?= $loop['order_id']; ?></b></a><br>
												    <?php elseif ( in_array($loop['status'], array('Processing')) ) : ?>
												        <a href="<?= base_url(); ?>/payment/<?= $loop['order_id']; ?>"><b class="cursor-pointer text-warning" ><i class="fa fa-hand-o-right" aria-hidden="true"></i>
No Trx : <?= $loop['order_id']; ?></b></a><br>
												    <?php elseif ( in_array($loop['status'], array('Canceled','Expired')) ) : ?>
												       <a href="<?= base_url(); ?>/payment/<?= $loop['order_id']; ?>"><b class="cursor-pointer text-danger" ><i class="fa fa-hand-o-right" aria-hidden="true"></i>
No Trx : <?= $loop['order_id']; ?></b></a><br>
												    <?php endif ?>
												    
												    
    												
    												
												</td>
												
												<td>Rp <?= number_format($loop['price'],0,',','.') ; ?></td>

												<td>
												   
												    <?php 
												    
												    if ($loop['zone_id'] == 1) {
												        echo $loop['user_id'];
												    } else if ($loop['zone_id'] == '') {
												        echo $loop['user_id'];
												    } else {
												        echo $loop['user_id'].' ('.$loop['zone_id'].') ';
												    }
													
													?>
												    
												</td>
												<td>
												    <?= $loop['method']; ?><br>

												</td>
												
												<td>
												    <?php if ( in_array($loop['status'], array('Success','Finished')) ) : ?>
												        <?= $loop['status']; ?>
												    <?php elseif ( in_array($loop['status'], array('Pending')) ) : ?>
												        <?= $loop['status']; ?>
												    <?php elseif ( in_array($loop['status'], array('Processing')) ) : ?>
												       <?= $loop['status']; ?>
												    <?php elseif ( in_array($loop['status'], array('Canceled','Expired')) ) : ?>
												        <?= $loop['status']; ?>
												    <?php endif ?>
												    
												

												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
										</table>
									</div>
									
			                    </div>
			                </div>
			                
			    <div class="pb-3">
                    <div class="section-game shadow-md">
                        <div class="body-games">
                            <div class="row">
	                        	 <div class="col-12">
	                        		 <form action="" method="POST">
			                        		<div class="form-group">
			                        			<h5>Username</h5>
			                        			<input type="text" class="form-control" readonly="" value="<?= $users['username']; ?>">
			                        			<small>Username tidak dapat diganti</small>
			                        		</div>
			                        		<div class="form-group">
			                        			<h5>Whatsapp</h5>
			                        			<input type="number" class="form-control" value="<?= $users['wa']; ?>" name="wa">
			                        		</div>
			                        		<div class="text-right">
			                        			<button style="color: var(--warna_4)" class="btn" type="reset">Batal</button>
			                        			<button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
			                        		</div>
			                        	</form>
	                        	</div>
        	                        
                           </div>
                        </div>
                    </div>
                </div>  
			                
			    <div class="pb-3">
                    <div class="section-game shadow-md">
                        <div class="body-games">
                            <div class="row">
	                        	 <div class="col-12">
	                        		 <h5>Ganti Password</h5>
			                        	<form action="" method="POST">
			                        		<div class="form-group">
			                        			<h6>Password Lama</h6>
			                        			<input type="password" class="form-control" name="passwordl">
			                        		</div>
			                        		<div class="form-group">
			                        			<h6>Password Baru</h6>
			                        			<input type="password" class="form-control" name="passwordb">
			                        		</div>
			                        		<div class="form-group">
			                        			<h6>Ulangi Password Baru</h6>
			                        			<input type="password" class="form-control" name="passwordbb">
			                        		</div>
			                        		<div class="text-right">
			                        			<button style="color: var(--warna_4)" class="btn" type="reset">Batal</button>
			                        			<button class="btn btn-primary" type="submit" name="btn_password" value="password">Simpan</button>
			                        		</div>
			                        	</form>
	                        	</div>
        	                        
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
			<?php $this->endSection(); ?>