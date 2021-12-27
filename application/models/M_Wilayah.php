<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Wilayah extends CI_Model {


    private $table_provinsi     = "w_provinces";
    private $table_kabupaten    = "w_regencies";
    private $table_kecamatan    = "w_districts";
    private $table_desa         = "w_villages";
	
    // PROVINSI
    public function get_provinsi($id = NULL)
    {
        if ($id !== NULL){
            $this->db->where('id', $id);
        }
        $query = $this->db->get($this->table_provinsi);
        return $query;
    }
    // END OFF PROVINSI



    // KABUPATEN
    public function get_kabupaten_by_id($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get($this->table_kabupaten);
        return $query->row();
    }

    public function get_kabupaten_by_prov($id)
    {
        $this->db->where('province_id', $id);
        $query = $this->db->get($this->table_kabupaten);
        return $query->result();
    }
    // END OFF KABUPATEN



    // KECAMATAN
    public function get_kecamatan_by_id($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get($this->table_kecamatan);
        return $query->row();
    }

    public function get_kecamatan_by_kab($id)
    {
        $this->db->where('regency_id', $id);
        $query = $this->db->get($this->table_kecamatan);
        return $query->result();
    }
    // END OF KECATAMAN



    // DESA
    public function get_desa_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_desa);
        return $query->row();
    }

    public function get_desa_by_kec($id)
    {
        $this->db->where('district_id', $id);
        $query = $this->db->get($this->table_desa);
        return $query->result();
    }
    // END OF DESA

}
