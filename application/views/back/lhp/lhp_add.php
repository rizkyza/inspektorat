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

    <div class="alert alert-info alert-dismissible fade in hidden" id="alertinfo">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>'<a id="infoalerta"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></a>'</div>

    <div class='row'>
      <?php echo form_open_multipart($action);?>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div>
        <!-- kolom kiri -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
              <h3><p class="text-muted m-b-30 font-13"><center>INSPEKTORAT PROVINSI KALIMANTAN SELATAN</center></p></h3>
              <h3 class="box-title m-b-0"><center>Entry Laporan Hasil Pemeriksaan</center></h3>

              <div id="wizspt" class="wizard">
                  <ul class="wizard-steps" role="tablist">
                      <li class="active" role="tab">
                          <h4><span>1</span>Periode LHP</h4> </li>
                      <li role="tab">
                          <h4><span>2</span>Detail LHP</h4> </li>
                  </ul>
                  <form id="validation" class="form-horizontal" onsubmit="return false;">
                  <div class="wizard-content">
                      <div class="wizard-pane active" role="tabpanel">
                         <div class="panel panel-primary">
                      <!-- Default panel contents -->
                         <div class="panel-heading"><b>Penentuan periode tahun LHP dan objek pemeriksaan</b></div>
                           <div class="panel-body">
                             <div class="box-body">

                               <div class="form-group"><label>Tahun Pemeriksaan</label>
                                 <?php echo form_input($tahun, $spt->tahun);?>
                               </div>
                               <div class="form-group"><label>No SPT</label>
                                 <?php echo form_input($no_spt, $spt->no_spt);?>
                               </div>
                               <div class="form-group"><label>Irbanwil</label>
                                 <?php echo form_input($nama_irban, $spt->nama_irban);?>
                               </div>
                               <div class="form-group"><label>SKPD</label>
                                 <?php echo form_input($skpd, $spt->nama_skpd);?>
                               </div>
                               <hr />

                              </div>
                            </div>
                          </div>
                        </div>
                      <div class="wizard-pane" role="tabpanel">
                           <div class="panel panel-primary">
                        <!-- Default panel contents -->
                           <div class="panel-heading"><b>Penginputan detail LHP</b></div>
                             <div class="panel-body">
                               <div class="box-body">

                                 <!-- No  LHP -->
                                 <div class="form-group"><label>No LHP <a class="text-warning">*</a></label>
                                   <?php echo form_input($no_lhp);?>
                                 </div>

                                 <!-- tanggal spt -->
                                 <div class="form-group"><label>Tanggal LHP <a class="text-warning">*</a></label>
                                   <div class="input-group date">
                                     <div class="input-group-addon">
                                       <span class="fa fa-calendar"></span>
                                      </div>
                                      <?php echo form_input($tanggal_lhp);?>
                                    </div>
                                  </div>
                                 <div class="box-footer">
                                   <button type="submit" name="submit" class="btn btn-info"><?php echo $button_submit ?></button>
                                   <button type="reset" name="reset" class="btn btn-warning"><?php echo $button_reset ?></button>
                                 </div>
                              </div>
                            </div>
                          </div>
                      </div>


              <?php echo form_input($id_spt,$spt->id_spt);?>

          </div>
        </form>
      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<script type="text/javascript">
var alertinfo = $('#infoalerta').html();

if (alertinfo == '')
{
}else{
  swal(
    'Alert',
    alertinfo,
    'error'
  )
}
</script>

<script type="text/javascript">
  var irban = $('#nama_irban').val();
  var idlhp = $('#id_spt').val();
    if (irban == 'Irbanwil 01') {
      var ibw = 'IBW.I';
    } else if (irban == 'Irbanwil 02') {
      var ibw = 'IBW.II';
    } else if (irban == 'Irbanwil 03') {
      var ibw = 'IBW.III';
    } else if (irban == 'Irbanwil 04') {
      var ibw = 'IBW.IV';
    };
  $('#no_lhp').val('700/'+idlhp+'/'+ibw+'/IP');
</script>

<!-- datepicker -->
<script>
  $(document).ready(function(){

    $('#tanggal_lhp').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

  });
</script>
<!-- End Datepicker -->

<script type="text/javascript" language="javascript" >

$(document).bind(“contextmenu”,function(e) {
 alert(‘@copyright Yourportfolio for your curiculum vitae , resume & your portfolio’)//silahkan tulis pesan yang akan ditampilkan
});

document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == ‘I’.charCodeAt(0)){
alert(‘@copyright Yourportfolio for your curiculum vitae , resume & your portfolio’)
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == ‘J’.charCodeAt(0)){
alert(‘@copyright Yourportfolio for your curiculum vitae , resume & your portfolio’)
return false;
}
if(e.ctrlKey && e.keyCode == ‘U’.charCodeAt(0)){
alert(‘@copyright Yourportfolio for your curiculum vitae , resume & your portfolio’)
return false;
}
}
</script>

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



            if(no_spt != '')
            {
            $('#user_form')[0].reset();
            $('.modal-title').text("Form pilih auditor");
            $('#action').val("Add");
            $('#user_uploaded_image').html('');
            $('#no_sptau').val(no_spt);
            $('#nama_irbanau').val(nama_irban);
            $('#tanggal_tugasau').val(tanggal_tugas);
            }
            else
            {
              alert('Data Tahun Periode | PKPT | No SPT | Tanggal SPT | Tanggal Tugas | Keperluan ada yang belum terisi/lengkap');
              $('#userModal').modal('toggle');
            };
       });

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

       $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var nip = $('#nipcombo').val();
            var nama = $('#nama').val();
            var jabatan = $('#jabatan').val();
            var nama_irban = $('#nama_irban').val();
            var no_spt = $('#no_spt').val();
            var tanggal_tugas = $('#tanggal_tugas').val();
            var foto = $('#foto').val();

            if(nip != '' && nama != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/spt/user_action'?>",
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
                           swal('Data auditor berhasil ditambah');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Pilihan data auditor dibutuhkan.");
            }
            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
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

       $("#user_data").dataTable().fnDestroy();
       var no_spt = $('#no_spt').val();
       var dataTable = $('#user_data').DataTable({
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
              url:"<?php echo base_url() . 'admin/sptauditor/fetch_user'; ?>",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[0, 1, 2, 4],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();



       $(document).on('click', '.update', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(); ?>admin/sptauditor/fetch_single_user",
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


  });
  </script>

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
                  swal("SUKSES", "Entry LHP telah sampai tahapan akhir");
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
