<?php 

function psb_url($path = NULL)
{
    return "https://psb.ruhulislam.com/".$path;
}

function psb_detail($name)
{
    $ci = &get_instance();
    $ci->load->model('M_Psbdetail');
	$payload = $ci->M_Psbdetail->get_detail();
    return $payload->$name;
}

function bm_random_rgb()
{
    
     return 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')';
    
}


?>