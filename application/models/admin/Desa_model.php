<?php

class desa_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('select * from desa');
        return $query->result_array();   
    }

    public function tambahDataDesa()
    {
        $data = [
            "NAMA_DESA" => $this->input->post('namadesa'),
            "ID_KECAMATAN" => $this->input->post('idkecamatan')
        ];
        $this->db->insert('desa', $data);
    }

    public function tampilIdKecamatan()
    {
        $query = $this->db->query('select * from kecamatan');
        return $query->result_array();
    }

    public function getDesaById($id)
    {
        return $this->db->get_where('desa', ['ID_DESA' => $id])->row_array();
    }

    public function ubahDataDesa($id)
    {
        $data = [
            "NAMA_DESA" => $this->input->post('namadesa'),
        ];
        $this->db->where('ID_DESA', $id);
        $this->db->update('desa', $data);
    }

    public function cekKeberadaan($id)
    {
        $this->db->select("KTP");
        $this->db->from("petani");
        $this->db->where("ID_DESA", $id);
        return $this->db->get()->result_array();
    }
    
    public function hapusDataDesa($id)
    {
        $this->db->where('ID_DESA', $id);
        $this->db->delete('desa');
    }
}
?>