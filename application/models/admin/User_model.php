<?php

class User_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('select * from user');
        return $query->result_array();
        
    }
    function simpan_user($id_level,$username,$password,$gambar){
        $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES ($id_level,'$username','$password','$gambar')");
        return $hasil;
    }
    public function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('user',$data);
    }
    public function cek_id($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID_USER', $id);
        $query = $this->db->get();
        return $query;
    }
    public function ambil_foto($id){
        $this->db->from('user');
        $this->db->where('ID_USER',$id);
        $result = $this->db->get('');
        if($result->num_rows()>0){
            return $result->row();
        }
    }

    public function tambahIdLevel()
    {
        $query = $this->db->query('select * from level');
        return $query->result_array();
        
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['ID_USER' => $id])->row_array();
    }

    public function tambahDataUser()
    {    
        $post = $this->input->post();

        $this->ID_USER = uniqid();     //membuat id unik
        $this->USERNAME = $post["namapengguna"];
        $this->PASSWORD = md5($post["password"]);
        $this->ID_LEVEL = $post['idlevel'];
        $this->FOTO_USER = $_FILES['foto'];
        if($this->FOTO_USER = $_FILES['foto'] == ''){

        } else {
            $config['upload_path']        = 'img/user/';  //menentukan lokasi
            $config['allowed_types']    = 'gif|jpg|png';    //type yang dieprbolehkan
            $config['file_name']        = $this->ID_USER;   //nama file diambil dari produk id
            $config['overwrite']        = true;    //menindihkan file yang sudah terupload
            $config['max_size']            = 10240;   //max size

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";
        }

        //query ke database
        $this->db->insert('user', $this);
    }

    public function hapusDataUser($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete('user', array("ID_USER" => $id));
    }

    private function _uploadImage()
    {
        date_default_timezone_set('Asia/Jakarta');
        $config['upload_path']        = 'img/user/';  //menentukan lokasi
        $config['allowed_types']    = 'gif|jpg|png';    //type yang dieprbolehkan
        $config['file_name']        = $this->ID_USER;   //nama file diambil dari produk id
        $config['overwrite']        = true;    //menindihkan file yang sudah terupload
        $config['max_size']            = 10240;   //max size

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        } 
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $id = $this->getUserById($id);
        if ($id->image != "default.jpg") {
            $filename = explode(".", $id->image)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

    public function ubahDataUser($id)
    {
        
    }

}

?>