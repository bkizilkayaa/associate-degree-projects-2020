<?php
defined('BASEPATH') or exit('No direct script access allowed');


class TalepGoruntule extends CI_Controller
{
    public function index()
    {
        $this->load->model('talep_model');
        $genelliste = new stdClass();
        $genelliste->talepler = $this->talep_model->Talepler();
        $this->load->view('talep_view', $genelliste);
    }

    public function Add()
    {
        $veri['sonuc'] = null;
        $this->load->view('talep_view', $veri);
    }

    public function DegisiklikTalep()
    {
        $this->load->model('talep_model');
        $talep = array(
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
            $veri['sonuc'] = 'veriler eklendi..';
        } else {
            $veri['sonuc'] = 'veriler eklenemedi';
        }

//        $this->load->view('YonetOgrenci_firmadegistir', $veri);

    }





    public function detail($id)
    {
        $this->load->model('talep_model');
        $detay['talepler'] = $this->talep_model->Ayrinti($id);
        $this->load->view('ListeOgretmen_view', $detay);
    }



    public function Guncelle($talep)
    {
        $this->load->model('talep_model');
        $talepler = json_encode($this->db->get('tbl_degisiklik')->result());
        $talepler = json_decode($talepler, true);
        foreach ($talepler as $request) {
            $a=$request['eski_firmasi'];
            $b=$request['yeni_firmasi'];
            $c=$request['ogrenci_nosu'];
        }

        $dataa = array(
            'firma_id' => $b
        );
        $this->db->where('ogrenci_id', $c);
        $this->db->update('tbl_ogrenci', $dataa);


        $delete = $this->talep_model->Delete($talep);
        if ($delete > 0) {
            redirect(base_url('TalepGoruntule'));
            echo '<h4>işlemi başarılı </h4>';
        } else {
            echo '<h4> başarısız </h4>';
        }
    }


    public function Delete($talep)
    {
        $this->load->model('talep_model');
        $delete = $this->talep_model->Delete($talep);
        if ($delete > 0) {
            redirect(base_url('TalepGoruntule'));
            echo '<h4> işlemi başarılı </h4>';
        } else {
            echo '<h4> başarısız </h4>';
        }
    }



    public function Edit($dizi)
    {
        $this->load->model('ogrenciler_model');
        $this->load->model('talep_model');

        $detay['dizi'] = $this->talep_model->Ayrinti($dizi);
        $detay['sonuc'] = null;
        $this->load->view('YonetFirma_onayla_view', $detay);
    }



    public function PostEdit()
    {
        $this->load->model('ogrenciler_model');
        $this->load->model('talep_model');
        $dizi = array(
            'ogrenci_id' => $this->input->post('ogrenciID'),
            'ogrenci_ad' => $this->input->post('ogrenci_ad_'),
            'ogrenci_soyad' => $this->input->post('ogrenci_soyad_'),
            'firma_id' => $this->input->post('firma_id_'),
            'staj_baslangic' => $this->input->post('staj_baslangic_'),
            'staj_bitis' => $this->input->post('staj_bitis_'),
            'sorumlu_ogretmen' => $this->input->post('sorumlu_ogretmen_'),
            'staj_not_ort' => $this->input->post('staj_not_ort_')
        );
        $result = $this->ogrenciler_model->Update($dizi);
        if ($result) {
            $veri['sonuc'] = 'veriler güncellendi';
        } else {
            $veri['sonuc'] = 'veriler güncellenemedi';
        }

        $veri['dizi'] = $this->ogrenciler_model->Ayrinti($this->input->post('ogrenciID'));
        $this->load->view('YonetFirma_onayla_view', $veri);
    }





}