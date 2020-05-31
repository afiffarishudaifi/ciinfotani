<?php

class Alappanen extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/alappanen_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['lappanen'] = $this->alappanen_model->get_all();
        $data['getKomo'] = $this->alappanen_model->getKomoditas();
        $data['jumpanen'] = $this->alappanen_model->jumlahIndex();
        $this->load->view('admin/viewlappanen', $data);
    }
    public function sortKomoditas()
    {
        if ($this->input->post('pilih') != NULL) {
            $data['getKomo'] = $this->alappanen_model->getKomoditas();
            $data['lappanen'] = $this->alappanen_model->sortKomoditas();
            $data['jumpanen'] = $this->alappanen_model->jumlahSortKomoditas();
            $this->load->view('admin/viewlappanen', $data);
        } else {
            $data['lappanen'] = $this->alappanen_model->get_all();
            $data['getKomo'] = $this->alappanen_model->getKomoditas();
            $data['jumpanen'] = $this->alappanen_model->jumlahIndex();
            $this->load->view('admin/viewlappanen', $data);
        }
    }

}

?>