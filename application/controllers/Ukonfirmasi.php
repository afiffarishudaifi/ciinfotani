<?php

class Ukonfirmasi extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('User/Ukonfirmasi_model');
    }

    public function Konfirmasi()
    {
        $pilihan = $this->uri->segment(3);
        $idpesan = $this->uri->segment(4);
        $data['getAll'] = $this->Ukonfirmasi_model->getAll($idpesan);
        $data['pilih'] = $pilihan;
        $this->load->view('user/konfirmasi', $data);
    }

    public function fixPemesanan()
    {
        $this->Ukonfirmasi_model->fixPemesanan();
        redirect('Uriwayat');
    }
}


?>