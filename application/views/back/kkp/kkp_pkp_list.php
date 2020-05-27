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
        <label for="kode">Table PKP (Input KKP)</label>
      </div>
      <div class="box-body table-responsive padding">

        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">SOPD</th>
              <th style="text-align: center">Waktu Pemeriksaan</th>
              <th style="text-align: center">No KKP</th>
              <th style="text-align: center">Tahun</th>
              <th style="text-align: center">Kegiatan</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($kkp_data as $pkp):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $pkp->skpd ?></td>
              <td style="text-align:left"><?php echo $pkp->hari ?></td>
              <td style="text-align:left"><?php echo $pkp->no_kkp ?></td>
              <td style="text-align:left"><?php echo $pkp->tahun ?></td>
              <td style="text-align:left"><?php echo $pkp->kegiatan ?></td>
              <td style="text-align:center">
                <?php echo anchor(site_url('admin/kkp/create/'.$pkp->id_pkp),'<i class="glyphicon glyphicon-pencil"></i>','title="Isi PKP", class="btn btn-sm btn-primary"'); echo ' '; ?>
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
