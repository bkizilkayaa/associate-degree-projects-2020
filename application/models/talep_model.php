<?php
//11.05.20

class talep_model extends CI_Model
{
    public $tablo_adi = '';

    public function __construct()
    {
        parent::__construct();
        $this->tablo_adi = 'tbl_degisiklik';
    }
    public function Add($talep = array())
    {
        return $this->db->insert($this->tablo_adi, $talep);
    }

    public function Delete($id)
    {
        return $this->db->where('talep_id', $id)->delete($this->tablo_adi);
    }

    public function Ayrinti($id)
    {
        return $this->db->where('talep_id', $id)->get($this->tablo_adi)->row();
    }

   public function Update($data)
   {

       $this->tablo_adi='tbl_ogrenci';
       return $this->db->where('ogrenci_id', $data['ogrenci_id'])->update($this->tablo_adi, $data);
   }

 public function Talepler()
    {
        return $this->db->get($this->tablo_adi)->result();
   }
}
