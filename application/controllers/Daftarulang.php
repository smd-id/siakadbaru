<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarulang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_Daftarulang');
        $this->load->model('M_Peserta');
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

    public function verifikasi($nik)
    {
        $data = [
            's_daftar_ulang' => "2"
        ];
        $payload = $this->M_Peserta->update_by_nik($nik, $data);
        if ($payload){
            $this->session->set_flashdata([
                'msg' => 'Berhasil Verifikasi NIK : '.$nik,
                'type' => 'success'
            ]);
        
            redirect('daftarulang');
        }

    }
}
