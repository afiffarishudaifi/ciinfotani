<?php
$getUser = $this->session->userdata('session_username_perusahaan');
$getId = $this->session->userdata('session_id_perusahaan');
$getLogo = $this->session->userdata('session_logo_perusahaan');
if ($getUser == ' ' or $getId == ' ') {
  redirect('login');
}
?>
<header class="main-header">
  <!-- Logo -->
  <a href="../frontend/index" class="logo">
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
            <img src="<?php echo base_url('img/perusahaan/user/') . $getLogo; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $getUser ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- Menu Footer-->
            <li class="user-header">
              <img src="<?php echo base_url('img/perusahaan/user/') . $getLogo; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $getUser ?>
                <small>Akun Info Tani</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url('Ppengaturan/edit/' . $getId); ?>" class="btn btn-default btn-flat"><span class="fa fa-gears"></span>Pengaturan</a>
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