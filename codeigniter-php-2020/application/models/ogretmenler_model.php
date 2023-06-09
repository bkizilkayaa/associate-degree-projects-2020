<?php
//11.05.20

class ogretmenler_model extends CI_Model
{
    public $tablo_adi = '';

    public function __construct()
    {
        parent::__construct();
        $this->tablo_adi = 'tbl_ogretmen';

    }

    public function TumOgretmenler()
    {
        return $this->db->get($this->tablo_adi)->result();
    }

    public function Dogrula($girisAdi,$sif)
    {
        $this->db->where('girisAdi',$girisAdi);
        $this->db->where('sifre',$sif);
        return $this->db->get($this->tablo_adi)->row();
    }

    public function Ayrinti($id)
    {
        return $this->db->where('ogretmen_id', $id)->get($this->tablo_adi)->row();
    }

    public function Profil($adi)
    {
        return $this->db->where('girisAdi', $adi)->get($this->tablo_adi)->row();
    }

    public function Add($ogretmen = array())
    {
        if ($_POST)
        {
            $non=$ogretmen['ogretmen_id'];
            echo $non;    //giden numarayı test ettiğim yer
        }
            return $this->db->insert($this->tablo_adi, $ogretmen);

    }

    public function Update($data = array())
    {
        return $this->db->where('ogretmen_id', $data['ogretmen_id'])->update($this->tablo_adi, $data);
    }

    public function Delete($id)
    {
        return $this->db->where('ogretmen_id', $id)->delete($this->tablo_adi);
    }

    public function ogrenciListem($ogrID)
    {
        $this->db->select('*');
        $this->db->from($this->tablo_adi);
        $this->db->join('tbl_ogrenci','tbl_ogretmen.ogretmen_id=tbl_ogrenci.sorumlu_ogretmen');
        return $this->db->where('girisAdi',$ogrID)->get()->result();
    }


    public function SifreDegistir($adi,$msif,$ysif)
    {
       $data=array('sifre'=>$ysif);
       $this->db->set($data);
       $this->db->where('girisAdi',$adi);
       $this->db->where('sifre',$msif);
       $this->db->update($this->tablo_adi);
       if($this->db->affected_rows()==true)
       {
           $istek=true;
       }
       else{
           $istek=false;
       }

       return $istek;
    }

}
