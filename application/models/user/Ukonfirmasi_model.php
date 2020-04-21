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
}

?>