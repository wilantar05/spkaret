<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function Login($username, $password)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('status', 1);
        $this->db->where('Username', $username);

        if ($this->db->count_all_results() > 0) {
            $this->db->reset_query();
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('status', 1);
            $this->db->where('Username', $username);
            $data = $this->db->get()->result_array();
            if (password_verify($password, $data[0]['Password'])) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function getAdmin($username)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('status', 1);
        $this->db->where('Username', $username);
        if ($this->db->count_all_results() > 0) {
            $this->db->reset_query();
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('status', 1);
            $this->db->where('Username', $username);
            $data = $this->db->get()->result_array();
            return $data;
        }
        return false;
    }

    public function getAllAdmin($search = "", $page = 1)
    {
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        if ($search != "") {
            $this->db->like('Nama', $search);
        }
        $this->db->limit($limit, $start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getSelectAdmin()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('Status', 1);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getCountAdmin($search = "", $page = 1)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        if ($search != "") {
            $this->db->like('Nama', $search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function findAdmin($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('Id_Admin', $id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
