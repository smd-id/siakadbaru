<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpass extends CI_Controller {

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
			'title' => "Reset Password Peserta",
			'content' => "Psb/Reset/index",
			'costum_js' => "Psb/Reset/js-edit"
		];
		
		echo $this->template->views($data);
	}

    public function get($by, $val)
    {
        if ($this->input->is_ajax_request() == true) {

            $get = $this->M_Peserta->get_by($by, $val);            

            $data = [
                'id'                    => $get->id,
                'nik'                   => $get->nik,         
                'nama'                  => $get->nama,         
                
            ];
            echo json_encode($data);

        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->input->post('id');
            
            $data = [
                'password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
            ];

            $this->M_Peserta->update($id, $data);
            echo json_encode(array("status" => true));
        } else {
            exit('Maaf tidak di izinkan melakukan aksi');
        }
    }

}