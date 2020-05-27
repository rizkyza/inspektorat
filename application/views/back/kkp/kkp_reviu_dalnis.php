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
                  <div class="box-body"><hr/>
                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center">Tanggal KKP</th>
                                       <th style="text-align: center">Judul</th>
                                       <th style="text-align: center">Uraian Kondisi</th>
                                       <th style="text-align: center">Lampiran</th>
                                       <th style="text-align: center">Status</th>
                                       <th style="text-align: center">Input Reviu</th>
                                       <th style="text-align: center">Upload</th>
                                       <th style="text-align: center">Verifikasi</th>
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

<div id="userModal2" class="modal fade ">
      <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Form Detail Reviu KKP</h4>
                     </div>
                     <div class="modal-body">
                       <div class="row">
                       <div class="col-md-12">
                         <div class="panel panel-primary">
                         <div class="panel-heading"><b>Tabel Reviu</b></div>
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
                                             <th style="text-align: center">Input Reviu Dalnis</th>
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

                       <div class="form-group"><label>Judul Temuan</label>
                         <?php echo form_input($temuan);?>
                       </div>

                       <div class="form-group"><label>Kondisi Temuan</label>
                         <?php echo form_textarea($kondisi_temuan);?>
                       </div>

                       <div class="form-group"><label>ID Reviu</label>
                         <?php echo form_input($id_reviu);?>
                       </div>

                       <div class="panel panel-primary">
                       <div class="panel-heading"><b>Panel Reviu Pengendali Teknis</b></div>
                         <div class="panel-body">
                           <div class="box-body">
                             <div class="form-group"><label>Reviu Pengendali Teknis</label>
                               <?php echo form_input($reviu_dalnis);?>
                             </div>
                           </div>
                         </div>
                       </div>

                       <input type="hidden" name="id_kkp" id="id_kkp" class="form-control" readonly/>

                     </div>
                     <div class="modal-footer">
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                </div>
           </form>
      </div>
 </div>

 <div id="userModal3" class="modal fade ">
       <div class="modal-dialog modal-lg" >
            <form method="post" id="user_form_status">
                 <div class="modal-content">
                      <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">Form Verifikasi KKP Temuan Auditor</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                        <div class="col-md-12">

                          <div class="form-group"><label>SOPD</label>
                            <input type="text" name="skpdv" id="skpdv" class="form-control" readonly/>
                          </div>

                          <div class="form-group"><label>Judul Temuan</label>
                            <input type="text" name="temuanv" id="temuanv" class="form-control" readonly/>
                          </div>

                          <div class="form-group"><label>Auditor</label>
                            <input type="text" name="auditorv" id="auditorv" class="form-control" readonly/>
                          </div>

                          <div class="panel panel-primary">
                          <div class="panel-heading"><b>Verifikasi</b></div>
                            <div class="panel-body">
                              <div class="box-body"><hr/>

                                <div class="form-group"><label>Status Verifikasi</label>
                                  <select name="status" id="status" class="form-control">
                                    <option value="disetujui">Disetujui</option>
                                    <option value="belum disetujui">Belum disetujui</option>
                                  </select>
                                </div>

                                <input type="hidden" name="id_kkpv" id="id_kkpv" class="form-control" readonly/>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                           <input type="submit" name="actions" id="actions" class="btn btn-success" value="Add" />
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

        $(document).on('click', '.status', function(){
             var id_kkp = $(this).attr("id");
                       $('#userModal3').modal('show');
                       $('#id_kkpv').val(id_kkp);
                       $.ajax({
                            url:"<?php echo base_url(). 'admin/kkp/fetch_single_user'?>",
                            method:"POST",
                            data:{id_kkp:id_kkp},
                            dataType:"json",
                            success:function(data)
                            {
                              $('#temuanv').val(data.temuan);
                              $('#auditorv').val(data.auditor);
                              $('#skpdv').val(data.skpd);
                            }
                       })

                       $('.modal-title').text("Form Verifikasi KKP Temuan Auditor");
                       $('#actions').val("Add");
        });

        $(document).on('click', '.reviu', function(){
             var id_kkp = $(this).attr("id");
             $.ajax({
                  url:"<?php echo base_url(). 'admin/kkp/fetch_single_user'?>",
                  method:"POST",
                  data:{id_kkp:id_kkp},
                  dataType:"json",
                  success:function(data)
                  {
                       $('#userModal2').modal('show');
                       $('#id_kkpd').val(id_kkp);

                       $("#user_data_reviu").dataTable().fnDestroy();

                         var dataTable = $('#user_data_reviu').DataTable({
                           "processing":true,
                           "serverSide":true,
                           "bFilter":false,
                           "order":[],

                           "ajax":{
                                url:"<?php echo base_url() . 'admin/kkp/fetch_user_reviu_detail_dalnis'; ?>",
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

       $(document).on('click', '.reviu_add', function(){
            var id_kkp = $(this).attr("id");
            var id_reviu = $(this).attr("name");
            $.ajax({
                 url:"<?php echo base_url(). 'admin/kkp/fetch_single_user'?>",
                 method:"POST",
                 data:{id_kkp:id_kkp},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal').modal('show');
                      $('#no_kkpm').val(data.no_kkp);

                      $('#tanggal_kkp').val(data.tanggal_kkp);
                      $('#temuan').val(data.temuan);
                      CKEDITOR.instances['kondisi_temuan'].setData(data.kondisi_temuan);

                      $('.modal-title').text("Form Isi Reviu KKP");
                      $('#id_kkp').val(id_kkp);
                      $('#id_reviu').val(id_reviu);
                      $('#action').val("Input Reviu");
                 }
            })
       });

       $(document).on('submit', '#user_form_status', function(event){
            event.preventDefault();
            var id_kkp = $('#id_kkpv').val();
            var status = $('#status').val();

            if(status != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/kkp/user_action_status'?>",
                      method:'POST',
                      data: new FormData(this),
                      contentType:false,
                      processData:false,
                      success:function(data)
                      {
                           $('#user_form_status')[0].reset();
                           $('#userModal3').modal('hide');
                           dataTable.ajax.reload();
                           swal('Status Verifikasi KKP Auditor ', 'berhasil ditambah/ubah', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                           alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Alert","Status harus dipilih terlebih dahulu","error");
            }
       });

       $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var id_kkp = $('#id_kkp').val();
            var id_reviu = $('#id_reviu').val();
            var reviu_dalnis = $('#reviu_dalnis').val();

            if(reviu_dalnis != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/kkp/user_action_reviu_dalnis'?>",
                      method:'POST',
                      data: new FormData(this),
                      contentType:false,
                      processData:false,
                      success:function(data)
                      {
                           $('#user_form')[0].reset();
                           $('#userModal').modal('hide');
                           dataTable.ajax.reload();
                           swal('Data Reviu Pengendali Teknis ', 'berhasil ditambah/ubah', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                           alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Alert","Inputan Reviu Pengendali Teknis Harus Lengkap","error");
            }
            var table = $('#user_data_reviu').dataTable();
            table.fnReloadAjax();
       });

       $("#user_data").dataTable().fnDestroy();
       var id_pkp = $('#id_pkp').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bAutoWidth": false,
         "scrollX": true,
         "bFilter": false,
         "order":[],

         "ajax":{
              url:"<?php echo base_url() . 'admin/kkp/fetch_user_reviu_dalnis'; ?>",
              data:{id_pkp:id_pkp},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[5, 6],
                   "orderable":false,
                   "className": 'text-center'
              }
         ],
    });table.fnReloadAjax();

  });dataTable.ajax.reload();
</script>

<?php $this->load->view('back/footer'); ?>
