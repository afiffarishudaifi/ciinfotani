<?php

class Admin extends CI_Controller{
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/indexadmin_model');
    }
    
    public function index()
    {
        $data['jumdesa'] = $this->indexadmin_model->jumDesa();
        $data['jumkomoditas'] = $this->indexadmin_model->jumKomoditas();        
        $data['jumuser'] = $this->indexadmin_model->jumUser();
        $data['jumpengusaha'] = $this->indexadmin_model->jumPengusaha();
        $data['panen'] = $this->indexadmin_model->dataPanen();
        $data['pesan'] = $this->indexadmin_model->dataPemesanan();
        $this->load->view('admin/index', $data);
    }

}

?>