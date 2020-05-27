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
                            <button target="_blank" type="button" id="add_button" class="btn btn-info"><i class="fa fa-print"></i> Lihat</button>
                       </div>
                     </div>
                  </div>
         </form>
        <hr/>
      </div>
    </div>


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
      window.location.href = "<?php echo base_url(); ?>laporan/lihatpkpt/laporan_pkpt/"+tahun;
    });
  });
</script>

<?php $this->load->view('back/footer'); ?>
