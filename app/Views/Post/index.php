				<?php $this->extend('template'); ?>
				
				<?php $this->section('css'); ?>
				<style>
					p {
						margin-bottom: 0.65rem;
						font-family: "Open Sans",sans-serif;
						line-height: 1.7;
						letter-spacing: .015em;
						word-wrap: break-word;
						-webkit-font-smoothing: antialiased;
					}
				</style>
				<?php $this->endSection(); ?>
				
				<?php $this->section('content'); ?>
				<div class="clearfix pt-5"></div>
				<div class="pt-5 pb-5" style="min-height: 500px;">
			    <div class="container">
			        <div class="row justify-content-center">
			            <div class="col-lg-10">
			                <div class="pt-3 pb-4">
			                    <h5>Artikel</h5>
			                    <span class="strip-primary"></span>
			                </div>
			                <div class="pb-3">
			                    <div class="section" style="background:#212529">
			                        <div class="card-body">
						<div class="nk-blog-post nk-blog-post-single">
                            <div class="nk-post-text mt-0">
                                <div class="nk-post-img">
                                    <img src="<?= base_url(); ?>/assets/images/post/<?= $post['image']; ?>" alt="" >
                                </div>
                                <div class="nk-gap-1"></div>
                                <h1 class="nk-post-title h4" style="line-height: 36px;"><?= $post['title']; ?></h1>
                                <p class="text-white">Publish on <i class="fa fa-calendar mx-2"></i> <?= $post['date_create']; ?></p>
                                <div class="nk-gap"></div>
                                <?= htmlspecialchars_decode($post['content']); ?>
                            </div>
                        </div>
					</div>
				</div></div></div></div></div></div></div></div></div>
				<?php $this->endSection(); ?>
				
				<?php $this->section('js'); ?>
				<?php $this->endSection(); ?>