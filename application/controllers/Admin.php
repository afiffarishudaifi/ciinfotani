<?php

class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Admin/Admin_model');
    }
    
    public function index()
    {
        $data['jumdesa'] = $this->Admin_model->jumDesa();
        $data['jumkomoditas'] = $this->Admin_model->jumKomoditas();        
        $data['jumuser'] = $this->Admin_model->jumUser();
        $data['jumpengusaha'] = $this->Admin_model->jumPengusaha();
        $data['panen'] = $this->Admin_model->dataPanen();
        $data['pesan'] = $this->Admin_model->dataPemesanan();
        $this->load->view('admin/index', $data);
    }

}

?>