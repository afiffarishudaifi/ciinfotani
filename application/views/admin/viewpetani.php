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
                                <h3 style="text-align: center;">Data Petani</h3>
                                <h3><a href="<?php echo site_url('Apetani/tambah') ?>"><span class="fa fa-plus" style="position:static;float:Left"> Tambah Data</span></a></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>KTP</th>
                                            <th>USERNAME</th>
                                            <th>NAMA PETANI</th>
                                            <th>ALAMAT PETANI</th>
                                            <th>NO HP</th>
                                            <th>KOMODITAS</th>
                                            <th>LUAS SAWAH</th>
                                            <th>ALAMAT SAWAH</th>
                                            <th>DESA</th>
                                            <th>TANAM</th>
                                            <th>PANEN</th>
                                            <th>STATUS</th>
                                            <th>AKSI(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($petani as $row) {  //merubah array dari objek ke array yang biasanya
                                        ?>
                                            <tr>
                                                <!--memangambil data dari tabel dengan mengisikan data di table-->
                                                <td><?php echo $row['KTP']; ?></td>
                                                <td><?php echo $row['USERNAME']; ?></td>
                                                <td><?php echo $row['NAMA_PETANI']; ?></td>
                                                <td><?php echo $row['ALAMAT_PETANI']; ?></td>
                                                <td><?php echo $row['NO_HP']; ?></td>
                                                <td><?php echo $row['KOMODITAS']; ?></td>
                                                <td><?php echo $row['LUAS_SAWAH']; ?></td>
                                                <td><?php echo $row['ALAMAT_SAWAH']; ?></td>
                                                <td><?php echo $row['DESA']; ?></td>
                                                <td><?php echo DATE_FORMAT(date_create($row['TANAM']), 'd M Y'); ?></td>
                                                <td><?php echo DATE_FORMAT(date_create($row['PANEN']), 'd M Y'); ?></td>
                                                <td><?php echo $row['STATUS']; ?></td>
                                                <td>
                                                    <a href="<?php base_url() ?>Apetani/ubah/<?php echo $row['KTP']; ?>"><button class="pilih btn btn-primary"><span class="fa fa-pencil">
                                                            </span></button></a>
                                                    <a href="<?php base_url() ?>Apetani/hapus/<?php echo $row['KTP']; ?>" data-toggle="modal" class="btn btn-danger" onclick="return confirm('Apa yakin ingin menghapus <?php echo $row['NAMA_PETANI']; ?> ?')"><span class="fa fa-trash"></a>
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