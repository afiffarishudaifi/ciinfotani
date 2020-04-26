<?php

class Ptambahdata extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/Ptambah_data_model');
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('id', 'ID Perusahaan', 'required');
        $this->form_validation->set_rules('namaperusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no', 'No Perusahaan', 'required');
        $this->form_validation->set_rules('manager', 'Nama Manager', 'required');
        $this->form_validation->set_rules('foto', 'Foto Logo', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Perusahaan/tambah_data');
        } else {
            $config['upload_path'] = './img/perusahaan/user/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {

                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './img/perusahaan/user/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './img/perusahaan/user/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'] . "jpg";
                    $this->Ptambah_data_model->tambahData($gambar);
                    //redirect('Pperusahaan');
                }
                echo "<script>alert('Registrasi Gagal! Pastikan Semua data terisi');history.go(-1);</script>";
            } else {
                echo "<script>alert('Registrasi Gagal! Pastikan Semua data terisi');history.go(-1);</script>";
            }
        }
    }
}

?>