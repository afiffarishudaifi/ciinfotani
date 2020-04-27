<?php

class Uriwayat extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/Uriwayat_model');
    }

    public function index()
    {
        foreach ($data['getKtp'] = $this->Uriwayat_model->getKtp() as $row){
            $ktp = $row['KTP'];
        }
        $data['getAll'] = $this->Uriwayat_model->getAll($ktp);
        foreach ($this->Uriwayat_model->getAll($ktp) as $row) :
            if ($row['ID_PESAN'] != NULL || $row['ID_PESAN'] != "") {
                $idpesan = $row['ID_PESAN'];
                $data['dataPesan'] = $this->Uriwayat_model->getPemesanan($idpesan);
            } else {
                redirect('User');
            }
        endforeach;
        $this->load->view('user/riwayat.php', $data);
    }

}

?>