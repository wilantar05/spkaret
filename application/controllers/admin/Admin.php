<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$this->load->database();
	}

	public function index($page = 1, $search = "")
	{
		if ($this->session->username != "") {
			$data['title'] = "Admin";
			$data['page'] = "List";
			$data['pagenumber'] = $page;
			$data['search'] = $search;
			$data['head'] = "Data Admin";

			$result = $this->Admin_model->GetAdmin($this->session->username);
			$data['user'] = $result;

			$admin = $this->Admin_model->GetAllAdmin($search, $page);
			$data['admin'] = $admin;
			$admincount = $this->Admin_model->GetCountAdmin($search, $page);
			$data['admincount'] = $admincount;


			$this->load->view('admin/admin/index', $data);
		} else {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function edit($id)
	{
		$data['title'] = "Admin";
		$data['page'] = "Edit";
		$admin = $this->Admin_model->FindAdmin($id);
		$data['adminedit'] = $admin;
		$data['head'] = "Data Admin";

		$result = $this->Admin_model->GetAdmin($this->session->username);
		$data['user'] = $result;
		$this->load->view('admin/admin/edit', $data);
	}

	public function update()
	{
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Username' => $this->input->post('Username'),
			'Password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
			'Alamat' => $this->input->post('Alamat'),
			'No_Tlp' => $this->input->post('No_Tlp'),
			'Status' => $this->input->post('Status')
		);

		$this->db->where('Id_Admin', $this->input->post('Id_Admin'));
		$result = $this->db->update('admin', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui admin!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui admin!</div>');
		}
		redirect('admin/admin/edit/' . $this->input->post('Id_Admin'), 'refresh');
	}

	public function search()
	{
		$pagenumber = $this->input->post('pagenumber');
		$search = $this->input->post('search');

		redirect('admin/admin/index/' . $pagenumber . '/' . $search, 'refresh');
	}

	public function store()
	{
		$data = array(
			'nama_admin' => $this->input->post('Nama'),
			'username' => $this->input->post('Username'),
			'password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
			'alamat' => $this->input->post('Alamat'),
			'no_hp' => $this->input->post('No_Tlp'),
			'status' => $this->input->post('Status')
		);

		$result = $this->db->insert('tb_admin', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan admin!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan admin!</div>');
		}
		redirect('admin/admin', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
			'Id_Admin' => $id,
		);
		$result = $this->db->delete('admin', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus admin!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus admin!</div>');
		}
		redirect('admin/admin', 'refresh');
	}
}
