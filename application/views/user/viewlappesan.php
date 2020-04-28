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
                                <h3 style="text-align: center;">Laporan Pemesanan</h3>
                                <form action="<?php echo base_url('Ulappesan/sortTahun') ?>" method="POST">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $tahun = date("Y");
                                    echo "<select name='pilih' class='form-control hidden-print'>";
                                    echo "<option value='' selected>--Pilih Tahun--</option>";
                                    foreach ($getTahun as $data) :
                                    ?>
                                        <option value="<?php echo $data['tahun']; ?>"><?php echo $data['tahun']; ?></option>
                                    <?php
                                    endforeach;

                                    echo "</select><br>";
                                    echo "<button type='submit' name='submit' class='btn btn-warning hidden-print'>Pilih</button>";

                                    ?>
                                </form>
                            </div>
                            <?php foreach ($jumpesan as $jumlahpesan) : ?>
                                <h3 class="box-title">Jumlah Pemesanan : <b class="uang"><?php echo $jumlahpesan['jumlah']; ?> </b><b> KG</b> </h3>
                            <?php endforeach; ?>
                            <br>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID PEMESANAN</th>
                                            <th>NAMA PERUSAHAAN</th>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH_PESAN (KG)</th>
                                            <th>TOTAL BIAYA (RP)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($lappesan as $data) {  //merubah array dari objek ke array yang biasanya
                                        ?>
                                            <tr>
                                                <!--memangambil data dari tabel dengan mengisikan data di table-->
                                                <td><?php echo $data['ID_PESAN']; ?></td>
                                                <td><?php echo $data['NAMA_PERUSAHAAN']; ?></td>
                                                <td><?php echo $data['TANGGAL']; ?></td>
                                                <td class="uang"><?php echo $data['JUMLAH_PESAN']; ?></td>
                                                <td class="uang"><?php echo $data['TOTAL_BIAYA']; ?></td>
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