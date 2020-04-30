<?php

class Petani_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('SELECT petani.KTP, petani.ID_DESA, desa.NAMA_DESA as DESA, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as KOMODITAS, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP FROM komoditas, desa, petani, user, status WHERE komoditas.ID_KOMODITAS=petani.ID_KOMODITAS AND desa.ID_DESA=petani.ID_DESA AND status.ID_STATUS=petani.ID_STATUS and user.ID_USER=petani.ID_USER');
        return $query->result_array();
        
    }

    public function tambahDataPetani()
    {
        
        $this->db->insert('petani', $data);
    }

    public function tambahIdUser()
    {
        return $this->db->query('select * from user')->result_array();
    }

    public function tambahIdDesa()
    {
        return $this->db->query('select * from desa')->result_array();
    }

    public function tambahIdKomoditas()
    {
        return $this->db->query('select * from komoditas')->result_array();
    }

    public function tambahIdStatus()
    {
        return $this->db->query('select * from status')->result_array();
    }

    public function getPetaniById($id)
    {
        return $this->db->get_where('petani', ['KTP' => $id])->row_array();
    }

    public function ubahDataPetani($id)
    {

       
        $this->db->where('KTP', $id);
        $this->db->update('petani', $data);
    }

    public function hapusDataPetani($id)
    {
        $this->db->where('KTP', $id);
        $this->db->delete('petani');
    }
}

?>