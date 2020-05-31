<?php

class ulappesan_model extends CI_Model{

    public function cekktp()
    {
        $getId = $this->session->userdata('session_id');
        $this->db->select('KTP');
        $this->db->where('ID_USER', $getId);
        $this->db->from('petani');
        return $this->db->get()->result_array();
    }
    public function get_all($ktp)
    {
        $query = $this->db->query("SELECT pemesanan.ID_PESAN, pemesanan.ID_PERUSAHAAN, perusahaan.NAMA_PERUSAHAAN, petani.KTP, pemesanan.TANGGAL, pemesanan.JUMLAH_PESAN, pemesanan.TOTAL_BIAYA, pemesanan.ID_PESAN_STATUS, pemesanan.ID_PANEN 
        from pemesanan, perusahaan, petani 
        WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP and pemesanan.KTP=$ktp");
        
        return $query->result_array();
        
    }
    public function jumlahIndex($ktp)
    {
        $data = $this->db->query("SELECT sum(pemesanan.JUMLAH_PESAN) as jumlah 
        from pemesanan, perusahaan, petani 
        WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP and pemesanan.KTP=$ktp");

        return $data->result_array();
    }

    public function getTahun()
    {
        $query = $this->db->query('select year(TANGGAL) as tahun from pemesanan GROUP by year(TANGGAL) ');
        return $query->result_array();   
    }

    public function sortTahun($ktp)
    {
        $tahunpilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT pemesanan.ID_PESAN, pemesanan.ID_PERUSAHAAN, perusahaan.NAMA_PERUSAHAAN, petani.KTP, pemesanan.TANGGAL, pemesanan.JUMLAH_PESAN, pemesanan.TOTAL_BIAYA, pemesanan.ID_PESAN_STATUS, pemesanan.ID_PANEN 
        from pemesanan, perusahaan, petani 
        WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP AND year(TANGGAL)=$tahunpilih and pemesanan.KTP=$ktp");
            
        return $data->result_array();
        
    }
    public function jumlahSortTahun($ktp)
    {
        $tahunpilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT sum(pemesanan.JUMLAH_PESAN) as jumlah
        from pemesanan, perusahaan, petani 
        WHERE pemesanan.ID_PERUSAHAAN=perusahaan.ID_PERUSAHAAN AND pemesanan.KTP=petani.KTP AND year(TANGGAL)=$tahunpilih and pemesanan.KTP=$ktp");

        return $data->result_array();
    }

}
