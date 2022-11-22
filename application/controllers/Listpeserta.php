<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listpeserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_Listpeserta');
        $this->load->model('M_Peserta');
        $this->load->model('M_Konfirmasi');
    }

    public function ajax_get($nik)
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Listpeserta->get_file($nik)->row();

            $file = [
                'pasphoto'                  => $get->pasphoto,
                'raport_1'                  => $get->raport_1,  
                'raport_2'                  => $get->raport_2,  
                'raport_3'                  => $get->raport_3,  
                'raport_4'                  => $get->raport_4,
                'sk'                        => $get->sk,
                'surat_pernyataan'          => $get->surat_pernyataan,
                'surat_kesanggupan'         => $get->surat_kesanggupan,
                'formulir_kepsek'           => $get->formulir_kepsek,
                'sertifikat_1'              => $get->sertifikat_1,
                'sertifikat_2'              => $get->sertifikat_2,
                'sertifikat_3'              => $get->sertifikat_3,
                'sertifikat_4'              => $get->sertifikat_4,
                'sertifikat_5'              => $get->sertifikat_5,
                'surat_sehat'               => $get->surat_sehat,
                'surat_tidakpindahjurusan'  => $get->surat_tidakpindahjurusan,
                'bpjs'                      => $get->bpjs,
                'kartu_nisn'                => $get->kartu_nisn,
                'kip'                       => $get->kip,
                'ktp_ayah'                  => $get->ktp_ayah,
                'ktp_ibu'                   => $get->ktp_ibu,
                'ktp_wali'                  => $get->ktp_wali,
                'kk'                        => $get->kk,
                'akte'                      => $get->akte,
            ];

            $data = [
                'checksum'                  => $get->checksum,
                'nik'                       => $get->nik,
                'minat'                     => jurusan($get->minat),
                'no_telepon'                => $get->no_telepon,
                'email'                     => $get->email,
                'nama'                      => $get->nama,
                'nisn'                      => $get->nisn,
                'tempat_lahir'              => $get->tempat_lahir,
                'tanggal_lahir'             => date_indo($get->tanggal_lahir),
                'jenis_kelamin'             => jenis_kelamin($get->jenis_kelamin),
                'anak_ke'                   => $get->anak_ke,
                'dari_saudara'              => $get->dari_saudara,
                'hobi'                      => $get->hobi,
                'cita_cita'                 => $get->cita_cita,
                'alamat'                    => $get->alamat,
                'desa'                      => what_desa($get->desa),
                'kecamatan'                 => what_kecamatan($get->kecamatan),
                'kabupaten'                 => what_kabupaten($get->kabupaten),
                'provinsi'                  => what_provinsi($get->provinsi),
                'kode_pos'                  => $get->kode_pos,
                'asal_sekolah'              => $get->asal_sekolah,
                'npsn_sekolah_asal'         => $get->npsn_sekolah_asal,
                'alamat_sekolah_asal'       => $get->alamat_sekolah_asal,
                'jenis_sekolah_asal'        => $get->jenis_sekolah_asal,
                'tahun_lulus'               => $get->tahun_lulus,
                'nama_ayah'                 => $get->nama_ayah,
                'pekerjaan_ayah'            => $get->pekerjaan_ayah,
                'penghasilan_ayah'          => $get->penghasilan_ayah,
                'pendidikan_ayah'           => $get->pendidikan_ayah,
                'no_telepon_ayah'           => $get->no_telepon_ayah,
                'status_ayah'               => what_status_ortu($get->status_ayah),
                'nama_ibu'                  => $get->nama_ibu,
                'pekerjaan_ibu'             => $get->pekerjaan_ibu,
                'penghasilan_ibu'           => $get->penghasilan_ibu,
                'pendidikan_ibu'            => $get->pendidikan_ibu,
                'no_telepon_ibu'            => $get->no_telepon_ibu,
                'status_ibu'                => what_status_ortu($get->status_ibu),
                'nama_wali'                 => $get->nama_wali,
                'no_telepon_wali'           => $get->no_telepon_wali,
                'status_wali'               => $get->status_wali,
                'prestasi_1'                => $get->prestasi_1,
                'prestasi_2'                => $get->prestasi_2,
                'prestasi_3'                => $get->prestasi_3,
                'prestasi_4'                => $get->prestasi_4,
                'prestasi_5'                => $get->prestasi_5,
            ];

            echo json_encode(array("result" => $data, "file" => $file));
        } else {
            exit('Error');
        }
    }
    
    public function index()
    {
        check_akses();
        $data = [
            'title'                         => 'List Peserta',
            'content'                       => 'Psb/Listpeserta/index',
            'costum_js'                     => 'Psb/Listpeserta/js',
            'total_mohon_konfirmasi'        => $this->M_Konfirmasi->count_mohon_konfirmasi(),
            'total_undangan'                => $this->M_Listpeserta->get_by_jalur('undangan')->num_rows(),
            'total_reguler'                 => $this->M_Listpeserta->get_by_jalur('reguler')->num_rows(),
            'total_lulus_adm'               => $this->M_Listpeserta->get_by_lulus_adm_undangan()->num_rows(),
            'total_lulus_reguler'           => $this->M_Listpeserta->get_lulus_by('reguler')->num_rows(),
            'total_lulus_undangan'          => $this->M_Listpeserta->get_lulus_by('undangan')->num_rows(),
            'total_siasia'                  => $this->M_Listpeserta->get_sia_sia()->num_rows(),
            'total_belum_cetak'             => $this->M_Listpeserta->get_belum_cetak()->num_rows(),            
        ];
        echo $this->template->views($data);
    }

    public function undangan()
    {
        $data = [
            'title'     => 'List Peserta Undangan',
            'content'   => 'Psb/Listpeserta/undangan',
            'costum_js' => 'Psb/Listpeserta/js',
            'result'    =>  $this->M_Listpeserta->get_by_jalur('undangan')->result()
        ];
        echo $this->template->views($data);
    }

    public function reguler()
    {
        $data = [
            'title'     => 'List Peserta Reguler',
            'content'   => 'Psb/Listpeserta/reguler',
            'costum_js' => 'Psb/Listpeserta/js',
            'result'    =>  $this->M_Listpeserta->get_by_jalur('reguler')->result()
        ];
        echo $this->template->views($data);
    }

    public function regulertoexcel()
    {
        $data = [
			'title' => "Report Excel",
            'result'  =>  $this->M_Listpeserta->get_lengkap_excel()->result()
		];
        $this->load->view('Psb/Listpeserta/excel-reguler', $data);
    }


    public function lulusadm()
    {
        $data = [
            'title'     => 'List Peserta Lulus ADM',
            'content'   => 'Psb/Listpeserta/lulusadm',
            'costum_js' => 'Psb/Listpeserta/js',
            'result'    =>  $this->M_Listpeserta->get_by_lulus_adm_undangan()->result()
        ];
        echo $this->template->views($data);
    }

    public function lulusundangan()
    {
        $data = [
            'title'     => 'List Peserta Lulus Undangan',
            'content'   => 'Psb/Listpeserta/lulusundangan',
            'costum_js' => 'Psb/Listpeserta/js',
            'result'    =>  $this->M_Listpeserta->get_lulus_by('undangan')->result()
        ];
        echo $this->template->views($data);
    }

    public function lulusreguler()
    {
        $data = [
            'title'     => 'List Peserta Lulus Reguler',
            'content'   => 'Psb/Listpeserta/lulusreguler',
            'costum_js' => 'Psb/Listpeserta/js',
            'result'    =>  $this->M_Listpeserta->get_lulus_by('reguler')->result()
        ];
        echo $this->template->views($data);
    }

    public function luluskan($nik)
    {
        $data = [
            's_lulus' => "1"
        ];
        $payload = $this->M_Peserta->update_by_nik($nik, $data);
        if ($payload){
            $this->session->set_flashdata([
                'msg' => 'Berhasil Meluluskan NIK : '.$nik,
                'type' => 'success'
            ]);
        
            redirect('listpeserta/lulusadm');
        }

    }

    public function siasia()
    {
        $data = [
            'title'     => 'Peserta Sia Sia',
            'content'   => 'Psb/Listpeserta/siasia',
            'costum_js' => 'Psb/Listpeserta/js',
            'result'    =>  $this->M_Listpeserta->get_sia_sia()->result()
        ];
        echo $this->template->views($data);
    }
}
