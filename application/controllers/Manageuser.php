<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manageuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->session->keep_flashdata('message');
        $this->load->model('M_Users');
        $this->load->model('M_Role');
    }
    
    public function index()
    {
        check_akses();
        $data = [
            'title' => 'User List',
            'content' => 'Administrator/manageuser/index',
            'costum_js' => 'Administrator/manageuser/js-datatable',
        ];
        echo $this->template->views($data);
        
    }

    public function data()
    {
        if ($this->input->is_ajax_request() == true) {
            $list = $this->M_Users->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $key) {

                $no++;
                // Condition Status
                if ($key->status == 1) {
                    $status = '<i class="fas fa-check"></i>';
                } else {
                    $status = '<i class="fas fa-times"></i>';
                }
                
                // Condition Status Search
                if ($key->role_id == 1) {
                    $show_btn = 'd-none';
                } else {
                    $show_btn = '';
                }

                $role = $this->M_Role->get_by_id($key->role_id);
                $row = array();
                $row[] = $no;
                $row[] = $key->name;
                $row[] = $key->username;
                $row[] = $key->whatsapp;
                $row[] = $key->nik;
                $row[] = $key->email;
                $row[] = $key->izin_psb;
                $row[] = '<span class="badge bg-' . $role['role_color'] . '">' . $role['role_name'] . '</span>';
                $row[] = $status;
                $row[] = '<a class="btn btn-xs btn-primary '.$show_btn.'" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $key->id . "'" . ')"><i class="fas fa-pen"></i></a>
                  <a class="btn btn-xs btn-danger '.$show_btn.'" href="javascript:void(0)" title="Hapus" onclick="delete_data(' . "'" . $key->id . "'" . ')"><i class="fas fa-trash"></i></a>';

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->M_Users->count_all(),
                "recordsFiltered" => $this->M_Users->count_filtered(),
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
        $data = $this->M_Users->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = [
            'username'  => $this->input->post('username'),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'name'      => $this->input->post('name'),
            'role_id'   => $this->input->post('role_id'),
            'nik'   => $this->input->post('nik'),
            'email'   => $this->input->post('email'),
            'whatsapp'  => $this->input->post('whatsapp'),
            'izin_psb'   => $this->input->post('izin_psb'),
            'status'    => $this->input->post('status'),
            'profile_picture' => 'default.png',
        ];
        $insert = $this->M_Users->insert($data);
        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        if ($this->input->post('password') !== ""){
            $data = [
                'username'  => $this->input->post('username'),
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'name'      => $this->input->post('name'),
                'role_id'   => $this->input->post('role_id'),
                'nik'   => $this->input->post('nik'),
                'email'   => $this->input->post('email'),
                'whatsapp'  => $this->input->post('whatsapp'),
                'izin_psb'  => $this->input->post('izin_psb'),
                'status'    => $this->input->post('status'),
                'profile_picture' => 'default.png',
            ];
        } else {
            $data = [
                'username'  => $this->input->post('username'),
                'name'      => $this->input->post('name'),
                'role_id'   => $this->input->post('role_id'),
                'nik'   => $this->input->post('nik'),
                'email'   => $this->input->post('email'),
                'whatsapp'  => $this->input->post('whatsapp'),
                'izin_psb'  => $this->input->post('izin_psb'),
                'status'    => $this->input->post('status'),
                'profile_picture' => 'default.png',
            ];
        }
        $this->M_Users->update($this->input->post('id'), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        $this->M_Users->delete_by_id($id);
        echo json_encode(array("status" => true));
    }
}
