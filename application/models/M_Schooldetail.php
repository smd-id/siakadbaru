<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Schooldetail extends CI_Model
{

    // START DATATABLE QUERY
    private $table = 'detail_sekolah';

    // Proses Modal
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function update($data)
    {
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
    
}
