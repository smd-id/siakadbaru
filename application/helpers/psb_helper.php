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

function what_status_ortu($kode)
{
    switch ($kode)
        {
        case "masih":
        return "Masih Hidup";
        break;
        case "meninggal":
        return "Sudah Meninggal";
        break;
        }
}

function jurusan($jurusan)
{
    switch ($jurusan)
    {
        case "A":
        return "Ilmu Pengatahuan Alam (IPA)";
        break;
        case "G":
        return "Ilmu Keagamaan (MAK)";
        break;
        case "A-UDG":
        return "Ilmu Pengatahuan Alam (IPA)";
        break;
        case "G-UDG":
        return "Ilmu Keagamaan (MAK)";
        break;
    }
}

function jurusan_singkat($jurusan)
{
    switch ($jurusan)
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

function jenis_kelamin($jk)
{
    switch ($jk)
    {
        case "L":
        return "Laki - Laki";
        break;
        case "P":
        return "Perempuan";
        break;
    }
}

function sudah_belum($id)
{
    switch ($id)
    {
        case "0":
        return "<span class='badge badge-danger'>Belum</span>";
        break;
        case "1":
        return "<span class='badge badge-success'>Sudah</span>";
        break;
        case "2":
        return "<span class='badge badge-info'>Rejected</span>";
        break;
        case "3":
        return "<span class='badge badge-warning'>Menunggu</span>";
        break;
    }
}

function baik_or_no($key)
{
    switch ($key)
    {
        case "1":
        return "SANGAT BAIK";
        break;
        case "2":
        return "SANGAT BAIK";
        break;
        case "3":
        return "CUKUP";
        break;
        case "4":
        return "KURANG";
        break;
    }
}

function rekom_or_no($key)
{
    switch ($key)
    {
        case "1":
        return "REKOM SEKALI";
        break;
        case "2":
        return "REKOM";
        break;
        case "3":
        return "KURANG REKOM";
        break;
        case "4":
        return "TIDAK REKOM";
        break;
    }
}

function pernah_or_no($key)
{
    switch ($key)
    {
        case "1":
        return "PERNAH";
        break;
        case "2":
        return "TIDAK PERNAH";
        break;
    }
}


?>