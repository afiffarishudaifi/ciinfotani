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
            $foto = $_POST['foto'];
            if($password != $passwordConf){
                    $result["success"] = "0";
                    $result["message"] = "Password Tidak sama";
                    echo json_encode($result);
            }else{
                $cek = $this->android_model->cek_user($username)->result();
                if($cek != TRUE){
                    if(!empty($foto)){
                        //$random = random_word(20);
                        $gambar = $username.".png";
                        $path = "img/user/".$username.".png";
                        
                        $query = $this->android_model->registerapi($username,$password,$gambar);
                        
                        if ($query){
                            file_put_contents($path,base64_decode($foto));
                            $result["success"] = "1";
                            $result["message"] = "Registrasi Berhasil!";
                            echo json_encode($result);
                        }else{
                            $result["success"] = "0";
                            $result["message"] = "Registrasi Gagal!";
                            echo json_encode($result);
                        }
                    }else{
                        $this->android_model->registerapi($username,$password,"");
                        $result["success"] = "1";
                        $result["message"] = "Registrasi Berhasil!";
                        echo json_encode($result);
                    }
                }else{
                    $result["success"] = "0";
                            $result["message"] = "Registrasi Gagal!";
                            echo json_encode($result);
                }
            }
        }
    }


}
