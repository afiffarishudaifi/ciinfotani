<?php

class Priwayat extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('perusahaan/priwayat_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_username_perusahaan');
        $getId = $this->session->userdata('session_id_perusahaan');
        if ($getUser == ' ' or $getId == ' ') {
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $data['getAll'] = $this->priwayat_model->getAll();
            foreach($this->priwayat_model->getAll() as $drow):
                if($drow['ID_PESAN'] != NULL || $drow['ID_HASIL'] != "") {
                    $idpesan = $drow['ID_PESAN'];
                    $data['dataPesan'] = $this->priwayat_model->getPemesanan($idpesan);
                } else {
                    redirect('pperusahaan');
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
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $jmlpesan = $this->input->post('jmlpesan');
            foreach ($this->priwayat_model->fixPemesanan() as $cekkurang) : 
                $hasil = $cekkurang['HASIL']  + $jmlpesan;
            endforeach;
            $this->priwayat_model->setDataJumlah($hasil);
            $this->priwayat_model->hapusPesan();
            redirect('Priwayat');
        }
    }
}

?>