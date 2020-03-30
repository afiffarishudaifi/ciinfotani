<?php

class Aperusahaan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Perusahaan_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['perusahaan'] = $this->Perusahaan_model->get_all();
        $this->load->view('admin/viewperusahaan.php', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|alpha');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp', 'required|integer');
        $this->form_validation->set_rules('namaperusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tambahperusahaan');
        } else {
            $this->Perusahaan_model->tambahDataPerusahaan();
            $this->session->set_flashdata('perusahaanditambah', 'Ditambah');
            redirect('Aperusahaan');
        }
    }
    public function ubah($id)
    {
        $data['perusahaan'] = $this->Perusahaan_model->getPerusahaanById($id);
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|alpha');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp', 'required|integer');
        $this->form_validation->set_rules('namaperusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/ubahperusahaan', $data);
        } else {
            $this->Perusahaan_model->tambahDataPerusahaan();
            $this->session->set_flashdata('perusahaanditambah', 'Ditambah');
            redirect('Aperusahaan');
        }
    }
    public function hapus($id)
    {
        $this->Perusahaan_model->hapusDataPerusahaan($id);
        $this->session->set_flashdata('perusahaandihapus', 'Dihapus');
        redirect('Aperusahaan');
    }

}

?>