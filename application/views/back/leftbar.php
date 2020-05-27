<!-- Kolom Sebelah Kiri -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"><img src="<?php echo base_url()?>assets/images/admin.png" class="img-circle" alt="User Image"/></div>
      <div class="pull-left info">
        <p style="font-size:10px"><?php echo $this->session->userdata('nama'); ?></p>
        <p style="font-size:11px">( <?php echo $this->session->userdata('usertype'); ?> )</p>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">MENU UTAMA</li>
      <li class="treeview">
        <a href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>

      <?php if ($this->ion_auth->is_auditor() || $this->ion_auth->is_superadmin()): ?>
      <li class='treeview'>
        <a href='#'><i class='fa fa-list-alt'></i><span> SPT </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/spt/pkpt_list') ?>'><i class='fa fa-circle-o'></i> Input SPT <span class="pull-right-container"><span class="label label-primary pull-right" id="totalpkpt"></span></span></a></li>
          <li><a href='<?php echo base_url('admin/spt') ?>'><i class='fa fa-circle-o'></i> Data SPT <span class="pull-right-container"><span class="label label-primary pull-right" id="totalsptcreated"></span></span></a></li>
          <li><a href='<?php echo base_url('admin/sptauditor') ?>'><i class='fa fa-circle-o'></i> Data Tim Auditor <span class="pull-right-container"><span class="label label-primary pull-right" id="totaltimbyirban"></span></span></a></li>
        </ul>
      </li>

      <li class='treeview'>
        <a href='#'><i class='fa fa-tasks'></i><span> PKP </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/pkp') ?>'><i class='fa fa-circle-o'></i> Input PKP <span class="pull-right-container"><span class="label label-primary pull-right" id="totalpkpketuatim"></span></span></a></li>
        </ul>
      </li>

      <li class='treeview'>
        <a href='#'><i class='fa fa-tasks'></i><span> KKP </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/kkp') ?>'><i class='fa fa-circle-o'></i> Input KKP <span class="pull-right-container"><span class="label label-primary pull-right" id="totalkkpnip"></span></span></a></li>
          <li><a href='<?php echo base_url('admin/kkp/kkp_list_reviu') ?>'><i class='fa fa-circle-o'></i> Reviu KKP Ketua Tim<span class="pull-right-container"><span class="label label-primary pull-right" id="totalkkplistreviu"></span></span></a></li>
          <li><a href='<?php echo base_url('admin/kkp/kkp_list_reviu_dalnis') ?>'><i class='fa fa-circle-o'></i> Reviu KKP Dalnis<span class="pull-right-container"><span class="label label-primary pull-right" id="totalkkplistreviudalnis"></span></span></a></li>
        </ul>
      </li>

      <li class='treeview'>
        <a href='#'><i class='fa fa-tasks'></i><span> P2HP </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/sptlist') ?>'><i class='fa fa-circle-o'></i> Input LHP </a></li>
          <li><a href='<?php echo base_url('admin/lhp') ?>'><i class='fa fa-circle-o'></i> Upload Lampiran LHP </a></li>
          <li><a href='<?php echo base_url('admin/lhp_temuan') ?>'><i class='fa fa-circle-o'></i> Input Temuan </a></li>
        </ul>
      </li>
      <?php endif ?>

      <?php if ($this->ion_auth->is_ketuatim() || $this->ion_auth->is_superadmin()): ?>
      <li class='treeview'>
        <a href='#'><i class='fa fa-check-square-o'></i><span> VERIFIKASI TEMUAN </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/Vt_temuan') ?>'><i class='fa fa-circle-o'></i> Data LHP & Verifikasi </a></li>
        </ul>
      </li>
      <?php endif ?>

      <?php if ($this->ion_auth->is_evaluasi() || $this->ion_auth->is_superadmin()): ?>
      <li class='treeview'>
        <a href='#'><i class='fa fa-check-square-o'></i><span> TINDAK LANJUT LHP </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('admin/Tl_temuan') ?>'><i class='fa fa-circle-o'></i> Input Tindak Lanjut </a></li>
        </ul>
      </li>
      <?php endif ?>

      <?php if ($this->ion_auth->is_auditor() || $this->ion_auth->is_superadmin()): ?>
      <li class='treeview'>
        <a href='#'><i class='fa fa-file-text-o'></i><span> LAPORAN </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('laporan/lihatpkpt') ?>'><i class='fa fa-circle-o'></i> Lap. PKPT </a></li>
          <li><a href='<?php echo base_url('laporan/laporanpkp') ?>'><i class='fa fa-circle-o'></i> Lap. PKP </a></li>
          <li><a href='<?php echo base_url('laporan/lihatkkp') ?>'><i class='fa fa-circle-o'></i> Lap. KKP </a></li>
          <li><a href='<?php echo base_url('laporan/lihatlhp/laporanlhp') ?>'><i class='fa fa-circle-o'></i> Lap. LHP </a></li>
          <li><a href='<?php echo base_url('laporan/lihattemuan/temuan_sopd') ?>'><i class='fa fa-circle-o'></i> Lap. Temuan SOPD</a></li>
          <li><a href='<?php echo base_url('laporan/lihattemuan/temuan_tahun_dan_irban') ?>'><i class='fa fa-circle-o'></i> Lap. Temuan Tahun & Irban</a></li>
          <li><a href='<?php echo base_url('laporan/lihatauditor') ?>'><i class='fa fa-circle-o'></i> Lap. Kerja Auditor </a></li>
          <li></li>
        </ul>
      </li>
      <?php endif ?>

      <?php if ($this->ion_auth->is_visitor()): ?>
      <li class='treeview'>
        <a href='#'><i class='fa fa-file-text-o'></i><span> LAPORAN </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li><a href='<?php echo base_url('laporan/lihatpkpt') ?>'><i class='fa fa-circle-o'></i> Lap. PKPT </a></li>
          <li><a href='<?php echo base_url('laporan/laporanpkp') ?>'><i class='fa fa-circle-o'></i> Lap. PKP </a></li>
          <li><a href='<?php echo base_url('laporan/lihatkkp') ?>'><i class='fa fa-circle-o'></i> Lap. KKP </a></li>
          <li><a href='<?php echo base_url('laporan/lihatlhp/laporanlhp') ?>'><i class='fa fa-circle-o'></i> Lap. LHP </a></li>
          <li><a href='<?php echo base_url('laporan/lihattemuan/temuan_sopd') ?>'><i class='fa fa-circle-o'></i> Lap. Temuan SOPD</a></li>
          <li><a href='<?php echo base_url('laporan/lihattemuan/temuan_tahun_dan_irban') ?>'><i class='fa fa-circle-o'></i> Lap. Temuan Tahun & Irban</a></li>
          <li><a href='<?php echo base_url('laporan/lihatauditor') ?>'><i class='fa fa-circle-o'></i> Lap. Kerja Auditor </a></li>
          <li></li>
        </ul>
      </li>
      <?php endif ?>


      <?php if ($this->ion_auth->is_superadmin()): ?>
        <li class="header">MENU SUPERADMIN</li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-calendar'></i><span> PKPT </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/pkpt_calendar') ?>'><i class='fa fa-circle-o'></i> Kalender PKPT </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-university'></i><span> DATA IRBAN </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/irban/create') ?>'><i class='fa fa-circle-o'></i> Tambah Irban </a></li>
            <li><a href='<?php echo base_url('admin/irban') ?>'><i class='fa fa-circle-o'></i> Data Irban </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-building-o'></i><span> DATA SKPD </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/skpd/create') ?>'><i class='fa fa-circle-o'></i> Tambah SKPD </a></li>
            <li><a href='<?php echo base_url('admin/skpd') ?>'><i class='fa fa-circle-o'></i> Data SKPD </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa  fa-user-secret'></i><span> DATA AUDITOR </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url('admin/auditor/create') ?>'><i class='fa fa-circle-o'></i> Tambah Auditor </a></li>
            <li><a href='<?php echo base_url('admin/auditor') ?>'><i class='fa fa-circle-o'></i> Data Auditor </a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-user'></i><span> USERS </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url() ?>admin/auth/create_user'><i class='fa fa-circle-o'></i> Tambah User</a></li>
            <li><a href='<?php echo base_url() ?>admin/auth/user'><i class='fa fa-circle-o'></i> Data User</a></li>
          </ul>
        </li>
        <li class='treeview'>
          <a href='#'><i class='fa fa-users'></i><span> GROUP USER </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li><a href='<?php echo base_url() ?>admin/auth/create_group'><i class='fa fa-circle-o'></i> Tambah Group</a></li>
            <li><a href='<?php echo base_url() ?>admin/auth/users_group'><i class='fa fa-circle-o'></i> Data Group</a></li>
          </ul>
        </li>
      <?php endif ?>

      <li class="header">SETTING</li>

      <li> <a href='<?php echo base_url() ?>admin/auth/logout'> <i class="fa fa-sign-out"></i> <span>LOGOUT</span> </a> </li>
    </ul>

  </section>
</aside>

<!--notifikasi leftbar-->
<script>
$(document).ready(function() {
  $.post('<?php echo base_url();?>admin/spt/totalpkptsedia',
    function(data){
      $("#totalpkpt").text(data+" PKPT");
    }
  );
  $.post('<?php echo base_url();?>admin/spt/totalsptcreated',
    function(data){
      $("#totalsptcreated").text(data+" SPT");
    }
  );
  $.post('<?php echo base_url();?>admin/spt/total_by_irban_ketuatim',
    function(data){
      $("#totalpkpketuatim").text(data+" PKP");
    }
  );
  $.post('<?php echo base_url();?>admin/sptauditor/total_tim_by_irban',
    function(data){
      $("#totaltimbyirban").text(data+" Tim");
    }
  );
  $.post('<?php echo base_url();?>admin/pkp/total_kkp_by_nip',
    function(data){
      $("#totalkkpnip").text(data+" KKP");
    }
  );
  $.post('<?php echo base_url();?>admin/kkp/total_kkp_list_reviu',
    function(data){
      $("#totalkkplistreviu").text(data+" Reviu");
    }
  );
  $.post('<?php echo base_url();?>admin/kkp/total_kkp_list_reviu_dalnis',
    function(data){
      $("#totalkkplistreviudalnis").text(data+" Reviu");
    }
  );
});
</script>
