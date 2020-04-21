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