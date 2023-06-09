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
            var bilgi=document.form1.ogrenci_id_.value;
            var adbilgi=document.form1.ogrenci_ad_.value;
            var soyadbilgi=document.form1.ogrenci_soyad_.value;
            if (bilgi !="" && adbilgi!="" && soyadbilgi!="") return true;
            else alert ('Öğrenci No | İsim | Soyisim alanlarını giriniz!')
            return false;
        }
    </script>

</head>
<body>

<div class="container-fluid">
    <h1>Hoşgeldiniz. Öğrenci eklemek için gerekli bilgileri giriniz.</h1>

    <h3>Öğrenci Ekleme Sayfası</h3>
<br/>
    <div class="container-fluid">
        <div class="row">
            <a class=" text-dark" href="home"><button type="button"  class="btn btn-dark">Anasayfa </button></a>
            <a class="text-dark" href="firmaListesi"><button type="button"  class="btn btn-dark ml-3">Firma Listesi </button></a>
        </div>
    </div>

    <p margin-top:15px></p>
    <form name=form1 method="post" action="firmaListesi/PostAdd">
        <table border="1" cellspacing="0" cellpadding="5" width="900">
            <input type="hidden" id="firma_id_" name="firma_id_"/>

            <tr>
                <td>Firma Alanı</td>
                <td><input type="text" id="firma_alani_" name="firma_alani_"  size="30"/></td>

            </tr>

            <tr>
                <td>Firma Adı</td>
                <td><input type="text" name="firma_adi_" size="30"  /></td>

            </tr>

            <tr>
                <td>Firma Adresi</td>
                <td><input type="text" name="firma_adresi_" size="100"  /></td>

            </tr>

            <tr>
                <td>Yol Desteği</td>
                <td><input type="text" name="yol_destegi_" size="10"  /> TL</td>

            </tr>

            <tr>
                <td>Yemek Desteği</td>
                <td><input type="text" name="yemek_destegi_" size="10"/>  TL</td>
                </td>
            </tr>
            <tr>
                <td>Çalışan Sayısı</td>
                <td>
                    <input type="text" name="calisan_sayisi_" size="10"/> personel
                </td>
            </tr>

            <tr>
                <td>Stajyer Maaşı</td>
                <td>
                    <input type="text" name="stajyer_maasi_" size="10"/> TL
                </td>
            </tr>

            <tr>
                <td>Firma Telefon</td>
                <td><input type="text" name="firma_telefon_" size="10"/>  </td>
            </tr>


            <tr>
                <td></td>
                <td><input type="submit" value="Kaydet"/></td>
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