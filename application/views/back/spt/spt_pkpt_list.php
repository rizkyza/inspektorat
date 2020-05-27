<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><?php echo $module ?></li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>

    <div class="alert alert-info alert-dismissible fade in hidden" id="alertinfo">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>'<a id="infoalerta"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></a>'</div>

  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <label for="kode">Tabel Data PKPT (Belum dibuat SPT)</label>
      </div>
      <div class="panel-body">
      <div class="box-body table-responsive padding">

        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" width="5%">No.</th>
              <th style="text-align: center" width="40%">Objek Pemeriksa/SKPD</th>
              <th style="text-align: center" width="20%">Tanggal Pemeriksaan</th>
              <?php if ($this->ion_auth->is_superadmin()): ?>
              <th style="text-align: center" width="20%">Irbanwil</th>
              <?php endif ?>
              <th style="text-align: center" width="15%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($pkpt_data_sedia as $pkpt):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $pkpt->skpd ?></td>
              <td style="text-align:left"><?php echo $pkpt->date_start ?> s/d <?php echo $pkpt->date_end ?></td>
              <?php if ($this->ion_auth->is_superadmin()): ?>
              <td style="text-align:left"><?php echo $pkpt->irbanwil ?></td>
              <?php endif ?>
              <td style="text-align:center">
              <?php echo anchor(site_url('admin/spt/create/'.$pkpt->id_pkpt),'<i class="glyphicon glyphicon-pencil"> Buat SPT</i>','title="add SPT", class="btn btn-sm btn-primary"'); echo ' '; ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <label for="kode">Tabel Data PKPT (Sudah dibuat SPT)</label>
    </div>
    <div class="panel-body">
    <div class="box-body table-responsive padding">

      <hr/>
      <table id="datatable2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th style="text-align: center" width="5%">No.</th>
            <th style="text-align: center" width="40%">Objek Pemeriksa/SKPD</th>
            <th style="text-align: center" width="20%">Tanggal Pemeriksaan</th>
            <?php if ($this->ion_auth->is_superadmin()): ?>
            <th style="text-align: center" width="20%">Irbanwil</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php $start = 0; foreach ($pkpt_data_created as $pkptc):?>
          <tr>
            <td style="text-align:center"><?php echo ++$start ?></td>
            <td style="text-align:left"><?php echo $pkptc->skpd ?></td>
            <td style="text-align:left"><?php echo $pkptc->date_start ?> s/d <?php echo $pkptc->date_end ?></td>
            <?php if ($this->ion_auth->is_superadmin()): ?>
            <td style="text-align:left"><?php echo $pkptc->irbanwil ?></td>
            <?php endif ?>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  </section>
</div>


<script type="text/javascript">
var alertinfo = $('#infoalerta').html();

if (alertinfo == '')
{
} else if (alertinfo == 'Data berhasil dibuat'){
  swal(
    'Info',
    alertinfo,
    'success'
  )
} else if (alertinfo == 'Edit Data Berhasil'){
  swal(
    'Info',
    alertinfo,
    'success'
  )
} else{
  swal(
    'Alert',
    alertinfo,
    'error'
  )
}
</script>

<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
function confirmDialog() {
 return confirm('Apakah anda yakin?')
}
  $('#datatable').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "aaSorting": [[0,'desc']],
    "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
  });
  $('#datatable2').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "aaSorting": [[0,'desc']],
    "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
  });
</script>

<?php $this->load->view('back/footer'); ?>
