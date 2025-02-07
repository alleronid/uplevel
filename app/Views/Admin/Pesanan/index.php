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
    font-size: 11px !important;
}

ul li,
b,
label {
    color: #fff;
}

.table thead th {
    font-size: .52rem;
}

.form-select {
    padding: 5px;
    margin: 5px;
    overflow: hidden;
    font-size: 11px;
}

.filter-control .form-select {
    width: 90% !important;
}

.table tbody tr td {
    white-space: normal;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content" style="min-height: 590px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Pesanan</h5>
                        <div class="alert alert-success" role="alert" style="padding:20px">
                            <h5 class="alert-heading">Cara Mengatasi Orderan Gagal</h5>
                            <p>Cek di link berikut <a href="https://hanz-digital.gitbook.io/cara-mengatasi-orderan-gagal/" style="color:#000000;text-decoration:underline">Cara Mengatasi Orderan Gagal</a></p>
                        </div>
                        <b class="d-block mb-1">Keterangan Status</b>
                        <ul class="mb-0 pl-4">
                            <li><b>Pending</b> : Pesanan belum dibayar / menunggu pembayaran</li>
                            <li><b>Processing</b> : Pesanan dalam proses oleh provider / manual</li>
                            <li><b>Success</b> : Pesanan telah berhasil diproses</li>
                            <li><b>Canceled</b> : Pesanan gagal diproses</li>
                            <li hidden><b>Expired</b> : Pesanan gagal / expired</li>
                        </ul>
                        <?= alert(); ?>
                    </div>
                    <div class="table-responsive table-white">
                        <table id="orders-table" data-page-size="20" data-toggle="table" data-search-highlight="true" data-search="true" data-filter-control="true" data-pagination="true" class="table table-white table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Member</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Tujuan</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #fff !important;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">

            </div>
        </div>
    </div>
</div>
<script>
function detail(order_id) {
    $.ajax({
        url: '<?= base_url(); ?>/admin/pesanan/detail/' + order_id,
        success: function(result) {
            $("#modal-detail div div .modal-body").html(result);

            $("#modal-detail").modal('show');
        }
    });
}
</script>
<script>
function copyTable() {
    var table = document.getElementById("myTable");
    var range = document.createRange();
    range.selectNodeContents(table);
    var selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);

    var namaProduk = document.getElementById("namaproduk").textContent;
    var copiedText = namaProduk + "\n" + selection.toString().replace(/\s{2,}/g, ' ');

    document.execCommand("copy");
    alert("Data Joki sudah dicopy");
    selection.removeAllRanges();
}
</script>


<script>
$(document).ready(function() {
    var ordersTable = $('#orders-table').DataTable({
        ajax: {
            url: '<?= base_url(); ?>/admin/pesanan/get_orders_data',
            dataSrc: ''
        },
        columns: [{
                data: 'no'
            },
            {
                data: 'date_create',
                render: function(data) {
                    var dateParts = data.split(' ');
                    return dateParts[0] + '<br>' + dateParts[1];
                }
            },
            {
                data: 'username'
            },
            {
                data: null,
                render: function(data, type, row) {
                    var orderIdClass = '';
                    if (row.status === 'Success') {
                        orderIdClass = 'text-success';
                    } else if (row.status === 'Pending') {
                        orderIdClass = 'text-warning';
                    } else if (row.status === 'Processing') {
                        orderIdClass = 'text-warning';
                    } else if (row.status === 'Canceled') {
                        orderIdClass = 'text-danger';
                    }
                    return row.product + ' <span class="' + orderIdClass + '" style="cursor: pointer" onclick="detail(\'' + row.order_id + '\')">' + '<br>' + 'No Trx : ' + row.order_id + '</span>';
                }
            },
            {
                data: 'price'
            },
            {
                data: 'tujuan'
            },
            {
                data: 'method'
            },
            {
                data: 'status',
                render: function(data, type, row) {
                    var status = '';
                    if (data === 'Success' || data === 'Finished') {
                        status = '<i class="fa fa-check-circle text-success"></i> <span class="text-success">' + data + '</span>';
                    } else if (data === 'Pending') {
                        status = '<i class="fa fa-pause text-warning"></i> <span class="text-warning">' + data + '</span>';
                    } else if (data === 'Processing') {
                        status = '<i class="fa fa-spinner text-warning"></i> <span class="text-warning">' + data + '</span>';
                    } else if (data === 'Canceled' || data === 'Expired') {
                        status = '<i class="fa fa-times-circle text-danger"></i> <span class="text-danger">' + data + '</span>';
                    }
                    return status;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return '<a href="<?= base_url(); ?>/admin/pesanan/edit/' + row.id + '" class="btn btn-primary btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></a> ' +
                        '<button type="button" onclick="hapus(\'<?= base_url(); ?>/admin/pesanan/delete/' + row.id + '\');" class="btn btn-danger btn-sm"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>';
                }
            }
        ],
    });

    setInterval(function() {
        ordersTable.ajax.reload(null, false); // user paging is not reset on reload
    }, 15000);
});
</script>
<?php $this->endSection(); ?>