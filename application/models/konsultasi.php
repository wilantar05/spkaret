<?php
defined('BASEPATH') or exit('No direct script access allowed');

class konsultasi extends CI_Model
{
    public function GetDetailKonsultasi()
    {
        $gejala = $this->input->post('gejala');
        return $gejala;
    }

    public function GetNamaGejala()
    {
        $this->load->database();
        $gejala = $this->input->post('gejala');
        $namaGejala = array();
        $in = null;
        for ($i = 0; $i < count($gejala); $i++) {
            if ($i + 1 == count($gejala)) {
                $in .= $gejala[$i];
            } else {
                $in .= $gejala[$i] . ",";
            }
        }
        $query = $this->db->query("SELECT id_gejala, nama_gejala as NamaGejala from tb_gejala WHERE id_gejala in ($in)");
        $result = $query->result();
        return $result;
    }

    public function HitungCF()
    {
        $this->load->database();
        $gejala = $this->input->post('gejala');
        $usercf = $this->input->post('usercf');

        $in = null;
        for ($i = 0; $i < count($gejala); $i++) {
            if ($i + 1 == count($gejala)) {
                $in .= $gejala[$i];
            } else {
                $in .= $gejala[$i] . ",";
            }
        }
        $query = $this->db->query("SELECT * from tb_rules WHERE id_gejala in ($in)");
        $result = $query->result();
        print_r($result);
        // for ($i = 0; $i < count($gejala); $i++) {

        // }
    }
}
