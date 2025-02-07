<?php $this->extend('templateadmin'); ?>
				
				<?php $this->section('css'); ?>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="content" style="min-height: 580px;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?= $this->include('header-admin'); ?>
								
								<div class="row">
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                  <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-warning rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>                                
                                                    </svg>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Admin</p>
												    <h4><?= $total['admin']; ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-user-check"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">

											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                <div class="row">
                                                <div class="col-3">
                                                <div class="bg-soft-warning rounded p-2 text-center">
                                                <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                <path opacity="0.4" d="M13.3051 5.88243V6.06547C12.8144 6.05584 12.3237 6.05584 11.8331 6.05584V5.89206C11.8331 5.22733 11.2737 4.68784 10.6064 4.68784H9.63482C8.52589 4.68784 7.62305 3.80152 7.62305 2.72254C7.62305 2.32755 7.95671 2 8.35906 2C8.77123 2 9.09508 2.32755 9.09508 2.72254C9.09508 3.01155 9.34042 3.24276 9.63482 3.24276H10.6064C12.0882 3.2524 13.2953 4.43736 13.3051 5.88243Z" fill="currentColor"></path>                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.164 6.08279C15.4791 6.08712 15.7949 6.09145 16.1119 6.09469C19.5172 6.09469 22 8.52241 22 11.875V16.1813C22 19.5339 19.5172 21.9616 16.1119 21.9616C14.7478 21.9905 13.3837 22.0001 12.0098 22.0001C10.6359 22.0001 9.25221 21.9905 7.88813 21.9616C4.48283 21.9616 2 19.5339 2 16.1813V11.875C2 8.52241 4.48283 6.09469 7.89794 6.09469C9.18351 6.07542 10.4985 6.05615 11.8332 6.05615C12.3238 6.05615 12.8145 6.05615 13.3052 6.06579C13.9238 6.06579 14.5425 6.07427 15.164 6.08279ZM10.8518 14.7459H9.82139V15.767C9.82139 16.162 9.48773 16.4896 9.08538 16.4896C8.67321 16.4896 8.34936 16.162 8.34936 15.767V14.7459H7.30913C6.90677 14.7459 6.57311 14.4279 6.57311 14.0233C6.57311 13.6283 6.90677 13.3008 7.30913 13.3008H8.34936V12.2892C8.34936 11.8942 8.67321 11.5667 9.08538 11.5667C9.48773 11.5667 9.82139 11.8942 9.82139 12.2892V13.3008H10.8518C11.2542 13.3008 11.5878 13.6283 11.5878 14.0233C11.5878 14.4279 11.2542 14.7459 10.8518 14.7459ZM15.0226 13.1177H15.1207C15.5231 13.1177 15.8567 12.7998 15.8567 12.3952C15.8567 12.0002 15.5231 11.6727 15.1207 11.6727H15.0226C14.6104 11.6727 14.2866 12.0002 14.2866 12.3952C14.2866 12.7998 14.6104 13.1177 15.0226 13.1177ZM16.7007 16.4318H16.7988C17.2012 16.4318 17.5348 16.1139 17.5348 15.7092C17.5348 15.3143 17.2012 14.9867 16.7988 14.9867H16.7007C16.2885 14.9867 15.9647 15.3143 15.9647 15.7092C15.9647 16.1139 16.2885 16.4318 16.7007 16.4318Z" fill="currentColor"></path>                                
                                                </svg>                            
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Games</p>
												    <h4><?= $total['games']; ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-dice-6"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-warning rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>                                <path opacity="0.4" d="M16.9739 6.77432C16.977 6.85189 16.9621 6.92913 16.9303 7H15.4932C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H7.00989C6.9967 6.92535 6.9967 6.84898 7.00989 6.77432C7.12172 4.10591 9.32499 2 12.0049 2C14.6849 2 16.8882 4.10591 17 6.77432H16.9739Z" fill="currentColor"></path>                                
                                                    </svg>  
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Produk</p>
												    <h4><?= $total['product']; ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-package"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
											
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-primary rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>                                <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>                                <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>                                <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>                                <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>                                <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>                                
                                                    </svg>                                                                                  
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Member Aktif</p>
												    <h4><?= $member['users']; ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-user"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                  <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-primary rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>                                <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>                                <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>                                
                                                    </svg>   
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Saldo Member</p>
												    <h4>Rp <?= number_format($member['balance'],0,',','.'); ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-wallet-alt"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                  <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-primary rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path opacity="0.4" d="M18.8089 9.021C18.3574 9.021 17.7594 9.011 17.0149 9.011C15.199 9.011 13.7059 7.508 13.7059 5.675V2.459C13.7059 2.206 13.503 2 13.2525 2H7.96436C5.49604 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59109 22 8.1703 22H16.0455C18.5059 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6238 9.016 19.1168 9.021 18.8089 9.021Z" fill="currentColor"></path>                                <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1732 7.55437 17.2792 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>                                <path d="M15.1052 12.7088C14.8132 12.4198 14.3432 12.4178 14.0512 12.7108L12.4622 14.3078V9.48084C12.4622 9.06984 12.1282 8.73584 11.7172 8.73584C11.3062 8.73584 10.9722 9.06984 10.9722 9.48084V14.3078L9.38224 12.7108C9.09124 12.4178 8.62024 12.4198 8.32924 12.7088C8.03724 12.9988 8.03724 13.4698 8.32624 13.7618L11.1892 16.6378H11.1902C11.2582 16.7058 11.3392 16.7608 11.4302 16.7988C11.5202 16.8358 11.6182 16.8558 11.7172 16.8558C11.8172 16.8558 11.9152 16.8358 12.0052 16.7978C12.0942 16.7608 12.1752 16.7058 12.2432 16.6388L12.2452 16.6378L15.1072 13.7618C15.3972 13.4698 15.3972 12.9988 15.1052 12.7088Z" fill="currentColor"></path>                                
                                                    </svg>                                                                                                                                        
                                                </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Deposit Sukses</p>
												    <h4><?= $member['topup']; ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-coin"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
											
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                  <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-success rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path opacity="0.4" d="M16.3405 1.99976H7.67049C4.28049 1.99976 2.00049 4.37976 2.00049 7.91976V16.0898C2.00049 19.6198 4.28049 21.9998 7.67049 21.9998H16.3405C19.7305 21.9998 22.0005 19.6198 22.0005 16.0898V7.91976C22.0005 4.37976 19.7305 1.99976 16.3405 1.99976Z" fill="currentColor"></path>                                <path d="M10.8134 15.248C10.5894 15.248 10.3654 15.163 10.1944 14.992L7.82144 12.619C7.47944 12.277 7.47944 11.723 7.82144 11.382C8.16344 11.04 8.71644 11.039 9.05844 11.381L10.8134 13.136L14.9414 9.00796C15.2834 8.66596 15.8364 8.66596 16.1784 9.00796C16.5204 9.34996 16.5204 9.90396 16.1784 10.246L11.4324 14.992C11.2614 15.163 11.0374 15.248 10.8134 15.248Z" fill="currentColor"></path>                                
                                                    </svg>    
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Transaksi Sukses</p>
												    <h4><?= $trx['total']; ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-send"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                  <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-success rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path>                            
                                                    </svg>           
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Penjualan (All Time)</p>
												    <h4>Rp <?= number_format($trx['sales'],0,',','.'); ?></h4>
                                                </div>
                                                </div>
                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-bar-chart"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
										    
											<div class="card-body">
                                              <div class="align-items-center justify-content-between">
                                                  <div class="row">
                                                <div class="col-3">
                                                    <div class="bg-soft-success rounded p-2 text-center">
                                                    <svg class="icon-64" width="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                
                                                    <path d="M10.1528 5.55559C10.2037 5.65925 10.2373 5.77027 10.2524 5.8844L10.5308 10.0243L10.669 12.1051C10.6705 12.3191 10.704 12.5317 10.7687 12.7361C10.9356 13.1326 11.3372 13.3846 11.7741 13.3671L18.4313 12.9316C18.7196 12.9269 18.998 13.0347 19.2052 13.2313C19.3779 13.3952 19.4894 13.6096 19.5246 13.8402L19.5364 13.9802C19.2609 17.795 16.4592 20.9767 12.6524 21.7981C8.84555 22.6194 4.94186 20.8844 3.06071 17.535C2.51839 16.5619 2.17965 15.4923 2.06438 14.389C2.01623 14.0624 1.99503 13.7326 2.00098 13.4026C1.99503 9.31279 4.90747 5.77702 8.98433 4.92463C9.47501 4.84822 9.95603 5.10798 10.1528 5.55559Z" fill="currentColor"></path>                                <path opacity="0.4" d="M12.8701 2.00082C17.43 2.11683 21.2624 5.39579 22.0001 9.81229L21.993 9.84488L21.9729 9.89227L21.9757 10.0224C21.9652 10.1947 21.8987 10.3605 21.784 10.4945C21.6646 10.634 21.5014 10.729 21.3217 10.7659L21.2121 10.7809L13.5313 11.2786C13.2758 11.3038 13.0214 11.2214 12.8314 11.052C12.6731 10.9107 12.5719 10.7201 12.5433 10.5147L12.0277 2.84506C12.0188 2.81913 12.0188 2.79102 12.0277 2.76508C12.0348 2.55367 12.1278 2.35384 12.2861 2.21023C12.4444 2.06662 12.6547 1.9912 12.8701 2.00082Z" fill="currentColor"></path>                                
                                                    </svg>              
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                  <p class="m-1">Total Profit (All Time)</p>
												    <h4>Rp <?= number_format($trx['profit'],0,',','.'); ?></h4>
                                                </div>
                                                </div>

                                                <div class="avatar bg-light-primary p-50">
                                                    <div class="avatar-content">
                                                        <i class="tf-icons bx-md bx bx-chart"></i>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
											
										</div>
									</div>
								</div>
								
								<div class="card" >
									<div class="card-body">
										<h5 class="mb-3">Grafik Sales - Profit</h5>
										<div class="row">
											<div class="col-md-5">
											    <form action="" method="POST">
													<div class="form-group">
														<div class="input-group">
															<input type="text" class="form-control" name="daterange" value="<?= $date_range; ?>">
															<button class="btn btn-primary" type="submit">Filter</button>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div id="bar-chart" style="height: 250px;"></div>
									</div>
								</div>
								
								<div class="card" >
<div class="card-body">
	<h5 class="mb-3">Grafik Sales - Profit Bulanan</h5>

	<div id="bar-chart2" style="height: 250px;"></div>
</div>
</div>

								<div class="card">
									<div class="card-body">
										<h5 class="mb-3">Grafik Total Sales</h5>
										<div class="row">
											<div class="col-md-5">
												<form action="" method="POST">
													<div class="form-group">
														<div class="input-group">
															<input type="text" class="form-control" name="daterange" value="<?= $date_range; ?>">
															<button class="btn btn-primary" type="submit">Filter</button>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div id="myfirstchart" style="height: 250px;"></div>
									</div>
								</div>
								
								
								

								
								
							</div>
						</div>
					</div>
				</div>
				
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
				<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
				<script type="text/javascript">
					$(function() {
						$('input[name="daterange"]').daterangepicker();
					});
				</script>
				
				
				<script>
					new Morris.Line({
						element: 'myfirstchart',
						data: [
							<?php foreach ($chart as $loop): ?>
							{ tanggal: '<?= $loop['tanggal']; ?>', total: <?= $loop['total']; ?> },
							<?php endforeach ?>
						],
						xkey: 'tanggal',
						ykeys: ['total'],
						labels: ['Total'],
						// lineColors: ['#fff'],
                        resize: true,
                        parseTime: false
					});
				</script>

				<script>
				    var data = [

                    <?php foreach ($dataku as $loop): ?>
					{ y: '<?= $loop['tanggal']; ?>', a: <?= $loop['sales']; ?>, b: <?= $loop['profit']; ?> },
					<?php endforeach ?>
					
                    ],
                    config = {
                      data: data,
                      xkey: 'y',
                      ykeys: ['a', 'b'],
                      labels: ['Sales', 'Profit'],
                      fillOpacity: 0.6,
                      hideHover: 'auto',
                      behaveLikeLine: true,
                      resize: true,
                      pointFillColors:['#ffffff'],
                      pointStrokeColors: ['black'],
                      lineColors:['gray','red']
                  };

                config.element = 'bar-chart';
                Morris.Bar(config);

				</script>
                
				
                <script>
                if (document.querySelectorAll('#d-mainx').length) {
                  const data = [
                    <?php foreach ($dataku2 as $loop): ?>
                      { x: '<?= $loop['month']; ?>', y: <?= number_format($loop['sales'],0,',','.') ; ?>, z: <?= number_format($loop['profit'],0,',','.') ; ?> },
                     <?php endforeach ?>
                
                  ];
                  const options = {
                      series: [{
                          name: 'Sales',
                          data: data.map(({ x, y, z }) => ({ x, y }))
                      }, {
                          name: 'Profit',
                          data: data.map(({ x, y, z }) => ({ x, y: z }))
                      }],
                      chart: {
                          fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                          height: 245,
                          type: 'area',
                          toolbar: {
                              show: false
                          },
                          sparkline: {
                              enabled: false,
                          },
                      },
                      colors: ["grey", "green"],
                      dataLabels: {
                          enabled: false
                      },
                      stroke: {
                          curve: 'smooth',
                          width: 3,
                      },
                      yaxis: {
                        show: true,
                        labels: {
                          show: true,
                          minWidth: 19,
                          maxWidth: 19,
                          style: {
                            colors: "#8A92A6",
                          },
                          offsetX: -5,
                        },
                      },
                      legend: {
                          show: true,
                      },
                      xaxis: {
                          labels: {
                              minHeight:22,
                              maxHeight:22,
                              show: true,
                              style: {
                                colors: "#8A92A6",
                              },
                          },
                          lines: {
                              show: false  //or just here to disable only x axis grids
                          },
                          categories: data.map(({ x }) => x)
                      },
                      grid: {
                          show: false,
                      },
                      fill: {
                          type: 'gradient',
                          gradient: {
                              shade: 'dark',
                              type: "vertical",
                              shadeIntensity: 0,
                              gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                              inverseColors: true,
                              opacityFrom: .4,
                              opacityTo: .1,
                              stops: [0, 50, 80],
                              colors: ["#3a57e8", "#4bc7d2"]
                          }
                      },
                      tooltip: {
                        enabled: true,
                      },
                  };
                
                  const chart = new ApexCharts(document.querySelector("#d-mainx"), options);
                  chart.render();
                  document.addEventListener('ColorChange', (e) => {
                    console.log(e)
                    const newOpt = {
                      colors: [e.detail.detail1, e.detail.detail2],
                      fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            type: "vertical",
                            shadeIntensity: 0,
                            gradientToColors: [e.detail.detail1, e.detail.detail2], // optional, if not defined - uses the shades of same color in series
                            inverseColors: true,
                            opacityFrom: .4,
                            opacityTo: .1,
                            stops: [0, 50, 60],
                            colors: [e.detail.detail1, e.detail.detail2],
                        }
                    },
                   }
                    chart.updateOptions(newOpt)
                  })
                }
                </script>
                <script>
var data = [

<?php foreach ($dataku2 as $loop): ?>
{ y: '<?= $loop['month']; ?>', a: <?= $loop['sales']; ?>, b: <?= $loop['profit']; ?> },
<?php endforeach ?>

],
config = {
data: data,
xkey: 'y',
ykeys: ['a', 'b'],
labels: ['Sales', 'Profit'],
fillOpacity: 0.6,
hideHover: 'auto',
behaveLikeLine: true,
resize: true,
pointFillColors:['#ffffff'],
pointStrokeColors: ['black'],
lineColors:['gray','red']
};

config.element = 'bar-chart2';
Morris.Bar(config);
</script>
				


				<?php $this->endSection(); ?>