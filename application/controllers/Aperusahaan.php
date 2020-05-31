<?php

class Aperusahaan extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model('admin/perusahaan_model');
    } 

    public function index()
    {
        $data['judul'] = "Info Tani";
        $data['perusahaan'] = $this->perusahaan_model->get_all();
        $this->load->view('admin/viewperusahaan.php', $data);
    }
    public function formtambah(){ //membuka form tambah
        $this->load->view('admin/tambahperusahaan');
    }
    public function tambah(){ //fungsi menambah data
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $siup = $this->input->post('siup');
        $logo = $this->input->post('logo');
        $namaperusahaan = $this->input->post('namaperusahaan');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');
        $manager = $this->input->post('manager');
 
        if(!empty($_FILES['siup']['name'])){
            $config['upload_path'] = './img/perusahaan/siup/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            $this->upload->initialize($config);
            if ($this->upload->do_upload('siup')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./img/perusahaan/siup/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './img/perusahaan/siup/'.$gbr['file_name'];
                // $this->load->library('image_lib', $config);
                // $this->image_lib->resize();
 
                $siup=$gbr['file_name'];
            }
        }
            if(!empty($_FILES['logo']['name'])){
                $config1['upload_path'] = './img/perusahaan/user/'; //path folder
                $config1['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config1['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
                $this->upload->initialize($config1);
                if ($this->upload->do_upload('logo')){
                    $gbr1 = $this->upload->data();
                    //Compress Image
                    $config1['image_library']='gd2';
                    $config1['source_image']='./img/perusahaan/user/'.$gbr1['file_name'];
                    $config1['create_thumb']= FALSE;
                    $config1['maintain_ratio']= FALSE;
                    $config1['quality']= '50%';
                    $config1['width']= 600;
                    $config1['height']= 400;
                    $config1['new_image']= './img/perusahaan/user/'.$gbr1['file_name'];
                    $this->load->library('image_lib', $config1);
                    $this->image_lib->resize();
     
                    $logo=$gbr1['file_name'];
                }
            }
                $data = array(
                    'USERNAME' => $username,
                    'PASSWORD' => $password,
                    'SIUP' => $siup,
                    'LOGO' => $logo,
                    'NAMA_PERUSAHAAN' => $namaperusahaan,
                    'EMAIL' => $email,
                    'ALAMAT_PERUSAHAAN' => $alamat,
                    'NO_TELP_PERUSAHAAN' => $notelp,
                    'NAMA_MANAGER' => $manager,
                    'ID_LEVEL' => 3
                );
                $this->perusahaan_model->input_data($data,'perusahaan');
                redirect('Aperusahaan');
    }
                 
    
    public function ubah($id){ //membuka form ubah
        $data['perusahaan'] = $this->perusahaan_model->getPerusahaanById($id);
            $this->load->view('admin/ubahperusahaan', $data);
    }
    public function update(){ //fungsi mengubah
        $id = $this->input->post('idperusahaan');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $siup = $this->input->post('siup');
        $siuplama = $this->input->post('siuplama');
        $logo = $this->input->post('logo');
        $logolama = $this->input->post('logolama');
        $namaperusahaan = $this->input->post('namaperusahaan');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');
        $manager = $this->input->post('manager');
        $where = array('ID_PERUSAHAAN'=>$id);

        $cek = $this->perusahaan_model->cek_id($id,'perusahaan')->result();
        if($cek != FALSE){
            if(!empty($_FILES['siup']['name'])){
                $config['upload_path'] = './img/perusahaan/siup/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config); 
                if ($this->upload->do_upload('siup')){
                    if(file_exists($lok=FCPATH.'/img/perusahaan/siup/'.$siuplama)){
                        unlink($lok);
                    }
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./img/perusahaan/siup/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './img/perusahaan/siup/'.$gbr['file_name'];
                    // $this->load->library('image_lib', $config);
                    // $this->image_lib->resize();
                    
                        $siup=$gbr['file_name'];
                    
                }
            }else{
                $siup= $siuplama;
            }
            if(!empty($_FILES['logo']['name'])){
                $config['upload_path'] = './img/perusahaan/user/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config); 
                if ($this->upload->do_upload('logo')){
                    if(file_exists($lok=FCPATH.'/img/perusahaan/user/'.$logolama)){
                        unlink($lok);
                    }
                    $gbr1 = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./img/perusahaan/user/'.$gbr1['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './img/perusahaan/user/'.$gbr1['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
    
                    $logo=$gbr1['file_name'];
                    
                }
            }else{
                $logo=$logolama;
            }
            $data = array(
                'USERNAME' => $username,
                'SIUP' => $siup,
                'LOGO' => $logo,
                'NAMA_PERUSAHAAN' => $namaperusahaan,
                'EMAIL' => $email,
                'ALAMAT_PERUSAHAAN' => $alamat,
                'NO_TELP_PERUSAHAAN' => $notelp,
                'NAMA_MANAGER' => $manager,
            );
                $this->perusahaan_model->update_data($where,$data);
                redirect('aperusahaan');
        }else{
                echo "<script>alert('Data Tidak Ditemukan!');history.go(-1);</script>";
        }
    }

    public function hapus($id)
    {
        foreach ($this->perusahaan_model->cekKeberadaan($id) as $hasilada) :
            $hasil = $hasilada['ID_PESAN'];
        endforeach;
        if ($hasil == 0) {
            $data = $this->perusahaan_model->ambil_foto($id);
            $path = './img/perusahaan/siup/';
            @unlink($path . $data->SIUP);
            $path1 = './img/perusahaan/user/';
            @unlink($path1 . $data->LOGO);
            $this->perusahaan_model->hapusDataPerusahaan($id);
            $this->session->set_flashdata('perusahaandihapus', 'Dihapus');
            redirect('Aperusahaan');
        } else {
            echo "<script>alert('Gagal dihapus karena data dipakai di tabel relasi');history.go(-1);</script>";
        }
    }

}

?>