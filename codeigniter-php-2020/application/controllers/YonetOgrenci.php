<?php
defined('BASEPATH') or exit('No direct script access allowed');


class YonetOgrenci extends CI_Controller
{
    public $tablo_ogretmen = 'tbl_ogretmen';
    public function index()
    {
        $this->load->model('ogrenciler_model');
        $genelliste = new stdClass();
        $genelliste->ogrenciler = $this->ogrenciler_model->TumOgrenciler();
        $this->load->view('YonetOgrenci_view', $genelliste);
    }

    public function Ogrencilerim()
    {
        $this->load->model('ogrenciler_model');
        $this->load->model('ogretmenler_model');
        $ogrID=$this->session->userdata('session_adi');
        $liste = new stdClass();
        $liste->ogrencilerim = $this->ogretmenler_model->ogrenciListem($ogrID);
        $this->load->view('Ogrencilerim_view', $liste);
    }
    public function Add()
    {
        $veri['sonuc'] = null;
        $this->load->view('YonetOgrenci_ekleme_view', $veri);
    }

    public function PostAdd()
    {
          $this->load->model('ogrenciler_model');
            $ogrenci = array(
                'ogrenci_id' => $this->input->post('ogrenci_id_'),
                'ogrenci_ad' => $this->input->post('ogrenci_ad_'),
                'ogrenci_soyad' => $this->input->post('ogrenci_soyad_'),
                'firma_id' => $this->input->post('firma_id_'),
                'staj_baslangic' => $this->input->post('staj_baslangic_'),
                'staj_bitis' => $this->input->post('staj_bitis_'),
                'sorumlu_ogretmen' => $this->input->post('sorumlu_ogretmen_'),
                'staj_not_ort' => $this->input->post('staj_not_ort_')
            );

            $result = $this->ogrenciler_model->Add($ogrenci);
            if ($result) {
                $veri['sonuc'] = 'veriler eklendi..';
            } else {
                $veri['sonuc'] = 'veriler eklenemedi';
            }

            $this->load->view('YonetOgrenci_ekleme_view', $veri);

    }



    public function detail($id)
    {
        $this->load->model('ogrenciler_model');
        $detay['ogrenci'] = $this->ogrenciler_model->Ayrinti($id);
        $detay['sonuc']=null;
        $this->load->view('ogrenciListesi_view', $detay);
    }

    public function Delete($ogrenci)
    {
        $this->load->model('ogrenciler_model');
        $delete = $this->ogrenciler_model->Delete($ogrenci);
        if ($delete > 0) {
            redirect(base_url('YonetOgrenci/index'));
            echo '<h4> silme işlemi başarılı </h4>';
        } else {
            echo '<h4> başarısız </h4>';
        }

    }


    public function Edit($ogrenci)
    {
        $this->load->model('ogrenciler_model');
        $detay['ogrenci'] = $this->ogrenciler_model->Ayrinti($ogrenci);
        $detay['sonuc'] = null;
        $this->load->view('YonetOgrenci_guncelle_view', $detay);
    }



    public function PostEdit()
    {
        $this->load->model('ogrenciler_model');
        $ogrenci = array(
            'ogrenci_id' => $this->input->post('ogrenciID'),
            'ogrenci_ad' => $this->input->post('ogrenci_ad_'),
            'ogrenci_soyad' => $this->input->post('ogrenci_soyad_'),
            'firma_id' => $this->input->post('firma_id_'),
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


    public function Goruntule($id)
    {
        $this->load->model('talep_model');
        $this->load->model('ogrenciler_model');
        $detay['ogrenciler'] = $this->ogrenciler_model->Ayrinti($id);
        $this->load->view('talepGoruntule_view', $detay);
    }





    public function Notlandir($ogrenci)
    {
        $this->load->model('not_model');
        $detay['ogrenci'] = $this->not_model->Ayrinti($ogrenci);
        $detay['sonuc'] = null;
        $this->load->view('YonetOgrenci_NotGuncel_view', $detay);
    }


    public function PostNot()
    {
        $this->load->model('not_model');
        $ogrenci = array(
            'ogrenci_no' => $this->input->post('ogrenciID'),
            'fiilen_mevcudiyet_' => $this->input->post('_mevcudiyet'),
            'mesguliyet_' => $this->input->post('_mesguliyet'),
            'farkindalik_' => $this->input->post('_farkindalik'),
            'pratik_iliskilendirme_' => $this->input->post('_pratik'),
            'gorevleri_uygulama_' => $this->input->post('_gorevler'),
            'sorumluluk_alma_' => $this->input->post('_sorumluluk'),
            'yenilik_gelistirme_' => $this->input->post('_yenilik'),
            'iletisim_becerisi_' => $this->input->post('_iletisim'),
            'rapor_yazimi_' => $this->input->post('_raporyazim'),
            'uygulama_uyumu_' => $this->input->post('_uygulama'),
            'rapor_eklerinin_uyumu_' => $this->input->post('_raporekleri'),
            'savunmada_tutarlilik_' => $this->input->post('_savunma'),
            'myo_not_ort' => $this->input->post('_myonotort')
        );
        $result = $this->not_model->Update($ogrenci);
        if ($result) {
            $veri['sonuc'] = 'veriler güncellendi';
        } else {
            $veri['sonuc'] = 'veriler güncellenemedi';
        }

        $veri['ogrenci'] = $this->not_model->Ayrinti($this->input->post('ogrenciID'));
        $this->load->view('YonetOgrenci_NotGuncel_view', $veri);
    }


    public function FirmaDegistir($talep)
    {
        $this->load->model('ogrenciler_model');
        $this->load->model('talep_model');
        $detay['talep'] = $this->ogrenciler_model->Ayrinti($talep);
        $detay['sonuc'] = null;
        $this->load->view('YonetOgrenci_firmadegistir', $detay);
    }

    public function DegisiklikTalep()
    {
        $this->load->model('ogrenciler_model');
        $this->load->model('talep_model');
        $talep = array(
            'talep_id' => $this->input->post('talep_id_'),
            'ogrenci_nosu' => $this->input->post('ogrenci_nosu_'),
            'ogrenci_adi' => $this->input->post('ogrenci_ad_'),
            'ogrenci_soyadi' => $this->input->post('ogrenci_soyad_'),
            'eski_firmasi' => $this->input->post('eski_firmasi_'),
            'nedeni' => $this->input->post('nedeni_'),
            'yeni_firmasi' => $this->input->post('yeni_firmasi_'),
            'talep_tarihi' => $this->input->post('talep_tarihi_'),
            'sorumlu_ogretmeni' => $this->input->post('sorumlu_ogretmeni_')
        );

        $result = $this->talep_model->Add($talep);
        if ($result) {
            $detay['sonuc'] = 'talebiniz başarıyla alındı...';
        } else {
            $detay['sonuc'] = '!!! talebiniz alınamadı';
        }
        $detay['talep'] = $this->talep_model->Ayrinti($this->input->post('talep_id_'));
        $this->load->view('YonetOgrenci_firmadegistirdetay', $detay);

    }














}