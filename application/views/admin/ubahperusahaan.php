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
                    Ubah Data Pengusaha
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Ubah Pengusaha</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <form method="POST" action="<?= base_url('aperusahaan/update')?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="idperusahaan" value="<?= $perusahaan['ID_PERUSAHAAN']?>">
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama pengguna" name="username" value="<?= $perusahaan['USERNAME']?>" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('username') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>SIUP</label>
                            <img style="height:160px; width:120px;" src="<?php echo base_url('img/perusahaan/siup/') . $perusahaan['SIUP']; ?>"></td>
                            <input type="hidden" class="form-control" name="siuplama" value="<?= $perusahaan['SIUP']?>">
                            <input type="file" name="siup" id="foto">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('siup') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>LOGO</label>
                            <img style="height:160px; width:120px;" src="<?php echo base_url('img/perusahaan/user/') . $perusahaan['LOGO']; ?>"></td>
                            <input type="hidden" class="form-control" name="logolama" value="<?= $perusahaan['LOGO']?>">
                            <input type="file" name="logo" id="foto">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('logo') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Perusahaan" name="namaperusahaan" value="<?= $perusahaan['NAMA_PERUSAHAAN']?>">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('namaperusahaan') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan nama email" name="email" value="<?= $perusahaan['EMAIL']?>" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('email') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Perusahaan</label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" value="<?= $perusahaan['ALAMAT_PERUSAHAAN']?>" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('alamat') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" class="form-control" placeholder="Masukkan No Telp Perusahaan" name="notelp" value="<?= $perusahaan['NO_TELP_PERUSAHAAN']?>" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('notelp') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Manager</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Manager" name="manager" value="<?= $perusahaan['NAMA_MANAGER']?>" required>
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