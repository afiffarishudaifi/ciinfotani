<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>INFOTANI - Lupa Password</title>
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
    <?php foreach($pengusaha as $row){ ?>
      <form  class="form-signin" action="<?= base_url('lupa/update_pengusaha')?>" method="POST">
        <br> 
              <h2 class="form-signin-heading" align="center" >Atur Ulang Kata Sandi</h2>
              <label for="username" >NamaPengguna</label>
            <input type="text" id="username" name="username" class="form-control" value="<?= $row->USERNAME ?>" placeholder="Nama Pengguna" readonly>

            <br>
            <label for="password" >Katasandi Baru</label>
            <input type="password" id="password" name="pass_baru" class="form-control" placeholder="Kata Sandi" required autofocus>

            <label for="passwordConf" >Konfirmasi Katasandi</label>
            <input type="password" id="passwordConf" name="pass_konf" class="form-control" placeholder="Ulangi Kata Sandi" required>

             <a href="<?= base_url('login')?>" class="btn btn-lg btn-warning">Batal</a>
            <button class="btn btn-lg btn-success " type="submit" name="Gantipengusaha">Simpan</button>            
      </form>
    <?php } ?>
    </div> <!-- /container -->
  </body>
</html>
