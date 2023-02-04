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
		$this->load->model('Kategori_model');
		$this->load->database();
		
	}

	public function index($page = 1, $search = "")
	{
		if($this->session->username != ""){
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
			

            $this->load->view('admin/penyakit/index',$data);
        }else{
            redirect('admin/dashboard', 'refresh');
        }
	}

	public function edit($id){
		$data['title'] = "Penyakit";
        $data['page'] = "Edit";

		$data['penyakit'] = null;
		$data['user'] = null;
		// $kategori = $this->Kategori_model->findKategori($id);
		// $data['kategori'] = $kategori;

		// $result = $this->Admin_model->getAdmin($this->session->username);
        // $data['user'] = $result;
		$this->load->view('admin/penyakit/edit',$data);

	}

	public function update(){
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Status' => $this->input->post('Status')
		);

		$this->db->where('Id_Kategori', $this->input->post('Id_Kategori'));
		$result = $this->db->update('kategori', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui kategori!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui kategori!</div>');
		}
		redirect('admin/kategori/edit/'.$this->input->post('Id_Kategori'), 'refresh'); 
	}

	public function search(){
		$pagenumber = $this->input->post('pagenumber');
		$search = $this->input->post('search');

		redirect('admin/kategori/index/'.$pagenumber.'/'.$search, 'refresh'); 
	}

	public function store(){
		$data = array(
			'Nama' => $this->input->post('Nama'),
			'Status' => $this->input->post('Status')
		);
		
		$result = $this->db->insert('kategori', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan kategori!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan kategori!</div>');
		}
		redirect('admin/kategori', 'refresh'); 
	}

	public function delete($id){
		$data = array(
			'Id_Kategori' => $id,
		);
		$result = $this->db->delete('kategori', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus kategori!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus kategori!</div>');
		}
		redirect('admin/kategori', 'refresh'); 
	}

}
