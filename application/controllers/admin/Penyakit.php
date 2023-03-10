<?php

class Penyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$this->load->model('Admin_penyakit');
		//$this->load->model('Kategori_model');
		$this->load->database();
	}

	public function index($page = 1, $search = "")
	{
		if ($this->session->username != "") {
			$data['title'] = "Kategori";
			$data['page'] = "List";
			$data['pagenumber'] = $page;
			$data['search'] = $search;

			$data['user'] = null;
			$data['penyakit'] = null;
			$data['penyakitcount'] = 0;
			// $result = $this->Admin_model->getAdmin($this->session->username);
			// $data['user'] = $result;

			// $kategori = $this->Kategori_model->getAllKategori($search,$page);
			// $data['kategori'] = $kategori;
			// $kategoricount = $this->Kategori_model->getCountKategori($search,$page);
			// $data['kategoricount'] = $kategoricount;
			$penyakitcount = $this->Admin_penyakit->getCountPenyakit($search, $page);
			$data['penyakitcount'] = $penyakitcount;
			$penyakit = $this->Admin_penyakit->getAllPenyakit($search, $page);
			$data['penyakit'] = $penyakit;
			$this->load->view('admin/penyakit/index', $data);
		} else {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function edit($id)
	{
		$data['title'] = "Penyakit";
		$data['page'] = "Edit";

		$data['penyakit'] = null;
		$data['user'] = null;
		$penyakit = $this->Admin_penyakit->findPenyakit($id);
		$data['penyakit'] = $penyakit;
		// $kategori = $this->Kategori_model->findKategori($id);
		// $data['kategori'] = $kategori;

		// $result = $this->Admin_model->getAdmin($this->session->username);
		// $data['user'] = $result;
		$this->load->view('admin/penyakit/edit', $data);
	}

	public function update()
	{
		$data = array(
			'NamaPenyakit' => $this->input->post('NamaPenyakit'),
		);

		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update('penyakit', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui data penyakit!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui data penyakit!</div>');
		}
		redirect('admin/gejala/edit/' . $this->input->post('id'), 'refresh');
	}

	public function search()
	{
		$pagenumber = $this->input->post('pagenumber');
		$search = $this->input->post('search');

		redirect('admin/kategori/index/' . $pagenumber . '/' . $search, 'refresh');
	}

	public function store()
	{
		$data = array(
			'NamaPenyakit' => $this->input->post('NamaPenyakit'),
			'Solusi' => $this->input->post('Solusi')
			// 'Created_at' => date("Y-m-d H:i:s"),
			// 'Update_at' => date("Y-m-d H:i:s")
		);

		$result = $this->db->insert('penyakit', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan data penyakit!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan data penyakit!</div>');
		}
		redirect('admin/penyakit', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
			'id' => $id,
		);
		$result = $this->db->delete('penyakit', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus data penyakit!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus data penyakit!</div>');
		}
		redirect('admin/penyakit', 'refresh');
	}
}
