<?php

class Carihasil extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->helper(array('url'));
        $this->load->model('frontend/Cari_model');
    }
    public function index(){
        $this->load->database();
        $jumlah_data = $this->Cari_model->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Carihasil/index';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);

        $data['komoditas'] = $this->Cari_model->komoditas();
        $data['kecamatan'] = $this->Cari_model->kecamatan();
        $data['alldata'] = $this->Cari_model->get_all($config['per_page'],$from);
        $this->load->view('frontend/cariHasil',$data);
    }
}
?>