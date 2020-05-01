<?php
    
    class Akecamatan extends CI_Controller{
        
        public function __construct()
        {
            parent:: __construct();
            $this->load->model('admin/Kecamatan_model');
            
        }
        
        public function index()
        {
            $data['judul'] = "Info Tani";
            $data['kecamatan'] = $this->Kecamatan_model->get_all();
            $this->load->view('admin/viewkecamatan', $data);
        }

        public function tambah()
        {
            $this->form_validation->set_rules('namakecamatan', 'Nama Kecamatan' , 'required|alpha');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/tambahkecamatan');
            } else {
                $this->Kecamatan_model->tambahDataKecamatan();
                $this->session->set_flashdata('kecamatanditambah', 'Ditambahkan');
                redirect('Akecamatan');
            }
        }

        public function detail($id)
        {
            $data['kecamatan'] = $this->Kecamatan_model->getKecamatanById($id);
            $this->load->view('admin/ubahkecamatan');
        }

        public function hapus($id)
        {
            $this->Kecamatan_model->hapusDataKecamatan($id);
            $this->session->set_flashdata('kecamatandihapus', 'Dihapus');
            redirect('Akecamatan');
        }

        public function ubah($id)
        {
            $data['kecamatan'] = $this->Kecamatan_model->getKecamatanById($id);
            $this->form_validation->set_rules('namakecamatan', 'Nama Kecamatan', 'required|alpha');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/ubahkecamatan', $data);
            } else {
                
                $this->Kecamatan_model->ubahDataKecamatan($id);
                $this->session->set_flashdata('kecamatandiubah', 'Diubah');
                redirect('Akecamatan');
            }
        }
    }
