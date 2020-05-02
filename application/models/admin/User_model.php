<?php

class User_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('select * from user');
        return $query->result_array();
        
    }
    function simpan_user($id_level,$username,$password,$gambar){
        $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES ($id_level,'$username','$password','$gambar')");
        return $hasil;
    }
    public function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('user',$data);
    }
    public function cek_id($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID_USER', $id);
        $query = $this->db->get();
        return $query;
    }
    public function ambil_foto($id){
        $this->db->from('user');
        $this->db->where('ID_USER',$id);
        $result = $this->db->get('');
        if($result->num_rows()>0){
            return $result->row();
        }
    }

    public function tambahIdLevel()
    {
        $query = $this->db->query('select * from level');
        return $query->result_array();
        
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['ID_USER' => $id])->row_array();
    }

    public function cekKeberadaan($id)
    {
        $this->db->select("KTP");
        $this->db->from("petani");
        $this->db->where("ID_USER", $id);
        return $this->db->get()->result_array();
    }

    public function hapusDataUser($id)
    {
        return $this->db->delete('user', array("ID_USER" => $id));
    }
}

?>