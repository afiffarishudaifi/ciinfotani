<?php

class ptambah_data_model extends CI_Model{

    public function getAll()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $query = $this->db->query("SELECT Username, ID_PERUSAHAAN FROM perusahaan WHERE ID_PERUSAHAAN=$id_pengguna");
        return $query->result_array();
    }

    public function tambahData($gambar)
    {
        $post = $this->input->post();

        /*$this->NAMA_PERUSAHAAN = $post["namaperusahaan"];
        $this->EMAIL = $post["email"];
        $this->ALAMAT_PERUSAHAAN = $post['alamat'];
        $this->NO_TELP_PERUSAHAAN = $post["no"];
        $this->NAMA_MANAGER = $post['manager'];
        $this->LOGO = $gambar;
        //query ke database
        $this->db->where('ID_PERUSAHAAN', $post['id']);
        $this->db->update('perusahaan', $this);*/


        $EMAIL = $post["email"];
        $ALAMAT_PERUSAHAAN = $post['alamat'];
        $NO_TELP_PERUSAHAAN = $post["no"];
        $NAMA_MANAGER = $post['manager'];
        $LOGO = $gambar;
        $NAMA_PERUSAHAAN = $post['namaperusahaan'];
        $ID = $post['id'];

        $query = $this->db->query("UPDATE perusahaan set 
        NAMA_PERUSAHAAN='$NAMA_PERUSAHAAN', 
        EMAIL='$EMAIL', 
        ALAMAT_PERUSAHAAN='$ALAMAT_PERUSAHAAN', 
        NO_TELP_PERUSAHAAN='$NO_TELP_PERUSAHAAN', 
        NAMA_MANAGER='$NAMA_MANAGER', 
        LOGO = '$LOGO' 
        where ID_PERUSAHAAN='$ID'");

    }
}

?>