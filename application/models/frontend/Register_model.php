<?php
class Register_model extends CI_Model{
    function input_data($data){
        $this->db->insert('user',$data);
    }
    function cek_petani($user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('USERNAME', $user);
        $query = $this->db->get();
        return $query;
    }
    
    function simpan_Petani($username,$password,$gambar){
        $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES (2,'$username','$password','$gambar')");
        return $hasil;
    }
    function cek_perusahaan($user)
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->where('USERNAME', $user);
        $query = $this->db->get();
        return $query;
    }
    function simpan_Perusahaan($username,$password,$gambar){
        $hasil=$this->db->query("INSERT INTO perusahaan(ID_LEVEL,USERNAME,PASSWORD,SIUP) VALUES (3,'$username','$password','$gambar')");
        return $hasil;
    }
}