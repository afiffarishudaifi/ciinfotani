<?php

class Lupa_model extends CI_Model{

    function cek_petani($user, $nohp)
    {
        $this->db->select('USERNAME');
        $this->db->from('user');
        $this->db->join('petani','petani.ID_USER=user.ID_USER');
        $this->db->where('USERNAME', $user);
        $this->db->where('NO_HP', $nohp);
        $query = $this->db->get();
        return $query;
    }
    function cek_pengusaha($user, $email)
    {
        $this->db->select('*');
        $this->db->from('perusahaan');
        $this->db->where('USERNAME', $user);
        $this->db->where('EMAIL', $email);
        $query = $this->db->get();
        return $query;
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}

?>