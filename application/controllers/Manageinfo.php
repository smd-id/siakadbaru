<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manageinfo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_Info');
    }
    
    public function index()
    {
        check_akses();
        $data = [
            'title' => 'Informasi Dealer',
            'content' => 'Administrator/manageinfo/index',
            'costum_js' => 'Administrator/manageinfo/js-info',
        ];
        echo $this->template->views($data);
    }

    public function data()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_Info->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key) {

                $no++;

                $row = array();
                $row[] = $no;
                $row[] = $key->title;
                $row[] = $key->information;
                $row[] = $key->updated_at;
                $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $key->id . "'" . ')"><i class="fas fa-pen"></i></a>
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data(' . "'" . $key->id . "'" . ')"><i class="fas fa-trash"></i></a>';

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_Info->count_all(),
                "recordsFiltered" => $this->M_Info->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->M_Info->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $insert = $this->M_Info->insert($this->input->post());
        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->M_Info->update($this->input->post('id'), $this->input->post());
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        $this->M_Info->delete_by_id($id);
        echo json_encode(array("status" => true));
    }
}
