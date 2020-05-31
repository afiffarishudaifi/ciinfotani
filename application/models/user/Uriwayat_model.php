<?php

class uriwayat_model extends CI_Model{

    public function getKtp()
    {
        $getId = $this->session->userdata('session_id');
        $this->db->select('KTP');
        $this->db->from('petani');
        $this->db->where('ID_USER', $getId);
        return $this->db->get()->result_array();
    }
    public function getAll($ktppetani)
    {
        $query = $this->db->query("SELECT ID_PESAN, ID_PERUSAHAAN, KTP, TANGGAL, JUMLAH_PESAN, TOTAL_BIAYA, STATUS_PESAN 
        FROM pemesanan, pesan 
        where pesan.ID_PESAN_STATUS=pemesanan.ID_PESAN_STATUS 
        and KTP=$ktppetani");
        return $query->result_array();
    }

    public function getPemesanan($idpesan)
    {
        $query = $this->db->query("select * from pemesanan where ID_PESAN = $idpesan");
        return $query->result_array();
    }
}

?>