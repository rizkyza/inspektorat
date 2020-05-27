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
              <label for="kode">Form Input Rekomendasi Temuan LHP</label>
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
                <?php echo form_input($kode_temuan, $temuan->kode_temuan);?>
              </div>
              <div class="form-group"><label>Judul Temuan</label>
                <?php echo form_input($judul_temuan, $temuan->judul_temuan);?>
              </div>


                  <div class="form-group"><label>Uraian Kondisi Temuan</label>
                    <?php echo form_textarea($kondisi, $temuan->kondisi);?>
                  </div>

                  <div class="form-group"><label>Kriteria Aturan</label>
                    <?php echo form_textarea($kriteria_aturan, $temuan->kriteria_aturan);?>
                  </div>

                  <div class="form-group"><label>Akibat</label>
                    <?php echo form_textarea($akibat, $temuan->akibat);?>
                  </div>

                  <div class="form-group"><label>Kode Sebab</label>
                    <?php echo form_input($kode_sebab, $temuan->kode_sebab);?>
                  </div>

                  <div class="form-group"><label>Sebab</label>
                    <?php echo form_textarea($sebab, $temuan->sebab);?>
                  </div>

                  <div class="form-group"><label>Tanggapan</label>
                    <?php echo form_textarea($tanggapan, $temuan->tanggapan);?>
                  </div>

                  <div class="form-group"><label>Komentar Tanggapan</label>
                    <?php echo form_textarea($komentar_tanggapan, $temuan->komentar_tanggapan);?>
                  </div>

                  <div class="form-group"><label>Nilai Temuan</label>
                    <?php echo form_input($nilai_temuan, $temuan->nilai_temuan);?>
                  </div><hr />

              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Entry Temuan LHP</b></div>
                <div class="panel-body">
                  <div class="box-body">

                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info">Tambah Rekomendasi</button>
                         <br /><br />
                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center" width="40%">Kode Rek.</th>
                                       <th style="text-align: center" width="50%">Uraian Rekomendasi</th>
                                       <th style="text-align: center" width="5%">Ubah</th>
                                       <th style="text-align: center" width="5%">Hapus</th>
                                   </tr>
                              </thead>
                         </table>
                    </div>
                  </div>
                </div>
             </div>
              <?php echo form_input($id_temuan,$temuan->id_temuan);?>
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
                          <h4 class="modal-title">Tambah Temuan LHP</h4>
                     </div>
                     <div class="modal-body">
                         <input type="hidden" name="no_lhpm" id="no_lhpm" class="form-control" readonly/>
                         <input type="hidden" name="id_temuanm" id="id_temuanm" class="form-control" readonly/>
                         <input type="hidden" name="no_temuanm" id="no_temuanm" class="form-control" readonly/>
                         <input type="hidden" name="judul_temuanm" id="judul_temuanm" class="form-control" readonly/>

                         <div class="box box-primary box-solid">
                           <div class="box-header with-border">
                             <label for="kode">Kode Rekomendasi</label>
                           </div>
                           <div class="box-body">
                             <div class="form-group">

                               <?php echo form_dropdown('', $get_combo_koder,'',$koder); ?>
                               <br />
                               <?php $subkoder['#'] = 'Pilih Sub Kode Rekomendasi'; ?>
                               <?php echo form_dropdown('', $subkoder, '#', $subkoder); ?>
                               <br />
                               <input type="text" name="kode_rekomendasi" id="kode_rekomendasi" class="form-control" readonly/>
                             </div>
                           </div>
                         </div>

                       <div class="form-group"><label>Uraian Rekomendasi</label>
                         <textarea type="text" name="uraian_rekomendasi" id="uraian_rekomendasi" class="form-control"/></textarea>
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('uraian_rekomendasi');


    CKEDITOR.replace('kondisi');
    CKEDITOR.replace('kriteria_aturan');
    CKEDITOR.replace('sebab');
    CKEDITOR.replace('akibat');
    CKEDITOR.replace('tanggapan');
    CKEDITOR.replace('komentar_tanggapan');

    CKEDITOR.config.skin = 'office2013';
    CKEDITOR.config.extraPlugins = 'justify,find,pastefromword,print,selectall,showblocks,table,tableresize,tableselection';
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!-- end CKeditor -->


<!-- Kode Rekomendasi-->
<script type="text/javascript">// <![CDATA[
  $(document).ready(function(){

    $('#koder').change(function(){ //any select change on the dropdown with id country trigger this code
      $("#subkoder > option").remove(); //first of all clear select items
      var kode = $('#koder').val(); // here we are taking country id of the selected one.

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/subkoderk/get_subkoderk/"+kode, //here we are calling our user controller and get_cities method with the country_id

        success: function(subkode) //we're calling the response json array 'cities'
        {

          $.each(subkode,function(id_subkode,subkode) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(id_subkode);
            //swal(id_subkode);
            opt.text(subkode);
            $('#subkoder').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });
        }
      });
    });

    $('#subkoder').change(function(){
      var subkode = $("#subkoder :selected").text();
      $("#kode_rekomendasi").val();
      $("#kode_rekomendasi").val(subkode);
    });

  });
</script>

<!-- validation modal -->
<script>

function setURL(url){
    document.getElementById('iframe').src = url;
}

</script>

 <script type="text/javascript" language="javascript" >

      $(document).ready(function(){
        $('#add_button').click(function(){
            var id_temuan = $("#id_temuan").val();
            var no_temuan = $("#no_temuan").val();
            var judul_temuan = $("#judul_temuan").val();

            if(id_temuan != ''){

            $('#user_form')[0].reset();
            $('.modal-title').text("Form Input Rekomendasi Temuan LHP");
            $('#action').val("Add");
            $('#no_lhpnm').val(no_lhp);
            $('#id_temuanm').val(id_temuan);
            $('#no_temuanm').val(no_temuan);
            $('#judul_temuanm').val(judul_temuan);
            }
            else
            {
              alert('Data ada yang belum terisi/lengkap');
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
            var id_temuan = $('#id_temuanm').val();
            var no_temuan = $('#no_temuanm').val();

            if(no_temuan != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/lhp_temuan_rekomendasi/user_action'?>",
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
                           swal('Data Rekomendasi', 'berhasil ditambah/ubah', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Inputan Rekomendasi Harus Lengkap");
            }
            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
       });

       $(document).on('click', '.update', function(){
            var id_rekomendasi = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(); ?>admin/lhp_temuan_rekomendasi/fetch_single_user",
                 method:"POST",
                 data:{id_rekomendasi:id_rekomendasi},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal').modal('show');
                      $('#no_lhpm').val(data.no_lhpm);
                      $('#id_temuanm').val(data.id_temuanm);
                      $('#no_temuanm').val(data.no_temuanm);
                      $('#judul_temuanm').val(data.judul_temuanm);
                      $('#kode_rekomendasi').val(data.kode_rekomendasi);
                      $('#rekomendasi').val(data.rekomendasi);
                      CKEDITOR.instances['uraian_rekomendasi'].setData(data.uraian_rekomendasi);

                      $('.modal-title').text("Edit Temuan");
                      $('#id_rekomendasi').val(id_rekomendasi);
                      $('#action').val("Edit");
                 }
            })
       });

       $(document).on('click', '.delete', function(){
            var id_rekomendasi = $(this).attr("id");
            if (confirm("Yakin data Rekomendasi dihapus?"))
            {
                $.ajax({
                  url:"<?php echo base_url() . 'admin/lhp_temuan_rekomendasi/delete_single_user' ?>",
                  method:"POST",
                  data:{id_rekomendasi:id_rekomendasi},
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
       var id_temuan = $('#id_temuan').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bFilter":false,
         "order":[],
         //"oLanguage": {
           //"sSearch": "No LHP:"
         //},
         //"oSearch": {
          // "sSearch": no_lhp
         //},
         "ajax":{
              url:"<?php echo base_url() . 'admin/lhp_temuan_rekomendasi/fetch_user'; ?>",
              data:{id_temuan:id_temuan},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[0, 1, 2],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });
  </script>


<?php $this->load->view('back/footer'); ?>
