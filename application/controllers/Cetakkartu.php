<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cetakkartu extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
    }

	public function index()
	{
        check_akses();

        if ($this->input->post() == TRUE){
            $nik = $this->input->post('nik');
            $join    = $this->M_Peserta->get_file($nik);
            $this->do_cetak($join);

        } else {
            $data = [
                'title' => "Cetak Kartu",
                'content' => "Psb/Cetak/kartu",
            ];
            
            echo $this->template->views($data);
        }
	}

    private function do_cetak($join)
    {
        $this->load->library('Pdf');
        $data = [
            'title'         => 'Berkas PSB',
            'assetsurl'     => psb_url('assets/'),
            'filesurl'      => cdn_file('uploads/'),
            'output'        => $join->row(),
            'ketua_panitia' => psb_detail('ketua_panitia_psb'),
        ];
        $this->load->view('Psb/Cetak/kartupdf', $data);
    }

}