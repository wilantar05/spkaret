<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->helper('url');
		$this->load->model('Admin_model');
		
	}

	public function index()
	{
		//echo password_hash("admin",PASSWORD_DEFAULT);
		
		if($this->session->username == ""){
			$this->form_validation->set_rules('username', 'Text', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == false) {
				$data['title'] = "Login Admin Sistem Pakar Penyakit Karet";
				$this->load->view('admin/auth/login',$data);
			}else{
				$data['title'] = "Login Admin Sistem Pakar Penyakit Karet";
				
				$result = $this->Admin_model->Login($this->input->post('username'),$this->input->post('password'));
				// ini buat login
				$result = true;
				if($result){
					$this->session->set_userdata('username', $this->input->post('username'));
					redirect('admin/gejala', 'refresh');
				}else{
					redirect('admin/auth', 'refresh');
				}
			}
			
		}else{
			if($this->session->username == "Guest"){
				redirect('admin/dashboard', 'refresh');
			}else{
				redirect('admin/gejala', 'refresh');
			}
			
		}
	}

	public function loginasguest(){
		$this->session->set_userdata('username', 'Guest');
					redirect('admin/dashboard', 'refresh');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil logout</div>');

		redirect('admin/auth');
	}
}
