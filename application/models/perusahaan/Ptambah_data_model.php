<?php

class Ptambah_data_model extends CI_Model{

    public function getAll()
    {
        $id_pengguna = $this->session->userdata('session_id_perusahaan');
        $query = $this->db->query("SELECT Username, ID_PERUSAHAAN FROM perusahaan WHERE ID_PERUSAHAAN=$id_pengguna");
        return $query->result_array();
    }

    public function tambahData()
    {
        $post = $this->input->post();

        $this->NAMA_PERUSAHAAN = $post["namaperusahaan"];
        $this->EMAIL = $post["email"];
        $this->ALAMAT_PERUSAHAAN = $post['alamat'];
        $this->NO_TELP_PERUSAHAAN = $post["no"];
        $this->NAMA_MANAGER = $post['manager'];
        $this->LOGO = $_FILES['fotobaru'];
        if ($this->LOGO = $_FILES['fotobaru'] == '') {
        } else {
            $config['upload_path']        = 'img/pengusaha/user/';  //menentukan lokasi
            $config['allowed_types']    = 'gif|jpg|png';    //type yang dieprbolehkan
            $config['file_name']        = $this->ID_USER;   //nama file diambil dari produk id
            $config['overwrite']        = true;    //menindihkan file yang sudah terupload
            $config['max_size']            = 10240;   //max size

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fotobaru')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";
        }

        //query ke database
        $this->db->where('ID_PERUSAHAAN', $this->ID_PERUSAHAAN = $post['id']);
        $this->db->update('perusahaan', $this);
    }
}

?>