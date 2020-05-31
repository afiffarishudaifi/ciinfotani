<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/indexuser_model');
    }

    public function index()
    {

        date_default_timezone_set('Asia/Jakarta');
        $tgll = date("Y-m-d");


        $data['cekpesanmasuk'] = $this->indexuser_model->cek_pesan_masuk();
        $data['cekdata'] = $this->indexuser_model->cek_data();
        foreach ($this->indexuser_model->cek_data() as $hasil) :
            $hasilcekdata = $hasil['KTP'];
        endforeach;
        if ($hasilcekdata == 0) {
            redirect('Upetani');
        } else {
        foreach ($data['cekdata'] as $rowcari) :
            $tglpanen = $rowcari['PANEN'];
            $KTP = $rowcari['KTP'];
            $status = $rowcari['ID_STATUS'];
            $komoditas = $rowcari['ID_KOMODITAS'];
            if ($tgll == $tglpanen || $tgll >= $tglpanen) {
                $this->indexuser_model->update_panen($KTP);
                if ($status == 2) {
                    $this->indexuser_model->insert_panen($KTP, $tgll, $komoditas);
                }
            }
        endforeach;
        $data['cekpanen'] = $this->indexuser_model->cek_panen();
        $data['cekktp'] = $this->indexuser_model->cekktp();
        foreach ($data['cekktp'] as $hasil) :
            $ktphasil = $hasil['KTP'];
        endforeach;
        $data['panen'] = $this->indexuser_model->data_panen($ktphasil);
        $this->load->view('user/index', $data);
        }
    }
}

?>