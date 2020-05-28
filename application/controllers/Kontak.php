<?php

class Kontak extends CI_Controller{
    function __construct() { 
        parent::__construct(); 
         //load helper form
        $this->load->helper('form'); 
     } 
    public function index(){
        $this->load->view('frontend/contact');
    }

    public function send_mail()
    {
        $nama= $this->input->post('nama');
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');
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
        $this->email->from($email, $nama);

        // Email penerima
        $this->email->to('afiffaris5@gmail.com'); // Ganti dengan email tujuan

        // // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Ada Pesan Dari '.$nama);

        // Isi email
        $this->email->message($komentar);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo "<script>alert('Sukses! Email berhasil dikirim');history.go(-1);</script>";
        } else {
            
            echo "<script>alert('Error! Email gagal dikirim');history.go(-1);</script>";
        }
    }
}