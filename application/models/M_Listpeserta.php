<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Listpeserta extends CI_Model
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

    public function get_file($nik)
    {
        $query = $this->db
        ->select('*')
        ->from ('peserta_psb')
        ->join ('file_psb', 'file_psb.nik = peserta_psb.nik')
        ->where("peserta_psb.nik",$nik)
        ->get();
        return $query;
    }

    public function get_by_jalur($jalur)
    {
        $this->db->where('jalur_awal', $jalur);
        $this->db->or_where('jalur', $jalur);
        $this->db->order_by('jurusan', 'ASC');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    public function get_by_lulus_adm_undangan()
    {
        $this->db->where('jalur_awal', 'undangan');
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    public function get_lulus_by($jalur)
    {
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->where('s_lulus', '1');
        $this->db->where('jalur', $jalur); 
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    public function get_tidak_lulus_by($jalur)
    {
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->where('s_lulus', '0');
        $this->db->where('jalur', $jalur); 
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_lulus_adm()
    {
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_lulus_all($jalur)
    {
        $this->db->where('jalur', $jalur);
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->where('s_lulus', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_belum_cetak()
    {
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->where('s_cetak', '0');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    public function get_sia_sia()
    {
        $this->db->where('s_biodata', '0');
        $this->db->where('s_file', '0');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }

    public function count_all_kab($jalur)
    {

        $query = $this->db
            ->select("kabupaten, count(*) AS total", false)
            ->from ($this->table)
            ->join ('w_regencies', 'w_regencies.id = peserta_psb.kabupaten')
            ->where('peserta_psb.jalur', $jalur)
            ->where('peserta_psb.s_payment', '1')
            ->where('peserta_psb.s_biodata', '1')
            ->where('peserta_psb.s_file', '1')
            ->group_by("peserta_psb.kabupaten")
            ->order_by("total","DESC")
            ->get();

        return $query->result();
    }

    public function get_lengkap_excel()
    {
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '1');
        $this->db->where('s_lulus_adm', '1');
        $this->db->where('s_cetak', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query;
    }
    
}
