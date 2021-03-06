<!DOCTYPE html>
<html>
<?php
        $this->load->view("_partials/head.php");
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!--header-->
    <?php
        $this->load->view("_partials/header.php");
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
        $this->load->view("_partials/sidebar.php");
    ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengaturan Data</li>
      </ol>
    </section>
    <section class="content">
        <div class="container">
            <br>
            <div class="col-md-5 col-md-offset-3 form-login" style="position:static">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="fa fa-hand-o-right" style="position:static"></span>
                	Form Update Foto </div>
                    <div class="panel-body" style="min-height:450px">
                        <form action="<?= base_url('apengaturan/update')?>" method="POST" name="ganti_password" enctype="multipart/form-data">
                        <?php foreach($user as $row){ ?>
                        	<input type="hidden" name="userid" id="userid" value="<?= $row->ID_USER ?>">
                            <div class="form-group">
                        		Foto
                                <img src="<?= base_url().'/img/user/'.$row->FOTO_USER ?>" style="height:160px; width:120px;" class="img-rectangle" alt="User Image">
                                <input type="hidden" name="fotouser" id="fotouser" value="<?= $row->FOTO_USER ?>">
                            <?php } ?>
                                <input type="file" id="foto" name="foto" >
                            </div>
                        	<div class="form-group">
                        		Katasandi Saat Ini
                                <input type="text" class="form-control" placeholder="Katasandi Lama"  name="pass_lama" id="pass_lama" required/>
                            </div>

                        	<div class="form-group">
                        		Katasandi Baru
                                <input type="password" class="form-control" placeholder="Katasandi Baru"  name="pass_baru" id="pass_baru" required/>
                            </div>

                        	<div class="form-group">
                        		Konfirmasi Katasandi Baru
                                <input type="password" class="form-control" placeholder="Konfirmasi Katasandi"  name="pass_konf" id="pass_konf" required/>
                            </div>

                        	<input class="btn btn-block sub-hover" type="submit" name="Ganti" value="Ganti">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    </div>
  <!-- /.content-wrapper -->
  <?php
        $this->load->view("_partials/footer.php");
  ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php
        $this->load->view("_partials/js.php");
?>
</body>
</html>
