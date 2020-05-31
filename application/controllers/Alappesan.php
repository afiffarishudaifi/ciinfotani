<?php

class Alappesan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/alappesan_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['lappesan'] = $this->alappesan_model->get_all();
        $data['getTahun'] = $this->alappesan_model->getTahun();
        $data['jumpesan'] = $this->alappesan_model->jumlahIndex();
        $this->load->view('admin/viewlappesan', $data);
    }

    public function sortTahun()
    {
        if($this->input->post('pilih') != NULL){
            $data['getTahun'] = $this->alappesan_model->getTahun();
            $data['lappesan'] = $this->alappesan_model->sortTahun();
            $data['jumpesan'] = $this->alappesan_model->jumlahSortTahun();
            $this->load->view('admin/viewlappesan', $data);
        } else {
            $data['lappesan'] = $this->alappesan_model->get_all();
            $data['getTahun'] = $this->alappesan_model->getTahun();
            $data['jumpesan'] = $this->alappesan_model->jumlahIndex();
            $this->load->view('admin/viewlappesan', $data);
        }
    }
}

?>