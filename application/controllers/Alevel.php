<?php

class Alevel extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/level_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['level'] = $this->level_model->get_all();
        $this->load->view('admin/viewlevel', $data);

    }
}

?>