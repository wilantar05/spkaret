<?php

class Rules extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->model('Member_model');
		$this->load->model('Admin_model');
		$this->load->database();
	}

	public function index($page = 1, $search = "")
	{
		if ($this->session->username != "") {
			$data['title'] = "Rules";
			$data['page'] = "List";
			$data['pagenumber'] = $page;
			$data['search'] = $search;

			// $result = $this->Admin_model->getAdmin($this->session->username);
			// $data['user'] = $result;

			// $member = $this->Member_model->getAllMember($search,$page);
			// $data['member'] = $member;
			// $membercount = $this->Member_model->getCountMember($search,$page);
			// $data['membercount'] = $membercount;

			$data['user'] = null;
			$data['rules'] = null;
			$data['rulescount'] = 0;


			$this->load->view('admin/rules/index', $data);
		} else {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function edit($id)
	{
		$data['title'] = "Rules";
		$data['page'] = "Edit";
		//$member = $this->Member_model->findMember($id);
		//$data['memberedit'] = $member;

		$data['rulesedit'] = null;

		//$result = $this->Admin_model->getAdmin($this->session->username);
		//$data['user'] = $result;
		$data['user'] = null;
		$this->load->view('admin/rules/edit', $data);
	}

	public function update()
	{
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Username' => $this->input->post('Username'),
			'Password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
			'Alamat' => $this->input->post('Alamat'),
			'No_Tlp' => $this->input->post('No_Tlp'),
			'Email' => $this->input->post('Email'),
			'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin'),
			'Status' => $this->input->post('Status')
		);

		$this->db->where('Id_Member', $this->input->post('Id_Member'));
		$result = $this->db->update('member', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui member!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui member!</div>');
		}
		redirect('admin/member/edit/' . $this->input->post('Id_Member'), 'refresh');
	}

	public function search()
	{
		$pagenumber = $this->input->post('pagenumber');
		$search = $this->input->post('search');

		redirect('admin/member/index/' . $pagenumber . '/' . $search, 'refresh');
	}

	public function store()
	{
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Username' => $this->input->post('Username'),
			'Password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
			'Alamat' => $this->input->post('Alamat'),
			'No_Tlp' => $this->input->post('No_Tlp'),
			'Email' => $this->input->post('Email'),
			'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin'),
			'Status' => $this->input->post('Status')
		);

		$result = $this->db->insert('member', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan member!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan member!</div>');
		}
		redirect('admin/member', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
			'Id_Member' => $id,
		);
		$result = $this->db->delete('member', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus member!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus member!</div>');
		}
		redirect('admin/member', 'refresh');
	}
}
