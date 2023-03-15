<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman_model extends CI_Model
{
    public function getAllPengiriman($search = "",$page = 1){
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('transaksi.Tanggal ,pengiriman.Status, user.Nama, transaksi.Total_Transaksi, alamat.Alamat_Lengkap, pengiriman.Id_Pengiriman');
        $this->db->from('pengiriman');
        $this->db->join('alamat', 'pengiriman.Id_Alamat = alamat.Id_Alamat');
        $this->db->join('transaksi', 'pengiriman.Id_Transaksi = transaksi.Id_Transaksi');
        $this->db->join('user', 'transaksi.Id_User = user.Id_User');
        if($search != ""){
            $this->db->like('Nama',$search);
        }
        $this->db->limit($limit,$start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getSelectPengiriman(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->where('Status',1);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getCountPengiriman($search = "",$page = 1){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengiriman');
        if($search != ""){
            $this->db->like('Nama',$search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function findPengiriman($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->where('Id_Pengiriman',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
