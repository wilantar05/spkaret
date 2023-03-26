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
        $query = $this->db->query("SELECT NamaGejala from gejala WHERE id in ($in)");
        $result = $query->result();
        return $result;
    }
}
