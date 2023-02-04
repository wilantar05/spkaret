<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function getAllTransaksi($search = "",$page = 1){
        $limit = 10;
        $start = ($page * $limit) - $limit;

        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('member', 'transaksi.Id_Member = member.Id_Member');
        $this->db->where('transaksi.Status !=','-1');
        if($search != ""){
            $this->db->like('Nama',$search);
        }
        $this->db->limit($limit,$start);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getSelectTransaksi(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('admin', 'transaksi.Id_Admin = admin.Id_Admin');
        $this->db->where('transaksi.Status',1);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getCountTransaksiMember($idMember){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.Status','-1');
        $this->db->where('transaksi.Id_Member ',$idMember);
        $data = $this->db->count_all_results();
        return $data;
    }

    public function getCountDetailTransaksiMember($idMember){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'detail_transaksi.Id_Transaksi = transaksi.Id_Transaksi');
        $this->db->where('transaksi.Status','-1');
        $this->db->where('transaksi.Id_Member ',$idMember);
        $data = $this->db->count_all_results();
        return $data;
    }

    public function getTransaksiAktif($idMember){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.Status','-1');
        $this->db->where('transaksi.Id_Member ',$idMember);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getAllTransaksiMember($idMember){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.Status >','-1');
        $this->db->where('transaksi.Id_Member ',$idMember);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function getDetailTransaksiMember($idMember){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'detail_transaksi.Id_Transaksi = transaksi.Id_Transaksi');
        $this->db->join('barang', 'detail_transaksi.Id_Barang = barang.Id_Barang');
        $this->db->where('transaksi.Status','-1');
        $this->db->where('transaksi.Id_Member ',$idMember);
        $data = $this->db->get()->result_array();
        foreach ($data as $key => $value) {
            $data[$key]['Gambar'] = $this->Barang_model->getGambarBarang($value['Id_Barang']);
        }
        return $data;
    }

    public function getCountTransaksi($search = "",$page = 1){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('admin', 'transaksi.Id_Admin = admin.Id_Admin');
        if($search != ""){
            $this->db->like('Nama',$search);
        }
        $data = $this->db->count_all_results();
        return $data;
    }

    public function findTransaksi($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('Id_Transaksi',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function findTransaksiDetail($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('transaksi', 'detail_transaksi.Id_Transaksi = transaksi.Id_Transaksi');
        $this->db->join('barang', 'detail_transaksi.Id_Barang = barang.Id_Barang');
        $this->db->where('transaksi.Id_Transaksi ',$id);
        $data = $this->db->get()->result_array();
        foreach ($data as $key => $value) {
            $data[$key]['Gambar'] = $this->Barang_model->getGambarBarang($value['Id_Barang']);
        }
        return $data;
    }

    public function findPengiriman($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->where('Id_Transaksi',$id);
        $data = $this->db->get()->result_array();
        return $data;
    }
}
