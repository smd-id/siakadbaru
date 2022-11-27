<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  public function movenik()
  {
    $this->load->model('M_Peserta');
    $this->load->model('M_Wawancarapsb');
    $get = $this->M_Peserta->get_all_by('s_lulus_adm', '1');

    foreach ($get as $key) {
      $data = array(
        'nik'     => $key->nik,
        'step_1'  => '0',
        'step_2'  => '0',
        'step_3'  => '0',
      );
      $this->M_Wawancarapsb->insert($data);
    }

  }

}