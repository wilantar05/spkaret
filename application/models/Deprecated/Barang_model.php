<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getAllBarang($search = "",$page = 1){
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        if($search != ""){
            $this->db->like('Nama_Barang',$search);
        }
        $this->db->limit($limit,$start);
        $data = $this->db->get()->result_array();
        foreach ($data as $key => $value) {
            $data[$key]['Gambar'] = $this->Barang_model->getGambarBarang($value['Id_Barang']);
        }
        return $data;
    }

    public function getAllBarang2($search = "",$page = 1){
        // $limit = 10;
        // $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.Id_Kategori = barang.Id_Kategori');
        if($search != ""){
            $this->db->like('Nama_Barang',$search);
            $this->db->or_like('Nama',$search);
        }
        //$this->db->limit($limit,$start);
        $data = $this->db->get()->result_array();
        foreach ($data as $key => $value) {
            $data[$key]['Gambar'] = $this->Barang_model->getGambarBarang($value['Id_Barang']);
        }
        return $data;
    }

    public function getCountBarang($search = "",$page = 1){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        if($search != ""){
            $this->db->like('Nama_Barang',$search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function getRandomBarang(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by('id', 'RANDOM');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function findBarang($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('Id_Barang',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function findBarangByKategori($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('Id_Kategori',$id);
        $data = $this->db->get()->result_array();
        foreach ($data as $key => $value) {
            $data[$key]['Gambar'] = $this->Barang_model->getGambarBarang($value['Id_Barang']);
        }
        return $data;
    }

    public function getGambarBarang($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('Id_Barang',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getSelectBarang(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('Status',1);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
