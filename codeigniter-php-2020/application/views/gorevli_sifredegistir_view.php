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

<div class="container-fluid py-2">
    <h1>Şifre değiştirmek için gereken alanları doldurunuz.</h1>

    <h3>Görevli Şifre Değiştirme Ekranı </h3>

</div>

 <p margin-top:15px></p>
<!--  navbar yapısı-->
<div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-light bg-transparent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <!--                    <a class="nav-link" href="home">Ana Sayfa <span class="sr-only">(current)</span></a>-->
                    <a class="nav-link text-dark" href="home"><button type="button"  class="btn-sm btn-dark">Anasayfa </button></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="GorevliGiris"><button type="button"  class="btn-sm btn-dark">Profil </button></a>
                </li>

                <li class="nav-item">
                    <!--                    <a class="nav-link text-dark" href="home/tanim">Tanım</a>-->
                    <a class="nav-link text-dark" href="ogrenciListesi"><button type="button"  class="btn-sm btn-dark">Öğrenci Listesi </button></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="GorevliGiris/forget"><button type="button"  class="btn-sm btn-dark">Şifremi Unuttum </button></a>
                </li>

            </ul>


        </div>
    </nav>
</div>

<!--form yapısı-->
<div class="container-fluid">
    <form name=form1 method="post" action="GorevliGiris/sifredegistirPost" onSubmit="return kontrol()">
        <table border="2" cellspacing="0" cellpadding="5" width="500">

            <tr>
                <td>Mevcut Şifre</td>
                <td><input type="text" name="msifre_" size="20"  /></td>

            </tr>

            <tr>
                <td>Yeni Şifre</td>
                <td><input type="text" name="ysifre_" size="20"  /></td>

            </tr>

            <tr>
                <td>Yeni Şifre(Tekrar)</td>
                <td><input type="text" name="ysifre2_" size="20"  /></td>

            </tr>

            <td><img src="image/admin.jpg" class="rounded-circle" width="55"></td>
            <td><input type="submit" value="Değiştir"/></td>
            </tr>
        </table>
    </form>
</div>


<h4 class="text-danger px-2"><?php echo $sonuc; ?> </h4>

<hr/>


</body>


<footer class="pt-2 fixed-bottom">
    <div class="container-fluid pb-5">
        <h5 class="text-white float-right">
            Burak KIZILKAYA | Bilgisayar Programcılığı
        </h5>
    </div>
</footer>

</html>

