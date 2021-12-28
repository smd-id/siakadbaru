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

function what_akademik($kode)
{
    switch ($kode)
        {
        case 0:
        return "NON-AKADEMIK";
        break;
        case 1:
        return "AKADEMIK";
        break;
        case 2:
        return "NON - AKADEMIK";
        break;
        }
}

function what_jurusan($kode)
{
    switch ($kode)
        {
        case "A":
        return "IPA";
        break;
        case "G":
        return "MAK";
        break;
        case "A-UDG":
        return "IPA";
        break;
        case "G-UDG":
        return "MAK";
        break;
        }
}


?>