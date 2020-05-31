<?php

class indexuser_model extends CI_Model{

    public function cekktp()
    {
        $getId = $this->session->userdata('session_id');
        $this->db->select('KTP');
        $this->db->where('ID_USER', $getId);
        $this->db->from('petani');
        return $this->db->get()->result_array();
    }
    public function cek_pesan_masuk()
    {
        $getId = $this->session->userdata('session_id');
        $query = $this->db->query("SELECT ID_PESAN from pemesanan, petani 
        where petani.ktp=pemesanan.ktp and pemesanan.ID_PESAN_STATUS=1 and petani.id_user='$getId'");
        return $query->result_array();   
    }
    public function cek_data()
    {
        $getId = $this->session->userdata('session_id');
        $query = $this->db->query("select * from petani where id_user='$getId'");
        return $query->result_array(); 
    }
    public function update_panen($ktp)
    {
        $this->db->query("update petani set ID_STATUS=1 WHERE KTP='$ktp'");
    }
    public function insert_panen($ktp, $tgl, $komoditas)
    {
        $data = [
            "KTP" => $ktp,
            "TGL_PANEN" => $tgl,
            "KOMODITAS" => $komoditas
        ];
        $this->db->insert('panen', $data);
    }
    public function cek_panen()
    {
        $id = $this->session->userdata('session_id');
        $query = $this->db->query("select * from panen, petani where petani.KTP=panen.KTP and HASIL=0 and petani.id_user='$id'");
        return $query->result_array();
    }

    public function data_panen($ktppetani)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date("Y");
        $data = [
            $this->db->query("SELECT SUM(HASIL_AWAL) as jan FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 01 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as feb FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 02 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as mar FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 03 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as apr FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 04 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as mei FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 05 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as jun FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 06 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as jul FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 07 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as ags FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 08 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as sep FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 09 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as okt FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 10 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as nov FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 11 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT SUM(HASIL_AWAL) as dess FROM panen WHERE KTP='$ktppetani' AND month(TGL_PANEN) = 12 and year(TGL_PANEN) = $tahun")->result_array()
        ];
        return $data;
    }
}

?>