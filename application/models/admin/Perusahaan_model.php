<?php

class Perusahaan_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->query('select * from perusahaan');
        return $query->result_array();
        
    }
    public function ambil_foto($id){
        $this->db->from('perusahaan');
        $this->db->where('ID_PERUSAHAAN',$id);
        $result = $this->db->get('');
        if($result->num_rows()>0){
            return $result->row();
        }
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    public function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('perusahaan',$data);
    }
    public function cek_id($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID_PERUSAHAAN', $id);
        $query = $this->db->get();
        return $query;
    }
    public function getPerusahaanById($id)
    {
        return $this->db->get_where('perusahaan', ['ID_PERUSAHAAN' => $id])->row_array();
    }
    public function tambahDataPerusahaan()
    {
        $post = $this->input->post();
        $this->USERNAME = $post['username'];
        $this->PASSWORD = $post['password'];
        $this->SIUP = $this->uploadsiup();
        $this->LOGO = $this->uploadlogo();
        $this->NAMA_PERUSAHAAN = $post['namaperusahaan'];
        $this->EMAIL = $post['email'];
        $this->ALAMAT_PERUSAHAAN = $post['alamat'];
        $this->NO_TELP_PERUSAHAAN = $post['notelp'];
        $this->NAMA_MANAGER = $post['manager'];
        $this->ID_LEVEL = 3;
        $this->db->insert('perusahaan' , $this);
    }

    private function uploadsiup()
    {
        date_default_timezone_set('Asia/Jakarta');
        $config['upload_path']      = './img/perusahaan/SIUP/';  //menentukan lokasi
        $config['allowed_types']    = 'gif|jpg|png';    //type yang dieprbolehkan
        $config['file_name']        = date('dmYHis') . ".jpg";   //nama file diambil dari produk id
        $config['overwrite']        = true;    //menindihkan file yang sudah terupload
        $config['max_size']         = 10240;   //max size

        $this->load->library('upload', $config);


        if ($this->upload->do_upload('siup')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function uploadlogo()
    {
        date_default_timezone_set('Asia/Jakarta');
        $config['upload_path']      = './img/perusahaan/user/'; 
        $config['allowed_types']    = 'gif|jpg|png';    
        $config['file_name']        = date('dmYHis') . ".jpg";   
        $config['overwrite']        = true;   
        $config['max_size']         = 10240;   

        $this->load->library('upload', $config);


        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function ubahDataPerusahaan($id)
    {
        $post = $this->input->post();
        $this->USERNAME = $post['username'];
        $this->PASSWORD = $post['password'];
        $this->SIUP = $this->uploadsiup();
        $this->LOGO = $this->uploadlogo();
        $this->NAMA_PERUSAHAAN = $post['namaperusahaan'];
        $this->EMAIL = $post['email'];
        $this->ALAMAT_PERUSAHAAN = $post['alamat'];
        $this->NO_TELP_PERUSAHAAN = $post['notelp'];
        $this->NAMA_MANAGER = $post['manager'];
        $this->ID_LEVEL = 3;
        $this->db->where('ID_PERUSAHAAN', $id);
        $this->db->update('perusahaan', $this);
    }
    public function hapusDataPerusahaan($id)
    {
        $this->db->where('ID_PERUSAHAAN', $id);
        $this->db->delete('perusahaan');
    }
    private function _deleteImage($id)
    {
        $perusahaan = $this->getPerusahaanById($id);
        if ($perusahaan->FOTO_USER != "default.jpg") {
            $filename = explode(".", $perusahaan->image)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }
}

?>