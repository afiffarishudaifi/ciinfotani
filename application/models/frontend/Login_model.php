<?php

class Login_model extends CI_Model{

    function login($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('USERNAME', $user);
        $this->db->where('PASSWORD', $pass);
        $query = $this->db->get();
        return $query;
    }

    function cekKtp($iduser)
    {
        $query = $this->db->query("SELECT * FROM petani WHERE ID_USER = $iduser");
        return $query->result_array();
    }

    function loginPerusahaan($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->where('USERNAME', $user);
        $this->db->where('PASSWORD', $pass);
        $query = $this->db->get();
        return $query;
    }

}

?>