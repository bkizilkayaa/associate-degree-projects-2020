<?php
//11.05.20

class firmalar_model extends CI_Model
{
    public $tablo_adi = '';

    public function __construct()
    {
        parent::__construct();
        $this->tablo_adi = 'tbl_firmalar';

    }

    public function TumFirmalar()
    {
        return $this->db->get($this->tablo_adi)->result();
    }

    public function Ayrinti($id)
    {
        return $this->db->where('firma_id', $id)->get($this->tablo_adi)->row();
    }

    public function Add($firma = array())
    {
        if ($_POST)
        {
            $non=$firma['firma_id'];
            echo $non;    //yazdırma yapıyor.
        }
            return $this->db->insert($this->tablo_adi, $firma);

    }

    public function Update($data = array())
    {
        return $this->db->where('firma_id', $data['firma_id'])->update($this->tablo_adi, $data);
    }

    public function Delete($id)
    {
        return $this->db->where('firma_id', $id)->delete($this->tablo_adi);

    }
}
