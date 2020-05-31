<?php
    
    class Adesa extends CI_Controller{
        
        public function __construct()
        {
            parent:: __construct();
            $this->load->model('admin/desa_model');
        }
        
        public function index()
        {
            $data['judul'] = "Info Tani";
            $data['desa'] = $this->desa_model->get_all();
            $this->load->view('admin/viewdesa', $data);
        }

        
        public function tambah()
        {   
            $data['idkec'] = $this->desa_model->tampilIdKecamatan();
            $this->form_validation->set_rules('namadesa', 'Nama Desa', 'required|alpha');
            $this->form_validation->set_rules('idkecamatan', 'Id Kecamatan', 'required|numeric');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/tambahdesa', $data);
            } else {
                $this->desa_model->tambahDataDesa();
                $this->session->set_flashdata('desaditambah', 'Ditambah');
                redirect('Adesa');
            }
        }

        public function detail($id)
        {
            $data['desa'] = $this->desa_model->getDesaById($id);
            $this->load->view('admin/ubahdesa');
        }

        public function hapus($id)
        {
            foreach ($this->desa_model->cekKeberadaan($id) as $hasilada) :
                $hasil = $hasilada['KTP'];
            endforeach;
            if ($hasil == 0) {
            $this->desa_model->hapusDataDesa($id);
            $this->session->set_flashdata('desadihapus', 'Dihapus');
            redirect('Adesa');
            } else {
                echo "<script>alert('Gagal dihapus karena data dipakai di tabel relasi');history.go(-1);</script>";
            }
        }

        public function ubah($id)
        {
            $data['desa'] = $this->desa_model->getDesaByid($id);
            $this->form_validation->set_rules('namadesa', 'Nama Desa', 'required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/ubahdesa', $data);
            } else {
                $this->desa_model->ubahDataDesa($id);
                $this->session->set_flashdata('desadiubah', 'Diubah');
                redirect('Adesa');
            }
        }

    }

?>