<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasipsb extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		check_login();
		
		$this->load->model('M_Konfirmasi');
		$this->load->model('M_Chat');
    }

	public function index()
	{
		check_akses();
		$data = [
			'title' => "Konfirmasi Pembayaran PSB",
			'content' => "Psb/Konfirmasi/index",
			'costum_js' => "Psb/Konfirmasi/js"
		];
		
		echo $this->template->views($data);
	}

	public function data()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_Konfirmasi->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key) {

                $no++;
                $file = $this->M_Konfirmasi->get_file($key->nik)->row();
                $row = array();
                $row[] = $no;
                $row[] = $key->nama;
                $row[] = $key->no_telepon;
                $row[] = $key->nik;
                $row[] = '<a class="btn btn-xs btn-primary" onclick="viewFile(' ."'" . $file->struk."'" . ')"><i class="fas fa-eye"></i> Show File</a>';
                $row[] = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Konfirmasi" onclick="konfirmasi(' . "'" . $key->id . "'" . ')"><i class="fas fa-check"></i> Konfirmasi</a>
                <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Reject" onclick="reject(' . "'" . $key->id . "'" . ')"><i class="fas fa-times"></i> Reject</a>';

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_Konfirmasi->count_all(),
                "recordsFiltered" => $this->M_Konfirmasi->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function ajax_confirm($id)
    {
        if ($this->input->is_ajax_request()) {

            $get = $this->M_Konfirmasi->get($id);
            $pesan = "Terima Kasih, Pembayaran anda berhasil kami konfirmasi. silahkan lanjutkan login kembali dan mengisi biodata, mengupload file berkas, serta mencetak kartu ujian. Terima Kasih";
            $data = [
                's_payment' => '1',
            ];
            $chat = [
                'no_telepon'        => $get->no_telepon,
                'pesan'             => $pesan,
                'type'              => 'Text',
                'status_proses'     => 'pending',
            ];
            $update = $this->M_Konfirmasi->update($id, $data);
            $send = $this->M_Chat->insert($chat);

            if ($update && $send){
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => false));
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }

    }

    public function ajax_reject($id)
    {
        if ($this->input->is_ajax_request()) {
            $get = $this->M_Konfirmasi->get($id);
            $pesan = "Mohon Maaf.. Pembayaran anda gagal kami konfirmasi. mohon hubungi kami untuk info lebih lanjut";
            $data = [
                's_payment' => '2',
            ];
            $chat = [
                'no_telepon'        => $get->no_telepon,
                'pesan'             => $pesan,
                'type'              => 'Text',
                'status_proses'     => 'pending',
            ];
            $update = $this->M_Konfirmasi->update($id, $data);
            $send = $this->M_Chat->insert($chat);

            if ($update && $send){
                echo json_encode(array("status" => true));
            } else {
                echo json_encode(array("status" => false));
            }
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

}