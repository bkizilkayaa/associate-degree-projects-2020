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

<div class="container-fluid">

    <h1 >Talep Görüntüleme Sayfası</h1>


    <h3>Talepleri onaylayabilir, silebilirsiniz.</h3>
     <p> <a href="home">Ana Sayfa</a> &emsp;</p>


    <table border="1" cellpadding="5" cellspacing="0" width="1500">

        <thead>
        <tr>
            <th>Öğrenci No</th>
            <th>Öğrenci Adı</th>
            <th>Öğrenci Soyadı</th>
            <th>Eski Firma ID</th>
            <th>Değişiklik Nedeni </th>
            <th>Yeni Firma ID</th>
            <th>Oluşturuldugu Tarih</th>
            <th>Sorumlu Ogretmen</th>
            <th> </th>

        </tr>
        </thead>
        <?php foreach ($ogrenciler as $talep) { ?>
            <tr>
                <td> <?=$talep->ogrenci_nosu?> </td>
                <td> <?=$talep->ogrenci_adi?> </td>
                <td> <?=$talep->ogrenci_soyadi?> </td>
                <td> <?=$talep->eski_firmasi?> </td>
                <td> <?=$talep->nedeni ?> </td>
                <td> <?=$talep->yeni_firmasi ?> </td>
                <td align="center"> <?= $talep->talep_tarihi?> </td>
                <td align="center"> <?= $talep->sorumlu_ogretmeni ?> </td>
                <td align="center">



                </td>

            </tr>
            <?php
        } ?>


    </table>
    <hr/>










</div>


</body>
</html>
