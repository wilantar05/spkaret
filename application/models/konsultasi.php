<?php
defined('BASEPATH') or exit('No direct script access allowed');

class konsultasi extends CI_Model
{

    public function GetAllKonsultasi(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_konsultasi');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function GetRiwayatKonsultasi($id_user){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tb_konsultasi');
        $this->db->where('id_user',$id_user);
        $result = $this->db->get()->result_array();
        return $result;
    }

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
        $cfuser = [];

        $in = null;
        for ($i = 0; $i < count($gejala); $i++) {
            
            $cfuser[$gejala[$i]] = $usercf[$i];

            if ($i + 1 == count($gejala)) {
                $in .= $gejala[$i];
            } else {
                $in .= $gejala[$i] . ",";
            }
        }

        $query = $this->db->query("SELECT * from tb_rules WHERE id_gejala in ($in) ORDER BY `id_penyakit`");
        $result = $query->result();

        $resValue = json_decode(json_encode($result), true);
        $i = 0;
        $lastPenyakit = null;
        $idPenyakitList = [];
        $indexEnd = [];
        $cfpakar = [];
        
        $cfhe = [];
        foreach ($resValue as $key => $values) {
            if ($values['id_penyakit'] != $lastPenyakit) {
                $lastPenyakit = $values['id_penyakit'];
                if ($i - 1 != -1) array_push($indexEnd, $i - 1);
                array_push($idPenyakitList, $values['id_penyakit']);
            }
            // echo "id_gejala: " . $values['id_gejala'];
            // echo nl2br("\n");
            // echo "id_penyakit: " . $values['id_penyakit'];
            // echo nl2br("\n");
            // echo "nilai CF: " . $values['nilai_cf'] / 10;
            // echo nl2br("\n");

            // echo "nilai_user: " . $cfuser[$values['id_gejala']];

            // echo nl2br("\n");
            if ($i + 1 == count($resValue)) {
                array_push($indexEnd, $i);
            }
            $i++;
            
            array_push($cfhe,($values['nilai_cf']/10)*($cfuser[$values['id_gejala']]));
        }
        // echo nl2br("\n List Penyakit \n");
        // print_r($idPenyakitList);
        // echo nl2br("\n");

        // echo nl2br("\n Index End \n");
        // print_r($indexEnd);
        // echo nl2br("\n");

        // echo nl2br("\n CF User \n");
        // print_r($cfuser);
        // echo nl2br("\n");

        // echo nl2br("\n CF HE \n");
        // print_r($cfhe);

        // echo nl2br("\n Nilai CF \n");

        $cfk = [];
        for($i=0;$i<count($indexEnd);$i++){
            $n = 1;
            if($i> 0){
                $n = $indexEnd[$i-1]+1;
            }
            $cfTemp = 0;
            for($j = $n; $j<=$indexEnd[$i];$j++){
                
                if($j==1){
                    $cfTemp = $cfhe[$j-1] + $cfhe[$j] * (1 - $cfhe[$j-1]);
                }else{
                    $cfTemp = $cfTemp + $cfhe[$j] * (1-$cfTemp);
                }
                    
            }
            $cfk[$i] = $cfTemp;
        }
            $in2 = null;
        for ($i = 0; $i < count($idPenyakitList); $i++) {

            if ($i + 1 == count($idPenyakitList)) {
                $in2 .= $idPenyakitList[$i];
            } else {
                $in2 .= $idPenyakitList[$i] . ",";
            }
        }

        $hasilcf = [];
        // echo "in: " . $in2;
        // echo nl2br("\n In \n");

        $queryPenyakit = $this->db->query("SELECT nama_penyakit from tb_penyakit WHERE id_penyakit in ($in2)");
        $result = $queryPenyakit->result();
        $resValue = json_decode(json_encode($result), true);
        $x = 0;
        foreach($resValue as $key => $values){
            
            $hasilcf[$values['nama_penyakit']] = number_format((float)$cfk[$x]*100,2,',','') ;
            $x++;
        }

        $queryGejala = $this->db->query("SELECT nama_gejala from tb_gejala WHERE id_gejala in ($in)");
        $rawResult = $queryGejala->result();
        $resultGejala = json_decode(json_encode($rawResult), true);
        $gc = 0;
        $gejalaNameList = null;

        foreach($resultGejala as $key => $values){
            if($gc+1 == count($resultGejala)){
                $gejalaNameList .= $values['nama_gejala'];

            }else{
                $gejalaNameList .= $values['nama_gejala'] . ", ";

            }
            $gc++;
        }

        // $this->load->database();
        // $this->db->select('nama_gejala');
        // $this->db->from('tb_gejala');
        // $this->db->where_in('id_gejala',$in);
        // $resultGejala = $this->db->get()->result_array();
        // $hasilcf = arsort($hasilcf);
        //print_r(arsort($hasilcf));
        // echo nl2br("\n Penyakit \n");
        // print_r($result);
        // echo nl2br("\n Nilai CF \n");
        // print_r($cfk);
        $keyakinan = max($hasilcf);
        $penyakit = array_search($keyakinan, $hasilcf);
        $newRecord = array(
            'id_konsultasi' => '',
            'id_user'=>$this->input->post('id_user'),
            'nama' => $this->input->post('Nama'),
            'no_hp' => $this->input->post('NoHP'),
            'gejala' => $gejalaNameList,
            'penyakit' => $penyakit,
            'keyakinan' => $keyakinan . " %",
        );

        $this->db->insert('tb_konsultasi',$newRecord);

        $data['nama_penyakit'] = $result;
        $data['nilai_cf'] = $cfk;
        return $hasilcf;

    }

    
}
