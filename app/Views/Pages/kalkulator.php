<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<style>
            .content {
                height: 900px;
            }
            .tex-img {
                border-radius: 10px;
            }
            .centerx {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;
}
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class=""></div>
<div class= "pb-5">
    <div class="wrapper pt-4">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="text-center mb-3">
                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="200"
                            height="200">
                    </div>
                    <form class="mb-3" style="text-align:center">
                        <div class="mb-3"><label class="mb-1 " >
                            <a href="<?= base_url(); ?>/kalkulatorwr"><img src="<?= base_url(); ?>/assets/images/winrate.webp"  class="img-fluid tex-img centerx"><br></a>
                            <h5>Hitung Winrate ML</h5></label>
                        </div>
                        <div class="mb-3"><label class="mb-1 " >
                            <a href="<?= base_url(); ?>/hpmagicwheel"><img src="<?= base_url(); ?>/assets/images/magicwheel.webp" class="img-fluid tex-img centerx"><br></a>
                            <h5>HP Magic Wheel</h5></label>

                        </div>
                        <div class="mb-3"><label class="mb-1 " >
                            <a href="<?= base_url(); ?>/kalkulatorzodiac"><img src="<?= base_url(); ?>/assets/images/zodiac.webp" class="img-fluid tex-img centerx"><br></a>
                            <h5>HP Zodiac</h5></label>

                        </div>

                    </form>
                    <span id="resultText" class="text-center d-block" style="color:#000"> </span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>