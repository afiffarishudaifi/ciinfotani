<?php

class Astatus extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Status_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['status'] = $this->Status_model->get_all();
        $this->load->view('admin/viewstatus', $data);
    }

}

?>