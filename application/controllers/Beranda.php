<?php

class Beranda extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('frontend/Frontend_model');
    }
    public function index(){
        $data['judul'] = "Info Tani";
        $data['panen'] = $this->Frontend_model->get_5data()->result();
        $this->load->view('frontend/index', $data);
    }
}
?>