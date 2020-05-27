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
  </section>
  <section class="content">
    <div class="alert alert-info alert-dismissible fade in hidden" id="alertinfo">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>'<a id="infoalerta"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></a>'</div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <label for="kode">Table SPT Tim Auditor</label>
      </div>
      <div class="box-body table-responsive padding">


        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" width="5%">No.</th>
              <th style="text-align: center" width="5%">Tahun</th>
              <th style="text-align: center" width="15%">No SPT</th>
              <th style="text-align: center" width="25%">Objek</th>
              <th style="text-align: center" width="15%">Tanggal SPT</th>
              <th style="text-align: center" width="15%">Tanggal Tugas</th>
              <th style="text-align: center" width="20%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($spt_data as $spt):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $spt->tahun ?></td>
              <td style="text-align:left"><?php echo $spt->no_spt ?></td>
              <td style="text-align:left"><?php echo $spt->nama_skpd ?></td>
              <td style="text-align:left"><?php echo $spt->tanggal_spt ?></td>
              <td style="text-align:left"><?php echo $spt->tanggal_tugas ?></td>
              <td style="text-align:center">
              <?php echo anchor(site_url('admin/sptauditor/report_tim_auditor/'.$spt->id_spt),'<i class="fa fa-file-pdf-o"></i>','title="Report", class="btn btn-sm btn-primary"'); echo ' '; ?>
              <?php echo anchor(site_url('admin/sptauditor/update/'.$spt->id_spt),'<i class="glyphicon glyphicon-pencil"> Entry Auditor</i>','title="Auditor", class="btn btn-sm btn-primary"'); echo ' '; ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
var alertinfo = $('#infoalerta').html();

if (alertinfo == '')
{
}else{
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
</script>

<?php $this->load->view('back/footer'); ?>
