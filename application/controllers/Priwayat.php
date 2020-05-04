<?php

class Priwayat extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('perusahaan/Priwayat_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_username_perusahaan');
        $getId = $this->session->userdata('session_id_perusahaan');
        if ($getUser == ' ' or $getId == ' ') {
            redirect('Login');
        } else {
            $data['getAll'] = $this->Priwayat_model->getAll();
            foreach($this->Priwayat_model->getAll() as $drow):
                if($drow['ID_PESAN'] != NULL || $drow['ID_HASIL'] != "") {
                    $idpesan = $drow['ID_PESAN'];
                    $data['dataPesan'] = $this->Priwayat_model->getPemesanan($idpesan);
                } else {
                    redirect('Pperusahaan');
                }
            endforeach;
            $this->load->view('perusahaan/riwayat', $data);
        }
    }
    public function fixPemesanan()
    {
        $getUser = $this->session->userdata('session_username_perusahaan');
        $getId = $this->session->userdata('session_id_perusahaan');
        if ($getUser == ' ' or $getId == ' ') {
            redirect('Login');
        } else {
            $jmlpesan = $this->input->post('jmlpesan');
            foreach ($this->Priwayat_model->fixPemesanan() as $cekkurang) : 
                $hasil = $cekkurang['HASIL']  + $jmlpesan;
            endforeach;
            $this->Priwayat_model->setDataJumlah($hasil);
            $this->Priwayat_model->hapusPesan();
            redirect('Priwayat');
        }
    }
}

?>