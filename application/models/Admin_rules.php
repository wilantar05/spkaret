<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_rules extends CI_Model
{
    public function getAllRules($search = "", $page = 1)
    {
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('rules');

        if ($search != "") {
            $this->db->like('idPenyakit', $search);
        }

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getCountRules($search = "", $page = 1)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('rules');
        if ($search != "") {
            $this->db->like('idPenyakit', $search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function getRuleData($search = "", $page = 1)
    {
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select("rules.id as id, penyakit.id as idPenyakit, gejala.id as idGejala, NamaGejala, NamaPenyakit, nilaiMB, nilaiMD, nilaiCF");
        $this->db->from("rules");
        $this->db->join("penyakit", "penyakit.id = rules.idPenyakit");
        $this->db->join("gejala", "gejala.id = rules.idGejala");

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function findRules($id)
    {
        $this->load->database();
        $this->db->select("rules.id as id, penyakit.id as idPenyakit, gejala.id as idGejala, NamaGejala, NamaPenyakit, nilaiMB, nilaiMD, nilaiCF");
        $this->db->from("rules");
        $this->db->join("penyakit", "penyakit.id = rules.idPenyakit");
        $this->db->join("gejala", "gejala.id = rules.idGejala");
        $this->db->where('rules.id', $id);

        $data = $this->db->get()->result_array();
        return $data;
    }
}
