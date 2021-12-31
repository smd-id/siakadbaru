<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujianlisan extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
    }

	public function index()
	{
        check_akses();
		$data = [
			'title' => "Ujian Lisan / Wawancara",
			'content' => "Psb/Ujian/lisan",
			'costum_js' => "Psb/Ujian/js-lisan",
		];
		
		echo $this->template->views($data);
	}

    public function get($no_ujian)
    {
        if ($this->input->is_ajax_request() == true) {
            $output = $this->M_Peserta->get_detail();
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function update($id)
    {
        if ($this->input->is_ajax_request() == true) {
            $this->M_Peserta->update($id, $this->input->post());
            echo json_encode(array("status" => true));
        } else {
            exit('Maaf tidak di izinkan melakukan aksi');
        }
    }
}