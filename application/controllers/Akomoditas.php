<?php
    
    class Akomoditas extends CI_Controller{
        
        public function __construct()
        {
            parent:: __construct();
            $this->load->model('admin/komoditas_model');
            $this->load->library('form_validation');
        }
        
        public function index()
        {
            
            $data['judul'] = "Info Tani";
            $data['komoditas'] = $this->komoditas_model->get_all();
            $this->load->view('admin/viewkomoditas', $data);
        }

        public function tambah()
        {   
            $this->form_validation->set_rules('namakomoditas' , 'Nama Komoditas', 'required|alpha');
            //mengecek rules(name input,'nama ketika error',aturan rules)
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/tambahkomoditas');
            } else {
                
                $this->komoditas_model->tambahDataKomoditas();
                //nama session dan isi
                $this->session->set_flashdata('komoditasditambah', 'Ditambahkan');
                redirect('Akomoditas');
            }

        }

        public function detail($id)
        {
            //memanggil model getkomoditasbyid dengan parameter id
            $data['komoditas'] = $this->komoditas_model->getKomoditasById($id);
            $this->load->view('admin/ubahkomoditas', $data);
        }
        
        public function hapus($id)
        {
            foreach($this->komoditas_model->cekKeberadaan($id) as $hasilada ):
                $hasil = $hasilada['KTP'];
            endforeach; 
            if($hasil == 0){
                $this->komoditas_model->hapusDataKomoditas($id);
                $this->session->set_flashdata('komoditasdihapus', 'Dihapus');
                redirect('Akomoditas');
            } else {
                echo "<script>alert('Gagal dihapus karena data dipakai di tabel relasi');history.go(-1);</script>";
            }
        }

        public function ubah($id)
        {
            $data['komoditas'] = $this->komoditas_model->getKomoditasById($id);
            $this->form_validation->set_rules('namakomoditas', 'Nama Komoditas', 'required|alpha_numeric_spaces');
            //mengecek rules(name input,'nama ketika error',aturan rules)
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/ubahkomoditas', $data);
            } else {
                
                $this->komoditas_model->ubahDataKomoditas($id);
                //nama session dan isi
                $this->session->set_flashdata('komoditasdiubah', 'Diubah');
                redirect('Akomoditas');
            }
        }
    }

?>