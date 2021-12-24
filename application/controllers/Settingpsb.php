<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingpsb extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Psbdetail');
    }

	public function index()
	{
        check_akses();
		$data = [
			'title' => "Setting Info PSB",
			'content' => "Psb/Setting/index",
			'costum_js' => "Psb/Setting/js",
		];
		
		echo $this->template->views($data);
	}

    public function data()
    {
        if ($this->input->is_ajax_request() == true) {
            $output = $this->M_Psbdetail->get_detail();
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request() == true) {
            $this->M_Psbdetail->update($this->input->post());
            echo json_encode(array("status" => true));
        } else {
            exit('Maaf tidak di izinkan melakukan aksi');
        }
    }
}