<?php
defined('BASEPATH') or exit('No direct script access allowed');


class GorevliGiris extends CI_Controller
{
    public function index()
    {
        $this->load->driver('session');
        $giris=$this->session->userdata('session_giris');
        if($giris!=true)
        {
          redirect(base_url('GorevliGiris/login'));
        }

        else
        {
            $this->load->model('ogretmenler_model');
            $detay['sonuc']=null;
            $girisAdi=$this->session->userdata('session_adi');
            $detay['ogretmen']=$this->ogretmenler_model->Profil($girisAdi);
            $this->load->view('gorevli_profil_view',$detay);
        }
    }

    public function login()
    {
        $giris=$this->session->userdata('session_giris');
        if($giris!=true)
        {
            $veri['sonuc']=null;
            $this->load->view('gorevli_giris_view',$veri);
        }
        else
        {
            redirect(base_url('GorevliGiris'));
        }
    }

    public function loginPost()
    {
        $this->load->model('ogretmenler_model');
        $girisAdi=$this->input->post('girisAdi_');
        $sif= md5($this->input->post('sifre_'));
        $result=$this->ogretmenler_model->Dogrula($girisAdi,$sif);
        if($result)
        {
             $this->session->set_userdata('session_giris','true');
             $this->session->set_userdata('session_adi',$this->input->post('girisAdi_'));
             redirect(base_url('GorevliGiris'));
        }
        else
        {
            $veri['sonuc']="Hata! kayıtlı olmayan görevlisiniz";
            $this->load->view('gorevli_giris_view',$veri);

        }
    }
    public function kayit()
    {
        $veri['sonuc']=null;
        $this->load->view('gorevli_kayit_view',$veri);
    }

    public function kayitPost()
    {
        $gorevliler = json_encode($this->db->get('tbl_ogretmen')->result());
        $gorevliler = json_decode($gorevliler, true);
        foreach ($gorevliler as $request) {
            $deger = $request['girisAdi'];
            if($request['girisAdi']==$this->input->post('girisAdi_'))
            {
                goto b;
            }
        }

        if ($_POST['girisAdi_']!=null)
        {
            $this->load->model('ogretmenler_model');
            $ogretmen = array(
                'ogretmen_id' => $this->input->post('ogretmen_id_'),
                'ogretmen_ad' => $this->input->post('ogretmen_ad_'),
                'ogretmen_soyad' => $this->input->post('ogretmen_soyad_'),
                'ogretmen_unvan' => $this->input->post('ogretmen_unvan_'),
                'girisAdi' => $this->input->post('girisAdi_'),
                'sifre' => md5($this->input->post('sifre_')),
                'ogretmen_mail' => $this->input->post('mail_')
            );
            $result = $this->ogretmenler_model->Add($ogretmen);
            if ($result) {
                $veri['sonuc'] = 'Görevli bilgileri sisteme eklendi..';
            } else {
                $veri['sonuc'] = 'Görevli bilgileri sisteme eklenemedi!';
            }
        }
        else
        {
            b:
            $veri['sonuc'] = 'Bu görevli giriş adı daha önceden alındı!!!';
        }
        $this->load->view('gorevli_kayit_view', $veri);

    }


    public function Guncelle()
    {

        $this->load->model('ogretmenler_model');
        $ogretmen = array(
            'ogretmen_id' => $this->input->post('ogretmenID'),
            'ogretmen_ad' => $this->input->post('ogretmen_ad_'),
            'ogretmen_soyad' => $this->input->post('ogretmen_soyad_'),
            'ogretmen_unvan' => $this->input->post('ogretmen_unvan_'),
            'ogretmen_mail' => $this->input->post('ogretmen_mail_')
        );
        $result = $this->ogretmenler_model->Update($ogretmen);
        if ($result) {
            $veri['sonuc'] = 'Görevli bilgileri başarıyla güncellendi';
        } else {
            $veri['sonuc'] = 'Görevli bilgileri güncellenemedi!!';
        }

        $veri['ogretmen'] = $this->ogretmenler_model->Ayrinti($this->input->post('ogretmenID'));
        $this->load->view('gorevli_profil_view', $veri);
    }
    public function cikis()
    {
        $this->session->unset_userdata('session_adi');
        $this->session->unset_userdata('session_giris');
        redirect(base_url('GorevliGiris'));
    }

    public function SifreDegistir()
    {
        $veri['sonuc']=null;
        $veri['session_adi']=$this->session->userdata('session_adi');
        $this->load->view('gorevli_sifredegistir_view',$veri);
    }
    public function sifredegistirPost()
    {
       $this->load->model('ogretmenler_model');
       $adi=$this->session->userdata('session_adi');
       $msif=md5($this->input->post('msifre_'));
        $ysif=md5($this->input->post('ysifre_'));
        $ysif2=md5($this->input->post('ysifre2_'));

        if($ysif==$ysif2)
        {
            $result=$this->ogretmenler_model->SifreDegistir($adi,$msif,$ysif);
            if($result)
            {
                $veri['sonuc']='Tebrikler şifre değiştirildi';
            }
            else{
                $veri['sonuc']='Hata, mevcut şifre yanlış girildi!';
            }
        }
        else{
            $veri['sonuc']='Hata, yeni şifreler uyumlu olmalıdır';
        }
        $veri['session_adi']=$this->session->userdata('session_adi');
        $this->load->view('gorevli_sifredegistir_view',$veri);
    }



}