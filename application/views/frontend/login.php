<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INFOTANI - MASUK</title>

    <!-- logo infotani -->
    <link rel="icon" href="<?= base_url('assets/img/logo.png')?>">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/frontend/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url('assets/frontend/css/ie10-viewport-bug-workaround.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/frontend/css/signin.css')?>" rel="stylesheet">
  </head>

  <body>
    <div class="container">
        <form class="form-signin" id="login" name="login" action="<?php echo base_url('Login/cek_login'); ?>" method="POST">
        <br>
        <h2 class="form-signin-heading" align="center" style="color: #FFFFFF;">MASUK INFOTANI</h2>

        <br>
        <label for="username" class="sr-only">Nama Pengguna</label>
        <input type="text" id="username" name="txt_user" class="form-control" placeholder="Nama Pengguna" required autofocus>
        <br>
        <label for="password" class="sr-only">Kata Sandi</label>
        <input type="password" id="password" name="txt_pass" class="form-control" placeholder="Kata Sandi" required>
        <br>
        <input type="submit" name="btn_log" class="btn btn-primary btn-user btn-block" value="Masuk">
        <br>
        <a href="<?= base_url('lupa')?>" style="color:whitesmoke">Lupa Kata Sandi Anda?</a></p>
        <center> <p>------------------- atau --------------------</p> </center>
        <a href="<?= base_url('register')?>" class="btn btn-success btn-block">Buat Akun Baru?</a>
        
      	<br>
	<a href="<?= base_url('beranda')?>" class="btn btn-warning btn-block">Kembali</a>
      <br>
      </form>
</div> <!-- /container -->

  </body>
</html>
