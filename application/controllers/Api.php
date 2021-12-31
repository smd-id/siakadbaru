<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  public function updatewawancara()
  {
    $this->load->model('M_Wawancarapsb');
    $this->load->model('M_Peserta');

    $get = $this->M_Peserta->get_all();

    foreach ($get as $key) {
      $data = [
        'nik' => $key->nik
      ];

      $this->M_Wawancarapsb->insert($data);
    }
  }




}