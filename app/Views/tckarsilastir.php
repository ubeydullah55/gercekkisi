<?= view('include/header') ?>

<?= view('include/leftmenu') ?>
<div class="main-container">

    <div class="pd-ltr-20 xs-pd-20-10">

        <!-- Form grid Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">TC KARŞILAŞTIR</h4>

                </div>

            </div>
            <!-- app/Views/tc_kontrol_form.php -->
            <!-- app/Views/tc_kontrol_form.php -->

<form method="post" action="<?= site_url('tckarsilastir') ?>">
    <div style="display: flex; gap: 20px;">
        <!-- Sol tarafta TC girişi -->
        <div style="flex: 1;">
            <label for="girilentc">Toplu T.C. No'ları (her satıra bir tane): (Toplam <?= $eklenenSayisi ?? 0 ?> adet)</label><br>
            <textarea name="tc_list" id="tc_list" rows="20" style="width: 100%;"><?= esc($tc_list ?? '') ?></textarea>
        </div>

        <!-- Sağ tarafta sonuç alanı -->
        <div style="flex: 1;">
          <label for="sonuc">
    Veritabanında Olmayanlar:
    <span style="color: red;">(<?= $olmayanSayisi ?? 0 ?> adet)</span>
    |
    <span style="color: green;">Olan: <?= $bulunanSayisi ?? 0 ?> adet</span>
</label>
            <textarea id="sonuc" rows="20" style="width: 100%; background-color:#f5f5f5;" readonly><?= esc($sonuc ?? '') ?></textarea>
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-success btn-lg btn-block">
        Karşılaştır
    </button>
</form>




        </div>
    </div>
    <!-- Form grid End -->
    <div class="footer-wrap pd-20 mb-20 card-box">
        Created by
        <a href="https://github.com/ubeydullah55" target="_blank">ubeydullah doğan</a>
    </div>
</div>


</div>



<?= view('include/footer') ?>