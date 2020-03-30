<?php

class Alappanen_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('SELECT petani.KTP, petani.NAMA_PETANI, 
        panen.TGL_PANEN, desa.NAMA_DESA, kecamatan.NAMA_KECAMATAN, panen.HASIL,panen.HASIL_AWAL 
        FROM petani, panen, desa, kecamatan 
        WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP');
        
        return $query->result_array();
        
    }
    public function jumlahIndex()
    {
        $data = $this->db->query("SELECT sum(panen.HASIL_AWAL)  as jumlah
        FROM petani, panen, desa, kecamatan 
        WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN 
        AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP");

        return $data->result_array();
    }

    public function getKomoditas()
    {
        $query = $this->db->query('select * from komoditas GROUP by NAMA_KOMODITAS');
        return $query->result_array();   
    }

    public function sortKomoditas()
    {
        $pilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT petani.KTP, petani.NAMA_PETANI, panen.TGL_PANEN, desa.NAMA_DESA, kecamatan.NAMA_KECAMATAN, panen.HASIL,panen.HASIL_AWAL 
        FROM petani, panen, desa, kecamatan 
        WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP AND panen.KOMODITAS=$pilih");
            
        return $data->result_array();
        
    }
    public function jumlahSortKomoditas()
    {
        $pilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT sum(panen.HASIL_AWAL)  as jumlah
        FROM petani, panen, desa, kecamatan 
        WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN 
        AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP AND panen.KOMODITAS=$pilih");

        return $data->result_array();
    }

}
