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
    <div class="box box-primary">
      <div class="box-body table-responsive padding">
        <form name="tahunlhp" class="form-horizontal">
                     <!-- Tahun -->
                    <div class="col-md-12">
                     <div class="form-group"><label>Lihat Berdasarkan Tahun <a class="text-warning">*</a></label>
                       <select class="form-control" name="tahun" id="tahun">
                         <option value="">Pilih Tahun</option>
                         <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >=2008; $x--) { ?>
                         <option value="<?php echo base_url()?>/laporan/lihatlhp/tahunlhp/<?php echo $x ?>"><?php echo $x ?></option>
                           <?php } ?>
                       </select>
                       <div class="modal-footer">
                            <button type="button" id="add_button" class="btn btn-info"><i class="fa fa-print"></i> Lihat</button>
                       </div>
                     </div>
                  </div>
         </form>
        <hr/>
      </div>
    </div>

  <?php echo form_open_multipart($action);?>
  <div class="box box-primary">
    <div class="box-body table-responsive padding">
        <form name="tahunirbanlhp" class="form-horizontal">
                   <!-- Tahun -->
                  <div class="col-md-12">
                   <div class="form-group"><label>Cetak Berdasarkan Tahun Dan Irban<a class="text-warning">*</a></label>
                     <select class="form-control" name="lhptahunirban" id="lhptahunirban">
                       <option value="">Pilih Tahun</option>
                       <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >=2008; $x--) { ?>
                       <option value=""><?php echo $x ?></option>
                         <?php } ?>
                     </select>
                   </div>
                   <div class="form-group"><label>Irbanwil</label>
                   	<?php echo form_dropdown('',$get_combo_irban,'',$nama_irban); ?>
                   </div>
                   <div class="modal-footer">
                            <button type="button" id="add_button2" class="btn btn-info"><i class="fa fa-print"></i> Lihat</button>
                   </div>
                </div>
       </form>
      <hr/>
    </div>
  </div>
  <?php echo form_close(); ?>

  <?php echo form_open_multipart($action);?>
  <div class="box box-primary">
    <div class="box-body table-responsive padding">
        <form name="tahunirbanskpd" class="form-horizontal">
                   <!-- Tahun -->
                  <div class="col-md-12">
                   <div class="form-group"><label>Cetak Berdasarkan Tahun Dan Skpd<a class="text-warning">*</a></label>
                     <select class="form-control" name="lhptahunskpd" id="lhptahunskpd">
                       <option value="">Pilih Tahun</option>
                       <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >=2008; $x--) { ?>
                       <option value=""><?php echo $x ?></option>
                         <?php } ?>
                     </select>
                   </div>
                   <div class="form-group"><label>Skpd</label>
                   	<?php echo form_dropdown('',$get_combo_skpd,'',$nama_skpd); ?>
                   </div>
                   <div class="modal-footer">
                            <button type="button" id="add_button3" class="btn btn-info"><i class="fa fa-print"></i> Lihat</button>
                   </div>
                </div>
       </form>
      <hr/>
    </div>
  </div>
  <?php echo form_close(); ?>

      <hr/>
    </div>
  </div>


      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#add_button').click(function(){
      var tahun = $("#tahun :selected").text();
      window.location.href = "<?php echo base_url(); ?>laporan/lihatlhp/report_data_tahun_lhp/"+tahun;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#add_button2').click(function(){
      var tahun = $("#lhptahunirban :selected").text();
      var nama_irban = $("#nama_irban").val();
      window.location.href = "<?php echo base_url(); ?>laporan/lihatlhp/report_data_tahun_and_irban_lhp/"+tahun+"/"+nama_irban;
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#add_button3').click(function(){
      var tahun = $("#lhptahunskpd :selected").text();
      var nama_skpd = $("#nama_skpd").val();
      window.location.href = "<?php echo base_url(); ?>laporan/lihatlhp/report_data_tahun_and_skpd_lhp/"+tahun+"/"+nama_skpd;
    });
  });
</script>

<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.min.js"charset="UTF-8"></script>


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
