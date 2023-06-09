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

<div id="container">



<div class="container-fluid pb-2">
    <h1>Öğrenci Yönetimi Sayfası</h1>
    <h3>Öğretmen Listesi | Görevli eklemek için butonları kullanınız.</h3>
    <br/>
    <a class="ml-3 text-dark" href="home"><button type="button"  class="btn btn-dark">Ana Sayfa</button></a>
    <a class="ml-3 text-dark" href="YonetOgretmen/Add"><button type="button"  class="btn btn-dark">Görevli Ekle</button></a>

</div>
    <br/>
    <div class="container-fluid">
        <table class="table table-hover" border="3" cellpadding="5" cellspacing="0">
            <thead>
            <tr>
                <th>Öğretmen ID</th>
                <th>Öğretmen Adı</th>
                <th>Öğretmen Soyadı</th>
                <th>Öğretmen Ünvanı</th>
                <th>Öğretmen Mail</th>
                <th> </th>


            </tr>
            </thead>
            <?php foreach ($ogretmenler as $ogretmen) { ?>
                <tr>
                    <td> <?=$ogretmen->ogretmen_id?> </td>
                    <td align="center"> <?=$ogretmen->ogretmen_ad?> </td>
                    <td align="center"> <?=$ogretmen->ogretmen_soyad?> </td>
                    <td align="center"> <?=$ogretmen->ogretmen_unvan?> </td>
                    <td> <?=$ogretmen->ogretmen_mail?> </td>

                    <td align="center">   <a href="YonetOgretmen/delete/<?= $ogretmen->ogretmen_id?>"
                                             onclick="return confirm('bu kayıt silinmek üzere. devam etmek istiyor musunuz?')">Sil</a> -
                        <a href="YonetOgretmen/Edit/<?=$ogretmen->ogretmen_id ?>"">Güncelle</a>

                    </td>

                </tr>
                <?php
            } ?>


        </table>
    </div>


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
