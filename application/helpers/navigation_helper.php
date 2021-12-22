<?php 
function menu_listing()
{

    $ci = &get_instance();
    $id = $ci->session->userdata('id');

    $ci->db->order_by('menu_sequence', 'asc');
    $getmenu = $ci->db->get_where('menu', ['status' => '1', 'menu_parent_id' => null])->result();

    if (!empty($getmenu)) {
        foreach ($getmenu as $key) {
            $check_menu = explode(',', $key->permited_to);
            if (in_array($id, $check_menu) == true) {
                $ci->db->order_by('menu_sequence', 'asc');
                $submenu = $ci->db->get_where('menu', array('menu_parent_id' => $key->id, 'status' => '1'))->result();
                if ($submenu) {
                    echo '
                    <li class="nav-item has-treeview">
                        <a href="' . base_url('/') . $key->url . '" class="nav-link">
                            <i class="nav-icon ' . $key->icon . '"></i>
                            <p>
                                ' . $key->menu . '
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">';
                    foreach ($submenu as $sbm) {
                        $check_menu = explode(',', $sbm->permited_to);
                        if (in_array($id, $check_menu) == true) {
                            if ($ci->uri->segment(1) == $sbm->url) {
                                echo '
                                    <li class="nav-item pl-2">
                                        <a href="' . base_url('/') . $sbm->url . '" class="nav-link active">
                                        <i class="nav-icon ' . $sbm->icon . '"></i>
                                        <p>' . $sbm->menu . '</p>
                                        </a>
                                    </li>
                                ';
                            } else {
                                echo '
                                    <li class="nav-item pl-2">
                                        <a href="' . base_url('/') . $sbm->url . '" class="nav-link">
                                        <i class="nav-icon ' . $sbm->icon . '"></i>
                                        <p>' . $sbm->menu . '</p>
                                        </a>
                                    </li>
                                ';
                            }
                        }
                    }
                    echo '</ul>
                    </li>';
                } else {
                    echo '
                    <li class="nav-item has-treeview">
                        <a href="' . base_url('/') .     $key->url . '" class="nav-link">
                            <i class="nav-icon ' . $key->icon . '"></i>
                            <p>
                                ' . $key->menu . '
                            </p>
                        </a>
                    </li>';
                }
            }
        }

    //Jika Foreach tidak menemukan menu apapun yang di izinkan maka
    } else {
        echo '
            <li class="nav-item">
                <a href="#" class="nav-link">
                <p> - Tidak Ada Menu - </p>
                </a>
            </li>
        ';
    }
}
?>