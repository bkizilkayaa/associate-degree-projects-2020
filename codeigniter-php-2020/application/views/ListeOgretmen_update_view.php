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
    <div class="container-fluid py-3">
        <div class="row">
            <a class="text-dark" href="home"><button type="button"  class="btn btn-dark ">Anasayfa </button></a>
            <a class=" text-dark" href="YonetOgretmen/index"><button type="button"  class="btn btn-dark ml-3">Öğretmen Listesi</button></a>
        </div>
    </div>


    <form method="post" action="YonetOgretmen/PostEdit/">
        <table border="1" cellspacing="0" cellpadding="5" width="500">

            <input type="hidden" name="ogretmenID" value="<?=$ogretmen ->ogretmen_id ?>"/>



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
                <td></td>
                <td><input type="submit" value="Gönder"/></td>
            </tr>
        </table>
    </form>

</div>

<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>
<hr/>



</body>