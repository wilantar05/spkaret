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
		$this->load->model('User_model');
		$this->load->database();
	}

	public function index()
	{
		//echo password_hash("admin",PASSWORD_DEFAULT);
		
		if($this->session->username == "" && $this->session->username != "Guest"){
			$this->form_validation->set_rules('username', 'Text', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == false) {
				$data['title'] = "Login Sistem Pakar Penyakit Karet";
				$this->load->view('user/auth/login',$data);
			}else{
				$data['title'] = "Login Sistem Pakar Penyakit Karet";
				$result = $this->User_model->Login($this->input->post('username'),$this->input->post('password'));
				// ini buat login
				//$result = true;
				if($result){
					$this->session->set_userdata('username', $this->input->post('username'));
					redirect('user/dashboard', 'refresh');
				}else{
					redirect('user/auth', 'refresh');
				}
			}
			
		}else{
			if($this->session->username == "Guest"){
				redirect('user/dashboard/guest', 'refresh');
			}else{
				redirect('user/dashboard', 'refresh');
			}
			
		}
	}

	public function loginasguest(){
		$this->session->set_userdata('username', 'Guest');
					redirect('user/auth', 'refresh');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil logout</div>');

		redirect('user/auth');
	}

    public function register(){
        $data['title'] = "Register Pengguna Baru";
        $this->load->view('user/auth/register', $data);
    }

    
    public function storeuser(){
        $data = array(
			'nama_user' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'status' => $this->input->post('status')
		);

		$result = $this->db->insert('tb_user', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Registrasi berhasil, silahkan sign in</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Registrasi Gagal!</div>');
		}
		redirect('user/auth', 'refresh');
    }
}
