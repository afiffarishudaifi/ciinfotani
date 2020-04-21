<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('frontend/Login_model');
    }

    public function index()
    {
        
        $this->load->view('frontend/login');
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
            }
            $this->session->set_userdata('session_id', $id);
            $this->session->set_userdata('session_user', $user);
            $this->session->set_userdata('session_akses', $level);
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
                }
                $this->session->set_userdata('session_id_perusahaan', $id);
                $this->session->set_userdata('session_username_perusahaan', $user);
                redirect('Pperusahaan');
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
