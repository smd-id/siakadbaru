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
                $row[] = $key->no_telepon;
                $row[] = $key->asal_sekolah;
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
            $pesan = "Alhamdulillah, Anda di";
            $data = [
                's_lulus_adm' => '1',
            ];
            $chat = [
                'no_telepon'        => $get->no_telepon,
                'pesan'             => $pesan,
                'type'              => 'Text',
                'status_proses'     => 'pending',
            ];
            $update = $this->M_Berkas->update($nik, $data);
            $send = $this->M_Chat->insert($chat);

            if ($update && $send){
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => false));
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }

    }

    public function ajax_reject($nik)
    {
        if ($this->input->is_ajax_request()) {
            $get = $this->M_Berkas->get($nik);
            $pesan = "Mohon Maaf.. Pembayaran anda gagal kami konfirmasi. mohon hubungi kami untuk info lebih lanjut";
            $data = [
                's_payment' => '2',
            ];
            $chat = [
                'no_telepon'        => $get->no_telepon,
                'pesan'             => $pesan,
                'type'              => 'Text',
                'status_proses'     => 'pending',
            ];
            $update = $this->M_Berkas->update($nik, $data);
            $send = $this->M_Chat->insert($chat);

            if ($update && $send){
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