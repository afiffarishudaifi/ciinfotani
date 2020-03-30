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
                    Tambah Data Petani
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Tambah Petani</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <!--membuat sebuah form-->
                    <form method="post" action="">
                        <div class="form-group">
                            <label>KTP</label>
                            <input type="text" class="form-control" name="ktp" placeholder="KTP" required>
                        </div>
                        <div class="form-group">
                            <label>ID Desa</label>
                            <?php
                            echo "<select name='iddesa' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih Desa ===</option>";
                            foreach ($iddesa as $rowdesa) {
                                echo "<option value=" . $rowdesa['ID_DESA'] . ">" . $rowdesa['NAMA_DESA'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="form-group">
                            <label>ID Komoditas</label>
                            <?php
                            echo "<select name='idkomoditas' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih Komoditas ===</option>";
                            foreach ($idkomoditas as $rowkomoditas) {
                                echo "<option value=" . $rowkomoditas['ID_KOMODITAS'] . ">" . $rowkomoditas['NAMA_KOMODITAS'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="form-group">
                            <label>ID Pengguna</label>
                            <?php
                            echo "<select name='iduser' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih Pengguna ===</option>";
                            foreach ($iduser as $rowuser) {
                                echo "<option value=" . $rowuser['ID_USER'] . ">" . $rowuser['USERNAME'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Petani</label>
                            <input type="text" class="form-control" name="namapetani" placeholder="Nama Petani" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('namapetani') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Rumah</label>
                            <input type="text" class="form-control" name="alamatpetani" placeholder="Alamat Petani" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('alamatpetani') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No HP Petani</label>
                            <input type="text" class="form-control" name="nohp" placeholder="No HP Petani" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('nohp') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Luas Sawah</label>
                            <input type="text" class="form-control" name="luassawah" placeholder="Luas Sawah Petani" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('luassawah') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Sawah</label>
                            <input type="text" class="form-control" name="alamatsawah" placeholder="Alamat Sawah Petani" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('alamatsawah') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status Panen</label>
                            <?php
                            echo "<select name='idstatuspanen' class='form-control' onchange='changeValue(this.value)' required>";
                            echo "<option value='' selected>=== Pilih Status Panen ===</option>";
                            foreach ($idstatus as $rowstatus) {
                                echo "<option value=" . $rowstatus['ID_STATUS'] . ">" . $rowstatus['STATUS'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Tanam</label>
                            <input type="date" class="form-control" name="tgltanam" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('tgltanam') ?>
                                </h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Panen</label>
                            <input type="date" class="form-control" name="tglpanen" required>
                            <div class="invalid-feedback">
                                <h5 class="text-danger text-form">
                                    <?php echo form_error('tglpanen') ?>
                                </h5>
                            </div>
                        </div>
                        <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
                        <a href="<?= base_url(); ?>Apetani" class="btn btn-danger" value="Kembali">Kembali</a>
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