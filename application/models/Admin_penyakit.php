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
        $this->db->from('penyakit');

        if ($search != "") {
            $this->db->like('NamaPenyakit', $search);
        }

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function GetCountPenyakit($search = "", $page = 1)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('penyakit');
        if ($search != "") {
            $this->db->like('NamaPenyakit', $search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function FindPenyakit($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('penyakit');
        $this->db->where('id', $id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
