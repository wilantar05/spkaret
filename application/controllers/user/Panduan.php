<?php

class Panduan extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
		// $this->load->model('Transaksi_model');
		// $this->load->model('Barang_model');
		// $this->load->model('Member_model');
		// $this->load->model('Kategori_model');
	}

    public function index(){
        if ($this->session->username != "") {
			$data['title'] = "Dashboard";
			$data['page'] = "Panduan";
			$data['head'] = "Dashboard";
			$result = $this->User_model->GetUser($this->session->username);
			//$data['user'] = $result;
			$data['user'] = $result;
			$this->load->view('user/panduan', $data);
		} else {
			redirect('user/auth', 'refresh');
		}
    }
}