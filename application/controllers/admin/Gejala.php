<?php

class Gejala extends CI_Controller
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
		// $this->load->model('Barang_model');
		// $this->load->model('Kategori_model');
		$this->load->database();
	}

	public function index($page = 1, $search = "")
	{
		if ($this->session->username != "") {
			$data['title'] = "Gejala";
			$data['page'] = "Data";
			$data['pagenumber'] = $page;
			$data['search'] = $search;
			$data['head'] = "Data Gejala";
			//$data['user'] = null;
			$data['gejala'] = null;

			$data['gejalacount'] = 0;

			$result = $this->Admin_model->GetAdmin($this->session->username);
			$data['user'] = $result;

			// $result = $this->Kategori_model->getSelectKategori();
			// $data['kategori'] = $result;


			// $barang = $this->Barang_model->getAllBarang($search,$page);
			// $data['barang'] = $barang;
			// $barangcount = $this->Barang_model->getCountBarang($search,$page);
			// $data['barangcount'] = $barangcount;
			$last_kode = $this->Admin_gejala->GetLastKode();
			$gejalacount = $this->Admin_gejala->GetCountGejala($search, $page);
			$data['gejalacount'] = $gejalacount;
			$data['last_kode'] = $last_kode;
			$gejala = $this->Admin_gejala->GetAllGejala($search, $page);
			$data['gejala'] = $gejala;
			$this->load->view('admin/gejala/index', $data);
		} else {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function edit($id)
	{
		$data['title'] = "Gejala";
		$data['page'] = "Edit";
		$data['head'] = "Data Gejala";
		$data['user'] = null;
		$data['gejala'] = null;
		$gejala = $this->Admin_gejala->FindGejala($id);
		$data['gejala'] = $gejala;
		// $barang = $this->Barang_model->findBarang($id);
		// $data['barang'] = $barang;

		// $result = $this->Kategori_model->getSelectKategori();
		// $data['kategori'] = $result;

		// $result = $this->Barang_model->getGambarBarang($id);
		// $data['gambar'] = $result;

		$result = $this->Admin_model->GetAdmin($this->session->username);
		$data['user'] = $result;
		$this->load->view('admin/gejala/edit', $data);
	}

	public function update()
	{
		$data = array(
			'kode_gejala' => $this->input->post('KodeGejala'),
			'nama_gejala' => $this->input->post('NamaGejala'),
		);

		$this->db->where('id_gejala', $this->input->post('id'));
		$result = $this->db->update('tb_gejala', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui data gejala!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui data gejala!</div>');
		}
		redirect('admin/gejala/edit/' . $this->input->post('id'), 'refresh');
	}

	public function store()
	{
		$data = array(
			'kode_gejala' => $this->input->post('KodeGejala'),
			'nama_gejala' => $this->input->post('NamaGejala')
			// 'Created_at' => date("Y-m-d H:i:s"),
			// 'Update_at' => date("Y-m-d H:i:s")
		);

		$result = $this->db->insert('tb_gejala', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan data gejala!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan data gejala!</div>');
		}
		redirect('admin/gejala', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
			'id_gejala' => $id,
		);
		$result = $this->db->delete('tb_gejala', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus data gejala!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus data gejala!</div>');
		}
		redirect('admin/gejala', 'refresh');
	}

	public function getSelectBarang()
	{
		$result = $this->Barang_model->getSelectBarang();
		echo json_encode($result);
	}
}
