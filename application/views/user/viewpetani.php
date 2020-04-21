<!DOCTYPE html>
<html>
<?php
$this->load->view('_partials/head');
?>

<body class="hold-transition sidebar-collapse skin-green sidebar-mini">
  <div class="wrapper">

    <!--header-->
    <?php
    $this->load->view('_partials/headeruser');
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
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Petani
        </h1>
        <ol class="breadcrumb">
          <li><a href="index"><i class="fa fa-dashboard"></i> Beranda</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="container">
          <br>
          <?php

          ?>
          <!--membuat sebuah form-->
          <?php
          foreach ($cekktp as $hasil) :
            $hasilktp = $hasil['KTP'];
          endforeach;
          if ($hasilktp == 0) {
          ?>
            <?php if ($this->session->flashdata('petanilengkapidata')) : ?>
              <div class="alert alert-info alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sukses </strong> <?php echo $this->session->flashdata('petanilengkapidata'); ?> !
              </div>

            <?php endif; ?>
            <form method="post" action="<?php echo base_url('Upetani/lengkapidata') ?>">
              <?php
              foreach ($lengkap as $hasil) :
                $username = $hasil['USERNAME'];
                $id_user = $hasil['ID_USER'];
              endforeach; ?>
              <input type="hidden" name="iduser" value="<?php echo $id_user; ?>">
              <div class="form-group">
                <label>KTP</label>

                <input type="text" class="form-control" name="KTP" placeholder="Masukkan KTP" maxlength="20" required onkeypress="return hanyaAngka(event)">
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('KTP') ?>
                  </h5>
                </div>
              </div>

              <div class="form-group">
                <label>Username</label>

                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required readonly>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('username') ?>
                  </h5>
                </div>
              </div>
              <div class="form-group">
                <label>Nama Petani</label>

                <input type="text" class="form-control" name="namapetani" placeholder="Masukkan Nama Petani" maxlength="30" required onkeypress="return hanyaTulisan(event)">
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('namapetani') ?>
                  </h5>
                </div>
              </div>
              <div class="form-group">
                <label title="Alamat Tinggal Yang Dekat Dengan Sawah Anda">Alamat Petani</label>

                <input type="text" class="form-control" name="alamatpetani" placeholder="Masukkan Alamat Tinggal Saat Ini" maxlength="100" required>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('alamatpetani') ?>
                  </h5>
                </div>

              </div>

              <div class="form-group">
                <label>No HP Petani</label>

                <input type="text" class="form-control" name="nohp" placeholder="Masukkan No hp" maxlength="15" required>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('nohp') ?>
                  </h5>
                </div>
              </div>

              <div class="form-group">
                <label>Komoditas</label>

                <?php

                // ----------------------------------------
                echo "<select name='idkomoditas' class='form-control' onchange='changeValue(this.value)' required>";
                echo "<option value='' selected>=== Pilih Komoditas ===</option>";
                foreach ($komoditas as $row2) :
                  echo "<option value=" . $row2['ID_KOMODITAS'] . ">" . $row2['NAMA_KOMODITAS'] . "</option>";
                endforeach;
                echo "</select>";
                ?>
                <h6>*Hubungi admin jika komoditas tidak tersedia</h6>
              </div>
              <div class="form-group">
                <label>Luas Sawah (ha)</label>

                <input type="text" class="form-control" name="luassawah" placeholder="Masukkan Luas Sawah" required>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('luassawah') ?>
                  </h5>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat Sawah</label>

                <input type="text" class="form-control" name="alamatsawah" placeholder="Masukkan Alamat Sawah" maxlength="100" required>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('alamatsawah') ?>
                  </h5>
                </div>
              </div>
              <div class="form-group">
                <label>Desa/Kelurahan</label>

                <?php

                echo "<select name='iddesa' class='form-control' onchange='changeValue(this.value)' required>";
                echo "<option value='' selected>=== Pilih Desa ===</option>";
                foreach ($desa as $row2) :
                  echo "<option value=" . $row2['ID_DESA'] . ">" . $row2['NAMA_DESA'] . "</option>";
                endforeach;
                echo "</select>";
                ?>
                <h6>*Hubungi admin jika Desa/Kel. tidak tersedia</h6>
              </div>

              <div class="form-group">
                <label>Tanggal Tanam</label>

                <input type="text" class="form-control" id="tgl" name="tgltanam" placeholder="Masukkan tanggal tanam" required>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('tgltanam') ?>
                  </h5>
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal Panen</label>

                <input type="text" class="form-control" id="tgl2" name="tglpanen" placeholder="Masukkan tanggal panen" required>
                <div class="invalid-feedback">
                  <h5 class="text-danger text-form">
                    <?php echo form_error('tglpanen') ?>
                  </h5>
                </div>
              </div>
              <div class="form-group">
                <label>Status</label>

                <?php

                echo "<select name='idstatus' class='form-control' onchange='changeValue(this.value)' required>";
                echo "<option value='' selected>=== Pilih Status Panen ===</option>";
                foreach ($status as $row2) :
                  echo "<option value=" . $row2['ID_STATUS'] . ">" . $row2['STATUS'] . "</option>";
                endforeach;
                echo "</select>";
                ?>
              </div>
              <input type="submit" name="simpan" class="btn btn-success" value="Simpan">
              <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
            </form>
            <?php
          } else {
            foreach ($cek as $a) :
              $hasilcekpanen = $a['ID_STATUS'];
            endforeach;
            if ($hasilcekpanen != 1) {
              //jika belum
            ?>
              <?php if ($this->session->flashdata('petaniupdate')) : ?>
                <div class="alert alert-info alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sukses </strong> <?php echo $this->session->flashdata('petaniupdate'); ?> !
                </div>

              <?php endif; ?>
              <form method="post" action="<?php echo base_url('Upetani/update') ?>" enctype="multipart/form-data" sdfsdf>
                <?php
                foreach ($cek as $datas) : ?>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="KTP" value="<?php echo $datas['KTP'] ?>" required onkeypress="return hanyaAngka(event)" readonly>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="username" value="<?php echo $datas['username'] ?>" required onkeypress="return hanyaAngka(event)" readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('username') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="namapetani" value="<?php echo $datas['NAMA_PETANI'] ?>" required onkeypress="return hanyaTulisan(event)" readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('namapetani') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="alamatpetani" value="<?php echo $datas['ALAMAT_PETANI'] ?>" required readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('alamatpetani') ?>
                      </h5>
                    </div>
                  </div>

                  <div class="form-group">

                    <input type="hidden" class="form-control" name="nohp" value="<?php echo $datas['NO_HP'] ?>" required readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('nohp') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Komoditas</label>
                    <input type="hidden" class="form-control" name="idkomoditas" value="<?php echo $datas['ID_KOMODITAS'] ?>" required readonly>
                    <input type="text" class="form-control" value="<?php echo $datas['komoditas'] ?>" required readonly>
                    <h6>*Hubungi admin jika komoditas tidak tersedia</h6>
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="luassawah" value="<?php echo $datas['LUAS_SAWAH'] ?>" required onkeypress="return hanyaAngka(event)">
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('luassawah') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="alamatsawah" value="<?php echo $datas['ALAMAT_SAWAH'] ?>" required readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('alamatsawah') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">

                    <input type="hidden" class="form-control" name="iddesa" value="<?php echo $datas['ID_DESA'] ?>" required readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('iddesa') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Tanam</label>

                    <input type="text" class="form-control" id="tgl" name="tgltanam" value="<?php echo $datas['TANAM'] ?>" required readonly>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('tgltanam') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Panen</label>

                    <input type="text" class="form-control" id="tgl2" name="tglpanen" value="<?php echo $datas['PANEN'] ?>" required>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('tglpanen') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <input type="hidden" class="form-control" name="idstatus" value="<?php echo $datas['ID_STATUS'] ?>" required>
                    <input type="text" class="form-control" value="<?php echo $datas['STATUS'] ?>" required readonly>
                  </div>

                  <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                  <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
                <?php endforeach; ?>
              </form>
            <?php } else {
              //jika sudah panen
            ?>
              <?php if ($this->session->flashdata('petaniupdate')) : ?>
                <div class="alert alert-info alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sukses </strong> <?php echo $this->session->flashdata('petaniupdate'); ?> !
                </div>

              <?php endif; ?>
              <form method="post" action="<?php echo base_url('Upetani/update') ?>" enctype="multipart/form-data">
                <?php
                foreach ($cek as $data) : ?>

                  <div class="form-group">
                    <input type="text" class="form-control" name="KTP" value="<?php echo $data['KTP'] ?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label>No HP Petani</label>
                    <input type="text" class="form-control" name="nohp" value="<?php echo $data['NO_HP'] ?>" maxlength="15" required>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('nohp') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Komoditas</label>
                    <?php
                    echo "<select name='idkomoditas' class='form-control' onchange='changeValue(this.value)' required>";
                    echo "<option value='' selected>=== Pilih Komoditas ===</option>";
                    foreach ($komoditas as $row2) :
                      echo "<option value=" . $row2['ID_KOMODITAS'] . ">" . $row2['NAMA_KOMODITAS'] . "</option>";
                    endforeach;
                    echo "</select>";
                    ?>
                    <h6>*Hubungi admin jika komoditas tidak tersedia</h6>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Tanam</label>
                    <input type="text" class="form-control" id="tgl" name="tgltanam" value="<?php echo $data['TANAM'] ?>" required>

                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('tgltanam') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Panen</label>
                    <input type="text" class="form-control" id="tgl2" name="tglpanen" value="<?php echo $data['PANEN'] ?>" required>
                    <div class="invalid-feedback">
                      <h5 class="text-danger text-form">
                        <?php echo form_error('tglpanen') ?>
                      </h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="idstatus" value="2" required>
                  </div>


                  <input type="submit" name="ubah" class="btn btn-success" value="Simpan">
                  <input type="reset" name="reset" class="btn btn-danger" value="Hapus">
                <?php endforeach; ?>
              </form>
          <?php
            }
          } ?>
        </div>
      </section>
      <br><br>
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