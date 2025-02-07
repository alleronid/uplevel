<div class="col-lg-3" hidden>
			            	<h5 class="mb-3">Menu Utama</h5>
			            	<div class="menu-user">
			            		<a class="d-block mb-1" href="<?= base_url(); ?>/user"><i class="fa fa-home mr-2"></i> Beranda</a>
			            		<a class=" mb-1" href="<?= base_url(); ?>/user/referal" hidden><i class="fa fa-link mr-2"></i> Referal</a>
			            		<a class="d-block mb-1" href="<?= base_url(); ?>/user/riwayat"><i class="fa fa-history mr-2"></i> Riwayat</a>
			            		<a class="d-block mb-1" href="<?= base_url(); ?>/user/topup"><i class="fa fa-usd mr-2"></i> Top Up</a>
			            		<a class="d-block mb-1" href="<?= base_url(); ?>/logout"><i class="fa fa-sign-out mr-2"></i> Logout</a>
			            	</div>
			            </div>
			            
			            <style>
								    .content {
                                            min-height: 50px;
                                            max-width: 1100px;
                                            margin: auto;
                                            padding-top:40px;
                                            padding-bottom:60px;
                                            background: var(--warna) !important;
                                        }
                                    @media (min-width: 1200px)
                                    {.container {
                                        max-width: 1200px;
                                    }

                                    }
                                    .dropdown-menu-dark {
                                        color: rgb(222, 226, 230);
                                        background-color: rgb(52, 58, 64);
                                        border-color: rgba(0, 0, 0, 0.15);
                                    }
                                    a {
                                        color: var(--warna_5) !important;
                                    }
                                    h6 {
                                        color:#fff;
                                    }
                                    
                                    /* width */
                                    ::-webkit-scrollbar {
                                      width: 7px;
                                      height: 5px;
                                    }
                                    
                                    /* Track */
                                    ::-webkit-scrollbar-track {
                                      background: transparent; 
                                    }
                                     
                                    /* Handle */
                                    ::-webkit-scrollbar-thumb {
                                      background: #0066bd99;
                                      height: 5px;
                                    }
                                    
                                    /* Handle on hover */
                                    ::-webkit-scrollbar-thumb:hover {
                                      background: #01549bc4; 
                                    }
                                    .body-games {
                                        background: var(--warna_6);
                                        flex: 1 1 auto;
                                        padding: 1.25rem;
                                        border-radius: 11px;
                                    }
                                    .shadow-md {
                                        --tw-shadow: 0 4px 16px 1px rgb(0 0 0 / 0.1), 0 2px 4px 2px rgb(0 0 0 / 0.1);
                                        --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
                                        box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
                                    }
                                    .price-via {
                                        background: var(--warna_3);
                                        display: grid;
                                        margin-bottom: 10px !important;
                                        padding: 5px 0px;
                                    }
                                    .saldo-user-up {
                                        background: var(--warna_3);
                                        text-align:center;
                                        border-radius: 11px 11px 0px 0px !important;
                                        color: #fff !important;
                                    }
                                    .saldo-user-down {
                                        text-align:center;
                                        border-radius: 0px 0px 11px 11px !important;
                                    }
                                    .total-pesanan-bg {
                                        background-color: var(--warna_3);
                                        border-radius: 50%;
                                    }
                                    .total-belanja-bg {
                                        background-color: #74ad28;
                                        border-radius: 50%;
                                    }
                                    .pesanan-tertunda-bg {
                                        background-color: #d77701;
                                        border-radius: 50%;
                                    }
								</style>
								<script>
								    $('#akunuser').css('display', 'block')
								</script>