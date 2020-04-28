<?php

class Ulappesan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/Ulappesan_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['cekktp'] = $this->Ulappesan_model->cekktp();
        foreach ($data['cekktp'] as $hasil) :
            if($hasil['KTP'] != "" || $hasil['KTP'] != NULL){
                $hasilktp = $hasil['KTP'];
            } else {
                $hasilktp = 0;
            }
        endforeach;
        $data['lappesan'] = $this->Ulappesan_model->get_all($hasilktp);
        $data['getTahun'] = $this->Ulappesan_model->getTahun();
        $data['jumpesan'] = $this->Ulappesan_model->jumlahIndex($hasilktp);
        $this->load->view('user/viewlappesan', $data);
    }

    public function sortTahun()
    {
        if($this->input->post('pilih') != NULL){
            $data['cekktp'] = $this->Ulappesan_model->cekktp();
            foreach ($data['cekktp'] as $hasil) :
                if ($hasil['KTP'] != "" || $hasil['KTP'] != NULL) {
                    $hasilktp = $hasil['KTP'];
                } else {
                    $hasilktp = 0;
                }
            endforeach;
            $data['getTahun'] = $this->Ulappesan_model->getTahun();
            $data['lappesan'] = $this->Ulappesan_model->sortTahun($hasilktp);
            $data['jumpesan'] = $this->Ulappesan_model->jumlahSortTahun($hasilktp);
            $this->load->view('user/viewlappesan', $data);
        } else {
            $data['cekktp'] = $this->Ulappesan_model->cekktp();
            foreach ($data['cekktp'] as $hasil) :
                if ($hasil['KTP'] != "" || $hasil['KTP'] != NULL) {
                    $hasilktp = $hasil['KTP'];
                } else {
                    $hasilktp = 0;
                }
            endforeach;
            $data['lappesan'] = $this->Ulappesan_model->get_all($hasilktp);
            $data['getTahun'] = $this->Ulappesan_model->getTahun();
            $data['jumpesan'] = $this->Ulappesan_model->jumlahIndex($hasilktp);
            $this->load->view('user/viewlappesan', $data);
        }
    }
}
