<?php

class Admin_model extends CI_Model{

    private $_table = "kecamatan";
    public function jumDesa()
    {
        $data = $this->db->query('select count(*) as jumlah from desa');
        return $data->result_array();
    }
    public function jumKomoditas()
    {
        $data = $this->db->query('select count(*) as jumlah from komoditas');
        return $data->result_array();
    }
    public function jumUser()
    {
        $data = $this->db->query('select count(*) as jumlah from user');
        return $data->result_array();
    }
    public function jumPengusaha()
    {
        $data = $this->db->query('select count(*) as jumlah from perusahaan');
        return $data->result_array();
    }

    public function dataPanen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");
        $tgl = date("d");
        $tahun = date("Y");
        $data = [
            $this->db->query("SELECT count(*) as jan FROM panen WHERE month(TGL_PANEN) = 01 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as feb FROM panen WHERE month(TGL_PANEN) = 02 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as mar FROM panen WHERE month(TGL_PANEN) = 03 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as apr FROM panen WHERE month(TGL_PANEN) = 04 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as mei FROM panen WHERE month(TGL_PANEN) = 05 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as jun FROM panen WHERE month(TGL_PANEN) = 06 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as jul FROM panen WHERE month(TGL_PANEN) = 07 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as ags FROM panen WHERE month(TGL_PANEN) = 08 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as sep FROM panen WHERE month(TGL_PANEN) = 09 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as okt FROM panen WHERE month(TGL_PANEN) = 10 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as nov FROM panen WHERE month(TGL_PANEN) = 11 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as dess FROM panen WHERE month(TGL_PANEN) = 12 and year(TGL_PANEN) = $tahun")->result_array()
        ];
        /*[
            "jan" => $this->db->query("SELECT count(*) as 'jan' FROM panen WHERE month(TGL_PANEN) = 01 and year(TGL_PANEN) = $tahun")->result_array()
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 02 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 03 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 04 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 05 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 06 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 07 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 08 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 09 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 10 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 11 and year(TGL_PANEN) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) FROM panen WHERE month(TGL_PANEN) = 12 and year(TGL_PANEN) = $tahun")->result_array()
        ];*/
        //return var_dump($data);
        return $data;
    }
    public function dataPemesanan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date("Y");
        $data = [
            $this->db->query("SELECT count(*) as jan FROM pemesanan WHERE month(TANGGAL) = 01 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as feb FROM pemesanan WHERE month(TANGGAL) = 02 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as mar FROM pemesanan WHERE month(TANGGAL) = 03 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as apr FROM pemesanan WHERE month(TANGGAL) = 04 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as mei FROM pemesanan WHERE month(TANGGAL) = 05 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as jun FROM pemesanan WHERE month(TANGGAL) = 06 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as jul FROM pemesanan WHERE month(TANGGAL) = 07 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as ags FROM pemesanan WHERE month(TANGGAL) = 08 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as sep FROM pemesanan WHERE month(TANGGAL) = 09 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as okt FROM pemesanan WHERE month(TANGGAL) = 10 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as nov FROM pemesanan WHERE month(TANGGAL) = 11 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT count(*) as dess FROM pemesanan WHERE month(TANGGAL) = 12 and year(TANGGAL) = $tahun")->result_array()
        ];
        return $data;
    }

}

?>