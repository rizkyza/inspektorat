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
          <div class="panel panel-primary">
            <div class="panel-heading">
              <label for="kode">Update Data dan Berkas SPT</label>
            </div>
            <div class="box-body">
              <div class="form-group"><label>Tahun</label>
                <?php echo form_input($tahun, $spt->tahun);?>
              </div>
              <div class="form-group"><label>No SPT</label>
                <?php echo form_input($no_spt, $spt->no_spt);?>
              </div>
              <div class="form-group"><label>Objek</label>
                <?php echo form_input($nama_skpd, $spt->nama_skpd);?>
              </div>
              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban, $spt->nama_irban);?>
              </div>

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
                      <?php echo form_input($no_notadinas, $spt->no_notadinas);?>
                    </div>


                    <div class="col-md-6">
                    <label><h6>Tanggal Nota Dinas *</h6></label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <?php echo form_input($tanggal_notadinas, $spt->tanggal_notadinas);?>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <label><h6>Tanggal Sekretaris Mengetahui Nota Dinas Disposisi *</h6></label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <?php echo form_input($tanggal_disposisi_sekretaris, $spt->tanggal_disposisi_sekretaris);?>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <label><h6>Sekretaris *</h6></label>
                      <?php echo form_input($pengesah_disposisi_sekretaris, $spt->pengesah_disposisi_sekretaris);?>
                    </div>

                    <div class="col-md-6">
                    <label><h6>Tanggal Inspektur Mengetahui Nota Dinas Disposisi *</h6></label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <?php echo form_input($tanggal_disposisi_inspektur, $spt->tanggal_disposisi_inspektur);?>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <label><h6>Inspektur *</h6></label>
                      <?php echo form_input($pengesah_disposisi_inspektur, $spt->pengesah_disposisi_inspektur);?>
                    </div>
                   </div>

                 </div>
                 <div class="form-group">
                   <label><h6>Upload File</h6></label>
                   <input type="file" class="form-control" name="notadinasfile" id="notadinasfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                   <a id="preview" href="<?php echo base_url()?>assets/files/notadinas/<?php echo $spt->notadinasfile.$spt->notadinasfile_type?>" target="_blank"/>File Nota dinas sebelumnya</a>
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
                    <?php echo form_input($tanggal_ttd_spt_inspektur, $spt->tanggal_ttd_spt_inspektur);?>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <label><h6>Inspektur *</h6></label>
                    <?php echo form_input($pengesah_spt_inspektur, $spt->pengesah_spt_inspektur);?>
                  </div>
                </div>

                  <div class="form-group">
                    <label><h6>Upload File</h6></label>
                    <input type="file" class="form-control" name="sptfile" id="sptfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                    <a href="<?php echo base_url()?>assets/files/notadinas/<?php echo $spt->sptfile.$spt->sptfile_type?>" target="_blank"/>File SPT sebelumnya</a>
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
                   <?php echo form_input($no_surat_keluar, $spt->no_surat_keluar);?>
                 </div>

                 <div class="col-md-12">
                 <label><h6>Perihal Surat Keluar *</h6></label>
                   <?php echo form_input($perihal_surat_keluar, $spt->perihal_surat_keluar);?>
                 </div>

                 <div class="col-md-6">
                 <label><h6>Tanggal Inspektur Mengetahui Surat Keluar *</h6></label>
                 <div class="input-group date">
                   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                   <?php echo form_input($tanggal_surat_keluar, $spt->tanggal_surat_keluar);?>
                 </div>
                 </div>

                 <div class="col-md-6">
                 <label><h6>Inspektur *</h6></label>
                   <?php echo form_input($pengesah_surat_keluar, $spt->pengesah_surat_keluar);?>
                 </div>
               </div>

                 <div class="form-group">
                    <label><h6>Upload File</h6></label>
                    <input type="file" class="form-control" name="suratkeluarfile" id="suratkeluarfile" onchange="tampilkanPreview(this,'preview')" disabled/>
                    <a href="<?php echo base_url()?>assets/files/notadinas/<?php echo $spt->suratkeluarfile.$spt->suratkeluarfile_type?>" target="_blank"/>File Surat keluar sebelumnya</a>
                 </div>
             </div><hr />
             </div>

              </div>

             </div>
           </div>
              <?php echo form_input($id_spt,$spt->id_spt);?>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
                <button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
              </div>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>

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
<!-- end icheck box-->

<!-- datepicker -->
<script>
  $(document).ready(function(){

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

    $('#tanggal_ttd_spt_inspektur').datepicker({
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
