<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		check_login();
		$this->load->model('M_Info');
		
		$this->load->model('M_Users');
    }

	public function index()
	{
		$data = [
			'title' => "Beranda",
			'content' => "Home/index",
			'costum_js' => "Home/js-home"
		];
		
		echo $this->template->views($data);
	}

	public function getinfo()
	{
        $data = $this->M_Info->get_all();
        echo json_encode($data);
	}

	public function getstatusProfile()
	{
		$data = $this->M_Users->get_by_id($this->session->userdata['id']);
        echo json_encode($data);
	}

}