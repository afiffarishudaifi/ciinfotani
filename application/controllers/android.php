<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class android extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('android_model');
    }

    public function index(){
        echo 'infotani api';
    }
    //nampilin dropdown desa
    public function get_desa(){
        $result = array();
        $index['ID_DESA'] = "0";
        $index['NAMA_DESA'] = "Pilih Desa";
        array_push($result,$index);
        $query = $this->android_model->daftar_desa()->result();
        foreach($query as $row){
            $index['ID_DESA'] = $row->ID_DESA;
            $index['NAMA_DESA'] = $row->NAMA_DESA;
            array_push($result,$index);
        }
        echo json_encode($result);
    }
    //nampilin dropdown komoditas
    public function get_komoditas(){
        $result = array();
        $index['ID_KOMODITAS'] = "0";
        $index['NAMA_KOMODITAS'] = "Pilih Komoditas";
        array_push($result,$index);
        $query = $this->android_model->daftar_komoditas()->result();
        foreach($query as $row){
            $index['ID_KOMODITAS'] = $row->ID_KOMODITAS;
            $index['NAMA_KOMODITAS'] = $row->NAMA_KOMODITAS;
            array_push($result,$index);
        }
        echo json_encode($result);
    }
    public function loginapi(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
        
            $response = $this->android_model->loginapi($username, $password)->result();
            foreach ($response as $user){
                $id_user = $user->ID_USER;
            }
            $ambil_ktp = $this->android_model->cek_ktp($id_user)->result();
            
            $result = array();
            $result['login'] = array();
            if ($response != FALSE ) {
                if($ambil_ktp != FALSE){
                    foreach($ambil_ktp as $baris){
                        $index['ktp'] = $baris->KTP;
                    }
                }else{
                    $index['ktp'] = "0";
                }    
                    foreach($response as $row){
                        $index['id_user'] = $row->ID_USER;
                        $index['username'] = $row->USERNAME;
                        $index['foto_user'] = $row->FOTO_USER;
                    }
                    array_push($result['login'], $index);
        
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
                } else {
                    $result['success'] = "0";
                    $result['message'] = "error";
                    echo json_encode($result);
                }
            }
    }

    public function registerapi(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $username= $_POST['username'];
            $password = md5($_POST['password']);
            $passwordConf = md5($_POST['passwordconf']);
            $foto = $_POST['foto'];
            if($password != $passwordConf){
                    $result["success"] = "0";
                    $result["message"] = "Password Tidak sama";
                    echo json_encode($result);
            }else{
                $cek = $this->android_model->cek_user($username)->result();
                if($cek != TRUE){
                    if(!empty($foto)){
                        //$random = random_word(20);
                        $gambar = $username.".png";
                        $path = "img/user/".$username.".png";
                        
                        $query = $this->android_model->registerapi($username,$password,$gambar);
                        
                        if ($query){
                            file_put_contents($path,base64_decode($foto));
                            $result["success"] = "1";
                            $result["message"] = "Registrasi Berhasil!";
                            echo json_encode($result);
                        }else{
                            $result["success"] = "0";
                            $result["message"] = "Registrasi Gagal!";
                            echo json_encode($result);
                        }
                    }else{
                        $this->android_model->registerapi($username,$password,"");
                        $result["success"] = "1";
                        $result["message"] = "Registrasi Berhasil!";
                        echo json_encode($result);
                    }
                }else{
                    $result["success"] = "0";
                            $result["message"] = "Registrasi Gagal!";
                            echo json_encode($result);
                }
            }
        }
    }

//form datapetani
    public function data_petaniapi(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id_user'];
            $username= $_POST['username'];
            $ktp = $_POST['ktp'];
            $alamat = $_POST['alamat'];
            $desa = $_POST['desa'];
            $nohp = $_POST['nohp'];
            $komoditas = $_POST['komoditas'];
            $tglpanen = $_POST['tglpanen'];
            $date = new DateTime();
            $tgltanam = $date->format('Y-m-d');

            $cek = $this->android_model->cek_petani($ktp,$id)->result();
                if($cek == FALSE){
                   //insert data
                   $data = [
                       "KTP" => $ktp,
                    "ID_DESA" => $desa,
                    "ID_KOMODITAS" => $komoditas,
                    "ID_USER" => $id,
                    "ID_STATUS" => 2,
                    "NAMA_PETANI" => $username,
                    "ALAMAT_PETANI" => $alamat,
                    "LUAS_SAWAH" => 1,
                    "ALAMAT_SAWAH" => $alamat,
                    "TANAM" => $tgltanam,
                    "PANEN" => $tglpanen,
                    "NO_HP" => $nohp
                    ];
                        $this->android_model->insert_petani($data);
                        $result["success"] = "1";
                        $result["message"] = "Tambah Data Berhasil!";
                        echo json_encode($result);
                }else{
                    //update data
                    
                    $data = [
                        "ID_DESA" => $desa,
                        "ID_KOMODITAS" => $komoditas,
                        "ID_STATUS" => 2,
                        "ALAMAT_PETANI" => $alamat,
                        "ALAMAT_SAWAH" => $alamat,
                        "TANAM" => $tgltanam,
                        "PANEN" => $tglpanen,
                        "NO_HP" => $nohp
                    ];
                    $this->android_model->update_petani($ktp,$data);
                    $result["success"] = "2";
                    $result["message"] = "Update Data Berhasil!";
                    echo json_encode($result);
                }
            }     
    }

    public function fill_data(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id_user'];
            $ktp = $_POST['ktp'];
            $cek = $this->android_model->cek_petani($ktp,$id)->result();
            foreach($cek as $baris){
                $desa = $baris->ID_DESA;
                $komoditas = $baris->ID_KOMODITAS;
            }
            $cek_desaKomoditas = $this->android_model->cek_desaKomoditas($desa,$komoditas)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                if($cek_desaKomoditas !=FALSE ){
                    foreach($cek_desaKomoditas as $row){
                        $index['nama_desa'] = $row->NAMA_DESA;
                        $index['nama_komoditas'] = $row->NAMA_KOMODITAS;
                    }
                }else{
                    $index['nama_desa'] = "Tidak Ada Desa";
                    $index['nama_komoditas'] = "Tidak Ada Komoditas";
                }                    
                foreach($cek as $row){
                    $index['ktp'] = $row->KTP;
                    $index['alamat'] = $row->ALAMAT_PETANI;
                    $index['desa'] = $row->ID_DESA;
                    $index['nohp'] = $row->NO_HP;
                    $index['komoditas'] = $row->ID_KOMODITAS;
                    $index['tglpanen'] = $row->PANEN;
                }
                    array_push($result['data'], $index);
        
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
            } else {
                    $result['success'] = "0";
                    $result['message'] = "error";
                    echo json_encode($result);
            }
        }
    }
    
        //form panen
    public function data_panenapi(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $ktp = $_POST['ktp'];
            $komoditas= $_POST['komoditas'];
            $tglpanen = $_POST['tglpanen'];
            $hasil = $_POST['hasil'];
            $harga = $_POST['harga'];
            $date = new DateTime();
            $tglskrg= $date->format('Y-m-d');

            if($tglpanen <= $tglskrg){
                   $data = [
                       "KTP" => $ktp,
                    "KOMODITAS" => $komoditas,
                    "TGL_PANEN" => $tglpanen,
                    "HASIL_AWAL" => $hasil,
                    "HASIL" => $hasil,
                    "HARGA" => $harga,
                    "STATUS_PANEN" => "Panen"                
                ];
                        $this->android_model->insert_panen($data);
                        $result["success"] = "1";
                        $result["message"] = "Tambah Panen Berhasil!";
                        echo json_encode($result);
            }else{
                $result["success"] = "0";
                $result["message"] = "Belum Waktunya Panen";
                echo json_encode($result);
            }
        }     
    }

    public function fill_data_panen(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id_user'];
            $ktp = $_POST['ktp'];
            
            $cek = $this->android_model->cek_petani($ktp,$id)->result();
            foreach($cek as $baris){
                $desa = $baris->ID_DESA;
                $komoditas = $baris->ID_KOMODITAS;
            }
            $cek_desaKomoditas = $this->android_model->cek_desaKomoditas($desa,$komoditas)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                if($cek_desaKomoditas !=FALSE ){
                    foreach($cek_desaKomoditas as $row){
                        $index['nama_komoditas'] = $row->NAMA_KOMODITAS;
                    }
                }else{
                    $index['nama_komoditas'] = "Tidak Ada Komoditas";
                }        
                    foreach($cek as $row){
                        $index['ktp'] = $row->KTP;
                        $index['id_komoditas'] = $row->ID_KOMODITAS;
                        $index['tglpanen'] = $row->PANEN;
                    }
                    array_push($result['data'], $index);
        
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
            } else {
                    $result['success'] = "0";
                    $result['message'] = "Tidak Ada Data Petani";
                    echo json_encode($result);
            }
        }
    }

    public function cek_panen(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['id_user'];
            $ktp = $_POST['ktp'];
            $date = new DateTime();
                $tglskrg= $date->format('Y-m-d');

            $cek = $this->android_model->cek_petani($ktp,$id)->result();
            foreach($cek as $baris){
                $tglpanen = $baris->PANEN;
            }

            if($cek != FALSE ){
                if($tglpanen <= $tglskrg){
                    $data = [
                            "ID_STATUS" => 1
                        ];
                    $this->android_model->update_petani($ktp,$data);
                    $result["success"] = "1";
                    $result["message"] = "Saatnya Panen!";
                $cek_fillpanen = $this->android_model->cek_fillpanen($ktp,$tglpanen)->result();
                if($cek_fillpanen != FALSE){
                    $result["donepanen"] = "1";
                    $result["donemessage"] = "Telah Panen! Silahkan Perbarui Data Petani!";
                }else{
                    $result["donepanen"] = "0";
                    $result["donemessage"] = "Isi Data Panen! Lalu Perbarui Data Petani!";
                }
                    echo json_encode($result);
                }else{
                    $result["success"] = "0";
                    $result["message"] = "Belum Waktunya Panen";
                    echo json_encode($result);
                }
            }else{
                $result["success"] = "0";
                $result["message"] = "Belum Mengisi Data Petani";
                echo json_encode($result);
            }
        }
    }

    //show data menurut ktp
    public function lap_panen(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $ktp = $_POST['ktp'];
            $cek = $this->android_model->cek_panen($ktp)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                $index['komoditas'] = "Komoditas";
                    $index['hasil'] = "Hasil";
                    $index['sisa'] = "Sisa";
                    $index['tgl'] = "Tgl Panen";
                    $index['harga'] = "Harga";
                    $index['id'] = "0";
                    
                    array_push($result['data'], $index);
                foreach($cek as $row){
                    $index['komoditas'] = $row->NAMA_KOMODITAS;
                    $index['hasil'] = $row->HASIL_AWAL;
                    $index['sisa'] = $row->HASIL;
                    $index['tgl'] = $row->TGL_PANEN;
                    $index['harga'] = $row->HARGA;
                    $index['id'] = $row->ID_PANEN;
                
                    array_push($result['data'], $index);
                }
                $su = $this->android_model->sum_hasilSisa($ktp)->result();
                    
                foreach($su as $row){
                    $result['jmlhasil'] = $row->jmhasil;
                    $result['jmlsisa'] = $row->jmsisa;
                }
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
            } else {
                    $result['success'] = "0";
                    $result['message'] = "error";
                    echo json_encode($result);
            }
        }
    }

    //show data panen filter
    public function lap_panenTahun(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $ktp = $_POST['ktp'];
            $tgl = $_POST['tahun'];
            $cek = $this->android_model->cek_panenTahun($ktp,$tgl)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                $index['komoditas'] = "Komoditas";
                    $index['hasil'] = "Hasil";
                    $index['sisa'] = "Sisa";
                    $index['tgl'] = "Tgl Panen";
                    $index['harga'] = "Harga";
                    $index['id'] = "0";
                    
                    array_push($result['data'], $index);
                foreach($cek as $row){
                    $index['komoditas'] = $row->NAMA_KOMODITAS;
                    $index['hasil'] = $row->HASIL_AWAL;
                    $index['sisa'] = $row->HASIL;
                    $index['tgl'] = $row->TGL_PANEN;
                    $index['harga'] = $row->HARGA;
                    $index['id'] = $row->ID_PANEN;
                
                    array_push($result['data'], $index);
                }
                $su = $this->android_model->sum_hasilSisaTahun($ktp,$tgl)->result();
                    
                foreach($su as $row){
                    $result['jmlhasil'] = $row->jmhasil;
                    $result['jmlsisa'] = $row->jmsisa;
                }
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
            } else {
                    $result['success'] = "0";
                    $result['message'] = "error";
                    echo json_encode($result);
            }
        }
    }

    //tanya ke admin
    public function tanya()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $komentar = $_POST['pesan'];
            if($nama == "" or $email == "" or $komentar == "") {
                $result['success'] = "0";
                $result['message'] = "Lengkapi Data";
                echo json_encode($result);
            } else {
                // Konfigurasi email
                $config = [
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => 'infotani.mif@gmail.com',  // Email gmail
                    'smtp_pass'   => 'infotani123',  // Password gmail
                    'smtp_crypto' => 'ssl',
                    'smtp_port'   => 465,
                    'crlf'    => "\r\n",
                    'newline' => "\r\n"
                ];

                // Load library email dan konfigurasinya
                $this->load->library('email', $config);

                // Email dan nama pengirim
                $this->email->from( $_POST['email'], $_POST['nama']);

                // Email penerima
                $this->email->to('infotani.mif@gmail.com'); // Ganti dengan email tujuan
                //$this->email->to('afiffaris5@gmail.com');

                // // Lampiran email, isi dengan url/path file
                // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

                // Subject email
                $this->email->subject('Ada Pesan Dari ' . $_POST['nama']);

                // Isi email
                $this->email->message($_POST['pesan']);

                // Tampilkan pesan sukses atau error
                if ($this->email->send()) {
                    $result['success'] = "1";
                    $result['message'] = "Sudah Terkirim";
                    echo json_encode($result);
                } else {
                    $result['success'] = "0";
                    $result['message'] = "Belum Terkirim";
                    echo json_encode($result);
                }
            }
        }
    }

    //cari akun
    public function passpetani()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $nohp = $_POST['nohp'];
            $data = $this->android_model->cari_petani($username, $nohp);
            if ($data != FALSE) {
                $result['success'] = "1";
                $result['message'] = "Akun ditemukan";
                foreach ($this->android_model->cari_petani($username, $nohp) as $cek) :
                    $hasil = $cek['ID_USER'];
                endforeach;
                $result['id'] = $hasil;
                echo json_encode($result);
            } else {
                $result['success'] = "0";
                $result['message'] = "Akun tidak ditemukan";
                echo json_encode($result);
            }
        }
    }

    //update password
    public function update_petani()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_POST['id'];
            $pass = $_POST['password'];
            $konfpass = $_POST['konfpass'];
            if ($pass != $konfpass){
                $result['success'] = "0";
                $result['message'] = "Password harus sama dengan konfirmasi password";
                echo json_encode($result);
            } else {
                $data = [
                    'PASSWORD' => md5($_POST['password'])
                ];
                $where = array('ID_USER' => $_POST['id']);
                $this->android_model->update_data($user, $data);
                //$this->android_model->update_datas($where, $data, 'user');
                $result["success"] = "1";
                $result["message"] = "Update Data Berhasil!";
                echo json_encode($result);
            }
        }
    }

    public function pemesanan(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $ktp = $_POST['ktp'];
            $stat = $_POST['status'];
            $cek = $this->android_model->cek_pemesanan($ktp,$stat)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                $index['id_pesan'] = "ID Pesan";
                    $index['nama_perusahaan'] = "Nama Perusahaan";
                    $index['tanggal'] = "Tanggal";
                    $index['jml_pesan'] = "Jumlah Pesan";
                    $index['tot_biaya'] = "Total Biaya";
                    $index['status'] = "Status";
                    $index['id_panen'] = "0";
                    $index['komoditas'] = "Komoditas";
                    
                    array_push($result['data'], $index);
                foreach($cek as $row){
                    $index['id_pesan'] = $row->ID_PESAN;
                    $index['nama_perusahaan'] = $row->NAMA_PERUSAHAAN;
                    $index['tanggal'] = $row->TANGGAL;
                    $index['jml_pesan'] = $row->JUMLAH_PESAN;
                    $index['tot_biaya'] = $row->TOTAL_BIAYA;
                    $index['status'] = $row->ID_PESAN_STATUS;
                    $index['id_panen'] = $row->ID_PANEN;
                    $index['komoditas'] = $row->NAMA_KOMODITAS;
                
                    array_push($result['data'], $index);
                }
                $su = $this->android_model->sum_pemesanan($ktp,$stat)->result();
                    
                foreach($su as $row){
                    $result['jmlpesan'] = $row->jmpesan;
                    $result['totbiaya'] = $row->totbiaya;
                }
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
            } else {
                    $result['success'] = "0";
                    $result['message'] = "Tidak Ada Pemesanan";
                    echo json_encode($result);
            }
        }
    }
    public function pemesananTahun(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $ktp = $_POST['ktp'];
            $tahun = $_POST['tahun'];
            $stat = $_POST['status'];
            $cek = $this->android_model->cek_pemesananTahun($ktp,$tahun,$stat)->result();
        
            $result = array();
            $result['data'] = array();
            if ($cek != FALSE ) {
                $index['id_pesan'] = "ID Pesan";
                    $index['nama_perusahaan'] = "Nama Perusahaan";
                    $index['tanggal'] = "Tanggal";
                    $index['jml_pesan'] = "Jumlah Pesan";
                    $index['tot_biaya'] = "Total Biaya";
                    $index['status'] = "Status";
                    $index['id_panen'] = "0";
                    $index['komoditas'] = "Komoditas";
                    
                    array_push($result['data'], $index);
                foreach($cek as $row){
                    $index['id_pesan'] = $row->ID_PESAN;
                    $index['nama_perusahaan'] = $row->NAMA_PERUSAHAAN;
                    $index['tanggal'] = $row->TANGGAL;
                    $index['jml_pesan'] = $row->JUMLAH_PESAN;
                    $index['tot_biaya'] = $row->TOTAL_BIAYA;
                    $index['status'] = $row->ID_PESAN_STATUS;
                    $index['id_panen'] = $row->ID_PANEN;
                    $index['komoditas'] = $row->NAMA_KOMODITAS;
                
                    array_push($result['data'], $index);
                }
                $su = $this->android_model->sum_pemesananTahun($ktp,$tahun,$stat)->result();
                    
                foreach($su as $row){
                    $result['jmlpesan'] = $row->jmpesan;
                    $result['totbiaya'] = $row->totbiaya;
                }
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
            } else {
                    $result['success'] = "0";
                    $result['message'] = "Tidak Ada Pemesanan";
                    echo json_encode($result);
            }
        }
    }
    public function konfirmasi_pemesanan(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['idpesan'];
                    //update data
                    $data = [
                        "ID_PESAN_STATUS" => 2
                    ];
                    $this->android_model->konfirmasi_pemesanan($id,$data);
                    $result["success"] = "1";
                    $result["message"] = "Pemesanan Berhasil Dikonfirmasi!";
                    echo json_encode($result);
        }     
    }    
    public function tolak_pemesanan(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['idpesan'];
            $idpanen = $_POST['idpanen'];
            $jmlpesan = (int)$_POST['jmlpesan'];
                    $cekPanenPesanan = $this->android_model->cek_panenPesanan($idpanen)->result();
                    foreach($cekPanenPesanan as $row){
                        $hasil = $row->HASIL;
                    }
                    if($cekPanenPesanan != FALSE){
                        $increHasil = $hasil+$jmlpesan;
                        $data = [
                            "HASIL" => $increHasil
                        ];
                        $this->android_model->update_hasilPanen($idpanen,$data);
                        $where = array('ID_PESAN' => $id);
                    $this->android_model->hapus_data($where,"pemesanan");
                    $result["success"] = "1";
                    $result["message"] = "Pemesanan Ditolak/Dihapus!";
                    echo json_encode($result);
                    }else{
                        $result["success"] = "1";
                        $result["message"] = "Gagal!";
                        echo json_encode($result);        
                    }
        }     
    }    

    public function pengaturan(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['iduser'];
            $passlama = md5($_POST['passlama']);
            $passbaru = $_POST['passbaru'];
            $passbarukonf = $_POST['passbarukonf'];
            $passupdate = md5($_POST['passbaru']);

            $cek_user = $this->android_model->cekuser_pengaturan($id,$passlama)->result();
            if($cek_user != FALSE){
                    if($passbaru != $passbarukonf){
                         $result["success"] = "1";
                        $result["message"] = "Konfirmasi Password Tidak Sama!";
                        echo json_encode($result);
                    }else{
                        $data = [
                            "PASSWORD" => $passupdate
                        ];
                    $updateData = $this->android_model->update_pengaturan($id,$data);
                        $result["success"] = "1";
                        $result["message"] = "Ganti Password Berhasil!";
                        echo json_encode($result);
                    }
            }else{
                $result["success"] = "1";
                $result["message"] = "Password Salah!";
                echo json_encode($result);
            }    
        }
    }

    public function update_foto(){
        if ($_SERVER['REQUEST_METHOD'] =='POST'){
            $id = $_POST['iduser'];
            $username = $_POST['user'];
            $fotolama = $_POST['fotolama'];
            $foto = $_POST['foto'];

            $gambar = $username.".png";
            $path = "img/user/".$username.".png";
            
            if(file_exists($lok=FCPATH.'/img/user/'.$fotolama)){
                unlink($lok);
            }
            if(file_exists($lok1=FCPATH.'/img/user/'.$gambar)){
                unlink($lok1);
            }
            if(!empty($foto)){
                $query = $this->android_model->update_foto($id, $gambar);
                
                if ($query){
                    file_put_contents($path,base64_decode($foto));
                    $result["success"] = "1";
                    $result["message"] = "Update Foto Berhasil!";
                    echo json_encode($result);
                }else{
                    $result["success"] = "0";
                    $result["message"] = "Update Foto Gagal!";
                    echo json_encode($result);
                }
            }else{
                $result["success"] = "2";
                $result["message"] = "Update Foto Gagal!";
                echo json_encode($result);
            }
        }
    }


}
