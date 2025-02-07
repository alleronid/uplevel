<?php $this->extend('template'); ?>

<?php $this->section('css'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="clearfix pt-5"></div>
<div class="pt-5 pb-5">
    <div class="wrapper pt-4">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <div class="text-center mb-3">
                        <img src="<?= base_url(); ?>/assets/images/<?= $web['logo']; ?>" width="200"
                            height="200">
                    </div>
                    <form class="mb-3">
                        <div class="mb-3"><label class="mb-1 text-white" for="idMatch">Total Pertandingan Anda</label>
                            <input type="number" placeholder="Contoh: 351" autofocus="" autocomplete="off" id="tMatch"
                                class="form-control">
                        </div>
                        <div class="mb-3"><label class="mb-1 text-white" for="tWr">Total Win Rate Anda</label>
                            <input type="number" placeholder="Contoh: 51.4%" step="any" autocomplete="off" id="tWr"
                                class="form-control">
                        </div>
                        <div class="mb-3"><label class="mb-1 text-white" for="wrReq">Win Rate yang anda
                                inginkan</label>
                            <input type="number" placeholder="Contoh: 70%" step="any" autocomplete="off" id="wrReq"
                                class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary d-block w-100" type="button" id="hasil">Hasil</button>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary d-block w-100"
                                    href="https://phymarket.com/games/joki-rank">Order Joki</a>
                            </div>
                        </div>
                    </form>
                    <span id="resultText" class="text-center d-block"> </span>
                </div>
            </div>
        </div>
        <script>
            // Variables
            const tMatch = document.querySelector("#tMatch");
            const tWr = document.querySelector("#tWr");
            const wrReq = document.querySelector("#wrReq");
            const hasil = document.querySelector("#hasil");
            const resultText = document.querySelector("#resultText");

            // Functions
            function res() {
                const resultNum = rumus(tMatch.value, tWr.value, wrReq.value);
                const text =
                    `Kamu memerlukan sekitar <b>${resultNum}</b> win tanpa lose untuk mendapatkan win rate <b>${wrReq.value}%</b>`;
                resultText.innerHTML = text;
            }

            function rumus(tMatch, tWr, wrReq) {
                let tWin = tMatch * (tWr / 100);
                let tLose = tMatch - tWin;
                let sisaWr = 100 - wrReq;
                let wrResult = 100 / sisaWr;
                let seratusPersen = tLose * wrResult;
                let final = seratusPersen - tMatch;
                return Math.round(final);
            }

            // Main
            window.addEventListener("load", init);

            function init() {
                load();
                eventListener();
            }

            function load() { }

            function eventListener() {
                hasil.addEventListener("click", res);
            }
        </script>
    </div>
</div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>