<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class android_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function loginapi($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('USERNAME', $user);
        $this->db->where('PASSWORD', $pass);
        $query = $this->db->get();
        return $query;
    }
    function cek_user($user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('USERNAME', $user);
        $query = $this->db->get();
        return $query;
    }
    function cek_ktp($id_user){
        $this->db->select('*');
        $this->db->from('petani');
        $this->db->where('ID_USER', $id_user);
        $query = $this->db->get();
        return $query;
    }
    function registerapi($username,$password,$gambar){
            $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES (2,'$username','$password','$gambar')");
            return $hasil;
    }
    function update_petani($ktp, $data){
        $this->db->where('KTP', $ktp);
        $this->db->update('petani', $data);
    }
    function insert_petani($data){
        $this->db->insert('petani', $data);
    }
    function cek_petani($ktp,$id){
        $this->db->select('*');
        $this->db->from('petani');
        $this->db->where('KTP', $ktp);
        $this->db->where('ID_USER', $id);
        $query = $this->db->get();
        return $query;
    }
    function cek_desaKomoditas($desa,$komoditas){
        $hasil = $this->db->query("SELECT * FROM desa,komoditas where ID_DESA = $desa AND ID_KOMODITAS = $komoditas");
        return $hasil;
    }

    //buat nampilin spinner desa
    function daftar_desa(){
        $this->db->select('*');
        $this->db->order_by('ID_DESA', 'ASC');
        $this->db->from('desa');
        return $this->db->get();
    }
    //buat nampilin spinner komoditas
    function daftar_komoditas(){
        $this->db->select('*');
        $this->db->order_by('ID_KOMODITAS', 'ASC');
        $this->db->from('komoditas');
        return $this->db->get();
    }
    
    //tambah panen
    function insert_panen($data){
        $this->db->insert('panen', $data);
    }

    function cek_panen($ktp){
        $hasil = $this->db->query("SELECT * FROM panen,komoditas where panen.KOMODITAS = komoditas.ID_KOMODITAS AND KTP = $ktp");
        return $hasil;
    }
    function cek_fillpanen($ktp,$tglpanen){
        $hasil = $this->db->query("SELECT * FROM panen where KTP = $ktp AND TGL_PANEN = '$tglpanen'");
        return $hasil;
    }
    function sum_hasilSisa($ktp){
        $hasil = $this->db->query("SELECT SUM(HASIL_AWAL) as jmhasil, SUM(HASIL) as jmsisa FROM panen where KTP = $ktp");
        return $hasil;
    }
    function cek_panenTahun($ktp,$tgl){
        $hasil = $this->db->query("SELECT * FROM panen,komoditas where panen.KOMODITAS = komoditas.ID_KOMODITAS AND KTP = $ktp AND year(TGL_PANEN) = $tgl ");
        return $hasil;
    }
    function sum_hasilSisaTahun($ktp,$tgl){
        $hasil = $this->db->query("SELECT SUM(HASIL_AWAL) as jmhasil, SUM(HASIL) as jmsisa FROM panen where KTP = $ktp AND year(TGL_PANEN) = $tgl ");
        return $hasil;
    }

    //riwayat_pemesanan
    function cek_pemesanan($ktp,$stat){
        $hasil = $this->db->query("SELECT ID_PESAN, perusahaan.NAMA_PERUSAHAAN, TANGGAL, JUMLAH_PESAN, TOTAL_BIAYA, ID_PESAN_STATUS, pemesanan.ID_PANEN, komoditas.NAMA_KOMODITAS 
        FROM pemesanan,panen,komoditas, perusahaan where pemesanan.ID_PERUSAHAAN = perusahaan.ID_PERUSAHAAN AND pemesanan.ID_PANEN = panen.ID_PANEN 
        and panen.KOMODITAS = komoditas.ID_KOMODITAS and pemesanan.KTP = $ktp AND ID_PESAN_STATUS = $stat");
        return $hasil;
    }
    function sum_pemesanan($ktp,$stat){
        $hasil = $this->db->query("SELECT SUM(JUMLAH_PESAN) as jmpesan, SUM(TOTAL_BIAYA) as totbiaya FROM pemesanan where KTP = $ktp AND ID_PESAN_STATUS = $stat");
        return $hasil;
    }
    function cek_pemesananTahun($ktp,$tahun,$stat){
        $hasil = $this->db->query("SELECT ID_PESAN, perusahaan.NAMA_PERUSAHAAN, TANGGAL, JUMLAH_PESAN, TOTAL_BIAYA, ID_PESAN_STATUS, pemesanan.ID_PANEN, komoditas.NAMA_KOMODITAS 
        FROM pemesanan,panen,komoditas, perusahaan where pemesanan.ID_PERUSAHAAN = perusahaan.ID_PERUSAHAAN AND pemesanan.ID_PANEN = panen.ID_PANEN 
        and panen.KOMODITAS = komoditas.ID_KOMODITAS and pemesanan.KTP = $ktp AND year(TANGGAL)=$tahun AND ID_PESAN_STATUS = $stat");
        return $hasil;
    }
    function sum_pemesananTahun($ktp,$tahun,$stat){
        $hasil = $this->db->query("SELECT SUM(JUMLAH_PESAN) as jmpesan, SUM(TOTAL_BIAYA) as totbiaya FROM pemesanan where KTP = $ktp AND year(TANGGAL)=$tahun AND ID_PESAN_STATUS = $stat");
        return $hasil;
    }
    function konfirmasi_pemesanan($id, $data)
    {
        $this->db->where('ID_PESAN', $id);
        $this->db->update('pemesanan', $data);
    }
    //cari petani
    function cari_petani($user, $nohp)
    {
        $this->db->select('user.ID_USER');
        $this->db->from('user');
        $this->db->join('petani', 'petani.ID_USER=user.ID_USER');
        $this->db->where('USERNAME', $user);
        $this->db->where('NO_HP', $nohp);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function update_data($user, $data)
    {
        $this->db->where('ID_USER', $user);
        $this->db->update('user', $data);
    }

    function update_datas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}