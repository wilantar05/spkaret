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
		$this->load->model('Barang_model');
		$this->load->model('Kategori_model');
		$this->load->database();
		
	}

	public function index($page = 1, $search = "")
	{
		if($this->session->username != ""){
            $data['title'] = "Gejala";
            $data['page'] = "List";
			$data['pagenumber'] = $page;
			$data['search'] = $search;

			$data['user'] = null;
			$data['gejala'] = null;

			$data['gejalacount'] = 0;

            // $result = $this->Admin_model->getAdmin($this->session->username);
            // $data['user'] = $result;

			// $result = $this->Kategori_model->getSelectKategori();
            // $data['kategori'] = $result;
			

			// $barang = $this->Barang_model->getAllBarang($search,$page);
			// $data['barang'] = $barang;
			// $barangcount = $this->Barang_model->getCountBarang($search,$page);
			// $data['barangcount'] = $barangcount;
			

            $this->load->view('admin/gejala/index',$data);
        }else{
            redirect('admin/dashboard', 'refresh');
        }
	}

	public function edit($id){
		$data['title'] = "Gejala";
        $data['page'] = "Edit";

		$data['user'] = null;
		$data['gejala'] = null;
		// $barang = $this->Barang_model->findBarang($id);
		// $data['barang'] = $barang;

		// $result = $this->Kategori_model->getSelectKategori();
        // $data['kategori'] = $result;

		// $result = $this->Barang_model->getGambarBarang($id);
        // $data['gambar'] = $result;
		
		// $result = $this->Admin_model->getAdmin($this->session->username);
        // $data['user'] = $result;
		$this->load->view('admin/gejala/edit',$data);

	}

	public function update(){
		$data = array(
			'Nama_Barang' => $this->input->post('Nama_Barang'),
			'Status' => $this->input->post('Status'),
			'Id_Kategori' => $this->input->post('Id_Kategori'),
			'Harga' => $this->input->post('Harga'),
			'Stok' => $this->input->post('Stok'),
			'Min_qty_beli' => $this->input->post('Min_qty_beli'),
			'Satuan' => $this->input->post('Satuan'),
			'Update_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('Id_Barang', $this->input->post('Id_Barang'));
		$result = $this->db->update('barang', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil memperbarui barang!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal memperbarui barang!</div>');
		}
		redirect('admin/barang/edit/'.$this->input->post('Id_Barang'), 'refresh'); 
	}

	public function search(){
		$pagenumber = $this->input->post('pagenumber');
		$search = $this->input->post('search');

		redirect('admin/barang/index/'.$pagenumber.'/'.$search, 'refresh'); 
	}

	public function store(){
		$data = array(
			'Nama_Barang' => $this->input->post('Nama_Barang'),
			'Status' => $this->input->post('Status'),
			'Id_Kategori' => $this->input->post('Id_Kategori'),
			'Harga' => $this->input->post('Harga'),
			'Stok' => $this->input->post('Stok'),
			'Min_qty_beli' => $this->input->post('Min_qty_beli'),
			'Satuan' => $this->input->post('Satuan'),
			'Created_at' => date("Y-m-d H:i:s"),
			'Update_at' => date("Y-m-d H:i:s")
		);
		
		$result = $this->db->insert('barang', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan barang!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan barang!</div>');
		}
		redirect('admin/barang', 'refresh'); 
	}

	public function addGambar(){
		$config['upload_path'] = './././uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = date("YmdHis");

        $this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('Gambar')){
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal mengupload file gambar!</div>');
        } else {
			$data = array(
				'Id_Barang' => $this->input->post('Id_Barang'),
				'Gambar' => $this->upload->data('file_name'),
				'Keterangan' => $this->input->post('Keterangan'),
				'Created_at' => date("Y-m-d H:i:s"),
				'Update_at' => date("Y-m-d H:i:s")
			);
			
			$result = $this->db->insert('gambar', $data);
			if($result){
				$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menambahkan gambar barang!</div>');
			}else{
				$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menambahkan gambar barang!</div>');
			}
		}
		redirect('admin/barang/edit/'.$this->input->post('Id_Barang'), 'refresh');
	}

	public function deleteGambar($id){
		$data = array(
			'Id_Gambar' => $id,
		);
		$result = $this->db->delete('gambar', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus gambar barang!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus gambar barang!</div>');
		}
		redirect('admin/barang', 'refresh'); 
	}

	public function delete($id){
		$data = array(
			'Id_Barang' => $id,
		);
		$result = $this->db->delete('barang', $data);
		if($result){
			$this->session->set_flashdata('true', '<div class="alert alert-success" role="alert"><strong>Berhasil!</strong> Berhasil menghapus barang!</div>');
		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Gagal menghapus barang!</div>');
		}
		redirect('admin/barang', 'refresh'); 
	}

	public function getSelectBarang(){
		$result = $this->Barang_model->getSelectBarang();
		echo json_encode($result);
	}

}
