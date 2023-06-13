<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_penyakit extends CI_Model
{
    public function GetAllPenyakit($search = "", $page = 1)
    {
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_penyakit');

        if ($search != "") {
            $this->db->like('nama_penyakit', $search);
        }

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function GetAllPenyakitNoFilter()
    {
        // $limit = 10;
        // $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_penyakit');

        // if ($search != "") {
        //     $this->db->like('nama_penyakit', $search);
        // }

        // $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function GetCountPenyakit($search = "", $page = 1)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_penyakit');
        if ($search != "") {
            $this->db->like('nama_penyakit', $search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function FindPenyakit($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_penyakit');
        $this->db->where('id_penyakit', $id);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function FindPenyakitNama($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_penyakit');
        $this->db->where('nama_penyakit', $id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
