<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarulang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_Daftarulang');
    }   
    
    public function index()
    {
        check_akses();
        $data = [
            'title'         => 'List Peserta',
            'content'       => 'Psb/Daftarulang/index',
            'costum_js'     => 'Psb/Daftarulang/js',
            'result'        =>  $this->M_Daftarulang->get_all()->result()
             
        ];
        echo $this->template->views($data);
    }
}
