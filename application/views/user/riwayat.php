<!DOCTYPE html>
<html>
<?php
$this->load->view('_partials/head');
?>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <!--header-->
        <?php
        $this->load->view('_partials/headeruser');
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php
            $this->load->view('_partials/sidebar');
            ?>
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
                                            <TH>ID PERUSAHAAN</TH>
                                            <TH>KTP</TH>
                                            <th>TANGGAL</th>
                                            <th>JUMLAH PESAN (KG)</th>
                                            <th>TOTAL PESAN (RP)</th>
                                            <th>STATUS BAYAR</th>
                                            <th>AKSI(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($getAll as $data) :
                                        ?>
                                            <tr>
                                                <!--memangambil data dari tabel dengan mengisikan data di table-->
                                                <td><?php echo $data['ID_PESAN']; ?></td>
                                                <td><?php echo $data['ID_PERUSAHAAN']; ?></td>
                                                <td><?php echo $data['KTP']; ?></td>
                                                <td><?php echo DATE_FORMAT(date_create($data['TANGGAL']), 'd M Y'); ?></td>
                                                <td class="uang"><?php echo $data['JUMLAH_PESAN']; ?></td>
                                                <td class="uang"><?php echo $data['TOTAL_BIAYA']; ?></td>
                                                <td><?php echo $data['STATUS_PESAN']; ?></td>
                                                <td>

                                                    <?php if ($data['STATUS_PESAN'] == 'Belum Konfirmasi') { ?>
                                                        <a href="#konfir<?php echo $data['ID_PESAN']; ?>" data-toggle="modal" class="btn btn-danger"><span class="fa">Konfirmasi</a>
                                                        <!-- Delete -->
                                                        <div class="modal fade" id="konfir<?php echo $data['ID_PESAN']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <form action="" method="post">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                                            <h4 class="modal-title" id="myModalLabel">Kembali</h4>
                                                                        </div>
                                                                        <?php
                                                                        foreach ($dataPesan as $drow) :
                                                                        ?>
                                                                            <div class="modal-footer">
                                                                                <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                                                                <input type="hidden" name="id" value="<?php echo $drow['ID_PESAN']; ?>">
                                                                                <h5>
                                                                                    <center>Apakah yakin ingin mengkonfirmasi pemesanan <strong><?php echo $drow['ID_PESAN']; ?></strong> ?</center>
                                                                                </h5>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                                                                                <a href="<?php base_url() ?>Ukonfirmasi/konfirmasi/Batal/<?php echo $drow['ID_PESAN']; ?>" class="btn btn-danger"><span class="fa fa-trash">
                                                                                        </span>Hapus Pemesanan</a>
                                                                                <a href="<?php base_url() ?>Ukonfirmasi/konfirmasi/konfir/<?php echo $drow['ID_PESAN']; ?>" class="btn btn-success"><span class="fa fa-pencil"></span>Konfirmasi</a>

                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div><?php } else { ?>
                                                        <a href="#konfir<?php echo $data['ID_PESAN']; ?>" data-toggle="modal" class="btn btn-primary"><span class="fa" readonly>Konfirmasi</a>
                                                        <!-- Delete -->
                                                        <div class="modal fade" id="konfir<?php echo $data['ID_PESAN']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <form>
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                                            <h4 class="modal-title" id="myModalLabel">Kembali</h4>
                                                                        </div>
                                                                        <?php
                                                                        foreach ($dataPesan as $drow) :
                                                                        ?>
                                                                            <div class="modal-footer">
                                                                                <!-- pilihan button yang terdapat dalam delete ada cancel dan delete -->
                                                                                <input type="hidden" name="id" value="<?php echo $drow['ID_PESAN']; ?>">
                                                                                <h5>
                                                                                    <center>Apakah yakin ingin mengkonfirmasi pemesanan <strong><?php echo $drow['ID_PESAN']; ?></strong> ?</center>
                                                                                </h5>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class=""></span> Batal</button>
                                                                                <button type="button" class="btn btn-rrimary" data-dismiss="modal">Sudah Konfirmasi</button>
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </td>
                                            </tr>
                                    <?php
                                                            }
                                                        endforeach; ?>
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

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <?php
    $this->load->view('_partials/js');
    ?>
</body>

</html>