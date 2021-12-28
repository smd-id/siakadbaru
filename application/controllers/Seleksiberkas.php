<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksiberkas extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		check_login();
		
		$this->load->model('M_Berkas');
    }

	public function index()
	{
		check_akses();
		$data = [
			'title'         => "Seleksi Berkas Undangan",
			'content'       => "Psb/Seleksi/index",
			'costum_js'     => "Psb/Seleksi/js",
            'siswa_from'    => $this->M_Berkas->get_count_kab()
		];
		
		echo $this->template->views($data);
	}

    public function detail($kab)
    {
        $data = [
			'title'             => "Seleksi Berkas - ".what_kabupaten($kab),
			'content'           => "Psb/Seleksi/detail",
			'costum_js'         => "Psb/Seleksi/js",
            'nama_kabupaten'    => what_kabupaten($kab),
            'id_kabupaten'      => $kab
		];
		
		echo $this->template->views($data);
    }

    public function data($kab)
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_Berkas->get_datatables($kab);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key) {

                $no++;
                
                
                $row = array();
                $row[] = $no;
                $row[] = $key->nik;
                $row[] = $key->nama;
                $row[] = what_jurusan($key->minat);
                $row[] = $key->no_telepon;
                $row[] = $key->asal_sekolah;
                $row[] = what_akademik($key->s_akademik);
                $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Lihat File" onclick="show_file(' . "'" . $key->nik . "'" . ')"><i class="fas fa-eye"></i> Lihat File</a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_Berkas->count_all(),
                "recordsFiltered" => $this->M_Berkas->count_filtered($kab),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function ajax_confirm($nik)
    {
        if ($this->input->is_ajax_request()) {

            $get = $this->M_Berkas->get($nik);
            $data = [
                's_lulus_adm' => '1',
            ];
            
            $update = $this->M_Berkas->update($nik, $data);

            if ($update){
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => false));
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }

    }
    
    public function ajax_get($nik)
    {
        if ($this->input->is_ajax_request()) {
            $get = $this->M_Berkas->get_file($nik)->row();
            
            echo json_encode(array("status" => false, 'result' => $get));
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

}