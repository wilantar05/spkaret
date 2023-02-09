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
		$this->load->model('Admin_rules');
		$this->load->model('Admin_penyakit');
		$this->load->model('Admin_gejala');
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

			$rules = $this->Admin_rules->getRuleData($search, $page);
			$data['rules'] = $rules;
			$ruleCount = $this->Admin_rules->getCountRules($search, $page);
			$data['rulescount'] = $ruleCount;
			$gejala = $this->Admin_gejala->getAllGejala($search, $page);
			$data['gejala'] = $gejala;
			$penyakit = $this->Admin_penyakit->getAllPenyakit($search, $page);
			$data['penyakit'] = $penyakit;
			// $member = $this->Member_model->getAllMember($search,$page);
			// $data['member'] = $member;
			// $membercount = $this->Member_model->getCountMember($search,$page);
			// $data['membercount'] = $membercount;

			$data['user'] = null;
			// $data['rules'] = null;
			//$data['rulescount'] = 0;


			$this->load->view('admin/rules/index', $data);
		} else {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function edit($id)
	{
		$data['title'] = "Rules";
		$data['page'] = "Edit";
		$rules = $this->Admin_rules->findRules($id);
		$data['rules'] = $rules;
		$gejala = $this->Admin_gejala->getAllGejala();
		$data['gejala'] = $gejala;
		$penyakit = $this->Admin_penyakit->getAllPenyakit();
		$data['penyakit'] = $penyakit;
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
			'id' => $this->input->post('id'),
			'idPenyakit' => $this->input->post('idPenyakit'),
			'idGejala' => $this->input->post('idGejala'),
			'nilaiMB' => $this->input->post('mb'),
			'nilaiMD' => $this->input->post('md'),
			'nilaiCF' => $this->input->post('cf'),
		);

		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update('rules', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui data rules!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui data rules!</div>');
		}
		redirect('admin/rules/edit/' . $this->input->post('id'), 'refresh');
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
			'id' => $this->input->post('id'),
			'idPenyakit' => $this->input->post('idPenyakit'),
			'idGejala' => $this->input->post('idGejala'),
			'nilaiMB' => $this->input->post('mb'),
			'nilaiMD' => $this->input->post('md'),
			'nilaiCF' => $this->input->post('cf'),
		);

		$result = $this->db->insert('rules', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan member!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan member!</div>');
		}
		redirect('admin/rules', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
			'id' => $id,
		);
		$result = $this->db->delete('rules', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus rules!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus rules!</div>');
		}
		redirect('admin/rules', 'refresh');
	}
}
