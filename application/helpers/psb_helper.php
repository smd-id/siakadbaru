<?php 

function psb_url($path = NULL)
{
    if ($_SERVER['HTTP_HOST'] == "localhost"){
        return "http://localhost/psbbaru/".$path;
    } else {
        return "https://psb.ruhulislam.com/".$path;
    }
}

function psb_detail($name)
{
    $ci = &get_instance();
    $ci->load->model('M_Psbdetail');
	$payload = $ci->M_Psbdetail->get_detail();
    return $payload->$name;
}


?>