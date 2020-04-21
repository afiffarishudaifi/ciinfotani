<?php

class Lupa extends CI_Controller{
    function __construct(){
        parent:: __construct();

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

}