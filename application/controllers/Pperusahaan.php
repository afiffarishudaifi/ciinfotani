<?php

class Pperusahaan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Perusahaan/Indexperusahaan_model');
    }
    public function index(){
        $data['cekdatakelengkapan'] = $this->Indexperusahaan_model->cekKelengkapan();
        foreach($data['cekdatakelengkapan'] as $row):
            $nama = $row['NAMA_PERUSAHAAN'];
            $email = $row['EMAIL'];
            $alamat = $row['ALAMAT_PERUSAHAAN'];
            $no = $row['NO_TELP_PERUSAHAAN'];
            $manager = $row['NAMA_MANAGER'];
            if($nama == "" || $email == "" || $alamat == "" || $no == "" || $manager == ""){
                echo "<script>alert('Lengkapi Data!');</script>";
                $this->load->view('perusahaan/tambah_data');
            }
        endforeach;
        $data['pemesanan'] = $this->Indexperusahaan_model->dataPemesanan();
        $this->load->view('perusahaan/index', $data);
    }
}

?>