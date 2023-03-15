<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$this->load->model('Admin_gejala');
		// $this->load->model('Transaksi_model');
		// $this->load->model('Barang_model');
		// $this->load->model('Member_model');
		// $this->load->model('Kategori_model');
	}

	public function index()
	{
		if ($this->session->username != "") {
			$data['title'] = "Dashboard";
			$data['page'] = "Home";

			$result = $this->Admin_model->getAdmin($this->session->username);
			//$data['user'] = $result;
			$data['user'] = null;

			// $transaksi = $this->Transaksi_model->getCountTransaksi();
			// $data['transaksi'] = $transaksi;

			// $barang = $this->Barang_model->getCountBarang();
			// $data['barang'] = $barang;

			// $member = $this->Member_model->getCountMember();
			// $data['member'] = $member;

			// $kategori = $this->Kategori_model->getCountKategori();
			// $data['kategori'] = $kategori;

			$this->load->view('admin/dashboard', $data);
		} else {
			redirect('admin/auth', 'refresh');
		}
	}

	public function konsultasi()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['user'] = null;
		$data['gejala'] = $this->Admin_gejala->getAllGejalaNoFilter();
		$this->load->view('admin/dashboard/konsultasi', $data);
	}

	public function hasilkonsultasi()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['user'] = null;
		$this->load->view('admin/dashboard/hasilkonsultasi', $data);
	}
}
