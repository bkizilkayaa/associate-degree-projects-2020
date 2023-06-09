<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>  <!DOCTYPE html>
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

    <h1>Firma Listesi.</h1>

    <p class="font-weight-bold">Kayıtlı firma bilgileri aşağıdadır.</p>

    <div class="container-fluid">
        <div class="row">
            <a class="text-dark" href="home"><button type="button"  class="btn btn-dark ">Anasayfa </button></a>
            <a class=" text-dark" href="YonetOgrenci/Ogrencilerim"><button type="button"  class="btn btn-dark ml-3">Öğrencilerim </button></a>
            <a class=" text-dark" href="YonetOgrenci/Add"><button type="button"  class="btn btn-dark ml-3">Firma Ekle </button></a>
            <a class="text-dark" href="firmaListesi""><button type="button"  class="btn btn-dark ml-3">Firma Listesi</button></a>
        </div>
    </div>
<br/>

    <table class="table table-hover" border="3" cellpadding="5" cellspacing="0" width="1300">
        <thead>
        <tr>
            <th>Firma ID</th>
            <th>Firma Alanı</th>
            <th>Firma Adı</th>
            <th>Firma Adresi</th>
            <th>Yol Desteği</th>
            <th>Yemek Desteği</th>
            <th>Çalışan Sayısı</th>
            <th>Stajyer Maaşı</th>
            <th>Telefon Bilgisi</th>
            <th> </th>


        </tr>
        </thead>
        <?php foreach ($firmalar as $firma) { ?>
            <tr>
                <td> <?=$firma->firma_id?> </td>
                <td> <?=$firma->firma_alani ?> </td>
                <td> <?=$firma->firma_adi ?> </td>
                <td> <?=$firma->firma_adresi ?> </td>
                <td> <?=$firma->yol_destegi ?> TL</td>
                <td> <?=$firma->yemek_destegi ?> TL</td>
                <td> <?=$firma->calisan_sayisi ?> personel</td>
                <td> <?=$firma->stajyer_maasi ?> TL</td>
                <td> <?=$firma->firma_telefon ?> </td>


        <td align="center"> <p>  <a href="firmaListesi/delete/"<?=$firma->firma_id?>"
                     onclick="return confirm('bu kayıt silinmek üzere. devam etmek istiyor musunuz?')">Sil</a>  &emsp;
            <a href="firmaListesi/Edit/"<?=$firma->firma_id?>"> Güncelle</a>
            </p>
        </td>




            </tr>
            <?php
        } ?>


    </table>


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
