<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Daftarulang extends CI_Model
{

    // START DATATABLE QUERY
    public $table = 'peserta_psb';
    

    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_all()
    {
        $query = $this->db
        ->select('*')
        ->from ('peserta_psb')
        ->join ('file_psb', 'file_psb.nik = peserta_psb.nik')        
        ->where_not_in('s_daftar_ulang', '0')        
        ->get();
        return $query;
    }
    
}
