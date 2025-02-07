<!DOCTYPE html>

<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title><?= $title; ?> - <?= $web['title']; ?></title>

        <meta name="description" content="" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/core/libs.min.css" />

        <!-- Aos Animation Css -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//vendor/aos/dist/aos.css" />

        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/hope-ui.min.css?v=2.0.0" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/custom.min.css?v=2.0.0" />

        <!-- Dark Css -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/dark.min.css" />

        <!-- Customizer Css -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/customizer.min.css" />

        <!-- RTL Css -->
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/admin2//css/rtl.min.css" />

        <!-- AddOn -->
        <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">

        <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css">

        <style>
        @media (min-width: 1100px) {

            .container-xxl,
            .container-xl,
            .container-lg,
            .container-md,
            .container-sm,
            .container {
                max-width: 1544px;
            }
        }


        @media (min-width: 900px) {
            .iq-navbar-header {
                height: 80px;
            }
        }

        @media (max-width: 900px) {
            .iq-navbar-header {
                height: 20px;
            }
        }

        .modal-content {
            background: #fff !important
        }

        .text-right {
            text-align: right;
        }

        label,
        li,
        b {
            color: #000 !important;
        }

        .sidebar-header {
            background-color: var(--bs-primary) !important;
        }

        body#adminNew {
            font-family: var(--bs-body-font-family) !important;
            font-size: var(--bs-body-font-size) !important;
        }

        .table thead th {
            font-size: 0.9rem !important;
            ;
        }

        .table tbody td {
            font-size: 0.7rem !important;
            ;
        }

        .form-group label,
        li,
        b {
            color: inherit !important;
        }

        .card-tools {
            margin-top: 10px;
        }

        .card-tools a {
            margin-top: 3px;
        }

        #orders-table {
            width: 100% !important;
        }
        </style>

        <?php $this->renderSection('css'); ?>

    </head>

    <body id="adminNew">
        <!-- loader Start -->


        <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
            <div class="sidebar-header d-flex align-items-center justify-content-start">
                <a href="<?= base_url(); ?>" class="navbar-brand">
                    <!--Logo start-->
                    <!--logo End-->

                    <!--Logo start-->
                    <div class="logo-main">
                        <div class="logo-normal">
                            <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-1 mt-1 rounded" width="100">
                        </div>
                        <div class="logo-mini">
                            <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" alt="" class="mb-1 mt-1 rounded" width="100">
                        </div>
                    </div>
                    <!--logo End-->




                    <h4 class="logo-title" style="font-size:12px !important" hidden><?= $web['name']; ?></h4>
                </a>
                <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                    <i class="icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </i>
                </div>
            </div>
            <div class="sidebar-body pt-0 data-scrollbar">
                <div class="sidebar-list">
                    <!-- Sidebar Menu Start -->
                    <ul class="navbar-nav iq-main-menu" id="sidebar-menu">


                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>/admin/Home">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/konfigurasi">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                        <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                        <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Konfigurasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/Admin">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Admin</span>
                            </a>
                        </li>


                        <li>
                            <hr class="hr-horizontal">
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Pengaturan Produk</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/games">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M13.3051 5.88243V6.06547C12.8144 6.05584 12.3237 6.05584 11.8331 6.05584V5.89206C11.8331 5.22733 11.2737 4.68784 10.6064 4.68784H9.63482C8.52589 4.68784 7.62305 3.80152 7.62305 2.72254C7.62305 2.32755 7.95671 2 8.35906 2C8.77123 2 9.09508 2.32755 9.09508 2.72254C9.09508 3.01155 9.34042 3.24276 9.63482 3.24276H10.6064C12.0882 3.2524 13.2953 4.43736 13.3051 5.88243Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.164 6.08279C15.4791 6.08712 15.7949 6.09145 16.1119 6.09469C19.5172 6.09469 22 8.52241 22 11.875V16.1813C22 19.5339 19.5172 21.9616 16.1119 21.9616C14.7478 21.9905 13.3837 22.0001 12.0098 22.0001C10.6359 22.0001 9.25221 21.9905 7.88813 21.9616C4.48283 21.9616 2 19.5339 2 16.1813V11.875C2 8.52241 4.48283 6.09469 7.89794 6.09469C9.18351 6.07542 10.4985 6.05615 11.8332 6.05615C12.3238 6.05615 12.8145 6.05615 13.3052 6.06579C13.9238 6.06579 14.5425 6.07427 15.164 6.08279ZM10.8518 14.7459H9.82139V15.767C9.82139 16.162 9.48773 16.4896 9.08538 16.4896C8.67321 16.4896 8.34936 16.162 8.34936 15.767V14.7459H7.30913C6.90677 14.7459 6.57311 14.4279 6.57311 14.0233C6.57311 13.6283 6.90677 13.3008 7.30913 13.3008H8.34936V12.2892C8.34936 11.8942 8.67321 11.5667 9.08538 11.5667C9.48773 11.5667 9.82139 11.8942 9.82139 12.2892V13.3008H10.8518C11.2542 13.3008 11.5878 13.6283 11.5878 14.0233C11.5878 14.4279 11.2542 14.7459 10.8518 14.7459ZM15.0226 13.1177H15.1207C15.5231 13.1177 15.8567 12.7998 15.8567 12.3952C15.8567 12.0002 15.5231 11.6727 15.1207 11.6727H15.0226C14.6104 11.6727 14.2866 12.0002 14.2866 12.3952C14.2866 12.7998 14.6104 13.1177 15.0226 13.1177ZM16.7007 16.4318H16.7988C17.2012 16.4318 17.5348 16.1139 17.5348 15.7092C17.5348 15.3143 17.2012 14.9867 16.7988 14.9867H16.7007C16.2885 14.9867 15.9647 15.3143 15.9647 15.7092C15.9647 16.1139 16.2885 16.4318 16.7007 16.4318Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Games</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/Produk">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M16.9739 6.77432C16.977 6.85189 16.9621 6.92913 16.9303 7H15.4932C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H7.00989C6.9967 6.92535 6.9967 6.84898 7.00989 6.77432C7.12172 4.10591 9.32499 2 12.0049 2C14.6849 2 16.8882 4.10591 17 6.77432H16.9739Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Produk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/kategori">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Kategori</span>
                            </a>
                        </li>
                        <li>
                            <hr class="hr-horizontal">
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Pesanan/Orderan</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/pesanan">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Pesanan</span>
                            </a>
                        </li>
                        <li>
                            <hr class="hr-horizontal">
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Pengguna/Member</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/pengguna">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                        <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                        <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Pengguna</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/topup">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M6.447 22C3.996 22 2 19.9698 2 17.4755V12.5144C2 10.0252 3.99 8 6.437 8L17.553 8C20.005 8 22 10.0302 22 12.5256V17.4846C22 19.9748 20.01 22 17.563 22H16.623H6.447Z" fill="currentColor"></path>
                                        <path d="M11.455 2.22103L8.54604 5.06682C8.24604 5.36094 8.24604 5.83427 8.54804 6.12742C8.85004 6.41959 9.33704 6.41862 9.63704 6.12547L11.23 4.56623V6.06119V14.4515C11.23 14.8654 11.575 15.2014 12 15.2014C12.426 15.2014 12.77 14.8654 12.77 14.4515V4.56623L14.363 6.12547C14.663 6.41862 15.15 6.41959 15.452 6.12742C15.603 5.98036 15.679 5.78849 15.679 5.59566C15.679 5.40477 15.603 5.21291 15.454 5.06682L12.546 2.22103C12.401 2.07981 12.205 1.99995 12 1.99995C11.796 1.99995 11.6 2.07981 11.455 2.22103Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Topup</span>
                            </a>
                        </li>
                        <li>
                            <hr class="hr-horizontal">
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Metode Pembayaran</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/metode">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M9.18824 3.74722C9.18824 3.33438 8.84724 3 8.42724 3H8.42624L6.79724 3.00098C4.60624 3.00294 2.82324 4.75331 2.82324 6.90279V8.76201C2.82324 9.17386 3.16424 9.50923 3.58424 9.50923C4.00424 9.50923 4.34624 9.17386 4.34624 8.76201V6.90279C4.34624 5.57604 5.44624 4.4964 6.79824 4.49444L8.42724 4.49345C8.84824 4.49345 9.18824 4.15907 9.18824 3.74722ZM17.1931 3.00029H15.6001C15.1801 3.00029 14.8391 3.33468 14.8391 3.74751C14.8391 4.15936 15.1801 4.49277 15.6001 4.49277H17.1931C18.5501 4.49277 19.6541 5.57535 19.6541 6.90603V8.7623C19.6541 9.17415 19.9951 9.50952 20.4151 9.50952C20.8361 9.50952 21.1761 9.17415 21.1761 8.7623V6.90603C21.1761 4.75165 19.3901 3.00029 17.1931 3.00029ZM9.23804 6.74266H14.762C15.367 6.74266 15.948 6.98094 16.371 7.40554C16.797 7.83407 17.033 8.40968 17.032 9.00883V10.2542C17.027 10.4003 16.908 10.5189 16.759 10.5229H7.23904C7.09104 10.518 6.97204 10.3993 6.96904 10.2542V9.00883C6.95804 7.76837 7.97404 6.75541 9.23804 6.74266Z" fill="currentColor"></path>
                                        <path d="M22.239 12.0413H1.762C1.342 12.0413 1 12.3756 1 12.7885C1 13.2003 1.342 13.5337 1.762 13.5337H2.823V17.0972C2.823 19.2467 4.607 20.9971 6.798 20.999L8.427 21C8.848 21 9.188 20.6656 9.189 20.2528C9.189 19.841 8.848 19.5066 8.428 19.5066L6.8 19.5056C5.447 19.5036 4.346 18.424 4.346 17.0972V13.5337H6.969V14.5251C6.959 15.7656 7.974 16.7795 9.238 16.7913H14.762C16.027 16.7795 17.042 15.7656 17.032 14.5251V13.5337H19.655V17.0933C19.655 18.425 18.551 19.5066 17.194 19.5066H15.601C15.18 19.5066 14.839 19.841 14.839 20.2528C14.839 20.6656 15.18 21 15.601 21H17.194C19.39 21 21.177 19.2487 21.177 17.0933V13.5337H22.239C22.659 13.5337 23 13.2003 23 12.7885C23 12.3756 22.659 12.0413 22.239 12.0413Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Metode</span>
                            </a>
                        </li>

                        <li>
                            <hr class="hr-horizontal">
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Addon</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item" hidden>
                            <a class="nav-link " href="<?= base_url(); ?>/admin/postingan">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.8843 5.11485H13.9413C13.2081 5.11969 12.512 4.79355 12.0474 4.22751L11.0782 2.88762C10.6214 2.31661 9.9253 1.98894 9.19321 2.00028H7.11261C3.37819 2.00028 2.00001 4.19201 2.00001 7.91884V11.9474C1.99536 12.3904 21.9956 12.3898 21.9969 11.9474V10.7761C22.0147 7.04924 20.6721 5.11485 16.8843 5.11485Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8321 6.54353C21.1521 6.91761 21.3993 7.34793 21.5612 7.81243C21.8798 8.76711 22.0273 9.77037 21.9969 10.7761V16.0292C21.9956 16.4717 21.963 16.9135 21.8991 17.3513C21.7775 18.1241 21.5057 18.8656 21.0989 19.5342C20.9119 19.8571 20.6849 20.1553 20.4231 20.4215C19.2383 21.5089 17.665 22.0749 16.0574 21.9921H7.93061C6.32049 22.0743 4.74462 21.5086 3.55601 20.4215C3.2974 20.1547 3.07337 19.8566 2.88915 19.5342C2.48475 18.8661 2.21869 18.1238 2.1067 17.3513C2.03549 16.9142 1.99981 16.4721 2 16.0292V10.7761C1.99983 10.3374 2.02357 9.89902 2.07113 9.46288C2.08113 9.38636 2.09614 9.31109 2.11098 9.23659C2.13573 9.11241 2.16005 8.99038 2.16005 8.86836C2.25031 8.34204 2.41496 7.83116 2.64908 7.35101C3.34261 5.86916 4.76525 5.11492 7.09481 5.11492H16.8754C18.1802 5.01401 19.4753 5.4068 20.5032 6.21522C20.6215 6.3156 20.7316 6.4254 20.8321 6.54353ZM6.97033 15.5412H17.0355H17.0533C17.2741 15.5507 17.4896 15.4717 17.6517 15.3217C17.8137 15.1716 17.9088 14.963 17.9157 14.7425C17.9282 14.5487 17.8644 14.3577 17.7379 14.2101C17.5924 14.0118 17.3618 13.8935 17.1155 13.8907H6.97033C6.51365 13.8907 6.14343 14.2602 6.14343 14.7159C6.14343 15.1717 6.51365 15.5412 6.97033 15.5412Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Postingan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url(); ?>/admin/voucher">
                                <i class="icon">
                                    <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M13.7505 9.70303V7.68318C13.354 7.68318 13.0251 7.36377 13.0251 6.97859V4.57356C13.0251 4.2532 12.764 4.00049 12.4352 4.00049H5.7911C3.70213 4.00049 2 5.653 2 7.68318V10.1155C2 10.3043 2.07737 10.4828 2.21277 10.6143C2.34816 10.7449 2.53191 10.8201 2.72534 10.8201C3.46035 10.8201 4.02128 11.3274 4.02128 11.9944C4.02128 12.6905 3.45068 13.2448 2.73501 13.2533C2.33849 13.2533 2 13.5257 2 13.9203V16.3262C2 18.3555 3.70213 19.9995 5.78143 19.9995H12.4352C12.764 19.9995 13.0251 19.745 13.0251 19.4265V17.3963C13.0251 17.0027 13.354 16.6917 13.7505 16.6917V14.8701C13.354 14.8701 13.0251 14.5497 13.0251 14.1655V10.4076C13.0251 10.0224 13.354 9.70303 13.7505 9.70303Z" fill="currentColor"></path>
                                        <path d="M19.9787 11.9948C19.9787 12.69 20.559 13.2443 21.265 13.2537C21.6615 13.2537 22 13.5262 22 13.9113V16.3258C22 18.3559 20.3075 20 18.2186 20H15.0658C14.7466 20 14.4758 19.7454 14.4758 19.426V17.3967C14.4758 17.0022 14.1567 16.6921 13.7505 16.6921V14.8705C14.1567 14.8705 14.4758 14.5502 14.4758 14.1659V10.4081C14.4758 10.022 14.1567 9.70348 13.7505 9.70348V7.6827C14.1567 7.6827 14.4758 7.36328 14.4758 6.9781V4.57401C14.4758 4.25366 14.7466 4 15.0658 4H18.2186C20.3075 4 22 5.64406 22 7.6733V10.0407C22 10.2286 21.9226 10.4081 21.7872 10.5387C21.6518 10.6702 21.4681 10.7453 21.2747 10.7453C20.559 10.7453 19.9787 11.31 19.9787 11.9948Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Voucher</span>
                            </a>
                        </li>
                        <br><br><br><br><br><br><br><br><br><br><br>

                    </ul>



                    <!-- Sidebar Menu End -->
                </div>
            </div>
            <div class="sidebar-footer"></div>
        </aside>
        <main class="main-content">
            <div class="position-relative iq-banner">
                <!--Nav Start-->
                <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                    <div class="container-fluid navbar-inner">
                        <a href="../dashboard/index.html" class="navbar-brand">
                            <!--Logo start-->
                            <!--logo End-->

                            <!--Logo start-->
                            <div class="logo-main">
                                <div class="logo-normal">

                                </div>
                                <div class="logo-mini">

                                </div>
                            </div>
                            <!--logo End-->




                            <h4 class="logo-title" style="font-size:12px !important"><?= $web['name']; ?></h4>
                        </a>
                        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                            <i class="icon">
                                <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                </svg>
                            </i>
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <span class="mt-2 navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">

                                <li class="nav-item dropdown">
                                    <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                        </svg>
                                        <div class="caption ms-3 d-none d-md-block ">
                                            <h6 class="mb-0 caption-title"><?= $account['username']; ?></h6>
                                            <p class="mb-0 caption-sub-title">Administrator</p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="<?= base_url(); ?>/admin/password">Ganti Password</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?= base_url(); ?>/admin/logout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> <!-- Nav Header Component Start -->
                <div class="iq-navbar-header">

                </div> <!-- Nav Header Component End -->
                <!--Nav End-->
            </div>

            <div class="conatiner-fluid content-inner py-0">
                <?php $this->renderSection('content'); ?>
            </div>

            <!-- Footer Section Start -->
            <footer class="footer">
                <div class="footer-body">
                    <div class="right-panel">
                        ©<script>
                        document.write(new Date().getFullYear())
                        </script> <?= $web['name']; ?>

                    </div>
                </div>
            </footer>

            <!-- Footer Section End -->
        </main>
        <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
            </svg>
        </a>
        <!-- Wrapper End-->
        <!-- offcanvas start -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="d-flex align-items-center">
                    <h3 class="offcanvas-title me-3" id="offcanvasExampleLabel">Settings</h3>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body data-scrollbar">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="mb-3">Scheme</h5>
                        <div class="d-grid gap-3 grid-cols-3 mb-4">
                            <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="auto">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z"></path>
                                </svg>
                                <span class="ms-2 "> Auto </span>
                            </div>

                            <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="dark">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z"></path>
                                </svg>
                                <span class="ms-2 "> Dark </span>
                            </div>
                            <div class="btn btn-border active" data-setting="color-mode" data-name="color" data-value="light">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z"></path>
                                </svg>
                                <span class="ms-2 "> Light</span>
                            </div>
                        </div>
                        <hr class="hr-horizontal">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mt-4 mb-3">Color Customizer</h5>
                            <button class="btn btn-transparent p-0 border-0" data-value="theme-color-default" data-info="#079aa2" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Default">
                                <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#31BAF1" />
                                    <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#0169CA" />
                                </svg>
                            </button>
                        </div>

                        <div class="grid-cols-5 mb-4 d-grid gap-x-2">
                            <div class="btn btn-border bg-transparent" data-value="theme-color-blue" data-info="#573BFF" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-1">
                                <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32">
                                    <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                                    <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                                </svg>
                            </div>
                            <div class="btn btn-border bg-transparent" data-value="theme-color-gray" data-info="#FD8D00" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-2">
                                <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32">
                                    <circle cx="12" cy="12" r="10" fill="#91969E" />
                                    <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                                </svg>
                            </div>
                            <div class="btn btn-border bg-transparent" data-value="theme-color-red" data-info="#366AF0" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-3">
                                <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32">
                                    <circle cx="12" cy="12" r="10" fill="#DB5363" />
                                    <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                                </svg>
                            </div>
                            <div class="btn btn-border bg-transparent" data-value="theme-color-yellow" data-info="#6410F1" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-4">
                                <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32">
                                    <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                                    <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                                </svg>
                            </div>
                            <div class="btn btn-border bg-transparent" data-value="theme-color-pink" data-info="#25C799" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-5">
                                <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32">
                                    <circle cx="12" cy="12" r="10" fill="#E586B3" />
                                    <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                                </svg>
                            </div>

                        </div>

                        <hr class="hr-horizontal">
                        <h5 class="mt-4 mb-3">Sidebar Color</h5>
                        <div class="d-grid gap-3 grid-cols-2 mb-4">
                            <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-white">
                                <span class=""> Default </span>
                            </div>
                            <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-dark">
                                <span class=""> Dark </span>
                            </div>
                            <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-color">
                                <span class=""> Color </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-- Library Bundle Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/core/libs.min.js"></script>

        <!-- External Library Bundle Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/core/external.min.js"></script>

        <!-- Widgetchart Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/charts/widgetcharts.js"></script>

        <!-- mapchart Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/charts/dashboard.js"></script>

        <!-- fslightbox Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/plugins/fslightbox.js"></script>

        <!-- Settings Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/plugins/setting.js"></script>

        <!-- Slider-tab Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/plugins/slider-tabs.js"></script>

        <!-- Form Wizard Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/plugins/form-wizard.js"></script>

        <!-- AOS Animation Plugin-->
        <script src="<?= base_url(); ?>/assets/admin2//vendor/aos/dist/aos.js"></script>

        <!-- App Script -->
        <script src="<?= base_url(); ?>/assets/admin2//js/hope-ui.js" defer></script>

        <!-- AddOn-->
        <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://dolphinstore.id//assets/plugins/ckeditor/ckeditor.js"></script>
        <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/icons.css">

        <!--Data Tables js-->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>


        <script>
        $(document).ready(function() {
            // select all the "Edit" buttons and append the SVG code to each one of them
            $('a.btn:contains("Edit")').each(function() {
                $(this).append('<span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>');
                $(this).contents().filter(function() {
                    // filter the text node
                    return this.nodeType === 3;
                }).remove(); // remove the text node
            });
        });
        </script>

        <script>
        $(document).ready(function() {
            // select all the "Edit" buttons and append the SVG code to each one of them
            $('button.btn:contains("Hapus")').each(function() {
                $(this).append('<span class="btn-inner"><svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>');
                $(this).contents().filter(function() {
                    // filter the text node
                    return this.nodeType === 3;
                }).remove(); // remove the text node
            });
        });
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
        <?php $this->renderSection('js'); ?>
    </body>

</html>