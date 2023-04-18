<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{
    public function Login($username, $password)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('status', 1);
        $this->db->where('username', $username);

        if ($this->db->count_all_results() > 0) {
            $this->db->reset_query();
            $this->db->select('*');
            $this->db->from('tb_user');
            $this->db->where('status', 1);
            $this->db->where('username', $username);
            $data = $this->db->get()->result_array();
            if (password_verify($password, $data[0]['Password'])) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function GetUser($username)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('status', 1);
        $this->db->where('username', $username);
        if ($this->db->count_all_results() > 0) {
            $this->db->reset_query();
            $this->db->select('*');
            $this->db->from('tb_user');
            $this->db->where('status', 1);
            $this->db->where('Username', $username);
            $data = $this->db->get()->result_array();
            return $data;
        }
        return false;
    }

}