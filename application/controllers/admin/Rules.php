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
			$data['page'] = "Data";
			$data['pagenumber'] = $page;
			$data['search'] = $search;
			$data['head'] = "Data Rules";

			$result = $this->Admin_model->GetAdmin($this->session->username);
			$data['user'] = $result;

			$rules = $this->Admin_rules->GetRuleData($search, $page);
			$data['rules'] = $rules;
			$ruleCount = $this->Admin_rules->GetCountRules($search, $page);
			$data['rulescount'] = $ruleCount;
			$gejala = $this->Admin_gejala->GetAllGejalaNoFilter();
			$data['gejala'] = $gejala;
			$penyakit = $this->Admin_penyakit->GetAllPenyakit($search, $page);
			$data['penyakit'] = $penyakit;
			// $member = $this->Member_model->getAllMember($search,$page);
			// $data['member'] = $member;
			// $membercount = $this->Member_model->getCountMember($search,$page);
			// $data['membercount'] = $membercount;

			//$data['user'] = null;
			// $data['rules'] = null;
			//$data['rulescount'] = 0;


			$this->load->view('admin/rules/index', $data);
		} else {
			redirect('admin/dashboard', 'refresh');
		}
	}

	public function rule_cf(){
		if ($this->session->username != "") {
			$data['title'] = "Rules";
			$data['page'] = "Data";
			$data['pagenumber'] = $page;
			$data['search'] = $search;
			$data['head'] = "Data Rules";

			$result = $this->Admin_model->GetAdmin($this->session->username);
			$data['user'] = $result;

			$rules = $this->Admin_rules->GetRuleData($search, $page);
			$data['rules'] = $rules;
			$ruleCount = $this->Admin_rules->GetCountRules($search, $page);
			$data['rulescount'] = $ruleCount;
			$gejala = $this->Admin_gejala->GetAllGejalaNoFilter();
			$data['gejala'] = $gejala;
			$penyakit = $this->Admin_penyakit->GetAllPenyakit($search, $page);
			$data['penyakit'] = $penyakit;
			// $member = $this->Member_model->getAllMember($search,$page);
			// $data['member'] = $member;
			// $membercount = $this->Member_model->getCountMember($search,$page);
			// $data['membercount'] = $membercount;

			//$data['user'] = null;
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
		$rules = $this->Admin_rules->FindRules($id);
		$data['rules'] = $rules;
		$gejala = $this->Admin_gejala->GetAllGejala();
		$data['gejala'] = $gejala;
		$penyakit = $this->Admin_penyakit->GetAllPenyakit();
		$data['penyakit'] = $penyakit;
		//$member = $this->Member_model->findMember($id);
		//$data['memberedit'] = $member;
		$data['head'] = "Data Rules";

		$data['rulesedit'] = null;

		$result = $this->Admin_model->GetAdmin($this->session->username);
		$data['user'] = $result;
		$data['user'] = null;
		$this->load->view('admin/rules/edit', $data);
	}

	public function update()
	{
		$nilaimb = $this->input->post('mb');
		$nilaimd = $this->input->post('md');
		$nilaicf = $nilaimb-$nilaimd;

		$data = array(
			'id_rules' => $this->input->post('id'),
			'id_penyakit' => $this->input->post('idPenyakit'),
			'id_gejala' => $this->input->post('idGejala'),
			'nilai_mb' => $nilaimb,
			'nilai_md' => $nilaimd,
			'nilai_cf' => $nilaicf,
		);

		$this->db->where('id_rules', $this->input->post('id'));
		$result = $this->db->update('tb_rules', $data);
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
		$nilaimb = $this->input->post('mb');
		$nilaimd = $this->input->post('md');
		$nilaicf = $nilaimb-$nilaimd;
		
		$data = array(
			'id_rules' => $this->input->post('id'),
			'id_penyakit' => $this->input->post('idPenyakit'),
			'id_gejala' => $this->input->post('idGejala'),
			'nilai_mb' => $nilaimb,
			'nilai_md' => $nilaimd,
			'nilai_cf' => $nilaicf,
		);

		$result = $this->db->insert('tb_rules', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan rules!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan rules!</div>');
		}
		redirect('admin/rules', 'refresh');
	}

	public function delete($id)
	{
		$data = array(
			'id_rules' => $id,
		);
		$result = $this->db->delete('tb_rules', $data);
		if ($result) {
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus rules!</div>');
		} else {
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus rules!</div>');
		}
		redirect('admin/rules', 'refresh');
	}
}
