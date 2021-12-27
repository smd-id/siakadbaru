<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardpsb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_Peserta');
        $this->load->model('M_Konfirmasi');
    }
    
    public function index()
    {
        check_akses();
        $data = [
            'title' => 'Dashboard PSB',
            'content' => 'Psb/Dashboard/index',
            'costum_js' => 'Psb/Dashboard/js',
        ];
        echo $this->template->views($data);
    }

    public function home_data()
    {
        if ($this->input->is_ajax_request() == TRUE)
        {
            $data = [
                'total_undangan'            => $this->M_Peserta->count_by_jalur('undangan')." Orang",
                'total_reguler'             => $this->M_Peserta->count_by_jalur('reguler')." Orang",
                'total_mohon_konfirmasi'    => $this->M_Konfirmasi->count_mohon_konfirmasi()." Orang",
                'total_dana_terkumpul'      => rupiah(psb_detail('biaya_psb') * $this->M_Peserta->count_by_jalur('reguler'))
            ];

            $chart_undangan = $this->M_Peserta->count_all_kab('undangan');
            $chart_reguler = $this->M_Peserta->count_all_kab('reguler');
            $undangan = [];
            foreach ($chart_undangan as $key) {
               
                $undangan []= [
                    'kode'  => $key->kabupaten,
                    'nama'  => what_kabupaten($key->kabupaten),
                    'total'  => $key->total,
                    'rgb'   => bm_random_rgb()
                ];
            }
            $reguler = [];
            foreach ($chart_reguler as $key) {
                
                $reguler []= [
                    'kode'  => $key->kabupaten,
                    'nama'  => what_kabupaten($key->kabupaten),
                    'total'  => $key->total,
                    'rgb'   => bm_random_rgb()
                ];
            }

            echo json_encode(array("status" => true, 
                                    "result" => $data, 
                                    "chart_undangan" => $undangan, 
                                    "chart_reguler" => $reguler,
                                ));
        } else {
            exit('Maaf data tidak bisa di tampilkan');
        }
    }
}