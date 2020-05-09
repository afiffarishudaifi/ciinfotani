<?php

class Plappesan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/Plappesan_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_username_perusahaan');
        $getId = $this->session->userdata('session_id_perusahaan');
        if ($getUser == '' or $getId == '') {
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $data['judul'] = "Info Tani";
            $data['lappesan'] = $this->Plappesan_model->get_all();
            $data['getBulan'] = $this->Plappesan_model->getBulan();
            $data['jumpesan'] = $this->Plappesan_model->jumlahIndex();
            $this->load->view('perusahaan/viewlappesan', $data);
        }
    }

    public function sortTahun()
    {
        if ($this->input->post('pilih') != NULL) {
            $data['getBulan'] = $this->Plappesan_model->getBulan();
            $data['lappesan'] = $this->Plappesan_model->sortTahun();
            $data['jumpesan'] = $this->Plappesan_model->jumlahSortTahun();
            $this->load->view('perusahaan/viewlappesan', $data);
        } else {
            $data['lappesan'] = $this->Plappesan_model->get_all();
            $data['getBulan'] = $this->Plappesan_model->getBulan();
            $data['jumpesan'] = $this->Plappesan_model->jumlahIndex();
            $this->load->view('perusahaan/viewlappesan', $data);
        }
    }
}
