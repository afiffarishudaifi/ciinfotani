<?php

class Register extends CI_Controller{
    function __construct(){
        parent:: __construct();

    }

    public function index(){
        $this->load->view('frontend/button_register');
    }
    public function petani(){
        $this->load->view('frontend/register');
    }
    public function pengusaha(){
        $this->load->view('frontend/register_pengusaha');
    }
}
?>