<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
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
        <!-- kolom kiri -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">

            <div class="form-group">
            <?php $kode['#'] = 'Please Select'; ?>
            <label for="kode">Kode </label>
            <?php echo form_dropdown('', $get_combo_kode,'',$kode); ?>
            </div>

            <div class="form-group">
            <?php $subkode['#'] = 'Pilih Sub kode Temuan'; ?>
            <label for="subkode">Sub Kode: </label>
            <?php echo form_dropdown('subkode', $subkode, '#', 'id="subkode" class="form-control"'); ?>
            </div>

            <div class="form-group">
            <label for="kode">Sub Subkode Temuan</label>
            <?php echo form_input($subsubkode); ?>
            </div>

            <div class="form-group">
            <label for="kode">Keterangan </label>
            <?php echo form_input($keterangan); ?>
            </div>

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

<script type="text/javascript">// <![CDATA[
  $(document).ready(function(){
    $('#kode').change(function(){ //any select change on the dropdown with id country trigger this code
      $("#subkode > option").remove(); //first of all clear select items
      var kode = $('#kode').val(); // here we are taking country id of the selected one.
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/subsubkode/get_subkode/"+kode, //here we are calling our user controller and get_cities method with the country_id

        success: function(subkode) //we're calling the response json array 'cities'
        {
          $.each(subkode,function(id_subkode,subkode) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(subkode);
            opt.text(subkode);
            $('#subkode').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });
        }
      });
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
