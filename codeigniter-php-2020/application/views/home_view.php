<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Uygulamalı Eğitim Modeli </title>
    <base href="<?= base_url() ?>"/>
    <link rel="stylesheet" type="text/css" href="css/stilHome.css">
    <link rel="stylesheet" type="text/css" href="css/stillimg.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url("assets/js");?>jquery-3.5.1.min.js"> </script>
    <script src="<?php echo base_url("assets/js");?>bootstrap.min.js"> </script>


</head>
<body>
<!--navbar yapisi-->
<div class="container">
    <nav class="navbar navbar-expand-md navbar-light bg-transparent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="home"><button type="button"  class="btn btn-dark">Anasayfa </button></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="home/tanim"><button type="button"  class="btn btn-dark ">Tanım </button></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="ogrenciListesi"><button type="button"  class="btn btn-dark">Öğrenci Listesi </button></a>
                </li>

                <li class="nav-item">
                   <a class="nav-link text-dark" href="GorevliGiris/login"><button type="button"  class="btn btn-dark">Yönetim Sayfası </button></a>
                </li>

                <li class="nav-item">
                    <?php if($this->session->userdata('session_adi')==null) { ?>
                    <a class="nav-link text-dark" href="GorevliGiris"><button type="button"  class="btn btn-danger">Görevli Öğretmen Listesi [Oturum Gerekli!]</button></a>
                    <?php } ?>
                    <?php if($this->session->userdata('session_adi')!=null) { ?>
                    <a class="nav-link text-dark" href="YonetOgretmen/index"><button type="button"  class="btn btn-dark">Görevli Öğretmen Listesi </button></a>
                    <?php } ?>
                </li>



                <li class="nav-item">
                    <?php if($this->session->userdata('session_adi')!=null) { ?>
                        <a class="nav-link text-dark" href = "TalepGoruntule/index" ><button type = "button"  class="btn btn-dark" > Talep Listesi </button ></a>
                    <?php } ?>
                    <?php if($this->session->userdata('session_adi')==null) { ?>
                    <a class="nav-link text-dark" href = "GorevliGiris" ><button type = "button"  class="btn btn-danger" > Talep Listesi [Oturum Gerekli!] </button ></a>
                    <?php } ?>
                </li >

            </ul>


             <form class="form-inline my-2" action="GorevliGiris">
                 <?php if($this->session->userdata('session_adi')==null) { ?>
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"> Giriş Yap! </button>
                 <?php }?>

                     <?php if($this->session->userdata('session_adi')!=null) { ?>
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Profilim </button>
                     <?php }?>
            </form>


        </div>
    </nav>


</div>
    <hr/>
<div class="view py-5" style="background-image: url('https://wallpaperplay.com/walls/full/3/9/3/164636.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-5" data-wow-delay="0.3s">
                    <h1 class="h1-responsive font-weight-bold mt-sm-5 text-white">3+1 Uygulamalı Eğitim Modeli</h1>
                    <h3 class="font-weight-bold text-white"> Takip Paneline Hoşgeldiniz  </h3>
                    <h6 class="mb-4 text-white">Bu site üniversitelerin yetkili öğretmenleri için hazırlanmıştır.</h6>
                </div>
                <div class="col-md-6 col-xl-5 mt-xl-5 " data-wow-delay="0.3s">
                    <img src="https://pluspng.com/img-png/web-development-png-download-the-datasheet-557.png" class="img-fluid">
                </div>
            </div>
        </div>
<!--        içerik buraya gelebilir | boş gövde.-->

        <div class="container text-white">
            <div class="row">
                <div class="col-md-12 text-center">
                    <!--        içerik buraya gelebilir | boş gövde.-->
<!--                    resmin gövde| alt kısmı, boş gövde-->
                </div>
            </div>
        </div>

</div>
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
