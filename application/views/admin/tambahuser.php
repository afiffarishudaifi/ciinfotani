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
                    Tambah Data Pengguna
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Tambah Pengguna</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <!--membuat sebuah form-->

                    <form action="<?= base_url('Auser/user_tambah')?>" method="post" enctype="multipart/form-data">
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
                            <input class="form-control <?php echo form_error('namapengguna') ? 'is-invalid' : '' ?>" type="text" name="namapengguna" placeholder="Nama Pengguna" />
                            <div class="text-danger text-form invalid-feedback">
                                <?php echo form_error('namapengguna') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Katasandi</label>
                            <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password" min="0" placeholder="Katasandi" />
                            <div class="text-danger text-form invalid-feedback">
                                <?php echo form_error('password') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name">Photo</label>
                            <input class="form-control-file <?php echo form_error('foto') ? 'is-invalid' : '' ?>" type="file" name="foto" />
                            <div class="text-danger text-form invalid-feedback">
                                <?php echo form_error('foto') ?>
                            </div>
                        </div>

                        <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                        <a href="<?= base_url(); ?>Auser" class="btn btn-danger" value="Kembali">Kembali</a>
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