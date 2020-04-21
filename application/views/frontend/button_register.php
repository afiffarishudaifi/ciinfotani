
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
      <form class="form-signin" id="login" name="login" action="../../controller/frontend/proses_login" method="post">
        <br>
        <h2 class="form-signin-heading" align="center" style="color: #FFFFFF;">PILIH REGISTRASI</h2>

        <br>
       
	<a href="<?= base_url('register/petani')?>" class="btn btn-primary btn-block">PETANI</a>
  <a href="<?= base_url('register/pengusaha')?>" class="btn btn-warning btn-block">PENGUSAHA</a>
  <br>
   <a href="<?= base_url('login');?>" class="btn btn- btn-block">kembali</a>
      <br>
      </form>
    </div> <!-- /container -->
  </body>
</html>
