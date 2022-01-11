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

            // Array For Per Tanggal Ujian
            $jadwal = arr_jadwal_reguler();

            foreach ($jadwal as $key){
                $ujian = $this->M_Peserta->count_by_jadwal($key)->result();
                if(!empty($ujian)){
                    foreach ($ujian as $key3) {
                        $detail_jadwal []= [
                            "tanggal"	    => date_indo($key3->jadwal_ujian),                        
                            "total_peserta"	=> $key3->top
                        ];
                    }
                } else {
                    $detail_jadwal = FALSE;
                }
            }

            $data = [
                'total_undangan'            => $this->M_Peserta->count_by_jalur('undangan')." Orang",
                'total_reguler'             => $this->M_Peserta->count_by_jalur('reguler')." Orang",
                'total_mohon_konfirmasi'    => $this->M_Konfirmasi->count_mohon_konfirmasi()." Orang",
                'total_dana_terkumpul'      => rupiah(psb_detail('biaya_psb') * $this->M_Peserta->count_by_jalur('reguler')),
                'total_lulus_adm'           => $this->M_Peserta->count_lulus_adm()." Orang",
                'total_lulus_undangan'      => $this->M_Peserta->count_lulus_undangan()." Orang",
                'total_lulus_reguler'       => $this->M_Peserta->count_lulus_reguler()." Orang",                
                'ipa_lk_udg'                => $this->M_Peserta->count_udg_keljur('L', 'A')." Orang",
                'ipa_pr_udg'                => $this->M_Peserta->count_udg_keljur('P', 'A')." Orang",
                'mak_lk_udg'                => $this->M_Peserta->count_udg_keljur('L', 'G')." Orang",
                'mak_pr_udg'                => $this->M_Peserta->count_udg_keljur('P', 'G')." Orang",
                'offline_udg'               => $this->M_Peserta->count_udg_ujianvia('offline')." Orang",
                'online_udg'                => $this->M_Peserta->count_udg_ujianvia('online')." Orang",
                'ipa_lk_reg'                => $this->M_Peserta->count_reg_keljur('L', 'A')." Orang",
                'ipa_pr_reg'                => $this->M_Peserta->count_reg_keljur('P', 'A')." Orang",
                'mak_lk_reg'                => $this->M_Peserta->count_reg_keljur('L', 'G')." Orang",
                'mak_pr_reg'                => $this->M_Peserta->count_reg_keljur('P', 'G')." Orang",
                'udg_to_reg'                => $this->M_Peserta->count_move_jalur()." Orang",
            ];

            $chart_undangan = $this->M_Peserta->count_all_kab('undangan');
            $chart_reguler = $this->M_Peserta->count_all_kab('reguler');
            $undangan = [];
            foreach ($chart_undangan as $key) {
                $prov = substr($key->kabupaten, 0,2);
                $undangan []= [
                    'kode'  => $key->kabupaten,
                    'nama'  => what_kabupaten($key->kabupaten)." - ".what_provinsi($prov),
                    'total'  => $key->total,
                    'rgb'   => bm_random_rgb()
                ];
            }
            $reguler = [];
            foreach ($chart_reguler as $key) {
                $prov = substr($key->kabupaten, 0,2);
                $reguler []= [
                    'kode'  => $key->kabupaten,
                    'nama'  => what_kabupaten($key->kabupaten)." - ".what_provinsi($prov),
                    'total'  => $key->total,
                    'rgb'   => bm_random_rgb()
                ];
            }

            echo json_encode(array("status" => true, 
                                    "result" => $data, 
                                    "chart_undangan" => $undangan, 
                                    "chart_reguler" => $reguler,
                                    "detail_jadwal" => $detail_jadwal
                                ));
        } else {
            exit('Maaf data tidak bisa di tampilkan');
        }
    }
}