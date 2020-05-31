<?php

class Ulappesan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/ulappesan_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_user');
        $getAkses = $this->session->userdata('session_akses');
        $getId = $this->session->userdata('session_id');
        if ($getUser == '' or $getAkses == '' or $getId == '') {
            //echo "<script>alert('Anda Harus Login');history.go(-1);</script>";
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $data['judul'] = "Info Tani";
            $data['cekktp'] = $this->ulappesan_model->cekktp();
            foreach ($data['cekktp'] as $hasil) :
                if($hasil['KTP'] != "" || $hasil['KTP'] != NULL){
                    $hasilktp = $hasil['KTP'];
                } else {
                    $hasilktp = 0;
                }
            endforeach;
            $data['lappesan'] = $this->ulappesan_model->get_all($hasilktp);
            $data['getTahun'] = $this->ulappesan_model->getTahun();
            $data['jumpesan'] = $this->ulappesan_model->jumlahIndex($hasilktp);
            $this->load->view('user/viewlappesan', $data);
        }
    }

    public function sortTahun()
    {
        $getUser = $this->session->userdata('session_user');
        $getAkses = $this->session->userdata('session_akses');
        $getId = $this->session->userdata('session_id');
        if ($getUser == '' or $getAkses == '' or $getId == '') {
            //echo "<script>alert('Anda Harus Login');history.go(-1);</script>";
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            if($this->input->post('pilih') != NULL){
                $data['cekktp'] = $this->ulappesan_model->cekktp();
                foreach ($data['cekktp'] as $hasil) :
                    if ($hasil['KTP'] != "" || $hasil['KTP'] != NULL) {
                        $hasilktp = $hasil['KTP'];
                    } else {
                        $hasilktp = 0;
                    }
                endforeach;
                $data['getTahun'] = $this->ulappesan_model->getTahun();
                $data['lappesan'] = $this->ulappesan_model->sortTahun($hasilktp);
                $data['jumpesan'] = $this->ulappesan_model->jumlahSortTahun($hasilktp);
                $this->load->view('user/viewlappesan', $data);
            } else {
                $data['cekktp'] = $this->ulappesan_model->cekktp();
                foreach ($data['cekktp'] as $hasil) :
                    if ($hasil['KTP'] != "" || $hasil['KTP'] != NULL) {
                        $hasilktp = $hasil['KTP'];
                    } else {
                        $hasilktp = 0;
                    }
                endforeach;
                $data['lappesan'] = $this->ulappesan_model->get_all($hasilktp);
                $data['getTahun'] = $this->ulappesan_model->getTahun();
                $data['jumpesan'] = $this->ulappesan_model->jumlahIndex($hasilktp);
                $this->load->view('user/viewlappesan', $data);
            }
        }
    }
}
