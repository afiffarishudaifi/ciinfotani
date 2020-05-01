<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class android extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('android_model');
    }

    public function index(){
        echo 'infotani api';
    }

    public function loginapi(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
        
            $response = $this->android_model->loginapi($username, $password)->result();

            $result = array();
            $result['login'] = array();
            if ($response != FALSE ) {
                
                    foreach($response as $row){
                        $index['id_user'] = $row->ID_USER;
                        $index['username'] = $row->USERNAME;
                        $index['foto_user'] = $row->FOTO_USER;
                    }
                    array_push($result['login'], $index);
        
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
        
                } else {
        
                    $result['success'] = "0";
                    $result['message'] = "error";
                    echo json_encode($result);
        
                }
            }
    }

    public function registerapi(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $username= $_POST['username'];
            $password = md5($_POST['password']);
            $passwordConf = md5($_POST['passwordconf']);
            if($password != $passwordConf){
                    $result["success"] = "0";
                    $result["message"] = "error";
                    echo json_encode($result);
            }else{
                $cek = $this->android_model->cek_user($username)->result();
                if($cek != TRUE){
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
                            $this->android_model->registerapi($username,$password,$gambar);
                            $result["success"] = "1";
                            $result["message"] = "success";
                            echo json_encode($result);
                        }else{
                            $result["success"] = "0";
                            $result["message"] = "error";
                            echo json_encode($result);
                        }
                    }else{
                        $this->android_model->registerapi($username,$password,"");
                        $result["success"] = "1";
                        $result["message"] = "success";
                        echo json_encode($result);
                    }
                }else{
                    $result["success"] = "0";
                            $result["message"] = "error";
                            echo json_encode($result);
                }
            }
        }
    }


}
