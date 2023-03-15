<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getAllKategori($search = "",$page = 1){
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('kategori');
        if($search != ""){
            $this->db->like('Nama',$search);
        }
        $this->db->limit($limit,$start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getSelectKategori(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('Status',1);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getRandomKategori(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id', 'RANDOM');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getCountKategori($search = "",$page = 1){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kategori');
        if($search != ""){
            $this->db->like('Nama',$search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function findKategori($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('Id_Kategori',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function findKategoriName($name){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('Nama',$name);
        $this->db->where('Status','1');
        $data = $this->db->get()->result_array();
        return $data;
    }
}
