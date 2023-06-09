<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">

    <title>Uygulamalı Eğitim Modeli</title>

    <base href="<?= base_url() ?>"/>
    <link rel="stylesheet" type="text/css" href="css/stilHome.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url("assets/js");?>jquery-3.5.1.min.js"> </script>
    <script src="<?php echo base_url("assets/js");?>bootstrap.min.js"> </script>
</head>
<body>

<div class="container-fluid py-2">
    <h1>Uygulamalı Eğitim Modeli </h1>

    <h3>Profil Sayfası</h3>

    <h4 class="text-danger">Hoşgeldiniz! <?=$ogretmen->girisAdi?> </h4>
</div>

<div class="container-fluid">
    <div class="row px-2">

        <a class="nav-link text-dark" href="home"><button type="button"  class="btn btn-dark">Anasayfa </button></a>
        <a class="nav-link text-dark" href="YonetOgrenci/Ogrencilerim"><button type="button"  class="btn btn-dark">Öğrencilerim </button></a>
        <a class="nav-link text-dark" href="GorevliGiris/cikis"><button type="button"  class="btn btn-dark">Oturumu Kapat </button></a>
        <a class="nav-link text-dark" href="GorevliGiris/SifreDegistir"><button type="button"  class="btn btn-dark">Şifre Değiştir </button></a>
    </div>
</div>


<hr/>
<div class="container-fluid">
    <form method="post" action="GorevliGiris/Guncelle/">
        <table border="1" cellspacing="0" cellpadding="5" width="500">

            <input type="hidden" name="ogretmenID" value="<?=$ogretmen->ogretmen_id ?>"/>
            <tr>
                <td>Öğretmen Adı</td>
                <td><input type="text" name="ogretmen_ad_" size="30" value="<?=$ogretmen->ogretmen_ad?>"/></td>

            </tr>

            <tr>
                <td>Öğretmen Soyadı</td>
                <td><input type="text" name="ogretmen_soyad_" size="30" value="<?=$ogretmen->ogretmen_soyad?>"/></td>

            </tr>

            <tr>
                <td>Öğretmen Unvan</td>
                <td>
                    <input type="text" name="ogretmen_unvan_" size="30" value="<?=$ogretmen->ogretmen_unvan?>"/>
                </td>
            </tr>

            <tr>
                <td>Öğretmen Mail</td>
                <td>
                    <input type="text" name="ogretmen_mail_" size="30" value="<?=$ogretmen->ogretmen_mail?>"/>
                </td>
            </tr>


            <tr>
                <td>  <img src="image/admin.jpg" class="rounded-circle" width="50"></td>
                <td><input type="submit" value="Güncelle"/></td>
            </tr>
        </table>
    </form>
</div>

<br/>
<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>





</body>
<footer class="pt-2 fixed-bottom">
    <div class="container-fluid pb-5">
        <h5 class="text-white float-right">
            Burak KIZILKAYA | Bilgisayar Programcılığı
        </h5>
    </div>
</footer>

</html>