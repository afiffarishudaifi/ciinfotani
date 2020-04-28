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

    public function batalPemesanan()
    {
        $pilihan = $this->uri->segment(3);
        $idpesan = $this->uri->segment(4);
        $data['getAll'] = $this->Ukonfirmasi_model->getAll($idpesan);
        $data['pilih'] = $pilihan;
        $this->form_validation->set_rules('idpesan', 'ID Pesan', 'required');
        $this->form_validation->set_rules('jmlpesan', 'Jumlah Pesan', 'required');
        $this->form_validation->set_rules('total', 'Total Biaya', 'required');
        $this->form_validation->set_rules('idpanen', 'ID Panen', 'required');
        $this->form_validation->set_rules('ktp', 'KTP', 'required');
        $this->form_validation->set_rules('idperusahaan', 'ID Perusahaan', 'required');
        $this->form_validation->set_rules('idpanen', 'ID Panen', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/konfirmasi', $data);
        } else {
            $jmlpesan = $this->input->post('jmlpesan');
            $pesan_fix = str_replace(".", "", $jmlpesan);

            foreach ($this->Ukonfirmasi_model->cekJumlah() as $cek) :
                $hasil = $cek['HASIL'] + $pesan_fix;
            endforeach;
            $this->Ukonfirmasi_model->setDataKurang($hasil);
            $this->Ukonfirmasi_model->hapusPemesanan();
            redirect('Uriwayat');
        }
    }
}


?>