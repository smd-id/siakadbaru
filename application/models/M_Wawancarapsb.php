
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Wawancarapsb extends CI_Model
{

    // START DATATABLE QUERY
    private $table = 'wawancara_psb';

    // Proses Modal
    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function update_by_id($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update_by_nik($nik, $data)
    {
        $this->db->where('nik', $nik);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
    
}
