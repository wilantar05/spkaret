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
		$this->load->model('konsultasi');
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

			$result = $this->Admin_model->GetAdmin($this->session->username);
			//$data['user'] = $result;
			$data['user'] = null;
			$konsultasi = $this->konsultasi->GetAllKonsultasi();
			$data['konsultasi'] = $konsultasi;
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
		$data['gejala'] = $this->Admin_gejala->GetAllGejalaNoFilter();
		$this->load->view('admin/dashboard/konsultasi', $data);
	}

	public function detail_konsultasi()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";
		$data['user'] = null;
		$data['form_nama'] = $this->input->post('Nama');
		$data['form_nohp'] = $this->input->post('NoHP');
		$data['gejala'] = $this->konsultasi->GetDetailKonsultasi();
		$data['nama_gejala'] = $this->konsultasi->GetNamaGejala();
		$this->load->view('admin/dashboard/detail-konsultasi', $data);
	}

	public function hasilkonsultasi()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['user'] = null;
		$this->load->view('admin/dashboard/hasilkonsultasi', $data);
	}

	public function hitung()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['user'] = null;
		//$hasilfc = $this->konsultasi->hitungFC();
		$hasilcf = $this->konsultasi->HitungCF();
		//$data['hasilfc'] = $hasilfc;
		$data['hasilcf'] = $hasilcf;
		$this->load->view('admin/dashboard/hasilkonsultasi', $data);
	}
}
