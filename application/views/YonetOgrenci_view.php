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

    <h1 >Yönetim Sayfası</h1>


    <h3  >Öğrenci Listesi | Düzenlemek için yan taraftaki butonları kullanın.</h3>
     <p>  <a href="home">Ana Sayfa</a> &emsp;
         <a href="YonetOgrenci/Add">Öğrenci Ekle</a> &emsp;
         <a href="firmaListesi/Add">Firma Ekle</a> &emsp;
         <a href="firmaListesi">Firma Listele</a></p>


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
        <?php foreach ($ogrenciler as $ogrenci) { ?>
            <tr>
                <td> <?=$ogrenci->ogrenci_id?> </td>
                <td> <?=$ogrenci->ogrenci_ad ?> </td>
                <td> <?=$ogrenci->ogrenci_soyad ?> </td>
                <td> <?=$ogrenci->firma_id ?> </td>
                <td> <?=$ogrenci->staj_baslangic ?> </td>
                <td> <?=$ogrenci->staj_bitis ?> </td>
                <td align="center"> <?= $ogrenci->sorumlu_ogretmen ?> </td>
                <td align="center"> <?= $ogrenci->staj_not_ort ?> </td>
                <td align="center">   <a href="YonetOgrenci/delete/<?= $ogrenci->ogrenci_id ?>"
                                         onclick="return confirm('bu kayıt silinmek üzere. devam etmek istiyor musunuz?')">Sil</a> -
                    <a href="YonetOgrenci/Edit/<?= $ogrenci->ogrenci_id ?>"">Güncelle</a> -
                    <a href="YonetOgrenci/Notlandir/<?= $ogrenci->ogrenci_id ?>"">Notlandır</a> -
                    <a href="YonetOgrenci/FirmaDegistir/<?= $ogrenci->ogrenci_id ?>"">Firma Değişikliği</a>
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
