<?php

class ulappanen_model extends CI_Model
{

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
        $query = $this->db->query("SELECT panen.ID_PANEN, petani.KTP, panen.KOMODITAS, komoditas.NAMA_KOMODITAS, panen.TGL_PANEN, panen.HASIL_AWAL,panen.HASIL, panen.HARGA, panen.STATUS_PANEN 
        from panen, petani, komoditas 
        WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS and petani.KTP= $ktp");

        return $query->result_array();
    }
    public function jumlahIndex($ktp)
    {
        $data = $this->db->query("SELECT sum(panen.HASIL_AWAL) as jumlahawal, sum(panen.HASIL) as jumlahakhir
        from panen, petani, komoditas 
        WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND petani.KTP = $ktp");

        return $data->result_array();
    }

    public function getKomoditas()
    {
        $query = $this->db->query('select * from komoditas GROUP by NAMA_KOMODITAS');
        return $query->result_array();
    }

    public function sortKomoditas($ktp)
    {
        $pilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT panen.ID_PANEN, petani.KTP, panen.KOMODITAS, komoditas.NAMA_KOMODITAS, panen.TGL_PANEN, panen.HASIL_AWAL,panen.HASIL, panen.HARGA, panen.STATUS_PANEN 
        FROM panen, petani, komoditas 
        WHERE petani.KTP=panen.KTP AND komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND panen.KOMODITAS=$pilih and petani.KTP=$ktp");

        return $data->result_array();
    }
    public function jumlahSortKomoditas($ktp)
    {
        $pilih = $this->input->post("pilih");
        $data = $this->db->query("SELECT sum(panen.HASIL_AWAL) as jumlahawal, sum(panen.HASIL) as jumlahakhir
        FROM petani, panen, desa, kecamatan 
        WHERE desa.ID_KECAMATAN=kecamatan.ID_KECAMATAN 
        AND desa.ID_DESA=petani.ID_DESA AND petani.KTP=panen.KTP AND panen.KOMODITAS=$pilih and petani.KTP=$ktp");

        return $data->result_array();
    }
}
