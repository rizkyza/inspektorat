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

    <div class="box box-primary">
      <div class="box-body table-responsive padding">

        <div class="container">
          <div class="row">
            <div class="box-body">
            <form method="get">
              <div class="form-group"><label>SOPD :</label>
                  <?php echo form_dropdown('',$get_combo_skpd,'',$skpd_seo); ?>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cari"  action="joinirban">
                <button type="button" id="simpana" class="btn btn-info"><i class="fa fa-print"></i> Lihat</button>
              </div><hr />
              <div class="form-group"><label>SOPD dipilih :</label>
                  <?php echo form_input($skpdt, $skpd); ?>
                  <?php echo form_input($skpds, $skpdseo); ?>
              </div>
            </form>
        </div>
<?php echo form_close(); ?>
        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" >No.</th>
              <th style="text-align: center" >Irbanwil</th>
              <th style="text-align: center" >SOPD</th>
              <th style="text-align: center">Tahun</th>
              <th style="text-align: center">No LHP</th>
              <th style="text-align: center">Tanggal LHP</th>
              <th style="text-align: center">Kode Temuan</th>
              <th style="text-align: center">Judul Temuan</th>
              <th style="text-align: center">Nilai Temuan</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($lhp_data as $lhp):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $lhp->nama_irban ?></td>
              <td style="text-align:left"><?php echo $lhp->skpd ?></td>
              <td style="text-align:left"><?php echo $lhp->tahun ?></td>
              <td style="text-align:left"><?php echo $lhp->no_lhp ?></td>
              <td style="text-align:left"><?php echo $lhp->tanggal_lhp ?></td>
              <td style="text-align:left"><?php echo $lhp->subsubkode ?></td>
              <td style="text-align:left"><?php echo $lhp->judul_temuan ?></td>
              <td style="text-align:left"><?php echo $lhp->nilai_temuan ?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
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
<script type="text/javascript">
  $(document).ready(function () {
    $('#simpana').click(function(){
      var skpd_seo = $("#skpds").val();
      window.location.href = "<?php echo base_url(); ?>laporan/lihattemuan/report_temuan_skpd?skpds="+skpd_seo;
    });
  });
</script>
<?php $this->load->view('back/footer'); ?>
