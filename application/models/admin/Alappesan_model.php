<?php

class Alappesan_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('SELECT * FROM pemesanan
                    INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                    INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                    INNER JOIN petani on petani.KTP = pemesanan.KTP
                    INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                    INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS');
        
        return $query->result_array();
        
    }
    public function jumlahIndex()
    {
        $data = $this->db->query("SELECT SUM(JUMLAH_PESAN) as jumlah , SUM(TOTAL_BIAYA) as total FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS");

        return $data->result_array();
    }

    public function getTahun()
    {
        $query = $this->db->query('select year(TANGGAL) as tahun from pemesanan GROUP by year(TANGGAL) ');
        return $query->result_array();   
    }

    public function sortTahun()
    {
        $tahunpilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT * FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS
                   where year(TANGGAL)=$tahunpilih");
            
        return $data->result_array();
        
    }
    public function jumlahSortTahun()
    {
        $tahunpilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT SUM(JUMLAH_PESAN) as jumlah , SUM(TOTAL_BIAYA) as total FROM pemesanan
                  INNER JOIN panen on panen.ID_PANEN = pemesanan.ID_PANEN
                  INNER JOIN perusahaan on perusahaan.ID_PERUSAHAAN = pemesanan.ID_PERUSAHAAN
                  INNER JOIN petani on petani.KTP = pemesanan.KTP
                  INNER JOIN komoditas on komoditas.ID_KOMODITAS = panen.KOMODITAS
                  INNER JOIN pesan on pesan.ID_PESAN_STATUS = pemesanan.ID_PESAN_STATUS
                   where year(TANGGAL)=$tahunpilih");

        return $data->result_array();
    }

}

?>