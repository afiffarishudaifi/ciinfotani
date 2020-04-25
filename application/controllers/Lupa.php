<?php

class Lupa extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('frontend/Lupa_model');
    }

    public function index(){
        $this->load->view('frontend/button_lupa');
    }

    public function petani(){
        $this->load->view('frontend/formlupapass');
    }
    public function pengusaha(){
        $this->load->view('frontend/formlupapasspengusaha');
    }
    public function passpengusaha(){
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $data['pengusaha'] = $this->Lupa_model->cek_pengusaha($username, $email)->result();
        if($data != FALSE){
            $this->load->view('frontend/lupapasswordpengusaha',$data);
        } else {
            echo "<script>alert('Nama pengguna atau no hp tidak ada');history.go(-1);</script>";
        }
    }

    public function passpetani(){
        $username = $this->input->post('username');
        $nohp = $this->input->post('nohp');
        $data['petani'] = $this->Lupa_model->cek_petani($username, $nohp)->result();
        if($data != FALSE){
            $this->load->view('frontend/lupapassword',$data);
        } else {
            echo "<script>alert('Nama pengguna atau email tidak ada');history.go(-1);</script>";
        }
    }
    public function update_petani(){
        if($this->input->post('password') != $this->input->post('passwordConf')){
            echo "<script>alert('Password tidak sama');history.go(-1);</script>";
        }
        $user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $data = array(
            'PASSWORD' => $pass
        );
        $where = array('USERNAME' => $user);
        $this->Lupa_model->update_data($where,$data,'user');
        redirect('login');
    }
    public function update_pengusaha(){
        if($this->input->post('pass_baru') != $this->input->post('pass_konf')){
            echo "<script>alert('Password tidak sama');history.go(-1);</script>";
        }
        $user = $this->input->post('username');
        $pass = md5($this->input->post('pass_baru'));
        $data = array(
            'PASSWORD' => $pass
        );
        $where = array('USERNAME' => $user);
        $this->Lupa_model->update_data($where,$data,'perusahaan');
        redirect('login');
    }
}