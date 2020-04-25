<?php

class Auser extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/User_model');
        
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['user'] = $this->User_model->get_all();
        $this->load->view('admin/viewuser', $data);
    }

    public function tambah()
    {
        $data['idlevel'] = $this->User_model->tambahIdLevel();
        $this->form_validation->set_rules('namapengguna' , 'Nama Pengguna', 'alpha|required');
        $this->form_validation->set_rules('password' , 'Kata Sandi' , 'required');
        $this->form_validation->set_rules('foto', 'Gambar', 'required');
        $this->form_validation->set_rules('idlevel' , 'ID Level', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('admin/tambahuser', $data);
        } else {
            $this->User_model->tambahDataUser();
            $this->session->set_flashdata('penggunaditambah', 'Ditambah');
            redirect('Auser');
        }
    }

    public function ubah($id)
    {
        $data['idlevel'] = $this->User_model->tambahIdLevel();
        $data['user'] = $this->User_model->getUserById($id);
        $this->form_validation->set_rules('namapengguna', 'Nama Pengguna', 'alpha|required');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
        $this->form_validation->set_rules('idlevel', 'ID Level', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/ubahuser', $data);
        } else {
            $this->User_model->ubahDataUser();
            $this->session->set_flashdata('penggunadiubah', 'Diubah');
            redirect('Auser');
        }
    }
    public function hapus($id)
    {
        $this->User_model->hapusDataUser($id);
        $this->session->set_flashdata('penggunadihapus', 'Dihapus');
        redirect('Auser');
    }

}

?>