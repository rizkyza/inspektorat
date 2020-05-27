<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><?php echo $module ?></li>
      <li><?php echo $module2 ?></li>
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
                <?php echo form_input($no_lhp, $temuan->no_lhp);?>
              </div>
              <div class="form-group"><label>No Temuan</label>
                <?php echo form_input($no_temuan, $temuan->no_temuan);?>
              </div>
              <div class="form-group"><label>Kode Temuan</label>
                <?php echo form_input($kode_temuan, $temuan->kode_temuan);?>
              </div>
              <div class="form-group"><label>Judul Temuan</label>
                <?php echo form_input($judul_temuan, $temuan->judul_temuan);?>
              </div>

              <div class="form-group"><label>Nilai Temuan</label>
                <?php echo form_input($nilai_temuan, $temuan->nilai_temuan);?>
              </div><hr />

              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Entry Temuan LHP</b></div>
                <div class="panel-body">
                  <div class="box-body">

                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                      <th style="text-align: center" width="10%">Kode TL</th>
                                       <th style="text-align: center" width="40%">Kode Rek.</th>
                                       <th style="text-align: center" width="45%">Uraian Rekomendasi</th>
                                       <th style="text-align: center" width="5%">Aksi</th>
                                   </tr>
                              </thead>
                         </table>
                    </div>

                  </div>
             </div>
              <?php echo form_input($id_temuan,$temuan->id_temuan);?>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<div id="tlModal" class="modal fade ">
      <div class="modal-dialog modal-lg" >
           <form method="post" id="tl_form">
                <div class="modal-content">
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Detail Tindak Lanjut</h4>
                     </div>
                     <div class="modal-body">
                       <div class="form-group"><label>No Tindak Lanjut</label>
                         <input type="text" name="no_tindaklanjutdetail" id="no_tindaklanjutdetail" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Kode Tindak Lanjut</label>
                         <input type="text" name="kode_tindaklanjutdetail" id="kode_tindaklanjutdetail" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Uraian Tindak Lanjut</label>
                         <textarea type="text" name="uraian_tindaklanjutdetail" id="uraian_tindaklanjutdetail" class="form-control" readonly/></textarea>
                       </div>

                     </div>
                       <div class="modal-footer">
                            <input type="hidden" name="id_rekomendasidetail" id="id_rekomendasidetail" />
                            <input type="submit" name="actiondetail" id="actiondetail" class="btn btn-danger" value="Add" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>
                  </div>
             </form>
        </div>
   </div>


 <div id="userModal" class="modal fade ">
       <div class="modal-dialog modal-lg" >
            <form method="post" id="user_form">
                 <div class="modal-content">
                      <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Tambah Tindak Lanjut Rekomendasi Temuan LHP</h4>
                      </div>
                      <div class="modal-body">

                        <div class="form-group"><label>Kode Rekomendasi</label>
                          <input type="text" name="kode_rekomendasi" id="kode_rekomendasi" class="form-control" readonly/>
                        </div>
                        <div class="form-group"><label>Uraian Rekomendasi</label>
                          <textarea type="text" name="uraian_rekomendasi" id="uraian_rekomendasi" class="form-control" readonly/></textarea>
                        </div>
                        <hr />

                          <div class="box box-primary">
                            <div class="box-header with-border">
                              <label for="kode">Kode Tindak Lanjut</label>
                            </div>
                            <div class="box-body">
                              <div class="form-group">

                                <?php echo form_dropdown('', $get_combo_kodetl,'',$kodetl); ?>
                                <br />
                                <?php $subkodetl['#'] = 'Pilih Sub Kode Tindak Lanjut'; ?>
                                <?php echo form_dropdown('', $subkodetl, '#', $subkodetl); ?>
                                <br />
                                <input type="text" name="kode_tindaklanjut" id="kode_tindaklanjut" class="form-control" readonly/>
                              </div>
                            </div>
                          </div>

                          <div class="form-group"><label>No Tindak Lanjut</label>
                            <input type="text" name="no_tindaklanjut" id="no_tindaklanjut" class="form-control" readonly/>
                          </div>

                          <div class="form-group"><label>Uraian Tindak Lanjut</label>
                            <textarea type="text" name="uraian_tindaklanjut" id="uraian_tindaklanjut" class="form-control"/></textarea>
                          </div>

                      </div>
                      <div class="modal-footer">
                           <input type="hidden" name="id_rekomendasi" id="id_rekomendasi" />
                           <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                 </div>
            </form>
       </div>
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

<!-- CKeditor -->
<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('uraian_rekomendasi');
    CKEDITOR.replace('uraian_tindaklanjut');
    CKEDITOR.replace('uraian_tindaklanjutdetail');

    CKEDITOR.config.skin = 'office2013';
    CKEDITOR.config.extraPlugins = 'justify,find,pastefromword,print,selectall,showblocks,table,tableresize,tableselection';
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!-- end CKeditor -->


<!-- Kode Tindak Lanjut-->
<script type="text/javascript">// <![CDATA[
  $(document).ready(function(){

    $('#kodetl').change(function(){ //any select change on the dropdown with id country trigger this code
      $("#subkodetl > option").remove(); //first of all clear select items
      var kode = $('#kodetl').val(); // here we are taking country id of the selected one.

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/subkodetl/get_subkodetl/"+kode, //here we are calling our user controller and get_cities method with the country_id

        success: function(subkode) //we're calling the response json array 'cities'
        {

          $.each(subkode,function(id_subkode,subkode) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(id_subkode);
            //swal(id_subkode);
            opt.text(subkode);
            $('#subkodetl').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });
        }
      });
    });

    $('#subkodetl').change(function(){
      var subkode = $("#subkodetl :selected").text();
      $("#kode_tindaklanjut").val();
      $("#kode_tindaklanjut").val(subkode);
    });

  });
</script>

<script type="text/javascript" language="javascript" >
     $(document).ready(function(){

       $(document).on('click', '.view', function(){
            var id_rekomendasi = $(this).attr("id");

            $.ajax({
                 url:"<?php echo base_url(); ?>admin/tl_temuan_rekomendasi/fetch_single_user",
                 method:"POST",
                 data:{id_rekomendasi:id_rekomendasi},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#tlModal').modal('show');

                      $('#kode_tindaklanjutdetail').val(data.kode_tindaklanjut);
                      $('#no_tindaklanjutdetail').val(data.no_tindaklanjut);
                      CKEDITOR.instances['uraian_tindaklanjutdetail'].setData(data.uraian_tindaklanjut);

                      $('.modal-title').text("Detail Tindak Lanjut Rekomendasi Temuan LHP");
                      $('#id_rekomendasidetail').val(id_rekomendasi);
                      $('#actiondetail').val("Delete");
                 }
            })
       });

       $(document).on('submit', '#tl_form', function(event){
            event.preventDefault();
            var id_rekomendasi = $('#id_rekomendasidetail').val();
            var no_tindaklanjut = $('#no_tindaklanjutdetail').val();

            if (confirm("Yakin data Tindak Lanjut dihapus?"))
            {

                 $.ajax({
                      url:"<?php echo base_url() . 'admin/tl_temuan_rekomendasi/user_action'?>",
                      method:'POST',
                      data: new FormData(this),
                      contentType:false,
                      processData:false,
                      success:function(data)
                      {
                           //alert(data);
                           $('#tl_form')[0].reset();
                           $('#tlModal').modal('hide');
                           dataTable.ajax.reload();
                           CKEDITOR.instances['uraian_tindaklanjut'].setData('');
                           swal('Data Rekomendasi', 'berhasil dihapus', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error adding / update data');
                      }
                 });
            }
            else
            {
               return false;
            }

            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
       });

    });
</script>

 <script type="text/javascript" language="javascript" >
      $(document).ready(function(){

        $(document).on('click', '.update', function(){
             var id_rekomendasi = $(this).attr("id");
             $.ajax({
                  url:"<?php echo base_url(); ?>admin/tl_temuan_rekomendasi/fetch_single_user",
                  method:"POST",
                  data:{id_rekomendasi:id_rekomendasi},
                  dataType:"json",
                  success:function(data)
                  {
                       $('#userModal').modal('show');

                       $('#kode_tindaklanjut').val(data.kode_tindaklanjut);
                       $('#no_tindaklanjut').val(data.no_tindaklanjut);
                       CKEDITOR.instances['uraian_tindaklanjut'].setData(data.uraian_tindaklanjut);
                       $('#kode_rekomendasi').val(data.kode_rekomendasi);
                       $('#no_tindaklanjut').val('TL/'+data.no_temuan+data.id_rekomendasi);
                       CKEDITOR.instances['uraian_rekomendasi'].setData(data.uraian_rekomendasi);

                       $('.modal-title').text("Tambah Tindak Lanjut Rekomendasi Temuan LHP");
                       $('#id_rekomendasi').val(id_rekomendasi);
                       $('#action').val("Edit");
                  }
             })
        });

        $(document).on('submit', '#user_form', function(event){
             event.preventDefault();
             var id_rekomendasi = $('#id_rekomendasi').val();
             var no_tindaklanjut = $('#no_tindaklanjut').val();

             if(no_tindaklanjut != '')
             {
                  $.ajax({
                       url:"<?php echo base_url() . 'admin/tl_temuan_rekomendasi/user_action'?>",
                       method:'POST',
                       data: new FormData(this),
                       contentType:false,
                       processData:false,
                       success:function(data)
                       {
                            //alert(data);
                            $('#user_form')[0].reset();
                            $('#userModal').modal('hide');
                            dataTable.ajax.reload();
                            CKEDITOR.instances['uraian_rekomendasi'].setData('');
                            CKEDITOR.instances['uraian_tindaklanjut'].setData('');
                            swal('Data Rekomendasi', 'berhasil ditambah/ubah', 'success');
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error adding / update data');
                       }
                  });

             }
             else
             {
                  swal("Inputan Tindak Lanjut Harus Lengkap");
             }
             var table = $('#user_data').dataTable();
             table.fnReloadAjax();
        });

       $("#user_data").dataTable().fnDestroy();
       var id_temuan = $('#id_temuan').val();
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
              url:"<?php echo base_url() . 'admin/tl_temuan_rekomendasi/fetch_user'; ?>",
              data:{id_temuan:id_temuan},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[0, 1, 2],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });
  </script>



<?php $this->load->view('back/footer'); ?>