<!-- Kolom Sebelah Kiri -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"><img src="<?php echo base_url()?>assets/images/admin.png" class="img-circle" alt="User Image"/></div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama'); ?></p>
        <p>( <?php echo $this->session->userdata('usertype'); ?> )</p>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MENU UTAMA</li>
      <li class="treeview">
        <a href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class='treeview'>
        <a href='#'><i class='fa fa-university'></i><span> SPT </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/spt/create') ?>'><i class='fa fa-circle-o'></i> Input SPT </a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Data SPT </a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Update Auditor SPT </a></li>
        </ul>
      </li>

      <li class='treeview'>
        <a href='#'><i class='fa fa-university'></i><span> LHP </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/spt/create') ?>'><i class='fa fa-circle-o'></i> Input SPT </a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Data SPT </a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Update Auditor SPT </a></li>
        </ul>
      </li>

      <li class='treeview'>
        <a href='#'><i class='fa fa-university'></i><span> Tindak Lanjut LHP </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/spt/create') ?>'><i class='fa fa-circle-o'></i> Input SPT </a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Data SPT </a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Update Auditor SPT </a></li>
        </ul>
      </li>

      <?php if ($this->ion_auth->is_superadmin()): ?>
        <li class="header">MENU SUPERADMIN</li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-university'></i><span> Data SKPD (PKPT) </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/skpd/create') ?>'><i class='fa fa-circle-o'></i> Tambah SKPD </a></li>
            <li><a href='<?php echo base_url('admin/skpd') ?>'><i class='fa fa-circle-o'></i> Data SKPD </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-university'></i><span> Data Irban </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/irban/create') ?>'><i class='fa fa-circle-o'></i> Tambah Irban </a></li>
            <li><a href='<?php echo base_url('admin/irban') ?>'><i class='fa fa-circle-o'></i> Data Irban </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-male'></i><span> Data Auditor </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/auditor/create') ?>'><i class='fa fa-circle-o'></i> Tambah Auditor </a></li>
            <li><a href='<?php echo base_url('admin/auditor') ?>'><i class='fa fa-circle-o'></i> Data Auditor </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-user'></i><span> User </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url() ?>admin/auth/create_user'><i class='fa fa-circle-o'></i> Tambah User</a></li>
            <li><a href='<?php echo base_url() ?>admin/auth/user'><i class='fa fa-circle-o'></i> Data User</a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-users'></i><span> Group </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url() ?>admin/auth/create_group'><i class='fa fa-circle-o'></i> Tambah Group</a></li>
            <li><a href='<?php echo base_url() ?>admin/auth/users_group'><i class='fa fa-circle-o'></i> Data Group</a></li>
          </ul>
        </li>
      <?php endif ?>

      <li class="header">SETTING</li>

      <li> <a href='<?php echo base_url() ?>admin/auth/logout'> <i class="fa fa-sign-out"></i> <span>Logout</span> </a> </li>
    </ul>

  </section>
</aside>
