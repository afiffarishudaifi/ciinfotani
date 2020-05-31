<?php

class Plappesan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/plappesan_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_username_perusahaan');
        $getId = $this->session->userdata('session_id_perusahaan');
        if ($getUser == '' or $getId == '') {
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $data['judul'] = "Info Tani";
            $data['lappesan'] = $this->plappesan_model->get_all();
            $data['getBulan'] = $this->plappesan_model->getBulan();
            $data['jumpesan'] = $this->plappesan_model->jumlahIndex();
            $this->load->view('perusahaan/viewlappesan', $data);
        }
    }

    public function sortTahun()
    {
        if ($this->input->post('pilih') != NULL) {
            $data['getBulan'] = $this->plappesan_model->getBulan();
            $data['lappesan'] = $this->plappesan_model->sortTahun();
            $data['jumpesan'] = $this->plappesan_model->jumlahSortTahun();
            $this->load->view('perusahaan/viewlappesan', $data);
        } else {
            $data['lappesan'] = $this->plappesan_model->get_all();
            $data['getBulan'] = $this->plappesan_model->getBulan();
            $data['jumpesan'] = $this->plappesan_model->jumlahIndex();
            $this->load->view('perusahaan/viewlappesan', $data);
        }
    }
}
