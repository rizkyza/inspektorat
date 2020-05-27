<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <div class="box-body">
    <div class="callout callout-success "><i class='fa fa-bullhorn'></i> Selamat Datang <b><?php echo $this->session->userdata('nama') ?></b>
    </div>
  </div>



  <section class='content'>
    <div class="box-body">
      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-blue'>
          <div class='inner' hitung='<?php echo $total_spt ?>' style="font-size:45px;">0</div>
          <div class='inner'>Data Seluruh SPT</div>
          <div class='icon'><i class='fa fa-list-alt'></i></div>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-blue'>
          <div class='inner' hitung='<?php echo $total_lhp ?>' style="font-size:45px;">0</div>
          <div class='inner'>Data Seluruh LHP</div>
          <div class='icon'><i class='fa fa-tasks'></i></div>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-blue'>
          <div class='inner' hitung='<?php echo $total_temuan ?>' style="font-size:45px;">0</div>
          <div class='inner'>Data Seluruh Temuan</div>
          <div class='icon'><i class='fa fa-pencil-square'></i></div>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-blue'>
          <div class='inner' hitung='<?php echo $total_rekomendasi ?>' style="font-size:45px;">0</div>
          <div class='inner'>Data Seluruh Rekomendasi</div>
          <div class='icon'><i class='fa fa-indent'></i></div>
        </div>
      </div>

      <?php if ($this->ion_auth->is_superadmin()): ?>
      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-green'>
          <div class='inner' hitung='<?php echo $total_irban ?>' style="font-size:45px;">0</div>
          <div class='inner'>Data Seluruh Irbanwil</div>
          <div class='icon'><i class='fa fa-university'></i></div>
          <a href='<?php echo base_url('admin/irban') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-green'>
          <div class='inner' hitung='<?php echo $total_skpd ?>' style="font-size:45px;">0</div>
          <div class='inner'>Data Seluruh SKPD</div>
          <div class='icon'><i class='fa fa-building-o'></i></div>
          <a href='<?php echo base_url('admin/skpd') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-green'>
          <div class='inner' hitung='<?php echo $total_auditor ?>' style="font-size:45px;">0</div>
          <div class='inner'>Auditor</div>
          <div class='icon'><i class='fa  fa-user-secret'></i></div>
          <a href='<?php echo base_url('admin/auditor') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-green'>
          <div class='inner' hitung='<?php echo $total_user ?>' style="font-size:45px;">0</div>
          <div class='inner'>User</div>
          <div class='icon'><i class='fa fa-user'></i></div>
          <a href='<?php echo base_url('admin/auth/user') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>
      <?php endif ?>

    </div>



  </section>

</div>

<?php $this->load->view('back/footer'); ?>
