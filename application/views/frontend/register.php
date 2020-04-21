<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    
    <title>INFOTANI - REGISTRASI</title>
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
      <form class="form-signin" action="../../controller/frontend/proses_register" method="post" enctype="multipart/form-data">
      
      
        <br> 
        <h2 class="form-signin-heading" align="center" >REGISTRASI</h2>
        
        <br>
        <label for="username" >Nama Pengguna</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required autofocus>
        
        <label for="password" >Kata Sandi</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required autofocus>
        <label for="passwordConf" >Konfirmasi password</label>
        <input type="password" id="passwordConf" name="passwordConf" class="form-control" placeholder="Ulangi Kata Sandi" required>
        <label for="foto" > Foto KTP </label>
        <input type="file" id="foto" name="foto" >
        <br>
        <br>
        <a href="<?= base_url('register');?>" class="btn btn-lg btn-warning">Batal</a>
        <button class="btn btn-lg btn-success " type="submit" name="submit">Registrasi</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>
