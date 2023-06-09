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

    <script type="text/javascript" >
        function kontrol()
        {
            var adbilgi=document.form1.ogretmen_ad_.value;
            var soyadbilgi=document.form1.ogretmen_soyad_.value;
            if (adbilgi!="" && soyadbilgi!="") return true;
            else alert ('Öğretmen İsim - Soyisim alanlarını giriniz!')
            return false;
        }
    </script>

</head>
<body>

<div class="container-fluid">
    <h1>Hoşgeldiniz. Görevli öğretmen eklemek için gerekli bilgileri giriniz.</h1>

    <h3>Öğretmen Ekleme Sayfası</h3>
    <div class="container-fluid">
        <div class="row">
            <a class="nav-link text-dark" href="home"><button type="button"  class="btn btn-dark">Anasayfa </button></a>
            <a class="nav-link text-dark" href="YonetOgretmen"><button type="button"  class="btn btn-dark">Öğretmen Listesi </button></a>
        </div>
    </div>

    <p margin-top:15px></p>
    <form name=form1 method="post" action="YonetOgretmen/PostAdd" onSubmit="return kontrol()">
        <table border="1" cellspacing="0" cellpadding="5" width="500">

            <tr>
                <td>Öğretmen Adı</td>
                <td><input type="text" name="ogretmen_ad_" size="20"  /></td>

            </tr>

            <tr>
                <td>Öğretmen Soyadı</td>
                <td><input type="text" name="ogretmen_soyad_" size="20"  /></td>

            </tr>

            <tr>
                <td>Öğretmen Unvanı</td>
                <td><input type="text" name="ogretmen_unvan_" size="20"  /></td>
            </tr>

            <tr>
                <td>Görevli giriş adı </td>
                <td><input type="text" name="girisAdi_" size="20"  /></td>
            </tr>

            <tr>
                <td>Görevli şifresi</td>
                <td><input type="text" name="sifre_" size="20"  /></td>
            </tr>

            <tr>
                <td>Görevli mail</td>
                <td><input type="text" name="mail_" size="20"  /></td>
            </tr>


            <td></td>
            <td><input type="submit" value="Kaydet"/></td>
            </tr>
        </table>
    </form>



</div>

<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>

<hr/>


</body>
<footer class="pt-2 fixed-bottom">
    <div class="container-fluid pb-5">
        <h5 class="text-white float-right">
            Burak KIZILKAYA | Bilgisayar Programcılığı
        </h5>
    </div>
</footer>
</html>