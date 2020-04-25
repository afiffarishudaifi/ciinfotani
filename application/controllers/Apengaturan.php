<?php
    class Apengaturan extends CI_Controller{
        public function __construct(){
        parent:: __construct();
        $this->load->model('Admin/Pengaturan_model');
        }
        public function index($id){
            $where = array('ID_USER' => $id);
            $data['user'] = $this->Pengaturan_model->edit_data($where,'user')->result();
            $this->load->view('admin/pengaturan',$data);
        }
        public function edit($id){
            $where = array('ID_USER' => $id);
            $data['user'] = $this->Pengaturan_model->edit_data($where,'user')->result();
            $this->load->view('admin/pengaturan',$data);
        }
        
        function update(){
            $id = $this->input->post('userid');
            $fotolama = $this->input->post('fotouser');
            $fotobaru = $this->input->post('foto');
            $passlama = md5($this->input->post('pass_lama'));
            $passbaru = md5($this->input->post('pass_baru'));
            $passkonf = md5($this->input->post('pass_konf'));
            $where = array('ID_USER'=>$id);

            $cek = $this->Pengaturan_model->cek_pass($id,$passlama,'user')->result();
            if($cek != FALSE){
                $config['upload_path'] = './img/user/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
                $this->upload->initialize($config);
                if(!empty($_FILES['foto']['name'])){ 
                    if ($this->upload->do_upload('foto')){
                        if(file_exists($lok=FCPATH.'/img/user/'.$fotolama)){
                            unlink($lok);
                        }
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library']='gd2';
                        $config['source_image']='./img/user/'.$gbr['file_name'];
                        $config['create_thumb']= FALSE;
                        $config['maintain_ratio']= FALSE;
                        $config['quality']= '50%';
                        $config['width']= 600;
                        $config['height']= 400;
                        $config['new_image']= './img/user/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
    
                        $gambar=$gbr['file_name'];
                                $data = array(
                                    'PASSWORD' => $passbaru,
                                    'FOTO_USER' => $gambar
                                );
                    }
                }else{
                    if($passbaru == $passkonf){
                        $data = array('PASSWORD' => $passbaru);
                    }else{
                        echo "<script>alert('Katasandi Baru Tidak Sama dengan konfirmasi kata sandi!');history.go(-1);</script>"; 
                    }
                }
                    $this->Pengaturan_model->update_data($where,$data);
                    echo "<script>alert('Update Data Berhasil!');history.go(-1);</script>";
            }else{
                    echo "<script>alert('Katasandi Saat Ini Salah!');history.go(-1);</script>";
            }
            
        }     
    }
?>