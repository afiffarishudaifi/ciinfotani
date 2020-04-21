<?php

class Upetani extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/Petani_model');
    }

    public function index()
    {
        $data['cekktp'] = $this->Petani_model->cekktp();
        $data['lengkap'] = $this->Petani_model->cek_user();
        $data['komoditas'] = $this->Petani_model->getKomoditas();
        $data['desa'] = $this->Petani_model->getDesa();
        $data['status'] = $this->Petani_model->getStatus();
        $data['cek'] =  $this->Petani_model->dataPetaniPanen();
        $this->load->view('user/viewpetani', $data);
    }

    public function lengkapidata()
    {
        $this->form_validation->set_rules('KTP', 'KTP', 'integer|required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('iduser', 'ID User', 'required');
        $this->form_validation->set_rules('username', 'USERNAME', 'required');
        $this->form_validation->set_rules('namapetani', 'Nama Petani', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'integer|required|max_length[14]');
        $this->form_validation->set_rules('tgltanam', 'Tanggal Tanam', 'required');
        $this->form_validation->set_rules('tglpanen', 'Tanggal Panen', 'required');
        $this->form_validation->set_rules('alamatpetani', 'Alamat Petani', 'required');
        $this->form_validation->set_rules('alamatsawah', 'Alamat Sawah', 'required');
        $this->form_validation->set_rules('luassawah', 'Luas Sawah', 'required|integer');
        $this->form_validation->set_rules('iddesa', 'ID Desa', 'required');
        $this->form_validation->set_rules('idstatus', 'ID Status', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('idkomoditas', 'ID Komoditas', 'required|min_length[5]|max_length[12]');
        if ($this->form_validation->run() == FALSE) {
            redirect('Upetani');
        } else {
            $this->Petani_model->lengkapiData();
            $this->session->set_flashdata('petanilengkapidata', 'Tersimpan');
            redirect('User');
        }
    }
    public function update(){
        $this->form_validation->set_rules('KTP', 'KTP', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'integer|required|max_length[16]');
        $this->form_validation->set_rules('idstatus', 'ID Status', 'required');
        $this->form_validation->set_rules('idkomoditas', 'ID Komoditas', 'required');
        $this->form_validation->set_rules('tgltanam', 'Tanggal Tanam', 'required');
        $this->form_validation->set_rules('tglpanen', 'Tanggal Panen', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            redirect('Upetani');
        } else {
            $this->Petani_model->update();
            $this->session->set_flashdata('petaniupdate', 'Diubah');
            redirect('Upetani');
        }
    }
}

?>