<?php

class Level_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query("select * from level");
        return $query->result_array();
    }
}

?>