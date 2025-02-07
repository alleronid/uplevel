<?php $this->extend('templateadmin'); ?>
				
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
                    
            
                    .card .table td, .card .table th {
                            padding-right: 0px ;
                            padding-left: 0px;
                                text-align: center;
                        }
                    .table td, .table th {
    padding: 0.45rem;}
                </style>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-0">Games</h5>
										<div class="card-tools">
											<a href="<?= base_url(); ?>/admin/games/add" class="btn btn-primary btn-sm">Tambah Games</a>
											<a href="<?= base_url(); ?>/admin/games/get" class="btn btn-primary btn-sm" hidden>Get Games Digiflazz</a>
											<a href="<?= base_url(); ?>/admin/games/getbj" class="btn btn-primary btn-sm"  hidden>Get Games Bangjeff</a>
											<a href="<?= base_url(); ?>/admin/games/getlg" class="btn btn-primary btn-sm"  hidden>Get Games Lapakgaming</a>
											<a href="<?= base_url(); ?>/admin/games/getvoca" class="btn btn-primary btn-sm"  hidden>Get Games Vocagame</a>



										</div>

										<?= alert(); ?>

									</div>
									<div class="table-responsive table-white ">
                                    <table id="table" data-sort-select-options="true" data-page-size="100" data-sort-name="games" data-sort-order="asc" data-toggle="table" data-search-highlight="true"   data-filter-control="true"  data-pagination="true" class="table table-white table-striped" >
                
											<thead>
											<tr>
												<th data-sortable="true" width="10">No</th>
												<th>Img</th>
												<th data-sortable="true" data-field="games">Games</th>
												<th data-sortable="true" data-filter-control="select" data-field="kategori"  >Kategori</th>
												<th>Produk</th>
												<th data-sortable="true">Status</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php $no = 1; foreach ($games as $loop): ?>
											
											<tr>
												<td><?= $no++; ?></td>
												<td><img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" alt="" width="40" class="mr-1 rounded"></td>
												<td style="text-align: left;">
													<?= $loop['games']; ?>
												</td>
												<td><?= $loop['category']; ?></td>
												<td><?= $loop['product']; ?> Produk</td>
												<td><?= $loop['status']; ?></td>
												<td width="10">
													<a href="<?= base_url(); ?>/admin/games/edit/<?= $loop['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
													<button type="button" onclick="hapus('<?= base_url(); ?>/admin/games/delete/<?= $loop['id']; ?>');" class="btn btn-danger btn-sm">Hapus</button>
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
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<script>
    
                     $(function() {
                    $('#table').bootstrapTable()
                  })
                
                
                
                </script>
				<?php $this->endSection(); ?>