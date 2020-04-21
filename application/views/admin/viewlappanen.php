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
                                <h3 style="text-align: center;">Laporan Panen</h3>
                                <form action="<?php echo base_url('Alappanen/sortKomoditas') ?>" method="POST">
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $tahun = date("Y");
                                    echo "<select name='pilih' class='form-control hidden-print'>";
                                    echo "<option value='' selected>--Pilih Komoditas--</option>";
                                    foreach ($getKomo as $data) :
                                    ?>
                                        <option value="<?php echo $data['ID_KOMODITAS']; ?>"><?php echo $data['NAMA_KOMODITAS']; ?></option>
                                    <?php
                                    endforeach;

                                    echo "</select><br>";
                                    echo "<button type='submit' name='submit' class='btn btn-warning hidden-print'>Pilih</button>";

                                    ?>
                                </form>
                            </div>
                            <?php foreach ($jumpanen as $jumlahpanen) : ?>
                                <h3 class="box-title">Jumlah Panen : <b class="uang"><?php echo $jumlahpanen['jumlah']; ?> </b><b> KG</b> </h3>
                            <?php endforeach; ?>
                            <br>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID PETANI</th>
                                            <th>NAMA PETANI</th>
                                            <th>TANGGAL PANEN</th>
                                            <th>DESA</th>
                                            <th>KECAMATAN</th>
                                            <th>HASIL PANEN AWAL (KG)</th>
                                            <th>HASIL SISA PANEN (KG)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($lappanen as $data) {  //merubah array dari objek ke array yang biasanya
                                        ?>
                                            <tr>
                                                <!--memangambil data dari tabel dengan mengisikan data di table-->
                                                <td><?php echo $data['KTP']; ?></td>
                                                <td><?php echo $data['NAMA_PETANI']; ?></td>
                                                <td><?php echo DATE_FORMAT(date_create($data['TGL_PANEN']), 'd M Y'); ?></td>
                                                <td><?php echo $data['NAMA_DESA']; ?></td>
                                                <td><?php echo $data['NAMA_KECAMATAN']; ?></td>
                                                <td class="uang"><?php echo $data['HASIL_AWAL']; ?></td>
                                                <td class="uang"><?php echo $data['HASIL']; ?></td>
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