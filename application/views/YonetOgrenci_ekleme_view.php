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

<div class="container-fluid py2">
    <h1>Hoşgeldiniz. Öğrenci eklemek için gerekli bilgileri giriniz.</h1>

    <h3>Öğrenci Ekleme Sayfası</h3>
    <div class="container-fluid">
          <div class="row">

              <a class="nav-link text-dark" href="home"><button type="button"  class="btn btn-dark">Anasayfa </button></a>
              <a class="nav-link text-dark" href="firmaListesi"><button type="button"  class="btn btn-dark">Firma Listesi </button></a>


          </div>

    </div>


    <p margin-top:15px></p>
    <form name=form1 method="post" action="YonetOgrenci/PostAdd" class="text-dark font-weight-bold"onSubmit="return kontrol()" onsubmit="return idkontrol()">
        <table border="1" cellspacing="0" cellpadding="5" width="500">


            <tr>
                <td>Ogrenci NO</td>
                <td><input type="text" id="ogrenci_id_" name="ogrenci_id_"  size="30"/></td>

            </tr>

            <tr>
                <td>Öğrenci Adı</td>
                <td><input type="text" name="ogrenci_ad_" size="30"  /></td>

            </tr>

            <tr>
                <td>Öğrenci Soyadı</td>
                <td><input type="text" name="ogrenci_soyad_" size="10"  /></td>

            </tr>

            <tr>
                <td>Firma ID</td>
                <td><input type="text" name="firma_id_" size="10"  /></td>

            </tr>

            <tr>
                <td>Staj Başlangıç</td>
                <td><input type="date" name="staj_baslangic_" size="50"/> </td>
                </td>

            </tr>

            <tr>
                <td>Staj Bitiş Tarihi</td>
                <td>
                    <input type="date" name="staj_bitis_" size="50"/>
                </td>
            </tr>

            <tr>
                <td>Sorumlu Öğretmen ID</td>
                <td>


                    <input type="text" name="sorumlu_ogretmen_" size="10"/>

                </td>

            </tr>

            <tr>
                <td>Staj Not Ortalaması</td>
                <td><input type="text" name="staj_not_ort_" size="10"/>  </td>

            </tr>


            <tr>
                <td></td>
                <td><input type="submit" value="Gönder"/></td>
            </tr>
        </table>
    </form>
</div>

<br/>

<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>

<hr/>

<div class="container-fluid py-2 text-white">
    <h3>Veritabanına Kayıtlı Öğretmen Bilgileri</h3>

    <?php

    $baglanti = new mysqli("localhost", "root", "12345678", "stajyer_takip");

    if ($baglanti->connect_errno > 0) {
        die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
    }

    $baglanti->set_charset("utf8");

    $sorgu = $baglanti->query("select * from tbl_ogretmen");  // Tabloları listeleme

    if ($baglanti->errno > 0)
    {
        die("<b>Sorgu Hatası:</b> " . $baglanti->error);
    }

    $html = "<h4> &emsp; ID &#160; | Ad &#160;&#160;| &#160;&#160;Soyad |&#160;&#160; Ünvan </h4>";
    $html .= "<ul>";

    while ($tablo = $sorgu->fetch_array()) {
        $html .= "<li>" . $tablo[0] . "&emsp;" .$tablo[1] .    " &emsp;" .$tablo[2] .  "&emsp;" .$tablo[3] .  " </li>";
        $html.= "</br>";
    }
    $html .= "</ul>";

    echo $html;


    $sorgu->close();
    $baglanti->close();

    ?>

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