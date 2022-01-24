<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetakabsensi extends CI_Controller
{
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
            'title'         => 'Cetak Absensi',
            'content'       => 'Psb/Cetak/index',
            'costum_js'     => '',
            'jadwal_ujian'  => $this->M_Peserta->getalljadwal()->result(),
            'ruang_cat'     => $this->M_Peserta->getruangcat()->result(),
            'sesi_cat'      => $this->M_Peserta->getsesicat()->result(),
            'ruang_lisan'   => $this->M_Peserta->getruanglisan()->result(),
            'sesi_lisan'    => $this->M_Peserta->getsesilisan()->result(),
             
        ];
        echo $this->template->views($data);
    }

    public function cat()
    {
        if ($this->input->post() == TRUE){
            $jadwal = $this->input->post('jadwal_ujian');
            $ruang = $this->input->post('ruang_cat');
            $sesi = $this->input->post('sesi_cat');

            $data ['title'] = 'Cetak Absensi Cat';
            $data ['result'] = $this->M_Peserta->getcatby($jadwal, $ruang, $sesi)->result();
            $data ['jadwal'] = $jadwal;
            $data ['ruang'] = $ruang;
            $data ['sesi'] = $sesi;
                    
            $this->load->view('Psb/Cetak/print-cat', $data);

        } else {
            redirect('cetakabsensi');
        }
    }

    public function lisan()
    {
        if ($this->input->post() == TRUE){
            $jadwal = $this->input->post('jadwal_ujian');
            $ruang = $this->input->post('ruang_lisan');
            $sesi = $this->input->post('sesi_lisan');

            $data ['title'] = 'Cetak Absensi Lisan';
            $data ['result'] = $this->M_Peserta->getlisanby($jadwal, $ruang, $sesi)->result();
            $data ['jadwal'] = $jadwal;
            $data ['ruang'] = $ruang;
            $data ['sesi'] = $sesi;
                    
            $this->load->view('Psb/Cetak/print-lisan', $data);

        } else {
            redirect('cetakabsensi');
        }
    }
}
