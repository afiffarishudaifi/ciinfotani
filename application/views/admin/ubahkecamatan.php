<!DOCTYPE html>
<html>
<?php
$this->load->view("_partials/head.php");
?>

<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
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
                    Ubah Data Kecamatan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Ubah Kecamatan</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <?php if (validation_errors()) :
                    ?>
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Danger!</strong> <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <!--membuat sebuah form-->
                    <form method="post" action="">
                        <input type="hidden" name="idkecamatan" value="<?php echo $kecamatan['ID_KECAMATAN'] ?>">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <!--menginputkan sebuah inputan nim bertipe text-->
                            <input type="text" value="<?php echo $kecamatan['NAMA_KECAMATAN'] ?>" class="form-control" name="namakecamatan" placeholder="Nama Kecamatan">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('namakecamatan') ?>
                                </h5>
                            </div>
                        </div>
                        <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                        <a href="<?= base_url(); ?>Akecamatan" class="btn btn-danger" value="Kembali">Kembali</a>
                    </form>
                </div>
            </section>
            <br><br>
        </div>
        <!-- /.content-wrapper -->
        <?php
        $this->load->view("_partials/footer.php");
        ?>

        <div class="control-sidebar-bg"></div>
    </div>
    <?php
    $this->load->view("_partials/js.php");
    ?>
</body>

</html>