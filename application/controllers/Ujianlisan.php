<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ujianlisan extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
        $this->load->model('M_Wawancarapsb');
    }

	public function index()
	{
        check_akses();
		$data = [
			'title' => "Ujian Lisan / Wawancara",
			'content' => "Psb/Ujian/index",
		];
		
		echo $this->template->views($data);
	}

	public function bacaan()
	{
		$data = [
			'title' => "Wawancara Bacaan Al-Quran",
			'content' => "Psb/Ujian/bacaan",
			'costum_js' => "Psb/Ujian/js-bacaan",
		];
		
		echo $this->template->views($data);
	}

	public function ibadah()
	{
		$data = [
			'title' => "Wawancara Praktik Ibadah",
			'content' => "Psb/Ujian/ibadah",
			'costum_js' => "Psb/Ujian/js-ibadah",
		];
		
		echo $this->template->views($data);
	}

	public function interview()
	{
		$data = [
			'title' => "Wawancara Interview",
			'content' => "Psb/Ujian/interview",
			'costum_js' => "Psb/Ujian/js-interview",
		];
		
		echo $this->template->views($data);
	}

    public function get($by, $val)
    {
        if ($this->input->is_ajax_request() == true) {

            $get = $this->M_Peserta->get_by($by, $val);

            $check = $this->M_Wawancarapsb->get_by_nik($get->nik);

            $data = [
                'nama'                  => $get->nama,
                'jurusan'               => jurusan($get->jurusan),
                'jurusan_display'       => jurusan($get->jurusan),
                'nik_display'           => $get->nik,
                'nik'                   => $get->nik,
                'asal_sekolah'          => $get->asal_sekolah,
                'kabupaten'             => what_kabupaten($get->kabupaten),
                'provinsi'              => what_provinsi($get->provinsi),
                'jenis_kelamin'         => jenis_kelamin($get->jenis_kelamin),
                'hobi'                  => $get->hobi,
                'cita_cita_display1'    => $get->cita_cita,
                'cita_cita_display2'    => "Di Biodata : ".$get->cita_cita,
                'prestasi_1'            => $get->prestasi_1,
                'prestasi_2'            => $get->prestasi_2,
                'prestasi_3'            => $get->prestasi_3,
                'prestasi_4'            => $get->prestasi_4,
                'prestasi_5'            => $get->prestasi_5,
                's_step_1'              => $check->step_1,
                's_step_2'              => $check->step_2,
                's_step_3'              => $check->step_3,
                
            ];
            echo json_encode($data);

        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->M_Wawancarapsb->update_by_nik($this->input->post('nik'), $this->input->post());
            echo json_encode(array("status" => true));
        } else {
            exit('Maaf tidak di izinkan melakukan aksi');
        }
    }


    // REPORT
    public function excel()
    {
        
        $data = [
			'title' => "Ujian Lisan / Wawancara",
            'result'  =>  $this->M_Wawancarapsb->get_done()->result()
		];
        $this->load->view('Psb/Ujian/excel', $data);
    }

    public function view()
    {
        
        $data = [
			'title' => "Ujian Lisan / Wawancara",
            'result'  =>  $this->M_Wawancarapsb->get_done()->result()
		];
        $this->load->view('Psb/Ujian/excel-view', $data);
    }
}