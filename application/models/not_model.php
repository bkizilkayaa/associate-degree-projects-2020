<?php
//11.05.20

class not_model extends CI_Model
{
    public $tablo_adi = '';

    public function __construct()
    {
        parent::__construct();
        $this->tablo_adi = 'tbl_ogrenci_not';

    }

    public function TumOgrenciler()
    {
        return $this->db->get($this->tablo_adi)->result();
    }

    public function Ayrinti($id)
    {
        return $this->db->where('ogrenci_no', $id)->get($this->tablo_adi)->row();
    }

    public function Add($ogrenci = array())
    {
        return $this->db->insert($this->tablo_adi, $ogrenci);
    }

    public function Update($data = array())
    {
        return $this->db->where('ogrenci_no', $data['ogrenci_no'])->update($this->tablo_adi, $data);
    }


}
