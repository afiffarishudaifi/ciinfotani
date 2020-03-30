<?php

class Status_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query("select * from status");
        return $query->result_array();
        
    }

}
?>