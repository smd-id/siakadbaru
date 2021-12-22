<?php
	class Template {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($data) {
			
			$this->_ci->load->model('M_Schooldetail');
			$this->_ci->load->model('M_Users');
			$this->_ci->load->model('M_Role');
			
			$data['detail'] = $this->_ci->M_Schooldetail->get();
			$data['userdata'] = $this->_ci->M_Users->get_by_id($this->_ci->session->userdata['id']);
			$data['role'] = $this->_ci->M_Role->get_by_id($data['userdata']->role_id);

			if ($data != NULL) {
				return $this->_ci->load->view('_layout/_Template', $data, TRUE);
			}
		}

		function auth($data) {
			// Company Detail
			$this->_ci->load->model('M_Schooldetail');
			$data['detail'] = $this->_ci->M_Schooldetail->get();


			if ($data != NULL) {
				return $this->_ci->load->view('_layout/_TemplateAuth', $data, TRUE);
			}
		}
	}
	
?>