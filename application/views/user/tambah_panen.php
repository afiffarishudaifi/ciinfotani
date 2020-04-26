<!DOCTYPE html>
<html>
<?php
$this->load->view('_partials/head');
?>

<body class="hold-transition sidebar-collapse skin-green sidebar-mini">
    <div class="wrapper">

        <!--header-->
        <?php
        $this->load->view("_partials/header.php");;
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
                    Tambah Data Panen
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Tambah Panen</li>
                </ol>
            </section>
            <section class="content">
                <div class="container">
                    <br>
                    <?php
                    foreach ($cekPanen as $hasil) :
                        $drow = $hasil['KTP'];
                    endforeach;
                    /*if ($drow == 0 || $drow == NULL) {
                            ?>
                                <script language="JavaScript">
                                    alert('Tunggu Panen Selesai !');
                                    setTimeout(function() {
                                        window.location.href = './index'
                                    }, 10);
                                </script>
                            <?php
                            }*/ ?>

                    <!--membuat sebuah form-->
                    <?php if ($this->session->flashdata('panenditambah')) : ?>
                        <div class="alert alert-info alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Sukses </strong> <?php echo $this->session->flashdata('panenditambah'); ?> !
                        </div>

                    <?php endif; ?>
                    <form method="post" action="<?php echo base_url('Upanen/tambahpanen') ?>">
                        <?php
                        foreach ($cekPanen as $drow) :
                        ?>
                            <div class="form-group">
                                <label>KTP</label>
                                <input type="text" class="form-control" readonly name="id" value="<?php echo $drow['KTP']; ?>">
                                <input type="hidden" name="max" value="<?php echo $drow['max'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Komoditas</label>
                                <input type="text" class="form-control" readonly value="<?php echo $drow['NAMA_KOMODITAS']; ?>">
                                <div class="invalid-feedback">
                                    <h5 class="text-danger text-form">
                                        <?php echo form_error('komoditas') ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Panen</label>
                                <input type="text" class="form-control" name="tgl" readonly value="<?php echo $drow['TGL_PANEN']; ?>">
                                <div class="invalid-feedback">
                                    <h5 class="text-danger text-form">
                                        <?php echo form_error('tgl') ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Panen/Kg (Rp)</label>
                                <input type="text" class="uang form-control" name="harga" required>
                                <div class="invalid-feedback">
                                    <h5 class="text-danger text-form">
                                        <?php echo form_error('harga') ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hasil Panen (Kg)</label>
                                <!--menginputkan sebuah inputan nim bertipe text-->
                                <input type="text" class="uang form-control" value="<?php echo $drow['HASIL']; ?>" name="hasil" required>
                                <div class="invalid-feedback">
                                    <h5 class="text-danger text-form">
                                        <?php echo form_error('hasil') ?>
                                    </h5>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" readonly name="panen" value="Panen">
                            <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                            <a href="<?php echo base_url('User'); ?>" class="btn btn-danger" value="Kembali">Kembali</a>
                        <?php
                        endforeach; ?>
                    </form>
                </div>
            </section>
            <br><br>
        </div>
        <!-- /.content-wrapper -->
        <?php
        $this->load->view("_partials/footer.php");
        ?>

        <!-- Control Sidebar -->

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <?php
    $this->load->view("_partials/js.php");
    ?>
</body>

</html>