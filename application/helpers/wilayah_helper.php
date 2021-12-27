<?php

    function what_provinsi($id)
    {
        $ci = &get_instance();
        $ci->load->model('M_Wilayah');
        $payload = $ci->M_Wilayah->get_provinsi($id)->row();
        return $payload->name;
    }

    function what_kabupaten($id)
    {
        $ci = &get_instance();
        $ci->load->model('M_Wilayah');
        $payload = $ci->M_Wilayah->get_kabupaten_by_id($id);
        return $payload->name;
    }

    function what_kecamatan($id)
    {
        $ci = &get_instance();
        $ci->load->model('M_Wilayah');
        $payload = $ci->M_Wilayah->get_kecamatan_by_id($id);
        return $payload->name;
    }

    function what_desa($id)
    {
        $ci = &get_instance();
        $ci->load->model('M_Wilayah');
        $payload = $ci->M_Wilayah->get_desa_by_id($id);
        return $payload->name;
    }
?>