<!DOCTYPE html>
<html>
<?php
$this->load->view("_partials/head.php");
$getUser = $this->session->userdata('session_username_perusahaan');
$getId = $this->session->userdata('session_id_perusahaan');
$getLogo = $this->session->userdata('session_logo_perusahaan');
?>

<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
    <div class="wrapper">
 
        <!--header-->
        <?php
        $this->load->view("_partials/headerusaha.php");
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php
            $this->load->view("_partials/sidebarusaha.php");
            ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Halaman Pemesanan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Halaman Pemesanan</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('ppemesanan/insertPesanan')?>" method="post">
                            <?php
                                // echo $geid;
                                    // $nohppetani = $data['NO_HP'];
                                    foreach($getPesanan as $row){
                                        $nohppetani = $row->NO_HP
                            ?>
                                    <fieldset>
                                        <legend>
                                            <h5>Data Petani</h5>
                                        </legend>
                                        <input type="hidden" name="idpanen" value="<?php echo $row->ID_PANEN ?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">KTP Petani</label>
                                                <input type="text" name="ktp" value="<?php echo $row->KTP ?>" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Nama Petani</label>
                                                <input type="text" name="namapetani" class="form-control" value="<?php echo $row->NAMA_PETANI ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Komoditas</label>
                                                <input type="text" name="komoditas" class="form-control" value="<?php echo $row->NAMA_KOMODITAS ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Hasil Panen (Kg)</label>
                                                <input type="text" id="hasil" name="hasil" class="uang form-control" value="<?php echo $row->HASIL ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Tanggal Panen</label>
                                                <input type="text" name="tglpanen" class="form-control" value="<?php echo DATE_FORMAT(date_create($row->TGL_PANEN), 'd M Y') ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Alamat</label>
                                                <input type="text" name="alamatpetani" class="form-control" value="<?php echo $row->ALAMAT_PETANI ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Harga/Kg (Rp)</label>
                                                <input type="text" id="harga" name="harga" class="uang form-control" readonly value="<?php echo $row->HARGA ?>" onkeyup="sum();">
                                            </div>
                                        </div>
                                    </fieldset><?php }
                                        ?>
                            <fieldset>
                                <legend>
                                    <h5>Data Pengusaha</h5>
                                </legend>
                                <?php foreach($getUsaha as $row){?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">ID Usaha</label>
                                        <input type="text" value="<?php echo $row->ID_PERUSAHAAN; ?>" name="idperusahaan" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nama Usaha</label>
                                        <input type="text" name="namapengusaha" value="<?php echo $row->USERNAME; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Alamat Usaha</label>
                                        <input type="text" name="alamatpengusaha" value="<?php echo $row->ALAMAT_PERUSAHAAN; ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Nama Manager</label>
                                        <input type="text" name="namamanager" value="<?php echo $row->NAMA_MANAGER; ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <?php }?>
                            </fieldset>
                            <fieldset>
                                <legend>
                                    <h5>Data Pemesanan</h5>
                                </legend>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Total Pemesanan (Kg)</label>
                                        <input type="text" id="jmlpesan" name="jmlpesan" class="uang form-control" onkeyup="sum();" onkeypress="return hanyaAngka(event)">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputCity">Total Harga Pemesanan (Rp)</label>
                                            <input type="text" name="total" id="total" class="uang form-control" readonly>
                                        </div>
                                    </div>
                            </fieldset>
                            <!-- <input type="hidden" name="email" class="form-control" readonly>
                            <?php //$jmlpesan = $_POST['jmlpesan']; ?> -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPush">Lanjut</button>
                            <!--<input type="submit" name="pesan" class="btn btn-success" value="Lanjut">-->
                            <a href="<?= base_url('carihasil')?>" class="btn btn-danger" value="Kembali">Kembali</a>
                            <!--<a href="https://api.whatsapp.com/send?phone=6289697020078&text=Halo%20mau%20order%20gan">coba</a>-->
                            <?php //$harga = $_POST['harga'];
                            //$harga_new = str_replace(".","","$harga");
                            ?>
                            <script type="text/javascript">
                                function sum() {
                                    var textharga = document.getElementById('harga').value;
                                    var textharga_new = textharga.replace('.', '');
                                    var textpesan = document.getElementById('jmlpesan').value;
                                    var textpesan_new = textpesan.replace('.', '');
                                    var texthasil = document.getElementById('hasil').value;
                                    var texthasil_new = texthasil.replace('.', '');
                                    var res = parseFloat(textpesan) > parseFloat(texthasil);
                                    if (parseFloat(textpesan_new) > parseFloat(texthasil_new)) {
                                        document.getElementById('jmlpesan').value = texthasil;
                                    }
                                    var textpesan = document.getElementById('jmlpesan').value;
                                    var textpesan_new = textpesan.replace('.', '');
                                    var result = parseFloat(textharga_new) * parseFloat(textpesan_new);
                                    if (!isNaN(result)) {
                                        var konver = formatCurrency(result);
                                        document.getElementById('total').value = konver;
                                    }

                                };

                                function formatCurrency(vValue) {
                                    aDigits = vValue.toFixed(0).split(".");
                                    aDigits[0] = aDigits[0].split("").reverse().join("").replace(/(\d{3})(?=\d)/g, "$1.").split("").reverse().join("");
                                    num = aDigits.join(".");
                                    if (num == 'NaN') {
                                        _value = '0';
                                    } else {
                                        _value = num;
                                    }
                                    return _value;
                                }
                            </script>
                         
                            <!--Modal: modalPush-->
                            <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-info" role="document">
                                    <!--Content-->
                                    <div class="modal-content text-center">
                                        <!--Header-->
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading">Informasi Penting</p>
                                        </div>

                                        <!--Body-->
                                        <div class="modal-body">

                                            <i class="fa fa-bell fa-4x animated rotateIn mb-4"></i>
                                            <p>Silahkan Hubungi No HP petani yaitu <?php echo $nohppetani ?> untuk melanjutkan proses pemesanan panen</p>

                                        </div>

                                        <!--Footer-->
                                        <div class="modal-footer flex-center">
                                            <input type="submit" name="pesan" class="btn btn-info" value="Pesan">
                                            <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Tidak</a>
                                        </div>
                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal: modalPush-->
                        </form>
                    </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        $this->load->view('_partials/footer');
        ?>

        <!-- Control Sidebar -->

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <?php
    $this->load->view('_partials/js');
    ?>
</body>

</html>
<?php //} 
?>