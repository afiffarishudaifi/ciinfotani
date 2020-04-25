<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INFOTANI - LUPA KATA SANDI</title>
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
    <?php foreach($petani as $row){?>
      <form class="form-signin" name="frmForgot" id="frmForgot" action="<?= base_url('lupa/update_petani')?>" method="post">
        <h3 class="form-signin-heading" align="center" style="color: #FFFFFF;">ATUR ULANG KATASANDI</h3>
        <br>
          <label for="username" class="sr-only">Nama Pengguna</label>
          <input type="text" name="username" id="username" class="form-control" value="<?= $row->USERNAME ?>" placeholder="Nama Pengguna" readonly>
        <br>
        <label for="password" class="sr-only">Kata sandi</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi">
        <label for="passwordConf" class="sr-only">Konfirmasi Kata sandi</label>
          <input type="password" name="passwordConf" id="passwordConf" class="form-control" placeholder="Ulangi Kata Sandi">
          
          <input type="submit" name="forgot-password" id="forgot-password" value="Kirim" class="form-submit-button btn btn-lg btn-block btn-success">
        <br>
  <a href="<?= base_url('Login')?>" class="btn btn-warning btn-block">Kembali</a>
      <br>
    </form><?php } ?>
    </div> <!-- /container -->
  </body>
</html>