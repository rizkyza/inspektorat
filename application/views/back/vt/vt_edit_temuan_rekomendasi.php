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
          <div class="panel panel-primary">
            <div class="panel-heading">
              <label for="kode">Temuan LHP</label>
            </div>
            <div class="panel-body">
            <div class="box-body">

              <div class="form-group"><label>No LHP</label>
                <?php echo form_input($no_lhp, $temuan->no_lhp);?>
              </div>
              <div class="form-group"><label>No Temuan</label>
                <?php echo form_input($no_temuan, $temuan->no_temuan);?>
              </div>
              <div class="form-group"><label>Kode Temuan</label>
                <?php echo form_textarea($kode_temuan, $temuan->kode_temuan);?>
              </div>
              <div class="form-group"><label>Judul Temuan</label>
                <?php echo form_input($judul_temuan, $temuan->judul_temuan);?>
              </div>

              <div class="form-group"><label>Nilai Temuan</label>
                <?php echo form_input($nilai_temuan, $temuan->nilai_temuan);?>
              </div><hr />

              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Data Rekomendasi Temuan LHP</b></div>
                <div class="panel-body">
                  <div class="box-body">

                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                      <th style="text-align: center" width="10%">Kode TL</th>
                                       <th style="text-align: center" width="30%">Kode Rekomendasi</th>
                                       <th style="text-align: center" width="45%">Uraian Rekomendasi</th>
                                       <th style="text-align: center" width="10%">Status</th>
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
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>

 <div id="userModal" class="modal fade ">
       <div class="modal-dialog modal-lg" >
            <form method="post" id="user_form">
                 <div class="modal-content">
                      <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Verifikasi Tindak Lanjut Rekomendasi Temuan LHP</h4>
                      </div>
                        <div class="modal-body">
                          <div class="panel panel-primary">
                            <div class="panel-heading with-border">
                              <label for="kode">Rekomendasi</label>
                            </div>
                            <div class="box-body">
                              <div class="form-group"><label>Kode Rekomendasi</label>
                                <input type="text" name="kode_rekomendasi" id="kode_rekomendasi" class="form-control" readonly/>
                              </div>
                              <div class="form-group"><label>Uraian Rekomendasi</label>
                                <textarea type="text" name="uraian_rekomendasi" id="uraian_rekomendasi" class="form-control" readonly/></textarea>
                              </div>
                              <hr />
                            </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading with-border">
                              <label for="kode">Tindak Lanjut</label>
                            </div>
                            <div class="box-body">
                              <div class="form-group"><label>Kode Tindak Lanjut</label>
                                <input type="text" name="kode_tindaklanjut" id="kode_tindaklanjut" class="form-control" readonly/>
                              </div>
                              <div class="form-group"><label>No Tindak Lanjut</label>
                                <input type="text" name="no_tindaklanjut" id="no_tindaklanjut" class="form-control" readonly/>
                              </div>
                              <div class="form-group"><label>Uraian Tindak Lanjut</label>
                                <textarea type="text" name="uraian_tindaklanjut" id="uraian_tindaklanjut" class="form-control" readonly/></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-primary">
                            <div class="panel-heading with-border">
                              <label for="kode">Verifikasi Tindak Lanjut</label>
                            </div>
                            <div class="box-body">
                              <div class="form-group"><label>Status</label>
                                <select type="text" name="status" id="status" class="form-control">
                                  <option value="">Pilih Status</option>
                                  <option value="Selesai">Selesai</option>
                                  <option value="Diproses">Diproses</option>
                                  <option value="Belum">Belum</option>
                                </select>
                              </div>
                            </div>
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
    CKEDITOR.replace('uraian_rekomendasi');
    CKEDITOR.replace('uraian_tindaklanjut');

    CKEDITOR.config.skin = 'office2013';
    CKEDITOR.config.extraPlugins = 'justify,find,pastefromword,print,selectall,showblocks,table,tableresize,tableselection';
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

        $(document).on('click', '.update', function(){
             var id_rekomendasi = $(this).attr("id");
             $.ajax({
                  url:"<?php echo base_url(); ?>admin/vt_temuan_rekomendasi/fetch_single_user",
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

                       $('.modal-title').text("Verifikasi Tindak Lanjut Rekomendasi Temuan LHP");
                       $('#id_rekomendasi').val(id_rekomendasi);
                       $('#action').val("Verifikasi");
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
                       url:"<?php echo base_url() . 'admin/vt_temuan_rekomendasi/user_action'?>",
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
                            swal('Verifikasi Tindak Lanjut', 'berhasil disimpan', 'success');
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
        });

       $("#user_data").dataTable().fnDestroy();
       var id_temuan = $('#id_temuan').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bFilter":false,
         "order":[],
         "ajax":{
              url:"<?php echo base_url() . 'admin/vt_temuan_rekomendasi/fetch_user'; ?>",
              data:{id_temuan:id_temuan},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[3],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });
  </script>




<?php $this->load->view('back/footer'); ?>
