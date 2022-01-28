<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editbiodata extends CI_Controller {

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
			'title' => "Edit Biodata",
			'content' => "Psb/Biodata/edit",
			'costum_js' => "Psb/Biodata/js-edit"
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
                'no_telepon'            => $get->no_telepon,            
                'email'                 => $get->email,            
                'nama'                  => $get->nama,            
                'nisn'                  => $get->nisn,            
                'tempat_lahir'          => $get->tempat_lahir,            
                'tanggal_lahir'         => $get->tanggal_lahir,            
                'jenis_kelamin'         => $get->jenis_kelamin,            
                'anak_ke'               => $get->anak_ke,            
                'dari_saudara'          => $get->dari_saudara,            
                'hobi'                  => $get->hobi,            
                'cita_cita'             => $get->cita_cita,            
                'alamat'                => $get->alamat,            
                'kode_pos'              => $get->kode_pos,            
                'asal_sekolah'          => $get->asal_sekolah,            
                'npsn_sekolah_asal'     => $get->npsn_sekolah_asal,            
                'jenis_sekolah_asal'    => $get->jenis_sekolah_asal,            
                'alamat_sekolah_asal'   => $get->alamat_sekolah_asal,            
                'tahun_lulus'           => $get->tahun_lulus,            
                'status_ayah'           => $get->status_ayah,            
                'nama_ayah'             => $get->nama_ayah,            
                'pekerjaan_ayah'        => $get->pekerjaan_ayah,            
                'penghasilan_ayah'      => $get->penghasilan_ayah,            
                'pendidikan_ayah'       => $get->pendidikan_ayah,            
                'no_telepon_ayah'       => $get->no_telepon_ayah,            
                'status_ibu'            => $get->status_ibu,            
                'nama_ibu'              => $get->nama_ibu,            
                'pekerjaan_ibu'         => $get->pekerjaan_ibu,            
                'penghasilan_ibu'       => $get->penghasilan_ibu,            
                'pendidikan_ibu'        => $get->pendidikan_ibu,            
                'no_telepon_ibu'        => $get->no_telepon_ibu,            
                'nama_wali'             => $get->nama_wali,            
                'no_telepon_wali'       => $get->no_telepon_wali,            
                'status_wali'           => $get->status_wali,            
                'prestasi_1'            => $get->prestasi_1,            
                'prestasi_2'            => $get->prestasi_2,            
                'prestasi_3'            => $get->prestasi_3,            
                'prestasi_4'            => $get->prestasi_4,            
                'prestasi_5'            => $get->prestasi_5            
                
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
            $this->M_Peserta->update($id, $this->input->post());
            echo json_encode(array("status" => true));
        } else {
            exit('Maaf tidak di izinkan melakukan aksi');
        }
    }

}