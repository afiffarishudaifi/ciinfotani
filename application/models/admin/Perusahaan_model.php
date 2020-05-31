<?php

class perusahaan_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('select * from perusahaan');
        return $query->result_array();
        
    }
    public function ambil_foto($id){
        $this->db->from('perusahaan');
        $this->db->where('ID_PERUSAHAAN',$id);
        $result = $this->db->get('');
        if($result->num_rows()>0){
            return $result->row();
        }
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    public function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('perusahaan',$data);
    }
    public function cek_id($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID_PERUSAHAAN', $id);
        $query = $this->db->get();
        return $query;
    }
    public function getPerusahaanById($id)
    {
        return $this->db->get_where('perusahaan', ['ID_PERUSAHAAN' => $id])->row_array();
    }

    public function cekKeberadaan($id)
    {
        $this->db->select("ID_PESAN");
        $this->db->from("pemesanan");
        $this->db->where("ID_PERUSAHAAN", $id);
        return $this->db->get()->result_array();
    }
    public function hapusDataPerusahaan($id)
    {
        $this->db->where('ID_PERUSAHAAN', $id);
        $this->db->delete('perusahaan');
    }
}

?>