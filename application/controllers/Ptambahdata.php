<?php

class Ptambahdata extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan/Ppengaturan_model');
    }

    public function tambahData()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $namaperusahaan = $this->input->post('namaperusahaan');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no = $this->input->post('no');
        $manager = $this->input->post('manager');
        $foto = $this->input->post('foto');
        
            $where = array('ID_PERUSAHAAN'=>$id);

            $cek = $this->ppengaturan_model->cek_id($id,'perusahaan')->result();
            if($cek != FALSE){
                $config['upload_path'] = 'img/perusahaan/user'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
                $this->upload->initialize($config);
                if(!empty($_FILES['foto']['name'])){ 
                    if ($this->upload->do_upload('foto')){
                        if(file_exists($lok=FCPATH.'img/perusahaan/user'.$foto)){
                            unlink($lok);
                        }
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='img/perusahaan/user/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 600;
                        $config['height']= 400;
                        $config['new_image']= 'img/perusahaan/user/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
    
                        $gambar=$gbr['file_name'];
                                $data = array(
                                    'LOGO' => $gambar, 
                                    'NAMA_PERUSAHAAN' => $namaperusahaan,
                                    'EMAIL' => $email,
                                    'ALAMAT_PERUSAHAAN' => $alamat,
                                    'NO_TELP_PERUSAHAAN' => $no,
                                    'NAMA_MANAGER' => $manager
                                );
                    }
                }else{
                                $data = array(
                                    'NAMA_PERUSAHAAN' => $namaperusahaan,
                                    'EMAIL' => $email,
                                    'ALAMAT_PERUSAHAAN' => $alamat,
                                    'NO_TELP_PERUSAHAAN' => $no,
                                    'NAMA_MANAGER' => $manager
                                );
                }
                    $this->ppengaturan_model->update_data($where,$data);
                    redirect('Pperusahaan');
            }else{
                    echo "<script>alert('Katasandi Saat Ini Salah!');history.go(-1);</script>";
            }
            
        }    

        
}

?>