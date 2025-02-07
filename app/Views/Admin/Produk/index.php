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
										<h5 class="mb-0">Produk</h5>
										<div class="card-tools">
											<a href="<?= base_url(); ?>/admin/produk/get" class="btn btn-primary btn-sm" >Get Produk Digiflazz</a>
											<a href="<?= base_url(); ?>/admin/produk/add" class="btn btn-primary btn-sm">Tambah Produk</a>
											<a href="<?= base_url(); ?>/admin/produk/rawprice" class="btn btn-primary btn-sm" >Update Harga Modal</a>
											<a href="<?= base_url(); ?>/admin/produk/markupharga" class="btn btn-primary btn-sm" >Markup Harga</a>
											<a href="<?= base_url(); ?>/admin/produk/category" class="btn btn-primary btn-sm" hidden>Kategori Produk</a>
											<a href="<?= base_url(); ?>/admin/produk/getbj" class="btn btn-primary btn-sm"  hidden>Get Produk Bangjeff</a>
											<a href="<?= base_url(); ?>/admin/produk/getlg" class="btn btn-primary btn-sm"  hidden>Get Produk Lapakgaming</a>

											
										</div>
									</div>
                					<div class="table-responsive table-white">
                                        <table id="products-table" class="table table-striped" class="display" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th >No</th>
                                                <th >Urut</th>
                                                <th >Games</th>
                                                <th >Kode</th>
                                                <th >Produk</th>
                                                <th >Provider</th>
                                                <th >Harga Jual</th>
                                                <th >Harga Modal</th>
                                                <th >Profit</th>
                                                <th >Status</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
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
                    $(document).ready(function() {

                    $('#products-table').DataTable({
                        ajax: {
                            url: '<?= base_url(); ?>/admin/produk/get_products_data',
                            dataSrc: ''
                        },
                        columns: [
                            { data: 'no' },
                            { data: 'sort' },
                            { 
                                data: 'games',
                                render: function (data, type, row) {
                                    return data;
                                },
                                // Add select filter for Games column
                                select: {
                                    style: 'multi',
                                    selector: 'td:nth-child(3)',
                                    options: []
                                }
                            },
                            { data: 'sku' }, 
                            { data: 'product' },
                            { 
                                data: 'provider',
                                render: function (data, type, row) {
                                    return data;
                                },
                                // Add select filter for Provider column
                                select: {
                                    style: 'multi',
                                    selector: 'td:nth-child(6)',
                                    options: []
                                }
                            },
                            { data: 'price' },
                            { data: 'raw_price' },
                            { data: 'profit_price' }, 
                            { data: 'status' },
                            {
                                data: null,
                                render: function(data, type, row) {
                                return '<a href="<?= base_url(); ?>/admin/produk/edit/' + row.id + '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ' +
                                           '<button type="button" onclick="hapus(\'<?= base_url(); ?>/admin/produk/delete/' + row.id + '\');" class="btn btn-danger btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>';
                                }
                            }
                        ],
                         initComplete: function () {
                            var table = $('#products-table').DataTable();
                            table.columns([2, 5]).every(function () {
                                var column = this;
                                var select = $(`<select><option value="">All</option></select>`)
                                    .appendTo($(column.header()).empty())
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );
            
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });
            
                                column.data().unique().sort().each(function (d, j) {
                                    select.append(`<option value="${d}">${d}</option>`)
                                });
                            });
                        }
                    });
                });
                
                
                </script>


				<?php $this->endSection(); ?>