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

    <h3>Değişiklik Talep Sayfası</h3>


    <table border="1" cellspacing="0" cellpadding="5" width="1000">

        <input type="hidden" name="ogrenci_nosu_" value="<?=$talep['ogrenci_id']?>"/>


        <tr>
            <td>Öğrenci Adı</td>
            <td><input type="text" name="ogrenci_ad_" size="30" readonly="true" value="<?=$talep['ogrenci_ad']?>"/></td>
        </tr>

        <tr>
            <td>Öğrenci Soyadı</td>
            <td><input type="text" name="ogrenci_soyad_" size="10" readonly="true" value="<?=$talep['ogrenci_soyad']?>"/></td>
        </tr>

        <tr>
            <td>Çalıştığı Firma ID'si</td>
            <td>
                <input type="text" name="eski_firmasi_" size="10" readonly="true" value="<?=$talep['firma_id']?>"/>
            </td>
        </tr>

        <tr>
            <td>Değişiklik Nedeni</td>
            <td>
                <input type="text" name="nedeni_" size="90"/>
            </td>
        </tr>

        <tr>
            <td>Geçiş Yapılacak Firma ID</td>
            <td>
                <input type="text" name="yeni_firmasi_" value="<?=$talep['yeni_firmasi']?>" size="10"/>
            </td>
        </tr>


        <tr>
            <td>Talebin oluşturulduğu tarih</td>
            <td><input type="text" name="talep_tarihi_" size="10" readonly="true" value="<?=date('d.m.Y') ?>"/> </td>

        </tr>


        <tr>
            <td>Sorumlu Öğretmen</td>
            <td><input type="text" name="sorumlu_ogretmeni_" size="10"  readonly="true" value="<?=$talep['sorumlu_ogretmen']?>"/> </td>
        </tr>


        <tr>
            <td></td>
            <td><input type="submit" value="Talebi Gönder"/></td>
        </tr>
    </table>


</div>


<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>
<hr/>
<div class="container-fluid">
    <div class="row">
        <a class="nav-link text-dark" href="YonetOgrenci/Ogrencilerim"><button type="button"  class="btn btn-dark">Öğrencilerim </button></a>
        <a class="nav-link text-dark" href="firmaListesi"><button type="button"  class="btn btn-dark">Firmaları Görüntüle </button></a>
    </div>

</div>


</body>