<?php

class Upemesanan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('User/Pemesanan_model');
    }
    public function index()
    {

    }
}

?>