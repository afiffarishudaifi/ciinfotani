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
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Tabel Desa</h3>
                                <h3><a href="<?php echo site_url('Adesa/tambah') ?>"><span class="fa fa-plus" style="position:static;float:Left"> Tambah Data</span></a></h3>
                            </div>
                            <?php if ($this->session->flashdata('desadiubah')) : ?>
                                <div class="alert alert-warning alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Sukses </strong> <?php echo $this->session->flashdata('desadiubah'); ?> !
                                </div>

                            <?php endif; ?>
                            <?php if ($this->session->flashdata('desaditambah')) : ?>
                                <div class="alert alert-info alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Sukses </strong> <?php echo $this->session->flashdata('desaditambah'); ?> !
                                </div>

                            <?php endif; ?>
                            <?php if ($this->session->flashdata('desadihapus')) : ?>
                                <div class="alert alert-danger alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Sukses </strong> <?php echo $this->session->flashdata('desadihapus'); ?> !
                                </div>

                            <?php endif; ?>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID DESA</th>
                                            <th>ID KECAMATAN</th>
                                            <th>NAMA DESA</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($desa as $row) {  //merubah array dari objek ke array yang biasanya
                                        ?>
                                            <tr>
                                                <!--memangambil data dari tabel dengan mengisikan data di table-->
                                                <td><?php echo $row['ID_DESA']; ?></td>
                                                <td><?php echo $row['ID_KECAMATAN']; ?></td>
                                                <td><?php echo $row['NAMA_DESA']; ?></td>
                                                <td>
                                                    <a href="<?php base_url() ?>Adesa/ubah/<?php echo $row['ID_DESA']; ?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                                                            </span></button></a>
                                                    <a href="<?php base_url() ?>Adesa/hapus/<?php echo $row['ID_DESA']; ?>" data-toggle="modal" class="btn btn-danger" onclick="return confirm('Apa yakin ingin menghapus <?php echo $row['NAMA_DESA']; ?> ?');"><span class="fa fa-trash"></a>
                                                    <!-- Delete -->

                                                    <!-- /.modal -->
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
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
<!-- Ini merupakan script yang terpenting -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#show').on('show.bs.modal', function(e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type: 'post',
                url: './../../controller/admin/detail.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data: 'getDetail=' + getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success: function(data) {
                    $('.modal-data').html(data);
                    /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
        });
    });
</script>


</html>