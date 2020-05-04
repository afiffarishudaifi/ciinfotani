<?php

class Ulappanen extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/Ulappanen_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_user');
        $getAkses = $this->session->userdata('session_akses');
        $getId = $this->session->userdata('session_id');
        if ($getUser == '' or $getAkses == '' or $getId == '') {
            //echo "<script>alert('Anda Harus Login');history.go(-1);</script>";
            redirect('Login');
        } else {
            $data['judul'] = "Info Tani";
            $data['cekktp'] = $this->Ulappanen_model->cekktp();
            foreach($data['cekktp'] as $hasil):
                $hasilktp = $hasil['KTP'];
            endforeach;
            $data['lappanen'] = $this->Ulappanen_model->get_all($hasilktp);
            $data['getKomo'] = $this->Ulappanen_model->getKomoditas();
            $data['jumpanen'] = $this->Ulappanen_model->jumlahIndex($hasilktp);
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
            redirect('Login');
        } else {
            if ($this->input->post('pilih') != NULL) {
                $data['cekktp'] = $this->Ulappanen_model->cekktp();
                foreach ($data['cekktp'] as $hasil) :
                    $hasilktp = $hasil['KTP'];
                endforeach;
                $data['getKomo'] = $this->Ulappanen_model->getKomoditas();
                $data['lappanen'] = $this->Ulappanen_model->sortKomoditas($hasilktp);
                $data['jumpanen'] = $this->Ulappanen_model->jumlahSortKomoditas($hasilktp);
                $this->load->view('user/viewlappanen', $data);
            } else {
                $data['cekktp'] = $this->Ulappanen_model->cekktp();
                foreach ($data['cekktp'] as $hasil) :
                    $hasilktp = $hasil['KTP'];
                endforeach;
                $data['lappanen'] = $this->Ulappanen_model->get_all($hasilktp);
                $data['getKomo'] = $this->Ulappanen_model->getKomoditas();
                $data['jumpanen'] = $this->Ulappanen_model->jumlahIndex($hasilktp);
                $this->load->view('user/viewlappanen', $data);
            }
        }
    }

}
