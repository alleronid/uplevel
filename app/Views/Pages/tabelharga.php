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
</style>
<style>
    .content {
        background: #fff !important;
    }


    .dropdown-menu-dark {
        color: rgb(222, 226, 230);
        background-color: rgb(52, 58, 64);
        border-color: rgba(0, 0, 0, 0.15);
    }

    .menu-bottom p {
        color: #7294a5;
    }

    .row {
        justify-content: center;
    }
    label {
        color: #000;
    }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="pt-5 content" style="padding-bottom:150px">
    <div class="container">
        <div class="row justify-content-center pt-4">
            <div class="col-lg-12">
                <div class="pt-3 pb-4">
                <h5>Daftar Harga</h5>
                <span class="strip-primary"></span>
			    </div>
                <p>Geser tabel untuk melihat lebih detail</p>
                <div class="table-responsive">
                    <table id="table" data-toggle="table" data-search="true" data-filter-control="true"
                        data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar"
                        class="table table-striped" style="width:100%;">


                        <thead>
                            <tr>
                                <th width="5%" data-field="state" data-sortable="true">ID</th>
                                <th width="10%">Games</th>
                                <th width="20%">Produk</th>
                                <th width="15%">Harga Publik</th>
                                <th width="15%">Member Silver</th>
                                <th width="15%">Member Gold</th>
                                <th width="15%" class="text-center">Status</th>
                                <th width="5%" data-filter-control="select" data-sortable="true" hidden>Kode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tabel as $product): ?>

                            <tr>
                                <td width="5%">
                                    <?= $product['id']; ?>
                                </td>

                                <td width="10%">
                                    <?= $product['games']; ?>
                                </td>
                                <td width="20%">
                                    <?= $product['product']; ?>
                                </td>
                                <td width="15%">Rp
                                    <?= number_format($product['price']['member'],0,',','.'); ?>
                                </td>
                                <td width="15%">Rp
                                    <?= number_format($product['price']['silver'],0,',','.'); ?>
                                </td>
                                <td width="15%">Rp
                                    <?= number_format($product['price']['gold'],0,',','.'); ?>
                                </td>
                                <td width="15%" align="center">
                                    <?= $product['status']; ?>
                                </td>
                                <td width="5%" hidden>
                                    <?= $product['sku']; ?>
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
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
    $("#datatable").DataTable({
        ordering: false,
    });

    $('.double-scroll').doubleScroll();

    $(document).ready(function () {
        $('#table').DataTable();
    });



</script>
<?php $this->endSection(); ?>