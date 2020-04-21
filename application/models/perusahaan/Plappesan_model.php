<?php

class Plappesan_model extends CI_Model{

    public function get_all()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $query = $this->db->query("SELECT * FROM pemesanan
                    INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                    INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                    INNER JOIN petani on petani.KTP = pemesanan.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS 
                    where year(TANGGAL)=year(current_date()) and pemesanan.ID_PESAN_STATUS = 2 and pemesanan.ID_PERUSAHAAN= $id_pengguna");
        
        return $query->result_array();
        
    }
    public function jumlahIndex()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $data = $this->db->query("SELECT SUM(JUMLAH_PESAN) as jumlah , SUM(TOTAL_BIAYA) as total FROM pemesanan
                    INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                    INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                    INNER JOIN petani on petani.KTP = pemesanan.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS
                    where year(TANGGAL)=year(current_date()) and pemesanan.ID_PESAN_STATUS = 2 and pemesanan.ID_PERUSAHAAN= $id_pengguna");

        return $data->result_array();
    }

    public function getBulan()
    {
        $query = $this->db->query('select month(TANGGAL) as bulan from pemesanan GROUP by month(TANGGAL)');
        return $query->result_array();   
    }

    public function sortTahun()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $bulanpilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT * FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS
                  where month(TANGGAL) = $bulanpilih AND year(TANGGAL)=year(current_date()) and pemesanan.ID_PESAN_STATUS = 2 and pemesanan.ID_PERUSAHAAN=$id_pengguna");
            
        return $data->result_array();
        
    }
    public function jumlahSortTahun()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $data = $this->db->query("SELECT SUM(JUMLAH_PESAN) as jumlah , SUM(TOTAL_BIAYA) as total FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS
                  where year(TANGGAL)=year(current_date()) and pemesanan.ID_PESAN_STATUS = 2 and pemesanan.ID_PERUSAHAAN=$id_pengguna");

        return $data->result_array();
    }

}

?>