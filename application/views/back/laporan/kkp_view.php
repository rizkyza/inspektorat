<TABLE WIDTH="25%">
<TR>
<TD ALIGN="left" WIDTH="20%"><IMG SRC="<?php echo base_url('assets/images/header.png')?>" WIDTH="100%" HEIGHT="80"></TD>
</TR>
</TABLE>
<HR SIZE="5" COLOR="BLACK">
<BR>


<div class="content-wrapper">
<section class="content-header">
</section>
<section class='content'>
<div class='row'>
  <?php echo form_open_multipart($action);?>
    <div class="col-md-12"> <?php echo validation_errors() ?> </div>
    <!-- kolom kiri -->
    <div class="col-md-12">
      <div class="panel panel-primary">
            </div>
            <div class="panel-body">
            <div class="box-body">
              <table style="font-size:12px; font-family:chelvetica;">
                <tr>
                  <th style="text-align: left;"><b>Laporan</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;">Data KKP</td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Tahun</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->tahun;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>No SPT</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->no_spt;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>SOPD</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->skpd;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Irbanwil</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $irban?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>No PKP</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->no_pkp;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Kegiatan</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->kegiatan;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>No Langkah Kerja</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->no_langkah_kerja;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Waktu Pemeriksaan</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->hari;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>No KKP</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $pkp->no_kkp;?></td></td>
                </tr>
              </table>

              <?php echo form_input($nip, $pkp->nip);?>
              <?php echo form_input($auditor, $pkp->auditor);?>

              <hr />
                <div class="panel-body">
                  <div class="box-body">
                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                       <th style="text-align: center; border:1px solid #000;" colspan="7">TABEL KKP TEMUAN</th>
                                   <tr>
                                       <th style="text-align: center; border:1px solid #000;">No KKP</th>
                                       <th style="text-align: center; border:1px solid #000;">Auditor</th>
                                       <th style="text-align: center; border:1px solid #000;">Tanggal KKP</th>
                                       <th style="text-align: center; border:1px solid #000;">Judul</th>
                                       <th style="text-align: center; border:1px solid #000;">Kondisi Temuan</th>
                                       <th style="text-align: center; border:1px solid #000;">Status</th>
                                       <th style="text-align: center; border:1px solid #000;">Time Uploader</th>
                                   </tr>
                              </thead>
                              <tbody>
                                <?php $start = 0; foreach ($kkp_data as $kkp):?>
                                <tr>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->no_kkp ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->auditor ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->tanggal_kkp ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->temuan ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->kondisi_temuan ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->status ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $kkp->time_uploader ?></td>
                                </tr>
                                <?php endforeach;?>
                              </tbody>
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
