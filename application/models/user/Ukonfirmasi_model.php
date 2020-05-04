<?php

class Ukonfirmasi_model extends CI_Model{

    public function getAll($idpesan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('ID_PESAN', $idpesan);
        return $this->db->get()->result_array();
    }

    public function fixPemesanan()
    {
        $idpesan = $this->input->post('idpesan');
        $data = [
            "ID_PESAN_STATUS" => "2"
        ];
        $this->db->where('ID_PESAN', $idpesan);
        $this->db->update('pemesanan', $data);
    }

    public function hapusPemesanan()
    {
        $this->db->where('ID_PESAN', $this->input->post('idpesan'));
        $this->db->delete('pemesanan');
    }

    public function cekJumlah()
    {
        $post = $this->input->post();

        $id = $post['idperusahaan'];
        $ktp = $post['ktp'];
        $idpanen = $post['idpanen'];

        $result = $this->db->query("SELECT max(pemesanan.ID_PESAN), panen.HASIL 
        FROM panen, petani, pemesanan 
        WHERE petani.KTP=panen.KTP 
        AND petani.KTP=pemesanan.KTP 
        AND panen.ID_PANEN=$idpanen 
        AND pemesanan.KTP=$ktp 
        AND pemesanan.ID_PERUSAHAAN=$id");

        return $result->result_array();
    }

    public function setDataKurang($hasil)
    {
        $post = $this->input->post();

        $id = $post['idperusahaan'];
        $ktp = $post['ktp'];
        $idpanen = $post['idpanen'];

        $this->db->query("UPDATE panen, petani, pemesanan 
        set panen.hasil=$hasil 
        WHERE petani.KTP=panen.KTP 
        AND petani.KTP=pemesanan.KTP 
        AND panen.ID_PANEN=$idpanen 
        AND pemesanan.KTP=$ktp 
        AND pemesanan.ID_PERUSAHAAN=$id 
        AND pemesanan.ID_PESAN=(SELECT max(pemesanan.ID_PESAN) FROM pemesanan)");
    }
}

?>