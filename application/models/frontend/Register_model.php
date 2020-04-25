<?php
class Register_model extends CI_Model{
    function input_data($data){
        $this->db->insert('user',$data);
    }
    // Fungsi untuk menampilkan semua data gambar  
    // public function view(){    
    //     return $this->db->get('user')->result();  
    // }    
    // Fungsi untuk melakukan proses upload file  
    // public function upload(){ 
    //     $config['upload_path'] = 'img/user';    
    //     $config['allowed_types'] = 'jpg|png|jpeg';    
    //     // $config['overwrite'] = true;    
    //     $config['remove_space'] = TRUE;      
    //     $this->load->library('upload', $config); 
    //     // Load konfigurasi uploadnya    
    //     if($this->upload->do_upload('foto')){ 
    //         // Lakukan upload dan Cek jika proses upload berhasil      
    //         // Jika berhasil :      
    //         $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
    //         return $return;    
    //     }else{      // Jika gagal :      
    //         $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      
    //         return $return;    
    //     }  
    // }    
    // // Fungsi untuk menyimpan data ke database  
    // public function save($upload){    
    //     $data = array(
    //         'ID_LEVEL' => 2,
    //         'USERNAME'=>$this->input->post('username'),      
    //         'PASSWORD' => md5($this->input->post('password')),      
    //         'FOTO_USER' => $upload['file']['file_name']          
    //     );        
    //     $this->db->insert('user', $data);  
    // }

    function simpan_Petani($username,$password,$gambar){
        $hasil=$this->db->query("INSERT INTO user(ID_LEVEL,USERNAME,PASSWORD,FOTO_USER) VALUES (2,'$username','$password','$gambar')");
        return $hasil;
    }
    function simpan_Perusahaan($username,$password,$gambar){
        $hasil=$this->db->query("INSERT INTO perusahaan(ID_LEVEL,USERNAME,PASSWORD,SIUP) VALUES (3,'$username','$password','$gambar')");
        return $hasil;
    }
}