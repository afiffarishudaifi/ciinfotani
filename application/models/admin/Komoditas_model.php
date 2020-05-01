<?php

class Komoditas_model extends CI_Model{

    private $_table = "komoditas";

    public $id;
    public $nama;

    
    public function get_all()
    {
        $query = $this->db->query('select * from komoditas');
        return $query->result_array();   
    }

    public function tambahDataKomoditas()
    {
        
        $this->db->insert($this->_table, $data);

    }
    public function hapusDataKomoditas($id)
    {
        $this->db->where('ID_KOMODITAS', $id);
        $this->db->delete('komoditas');
    }

    public function getKomoditasById($id)
    {
        //$this->db->where('ID_KOMODITAS', $id);
        //return $this->db->select('komoditas')->row_array();
        return $this->db->get_where('komoditas', ['ID_KOMODITAS' => $id])->row_array();
    }
    public function ubahDataKomoditas($id)
    {
        
        $this->db->where('ID_KOMODITAS', $this->input->post('idkomoditas'));
        $this->db->update($this->_table, $data);
    }
}
?>