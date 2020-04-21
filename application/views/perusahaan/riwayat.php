<!DOCTYPE html>
<html>
<?php
$this->load->view('_partials/head');
?>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <!--header-->
        <?php
        $this->load->view('_partials/headerusaha');
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php
            $this->load->view('_partials/sidebarusaha');
            ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                            
                                <h3 style="text-align: center;">Data Tabel Pemesanan</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID PESAN</th>
                                            <TH>NAMA PERUSAHAAN</TH>
                                            <TH>NAMA PETANI</TH>
                                            <th>KOMODITAS</th>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH PESAN (KG)</th>
                                            <th>TOTAL HARGA PESAN (RP)</th>
                                            <th>STATUS PESAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($getAll as $data) :  //merubah array dari objek ke array yang biasanya
                                        ?>
                                            <tr>
                                                <!--memangambil data dari tabel dengan mengisikan data di table-->
                                                <td><?php echo $data['ID_PESAN']; ?></td>
                                                <td><?php echo $data['NAMA_PERUSAHAAN']; ?></td>
                                                <td><?php echo $data['NAMA_PETANI']; ?></td>
                                                <td><?php echo $data['NAMA_KOMODITAS']; ?></td>
                                                <td><?php echo DATE_FORMAT(date_create($data['TANGGAL']), 'd M Y'); ?></td>
                                                <td class="uang"><?php echo $data['JUMLAH_PESAN']; ?></td>
                                                <td class="uang"><?php echo $data['TOTAL_BIAYA']; ?></td>
                                                <td><?php echo $data['STATUS_PESAN']; ?></td>

                                                <td> <?php if ($data['ID_PESAN_STATUS'] == 1) { ?>
                                                        <a href="#del<?php echo $data['ID_PESAN']; ?>" data-toggle="modal" class="fa fa-times">Batalkan</a>
                                                    <?php } else {
                                                            echo "Tidak Dapat Dibatalkan";
                                                        } ?>
                                                    <!-- Delete -->
                                                    <div class="modal fade" id="del<?php echo $data['ID_PESAN']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <form action="<?php echo base_url('Priwayat/fixPemesanan')?>" method="post" enctype="multipart/form-data">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <center>
                                                                            <h4 class="modal-title" id="myModalLabel">Hapus</h4>
                                                                        </center>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                                                        <input type="text" name="idhapus" value="<?php echo $data['ID_PESAN']; ?>">
                                                                        <input type="text" name="jmlpesan" value="<?php echo $data['JUMLAH_PESAN'] ?>">
                                                                        <input type="text" name="ktp" value="<?php echo $data['KTP'] ?>">
                                                                        <input type="text" name="idpanen" value="<?php echo $data['ID_PANEN'] ?>">
                                                                        <input type="text" name="idperusahaan" value="<?php echo $data['ID_PERUSAHAAN'] ?>">
                                                                        <h5>
                                                                            <center>Apakah yakin ingin membatalkan pesanan <strong><?php echo $data['ID_PESAN']; ?></strong> ?</center>
                                                                        </h5>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                                                        <button type="submit" class="btn btn-danger" name="hapus"><span class="fa fa-trash"></span> Hapus</button>
                                                                        <!--<a href="<?php base_url() ?>Pkonfirmasi/konfirmasi/Batal/<?php echo $data['ID_PESAN']; ?>" class="btn btn-danger"><span class="fa fa-trash">
                                                                            </span>Hapus Pemesanan</a>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        endforeach;
                                        if (isset($_POST['hapus'])) {
                                            $id = $_POST['idhapus'];
                                            $jumlah = $_POST['jmlpesan'];
                                            //$jumlah_fix = str_replace(".","",$jumlah);
                                            $ktp = $_POST['ktp'];
                                            $idpanen = $_POST['idpanen'];
                                            $idperusahaan = $_POST['idperusahaan'];


                                            $cekkurang = mysqli_query($koneksi, "SELECT * FROM panen, petani, pemesanan WHERE petani.KTP=panen.KTP AND petani.KTP=pemesanan.KTP AND panen.ID_PANEN=$idpanen AND pemesanan.KTP=$ktp AND pemesanan.ID_PERUSAHAAN=$idperusahaan AND pemesanan.ID_PESAN='$id'") or die(mysqli_error($koneksi));
                                            while ($data = mysqli_fetch_array($cekkurang)) {
                                                $hasil = $data['HASIL'] + $jumlah;
                                            };

                                            $Tambah = mysqli_query($koneksi, "UPDATE panen, petani, pemesanan set panen.hasil=$hasil WHERE petani.KTP=panen.KTP AND petani.KTP=pemesanan.KTP AND panen.ID_PANEN=$idpanen AND pemesanan.KTP=$ktp AND pemesanan.ID_PERUSAHAAN=$idperusahaan AND pemesanan.ID_PESAN='$id'") or die(mysqli_error($koneksi));
                                            $sql = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE ID_PESAN = '$id'") or die(mysqli_error($koneksi));
                                            if ($sql) {
                                                echo '?>
        <script language="JavaScript">
        alert("Pembatalan Pemesanan Berhasil !");
        setTimeout(function() {window.location.href="riwayat"},10);
        </script><?php';
                                            } else {
                                                echo '<script language="JavaScript">
        alert("Pembatalan Pemesanan Gagal !"");
        setTimeout(function() {window.location.href="riwayat"},10);
        </script>';
                                            }
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
        $this->load->view('_partials/footer');
        ?>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <?php
    $this->load->view('_partials/js');
    ?>
</body>

</html>