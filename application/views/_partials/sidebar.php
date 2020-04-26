<?php
$getUser = $this->session->userdata('session_user');
$getAkses = $this->session->userdata('session_akses');
$getId = $this->session->userdata('session_id');
$getGambar = $this->session->userdata('session_gambar');
if ($getUser == '' or $getAkses == '' or $getId == '') {
  redirect('login');
}
?>
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url('img/user/') . $getGambar; ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p></p>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <?php if ($getAkses == 1) { ?>
    <ul class="sidebar-menu">
      <li class="header">NAVIGASI</li>
      <li class="treeview">
        <a href="<?= base_url('Admin') ?>">
          <i class="fa fa-dashboard"></i> <span>Beranda</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Alevel') ?>">
          <i class="fa fa-eye"></i> <span>Data Level</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-map"></i> <span>Data Master Lokasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('Adesa'); ?>"><i class="fa fa-map-marker"></i>Data Desa</a></li>
          <li><a href="<?= base_url('Akecamatan'); ?>"><i class="fa fa-map-o"></i> Data Kecamatan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Akomoditas'); ?>">
          <i class="fa fa-tree"></i> <span>Data Komoditas</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Apetani'); ?>">
          <i class="fa fa-users"></i> <span>Data Petani</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url() ?>Aperusahaan">
          <i class="fa fa-user-secret"></i> <span>Data Perusahaan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Auser'); ?>">
          <i class="fa fa-user"></i> <span>Data User</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url() ?>Alappanen"><i class="fa fa-leaf"></i>Data Panen</a></li>
          <li><a href="<?= base_url() ?>Alappesan"><i class="fa fa-send"></i>Data Pemesanan</a></li>
          <!--<li><a href="viewlappanenpadi"><i class="fa fa-map-o"></i> Data Panen Padi</a></li>-->
        </ul>
      </li>
      <!--<li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
    </ul>
  <?php } else { ?>
    <ul class="sidebar-menu">
      <li class="header">NAVIGASI</li>
      <li class="treeview">
        <a href="<?= base_url('User'); ?>">
          <i class="fa fa-dashboard"></i> <span>Beranda</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Upetani'); ?>">
          <i class="fa fa-users"></i> <span>Data Petani</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Upanen'); ?>">
          <i class="fa fa-users"></i> <span>Form Panen</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?= base_url('Uriwayat'); ?>">
          <i class="fa fa-bookmark"></i> <span>Data Riwayat Pemesanan </span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('Ulappanen'); ?>"><i class="fa fa-leaf"></i>Data Panen</a></li>
          <li><a href="<?= base_url('Ulappesan'); ?>"><i class="fa fa-send"></i>Data Pemesanan</a></li>
          <!--<li><a href="viewlappanenpadi"><i class="fa fa-map-o"></i> Data Panen Padi</a></li>-->
        </ul>
      </li>
    </ul>
  <?php } ?>

</section>