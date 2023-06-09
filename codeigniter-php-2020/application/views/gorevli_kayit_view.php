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

<div class="container-fluid py-3">
    <h1>Hoşgeldiniz. Görevli öğretmen eklemek için gerekli bilgileri giriniz.</h1>

    <h3>Öğretmen Ekleme Sayfası</h3>
</div>



<div class="container-fluid">
    <form name=form1 method="post" action="GorevliGiris/kayitPost" onSubmit="return kontrol()">
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
                <td>Öğretmen Mail </td>
                <td><input type="text" name="mail_" size="30"  /></td>
            </tr>

            <td></td>
            <td><input type="submit" value="Kaydet"/></td>
            </tr>
        </table>
    </form>

</div>
 <p margin-top:15px></p>

<br/>
<span style="color:#990000;"> <?php echo $sonuc; ?></span>

<hr/>
<a class="ml-2 text-dark" href="GorevliGiris"><button type="button"  class="btn-sm btn-dark">Giriş Yap</button></a>


</body>



<footer class="pt-2 fixed-bottom">
    <div class="container-fluid pb-5">
        <h5 class="text-white float-right">
            Burak KIZILKAYA | Bilgisayar Programcılığı
        </h5>
    </div>
</footer>


</html>