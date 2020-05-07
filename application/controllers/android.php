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
    //nampilin dropdown desa
    public function get_desa(){
        $result = array();
        $index['ID_DESA'] = "0";
        $index['NAMA_DESA'] = "Pilih Desa";
        array_push($result,$index);
        $query = $this->android_model->daftar_desa()->result();
        foreach($query as $row){
            $index['ID_DESA'] = $row->ID_DESA;
            $index['NAMA_DESA'] = $row->NAMA_DESA;
            array_push($result,$index);
        }
        echo json_encode($result);
    }
    //nampilin dropdown komoditas
    public function get_komoditas(){
        $result = array();
        $index['ID_KOMODITAS'] = "0";
        $index['NAMA_KOMODITAS'] = "Pilih Komoditas";
        array_push($result,$index);
        $query = $this->android_model->daftar_komoditas()->result();
        foreach($query as $row){
            $index['ID_KOMODITAS'] = $row->ID_KOMODITAS;
            $index['NAMA_KOMODITAS'] = $row->NAMA_KOMODITAS;
            array_push($result,$index);
        }
        echo json_encode($result);
    }
    public function loginapi(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
        
            $response = $this->android_model->loginapi($username, $password)->result();
            foreach ($response as $user){
                $id_user = $user->ID_USER;
            }
            $ambil_ktp = $this->android_model->cek_ktp($id_user)->result();
            
            $result = array();
            $result['login'] = array();
            if ($response != FALSE ) {
                if($ambil_ktp != FALSE){
                    foreach($ambil_ktp as $baris){
                        $index['ktp'] = $baris->KTP;
                    }
                }else{
                    $index['ktp'] = "0";
                }    
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

//form datapetani
    public function data_petaniapi(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id_user'];
            $username= $_POST['username'];
            $ktp = $_POST['ktp'];
            $alamat = $_POST['alamat'];
            $desa = $_POST['desa'];
            $nohp = $_POST['nohp'];
            $komoditas = $_POST['komoditas'];
            $tglpanen = $_POST['tglpanen'];
            $date = new DateTime();
            $tgltanam = $date->format('Y-m-d');

            $cek = $this->android_model->cek_petani($ktp,$id)->result();
                if($cek == FALSE){
                   //insert data
                   $data = [
                       "KTP" => $ktp,
                    "ID_DESA" => $desa,
                    "ID_KOMODITAS" => $komoditas,
                    "ID_USER" => $id,
                    "ID_STATUS" => 2,
                    "NAMA_PETANI" => $username,
                    "ALAMAT_PETANI" => $alamat,
                    "LUAS_SAWAH" => 1,
                    "ALAMAT_SAWAH" => $alamat,
                    "TANAM" => $tgltanam,
                    "PANEN" => $tglpanen,
                    "NO_HP" => $nohp
                    ];
                        $this->android_model->insert_petani($data);
                        $result["success"] = "1";
                        $result["message"] = "Tambah Data Berhasil!";
                        echo json_encode($result);
                }else{
                    //update data
                    
                    $data = [
                        "ID_DESA" => $desa,
                        "ID_KOMODITAS" => $komoditas,
                        "ID_STATUS" => 2,
                        "ALAMAT_PETANI" => $alamat,
                        "ALAMAT_SAWAH" => $alamat,
                        "TANAM" => $tgltanam,
                        "PANEN" => $tglpanen,
                        "NO_HP" => $nohp
                    ];
                    $this->android_model->update_petani($ktp,$data);
                    $result["success"] = "2";
                    $result["message"] = "Update Data Berhasil!";
                    echo json_encode($result);
                }
            }     
    }

    public function fill_data(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id_user'];
            $ktp = $_POST['ktp'];
            $cek = $this->android_model->cek_petani($ktp,$id)->result();
            foreach($cek as $baris){
                $desa = $baris->ID_DESA;
                $komoditas = $baris->ID_KOMODITAS;
            }
            $cek_desaKomoditas = $this->android_model->cek_desaKomoditas($desa,$komoditas)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                if($cek_desaKomoditas !=FALSE ){
                    foreach($cek_desaKomoditas as $row){
                        $index['nama_desa'] = $row->NAMA_DESA;
                        $index['nama_komoditas'] = $row->NAMA_KOMODITAS;
                    }
                }else{
                    $index['nama_desa'] = "Tidak Ada Desa";
                    $index['nama_komoditas'] = "Tidak Ada Komoditas";
                }                    
                foreach($cek as $row){
                    $index['ktp'] = $row->KTP;
                    $index['alamat'] = $row->ALAMAT_PETANI;
                    $index['desa'] = $row->ID_DESA;
                    $index['nohp'] = $row->NO_HP;
                    $index['komoditas'] = $row->ID_KOMODITAS;
                    $index['tglpanen'] = $row->PANEN;
                }
                    array_push($result['data'], $index);
        
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


}
