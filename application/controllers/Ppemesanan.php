<?php

class Ppemesanan extends CI_Controller{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('perusahaan/ppemesanan_model');
    } 

    public function index()
    {
        $id = $_GET['id'];
        $tgl = $_GET['tgl'];
        $idusaha = $_GET['idanda'];
                                $data['geid']= $tgl;
        $data['getUsaha'] = $this->ppemesanan_model->getUsaha($idusaha)->result();
        $data['getPesanan'] = $this->ppemesanan_model->getPesanan($id, $tgl);
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

            $this->ppemesanan_model->insertPemesanan();
            foreach($this->ppemesanan_model->cekJumlah() as $cek):
                $hasil = $cek['HASIL'] - $total_fix;
            endforeach;
            $this->ppemesanan_model->setDataKurang($hasil);
            redirect('Plappesan');
        }
        
    }

    public function insertPesanan(){
        $id = $this->input->post('idperusahaan');
        $ktp = $this->input->post('ktp');
        $jumlah = $this->input->post('jmlpesan');
        $jumlah_fix = str_replace(".","",$jumlah);
        $total = $this->input->post('total');
        $total_fix = str_replace(".","",$total);
        $komoditas = $this->input->post('komoditas');
        $petani = $this->input->post('namapetani');
        $pengusaha = $this->input->post('namapengusaha');
        $idpanen = $this->input->post('idpanen');
        $hasil = $this->input->post('hasil');
        $hasil_nokoma = str_replace(".","",$hasil);
        $hasil_fix = $hasil_nokoma - $jumlah_fix;
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d");

        $data = array(
            'ID_PERUSAHAAN' => $id,
            'KTP' => $ktp,
            'TANGGAL' => $tgl , 
            'JUMLAH_PESAN' => $jumlah_fix, 
            'TOTAL_BIAYA' => $total_fix, 
            'ID_PESAN_STATUS' => 1, 
            'ID_PANEN' => $idpanen
        );
        $this->ppemesanan_model->insertPesanan($data);
        $where = array(
            'ID_PANEN' => $idpanen
        );
        $data1 = array(
            'HASIL' => $hasil_fix
        );
        $this->ppemesanan_model->kurangHasil($where, $data1);
        redirect('Priwayat');
    
    }
}

?>