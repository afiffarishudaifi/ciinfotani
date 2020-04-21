<?php

class Panen_model extends CI_Model{
    public function cekPanen()
    {
        $getId = $this->session->userdata('session_id');
        /*$this->db->select('MAX(ID_PANEN) as max, panen.KTP, komoditas.NAMA_KOMODITAS, panen.TGL_PANEN, HASIL');
        $this->db->from('petani');
        $this->db->join('komoditas', 'komoditas.ID_KOMODITAS=petani.ID_KOMODITAS');
        $this->db->join('panen', 'petani.KTP=panen.KTP');
        $this->db->where(["petani.ID_USER" => $getId], ["HASIL" => 0]);
        return $this->db->get()->result_array();*/
        $query = $this->db->query("select MAX(ID_PANEN) as max, panen.KTP, komoditas.NAMA_KOMODITAS, panen.TGL_PANEN, HASIL from petani, panen, komoditas
                    WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS and petani.KTP=panen.KTP and petani.id_user= ".$getId." AND HASIL=0");
        return $query->result_array();
        
    }

    public function tambahPanen()
    {
        /*$awal = str_replace(".", "", $this->input->post('hasil'));
        $akhir = str_replace(".", "", $this->input->post('hasil'));
        $harga = str_replace(".", "", $this->input->post('harga'));
        $status = "Panen";
        $max = $this->input->post('max');
       
        $query = $this->db->query("UPDATE panen SET HASIL_AWAL=$awal,HASIL=$akhir, HARGA=$harga, STATUS_PANEN='$status' where ID_PANEN=$max");*/
        $data = [
            "HASIL_AWAL" => str_replace(".", "", $this->input->post('hasil')),
            "HASIL" => str_replace(".", "", $this->input->post('hasil')),
            "HARGA" => str_replace(".", "", $this->input->post('harga')),
            "STATUS_PANEN" => "Panen"
        ];
        $this->db->where('ID_PANEN', $this->input->post('max'));
        $this->db->update('panen', $data);
    }
}

?>