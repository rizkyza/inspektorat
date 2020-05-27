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
              <div class="form-group"><label>No SPT</label>
                <?php echo form_input($no_spt, $spt->no_spt);?>
              </div>
              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban, $spt->nama_irban);?>
              </div>
              <div class="form-group"><label>Tanggal Tugas</label>
                <?php echo form_input($tanggal_tugas, $spt->tanggal_tugas);?>
              </div>
              <div class="panel panel-primary">
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
              <?php echo form_input($id_spt,$spt->id_spt);?>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
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
                          <?php echo form_dropdown('',$get_combo_auditor_by_irban,'',$nipcombo); ?>
                       </div>
                       <div class="form-group"><label>NIP</label>
                         <input type="text" name="nip" id="nip" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Nama Auditor</label>
                         <input type="text" name="nama" id="nama" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Jabatan</label>
                         <select type="text" name="jabatan" id="jabatan" class="form-control">
                           <option value="">Pilih Jabatan</option>
                           <option value="Ketua Tim">Ketua Tim</option>
                           <option value="Penanggung Jawab">Penanggung Jawab</option>
                           <option value="Pengendali Teknis">Pengendali Teknis</option>
                           <option value="Anggota">Anggota</option>
                         </select>
                       </div>

                          <input type="hidden" name="foto" id="foto" class="form-control" readonly/>

                          <input type="hidden" name="no_sptau" id="no_sptau" class="form-control" value="" readonly/>
                          <input type="hidden" name="nama_irbanau" id="nama_irbanau" class="form-control" value="" readonly/>
                          <input type="hidden" name="tanggal_tugasau" id="tanggal_tugasau" class="form-control" value="" readonly/>
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
