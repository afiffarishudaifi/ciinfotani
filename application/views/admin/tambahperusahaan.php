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
                    Tambah Data Pengusaha
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Tambah Pengusaha</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama pengguna" name="username" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('username') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Masukkan nama pengguna" name="password" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('password') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>SIUP</label>
                            <input type="file" name="siup" id="foto">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('siup') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>LOGO</label>
                            <input type="file" name="logo" id="foto">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('logo') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Perusahaan" name="namaperusahaan" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('namaperusahaan') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan nama email" name="email" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('email') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Perusahaan</label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('alamat') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" class="form-control" placeholder="Masukkan No Telp Perusahaan" name="notelp" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('notelp') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Manager</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Manager" name="manager" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('manager') ?>
                                </h5>
                            </div>
                        </div>
                        <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                        <a href="<?= base_url(); ?>Aperusahaan" class="btn btn-danger" value="Kembali">Kembali</a>
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