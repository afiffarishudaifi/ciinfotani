<?php
$getUser = $this->session->userdata('session_user');
$getAkses = $this->session->userdata('session_akses');
$getId = $this->session->userdata('session_id');
$getGambar = $this->session->userdata('session_gambar');
if ($getUser == '' or $getAkses == '' or $getId == '') {
  redirect('login');
} /*else {
  if ($getAkses == 1) {
    redirect('Admin');
  } elseif ($getAkses == 2) {
    redirect('User');
  } 
}*/
?>
<header class="main-header">
  <!-- Logo -->
  <a href="<?= base_url('beranda')?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>I</b>T</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Info</b>Tani</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('img/user/') . $getGambar; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $getUser; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo base_url('img/user/') . $getGambar; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $getUser; ?>
                <small>Admin Info Tani</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url('Apengaturan/edit/' . $getId); ?>" class="btn btn-default btn-flat"><span class="fa fa-gears"></span>Pengaturan</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url('Login/logout') ?>" class="btn btn-default btn-flat"><span class="fa fa-power-off"></span>Keluar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>