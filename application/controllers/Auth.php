<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
        $this->load->model('M_Users');
    }

    public function index()
    {
        if (!$this->session->has_userdata('id')){
            $data = [
                'title' => "Login",
            ];
    
            echo $this->template->auth($data);
        } else {
            redirect ('home');
        }
    }

    public function dologin()
    {
        
        $payload = [
            'username'  => $this->input->post('username'),
            'password'  => $this->input->post('password')
        ];
        
        $user = $this->M_Users->get_by_username($payload['username']);
        // Jika User Ada
        if($user) {
            //Jika User Aktif
            if($user->status == 1) {
                // Cek Password
                if(password_verify($payload['password'], $user->password)){
                    $data = [
                        'id' => $user->id,
                    ];
                    $this->session->sess_expiration = '14400';
                    $this->session->set_userdata($data);
                    redirect('home');                  
                } else {
                    $this->session->set_flashdata([
                        'msg' => 'Username / Password Salah',
                        'type' => 'warning'
                    ]);
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata([
                    'msg' => 'Akun anda di blokir admin',
                    'type' => 'warning'
                ]);
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata([
                'msg' => 'Username / Password Salah',
                'type' => 'warning'
            ]);
            redirect('auth');
        }
    }


    public function register()
    {
        $data = [
            'title' => "Register",
            'content' => "Auth/register",
        ];
        echo $this->template->auth($data);
    }

    public function doregister()
    {
        $data = [
            'name' =>  $this->input->post('name'),
            'username' =>  $this->input->post('username'),
            'nik' =>  $this->input->post('nik'),
            'whatsapp' =>  $this->input->post('whatsapp'),
            'role_id' =>  $this->input->post('role_id'),
            'email' =>  $this->input->post('email'),
            'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'profile_picture' =>  'default.png',
            'status' =>  '0'
        ];
        $insert = $this->M_Users->insert($data);
        if ($insert){
            if ($this->input->is_ajax_request()) {
                echo json_encode(array("status" => true));
            } else {
                $this->session->set_flashdata([
                    'msg' => 'Berhasil Mendaftar, akun anda sedang di verifikasi admin',
                    'type' => 'success'
                ]);
                redirect('auth');
            }
        } else {
            if ($this->input->is_ajax_request()) {
                echo json_encode(array("status" => false));
            } else {
                $this->session->set_flashdata([
                    'msg' => 'Maaf Anda Gagal Melakukan Pendaftaran',
                    'type' => 'error'
                ]);
            }
            redirect('auth');
        }
    }

    public function forgotpass()
    {
        $data = [
            'title' => "Forgot Password",
            'content' => "Auth/forgotpass"
        ];

        echo $this->template->auth($data);
    }

    public function logout()
    {   
        $this->session->sess_destroy();
        redirect('auth');
    }


    public function changeprofile()
    {
        $data = [
			'title' => "My Profile",
			'content' => "Auth/changeprofile",
            'costum_js' => "Auth/js-profile"
		];
		
		echo $this->template->views($data);
    }

    public function getMyData()
    {
        if ($this->input->is_ajax_request() == true) {
            $id = $this->session->userdata('id');

            $data = $this->M_Users->get_by_id($id);
            
            echo json_encode(array("status" => true, "result" => $data));
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    
}