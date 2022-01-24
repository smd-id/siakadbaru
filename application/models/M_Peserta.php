<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Peserta extends CI_Model
{

    // START DATATABLE QUERY
    public $table = 'peserta_psb';
    public $column_order = array(null, 'nik', 'tangga_daftar', 'jurusan', 'status'); //set column field database for datatable orderable
    public $column_search = array('nik', 'nama', 'no_telepon'); //set column field database for datatable searchable
    public $order = array('id' => 'asc'); // default order

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

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

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // END OF DATATABLE QUERY

    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function update($id, $data)
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


    // COUNTER
    public function count_by_jalur($where)
    {
        $this->db->where('jalur', $where);
        $this->db->where('s_payment', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_lulus_adm()
    {
        $this->db->where('jalur_awal', 'undangan');        
        $this->db->where('s_lulus_adm', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_lulus_undangan()
    {
        $this->db->where('jalur', 'undangan');        
        $this->db->where('s_lulus', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_lulus_reguler()
    {
        $this->db->where('jalur', 'reguler');        
        $this->db->where('s_lulus', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
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

    public function count_udg_keljur($jk, $jurusan)
    {
        $this->db->where('jalur_awal', 'undangan');
        $this->db->where('jenis_kelamin', $jk);
        $this->db->where('minat', $jurusan);
        $this->db->where('s_payment', '1');        
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_udg_ujianvia($via)
    {
        $this->db->where('jalur_awal', 'undangan');
        $this->db->where('ujian_via', $via);
        $this->db->where('s_payment', '1');        
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_reg_keljur($jk, $jurusan)
    {
        $this->db->where('jalur_awal', 'reguler');
        $this->db->where('jenis_kelamin', $jk);
        $this->db->where('jurusan', $jurusan);
        $this->db->where('s_payment', '1');        
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_move_jalur()
    {
        $this->db->where('jalur_awal', 'undangan');
        $this->db->where('jalur', 'reguler');
        $this->db->where('s_payment', '1');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function get_by($by, $val)
    {
        $this->db->where($by, $val);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }

    public function count_by_jadwal($tanggal)
    {
        $query = $this->db
        ->select("jadwal_ujian, count(*) AS top",false)
        ->from ($this->table)
        ->where("jadwal_ujian",$tanggal)
        ->where("jalur_awal", 'reguler')
        ->where("s_payment", '1')        
        ->where("s_cetak", '1')
        ->group_by("jadwal_ujian")
        ->order_by("top","DESC")
        ->get();

        return $query;
    }
    
    public function getalljadwal()
    {
        $query = $this->db->select('jadwal_ujian')
                ->distinct('jadwal_ujian')
                ->from($this->table)
                ->where("jalur_awal", 'reguler')
                ->where("s_payment", '1')        
                ->where("s_cetak", '1')
                ->get(); 

        return $query;
    }

    public function getruangcat()
    {
        $query = $this->db->select('ruang_cat')
                ->distinct('ruang_cat')
                ->from($this->table)
                ->where("jalur_awal", 'reguler')
                ->where("s_payment", '1')        
                ->where("s_cetak", '1')
                ->get(); 

        return $query;
    }

    public function getsesicat()
    {
        $query = $this->db->select('sesi_cat')
                ->distinct('sesi_cat')
                ->from($this->table)
                ->where("jalur_awal", 'reguler')
                ->where("s_payment", '1')        
                ->where("s_cetak", '1')
                ->order_by("sesi_cat", 'ASC')
                ->get(); 

        return $query;
    }

    public function getruanglisan()
    {
        $query = $this->db->select('ruang_lisan')
                ->distinct('ruang_lisan')
                ->from($this->table)
                ->where("jalur_awal", 'reguler')
                ->where("s_payment", '1')        
                ->where("s_cetak", '1')
                ->order_by("ruang_lisan", 'ASC')
                ->get(); 

        return $query;
    }

    public function getsesilisan()
    {
        $query = $this->db->select('sesi_lisan')
                ->distinct('sesi_lisan')
                ->from($this->table)
                ->where("jalur_awal", 'reguler')
                ->where("s_payment", '1')        
                ->where("s_cetak", '1')
                ->order_by("sesi_lisan", 'ASC')
                ->get(); 

        return $query;
    }

    public function getcatby($jadwal, $ruang, $sesi)
    {
        $this->db->where('jadwal_ujian', $jadwal);
        $this->db->where('ruang_cat', $ruang);
        $this->db->where('sesi_cat', $sesi);
        $this->db->from($this->table);

        return $this->db->get();
    }
    
    public function getlisanby($jadwal, $ruang, $sesi)
    {
        $this->db->where('jadwal_ujian', $jadwal);
        $this->db->where('ruang_lisan', $ruang);
        $this->db->where('sesi_lisan', $sesi);
        $this->db->from($this->table);

        return $this->db->get();
    }
}
