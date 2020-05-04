<?php

class Upanen extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/Panen_model');
    }
    public function index()
    {
        $getUser = $this->session->userdata('session_user');
        $getAkses = $this->session->userdata('session_akses');
        $getId = $this->session->userdata('session_id');
        if ($getUser == '' or $getAkses == '' or $getId == '') {
            //echo "<script>alert('Anda Harus Login');history.go(-1);</script>";
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $data['cekPanen'] = $this->Panen_model->cekPanen();
            $this->load->view('user/tambah_panen', $data);
        }
    }
    public function tambahpanen()
    {
        $this->form_validation->set_rules('max', 'MAX Panen', 'required');
        $this->form_validation->set_rules('hasil', 'Hasil Panen', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('panen', 'Status Panen', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('Upanen');
        } else {
        
            $this->Panen_model->tambahPanen();
            $this->session->set_flashdata('panenditambah', 'Ditambah');
            redirect('Upanen');
        }
        
        
    }
}

?>