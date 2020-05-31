<?php

class pengaturan_model extends CI_Model{

    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function cek_pass($id,$passlama,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID_USER', $id);
        $this->db->where('PASSWORD', $passlama);
        $query = $this->db->get();
        return $query;
    }
    public function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('user',$data);
    }
}

?>