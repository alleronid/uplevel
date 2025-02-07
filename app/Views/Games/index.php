<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
p {
    color: #fff
}

.h3,
h3 {
    font-size: 25px;
}

@media (min-width: 1200px) {
    .container {
        max-width: 1212px;
    }
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
<div class="clearfix pt-5"></div>
<div class="pt-5 pb-5" style="padding-bottom: 0rem!important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="section shadow-form" style="padding:20px;margin-bottom:20px;">
                    <div class="text-center pt-3 pb-2">
                        <img src="<?= base_url(); ?>/assets/images/games/<?= $games['image']; ?>" class="mb-3" style="display: block; margin: 0 auto; border-radius: 10px !important;" width="120px" height="120px">
                        <h5></h5>
                    </div>
                    <div class="pb-3">
                        <?= $games['content']; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">

                <?= alert(); ?>

                <div class="pb-3">
                    <div class="section">
                        <div class="card-header ">
                            <h5 class="kios-card-title text-white">Lengkapi Data </h5>
                        </div>
                        <div class="card-body">
                            <?= $this->include('Target/' . $games['target']); ?>
                        </div>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="section">
                        <div class="card-header ">
                            <h5 class="kios-card-title text-white">Pilih Nominal Layanan </h5>
                        </div>
                        <div class="card-body">
                            <div class="row pt-3 pl-2 pr-2 mb-2">
                                <?php if (count($product) == 0): ?>
                                <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible mt-2 mb-0" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <div class="alert-icon">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="alert-message">
                                            <strong>Information!</strong> Produk sedang tidak tersedia.
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                                <?php foreach ($product as $loop): ?>
                                <div class="col-sm-4 col-6">
                                    <input type="radio" for="product-<?= $loop['id']; ?>" id="product-<?= $loop['id']; ?>" class="radio-nominale" name="product" value="<?= $loop['id']; ?>" onchange="get_price(this.value);">
                                    <label for="product-<?= $loop['id']; ?>" style="display: flex;justify-content: space-between;">
                                        <div>
                                            <a style="display: flex;font-weight: bold;font-size: 12px;" for="product-<?= $loop['id']; ?>"><?= $loop['product']; ?></a>
                                            <a style="font-style: italic;" class="currency-idr">
                                                <?= $loop['price']; ?>
                                            </a>
                                        </div>

                                        <img onerror="this.style.display='none'" src="<?= base_url(); ?>/assets/images/product/<?= $loop['image']; ?>" loading="lazy" class="icon-diamondx">
                                        </input>

                                    </label>
                                </div>
                                <?php endforeach ?>


                            </div>

                            <?php if ($games['id'] == '3'): ?>
                            <style>
                            .kuantitibox {
                                display: none;
                            }
                            </style>
                            <?php endif ?>

                            <?php if ($games['target'] == 'joki'): ?>
                            <div class="kuantitibox mt-4">
                                <h5 class="mb-2">Masukkan Jumlah (MMR/Point/Win)</h5>
                                <input type="number" class="form-control name-joki" value="1" id="jumlah_star_poin" name="joki[jumlah_star_poin]" onchange="update_total();">
                                <p style="font-size: 12px;">Minimal Order adalah 5, Jika Kurang Dari Minimal order maka
                                    uang akan hangus</p>
                            </div>

                            <?php if ($games['slug'] == 'paket-hemat-joki'): ?>
                            <style>
                            .kuantitibox {
                                visibility: hidden;
                            }
                            </style>
                            <?php endif ?>

                            <?php endif ?>

                            <?php if ($games['target'] == 'videomontage'): ?>
                            <div class="kuantitibox mt-4">
                                <h5 class="mb-2">Masukkan Jumlah Menit</h5>
                                <input type="number" class="form-control name-videomontage" value="1" id="jumlah_menit" name="videomontage[jumlah_menit]" onchange="update_total();">
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="section section-game" style="border: 0px;box-shadow: none!important;background:var(--warna_2);">
                        <div class="card-body">
                            <div class="text-white text-center position-absolute circle-primary" hidden>3</div>
                            <h5 style="margin-top: 5px;">Pilih Pembayaran</h5>
                            <?php if ($pay_balance === 'Y'): ?>
                            <div class="accordion mb-3 mt-3 boks" id="bsaldo">
                                <div class="accordion-item">
                                    <h2 class="accordion-header mb-0" id="heading-saldo">
                                        <button class="accordion-button collapsed" style="background-color: var(--warna);height: 0;padding: 20px;border-radius: 7px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-saldo" aria-expanded="false" aria-controls="collapse-saldo">
                                            <div class="left text-white">
                                                <i class="fa fa-address-card"></i> Saldo Akun (Member/Reseller)
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse-saldo" class="accordion-collapse collapse" aria-labelledby="heading-saldo" data-bs-parent="bsaldo">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-lg-12 ceklis">
                                                    <input class="radio-nominal" type="radio" name="method" value="balance" id="method-balance">
                                                    <label for="method-balance">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="mr-2 pb-0">
                                                                    <img src="<?= base_url(); ?>/assets/images/method/balance.png" class="rounded mb-1" style="height: 40px;width:auto">
                                                                </div>
                                                            </div>
                                                            <div class="col-8 ">
                                                                <div class="ml-2 mt-1 text-right">
                                                                    <b class="mb-2" style="font-weight: 600; font-size: 14px;" id="price-method-balance"></b>
                                                                </div>
                                                            </div>
                                                            <div style="font-size: 12px;" class="col-12 ">
                                                                <b class="d-block mb-2 mx-1">Saldo Akun
                                                                    (Member/Reseller)</b>
                                                                <b class="d-block"></b>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 text-end " style="border-radius: 0 0 6px 6px;background: #fff;">
                                        <img src="<?= base_url(); ?>/assets/images/method/balance.png" alt="" height="20" style="border-radius:5px" style="border-radius:5px">
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>


                            <div class="accordion mb-3 mt-3 boks" id="bbank">
                                <?php
                                $count = 0; foreach ($accordion_data as $category => $methods):
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
                        </div>
                    </div>
                </div>

                <div class="pb-3">
                    <div class="section">
                        <div class="card-header ">
                            <h5 class="kios-card-title text-white">Kode Voucher </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group pt-3">
                                <div class="input-group">
                                    <input type="text" name="voucher" placeholder="Optional" class="form-control">
                                    <button class="btn btn-primary" type="button" onclick="cek_voucher();">Cek</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-3 pt-3">
                    <div class="section">
                        <div class="card-header ">
                            <h5 class="kios-card-title text-white">Konfirmasi Pesanan </h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group pt-3">

                                <input type="text" name="wa" placeholder="Masukan No. Whatsapp" class="form-control" value="" required>

                                <small class="mt-2 d-block mb-3">
                                    Dengan membeli otomatis saya menyutujui <a href="<?= base_url(); ?>/syarat-ketentuan/" target="_blank" class="text-warning">Ketentuan Layanan</a>.
                                </small>
                                <button type="button" class="btn btn-primary text-white" onclick="process_order();">Beli
                                    Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-detail">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-white animated bounceIn" style="background: var(--warna_2);">
                            <div class="card-header border-bottom-0">
                                <h5 class="text-white">Detail Pembelian</h5>
                            </div>
                            <div class="modal-body pt-0">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-loading" hidden>
                    <div class="modal-dialog modal-dialog-centered text-center" style="max-width: 100px;">
                        <img src="<?= base_url(); ?>/assets/images/loading.gif" alt="" width="150" style="border-radius: 40px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script>
$('#wa').on('input', function() {
    if (this.value.startsWith('08')) {
        this.value = "628";
    }
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
});

$('.currency-idr').each(function() {
    var monetary_value = $(this).text();
    var i = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(monetary_value);
    $(this).text(i);
});

function parseNumber(strg) {
    var strg = strg || "";
    var decimal = '.';
    strg = strg.replace(/[^0-9$.,]/g, '');
    if (strg.indexOf(',') > strg.indexOf('.')) decimal = ',';
    if ((strg.match(new RegExp("\\" + decimal, "g")) || []).length > 1) decimal = "";
    if (decimal !== "" && (strg.length - strg.indexOf(decimal) - 1 == 3) && strg.indexOf("0" + decimal) !== 0) decimal = "";
    strg = strg.replace(new RegExp("[^0-9$" + decimal + "]", "g"), "");
    strg = strg.replace(',', '.');
    return parseFloat(strg);
}



function get_price(id = null) {

    <?php if ($games['target'] == 'joki'): ?>
    var jumlah = $("#jumlah_star_poin").val();
    <?php elseif ($games['target'] == 'videomontage'): ?>
    var jumlah = $("#jumlah_menit").val();
    <?php else: ?>
    var jumlah = 1;
    <?php endif; ?>


    $("#product_id").val(id);

    $.ajax({
        url: '<?= base_url(); ?>/games/order/get-price/' + id,
        type: 'POST',
        data: 'jumlah=' + jumlah,
        dataType: 'JSON',
        success: function(result) {
            for (let price in result) {
                $("#price-method-" + result[price].method).text('Rp ' + result[price].price);

                var harga = parseNumber(result[price].price);

                var balance = document.getElementById("price-method-balance");

                var qrisc = document.getElementById("price-method-QRISC");
                var ovo = document.getElementById("price-method-OVO");
                var shopee = document.getElementById("price-method-SHOPEEPAY");
                var vabsi = document.getElementById("price-method-BSIVA");
                var vabni = document.getElementById("price-method-BNIVA");
                var vabca = document.getElementById("price-method-BCAVA");
                var vapermata = document.getElementById("price-method-PERMATAVA");
                var vamandiri = document.getElementById("price-method-MANDIRIVA");
                var vabri = document.getElementById("price-method-BRIVA");
                var indomaret = document.getElementById("price-method-INDOMARET");
                var alfamart = document.getElementById("price-method-ALFAMART");
                var alfamidi = document.getElementById("price-method-ALFAMIDI");


                var qrisd = document.getElementById("price-method-LQ");
                var ovod = document.getElementById("price-method-OV");
                var danad = document.getElementById("price-method-DA");
                var shopeed = document.getElementById("price-method-SA");
                var linkajad = document.getElementById("price-method-LA");
                var vaatmd = document.getElementById("price-method-A1");
                var vabnid = document.getElementById("price-method-I1");
                var dvabri = document.getElementById("price-method-BR");
                var vamayd = document.getElementById("price-method-VA");
                var vapermatad = document.getElementById("price-method-BT");
                var vacimbd = document.getElementById("price-method-B1");
                var alfamartd = document.getElementById("price-method-FT");
                var mandirid = document.getElementById("price-method-M1");

                if (balance !== null) {
                    balance.innerHTML = 'Rp ' + (Math.round((harga))).toLocaleString('id-ID');
                }

                if (qrisc !== null) {
                    qrisc.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 800)).toLocaleString('id-ID');
                }
                if (ovo !== null) {
                    ovo.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                }
                if (shopee !== null) {
                    shopee.innerHTML = 'Rp ' + (Math.round(harga * 1.03)).toLocaleString('id-ID');
                }
                if (vabsi !== null) {
                    vabsi.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabca !== null) {
                    vabca.innerHTML = 'Rp ' + (Math.round(harga + 5500)).toLocaleString('id-ID');
                }
                if (vabni !== null) {
                    vabni.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vapermata !== null) {
                    vapermata.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vamandiri !== null) {
                    vamandiri.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (vabri !== null) {
                    vabri.innerHTML = 'Rp ' + (Math.round(harga + 4250)).toLocaleString('id-ID');
                }
                if (indomaret !== null) {
                    indomaret.innerHTML = 'Rp ' + (Math.round(harga + 6500)).toLocaleString('id-ID');
                }
                if (alfamart !== null) {
                    alfamart.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }
                if (alfamidi !== null) {
                    alfamidi.innerHTML = 'Rp ' + (Math.round(harga + 6000)).toLocaleString('id-ID');
                }


                if (qrisd !== null) {
                    qrisd.innerHTML = 'Rp ' + (Math.round((harga * 1.007) + 0)).toLocaleString('id-ID');
                }
                if (ovod !== null) {
                    ovod.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (danad !== null) {
                    danad.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (shopeed !== null) {
                    shopeed.innerHTML = 'Rp ' + (Math.round(harga * 1.04)).toLocaleString('id-ID');
                }
                if (linkajad !== null) {
                    linkajad.innerHTML = 'Rp ' + (Math.round(harga * 1.0167)).toLocaleString('id-ID');
                }
                if (vaatmd !== null) {
                    vaatmd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vabnid !== null) {
                    vabnid.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (dvabri !== null) {
                    dvabri.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vamayd !== null) {
                    vamayd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vapermatad !== null) {
                    vapermatad.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (vacimbd !== null) {
                    vacimbd.innerHTML = 'Rp ' + (Math.round(harga + 3000)).toLocaleString('id-ID');
                }
                if (alfamartd !== null) {
                    alfamartd.innerHTML = 'Rp ' + (Math.round(harga + 2500)).toLocaleString('id-ID');
                }
                if (vamandirid !== null) {
                    vamandirid.innerHTML = 'Rp ' + (Math.round(harga + 4000)).toLocaleString('id-ID');
                }



            }

        }
    });
}

function update_total() {
    get_price($("#product_id").val());
}

function process_order() {

    <?php if ($games['target'] == 'joki'): ?>
    var user_id = $('.name-joki').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'skinml'): ?>
    var user_id = $('.name-skinml').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'videomontage'): ?>
    var user_id = $('.name-videomontage').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'topuplogin'): ?>
    var user_id = $('.name-topuplogin').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-ragnarox'): ?>
    var user_id = $('.name-lg-ragnarox').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-dragonhunter'): ?>
    var user_id = $('.name-lg-dragonhunter').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-fourgods'): ?>
    var user_id = $('.name-lg-fourgods').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-genshinimpact'): ?>
    var user_id = $('.name-lg-genshinimpact').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-ninokuni'): ?>
    var user_id = $('.name-lg-ninokuni').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-neverafter'): ?>
    var user_id = $('.name-lg-neverafter').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'lg-clashofclans'): ?>
    var user_id = $('.name-lg-clashofclans').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginapex'): ?>
    var user_id = $('.name-loginapex').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginefootball'): ?>
    var user_id = $('.name-loginefootball').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginff'): ?>
    var user_id = $('.name-loginff').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'logingenshin'): ?>
    var user_id = $('.name-logingenshin').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginml'): ?>
    var user_id = $('.name-loginml').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginninokuni'): ?>
    var user_id = $('.name-loginninokuni').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginpokemon'): ?>
    var user_id = $('.name-loginpokemon').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginraven'): ?>
    var user_id = $('.name-loginraven').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'logintiktok'): ?>
    var user_id = $('.name-logintiktok').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'logintower'): ?>
    var user_id = $('.name-logintower').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'loginwildrift'): ?>
    var user_id = $('.name-loginwildrift').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php elseif ($games['target'] == 'tournament'): ?>
    var user_id = $('.name-tournament').map(function() {
        return this.value;
    }).get();
    user_id = JSON.stringify(user_id);

    var zone_id = '1';

    <?php else: ?>
    var user_id = $("input[name=user_id]").val();
    var zone_id = $("input[name=zone_id]").val();
    <?php endif; ?>

    if (zone_id == undefined) {
        zone_id = $("select[name=zone_id]").val();
    }

    var product = $("input[name=product]:checked").val();
    var method = $("input[name=method]:checked").val();
    var wa = $("input[name=wa]").val();
    var voucher = $("input[name=voucher]").val();

    if (user_id == '' || user_id == ' ') {
        Swal.fire('Gagal', 'ID Player harus diisi', 'error');
    } else if (zone_id == '' || zone_id == ' ') {
        Swal.fire('Gagal', 'ID Player harus diisi', 'error');
    } else if (product == '' || product == ' ') {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else if (method == '' || method == ' ') {
        Swal.fire('Gagal', 'Pilih metode pembayaran', 'error');
    } else if (wa.length < 10 || wa.length > 14) {
        Swal.fire('Gagal', 'Nomor Whatsapp tidak sesuai', 'error');
    } else {
        $.ajax({
            url: '<?= base_url(); ?>/games/order/get-detail/' + product,
            data: 'user_id=' + user_id + '&zone_id=' + zone_id + '&method=' + method + '&wa=' + wa + '&voucher=' + voucher + '&target=<?= $games['target']; ?>',
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $("#modal-loading").modal('hide');
            },
            success: function(result) {

                $("#modal-loading").modal('hide');

                if (result.status == true) {
                    $("#modal-detail div div .modal-body").html(result.msg);

                    $("#modal-detail").modal('show');
                } else {
                    Swal.fire('Gagal', result.msg, 'error');
                }
            }
        });
    }
}

function nonaktif_button() {
    document.getElementById('1xorder').style.visibility = 'hidden';
}

function cek_voucher() {

    var product = $("input[name=product]:checked").val();
    var voucher = $("input[name=voucher]").val();

    if (voucher == '' || voucher == ' ') {
        Swal.fire('Gagal', 'Kode voucher harus diisi', 'error');
    } else if (product == '' || product == ' ') {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else if (product == undefined) {
        Swal.fire('Gagal', 'Nominal produk harus dipilih', 'error');
    } else {
        $.ajax({
            url: '<?= base_url(); ?>/games/voucher/' + product,
            data: 'voucher=' + voucher,
            type: 'POST',
            dataType: 'JSON',
            success: function(result) {
                if (result.success) {
                    Swal.fire('Berhasil', result.msg, 'success');
                } else {
                    Swal.fire('Gagal', result.msg, 'error');
                }
            }
        });
    }
}
</script>
<?php $this->endSection(); ?>