<?php
defined('BASEPATH') or exit('No direct script access allowed');


class firmaListesi extends CI_Controller
{
    public function index()
    {
        $this->load->model('firmalar_model');
        $genelliste = new stdClass();
        $genelliste->firmalar = $this->firmalar_model->TumFirmalar();
        $this->load->view('firmaListesi_view', $genelliste);
    }

    public function detail($id)
    {
        $this->load->model('firmalar_model');
        $detay['firma'] = $this->firmalar_model->Ayrinti($id);
        $this->load->view('firmaListesi_view', $detay);
    }

    public function Add()
    {
        $veri['sonuc'] = null;
        $this->load->view('firma_ekleme_view', $veri);

    }

    public function PostAdd()
    {

        $this->load->model('firmalar_model');
        $firma = array(
            'firma_id' => $this->input->post('firma_id_'),
            'firma_alani' => $this->input->post('firma_alani_'),
            'firma_adi' => $this->input->post('firma_adi_'),
            'firma_adresi' => $this->input->post('firma_adresi_'),
            'yol_destegi' => $this->input->post('yol_destegi_'),
            'yemek_destegi' => $this->input->post('yemek_destegi_'),
            'calisan_sayisi' => $this->input->post('calisan_sayisi_'),
            'stajyer_maasi' => $this->input->post('stajyer_maasi_'),
            'firma_telefon' => $this->input->post('firma_telefon_')
        );

        $result = $this->firmalar_model->Add($firma);
        if ($result) {
            $veri['sonuc'] = 'veriler eklendi..';
        } else {
            $veri['sonuc'] = 'veriler eklenemedi';
        }

        $this->load->view('firma_ekleme_view', $veri);

    }


    public function Delete($firma)
    {
        $this->load->model('firmalar_model');
        $delete = $this->firmalar_model->Delete($firma);
        if ($delete > 0) {
            redirect(base_url('firmaListesi/index'));
            echo '<h4> silme işlemi başarılı </h4>';
        } else {
            echo '<h4> başarısız </h4>';
        }

    }


    public function Edit($firma)
    {
        $this->load->model('firmalar_model');
        $detay['ogrenci'] = $this->firmalar_model->Ayrinti($firma);
        $detay['sonuc'] = null;
        $this->load->view('firma_guncelle_view', $detay);
    }



    public function PostEdit()
    {
        $this->load->model('firmalar_model');
        $ogrenci = array(
            'ogrenci_id' => $this->input->post('ogrenciID'),
            'ogrenci_ad' => $this->input->post('ogrenci_ad_'),
            'ogrenci_soyad' => $this->input->post('ogrenci_soyad_'),
            'firma_adi' => $this->input->post('firma_adi_'),
            'staj_baslangic' => $this->input->post('staj_baslangic_'),
            'staj_bitis' => $this->input->post('staj_bitis_'),
            'sorumlu_ogretmen' => $this->input->post('sorumlu_ogretmen_'),
            'staj_not_ort' => $this->input->post('staj_not_ort_')
        );
        $result = $this->ogrenciler_model->Update($ogrenci);
        if ($result) {
            $veri['sonuc'] = 'veriler güncellendi';
        } else {
            $veri['sonuc'] = 'veriler güncellenemedi';
        }

        $veri['ogrenci'] = $this->ogrenciler_model->Ayrinti($this->input->post('ogrenciID'));
        $this->load->view('YonetOgrenci_guncelle_view', $veri);
    }




}