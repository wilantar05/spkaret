<?php

class Dashboard extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('konsultasi');
        $this->load->model('Admin_gejala');
        $this->load->model('User_model');
		// $this->load->model('Transaksi_model');
		// $this->load->model('Barang_model');
		// $this->load->model('Member_model');
		// $this->load->model('Kategori_model');
	}

    public function index(){
        if ($this->session->username != "") {
			$data['title'] = "Dashboard";
			$data['page'] = "Home";

			$result = $this->User_model->GetUser($this->session->username);
			//$data['user'] = $result;
			$data['user'] = $result;
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

			$this->load->view('user/dashboard', $data);
		} else {
			redirect('user/auth', 'refresh');
		}
    }

    public function guest(){
        if ($this->session->username != "" ) {
			$data['title'] = "Dashboard";
			$data['page'] = "Home";

			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
			// $konsultasi = $this->konsultasi->GetAllKonsultasi();
			// $data['konsultasi'] = $konsultasi;
			// $transaksi = $this->Transaksi_model->getCountTransaksi();
			// $data['transaksi'] = $transaksi;

			// $barang = $this->Barang_model->getCountBarang();
			// $data['barang'] = $barang;

			// $member = $this->Member_model->getCountMember();
			// $data['member'] = $member;

			// $kategori = $this->Kategori_model->getCountKategori();
			// $data['kategori'] = $kategori;
            $data['gejala'] = $this->Admin_gejala->GetAllGejalaNoFilter();
			$this->load->view('user/konsultasi/index', $data);
		} else {
			redirect('user/auth', 'refresh');
		}
    }

    public function konsultasi()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['user'] = null;
		$data['gejala'] = $this->Admin_gejala->GetAllGejalaNoFilter();
		$this->load->view('user/dashboard/konsultasi/index', $data);
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
		$this->load->view('user/konsultasi/detail-konsultasi', $data);
	}

	public function hasilkonsultasi()
	{
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['user'] = null;
		$this->load->view('user/konsultasi/hasil-konsultasi', $data);
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
		$this->load->view('user/konsultasi/hasil-konsultasi', $data);
	}
}