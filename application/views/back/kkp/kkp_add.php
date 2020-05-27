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
              <label for="kode">Form detail SPT</label>
            </div>
            <div class="panel-body">
            <div class="box-body">

              <div class="form-group"><label>Tahun</label>
                <?php echo form_input($tahun, $pkp->tahun);?>
              </div>

              <div class="form-group"><label>No SPT</label>
                <?php echo form_input($id_spt,$pkp->id_spt);?>
                <?php echo form_input($no_spt, $pkp->no_spt);?>
              </div>

              <div class="form-group"><label>SOPD</label>
                <?php echo form_input($skpd, $pkp->skpd);?>
              </div>

              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban);?>
              </div>

              <div class="form-group"><label>No PKP</label>
                <?php echo form_input($id_pkp, $pkp->id_pkp);?>
                <?php echo form_input($no_pkp, $pkp->no_pkp);?>
              </div>

              <div class="form-group"><label>Kegiatan</label>
                <?php echo form_input($kegiatan, $pkp->kegiatan);?>
              </div>

              <div class="form-group"><label>No Langkah Kerja</label>
                <?php echo form_input($no_langkah_kerja, $pkp->no_langkah_kerja);?>
              </div>

              <div class="form-group"><label>Langkah Kerja</label>
                <?php echo form_textarea($langkah_kerja, $pkp->langkah_kerja);?>
              </div>

              <div class="form-group"><label>Waktu Pemeriksaan</label>
                <?php echo form_input($hari, $pkp->hari);?>
              </div>

              <div class="form-group"><label>No KKP</label>
                <?php echo form_input($no_kkp, $pkp->no_kkp);?>
              </div>

              <?php echo form_input($nip, $pkp->nip);?>
              <?php echo form_input($auditor, $pkp->auditor);?>

              <hr />

              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Tabel KKP Temuan</b></div>
                <div class="panel-body">
                  <div class="box-body">

                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info">Tambah KKP Temuan</button>
                         <br /><br /><hr/>
                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center">Tanggal KKP</th>
                                       <th style="text-align: center">Judul</th>
                                       <th style="text-align: center">Lampiran</th>
                                       <th style="text-align: center">Status</th>
                                       <th style="text-align: center">Reviu</th>
                                       <th style="text-align: center">Upload</th>
                                       <th style="text-align: center">Laporan</th>
                                       <th style="text-align: center">Ubah</th>
                                       <th style="text-align: center">Hapus</th>
                                   </tr>
                              </thead>
                         </table>
                    </div>
                  </div>
                </div><hr/>
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
                          <h4 class="modal-title">Tambah Kegiatan PKP</h4>
                     </div>
                     <div class="modal-body">

                       <div class='row'>
                         <div class="col-md-2">
                           <div class="form-group"><label>No KKP</label>
                             <?php echo form_input($no_kkpm);?>
                           </div>
                         </div>

                         <div class="col-md-10">
                           <div class="form-group"><label>No KKP dari PKP</label>
                             <?php echo form_input($no_kkp, $pkp->no_kkp);?>
                           </div>
                         </div>
                       </div>

                       <div class="form-group"><label>Tanggal KKP</label>
                         <div class="input-group date">
                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                           <?php echo form_input($tanggal_kkp);?>
                         </div>
                       </div>

                       <div class="form-group"><label>Judul KKP</label>
                         <?php echo form_input($temuan);?>
                       </div>

                       <div class="form-group"><label>Kondisi Temuan dan Kesimpulan</label>
                         <?php echo form_textarea($kondisi_temuan);?>
                       </div>

                       <input type="hidden" name="id_kkp" id="id_kkp" class="form-control" readonly/>

                       <input type="hidden" name="id_sptm" id="id_sptm" class="form-control" readonly/>
                       <input type="hidden" name="no_sptm" id="no_sptm" class="form-control" readonly/>
                       <input type="hidden" name="id_pkpm" id="id_pkpm" class="form-control" readonly/>
                       <input type="hidden" name="no_pkpm" id="no_pkpm" class="form-control" readonly/>

                       <input type="hidden" name="nipm" id="nipm" class="form-control" readonly/>
                       <input type="hidden" name="auditorm" id="auditorm" class="form-control" readonly/>

                       <input type="hidden" name="skpdm" id="skpdm" class="form-control" readonly/>

                     </div>
                     <div class="modal-footer">
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                </div>
           </form>
      </div>
 </div>

 <div id="userModal2" class="modal fade ">
       <div class="modal-dialog modal-lg" >
                 <div class="modal-content">
                      <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Form Upload Lampiran KKP</h4>
                      </div>
                      <div class="modal-body">

                        <div class="row">
                          <form action="#" id="uploadkkp" name="uploadkkp">
                            <div class="form-group col-md-12">

                              <input type="text" name="id_kkpm2" id="id_kkpm2" class="form-control" readonly/>

                              <div class="form-group"><label>Lampiran</label>
                                <?php echo form_input($lampiran);?>
                              </div>

                               <div class="form-group"><label>Upload File Lampiran KKP</label>
                                 <input class="form-control" name='kkp' type='file' id='kkp'>
                                 <div class="form-group">
                                   <div class="progress">
                                     <div id="barprogresskkp" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                       <span id="statuskkp">0%</span>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">

                        <button class="btn btn-info" id='tambahkkp'>Upload</button>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                 </div>
       </div>
  </div>

  <div id="userModal3" class="modal fade ">
        <div class="modal-dialog modal-lg" >
                  <div class="modal-content">
                       <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Detail reviu KKP</h4>
                       </div>
                       <div class="modal-body">
                         <div class="row">
                         <div class="col-md-12">
                           <div class="panel panel-primary">
                             <!-- Default panel contents -->
                           <div class="panel-heading"><b>Tabel KKP Temuan</b></div>
                             <div class="panel-body">
                               <div class="box-body"><hr/>
                                 <table id="user_data_reviu" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                      <thead>
                                           <tr>
                                             <th style="text-align: center">Tanggal Reviu Ketua Tim</th>
                                             <th style="text-align: center">Reviu Ketua Tim</th>
                                             <th style="text-align: center">Ketua Tim</th>
                                             <th style="text-align: center">Tanggal Reviu Dalnis</th>
                                             <th style="text-align: center">Reviu Dalnis</th>
                                             <th style="text-align: center">Dalnis</th>
                                           </tr>
                                      </thead>
                                 </table>
                                 <input type="hidden" name="id_kkpd" id="id_kkpd" class="form-control" readonly/>
                                 </div>
                               </div>
                             </div>
                         </div>
                         </div>
                       </div>
                       <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>
                       </form>
                  </div>
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

<script>
$("#nipcombo").on("change", function() {
    var nama_auditor = $("#nama_auditor").val();
    var nip = $("#nipcombo").val();
    $('#nip').val(nip);

     $.ajax({
         url: '<?php echo base_url() . 'admin/sptauditor/fetch_single_id' ?>',
         method:"POST",
         data:{nip:nip},
         dataType:"json",
         success:function(data)
         {
              $('#nama').val(data.nama_auditor);
              $('#foto').val(data.foto);
         }
     });
});
</script>

<!-- datepicker -->
<script>
  $(document).ready(function(){
    $('#tanggal_kkp').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker();

  });
</script>
<!-- End Datepicker -->


<!-- CKeditor -->
<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('langkah_kerja');
    CKEDITOR.replace('kondisi_temuan');

    CKEDITOR.config.skin = 'office2013';
    CKEDITOR.config.extraPlugins = 'justify,find,pastefromword,print,selectall,showblocks,table,tableresize,tableselection';
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!-- end CKeditor -->

<script type="text/javascript" language="javascript">

</script>

<!-- validation modal -->
<script>
function setURL(url){
    document.getElementById('iframe').src = url;
}
</script>

<script type="text/javascript" language="javascript" >

      $(document).ready(function(){
        $(document).on('click', '.reviu', function(){
             var id_kkp = $(this).attr("id");
             $.ajax({
                  url:"<?php echo base_url(). 'admin/kkp/fetch_single_user'?>",
                  method:"POST",
                  data:{id_kkp:id_kkp},
                  dataType:"json",
                  success:function(data)
                  {
                       $('#userModal3').modal('show');
                       $('#id_kkpd').val(id_kkp);

                       $("#user_data_reviu").dataTable().fnDestroy();

                         var dataTable = $('#user_data_reviu').DataTable({
                           "processing":true,
                           "serverSide":true,
                           "bFilter":false,
                           "order":[],

                           "ajax":{
                                url:"<?php echo base_url() . 'admin/kkp/fetch_user_reviu_detail'; ?>",
                                data:{id_kkp:id_kkp},
                                dataType:"JSON",
                                type:"POST"
                           },
                           "columnDefs":[
                                {
                                     "targets":[1, 2, 4, 5],
                                     "orderable":false,
                                     "className": 'text-center'
                                }
                           ],
                       });table.fnReloadAjax();

                       $('.modal-title').text("Form Detail Reviu KKP Ketua tim dan Supervisor/Dalnis");
                       $('#action').val("Input Reviu");
                  }
             })
        });

        $('#add_button').click(function(){
            var id_spt = $("#id_spt").val();
            var no_spt = $("#no_spt").val();
            var id_pkp = $("#id_pkp").val();
            var no_pkp = $("#no_pkp").val();
            var nip = $("#nip").val();
            var auditor = $("#auditor").val();
            var skpd = $("#skpd").val();

            if(no_spt != ''){
              $('#user_form')[0].reset();
              $('#id_sptm').val(id_spt);
              $('#no_sptm').val(no_spt);
              $('#id_pkpm').val(id_pkp);
              $('#no_pkpm').val(no_pkp);
              $('#nipm').val(nip);
              $('#auditorm').val(auditor);
              $('#skpdm').val(skpd);

              $('.modal-title').text("Form Input KKP Temuan");
              $('#action').val("Add");
            }
            else
            {
              alert('Data ada yang belum terisi/lengkap');
              $('#userModal').modal('toggle');
            };
       });

       $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var id_kkp = $('#id_kkp').val();
            var no_pkp = $('#no_pkpm').val();
            var no_kkp = $('#no_kkpm').val();
            var temuan = $('#temuan').val();
            var kondisi_temuan = $('#kondisi_temuan').val();

            if(no_pkp != '' && no_kkp != '' && temuan != '' && kondisi_temuan != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/kkp/user_action'?>",
                      method:'POST',
                      data: new FormData(this),
                      contentType:false,
                      processData:false,
                      success:function(data)
                      {
                           $('#user_form')[0].reset();
                           $('#userModal').modal('hide');
                           dataTable.ajax.reload();
                           swal('Data KKP Temuan', 'berhasil ditambah/ubah', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                           alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Alert","Inputan KKP Harus Lengkap","error");
            }
            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
       });

       $(document).on('click', '.update', function(){
            var id_kkp = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(). 'admin/kkp/fetch_single_user'?>",
                 method:"POST",
                 data:{id_kkp:id_kkp},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal').modal('show');
                      $('#no_kkpm').val(data.no_kkp);
                      $('#id_sptm').val(data.id_sptm);
                      $('#no_sptm').val(data.no_sptm);
                      $('#id_pkpm').val(data.id_pkpm);
                      $('#no_pkpm').val(data.no_pkpm);

                      $('#nipm').val(data.nip);
                      $('#auditorm').val(data.nama);
                      $('#skpdm').val(data.skpd);

                      $('#tanggal_kkp').val(data.tanggal_kkp);
                      $('#temuan').val(data.temuan);
                      CKEDITOR.instances['kondisi_temuan'].setData(data.kondisi_temuan);

                      $('.modal-title').text("Form Edit KKP");
                      $('#id_kkp').val(id_kkp);
                      $('#action').val("Edit");
                 }
            })
       });

       $(document).on('click', '.delete', function(){
            var id_kkp = $(this).attr("id");
            if (confirm("Yakin data KKP Temuan dihapus?"))
            {
                $.ajax({
                  url:"<?php echo base_url() . 'admin/kkp/delete_single_user' ?>",
                  method:"POST",
                  data:{id_kkp:id_kkp},
                  dataType:"json",
                  success:function(data)
                  {
                    alert(data);
                    var table = $('#user_data').dataTable();
                    dataTable.ajax.reload();
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

       $(document).on('click', '.upload', function(){
            var id_kkp = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(). 'admin/kkp/fetch_single_user'?>",
                 method:"POST",
                 data:{id_kkp:id_kkp},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal2').modal('show');
                      $('#skpdm').val(data.skpd);
                      $('.modal-title').text("Form Upload Lampiran KKP");
                      $('#id_kkpm2').val(id_kkp);
                      $('#action').val("Edit");
                 }
            })
       });

       $(document).on('click', '.laporan', function(){
            var id_kkp = $(this).attr("id");
            window.open("<?php echo base_url(). 'admin/kkp/laporan_kkp/'?>"+id_kkp, "_blank");
            // $.ajax({
            //      url:"<?php echo base_url(). 'admin/kkp/laporan_kkp/'?>"+id_kkp,
            //      method:"POST",
            //      data:{id_kkp:id_kkp},
            //      dataType:"json",
            //      success:function(data)
            //      {
            //           $('#userModal2').modal('show');
            //           $('#skpdm').val(data.skpd);
            //           $('.modal-title').text("Form Upload Lampiran KKP");
            //           $('#id_kkpm2').val(id_kkp);
            //           $('#action').val("Edit");
            //      }
            // })
       });

       $("#uploadkkp").submit(function(e){
                 e.preventDefault();
                 var file_data = $('#kkp').prop('files')[0];
                 var id_kkp = $('#id_kkpm2').val();
                 var lampiran = $('#lampiran').val();
                 var form_data = new FormData(this);
                 var progressBar = document.getElementById("progress");
                 var loadBtn = document.getElementById("tambahkkp");
                 var kkp = $('#kkp').val();

                 if (kkp == ''){

                   swal('Alert','Tidak ada file untuk diupload','error');
                   loadBtn.disabled = false;

                 } else {

                 console.log(form_data);

                 form_data.append('file', file_data);
                 form_data.append('id_kkp', id_kkp);
                 form_data.append('lampiran', lampiran);
                 $.ajax({
                     url: '<?php echo base_url() . 'admin/kkp/uploadkkp' ?>',
                     dataType: 'json',
                     data: form_data,
                     type: 'POST',
                     xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {
                             if (evt.lengthComputable) {
                                   var percentComplete = evt.loaded / evt.total;
                                   loadBtn.disabled = true;
                                   console.log(percentComplete);
                                   $('#barprogresskkp').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                   $('#statuskkp').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                             }
                        }, false);

                     return xhr;},
                     success: function(data,status){
                       if (data.status=='error') {
                         Swal('Alert','Upload lampiran terdapat permasalah','error');
                         loadBtn.disabled = false;
                         $("#statuskkp").html('Error Uploading');
                       };
                       if (data.status=='success') {
                         $('#kkp').val('');
                         $("#statuskkp").html('File berhasil Diupload');
                         $('#barprogresskkp').removeClass('active');
                         loadBtn.disabled = false;
                         dataTable.ajax.reload();
                         //Swal('Alert','Lampiran berhasil diupload','success');
                       };
                     },
                     cache: false,
                     contentType: false,
                     processData: false,
                 });
                 return false;table.fnReloadAjax();
               };
       });

       $("#user_data").dataTable().fnDestroy();
       var id_pkp = $('#id_pkp').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bFilter": false,
         "order":[],

         "ajax":{
              url:"<?php echo base_url() . 'admin/kkp/fetch_user'; ?>",
              data:{id_pkp:id_pkp},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[4, 5, 6, 7],
                   "orderable":false,
                   "className": 'text-center'
              }
         ],
    });table.fnReloadAjax();

  });dataTable.ajax.reload();
  </script>

<?php $this->load->view('back/footer'); ?>
