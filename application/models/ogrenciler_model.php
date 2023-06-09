<?php
//11.05.20

class ogrenciler_model extends CI_Model
{
    public $tablo_adi = '';

    public function __construct()
    {
        parent::__construct();
        $this->tablo_adi = 'tbl_ogrenci';
    }

    public function TumOgrenciler()
    {
        return $this->db->get($this->tablo_adi)->result();
    }

    public function Ayrinti($id)
    {
        return $this->db->where('ogrenci_id', $id)->get($this->tablo_adi)->row();
    }
    public function Add($ogrenci = array())
    {
        if ($_POST)
        {
            $non=$ogrenci['ogrenci_id'];
         //   echo $non;    //yazdırma yapıyor.
        }
            return $this->db->insert($this->tablo_adi, $ogrenci);

    }

    public function Update($data = array())
    {
        return $this->db->where('ogrenci_id', $data['ogrenci_id'])->update($this->tablo_adi, $data);
    }

    public function Delete($id)
    {
        return $this->db->where('ogrenci_id', $id)->delete($this->tablo_adi);

    }


}
