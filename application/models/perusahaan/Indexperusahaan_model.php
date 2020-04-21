<?php

class Indexperusahaan_model extends CI_Model{

    public function cekKelengkapan()
    {
        $getId = $this->session->userdata('session_id_perusahaan');
        $this->db->select('*');
        $this->db->where(['ID_PERUSAHAAN' => $getId], ['NAMA_PERUSAHAAN !=', " "],
            ['NAMA_PERUSAHAAN !=', " "],
            ['EMAIL !=', " "],
            ['ALAMAT_PERUSAHAAN !=', " "],
            ['NO_TELP_PERUSAHAAN !=', " "],
            ['NAMA_MANAGER !=', " "]);
        $this->db->from('perusahaan');
        return $this->db->get()->result_array();
    }
    public function dataPemesanan()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date("Y");
        $data = [
            $this->db->query("SELECT COUNT(*) as jan FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 01 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as feb FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 02 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as mar FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 03 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as apr FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 04 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as mei FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 05 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as jun FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 06 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as jul FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 07 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as ags FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 08 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as sep FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 09 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as okt FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 10 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as nov FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 11 and year(TANGGAL) = $tahun")->result_array(),
            $this->db->query("SELECT COUNT(*) as dess FROM pemesanan WHERE id_perusahaan= $id_pengguna AND month(TANGGAL) = 12 and year(TANGGAL) = $tahun")->result_array()
        ];
        return $data;
    }
}

?>