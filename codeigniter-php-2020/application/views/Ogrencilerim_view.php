<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>  <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">

    <title>Uygulamalı Eğitim Modeli </title>
    <base href="<?= base_url() ?>"/>
    <link rel="stylesheet" type="text/css" href="css/stilHome.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url("assets/js");?>jquery-3.5.1.min.js"> </script>
    <script src="<?php echo base_url("assets/js");?>bootstrap.min.js"> </script>
</head>
<body>



<div class="container-fluid py-2">
    <h1>Sorumlu olduğunuz öğrenciler</h1>
    <h3 >Öğrenci Listesi | Düzenlemek için yan taraftaki butonları kullanın.</h3>
    <div class="container-fluid">
        <div class="row px-2">
            <div class="col-md-6 py-3">
                <a class="text-dark" href="home"><button type="button"  class="btn btn-dark">Anasayfa </button></a>
                <a class="text-dark" href="YonetOgrenci/Add"><button type="button"  class="btn btn-dark ml-2">Öğrenci Ekle </button></a>
                <a class="text-dark" href="firmaListesi/Add"><button type="button"  class="btn btn-dark ml-2">Firma Ekle </button></a>
                <a class=" text-dark" href="firmaListesi""><button type="button"  class="btn btn-dark ml-2">Firma Listesi</button></a>
            </div>
            <div class="col-md-6 float-right">
                <a class=" text-dark float-right" href="home"><button type="button"  class="btn btn-outline-success">Profilim </button></a>
            </div>
        </div>
    </div>



    <table class="table table-hover" border="3" cellpadding="5" cellspacing="0" width="1500">
        <thead>
        <tr>
            <th>Öğrenci No</th>
            <th>Öğrenci Adı</th>
            <th>Öğrenci Soyadı</th>
            <th>Firma ID</th>
            <th>Staj Baslangic</th>
            <th>Staj Bitis</th>
            <th>Sorumlu Ogretmen</th>
            <th>Staj Not Ortalaması</th>
            <th> </th>

        </tr>
        </thead>
        <?php foreach ($ogrencilerim as $ogr) { ?>
            <tr>
                <td> <?=$ogr->ogrenci_id?> </td>
                <td> <?=$ogr->ogrenci_ad ?> </td>
                <td> <?=$ogr->ogrenci_soyad ?> </td>
                <td> <?=$ogr->firma_id ?> </td>
                <td> <?=$ogr->staj_baslangic ?> </td>
                <td> <?=$ogr->staj_bitis ?> </td>
                <td align="center"> <?= $ogr->sorumlu_ogretmen ?> </td>
                <td align="center"> <?= $ogr->staj_not_ort ?> </td>
                <td align="center">   <a href="YonetOgrenci/delete/<?= $ogr->ogrenci_id ?>"
                                         onclick="return confirm('bu kayıt silinmek üzere. devam etmek istiyor musunuz?')">Sil</a> -
                    <a href="YonetOgrenci/Edit/<?= $ogr->ogrenci_id ?>"">Güncelle</a> -
                    <a href="YonetOgrenci/Notlandir/<?= $ogr->ogrenci_id ?>"">Notlandır</a> -
                    <a href="YonetOgrenci/FirmaDegistir/<?= $ogr->ogrenci_id ?>"">Firma Değişikliği</a>
                </td>

            </tr>
            <?php
        } ?>


    </table>
    <hr/>
</div>


</body>


<footer class="pt-2 fixed-bottom">
    <div class="container-fluid pb-5">
        <h5 class="text-white float-right">
            Burak KIZILKAYA | Bilgisayar Programcılığı
        </h5>
    </div>
</footer>


</html>
