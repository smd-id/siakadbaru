<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksiberkas extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		check_login();
		
		$this->load->model('M_Berkas');
    }

	public function index()
	{
		check_akses();
		$data = [
			'title'         => "Seleksi Berkas Undangan",
			'content'       => "Psb/Seleksi/index",
			'costum_js'     => "Psb/Seleksi/js",
            'siswa_from'    => $this->M_Berkas->get_count_kab()
		];
		
		echo $this->template->views($data);
	}

    public function detail($kab)
    {
        $data = [
			'title'             => "Seleksi Berkas - ".what_kabupaten($kab),
			'content'           => "Psb/Seleksi/detail",
			'costum_js'         => "Psb/Seleksi/js",
            'nama_kabupaten'    => what_kabupaten($kab),
            'id_kabupaten'      => $kab
		];
		
		echo $this->template->views($data);
    }

    public function data($kab)
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_Berkas->get_datatables($kab);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key) {

                $no++;
                
                $row = array();
                $row[] = $no;
                $row[] = $key->nik;
                $row[] = $key->nama;
                $row[] = jurusan_singkat($key->minat);
                $row[] = $key->no_telepon;
                $row[] = $key->asal_sekolah;
                $row[] = what_akademik($key->s_akademik);
                $row[] = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Lihat Biodata" onclick="show_biodata(' . "'" . $key->nik . "'" . ')"><i class="fas fa-eye"></i> Biodata</a>
                        <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Lihat File" onclick="show_file(' . "'" . $key->nik . "'" . ')"><i class="fas fa-eye"></i> File</a>';
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_Berkas->count_all(),
                "recordsFiltered" => $this->M_Berkas->count_filtered($kab),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function ajax_confirm($nik)
    {
        if ($this->input->is_ajax_request()) {

            $get = $this->M_Berkas->get($nik);
            $data = [
                's_lulus_adm' => '1',
            ];
            
            $update = $this->M_Berkas->update($nik, $data);

            if ($update){
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => false));
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }

    }
    
    public function ajax_get($nik)
    {
        if ($this->input->is_ajax_request() == true) {
            $get = $this->M_Berkas->get_file($nik)->row();

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

    public function createzip($nik)
    {
        $get = $this->M_Berkas->get_file($nik)->row();

        $file = [
            'pasphoto'.'/'.$get->pasphoto,
            'raport_1'.'/'.$get->raport_1,  
            'raport_2'.'/'.$get->raport_2,  
            'raport_3'.'/'.$get->raport_3,  
            'raport_4'.'/'.$get->raport_4,
            'sk'.'/'.$get->sk,
            'surat_pernyataan'.'/'.$get->surat_pernyataan,
            'surat_kesanggupan'.'/'.$get->surat_kesanggupan,
            'formulir_kepsek'.'/'.$get->formulir_kepsek,
            'sertifikat_1'.'/'.$get->sertifikat_1,
            'sertifikat_2'.'/'.$get->sertifikat_2,
            'sertifikat_3'.'/'.$get->sertifikat_3,
            'sertifikat_4'.'/'.$get->sertifikat_4,
            'sertifikat_5'.'/'.$get->sertifikat_5,
        ];
        
        foreach ($file as $key) {
            $path = psb_url('uploads/').$key;
            $new_path = $key;
            $this->zip->read_file($path);
            
            $this->zip->download('Berkas Santri-'.$nik.'.zip');
        }
    }

}