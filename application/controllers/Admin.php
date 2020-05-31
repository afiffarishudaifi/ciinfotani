<?php

class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Indexadmin_model');
    }
    
    public function index()
    {
        $data['jumdesa'] = $this->Indexadmin_model->jumDesa();
        $data['jumkomoditas'] = $this->Indexadmin_model->jumKomoditas();        
        $data['jumuser'] = $this->Indexadmin_model->jumUser();
        $data['jumpengusaha'] = $this->Indexadmin_model->jumPengusaha();
        $data['panen'] = $this->Indexadmin_model->dataPanen();
        $data['pesan'] = $this->Indexadmin_model->dataPemesanan();
        $this->load->view('admin/index', $data);
    }

}

?>