<?php

class Ppemesanan_model extends CI_Model{

    public function getAll()
    {

    }
    public function getPesanan($id,$tgl){ //menampilkan data sesuai id 
        $this->db->select('*');
            $this->db->join('petani','petani.KTP=panen.KTP','inner');
            $this->db->join('komoditas','komoditas.ID_KOMODITAS=panen.KOMODITAS','inner');
            $this->db->join('desa','desa.ID_DESA=petani.ID_DESA','inner');
            $this->db->join('kecamatan','kecamatan.ID_KECAMATAN=desa.ID_KECAMATAN','inner');
            $this->db->where('panen.ID_PANEN',$id);
            $this->db->where('panen.TGL_PANEN',$tgl);
            $this->db->where('panen.HASIL != 0');
            $query=$this->db->get('panen');

            return $query->result();
    }
    public function getUsaha($id){
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->where('ID_PERUSAHAAN', $id);
        $query = $this->db->get();
        return $query;
    }
    public function insertPesanan($data){
            $this->db->insert('pemesanan',$data);
    }
    public function kurangHasil($where,$data1){
            $this->db->where($where);
            $this->db->update('panen',$data1);
    }
    // public function insertPemesanan()
    // { 
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tgl = date("Y-m-d");
    //     $post = $this->input->post();

    //     $this->ID_PERUSAHAAN = $post['idperusahaan'];
    //     $this->KTP = $post['ktp'];
    //     $this->TANGGAL = $tgl;
    //     $jumlah = $post['jmlpesan'];
    //     $this->JUMLAH_PESAN = str_replace(".", "", $jumlah);
    //     $total = $post['total'];
    //     $this->TOTAL_BIAYA = str_replace(".", "", $total);
    //     $this->ID_PESAN_STATUS = "1";
    //     $this->ID_PANEN = $post['idpanen'];

    //     $this->db->insert('pemesanan', $this);

    // }

    // public function cekJumlah($idpanen,$ktp,$id)
    // {
    //     $post = $this->input->post();

    //     $id = $post['idperusahaan'];
    //     $ktp = $post['ktp'];
    //     $idpanen = $post['idpanen'];

    //     $result = $this->db->query("SELECT max(pemesanan.ID_PESAN), panen.HASIL 
    //     FROM panen, petani, pemesanan 
    //     WHERE petani.KTP=panen.KTP 
    //     AND petani.KTP=pemesanan.KTP 
    //     AND panen.ID_PANEN=$idpanen 
    //     AND pemesanan.KTP=$ktp 
    //     AND pemesanan.ID_PERUSAHAAN=$id");

    //     return $result->result_array();   
    // }

    // public function setDataKurang($hasil)
    // {
    //     $post = $this->input->post();

    //     $id = $post['idperusahaan'];
    //     $ktp = $post['ktp'];
    //     $idpanen = $post['idpanen'];

    //     $this->db->query("UPDATE panen, petani, pemesanan 
    //     set panen.hasil=$hasil 
    //     WHERE petani.KTP=panen.KTP 
    //     AND petani.KTP=pemesanan.KTP 
    //     AND panen.ID_PANEN=$idpanen 
    //     AND pemesanan.KTP=$ktp 
    //     AND pemesanan.ID_PERUSAHAAN=$id 
    //     AND pemesanan.ID_PESAN=(SELECT max(pemesanan.ID_PESAN) FROM pemesanan)");

    // }

}

?>