<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1 ><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><?php echo $module ?></li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>

      <?php echo form_open_multipart($action);?>
      <div class="col-md-12"> <?php echo validation_errors() ?> </div>
      <div class="col-md-12"><?php echo ($this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''); ?></div>

      <div class="col-sm-12">
            <div class="box box-primary">
                            <h3><p class="text-muted m-b-30 font-13"><center>INSPEKTORAT PROVINSI KALIMANTAN SELATAN</center></p></h3>
                            <h3 class="box-title m-b-0"><center>Entry Berkas Surat Perintah Tugas</center></h3>

                            <div id="wizspt" class="wizard">
                                <ul class="wizard-steps" role="tablist">
                                    <li class="active" role="tab">
                                        <h4><span>1</span>Periode SPT</h4> </li>
                                    <li role="tab">
                                        <h4><span>2</span>Detail SPT</h4> </li>
                                    <li role="tab">
                                        <h4><span>3</span>Entry Auditor</h4> </li>
                                    <li role="tab">
                                        <h4><span>4</span>Upload Berkas</h4> </li>
                                </ul>
                                <form id="validation" class="form-horizontal" onsubmit="return false;">
                                <div class="wizard-content">
                                    <div class="wizard-pane active" role="tabpanel">
                                       <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                       <div class="panel-heading"><b>Penentuan periode tahun surat perintah tugas dan objek pemeriksaan</b></div>
                                         <div class="panel-body">
                                           <div class="box-body">

                                             <!-- Tahun -->
                                             <div class="form-group"><label>Tahun SPT <a class="text-warning">*</a></label>
                                               <select class="form-control" name="tahun" id="tahun">
                                                 <option value="">Pilih Tahun</option>
                                                 <?php $thn_skr = date('Y'); for ($x = $thn_skr; $x >= 2008; $x--) { ?>
                                                 <option value="<?php echo $x ?>"> <?php echo $x ?></option>
                                                   <?php } ?>
                                               </select>
                                             </div>
                                              <!-- skpd -->
                                              <div class="form-group"><label>SKPD berdasarkan PKPT <a class="text-warning">*</a></label>
                                          	     <?php echo form_dropdown('',$get_combo_skpd,'',$nama_skpd); ?>
                                              </div>
                                              <!-- irbanwil -->
                                              <div class="form-group"><label>Inspektur Pembantu Wilayah</label>
                                                <?php echo form_input($nama_irban)?>
                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="wizard-pane" role="tabpanel">
                                         <div class="panel panel-default">
                                      <!-- Default panel contents -->
                                         <div class="panel-heading"><b>Penginputan detail berkas SPT</b></div>
                                           <div class="panel-body">
                                             <div class="box-body">

                                               <!-- no spt -->
                                               <div class="form-group"><label>No SPT <a class="text-warning">*</a></label>
                                                 <input type="hidden" name="nospt" id="nospt" class="form-control" readonly/>
                                                 <?php echo form_input($no_spt);?>
                                               </div>
                                               <!-- tanggal spt -->
                                               <div class="form-group"><label>Tanggal SPT Terbit <a class="text-warning">*</a></label>
                                                 <div class="input-group date" id="tanggal_spt">
                                                   <div class="input-group-addon">
                                                     <span class="fa fa-calendar"></span>
                                                    </div>
                                                    <?php echo form_input($tanggal_spt);?>
                                                  </div>
                                                </div>
                                                <!-- keperluan spt -->
                                                <div class="form-group"><label>Keperluan <a class="text-warning">*</a></label>
                                                  <?php echo form_input($keperluan_spt);?>
                                                </div>
                                                <!-- tanggal tugas -->
                                                <div class="form-group"><label>Tanggal Penugasan <a class="text-warning">*</a></label>
                                                  <div class="input-group date" id="tanggal_tugas">
                                                    <div class="input-group-addon">
                                                      <i class="fa fa-calendar"></i>
                                                     </div>
                                                     <?php echo form_input($tanggal_tugas);?>
                                                   </div>
                                                 </div>

                                            </div>
                                          </div>
                                        </div>

                                    </div>

                                    <div class="wizard-pane" role="tabpanel">
                                         <div class="panel panel-default">
                                      <!-- Default panel contents -->
                                         <div class="panel-heading"><b>Entry ketua dan anggota auditor</b></div>
                                           <div class="panel-body">
                                             <div class="box-body">

                                               <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info">Tambah Auditor</button>
                                                    <br /><br />
                                                    <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                         <thead>
                                                              <tr>
                                                                  <th style="text-align: center" >Foto</th>
                                                                  <th style="text-align: center" >NIP</th>
                                                                  <th style="text-align: center" >Nama</th>
                                                                  <th style="text-align: center" >Jabatan</th>
                                                                  <th style="text-align: center" >Aksi</th>
                                                              </tr>
                                                         </thead>
                                                    </table>
                                               </div>

                                          </div>
                                        </div>

                                    </div>

                                        <div class="wizard-pane" role="tabpanel">
                                             <div class="panel panel-default">
                                          <!-- Default panel contents -->
                                             <div class="panel-heading"><b>Upload berkas pendukung SPT</b></div>
                                               <div class="panel-body">
                                                 <div class="box-body">


                                                   <div class="panel panel-default">
                                                   <div class="panel-heading"><b>File Nota Dinas</b></div>
                                                   <div class="panel-body">
                                                     <div class="box-body">
                                                       <div class="form-group">
                                                         <label><input id="checkboxnotadinas" name="checkboxnotadinas" type="checkbox" class="minimal" unchecked> <p>Aktifkan checkbox bila ada file yang diupload</p></label>
                                                       </div>
                                                       <div class="form-group">

                                                         <div class="col-md-6">
                                                         <label><h6>No Nota Dinas *</h6></label>
                                                           <?php echo form_input($no_notadinas);?>
                                                         </div>

                                                         <div class="col-md-6">
                                                         <label><h6>Tanggal Nota Dinas *</h6></label>
                                                         <div class="input-group date">
                                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                           <?php echo form_input($tanggal_notadinas);?>
                                                         </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                         <label><h6>Tanggal Sekretaris Mengetahui Nota Dinas Disposisi *</h6></label>
                                                         <div class="input-group date">
                                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                           <?php echo form_input($tanggal_disposisi_sekretaris);?>
                                                         </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                         <label><h6>Sekretaris *</h6></label>
                                                           <?php echo form_input($pengesah_disposisi_sekretaris);?>
                                                         </div>

                                                         <div class="col-md-6">
                                                         <label><h6>Tanggal Inspektur Mengetahui Nota Dinas Disposisi *</h6></label>
                                                         <div class="input-group date">
                                                           <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                           <?php echo form_input($tanggal_disposisi_inspektur);?>
                                                         </div>
                                                         </div>

                                                         <div class="col-md-6">
                                                         <label><h6>Inspektur *</h6></label>
                                                           <?php echo form_input($pengesah_disposisi_inspektur);?>
                                                         </div>

                                                      </div>
                                                      <div class="form-group">
                                                        <label><h6>Upload File</h6></label>
                                                        <input type="file" class="form-control" name="notadinasfile" id="notadinasfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                                                        <a id="preview" src="" alt=""/></a>
                                                        <p>Format File yang bisa diupload : <i>png|jpg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar</i></p><br>
                                                      </div>
                                                 </div><hr />
                                                 </div>


                                                 <div class="panel panel-default">
                                                 <div class="panel-heading"><b>File SPT</b></div>
                                                 <div class="panel-body">
                                                   <div class="box-body">
                                                     <div class="form-group">
                                                       <label><input id="checkboxspt" name="checkboxspt" type="checkbox" class="minimal" unchecked> <p>Aktifkan checkbox bila ada file yang diupload</p></label>
                                                     </div>

                                                     <div class="col-md-6">
                                                     <label><h6>Tanggal Inspektur Mengetahui Surat Putusan Tugas *</h6></label>
                                                     <div class="input-group date">
                                                       <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                       <?php echo form_input($tanggal_spt_inspektur);?>
                                                     </div>
                                                     </div>

                                                     <div class="col-md-6">
                                                     <label><h6>Inspektur *</h6></label>
                                                       <?php echo form_input($pengesah_spt_inspektur);?>
                                                     </div>

                                                     <div class="form-group">
                                                       <label><h6>Upload File</h6></label>
                                                       <input type="file" class="form-control" name="sptfile" id="sptfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                                                       <a id="preview" src="" alt=""/></a>
                                                       <p>Format File yang bisa diupload : <i>png|jpg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar</i></p><br>
                                                     </div>
                                                </div><hr />
                                                </div>


                                                <div class="panel panel-default">
                                                <div class="panel-heading"><b>File Surat Keluar</b></div>
                                                <div class="panel-body">
                                                  <div class="box-body">
                                                    <div class="form-group">
                                                       <label><input id="checkboxsuratkeluar" name="checkboxsuratkeluar" type="checkbox" class="minimal" unchecked> <p>Aktifkan checkbox bila ada file yang diupload</p></label>
                                                    </div>

                                                    <div class="col-md-12">
                                                    <label><h6>No Surat Keluar *</h6></label>
                                                      <?php echo form_input($no_surat_keluar);?>
                                                    </div>

                                                    <div class="col-md-12">
                                                    <label><h6>Perihal Surat Keluar *</h6></label>
                                                      <?php echo form_input($perihal_surat_keluar);?>
                                                    </div>

                                                    <div class="col-md-6">
                                                    <label><h6>Tanggal Inspektur Mengetahui Surat Keluar *</h6></label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                      <?php echo form_input($tanggal_surat_keluar);?>
                                                    </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                    <label><h6>Inspektur *</h6></label>
                                                      <?php echo form_input($pengesah_surat_keluar);?>
                                                    </div>

                                                    <div class="form-group">
                                                       <label><h6>Upload File</h6></label>
                                                       <input type="file" class="form-control" name="suratkeluarfile" id="suratkeluarfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                                                       <a id="preview" src="" alt=""/></a>
                                                    </div>
                                                </div><hr />
                                                </div>

                                                   <div class="box-footer">
                                                     <button type="submit" name="submit" class="btn btn-info"><?php echo $button_submit ?></button>
                                                     <button type="reset" name="reset" class="btn btn-warning"><?php echo $button_reset ?></button>
                                                   </div>

               			                             </div>

                                                </div>
                                              </div>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                      </form>
                    </div>

      <?php echo form_close(); ?>
    </div>


</div>

</div>
</section>
</div>

<div id="userModal" class="modal fade">
      <div class="modal-dialog">
           <form method="post" id="user_form">
                <div class="modal-content">
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add User</h4>
                     </div>

                     <div class="modal-body">
                       <div class="form-group"><label>Pilih Auditor <a class="text-warning">*</a></label>
                          <?php echo form_dropdown('',$get_combo_auditor_by_irban,'',$nama_auditor); ?>
                       </div>
                       <div class="form-group"><label>NIP</label>
                         <input type="text" name="nip" id="nip" class="form-control" readonly/>
                         <input type="hidden" name="no_sptau" id="no_sptau" class="form-control" value="" readonly/>
                         <input type="hidden" name="nama_irbanau" id="nama_irbanau" class="form-control" value="" readonly/>
                         <input type="hidden" name="tanggal_tugasau" id="tanggal_tugasau" class="form-control" value="" readonly/>
                       </div>
                       <div class="form-group"><label>Nama Auditor</label>
                         <input type="text" name="nama" id="nama" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Jabatan</label>
                         <select type="text" name="jabatan" id="jabatan" class="form-control">
                           <option value="">Pilih Jabatan</option>
                           <option value="Ketua Tim">Ketua Tim</option>
                           <option value="Anggota">Penanggung Jawab</option>
                           <option value="Anggota">Pengendali Teknis</option>
                           <option value="Anggota">Anggota</option>
                         </select>
                       </div>

                          <input type="hidden" name="foto" id="foto" class="form-control" readonly/>
                     </div>
                     <div class="modal-footer">
                          <input type="hidden" name="user_id" id="user_id" />
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

<!-- validation modal -->
 <script type="text/javascript" language="javascript" >

      $(document).ready(function(){
        $('#add_button').click(function(){
            var no_spt = $("#no_spt").val();
            var nama_irban = $('#nama_irban').val();
            var tanggal_tugas = $('#tanggal_tugas').val();
            var tanggal_spt = $('#tanggal_spt').val();
            var keperluan = $('#keperluan').val();
            var foto = $('#foto').val();

            if(no_spt != '' && tanggal_spt != '' && tanggal_tugas != '' && keperluan != '')
            {
            $('#user_form')[0].reset();
            $('.modal-title').text("Form pilih auditor");
            $('#action').val("Add");
            $('#user_uploaded_image').html('');
            $('#no_sptau').val(no_spt);
            $('#nama_irbanau').val(nama_irban);
            $('#tanggal_tugasau').val(tanggal_tugas);
            $('#foto').val(foto);

            }
            else
            {

              alert('Data Tahun Periode | PKPT | No SPT | Tanggal SPT | Tanggal Tugas | Keperluan ada yang belum terisi/lengkap');
              $('#userModal').modal('toggle');

            };

       });

       $( "#no_spt" ).change(function() {
         var no_spt = $("#no_spt").val();

         $("#user_data").dataTable().fnDestroy();
         var table = $('#user_data').dataTable({
            "processing":true,
            "serverSide":true,
            "bFilter":false,
            "order":[],
            "oLanguage": {
              "sSearch": "No SPT:"
            },
            "oSearch": {
              "sSearch": no_spt
            },

            "ajax":{
                 url:"<?php echo base_url() . 'admin/spt/fetch_user'; ?>",
                 type:"POST"
            },
            "columnDefs":[
                 {
                      "targets":[0, 1, 2, 4],
                      "orderable":false,
                 }
            ],
          });
          table.fnReloadAjax();
       });
       $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var nip = $('#nip').val();
            var nama = $('#nama').val();
            var jabatan = $('#jabatan').val();

            var nama_irban = $('#nama_irban').val();

            var no_spt = $('#no_spt').val();
            var tanggal_spt = $('#tanggal_spt').val();
            var keperluan = $('#keperluan').val();
            var tanggal_tugas = $('#tanggal_tugas').val();

            if(nip != '' && nama != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/spt/user_action'?>",
                      method:'POST',
                      data:new FormData(this),
                      contentType:false,
                      processData:false,
                      success:function(data)
                      {
                           //alert(data);
                           $('#user_form')[0].reset();
                           $('#userModal').modal('hide');
                           dataTable.ajax.reload();
                      }
                 });
                 swal('Data auditor berhasil ditambah');

            }
            else
            {
                 alert("Pilihan data auditor dibutuhkan.");
            }
            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
       });
       $(document).on('click', '.update', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(); ?>admin/spt/fetch_single_user",
                 method:"POST",
                 data:{user_id:user_id},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal').modal('show');
                      $('#first_name').val(data.first_name);
                      $('#last_name').val(data.last_name);
                      $('.modal-title').text("Edit User");
                      $('#user_id').val(user_id);
                      $('#action').val("Edit");
                 }
            })
       });
       $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");
            if (confirm("Yakin data auditor dihapus?"))
            {
                $.ajax({
                  url:"<?php echo base_url() . 'admin/spt/delete_single_user' ?>",
                  method:"POST",
                  data:{user_id:user_id},
                  dataType:"json",
                  success:function(data)
                  {
                    alert(data);
                    var table = $('#user_data').dataTable();
                    table.fnReloadAjax();
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
       $("#nama_auditor").on("change", function() {
          //Ambil value dari combo yg diselect
           var nama_auditor = $("#nama_auditor").val();
           //var nama_auditor = $(this).find(":selected").val();
           $('#nama').val(nama_auditor);
           //$('#nip').val('wew');
           //$('#nip').val('#no_spt');

           //swal("SUKSES", "Entry SPT dan berkas pendukung telah sampai tahapan akhir");

            $.ajax({
                url: '<?php echo base_url() . 'admin/spt/fetch_single_id' ?>',
                data:"nama_auditor="+nama_auditor ,
            }).success(function (data) {
                  var json = data,
                  obj = JSON.parse(json);
                  $('#nip').val(obj.nip);
                  $('#foto').val(obj.foto);
                  //$('#nama').val(obj.nama_auditor);
            });
       });


  });
  </script>


<script type="text/javascript">
(function ($) {
  $(function () {

      var addFormGroup = function (event) {
          event.preventDefault();

          var $formGroup = $(this).closest('.form-group');
          var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
          var $formGroupClone = $formGroup.clone();

          $(this)
              .toggleClass('btn-default btn-add btn-danger btn-remove')
              .html('–');

          $formGroupClone.find('input').val('');
          $formGroupClone.insertAfter($formGroup);

          var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
          if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
              $lastFormGroupLast.find('.btn-add').attr('disabled', true);
          }
      };



      var removeFormGroup = function (event) {
          event.preventDefault();

          var $formGroup = $(this).closest('.form-group');
          var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

          var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
          if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
              $lastFormGroupLast.find('.btn-add').attr('disabled', false);
          }

          $formGroup.remove();
      };

      var countFormGroup = function ($form) {
          return $form.find('.form-group').length;
      };

      $(document).on('click', '.btn-add', addFormGroup);
      $(document).on('click', '.btn-remove', removeFormGroup);

  });
})(jQuery);
</script>

<script src="<?php echo base_url() ?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.min.js"charset="UTF-8"></script>

<!-- datepicker -->
<script>
  $(document).ready(function(){
    $('#tanggal_spt').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });

    $('#tanggal_tugas').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });

    $('#tanggal_notadinas').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });

    $('#tanggal_disposisi_sekretaris').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });

    $('#tanggal_disposisi_inspektur').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });

    $('#tanggal_spt_inspektur').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });

    $('#tanggal_surat_keluar').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });
  });
</script>
<!-- End Datepicker -->

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
$(document).ready(function(){
  $('#checkboxnotadinas').each(function(){
  var self = $(this),
    label = self.next(),
    label_text = label.text();

  label.remove();
  self.iCheck({
    checkboxClass: 'icheckbox_line-blue',
    insert: '<div class="icheck_line-icon"></div>' + label_text
    });

    $('#checkboxnotadinas').on('ifChecked', function(event){
    alert("File Nota Dinas ada dan siap diupload");
    $("#notadinasfile").removeAttr('disabled');
    $("#no_notadinas").removeAttr('disabled');
    $("#tanggal_notadinas").removeAttr('disabled');
    $("#tanggal_disposisi_sekretaris").removeAttr('disabled');
    $("#pengesah_disposisi_sekretaris").removeAttr('disabled');
    $("#tanggal_disposisi_inspektur").removeAttr('disabled');
    $("#pengesah_disposisi_inspektur").removeAttr('disabled');
    });

    $('#checkboxnotadinas').on('ifUnchecked', function(event){
    alert("File Nota Dinas belum siap diupload");
    $("#notadinasfile").attr('disabled',true);
    $("#no_notadinas").attr('disabled',true);
    $("#tanggal_notadinas").attr('disabled',true);
    $("#tanggal_disposisi_sekretaris").attr('disabled',true);
    $("#pengesah_disposisi_sekretaris").attr('disabled',true);
    $("#tanggal_disposisi_inspektur").attr('disabled',true);
    $("#pengesah_disposisi_inspektur").attr('disabled',true);
    });

  });

  $('#checkboxspt').each(function(){
  var self = $(this),
    label = self.next(),
    label_text = label.text();

  label.remove();
  self.iCheck({
    checkboxClass: 'icheckbox_line-blue',
    insert: '<div class="icheck_line-icon"></div>' + label_text
    });

    $('#checkboxspt').on('ifChecked', function(event){
    alert("File SPT ada dan siap diupload");
    $("#sptfile").removeAttr('disabled');
    $("#tanggal_spt_inspektur").removeAttr('disabled');
    $("#pengesah_spt_inspektur").removeAttr('disabled');
    });

    $('#checkboxspt').on('ifUnchecked', function(event){
    alert("File SPT belum siap diupload");
    $("#sptfile").attr('disabled','disabled');
    $("#tanggal_spt_inspektur").attr('disabled','disabled');
    $("#pengesah_spt_inspektur").attr('disabled','disabled');
    });

  });

  $('#checkboxsuratkeluar').each(function(){

    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-blue',
      insert: '<div class="icheck_line-icon"></div>' + label_text
      });
  });

  $('#checkboxsuratkeluar').on('ifChanged', function(event){
    var checkboxChecked = $(this).is(':checked');

    if(checkboxChecked) {
        alert("File Surat Keluar ada dan siap diupload");
        $("#suratkeluarfile").removeAttr('disabled');
        $("#no_surat_keluar").removeAttr('disabled');
        $("#perihal_surat_keluar").removeAttr('disabled');
        $("#tanggal_surat_keluar").removeAttr('disabled');
        $("#pengesah_surat_keluar").removeAttr('disabled');
    }else{
        alert("File Surat Keluar belum siap diupload");
        $("#suratkeluarfile").attr('disabled','disabled');
        $("#no_surat_keluar").attr('disabled','disabled');
        $("#perihal_surat_keluar").attr('disabled','disabled');
        $("#tanggal_surat_keluar").attr('disabled','disabled');
        $("#pengesah_surat_keluar").attr('disabled','disabled');
    }
  });
});
</script>

<script type="text/javascript">
(function() {
        $('#wizspt').wizard({
            onInit: function() {
                $('#validation').formValidation({
                    framework: 'bootstrap',

                    fields: {
                        no_spt: {
                            validators: {
                                notEmpty: {
                                    message: 'Isi No SPT dulu'
                                          },
                                stringLength: {
                                    min: 6,
                                    max: 30,
                                    message: 'The username must be more than 6 and less than 30 characters long'
                                          },
                                        }
                                },
                            }
                });
            },
            onFinish: function() {
                $('#validation').submit();
                swal("SUKSES", "Entry SPT dan berkas pendukung telah sampai tahapan akhir");
            }
        });
    })();
    </script>
    <!--Style Switcher -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
function ajaxfilemanager(field_name, url, type, win)
{
 var ajaxfilemanagerurl = "<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
 switch (type) {
  case "image":
   break;
  case "media":
   break;
  case "flash":
   break;
  case "file":
   break;
  default:
   return false;
 }
  tinyMCE.activeEditor.windowManager.open(
  {
      url: "<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
      width: 782,
      height: 440,
      inline : "yes",
      close_previous : "no"
  },
  {
      window : win,
      input : field_name
  });
}
</script>

<script type="text/javascript">
tinyMCE.init(
{

// General options
mode : "textareas",
elements : "ajaxfilemanager",
file_browser_callback : 'ajaxfilemanager',

theme : "advanced",
plugins : "fullscreen,safari,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,print,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

// Theme options
theme_advanced_buttons1 : "fullscreen,undo,redo,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,insertfile,insertimage",
theme_advanced_buttons3 : "sub,sup,search,replace,|,bullist,numlist,|,outdent,indent,emotions,iespell,media,advhr",
theme_advanced_buttons4 : "image,charmap,preview,forecolor,backcolor,hr,removeformat,link,unlink,anchor,cite,visualaid",
theme_advanced_buttons5 : "tablecontrols",

theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
relative_urls : false,
remove_script_host : false,
});
</script>


<?php $this->load->view('back/footer'); ?>
