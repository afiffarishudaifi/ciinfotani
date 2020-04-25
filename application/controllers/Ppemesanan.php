<?php

class Ppemesanan extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('perusahaan/Ppemesanan_model');
    }

    public function index()
    {
        $data['getAll'] = $this->Ppemesanan_model->getAll();
        $this->form_validation->set_rules('idperusahaan', 'ID Perusahaan', 'required');
        $this->form_validation->set_rules('ktp', 'KTP', 'required');
        $this->form_validation->set_rules('jmlpesan', 'Jumlah Pesan', 'required');
        $this->form_validation->set_rules('total', 'Total Biaya', 'required');
        $this->form_validation->set_rules('komoditas', 'Komoditas', 'required');
        $this->form_validation->set_rules('namapetani', 'Nama Petani', 'required');
        $this->form_validation->set_rules('namapengusaha', 'Nama Pengusaha', 'required');
        $this->form_validation->set_rules('idpanen', 'ID Panen', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('perusahaan/pemesanan', $data);
        } else {
            $total = $this->input->post('total');
            $total_fix = str_replace(".", "", $total);

            $this->Ppemesanan_model->insertPemesanan();
            foreach($this->Ppemesanan_model->cekJumlah() as $cek):
                $hasil = $cek['HASIL'] - $total_fix;
            endforeach;
            $this->Ppemesanan_model->setDataKurang($hasil);
            redirect('Plappesan');
        }
        
    }
}

?>