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

        $resValue = json_decode(json_encode($result), true);
        $i = 0;
        $lastPenyakit = null;
        $idPenyakitList = [];
        $indexEnd = [];
        foreach ($resValue as $key => $values) {
            if ($values['id_penyakit'] != $lastPenyakit) {
                $lastPenyakit = $values['id_penyakit'];
                if ($i - 1 != -1) array_push($indexEnd, $i - 1);
                array_push($idPenyakitList, $values['id_penyakit']);
            }
            echo "id_penyakit: " . $values['id_penyakit'];
            echo nl2br("\n");
            echo "nilai CF: " . $values['nilai_cf'] / 10;
            echo nl2br("\n");
            if (isset($usercf[$i])) {
                echo "nilai_user: " . $usercf[$i];
            }
            echo nl2br("\n");
            $i++;
            if ($i + 1 == count($resValue)) {
                array_push($indexEnd, $i);
            }
        }
        print_r($idPenyakitList);
        print_r($indexEnd);
    }
}
