<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title; ?> - <?= $web['title']; ?></title>

        <meta name="description" content="<?= strip_tags($web['description']); ?>">
        <meta name="keywords" content="<?= strip_tags($web['keywords']); ?>">

        <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/simplebar/css/simplebar.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/animate.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/horizontal-menu.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app-style.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style-main.css">
        

        <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        
        <!-- Global site tag (gtag.js) - Google Analytics -->


        <style>
            :root {
                --warna: #001d38;
                --warna_2: #082744;
                --warna_3: #00396e;
            }

            .content {
                padding-top: 110px;
                min-height: 446px;
            }
            .table-white tr th, .table-white tr td {
                color: #fff;
                border-color: #242f3a;
            }
            
            label {
                font-weight: 500;
                text-transform: none;
            }
            .col-form-label {
                padding-top: calc(.375rem + 3px);
            }
            .card-tools {
                float: right;
                margin-top: -25px;
            }
            .cursor-pointer {
                cursor: pointer;
            }
            .menu-user a {
                padding: 10px 16px;
                border-radius: 5px;
            }
            .menu-user a:hover {
                background: var(--warna_2);
            }
            .menu-user a i {
                font-size: 19px;
                width: 20px;
            }
            .menu-user {
                margin-bottom: 26px;
            }
            .daterangepicker td, .daterangepicker th {
                color: #626262;
            }
            body, .circle-primary {
                background: var(--warna);
            }
            .bg-footer {
                background-color: var(--warna);
            }
            .bg-theme1, .bg-custom {
                background: var(--warna_2) !important;
            }
            .btn-topup, .back-to-top {
                background: var(--warna_3);
            }
            .section {
                background: var(--warna_2);
            }
            .radio-nominal + label, .radio-nominale + label {
                background: #001d38;  
                border: none !important;
            }
            .radio-nominale:checked + label, .radio-nominal:checked + label {
                background: var(--warna_3);
                color: #fff;
            }
            .strip-primary {
                background: #652572;
            }
            .btn-primary {
                background: var(--warna_3) !important;
                border-color: var(--warna_3) !important;
            }
            .sidenav {
                background: var(--warna_2);
            }
            .radio-nominal:checked + label, .table-white tr th, .table-white tr td {
                border-color: var(--warna);
            }
            .menu-utama div a {
                margin: 0 4px;
            }
            .menu-utama div a:hover, .menu-utama div a.active {
                background: var(--warna_3);
                border-radius: 14px 4px;
            }
            .navbar-collapse {
                background: var(--warna_2);
            }
            .menu-list {
                list-style: none;
                padding-left: 0;
            }
            .menu-list li a {
                display: block;
                padding: 10px 0;
                border-bottom: 1px dashed var(--warna_3);
                transition: .4s;
            }
            .menu-list li a:hover {
                padding-left: 6px;
            }
            .card {
                border-radius: 10px;
                background-color: var(--warna_2);
            }
            .btn-topup, .back-to-top {
                background: #531f5e00;
                display: none;
            }
            .menu-utama div a:hover, .menu-utama div a.active {
                background: var(--warna_3);
                border-radius: 14px 4px;
            }
            .btn-primary {
                background: var(--warna_3) !important;
                border-color: var(--warna_3) !important;
            }
            .strip-primary {
                background: var(--warna_3);
            }
            .bg-theme1 {
                background: var(--warna_2) !important;
                padding: 10px;
            }
            .btn-topup {
                color: #ff7600;
            }
            .card-topup {
                display: none;
            }
            .phy-card {
                border-radius: 10px;
                min-height: 90px;
                position: relative;
                margin-top: 30px;
            }
            .phy-img {
                border-radius: 10px;
                display: block;
                transform: translate(-50%,-50%)!important;
                left: 50%!important;
                position: absolute!important;
                width: 70%;
            }
            .phy-card-title {
                margin-top: 35px;
                padding: 10px;
               padding-bottom: 20px;
            }
                .fab-container {
                    position: fixed;
                    bottom: 70px;
                    right: 10px;
                    z-index: 999;
                    cursor: pointer;
                }
            
                .img-fluid2 {
                    max-width: 100%;
                    height: auto;
                    padding-bottom: 15px;
                }
            
                .fab-icon-holder {
                    width: 45px;
                    height: 45px;
                    bottom: 140px;
                    left: 10px;
                    color: #FFF;
                    background: #5865f2;
                    border-radius: 10px;
                    text-align: center;
                    font-size: 30px;
                    z-index: 99999;
                }
            
                .fab-icon-holder:hover {
                    opacity: 0.8;
                }
            
                .fab-icon-holder i {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100%;
                    font-size: 25px;
                    color: #ffffff;
                }
            
                .fab-options {
                    list-style-type: none;
                    margin: 0;
                    position: absolute;
                    bottom: 48px;
                    left: -45px;
                    opacity: 0;
                    transition: all 0.3s ease;
                    transform: scale(0);
                    transform-origin: 85% bottom;
                }
            
                .fab:hover+.fab-options,
                .fab-options:hover {
                    opacity: 1;
                    transform: scale(1);
                }
            
                .fab-options li {
                    display: flex;
                    justify-content: flex-start;
                    padding: 5px;
                }
            
                .fab-label {
                    padding: 2px 5px;
                    align-self: center;
                    user-select: none;
                    white-space: nowrap;
                    border-radius: 3px;
                    font-size: 16px;
                    background: #666666;
                    color: #ffffff;
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
                    margin-left: 10px;
                }
            
                .text-decoration-none {
                text-decoration: none!important; 
                }
                
            .col-lg-2 {
                margin-bottom: 20px;
                }     
                .h5, .h4, h4, h5 {
                    color:#ffffff !important;
                }
                .icon-diamondx {
                    width: 40px;
                    top: 10%;
                    right: 10%;
                    position: absolute;
                }
                .radio-nominale:checked + label:after {
                position: absolute;
                top: 0;
                left: 0.7rem;
                width: 28px;
                height: 28px;
                content: "";
                background: url(/assets/images/checkedblue.png) top/cover;
                text-align: center;
                border-radius: 0 0px 0 0;
            }
            .radio-nominal:checked + label:after {
                position: absolute;
                top: 0;
                left: 0.7rem;
                width: 28px;
                height: 28px;
                content: "";
                background: url(/assets/images/checkedblue.png) top/cover;
                text-align:center;
                border-radius: 0 0px 0 0;
            }
            .owl-dot {
                display:none;
            }
            .carousel {
                position: relative;
                margin-top: 30px;
            }
            .owl-carousel.owl-hidden {
                opacity: 0;
            }
            .owl-carousel.owl-rtl {
                direction: rtl;
            }
            .owl-carousel .owl-stage-outer {
                position: relative;
                overflow: hidden;
                -webkit-transform: translate3d(0,0,0);
            } 
            .owl-carousel .owl-nav.disabled {
                display: none;
            }
            .owl-carousel .owl-item img {
                display: block;
                width: 100%;
            }
            .item .metode {
                margin: 5px 0;
                background: #fff;
                border-radius: 8px;
                padding: 0.75rem;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 10%), 0 2px 4px -1px rgb(0 0 0 / 6%) !important;
            }
            .owl-carousel .owl-item {
                min-height: 1px;
                float: left;
                -webkit-backface-visibility: hidden;
                -webkit-touch-callout: none;
            }
            .metode-bottom {
                margin-bottom:100px !important;
            }
                

        </style>

        <?php $this->renderSection('css'); ?>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <nav class="navbar navbar-expand-lg fixed-top navbar-dark shadow-sm bg-custom">
                    <div class="container">
                        <a class="navbar-brand" href="<?= base_url(); ?>">
                            <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" style="height:65px" alt="logo icon" class="rounded">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse menu-utama" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link <?= $menu_active == 'Home' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Cek' ? 'active' : ''; ?>" href="<?= base_url(); ?>/payment">Cek Pesanan</a>
                                <a class="nav-item nav-link <?= $menu_active == 'API' ? 'active' : ''; ?>" href="<?= base_url(); ?>/api/docs" hidden>API</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Price' ? 'active' : ''; ?>" href="<?= base_url(); ?>/price">Daftar Harga</a>
                                <a class="nav-item nav-link <?= $menu_active == 'Method' ? 'active' : ''; ?>" href="<?= base_url(); ?>/method"hidden>Metode</a>
                                <div class="dropdown">
                                    <style>
                                    .dropdown-toggle::after {
                                        display:none;
                                    }
                                    </style>
									   <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
									    	<a class="nav-item nav-link" >Kalkulator ML<img src="<?= base_url(); ?>/assets/images/down-arrow.png" alt="" width="15" style="vertical-align:center"></a>
									    </span>
									    <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton" style="left: auto;right: 0;box-shadow: none !important;background: var(--warna_1);">
									        <a class="dropdown-item text-white <?= $menu_active == 'kalkulatorwr' ? 'active' : ''; ?>" href="<?= base_url(); ?>/kalkulatorwr">Kalkulator WR</a>
									        <a class="dropdown-item text-white <?= $menu_active == 'hpmagicwheel' ? 'active' : ''; ?>" href="<?= base_url(); ?>/hpmagicwheel">HP Magic Wheel</a>
									    </div>
								</div>
                                <a class="nav-item nav-link <?= $menu_active == 'Login' ? 'active' : ''; ?>" href="<?= base_url(); ?>/login">Login</a>
                                <?php if ($admin !== false): ?>
                                <a class="nav-item nav-link" href="<?= base_url(); ?>/admin">Administrator</a>
                                <?php endif ?>
                                <?php if ($users !== false): ?>
                                <a class="nav-item nav-link" href="<?= base_url(); ?>/user">Beranda</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <?php $this->renderSection('content'); ?>

            <footer id="aboutus" class="bg-footer">
                <img src="<?= base_url(); ?>/assets/images/waves.png" alt="" width="100%" hidden>
                <div style="background: var(--warna_2);margin-top: -4px;">
                    <div class="pt-5 pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" style="height:55px" alt="logo icon" class="mb-3">
                                    <h5 class="mb-2"><?= $web['name']; ?></h5>
                                    <?= $web['description']; ?>
                                </div>

                                <div class="col-lg-3 col-sm-6">
                                    <h5 class="pb-2">Halaman</h5>
                                    <ul class="menu-list">
                                        <li><a href="<?= base_url(); ?>/">Halaman Utama</a></li>
                                        <li><a href="<?= base_url(); ?>/payment">Cek Pesanan</a></li>
                                        <li><a href="<?= base_url(); ?>/price">Daftar Harga</a></li>
                                        <li><a href="<?= base_url(); ?>/syarat-ketentuan">Syarat & Ketentuan</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <h5 class="pb-2">Sosial Media Kami</h5>
                                    <a href="<?= $sm['wa']; ?>" style="font-size: 35px;">
                                        <i class="fa fa-whatsapp pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['ig']; ?>" style="font-size: 35px;">
                                        <i class="fa fa-instagram pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['yt']; ?>" style="font-size: 35px;" hidden>
                                        <i class="fa fa-youtube pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['fb']; ?>" style="font-size: 35px;" hidden>
                                        <i class="fa fa-facebook pr-4"></i>
                                    </a>
                                    <a href="<?= $sm['tw']; ?>" style="font-size: 35px;">
                                         <img src="https://lsgtopup.com/assets/images/tik-tok.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="fab-container">
                    <div class="fab fab-icon-holder" style="background-color:#FFF; padding:5px">
                      <img src="https://aoshimarket.com/assets/img/logos/callcenter.png" class="img-fluid2" alt="">
                    </div>
                    
                    <ul class="fab-options">
                      <li>
                        <a href="<?= $sm['ig']; ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
                        <i class="fa fa-instagram"></i>
                        </div>
                      </a>
                      </li>
                      <li>
                        <a href="<?= $sm['wa']; ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background-color: #25D366;">
                        <i class="fa fa-whatsapp"></i>
                        </div>
                        </a>
                      </li>
                    </ul>
                 </div>
                 
                <div class="bg-theme1 text-center pb-4"> Copyright © 2022 <?= $web['name']; ?>. All Rights Reserved </div>
            </footer>
        </div>

        <a href="javaScript:void();" class="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>

        <!--End wrapper-->
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- simplebar js -->
        <script src="<?= base_url(); ?>/assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- Custom scripts -->
        <script src="<?= base_url(); ?>/assets/js/app-script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@activix/double-scroll@1.0.2/jquery.doubleScroll.min.js"></script>
        <script src="<?= base_url(); ?>/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <!--Select Plugins Js-->
        <script src="<?= base_url(); ?>/assets/plugins/select2/js/select2.min.js"></script>
        <!--Data Tables js-->
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
       <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
       <script src="https://tokovalorant.com/assets/js/promobox.js"></script>
       <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
        <script src="https://tokovalorant.com/assets/js/promobox.js"></script>


        <script>
            // $(document).ready(function() {
            //     $('#default-datatable').DataTable();
            // });

            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <script>
            <?php if ($admin !== false): ?>
            function hapus(link) {
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data akan dihapus permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Tetap hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                });
            }
            <?php endif; ?>

        </script>
        
        <script>
    function goBack() {
        window.history.back();
    }
</script>
        <?php $this->renderSection('js'); ?>
    </body>
</html>