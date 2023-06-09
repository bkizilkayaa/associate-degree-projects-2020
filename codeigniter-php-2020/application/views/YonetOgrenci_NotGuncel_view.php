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
    <script type="text/javascript">
           function NotOrtHesapla()
           {
               var s1=document.getElementById("_mevcudiyet");
               var s2=document.getElementById("_farkindalik");
               var s3=document.getElementById("_gorevler");
               var s4=document.getElementById("_iletisim");
               var s5=document.getElementById("_pratik");
               var s6=document.getElementById("_raporekleri");
               var s7=document.getElementById("_uygulama");
               var s8=document.getElementById("_yenilik");
               var s9=document.getElementById("_sorumluluk");
               var s10=document.getElementById("_savunma");
               var s11=document.getElementById("_raporyazim");
               var s12=document.getElementById("_mesguliyet");
               var sonuc=document.getElementById("notortalamasi");
               var toplam=Number(s1.value)+Number(s2.value)+Number(s3.value)+Number(s4.value)+Number(s5.value)+Number(s6.value)+Number(s7.value)+Number(s8.value)+Number(s9.value)+Number(s10.value)+Number(s11.value)+Number(s12.value);
               var yuvarla=Math.round(Number(toplam/12));
               notortalamasi.value=parseInt(yuvarla);
           }
    </script>
</head>
<body>

<div class="container-fluid">
    <h1>Uygulamalı Eğitim Modeli </h1>

    <h3>Güncelleme Sayfası</h3>
    <form method="post" action="YonetOgrenci/PostNot/">
        <table border="1" cellspacing="0" cellpadding="5" width="700">

            <input type="hidden" name="ogrenciID" value="<?=$ogrenci->ogrenci_no ?>"/>


            <tr>
                <td>Fiilen Mevcudiyet</td>
                <td><input type="number"  id="_mevcudiyet" name="_mevcudiyet" size="10" min="0" max="100" value="<?=$ogrenci->fiilen_mevcudiyet_?>" onclick="NotOrtHesapla()" onblur="NotOrtHesapla()"/></td>

            </tr>

            <tr>
                <td>Ziyaret sırasındaki meşguliyet</td>
                <td><input type="number" id="_mesguliyet" name="_mesguliyet" size="10" min="0" max="100" value="<?=$ogrenci->mesguliyet_?>" onblur="NotOrtHesapla()"/></td>

            </tr>

            <tr>
                <td>Yaptığı işin farkındalığı</td>
                <td>
                    <input type="number" id="_farkindalik" name="_farkindalik" size="10" min="0" max="100" onblur="NotOrtHesapla()" value="<?=$ogrenci->farkindalik_?>"/>
                </td>

            </tr>

            <tr>
                <td>Teorik bilgiyi pratik ilişkilendirme</td>
                <td>
                    <input type="number" id="_pratik" name="_pratik" size="10" min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->pratik_iliskilendirme_ ?>"/>


                </td>
            </tr>

            <tr>
                <td>Verilen görevleri yapma</td>
                <td><input type="number" id="_gorevler" name="_gorevler" size="10" min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->gorevleri_uygulama_ ?>"/> </td>

            </tr>


            <tr>
                <td>Sorumlulukların farkında olma</td>
                <td><input type="number" id="_sorumluluk"  name="_sorumluluk" size="10"  min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->sorumluluk_alma_ ?>"/> </td>

            </tr>



            <tr>
                <td>İşiyle ilgili yenilik geliştirme</td>
                <td><input type="number" name="_yenilik"  id="_yenilik" size="10"  min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->yenilik_gelistirme_ ?>"/> </td>

            </tr>

            <tr>
                <td>İletişim Becerisi</td>
                <td><input type="number" id="_iletisim"  name="_iletisim" size="10" min="0" max="100" onblur="NotOrtHesapla()"  value="<?= $ogrenci->iletisim_becerisi_ ?>"/> </td>

            </tr>

            <tr>
                <td>Mesleki Uygulama Raporunun yazım kurallarına uyumu</td>
                <td><input type="number" id="_raporyazim" name="_raporyazim" min="0" max="100" size="10" onblur="NotOrtHesapla()" value="<?= $ogrenci->rapor_yazimi_ ?>"/> </td>

            </tr>


            <tr>
                <td>Rapor içeriğinin uygulama ile uyumu</td>
                <td><input type="number" id="_uygulama" name="_uygulama" size="10" min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->uygulama_uyumu_ ?>"/> </td>

            </tr>

            <tr>
                <td>Rapor eklerinin uygulama alanı ile uyumu</td>
                <td><input type="number" id="_raporekleri"  name="_raporekleri" size="10" min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->rapor_eklerinin_uyumu_ ?>"/> </td>
            </tr>


            <tr>
                <td>Uygulama sonrası savunmada tutarlılık</td>
                <td><input type="number" id="_savunma" name="_savunma" size="10" min="0" max="100" onblur="NotOrtHesapla()" value="<?= $ogrenci->savunmada_tutarlilik_ ?>"/> </td>
            </tr>

            <tr>
                <td>NOT ORTALAMASI</td>
                <td><input type="text" id="notortalamasi" name="_myonotort" size="10"   readonly="true"/> </td>

            </tr>


            <tr>
                <td></td>
                <td><input type="submit" value="Notları Gönder"/></td>
            </tr>
        </table>

    </form>

</div>


<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>
<hr/>
<a class="nav-link text-dark" href="YonetOgrenci/Ogrencilerim"><button type="button"  class="btn btn-dark">Öğrencilerim </button></a>


</body>