<?php
$getUser = $this->session->userdata('session_username_perusahaan');
$getId = $this->session->userdata('session_id_perusahaan');
$getLogo = $this->session->userdata('session_logo_perusahaan');
if ($getUser == '' or $getId == '') {
  redirect('login');
}
?>
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url('img/perusahaan/user/') . $getLogo; ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p></p>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">NAVIGASI</li>
    <li class="treeview">
      <a href="<?= base_url('Pperusahaan') ?>">
        <i class="fa fa-dashboard"></i> <span>Beranda</span>
      </a>
    </li>
    <li class="treeview">
      <a href="<?= base_url('Priwayat'); ?>">
        <i class="fa fa-send"></i> <span>Riwayat Pemesanan</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="<?= base_url('Plappesan'); ?>">
        <i class="fa fa-book"></i> <span>Laporan Pemesanan</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>

    <?php if ($getId != "") {
    ?>
      <li class="treeview">
        <a href="../frontend/cariHasil">
          <button class="btn btn-success btn-md"><span>Pesan Disini</span></button>
          <span class="pull-right-container">
          </span>
        </a>
      </li> <?php } ?>
  </ul>

</section>