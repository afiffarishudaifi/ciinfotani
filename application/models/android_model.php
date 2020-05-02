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
    function registerapi($username,$password,$gambar){
            $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES (2,'$username','$password','$gambar')");
            return $hasil;
    }
}