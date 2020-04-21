<?php

class User extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/Indexuser_model');
    }

    public function index()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");
        $tahun = date("Y");
        $tglhariini = date("yy-mm-dd");


        $data['cekpesanmasuk'] = $this->Indexuser_model->cek_pesan_masuk();
        $data['cekdata'] = $this->Indexuser_model->cek_data();
        foreach ($data['cekdata'] as $rowcari) :
            $tglpanen = $rowcari['PANEN'];
            $KTP = $rowcari['KTP'];
            $status = $rowcari['ID_STATUS'];
            $komoditas = $rowcari['ID_KOMODITAS'];
            if ($tgll == $tglpanen || $tgll >= $tglpanen) {
                $this->Indexuser_model->update_panen($KTP);
                if ($status == 2) {
                    $this->Indexuser_model->insert_panen($KTP, $tgll, $komoditas);
                }
            }
        endforeach;
        $data['cekpanen'] = $this->Indexuser_model->cek_panen();
        $data['cekktp'] = $this->Indexuser_model->cekktp();
        foreach($data['cekktp'] as $hasil):
            $ktphasil = $hasil['KTP'];
        endforeach;
        $data['panen'] = $this->Indexuser_model->data_panen($ktphasil);
        $this->load->view('user/index', $data);
    }
}

?>