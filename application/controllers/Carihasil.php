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
    public function search(){
        $key=$this->input->post('cari');
        $data['komoditas'] = $this->Cari_model->komoditas();
        $data['kecamatan'] = $this->Cari_model->kecamatan();
        $data['alldata']=$this->Cari_model->get_cari($key);
        $this->load->view('frontend/cariHasil',$data);
    }
    public function filter(){
        $komo=$this->input->post('komoditas');
        $keca=$this->input->post('kecamatan');
        $tgl=$this->input->post('tglpanen');
        
        $data['komoditas'] = $this->Cari_model->komoditas();
        $data['kecamatan'] = $this->Cari_model->kecamatan();
        $data['alldata']=$this->Cari_model->get_filter($komo,$keca,$tgl);
        $this->load->view('frontend/cariHasil',$data);
    }
}
?>