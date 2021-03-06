<?php

class Upetani extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('user/petani_model');
    }

    public function index()
    {
        $getUser = $this->session->userdata('session_user');
        $getAkses = $this->session->userdata('session_akses');
        $getId = $this->session->userdata('session_id');
        if ($getUser == '' or $getAkses == '' or $getId == '') {
            //echo "<script>alert('Anda Harus Login');history.go(-1);</script>";
            echo "<script>alert('Harap Login Terlebih Dahulu');history.go(-1);</script>";
        } else {
            $data['cekktp'] = $this->session->userdata('session_ktp');
            $data['lengkap'] = $this->petani_model->cek_user();
            $data['komoditas'] = $this->petani_model->getKomoditas();
            $data['desa'] = $this->petani_model->getDesa();
            $data['status'] = $this->petani_model->getStatus();
            $data['cek'] =  $this->petani_model->dataPetaniPanen();
            $this->load->view('user/viewpetani', $data);
        }
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
        $this->form_validation->set_rules('idstatus', 'ID Status', 'required');
        $this->form_validation->set_rules('idkomoditas', 'ID Komoditas', 'required');
        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('user/viewpetani');
            echo "<script>alert('Lengkapi Data Gagal! Pastikan Semua data Benar');history.go(-1);</script>";
            //redirect('User');
        } else {
            $this->petani_model->lengkapiData();
            $this->session->set_flashdata('petanilengkapidata', 'Tersimpan');
            echo "<script>alert('Mungkin Anda Harus Login Kembali!');</script>";
            ?> <script>
            window.location.href='<?php echo base_url('Login/logout'); ?>';
            </script>
            <?php
            // redirect('Login/logout');
        }
    }
    public function update(){
        $this->form_validation->set_rules('KTP', 'KTP', 'integer|required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('nohp', 'No Hp', 'integer|required|max_length[16]');
        $this->form_validation->set_rules('idstatus', 'ID Status', 'required');
        $this->form_validation->set_rules('idkomoditas', 'ID Komoditas', 'required');
        $this->form_validation->set_rules('tgltanam', 'Tanggal Tanam', 'required');
        $this->form_validation->set_rules('tglpanen', 'Tanggal Panen', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            redirect('Upetani');
        } else {
            $this->petani_model->update();
            $this->session->set_flashdata('petaniupdate', 'Diubah');
            redirect('Upetani');
        }
    }
}

?>