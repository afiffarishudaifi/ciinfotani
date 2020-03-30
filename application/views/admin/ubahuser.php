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
                    Ubah Data Pengguna
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Ubah Pengguna</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <?php if (validation_errors()) :
                    ?>
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Peringatan!</strong> <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <!--membuat sebuah form-->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID Level</label>
                            <?php
                            echo "<select name='idlevel' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih level ===</option>";
                            foreach ($idlevel as $level) {
                                echo "<option value=" . $level['ID_LEVEL'] . ">" . $level['NAMA_LEVEL'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Pengguna</label>
                            <input type="text" class="form-control" name="namapengguna" value="<?php echo $user['USERNAME'] ?>">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('namapengguna') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="text" class="form-control" name="password" value="<?php echo $user['PASSWORD'] ?>" placeholder="Kata Sandi">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('password') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Foto Pengguna</label>
                            <input type="hidden" name="old_image" value="<?php echo $user['FOTO_USER'] ?>" />
                            <input class="form-control-file" type="file" name="image">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('image') ?>
                                </h5>
                            </div>
                        </div>
                        <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                        <a href="<?= base_url(); ?>Adesa" class="btn btn-danger" value="Kembali">Kembali</a>
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