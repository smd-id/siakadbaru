<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Psbdetail extends CI_Model {


    private $table = "detail_psb";
	
    
    public function get_detail()
    {
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function update($data)
    {
        $query = $this->db->update($this->table, $data);
        return $query;
    }
}
