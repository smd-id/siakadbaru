<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berkas extends CI_Model
{

    // START DATATABLE QUERY
    public $table = 'peserta_psb';
    public $column_order = array(null, 'nik', 'nama', 'no_telepon', 'status'); //set column field database for datatable orderable
    public $column_search = array('nik', 'nama', 'no_telepon'); //set column field database for datatable searchable
    public $order = array('kabupaten' => 'asc'); // default order

    private function _get_datatables_query($kab)
    {

        $this->db->from($this->table);
        $this->db->where('jalur', 'undangan');
        $this->db->where('s_payment', '1');
        $this->db->where('s_biodata', '1');
        $this->db->where('s_file', '0');
        $this->db->where('s_cetak', '0');
        $this->db->where('s_lulus_adm', '0');
        $this->db->where('s_lulus', '0');
        $this->db->where('kabupaten', $kab);
        

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }

            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($kab)
    {
        $this->_get_datatables_query($kab);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($kab)
    {
        $this->_get_datatables_query($kab);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // END OF DATATABLE QUERY


    public function get_count_kab()
    {

        $query = $this->db
            ->select("kabupaten, count(*) AS total", false)
            ->from ($this->table)
            ->where('jalur', 'undangan')
            ->where('s_payment', '1')
            ->where('s_biodata', '1')
            ->where('s_file', '1')
            ->where('s_cetak', '0')
            ->where('s_lulus_adm', '0')
            ->where('s_lulus', '0')
            ->group_by("kabupaten")
            ->order_by("total","DESC")
            ->get();

        return $query->result();
    }

    public function get($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function update($nik, $data)
    {
        $this->db->where('nik', $nik);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
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
    
}
