<?php

class Kecamatan_model extends CI_Model{

    private $_table = "kecamatan";

    public $id;
    public $nama;
    
    public function get_all()
    {
        $query = $this->db->query('select * from kecamatan');
        return $query->result_array();   
    }

    public function tambahDataKecamatan()
    {
        
        $this->db->insert('kecamatan', $data);
    }

    public function hapusDataKecamatan($id)
    {
        $this->db->where('ID_KECAMATAN', $id);
        $this->db->delete('kecamatan');
    }

    public function getKecamatanById($id)
    {
        return $this->db->get_where('kecamatan', ['ID_KECAMATAN' => $id])->row_array();
    }

    public function ubahDataKecamatan($id)
    {
        $this->db->where('ID_KECAMATAN', $id);
        $this->db->update($this->_table, $data);
    } 
    
}
