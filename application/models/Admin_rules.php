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
        $this->db->from('tb_rules');

        if ($search != "") {
            $this->db->like('id_penyakit', $search);
        }

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function GetCountRules($search = "", $page = 1)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_rules');
        if ($search != "") {
            $this->db->like('id_penyakit', $search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function GetRuleData($search = "", $page = 1)
    {
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select("tb_rules.id_rules as id, tb_penyakit.id_penyakit as idPenyakit, tb_gejala.id_gejala as idGejala, kode_gejala, nama_gejala, nama_penyakit, nilai_mb, nilai_md, nilai_cf");
        $this->db->from("tb_rules");
        $this->db->join("tb_penyakit", "tb_penyakit.id_penyakit = tb_rules.id_penyakit");
        $this->db->join("tb_gejala", "tb_gejala.id_gejala = tb_rules.id_gejala");

        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function FindRules($id)
    {
        $this->load->database();
        $this->db->select("tb_rules.id_rules as id, tb_penyakit.id_penyakit as idPenyakit, tb_gejala.id_gejala as idGejala, nama_gejala, nama_penyakit, nilai_mb, nilai_md, nilai_cf");
        $this->db->from("tb_rules");
        $this->db->join("tb_penyakit", "tb_penyakit.id_penyakit = tb_rules.id_penyakit");
        $this->db->join("tb_gejala", "tb_gejala.id_gejala = tb_rules.id_gejala");
        $this->db->where('tb_rules.id_rules', $id);

        $data = $this->db->get()->result_array();
        return $data;
    }
}
