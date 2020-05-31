<?php

class priwayat_model extends CI_Model{

    public function getAll()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $query = $this->db->query("SELECT * FROM pemesanan
                    INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                    INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                    INNER JOIN petani on petani.KTP = pemesanan.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS 
                    where pemesanan.ID_PERUSAHAAN= $id_pengguna");
        return $query->result_array();
        
    }
    public function getPemesanan($idpesan)
    {
        $query = $this->db->query("select * from pemesanan where ID_PESAN = $idpesan");
        return $query->result_array();
    }
    public function fixPemesanan()
    {
        $idpanen = $this->input->post('idpanen');
        $ktp = $this->input->post('ktp');
        $idperusahaan = $this->input->post('idperusahaan');
        $id = $this->input->post('idhapus');

        $query = $this->db->query("SELECT * FROM panen, petani, pemesanan 
        WHERE petani.KTP=panen.KTP 
        AND petani.KTP=pemesanan.KTP 
        AND panen.ID_PANEN=$idpanen 
        AND pemesanan.KTP=$ktp 
        AND pemesanan.ID_PERUSAHAAN=$idperusahaan 
        AND pemesanan.ID_PESAN='$id'");
        return $query->result_array();
        
    }

    public function setDataJumlah($hasil)
    {
        $idpanen = $this->input->post('idpanen');
        $ktp = $this->input->post('ktp');
        $idperusahaan = $this->input->post('idperusahaan');
        $id = $this->input->post('idhapus');

        $this->db->query("UPDATE panen, petani, pemesanan set panen.hasil=$hasil 
        WHERE petani.KTP=panen.KTP 
        AND petani.KTP=pemesanan.KTP 
        AND panen.ID_PANEN=$idpanen 
        AND pemesanan.KTP=$ktp 
        AND pemesanan.ID_PERUSAHAAN=$idperusahaan 
        AND pemesanan.ID_PESAN='$id'");
    }

    public function hapusPesan()
    {
        $id = $this->input->post('idhapus');
        $this->db->where('ID_PESAN', $id);
        $this->db->delete('pemesanan');
    }
}

?>