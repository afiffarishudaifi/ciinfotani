<?php

class Petani_model extends CI_Model{

    public function cekktp()
    {
        $getId = $this->session->userdata('session_id');
        $this->db->select('KTP');
        $this->db->where('ID_USER', $getId);
        $this->db->from('petani');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function cekPanen()
    {
        $getId = $this->session->userdata('session_id');
        $this->db->select('KTP');
        $this->db->where(['ID_USER' => $getId],["ID_STATUS" => 1]);
        $this->db->group_by('KTP');
        $this->db->from('petani');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function cek_user()
    {
        $getId = $this->session->userdata('session_id');
        $query = $this->db->query("SELECT USERNAME, ID_USER FROM USER WHERE ID_USER = $getId");
        return $query->result_array();
    }
    public function getKomoditas()
    {
        $this->db->select('*');
        $this->db->from('komoditas');
        return $this->db->get()->result_array();
    }
    public function getDesa()
    {
        $this->db->select('*');
        $this->db->from('desa');
        return $this->db->get()->result_array();
    }
    public function getStatus()
    {
        $this->db->select('*');
        $this->db->from('status');
        return $this->db->get()->result_array();
    }

    

    public function dataPetaniPanen()
    {
        $getId = $this->session->userdata('session_id');
        $this->db->select('petani.KTP as KTP, user.username as username, petani.ID_DESA, desa.NAMA_DESA as desa, petani.ID_KOMODITAS, komoditas.NAMA_KOMODITAS as komoditas, petani.ID_USER, user.USERNAME, petani.ID_STATUS, status.STATUS, petani.NAMA_PETANI, petani.ALAMAT_PETANI, petani.LUAS_SAWAH, petani.ALAMAT_SAWAH, petani.TANAM, petani.PANEN, petani.NO_HP');
        $this->db->from('petani');
        $this->db->join('komoditas', 'komoditas.ID_KOMODITAS=petani.ID_KOMODITAS');
        $this->db->join('user', 'user.ID_USER=petani.ID_USER');
        $this->db->join('desa', 'desa.ID_DESA=petani.ID_DESA');
        $this->db->join('status', 'status.ID_STATUS=petani.ID_STATUS');
        $this->db->where(['petani.ID_USER' => $getId], ["petani.ID_STATUS" => 2]);
        $this->db->group_by('petani.KTP');
        
        return $this->db->get()->result_array();
    }

    public function lengkapiData()
    {
        $data = [
            "KTP" => $this->input->post('KTP'),
            "ID_DESA" => $this->input->post('iddesa'),
            "ID_KOMODITAS" => $this->input->post('idkomoditas'),
            "ID_USER" => $this->input->post('iduser'),
            "ID_STATUS" => $this->input->post('idstatus'),
            "NAMA_PETANI" => $this->input->post('namapetani'),
            "ALAMAT_PETANI" => $this->input->post('alamatpetani'),
            "LUAS_SAWAH" => $this->input->post('luassawah'),
            "ALAMAT_SAWAH" => $this->input->post('alamatsawah'),
            "TANAM" => $this->input->post('tgltanam'),
            "PANEN" => $this->input->post('tglpanen'),
            "NO_HP" => $this->input->post('nohp')
        ];
        $this->db->insert('petani', $data);
    }

    public function update()
    {

        $this->db->where('ID_USER', $id);
        $this->db->update('petani', $data);
    }
}

?>