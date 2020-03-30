<?php

class Alappesan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Alappesan_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['lappesan'] = $this->Alappesan_model->get_all();
        $data['getTahun'] = $this->Alappesan_model->getTahun();
        $data['jumpesan'] = $this->Alappesan_model->jumlahIndex();
        $this->load->view('admin/viewlappesan', $data);
    }

    public function sortTahun()
    {
        if($this->input->post('pilih') != NULL){
            $data['getTahun'] = $this->Alappesan_model->getTahun();
            $data['lappesan'] = $this->Alappesan_model->sortTahun();
            $data['jumpesan'] = $this->Alappesan_model->jumlahSortTahun();
            $this->load->view('admin/viewlappesan', $data);
        } else {
            $data['lappesan'] = $this->Alappesan_model->get_all();
            $data['getTahun'] = $this->Alappesan_model->getTahun();
            $data['jumpesan'] = $this->Alappesan_model->jumlahIndex();
            $this->load->view('admin/viewlappesan', $data);
        }
    }
}

?>