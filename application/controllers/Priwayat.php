<?php

class Priwayat extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('perusahaan/Priwayat_model');
    }

    public function index()
    {
        $data['getAll'] = $this->Priwayat_model->getAll();
        foreach($data['getAll'] = $this->Priwayat_model->getAll() as $drow):
            $idpesan = $drow['ID_PESAN'];
        endforeach;
        $data['dataPesan'] = $this->Priwayat_model->getPemesanan($idpesan);
        $this->load->view('perusahaan/riwayat', $data);
    }
    public function fixPemesanan()
    {
        $jmlpesan = $this->input->post('jmlpesan');
        foreach ($this->Priwayat_model->fixPemesanan() as $cekkurang) : 
            $hasil = $cekkurang['HASIL']  + $jmlpesan;
        endforeach;
        $this->Priwayat_model->setDataJumlah($hasil);
        $this->Priwayat_model->hapusPesan();
        redirect('Priwayat');
    }
}

?>