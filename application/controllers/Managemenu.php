<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managemenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('M_Menu');
    }

    public function index()
    {
        check_akses();
        $data = [
            'title' => 'Listing Menu',
            'content' => 'Administrator/managemenu/index',
            'costum_js' => 'Administrator/managemenu/js-menu',
            'menulist' => $this->M_Menu->getparent(),
        ];
        echo $this->template->views($data);
    }

    public function setakses($id = null)
    {
        $check = $this->M_Menu->get_by_id($id);
        if ($check->num_rows() > 0) {
            $payload = $this->M_Menu->get_by_id($id)->row();
            $data = [
                'title' => 'Set Akses Menu - ' . $payload->menu,
                'content' => 'Administrator/managemenu/akses',
                'id' => $id,
                'akses' => $this->M_Menu->get_by_id($id)->row(),
                'costum_js' => 'Administrator/managemenu/js-akses',
            ];
            echo $this->template->views($data);
        } else {
            show_404();
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->M_Menu->get_by_id($id)->row();
        echo json_encode($data);
    }

    public function ajax_add()
    {
        if ($this->input->post('menu_parent_id') == '') {
            $menu_parent_id = null;
        } else {
            $menu_parent_id = $this->input->post('menu_parent_id');
        }
        $data = [
            'menu' => $this->input->post('menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'menu_parent_id' => $menu_parent_id,
            'permited_to' => $this->session->userdata['id'],
            'status' => $this->input->post('status'),
        ];
        $insert = $this->M_Menu->insert($data);
        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        if ($this->input->post('menu_parent_id') == '') {
            $menu_parent_id = null;
        } else {
            $menu_parent_id = $this->input->post('menu_parent_id');
        }
        $data = [
            'menu' => $this->input->post('menu'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'status' => $this->input->post('status'),
        ];
        $this->M_Menu->update($this->input->post('id'), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_update_akses()
    {
        $data = [
            'permited_to' => $this->input->post('permited_to'),
        ];
        $this->M_Menu->update($this->input->post('id'), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        $this->M_Menu->delete($id);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete_akses($id)
    {
        $getlatest = $this->db->get_where('menu', ['id' => $id])->row();
        $x = explode(',', $getlatest->permited_to);

        $arr = array_diff($x, array($this->input->post('permited_to')));

        $y = implode(',', $arr);

        $data = [
            'permited_to' => $y,
        ];
        $this->M_Menu->update($id, $data);
        echo json_encode(array("status" => true));
    }

    public function getAjaxmenu()
    {
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');

            $menu = $this->M_Menu->getMenu();
            echo json_encode($menu);
        }
    }

    public function updatesequenceAjaxmenu()
    {
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            $input_data = $this->input->post('data');

            $no = 0;
            $seq_no = 0;
            foreach ($input_data as $data) {
                $id = $data['id'];
                $parent_id = isset($data['parent_id']) ? $data['parent_id'] : null;

                if ($parent_id != 0) {
                    $no++;
                } else {
                    $no = 0;
                    $seq_no++;
                }

                $sequence = $parent_id == 0 ? $seq_no : $parent_id . '.' . $no;

                $update_data = ['menu_parent_id' => $parent_id, 'menu_sequence' => $sequence];
                $where = ['id' => $id];
                $this->M_Menu->updateMenu($where, $update_data);
            }

            echo json_encode(['success' => true]);
            
        }
    }

}
