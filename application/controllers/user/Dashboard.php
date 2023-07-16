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
		$this->load->model('User_model');
		$this->load->model('Konsultasi');
		$this->load->model('Admin_gejala');
		$this->load->model('Admin_penyakit');
		$this->load->model('User_model');
		$this->load->database();
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
			$data['head'] = "Dashboard";
			$result = $this->User_model->GetUser($this->session->username);
			//$data['user'] = $result;
			$data['user'] = $result;
			$konsultasi = $this->Konsultasi->GetRiwayatKonsultasi($data['user'][0]['id_user']);
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

	public function guest()
	{
		if ($this->session->username != "") {
			$data['title'] = "Dashboard";
			$data['page'] = "Home";
			$data['head'] = "Konsultasi";
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
		if ($this->session->username != "") {
			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
		}
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";

		$data['head'] = "Konsultasi";
		$data['gejala'] = $this->Admin_gejala->GetAllGejalaNoFilter();
		$this->load->view('user/konsultasi/index', $data);
	}

	public function detail_konsultasi()
	{
		if ($this->session->username != "") {
			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
		}
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";
		$data['head'] = "Konsultasi";
		$data['form_id'] = $this->input->post('id_user');
		$data['form_nama'] = $this->input->post('Nama');
		$data['form_nohp'] = $this->input->post('NoHP');
		$data['gejala'] = $this->Konsultasi->GetDetailKonsultasi();
		$data['nama_gejala'] = $this->Konsultasi->GetNamaGejala();
		$this->load->view('user/konsultasi/detail-konsultasi', $data);
	}

	public function hasilkonsultasi($hasilcf)
	{
		if ($this->session->username != "") {
			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
		}
		$data['head'] = "Konsultasi";
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi / Hasil";

		$maxcf = max($hasilcf);
		$key = array_search($maxcf, $hasilcf);
		$penyakit = $this->Admin_penyakit->FindPenyakitNama($key);
		$data['penyakit'] = $penyakit;
		//$data['hasilfc'] = $hasilfc;
		$data['hasilcf'] = $hasilcf;
		$this->load->view('user/konsultasi/hasil-konsultasi', $data);
	}

	public function hitung()
	{
		if ($this->session->username != "") {
			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
		}
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";
		$data['head'] = "Konsultasi";

		//$hasilfc = $this->konsultasi->hitungFC();
		$hasilcf = $this->Konsultasi->HitungCF();
		$this->hasilkonsultasi($hasilcf);
		//$this->load->view('user/konsultasi/hasil-konsultasi', $data);
	}

	public function tabeldetail()
	{
		if ($this->session->username != "") {
			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
		}
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi / Tabel Hasil";
		$data['head'] = "Konsultasi";
		$inputData = $this->input->post('hasilcf');
		$hasilcf = unserialize($inputData);
		$penyakit = $this->Admin_penyakit->GetAllPenyakit();
		$data['penyakit'] = $penyakit;
		//$data['hasilfc'] = $hasilfc;
		$data['hasilcf'] = $hasilcf;
		$this->load->view('user/konsultasi/tabel-hasil-konsultasi', $data);
	}

	public function tabeldetailback()
	{
		if ($this->session->username != "") {
			$result = $this->User_model->GetUser($this->session->username);
			$data['user'] = $result;
		}
		$data['title'] = "Dashboard";
		$data['page'] = "Konsultasi";
		$data['head'] = "Konsultasi";
		$inputData = $this->input->post('hasilcf');
		$hasilcf = unserialize($inputData);
		//$data['hasilfc'] = $hasilfc;
		$data['hasilcf'] = $hasilcf;
		$this->hasilkonsultasi($hasilcf);
	}

	public function delete($id){
		$data = array(
			'id_konsultasi' => $id,
		);
		$result = $this->db->delete('tb_konsultasi', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus data konsultasi!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus data konsultasi!</div>');
		}
		redirect('user/dashboard', 'refresh');
	}
}
