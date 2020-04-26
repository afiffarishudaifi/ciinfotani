<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('frontend/Register_model');
        $this->load->library('upload');
    }
    // public function index(){    
    //     $data['gambar'] = $this->GambarModel->view();    
    //     $this->load->view('gambar/view', $data);  
    // }

    public function index(){
        $this->load->view('frontend/button_register');
    }
    public function petani(){
        $this->load->view('frontend/register');
    }
    public function pengusaha(){
        $this->load->view('frontend/register_pengusaha');
    }
    // public function tambah(){    
    //     $data = array();        
    //         if($this->input->post('password')!=$this->input->post('passwordConf')){
    //             echo "<script>alert('Password tidak sama');history.go(-1);</script>";
    //         }
    //         // Jika user menekan tombol Submit (Simpan) pada form      
    //         // lakukan upload file dengan memanggil function upload yang ada di Register_model.php  
            
    //         $upload = $this->Register_model->upload();            
    //         if($upload['result'] == "success"){ 
    //             // Jika proses upload sukses         
    //             // Panggil function save yang ada di Register_model.php untuk menyimpan data ke database        
    //             $this->Register_model->save($upload);                
    //             redirect('login'); // Redirect kembali ke halaman awal / halaman view data      
    //         }else{ // Jika proses upload gagal        
    //             $data['message'] = $upload['error']; 
    //             // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan      
    //         }    
    // $this->load->view('frontend/register', $data);  
    // }

    function petani_tambah(){
        if($this->input->post('password') != $this->input->post('passwordConf')){
            echo "<script>alert('Password tidak sama');history.go(-1);</script>";
        }
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
 
                $gambar=$gbr['file_name']."jpg";
                $username=$this->input->post('username');
                $password = md5($this->input->post('password'));
                $this->Register_model->simpan_Petani($username,$password,$gambar);
                redirect('login');    
            }
            echo "<script>alert('Registrasi Gagal! Pastikan Semua data terisi');history.go(-1);</script>";          
        }else{
            echo "<script>alert('Registrasi Gagal! Pastikan Semua data terisi');history.go(-1);</script>";
        }
                 
    }

    function pengusaha_tambah(){
        if($this->input->post('password') != $this->input->post('passwordConf')){
            echo "<script>alert('Password tidak sama');history.go(-1);</script>";
        }
        $config['upload_path'] = './img/perusahaan/siup/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['foto']['name'])){
 
            if ($this->upload->do_upload('foto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./img/perusahaan/siup/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './img/perusahaan/siup/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'] . "jpg";
                $username=$this->input->post('username');
                $password = md5($this->input->post('password'));
                $this->Register_model->simpan_Perusahaan($username,$password,$gambar);
                redirect('login');    
            }
            echo "<script>alert('Registrasi Gagal! Pastikan Semua data terisi');history.go(-1);</script>";          
        }else{
            echo "<script>alert('Registrasi Gagal! Pastikan Semua data terisi');history.go(-1);</script>";
        }
                 
    }

}
?>