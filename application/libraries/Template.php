<?php
	class Template {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance();

			$this->_ci->load->model('M_Schooldetail');
			$this->_ci->load->model('M_Users');
			$this->_ci->load->model('M_Role');
		}

		function views($data) {
			
			
			$data['detail'] = $this->_ci->M_Schooldetail->get();
			$data['userdata'] = $this->_ci->M_Users->get_by_id($this->_ci->session->userdata['id']);
			$data['roles'] = $this->_ci->M_Role->getallnolimit();

			if ($data != NULL) {
				return $this->_ci->load->view('_layout/_Template', $data, TRUE);
			}
		}

		function auth($data) {
			// Company Detail
			$this->_ci->load->model('M_Schooldetail');
			$data['detail'] = $this->_ci->M_Schooldetail->get();
			$data['roles'] = $this->_ci->M_Role->getall();


			if ($data != NULL) {
				return $this->_ci->load->view('_layout/_TemplateAuth', $data, TRUE);
			}
		}
	}
	
?>