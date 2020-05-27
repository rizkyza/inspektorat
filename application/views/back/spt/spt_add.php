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
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
            <h3><p class="text-muted m-b-30 font-13"><center>INSPEKTORAT PROVINSI KALIMANTAN SELATAN</center></p></h3>
            <h3 class="box-title m-b-0"><center>Entry Berkas Surat Perintah Tugas</center></h3>
            <div id="wizspt" class="wizard">
              <ul class="wizard-steps" role="tablist">
                  <li class="active" role="tab">
                      <h4><span>1</span>Periode SPT</h4> </li>
                  <li role="tab">
                      <h4><span>2</span>Detail SPT</h4> </li>
                  <li role="tab">
                      <h4><span>3</span>Upload Berkas</h4> </li>
              </ul>
              <form id="validation" class="form-horizontal" onsubmit="return false;">
              <div class="wizard-content">
                  <div class="wizard-pane active" role="tabpanel">
                     <div class="panel panel-primary">
                  <!-- Default panel contents -->
                     <div class="panel-heading"><b>Penentuan periode tahun surat perintah tugas dan objek pemeriksaan (PKPT)</b></div>
                       <div class="panel-body">
                         <div class="box-body">
                           <?php echo form_input($id_pkpt, $pkpt_data->id_pkpt);?>
                           <!-- Tahun -->
                           <div class="form-group"><label>Tahun SPT <a class="text-warning">*</a></label>
                             <input type="text" name="tahun" id="tahun" class="form-control" value="<?php echo $thn=date('Y') ?>" readonly/>
                           </div>
                            <!-- skpd -->
                            <div class="form-group"><label>SKPD <a class="text-warning">*</a></label>
                               <?php echo form_input($nama_skpd, $pkpt_data->skpd);?>
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
                       <div class="panel panel-primary">
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
                               <div class="input-group date">
                                 <div class="input-group-addon">
                                   <span class="fa fa-calendar"></span>
                                  </div>
                                  <?php echo form_input($tanggal_spt, $pkpt_data->date_start);?>
                                </div>
                              </div>
                              <!-- keperluan spt -->
                              <div class="form-group"><label>Keperluan <a class="text-warning">*</a></label>
                                <?php echo form_input($keperluan_spt,'Reguler');?>
                              </div>
                              <!-- tanggal tugas -->
                              <div class="form-group"><label>Tanggal Penugasan <a class="text-warning">*</a></label>
                                <div class="input-group date">
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
                           <div class="panel panel-primary">
                        <!-- Default panel contents -->
                           <div class="panel-heading"><b>Upload berkas pendukung SPT</b></div>
                             <div class="panel-body">
                               <div class="box-body">


                                 <div class="panel panel-info">
                                 <div class="panel-heading"><b>File Nota Dinas</b></div>
                                 <div class="panel-body">
                                   <div class="box-body">
                                     <div class="form-group">
                                       <label><input id="checkboxnotadinas" name="checkboxnotadinas" type="checkbox" class="minimal" unchecked> <p>Aktifkan checkbox bila ada file yang diupload</p></label>
                                     </div>
                                     <div class="form-group">

                                      <div class="row">
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

                                    </div>
                                    <div class="form-group">
                                      <label><h6>Upload File</h6></label>
                                      <input type="file" class="form-control" name="notadinasfile" id="notadinasfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                                      <a id="preview" src="" alt=""/></a>
                                      <p>Format File yang bisa diupload : <i>png|jpg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar</i></p><br>
                                    </div>
                               </div><hr />
                               </div>


                               <div class="panel panel-info">
                               <div class="panel-heading"><b>File SPT</b></div>
                               <div class="panel-body">
                                 <div class="box-body">
                                   <div class="form-group">
                                     <label><input id="checkboxspt" name="checkboxspt" type="checkbox" class="minimal" unchecked> <p>Aktifkan checkbox bila ada file yang diupload</p></label>
                                   </div>

                                  <div class="row">
                                   <div class="col-md-6">
                                   <label><h6>Tanggal Inspektur Mengetahui Surat Putusan Tugas *</h6></label>
                                   <div class="input-group date">
                                     <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                     <?php echo form_input($tanggal_ttd_spt_inspektur);?>
                                   </div>
                                   </div>

                                   <div class="col-md-6">
                                   <label><h6>Inspektur *</h6></label>
                                     <?php echo form_input($pengesah_spt_inspektur);?>
                                   </div>
                                 </div>

                                   <div class="form-group">
                                     <label><h6>Upload File</h6></label>
                                     <input type="file" class="form-control" name="sptfile" id="sptfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                                     <a id="preview" src="" alt=""/></a>
                                     <p>Format File yang bisa diupload : <i>png|jpg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar</i></p><br>
                                   </div>
                              </div><hr />
                              </div>


                              <div class="panel panel-info">
                              <div class="panel-heading"><b>File Surat Keluar</b></div>
                              <div class="panel-body">
                                <div class="box-body">
                                  <div class="form-group">
                                     <label><input id="checkboxsuratkeluar" name="checkboxsuratkeluar" type="checkbox" class="minimal" unchecked> <p>Aktifkan checkbox bila ada file yang diupload</p></label>
                                  </div>

                                <div class="row">
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

<!-- datepicker -->
<script>
  $(document).ready(function(){
    $('#tanggal_spt').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker();

    $('#tanggal_tugas').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

    $('#tanggal_notadinas').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

    $('#tanggal_disposisi_sekretaris').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

    $('#tanggal_disposisi_inspektur').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

    $('#tanggal_ttd_spt_inspektur').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

    $('#tanggal_surat_keluar').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());
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
    //alert("File Nota Dinas ada dan siap diupload");
    $("#notadinasfile").removeAttr('disabled');
    $("#no_notadinas").removeAttr('disabled');
    $("#tanggal_notadinas").removeAttr('disabled');
    $("#tanggal_disposisi_sekretaris").removeAttr('disabled');
    $("#pengesah_disposisi_sekretaris").removeAttr('disabled');
    $("#tanggal_disposisi_inspektur").removeAttr('disabled');
    $("#pengesah_disposisi_inspektur").removeAttr('disabled');
    });

    $('#checkboxnotadinas').on('ifUnchecked', function(event){
    //alert("File Nota Dinas belum siap diupload");
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
    //alert("File SPT ada dan siap diupload");
    $("#sptfile").removeAttr('disabled');
    $("#tanggal_ttd_spt_inspektur").removeAttr('disabled');
    $("#pengesah_spt_inspektur").removeAttr('disabled');
    });

    $('#checkboxspt').on('ifUnchecked', function(event){
    //alert("File SPT belum siap diupload");
    $("#sptfile").attr('disabled','disabled');
    $("#tanggal_ttd_spt_inspektur").attr('disabled','disabled');
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
        //alert("File Surat Keluar ada dan siap diupload");
        $("#suratkeluarfile").removeAttr('disabled');
        $("#no_surat_keluar").removeAttr('disabled');
        $("#perihal_surat_keluar").removeAttr('disabled');
        $("#tanggal_surat_keluar").removeAttr('disabled');
        $("#pengesah_surat_keluar").removeAttr('disabled');
    }else{
        //alert("File Surat Keluar belum siap diupload");
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

<?php $this->load->view('back/footer'); ?>
