<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="clearfix pt-5"></div>
<div class="pt-5 pb-5">
            <style>
            .slidecontainer {
                width: 100%;
            }

            .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 25px;
                background: #bb7e00;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
                border-radius: 12px;
            }

            .slider:hover {
                opacity: 1;
            }

            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 25px;
                height: 25px;
                background: #FFFF00;
                cursor: pointer;
                border-radius: 12px;
            }

            .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                background: #000000;
                cursor: pointer;
            }
        </style>
        
    <div class="wrapper pt-4">
        <br>
        
        <div class="container" style="text-align:center;">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <div class="text-center mb-3">
                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="200" height="200">
                        <h5 class="text-white mt-3 mb-1">Kalkulator Magic Wheel</h5>
                        <p class="text-white">Kalkulator Magic Wheel berfungsi untuk mengetahui total maksimal diamond
                        yang kamu butuhkan untuk mendapatkan skin LEGEND.<br></p>
                    </div>
                    <form method="post" target="">
                        <div class="row justify-content-center">
                            <h5 class="text-white mt-3 mb-1" >Geser Sesuai Point Magic Whell Anda</h5>
                            <div class="col-12 col-lg-8 mb-5">
                                <div class="slidecontainer">
                                    <p>&nbsp;</p>
                                    <span>
                                        <span color="white">Point Magic Whell Anda : </span>
                                    </span> <span id="f" style="font-weight:bold;color:#30cdf8">100</span><br>
                                    <input type="range" min="0" max="199" value="100" name="sld6" class="slider"
                                        id="myRange" onchange="show_value2(this.value)">
                                    <span color="white">Membutuhkan Maksimal : </span><span id="slider_value2"
                                        style="color:white;font-weight:bold;"></span>
                                    <img src="<?= base_url(); ?>/assets/images/diamond-ml.png" width="20" height="20">
                                    <br>
                                </div>
                                <br>
                                <a href="<?= base_url(); ?>/games/mobile-legends"
                                    class="d-flex align-items-center btn btn-confrim px-4 py-2 btn-lg border"
                                    style="background-color:#bb7e00;">
                                    <span class="content-justify-center" style="color: #fff;" style="text-align:center">Klik Untuk Membeli Diamond</span>
                                </a>
                            </div>
                        </div>
                    </form>
                    <span id="resultText" class="text-center d-block"> </span>
                </div>
            </div>
        </div>
        

    <script>
        function show_value2(x) {

            if (x < 196) {
                sisa_spin = 200 - x;
                jumlah_spin = Math.ceil(sisa_spin / 5);
                yz = jumlah_spin * 270;
            }

            if (x > 195) {

                sisa_spin = 200 - x;
                yz = sisa_spin * 60;

            }


            document.getElementById("slider_value2").innerHTML = yz;

        }
    </script>
    <script>
        var slideCol = document.getElementById("myRange");
        var y = document.getElementById("f");
        y.innerHTML = slideCol.value;

        slideCol.oninput = function() {
            y.innerHTML = this.value;
        }
    </script>

    </div>
</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>