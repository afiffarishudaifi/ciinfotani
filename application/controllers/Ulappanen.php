<?php

class Ulappanen extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/ulappanen_model');
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
            $data['cekktp'] = $this->ulappanen_model->cekktp();
            foreach($data['cekktp'] as $hasil):
                $hasilktp = $hasil['KTP'];
            endforeach;
            $data['lappanen'] = $this->ulappanen_model->get_all($hasilktp);
            $data['getKomo'] = $this->ulappanen_model->getKomoditas();
            $data['jumpanen'] = $this->ulappanen_model->jumlahIndex($hasilktp);
            $this->load->view('user/viewlappanen', $data);
        }
    }
    public function sortKomoditas()
    {
        $getUser = $this->session->userdata('session_user');
        $getAkses = $this->session->userdata('session_akses');
        $getId = $this->session->userdata('session_id');
        if ($getUser == '' or $getAkses == '' or $getId == '') {
            //echo "<script>alert('Anda Harus Login');history.go(-1);</script>";
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            if ($this->input->post('pilih') != NULL) {
                $data['cekktp'] = $this->ulappanen_model->cekktp();
                foreach ($data['cekktp'] as $hasil) :
                    $hasilktp = $hasil['KTP'];
                endforeach;
                $data['getKomo'] = $this->ulappanen_model->getKomoditas();
                $data['lappanen'] = $this->ulappanen_model->sortKomoditas($hasilktp);
                $data['jumpanen'] = $this->ulappanen_model->jumlahSortKomoditas($hasilktp);
                $this->load->view('user/viewlappanen', $data);
            } else {
                $data['cekktp'] = $this->ulappanen_model->cekktp();
                foreach ($data['cekktp'] as $hasil) :
                    $hasilktp = $hasil['KTP'];
                endforeach;
                $data['lappanen'] = $this->ulappanen_model->get_all($hasilktp);
                $data['getKomo'] = $this->ulappanen_model->getKomoditas();
                $data['jumpanen'] = $this->ulappanen_model->jumlahIndex($hasilktp);
                $this->load->view('user/viewlappanen', $data);
            }
        }
    }

}
