<?php

class Alappanen extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Alappanen_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['lappanen'] = $this->Alappanen_model->get_all();
        $data['getKomo'] = $this->Alappanen_model->getKomoditas();
        $data['jumpanen'] = $this->Alappanen_model->jumlahIndex();
        $this->load->view('admin/viewlappanen', $data);
    }
    public function sortKomoditas()
    {
        if ($this->input->post('pilih') != NULL) {
            $data['getKomo'] = $this->Alappanen_model->getKomoditas();
            $data['lappanen'] = $this->Alappanen_model->sortKomoditas();
            $data['jumpanen'] = $this->Alappanen_model->jumlahSortKomoditas();
            $this->load->view('admin/viewlappanen', $data);
        } else {
            $data['lappanen'] = $this->Alappanen_model->get_all();
            $data['getKomo'] = $this->Alappanen_model->getKomoditas();
            $data['jumpanen'] = $this->Alappanen_model->jumlahIndex();
            $this->load->view('admin/viewlappanen', $data);
        }
    }

}

?>