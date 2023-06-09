<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ogrenciListesi extends CI_Controller
{
    public function index()
    {
        $this->load->model('ogrenciler_model');
        $genelliste = new stdClass();
        $genelliste->ogrenciler = $this->ogrenciler_model->TumOgrenciler();
        $this->load->view('ogrenciListesi_view', $genelliste);
    }

    public function detail($id)
    {
        $this->load->model('ogrenciler_model');
        $detay['ogrenci'] = $this->ogrenciler_model->Ayrinti($id);
        $this->load->view('ogrenciListesi_view', $detay);
    }


}