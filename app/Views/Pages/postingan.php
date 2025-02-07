<?php $this->extend('template'); ?>
                
                <?php $this->section('css'); ?>
                <style>
                    .list-agent  {
                        background: #05132E;
                        border-radius: 20px;
                        cursor: pointer;
                        transition: 0.5s;
                    }
                    h5, .h5 {
                        color:#fff;
                    }
                    .list-agent:hover {
                        margin-top: -6px;
                    }
                    .list-agent img {
                        border-radius: 20px;
                        width: 100%;
                    }
                    .nk-widget-match .nk-widget-match-teams .nk-widget-match-team-logo img {
                        width: 75px;
                    }
                    .nk-decorated-h, .nk-decorated-h-2 {
                        color:#fff;
                    }
                    .nk-widget-highlighted .nk-widget-title {
                        color:#fff;
                    }
					.nk-post-title > a {
						font-size: 18px;
					}

                </style>
                <?php $this->endSection(); ?>
                
                <?php $this->section('content'); ?>

                <div class="clearfix pt-5"></div>
                <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-md-12">
                		<div class="pt-3 pb-4">
			            	<h5>Artikel</h5>
			            	<span class="strip-primary"></span>
			    		</div>
                        <?php foreach ($post as $loop): ?>
                        <div class="nk-blog-post">
                            <div class="row vertical-gap">
                                <div class="col-lg-2 col-md-5">
                                    <a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>" class="nk-post-img">
                                        <img src="<?= base_url(); ?>/assets/images/post/<?= $loop['image']; ?>" alt="">
                                        <span class="nk-post-categories">
                                            <span class="bg-main-1"><?= $loop['category']; ?></span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-lg-9 col-md-7">
                                    <h2 class="nk-post-title h4"><a href="<?= base_url(); ?>/post/<?= $loop['id']; ?>"><?= $loop['title']; ?></a></h2>
                                    <div class="nk-post-date mt-10 mb-10">
                                        <i class="ion ion-calendar mr-10"></i> <?= $loop['date_create']; ?>
                                    </div>
                                    <div class="nk-post-text">
                                        <?= substr(str_replace("<br>", ' ', $loop['content']), 0, 120); ?>...
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div> </div>
                <?php $this->endSection(); ?>
                
                <?php $this->section('js'); ?>

<?php $this->endSection(); ?>