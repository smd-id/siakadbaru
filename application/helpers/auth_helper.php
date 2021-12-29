<?php 

function check_akses()
{
    $ci = &get_instance();
    $id = $ci->session->userdata('id');

    $method = $ci->uri->segment(1);
    // Get ALL Subemenu ID
    $izin_menu = $ci->db->get_where('menu', ['url' => $method])->row();

    $submenu = explode(',', $izin_menu->permited_to);
    if (in_array($id, $submenu) == false) {
        $ci->session->set_flashdata([
            'msg' => 'Tidak ada izin akses menu',
            'type' => 'warning'
        ]);
        redirect('home');
    }
}

function check_login()
{
    $ci = &get_instance();
    if (!$ci->session->has_userdata('id')) {
        $ci->session->set_flashdata([
            'msg' => 'Anda Belum Login, Silahkan login kembali',
            'type' => 'info'
        ]);
        redirect('auth');
    }
}

function check_izin_psb()
{
    $ci = &get_instance();
    $id = $ci->session->userdata('id');

    $izin = $ci->db->get_where('users', ['id' => $id])->row();

    if ($izin->izin_psb == 'admin' OR $izin->izin_psb == 'moderator'){
        return TRUE;
    } else {
        return FALSE;
    }
}
?>