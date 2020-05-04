<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('frontend/Login_model');
    }

    public function index()
    {
        if(isset($_GET['id'])){
            $id= $_GET['id'];
        }else{
            $id = 0;
        }
        if($id == 1){
            redirect('admin');
        }elseif($id ==2){
            redirect('user');
        }elseif($id ==3){
            redirect('pperusahaan');
        }else{
        $this->load->view('frontend/login');
        }
    }
    public function cek_login()
    {
        $username = $this->input->post('txt_user');
        $password = md5($this->input->post('txt_pass'));
        $cek = $this->Login_model->login($username, $password, 'user')->result();
        if($cek != FALSE){
            foreach($cek as $row){
                $id = $row->ID_USER;
                $user = $row->USERNAME;
                $level = $row->ID_LEVEL;
                $foto = $row->FOTO_USER;
            }
            $this->session->set_userdata('session_id', $id);
            $this->session->set_userdata('session_user', $user);
            $this->session->set_userdata('session_akses', $level);
            $this->session->set_userdata('session_gambar', $foto);
            //ambil ktp untuk viewpetani
            $ktp = $this->Login_model->cekKtp($id);
            foreach($ktp as $hasil):
                $hasilktp = $hasil['KTP'];
            endforeach;
            $this->session->set_userdata('session_ktp', $hasilktp);

            $this->session->set_flashdata('tampil', 'Selamat Sudah Login'.$user);
            if($level == 1){
                redirect('Admin');
            } elseif($level == 2){
                redirect('User');
            } 
        } else {
            $cekperusahaan = $this->Login_model->loginPerusahaan($username, $password, 'perusahaan')->result();
            if($cekperusahaan != FALSE){
                foreach($cekperusahaan as $row){
                    $id = $row->ID_PERUSAHAAN;
                    $user = $row->USERNAME;
                    $logo = $row->LOGO;
                    $level = $row->ID_LEVEL;
                }
                $this->session->set_userdata('session_id_perusahaan', $id);
                $this->session->set_userdata('session_username_perusahaan', $user);
                $this->session->set_userdata('session_logo_perusahaan', $logo);
                $this->session->set_userdata('session_akses', $level);
                redirect('Pperusahaan');
            } else {
                echo "<script>alert('Login Gagal! Pastikan Semua data terisi benar');</script>";
            }
            $this->load->view('frontend/login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
