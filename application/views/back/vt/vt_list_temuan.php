<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class="content">

    <div class="panel panel-primary">
      <div class="panel-heading">
        <label for="kode">Tabel Data LHP</label>
      </div>
      <div class="panel-body">
      <div class="box-body table-responsive padding">




        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" >No.</th>
              <th style="text-align: center" >Irbanwil</th>
              <th style="text-align: center">Tahun</th>
              <th style="text-align: center">No LHP</th>
              <th style="text-align: center">Objek</th>
              <th style="text-align: center">Tanggal LHP</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($lhp_data as $lhp):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $lhp->nama_irban ?></td>
              <td style="text-align:left"><?php echo $lhp->tahun ?></td>
              <td style="text-align:left"><?php echo $lhp->no_lhp ?></td>
              <td style="text-align:left"><?php echo $lhp->skpd ?></td>
              <td style="text-align:left"><?php echo $lhp->tanggal_lhp ?></td>
              <td style="text-align:center">
              <?php echo anchor(site_url('admin/vt_temuan/update/'.$lhp->id_lhp),'<i class="glyphicon glyphicon-triangle-right"> Temuan</i>','title="Edit", class="btn btn-sm btn-primary"'); echo ' '; ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</div>

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
