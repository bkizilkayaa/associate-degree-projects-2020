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
<div class="container-fluid">
    <h1>Uygulamalı Eğitim Modeli </h1>

    <h3>Güncelleme Sayfası</h3>
    <form method="post" action="YonetOgrenci/PostEdit/">
        <table border="1" cellspacing="0" cellpadding="5" width="500">

            <input type="hidden" name="ogrenciID" value="<?= $ogrenci ->ogrenci_id ?>"/>

            <tr>
                <td>Öğrenci Adı</td>
                <td><input type="text" name="ogrenci_ad_" size="30" value="<?=$ogrenci->ogrenci_ad?>"/></td>

            </tr>

            <tr>
                <td>Öğrenci Soyadı</td>
                <td><input type="text" name="ogrenci_soyad_" size="10" value="<?=$ogrenci->ogrenci_soyad?>"/></td>

            </tr>

            <tr>
                <td>Firma ID</td>
                <td>
                    <input type="text" name="firma_id_" size="10" value="<?=$ogrenci->firma_id?>"/>
                </td>

            </tr>

            <tr>
                <td>Staj Baslangıc</td>
                <td>
                    <input type="date" name="staj_baslangic_" size="10" value="<?= $ogrenci->staj_baslangic ?>"/>


                </td>
            </tr>

            <tr>
                <td>Staj Bitis</td>
                <td><input type="date" name="staj_bitis_" size="10" value="<?= $ogrenci->staj_bitis ?>"/> </td>

            </tr>


            <tr>
                <td>Sorumlu Öğretmen</td>
                <td><input type="text" name="sorumlu_ogretmen_" size="10" value="<?= $ogrenci->sorumlu_ogretmen ?>"/> </td>

            </tr>



            <tr>
                <td>Ortalaması</td>
                <td><input type="text" name="staj_not_ort_" size="10" value="<?= $ogrenci->staj_not_ort ?>"/> </td>

            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Gönder"/></td>
            </tr>
        </table>
    </form>


</div>

<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>
<hr/>
<a class="nav-link text-dark" href="YonetOgrenci/Ogrencilerim"><button type="button"  class="btn btn-dark">Öğrencilerim </button></a>


</body>