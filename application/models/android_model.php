<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class android_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function loginapi($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('USERNAME', $user);
        $this->db->where('PASSWORD', $pass);
        $query = $this->db->get();
        return $query;
    }
    function cek_user($user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('USERNAME', $user);
        $query = $this->db->get();
        return $query;
    }
    function cek_ktp($id_user){
        $this->db->select('*');
        $this->db->from('petani');
        $this->db->where('ID_USER', $id_user);
        $query = $this->db->get();
        return $query;
    }
    function registerapi($username,$password,$gambar){
            $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES (2,'$username','$password','$gambar')");
            return $hasil;
    }
    function update_petani($ktp, $data){
        $this->db->where('KTP', $ktp);
        $this->db->update('petani', $data);
    }
    function insert_petani($data){
        $this->db->insert('petani', $data);
    }
    function cek_petani($ktp,$id){
        $this->db->select('*');
        $this->db->from('petani');
        $this->db->where('KTP', $ktp);
        $this->db->where('ID_USER', $id);
        $query = $this->db->get();
        return $query;
    }

    //buat nampilin spinner desa
    function daftar_desa(){
        $this->db->select('*');
        $this->db->order_by('ID_DESA', 'ASC');
        $this->db->from('desa');
        return $this->db->get();
    }
    //buat nampilin spinner komoditas
    function daftar_komoditas(){
        $this->db->select('*');
        $this->db->order_by('ID_KOMODITAS', 'ASC');
        $this->db->from('komoditas');
        return $this->db->get();
    }
}