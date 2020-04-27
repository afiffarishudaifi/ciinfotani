<?php

class Auser extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/User_model');
        
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['user'] = $this->User_model->get_all();
        $this->load->view('admin/viewuser', $data);
    }

    public function tambah()
    {
        $data['idlevel'] = $this->User_model->tambahIdLevel();
            $this->load->view('admin/tambahuser', $data);
    }

    public function ubah($id)
    {
        $data['idlevel'] = $this->User_model->tambahIdLevel();
        $data['user'] = $this->User_model->getUserById($id);
        $this->load->view('admin/ubahuser', $data);
        
    }
    public function hapus($id){   
        $data = $this->User_model->ambil_foto($id);
        $path = './img/user/';
        @unlink($path.$data->FOTO_USER);
        $this->User_model->hapusDataUser($id);
        $this->session->set_flashdata('penggunadihapus', 'Dihapus');
        redirect('Auser');
    }

    function user_tambah(){
        $config['upload_path'] = './img/user/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
 
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./img/user/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './img/user/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                $id_level=$this->input->post('idlevel');
                $username=$this->input->post('namapengguna');
                $password = md5($this->input->post('password'));
                $this->User_model->simpan_user($id_level,$username,$password,$gambar);
                redirect('Auser');    
            }         
        }else{
            echo "<script>alert('Insert Gagal! Pastikan Semua data terisi');history.go(-1);</script>";
        }
                 
    }
    function update(){
        $id = $this->input->post('userid');
        $fotolama = $this->input->post('fotolama');
        $fotobaru = $this->input->post('foto');
        $password = md5($this->input->post('password'));
        $username = $this->input->post('namapengguna');
        $idlevel = $this->input->post('idlevel');
        $where = array('ID_USER'=>$id);

        $cek = $this->User_model->cek_id($id,'user')->result();
        if($cek != FALSE){
            $config['upload_path'] = './img/user/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

            $this->upload->initialize($config);
            if(!empty($_FILES['foto']['name'])){ 
                if ($this->upload->do_upload('foto')){
                    if(file_exists($lok=FCPATH.'/img/user/'.$fotolama)){
                        unlink($lok);
                    }
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./img/user/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './img/user/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                            $data = array(
                                'ID_LEVEL' => $idlevel,
                                'USERNAME' => $username,
                                'FOTO_USER' => $gambar
                            );
                }
            }else{
                $data = array(
                    'ID_LEVEL' => $idlevel,
                    'USERNAME' => $username
                );
            }
                $this->User_model->update_data($where,$data);
                echo "<script>alert('Update Data Berhasil!');history.go(-1);</script>";
        }else{
                echo "<script>alert('Data Tidak Ditemukan!');history.go(-1);</script>";
        }
        
    }

}

?>