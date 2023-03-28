<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_gejala extends CI_Model
{
    public function GetAllGejala($search = "", $page = 1)
    {
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_gejala');

        if ($search != "") {
            $this->db->like('nama_gejala', $search);
        }

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function GetAllGejalaNoFilter()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_gejala');

        $data = $this->db->get()->result_array();
        return $data;
    }

    public function insertGejala()
    {
    }

    public function GetCountGejala($search = "", $page = 1)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_gejala');
        if ($search != "") {
            $this->db->like('nama_gejala', $search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function FindGejala($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_gejala');
        $this->db->where('id_gejala', $id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
