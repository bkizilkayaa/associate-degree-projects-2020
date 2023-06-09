<?php
defined('BASEPATH') or exit('No direct script access allowed');


class YonetOgretmen extends CI_Controller
{
    public function index()
    {
        $this->load->model('ogretmenler_model');
        $genelliste = new stdClass();
        $genelliste->ogretmenler = $this->ogretmenler_model->TumOgretmenler();
        $this->load->view('ListeOgretmen_view', $genelliste);
    }

    public function Add()
    {
        $veri['sonuc'] = null;
        $this->load->view('ListeOgretmen_add_view', $veri);
    }

    public function PostAdd()
    {
          $this->load->model('ogretmenler_model');
            $ogretmen = array(
                'ogretmen_id' => $this->input->post('ogretmen_id_'),
                'ogretmen_ad' => $this->input->post('ogretmen_ad_'),
                'ogretmen_soyad' => $this->input->post('ogretmen_soyad_'),
                'ogretmen_unvan' => $this->input->post('ogretmen_unvan_'),
                'girisAdi' => $this->input->post('girisAdi_'),
                'sifre' => md5($this->input->post('sifre_'))
            );
            $result = $this->ogretmenler_model->Add($ogretmen);
            if ($result) {
                $veri['sonuc'] = 'Görevli bilgileri sisteme eklendi..';
            } else {
                $veri['sonuc'] = 'Görevli bilgileri sisteme eklenemedi!';
            }

            $this->load->view('ListeOgretmen_add_view', $veri);

    }



    public function detail($id)
    {
        $this->load->model('ogretmenler_model');
        $detay['ogretmen'] = $this->ogretmenler_model->Ayrinti($id);
        $this->load->view('ListeOgretmen_view', $detay);
    }

    public function Delete($ogretmen)
    {
        $this->load->model('ogretmenler_model');
        $delete = $this->ogretmenler_model->Delete($ogretmen);
        if ($delete > 0) {
            redirect(base_url('YonetOgretmen/index'));
            echo '<h4> silme işlemi başarılı </h4>';
        } else {
            echo '<h4> başarısız </h4>';
        }

    }


    public function Edit($ogretmen)
    {
        $this->load->model('ogretmenler_model');
        $detay['ogretmen'] = $this->ogretmenler_model->Ayrinti($ogretmen);
        $detay['sonuc'] = null;
        $this->load->view('ListeOgretmen_update_view', $detay);
    }



    public function PostEdit()
    {
        $this->load->model('ogretmenler_model');
        $ogretmen = array(
            'ogretmen_id' => $this->input->post('ogretmenID'),
            'ogretmen_ad' => $this->input->post('ogretmen_ad_'),
            'ogretmen_soyad' => $this->input->post('ogretmen_soyad_'),
            'ogretmen_unvan' => $this->input->post('ogretmen_unvan_')
        );
        $result = $this->ogretmenler_model->Update($ogretmen);
        if ($result) {
            $veri['sonuc'] = 'veriler güncellendi';
        } else {
            $veri['sonuc'] = 'veriler güncellenemedi';
        }

        $veri['ogretmen'] = $this->ogretmenler_model->Ayrinti($this->input->post('ogretmenID'));
        $this->load->view('ListeOgretmen_update_view', $veri);
    }





}