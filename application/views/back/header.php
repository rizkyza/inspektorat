<header class="main-header">
  <a href="<?php echo base_url('admin/dashboard') ?>" class="logo">
    <span class="logo-mini"><b>EA</b></span>
    <span class="logo-lg"><b>E-AUDITOR</b></span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="logo-lg"><b>INSPEKTORAT PROVINSI KALIMANTAN SELATAN</b></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url()?>assets/images/admin.png" width="160px" height="160px" class="user-image" alt="User Image"/>
            <span class="hidden-xs">
              Halo, <?php echo $this->session->userdata('nama') ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="<?php echo base_url()?>assets/images/admin.png" class="img-circle" alt="User Image" />
              <p>
              <?php echo $this->session->userdata('identity') ?>
              </p>
            </li>
            <li class="user-body">
              <div class="col-xs-6 text-center">
                <a href='<?php $user_id = $this->session->userdata('user_id'); echo base_url('admin/auth/edit_user/'.$user_id.'') ?>' class='btn btn-default btn-flat'>Ubah Password</a>
              </div>
              <div class="col-xs-6 text-center">
                <a href='<?php echo base_url() ?>admin/auth/logout' class='btn btn-default btn-flat'>Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
