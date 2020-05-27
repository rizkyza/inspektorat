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
  <section class='content'>
    <div class='row'>
      <?php echo form_open_multipart($action);?>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div>
        <!-- kolom kiri -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group"><label>No LHP</label>
                <?php echo form_input($no_lhp, $lhp->no_lhp);?>
              </div>
              <div class="form-group"><label>Tahun</label>
                <?php echo form_input($tahun, $lhp->tahun);?>
              </div>
              <div class="form-group"><label>Tanggal LHP</label>
                <?php echo form_input($tanggal_lhp, $lhp->tanggal_lhp);?>
              </div>
              <div class="form-group"><label>SKPD</label>
                <?php echo form_input($skpd, $lhp->skpd);?>
              </div>
              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban, $lhp->nama_irban);?>
              </div><hr />
              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Entry Temuan LHP</b></div>
                <div class="panel-body">
                  <div class="box-body">

                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center" width="5%">No</th>
                                       <th style="text-align: center" width="15%">Kode Temuan</th>
                                       <th style="text-align: center" width="50%">Judul Temuan</th>
                                       <th style="text-align: center" width="15%">Nilai Temuan</th>
                                       <th style="text-align: center" width="5%">Rekomendasi</th>
                                   </tr>
                              </thead>
                         </table>
                    </div>

                  </div>
             </div>
              <?php echo form_input($id_lhp,$lhp->id_lhp);?>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>


<!-- Disable enter keypress form -->
<script type="text/javascript">
  window.addEventListener('keydown',function(e){
    if(e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter'||e.keyCode==13){
      if(e.target.nodeName == 'INPUT' && e.target.type == 'text'){
        e.preventDefault();
        return false;
      }
    }
  },
  true
);
</script>

<!-- validation modal -->
 <script type="text/javascript" language="javascript" >
      $(document).ready(function(){
       $("#user_data").dataTable().fnDestroy();
       var no_lhp = $('#no_lhp').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bFilter":false,
         "order":[],
         //"oLanguage": {
           //"sSearch": "No LHP:"
         //},
         //"oSearch": {
          // "sSearch": no_lhp
         //},
         "ajax":{
              url:"<?php echo base_url() . 'admin/tl_temuan/fetch_user'; ?>",
              data:{no_lhp:no_lhp},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[0, 1, 2, 4],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });
  </script>

<?php $this->load->view('back/footer'); ?>
