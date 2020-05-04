<?php

class Apetani extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/Petani_model');
    }

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['petani'] = $this->Petani_model->get_all();
        $this->load->view('admin/viewpetani', $data);
    }

    public function tambah()
    {
        $data['iddesa'] = $this->Petani_model->tambahIdDesa();
        $data['iduser'] = $this->Petani_model->tambahIdUser();
        $data['idkomoditas'] = $this->Petani_model->tambahIdKomoditas();
        $data['idstatus'] = $this->Petani_model->tambahIdStatus();
        $this->form_validation->set_rules('namapetani', 'Nama Petani', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'integer|required|max_length[14]');
        $this->form_validation->set_rules('tgltanam', 'Tanggal Tanam', 'required');
        $this->form_validation->set_rules('tglpanen', 'Tanggal Panen', 'required');
        $this->form_validation->set_rules('alamatpetani', 'Alamat Petani', 'required');
        $this->form_validation->set_rules('alamatsawah', 'Alamat Sawah', 'required');
        $this->form_validation->set_rules('luassawah', 'Luas Sawah', 'required|integer');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/tambahpetani', $data);
        } else {
            $post = $this->input->post();
        $data = [
            "KTP" => $post['ktp'],
            "ID_DESA" => $post['iddesa'],
            "ID_KOMODITAS" => $post['idkomoditas'],
            "ID_USER" => $post['iduser'],
            "ID_STATUS" => $post['idstatuspanen'],
            "NAMA_PETANI" => $post['namapetani'],
            "ALAMAT_PETANI" => $post['alamatpetani'],
            "LUAS_SAWAH" => $post['luassawah'],
            "ALAMAT_SAWAH" => $post['alamatsawah'],
            "TANAM" => $post['tgltanam'],
            "PANEN" => $post['tglpanen'],
            "NO_HP" => $post['nohp']
        ];
            $this->Petani_model->tambahDataPetani(); 
            $this->session->set_flashdata('petaniditambah', 'Ditambah');
            redirect('Apetani');
        }
    }

    public function ubah($id)
    {
        $data['petani'] = $this->Petani_model->getPetaniById($id);
        $data['iddesa'] = $this->Petani_model->tambahIdDesa();
        $data['iduser'] = $this->Petani_model->tambahIdUser();
        $data['idkomoditas'] = $this->Petani_model->tambahIdKomoditas();
        $data['idstatus'] = $this->Petani_model->tambahIdStatus();
        $this->form_validation->set_rules('namapetani', 'Nama Petani', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'integer|required|max_length[14]');
        $this->form_validation->set_rules('tgltanam', 'Tanggal Tanam', 'required');
        $this->form_validation->set_rules('tglpanen', 'Tanggal Panen', 'required');
        $this->form_validation->set_rules('alamatpetani', 'Alamat Petani', 'required');
        $this->form_validation->set_rules('alamatsawah', 'Alamat Sawah', 'required');
        $this->form_validation->set_rules('luassawah', 'Luas Sawah', 'required|integer');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/ubahpetani', $data);
        } else {
            $this->Petani_model->ubahDataPetani($id,$data);
            $this->session->set_flashdata('petanidiubah', 'Diubah');
            redirect('Apetani');
        }
    }

    public function hapus($id)
    {
        $hasilPanen = $this->Petani_model->cekKeberadaanPanen($id);
        $hasilPesan = $this->Petani_model->cekKeberadaanPemesanan($id);
         if ($hasilPesan == FALSE || $hasilPanen == FALSE) {
                $data['idpetani'] = $this->Petani_model->hapusDataPetani($id);
                $this->session->set_flashdata('petanidhapus', 'Dihapus');
                redirect('Apetani');
            } else {
                echo "<script>alert('Gagal dihapus karena data dipakai di tabel Panen atau Pemesanan');history.go(-1);</script>";
            }
        }   
    }



?>