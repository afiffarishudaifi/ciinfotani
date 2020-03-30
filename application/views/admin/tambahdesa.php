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
                    Tambah Data Desa
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Tambah Desa</li>
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
                    <form method="post" action="">
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <?php
                            echo "<select name='idkecamatan' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih kecamatan ===</option>";
                            foreach ($idkec as $kecamatan) {
                                echo "<option value=" . $kecamatan['ID_KECAMATAN'] . ">" . $kecamatan['NAMA_KECAMATAN'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Desa</label>
                            <!--menginputkan sebuah inputan nim bertipe text-->
                            <input type="text" class="form-control" name="namadesa" placeholder="Nama Desa">
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('namadesa') ?>
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