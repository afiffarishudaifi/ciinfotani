<?php
    
    class Tentangkami extends CI_Controller{
        
        // public function __construct()
        // {
        //     parent:: __construct();
        //     $this->load->model('admin/Desa_model');
        // }
        
        public function index(){
            $this->load->view('frontend/tentangkami');
        }
    }
?>