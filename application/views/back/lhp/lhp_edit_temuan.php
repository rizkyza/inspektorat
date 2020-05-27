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
          <div class="panel panel-primary">
            <div class="panel-heading">
              <label for="kode">Form Input Temuan LHP</label>
            </div>
            <div class="panel-body">
            <div class="box-body">
              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Entry Temuan LHP</b></div>
              <div class="panel-body">
              <div class="box-body">
                <div class="form-group"><label>No SPT</label>
                  <?php echo form_input($no_spt, $lhp->no_spt);?>
                  <?php echo form_input($id_spt,$lhp->id_spt);?>
                </div>
              <div class="form-group"><label>No LHP</label>
                <?php echo form_input($no_lhp, $lhp->no_lhp);?>
              </div>
              <div class="form-group"><label>Tahun</label>
                <?php echo form_input($tahun, $lhp->tahun);?>
              </div>
              <div class="form-group"><label>Tanggal LHP</label>
                <?php echo form_input($tanggal_lhp, $lhp->tanggal_lhp);?>
              </div>
              <div class="form-group"><label>SKPD</label>
                <?php echo form_input($skpd, $lhp->skpd);?>
              </div>
              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban, $lhp->nama_irban);?>
              </div><hr />
              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Tabel KKP</b></div>
                <div class="panel-body">
                  <div class="box-body">
                        <table id="user_data_kkp" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center">Auditor</th>
                                       <th style="text-align: center">tanggal KKP</th>
                                       <th style="text-align: center">Judul Temuan</th>
                                       <th style="text-align: center">kondisi Temuan</th>
                                       <th style="text-align: center">Lampiran</th>
                                       <th style="text-align: center">Input Temuan</th>
                                   </tr>
                              </thead>
                         </table>
                       </div>
                    </div>
                  </div>
              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Entry Temuan P2HP</b></div>
                <div class="panel-body">
                  <div class="box-body">

                    <!-- <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info">Tambah Temuan</button> -->
                    <a href="<?php echo base_url('admin/lhp_temuan/report_temuan_lhp/'.$lhp->id_lhp);?>" target="_blank" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Lihat Data Temuan LHP</a>
                         <br /><br />
                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center" width="12%">Uploader</th>
                                       <th style="text-align: center" width="12%">No Temuan</th>
                                       <th style="text-align: center" width="15%">Kode Temuan</th>
                                       <th style="text-align: center" width="40%">Judul Temuan</th>
                                       <th style="text-align: center" width="15%">Nilai Temuan</th>
                                       <th style="text-align: center" width="3%">Laporan</th>
                                       <th style="text-align: center" width="5%">Rekomendasi</th>
                                       <th style="text-align: center" width="5%">Ubah</th>
                                       <th style="text-align: center" width="5%">Hapus</th>
                                   </tr>
                              </thead>
                         </table>
                       </div>
                    </div>
                  </div>
                </div>
             </div>
           </div>
         </div>
              <?php echo form_input($id_lhp,$lhp->id_lhp);?>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<div id="userModal" class="modal fade">
      <div class="modal-dialog modal-lg" >
           <form method="post" id="user_form">
                <div class="modal-content">
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Temuan LHP</h4>
                     </div>
                     <div class="modal-body">
                       <div class="form-group"><label>No LHP</label>
                         <input type="text" name="no_lhpm" id="no_lhpm" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Judul Temuan</label>
                         <input type="text" name="judul_temuan" id="judul_temuan" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Uraian Kondisi</label>
                         <textarea type="text" name="kondisi" id="kondisi" class="form-control" readonly/></textarea>
                       </div>

                       <div class="box box-primary box-solid">
                         <div class="box-header with-border">
                           <label for="kode">Kode Temuan</label>
                         </div>

                         <div class="box-body">
                           <div class="form-group">

                             <?php echo form_dropdown('', $get_combo_kode,'',$kode); ?>
                             <br />
                             <?php $subkode['#'] = 'Pilih Sub kode Temuan'; ?>
                             <?php echo form_dropdown('', $subkode, '#', $subkode); ?>
                             <br />
                             <?php $subsubkode['#'] = 'Pilih Sub Child kode Temuan'; ?>
                             <?php echo form_dropdown('', $subsubkode, '#', $subsubkode); ?>
                             <br />
                             <input type="text" name="kode_temuan" id="kode_temuan" class="form-control" readonly/>
                           </div>
                         </div>
                       </div>


                       <div class="form-group"><label>Kriteria Aturan</label>
                         <textarea type="text" name="kriteria_aturan" id="kriteria_aturan" class="form-control"/></textarea>
                       </div>
                       <hr />
                       <div class="form-group"><label>Akibat</label></label>
                         <textarea type="text" name="akibat" id="akibat" class="form-control"/></textarea>
                       </div>
                       <div class="box box-primary box-solid">
                         <div class="box-header with-border">
                           <label for="kode">Kode Sebab</label>
                         </div>
                         <div class="box-body">
                           <div class="form-group">

                             <?php echo form_dropdown('', $get_combo_kodes,'',$kodes); ?>
                             <br />
                             <?php $subkodes['#'] = 'Pilih Sub Kode Sebab'; ?>
                             <?php echo form_dropdown('', $subkodes, '#', $subkodes); ?>
                             <br />
                             <?php $subsubkodes['#'] = 'Pilih Sub Child Kode Sebab'; ?>
                             <?php echo form_dropdown('', $subsubkodes, '#', $subsubkodes); ?>
                             <br />
                             <input type="text" name="kode_sebab" id="kode_sebab" class="form-control" readonly/>
                           </div>
                         </div>
                       </div>

                       <div class="form-group"><label>Sebab</label>
                         <textarea type="text" name="sebab" id="sebab" class="form-control"/></textarea>
                       </div>
                       <div class="form-group"><label>Tanggapan</label>
                         <textarea type="text" name="tanggapan" id="tanggapan" class="form-control"/></textarea>
                       </div>
                       <div class="form-group"><label>Komentar Tanggapan</label>
                         <textarea type="text" name="komentar_tanggapan" id="komentar_tanggapan" class="form-control"/></textarea>
                       </div>
                       <div class="form-group"><label>Nilai Temuan</label>
                         <input type="number" name="nilai_temuan" id="nilai_temuan" class="form-control"/>
                       </div>

                     </div>
                     <div class="modal-footer">
                          <input type="hidden" name="id_temuan" id="id_temuan" />
                          <input type="hidden" name="id_kkp" id="id_kkp" />
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                </div>
           </form>
      </div>
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

 <!-- CKeditor -->
 <script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 <script>
   $(function () {
     CKEDITOR.replace('kondisi');
     CKEDITOR.replace('kriteria_aturan');
     CKEDITOR.replace('sebab');
     CKEDITOR.replace('akibat');
     CKEDITOR.replace('tanggapan');
     CKEDITOR.replace('komentar_tanggapan');

     CKEDITOR.config.skin = 'office2013';
     CKEDITOR.config.extraPlugins = 'justify,find,pastefromword,print,selectall,showblocks,table,tableresize,tableselection';

     $(".textarea").wysihtml5();
   });
 </script>
 <!-- end CKeditor -->

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


<!-- Kode Temuan-->
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
            opt.val(id_subkode);
            opt.text(subkode);
            $('#subkode').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });
        }
      });
    });

    $('#subkode').change(function(){ //any select change on the dropdown with id country trigger this code
      $("#subsubkode > option").remove(); //first of all clear select items
      var subkode = $('#subkode').val(); // here we are taking country id of the selected one.
      //swal(subsubkode);


      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/subsubkode/get_subsubkode/"+subkode, //here we are calling our user controller and get_cities method with the country_id

        success: function(subsubkode) //we're calling the response json array 'cities'
        {

          $.each(subsubkode,function(id_subsubkode,subsubkode) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(id_subsubkode);
            opt.text(subsubkode);
            $('#subsubkode').append(opt); //here we will append these new select options to a dropdown with the id 'cities'

          });

        }
      });
    });

    $('#subsubkode').change(function(){
      var subsubkode = $("#subsubkode :selected").text();
      $("#kode_temuan").val();
      $("#kode_temuan").val(subsubkode);
    });

  });
</script>

<!-- Kode sebab-->
<script type="text/javascript">// <![CDATA[
  $(document).ready(function(){

    $('#kodes').change(function(){ //any select change on the dropdown with id country trigger this code
      $("#subkodes > option").remove(); //first of all clear select items
      var kode = $('#kodes').val(); // here we are taking country id of the selected one.
      //swal(kode);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/subsubkodepk/get_subkodepk/"+kode, //here we are calling our user controller and get_cities method with the country_id

        success: function(subkode) //we're calling the response json array 'cities'
        {

          $.each(subkode,function(id_subkode,subkode) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(id_subkode);
            //swal(subkode);
            opt.text(subkode);
            $('#subkodes').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });
        }
      });
    });

    $('#subkodes').change(function(){ //any select change on the dropdown with id country trigger this code
      $("#subsubkodes > option").remove(); //first of all clear select items
      var subkode = $('#subkodes').val(); // here we are taking country id of the selected one.
      //swal(subkode);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/subsubkodepk/get_subsubkodepk/"+subkode, //here we are calling our user controller and get_cities method with the country_id

        success: function(subsubkode) //we're calling the response json array 'cities'
        {
          $.each(subsubkode,function(id_subsubkode,subsubkode) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(id_subsubkode);
            opt.text(subsubkode);
            $('#subsubkodes').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });

        }
      });
    });

    $('#subsubkodes').change(function(){
      var subsubkode = $("#subsubkodes :selected").text();
      $("#kode_sebab").val();
      $("#kode_sebab").val(subsubkode);
    });

  });
</script>

<!-- validation modal -->
 <script type="text/javascript" language="javascript" >

      $(document).ready(function(){
        $(document).on('click', '.add_button', function(){
          var id_kkp = $(this).attr("id");
          var no_lhp = $("#no_lhp").val();

          $.ajax({
               url:"<?php echo base_url(); ?>admin/lhp_temuan/fetch_single_user_kkp",
               method:"POST",
               data:{id_kkp:id_kkp},
               dataType:"json",
               success:function(data)
               {
                 if (data.status_kkp != 'sudah dibuat'){
                 //alert(data.status_kkp);
                    $('#user_form')[0].reset();
                    $('#userModal').modal('show');

                    $('#no_lhpm').val(no_lhp);
                    $('#judul_temuan').val(data.temuan);
                    $('#id_kkp').val(data.id_kkp);
                     CKEDITOR.instances['kondisi'].setData(data.kondisi_temuan);
                    $('.modal-title').text("Form Input Temuan LHP");
                    $('#action').val("Add");
                 } else {
                   $('#user_form')[0].reset();
                   $('#userModal').modal('hide');
                   swal('Alert','Data Temuan sudah dibuat','error');
                 }
               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                 swal(
                   'Alert',
                   'Anda dilarang mengubah temuan yang bukan dari inputan temuan anda di LHP ini.',
                   'error'
                 )
               }
          })

       });

       $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            var judul_temuan = $('#judul_temuan').val();
            var no_lhp = $("#no_lhpm").val();

            if(judul_temuan != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/lhp_temuan/user_action'?>",
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
                           CKEDITOR.instances['kondisi'].setData();
                           CKEDITOR.instances['kriteria_aturan'].setData();
                           CKEDITOR.instances['sebab'].setData();
                           CKEDITOR.instances['akibat'].setData();
                           CKEDITOR.instances['tanggapan'].setData();
                           CKEDITOR.instances['komentar_tanggapan'].setData();
                           swal('Data Temuan', 'berhasil ditambah/ubah', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Inputan Temuan Harus Lengkap");
            }
            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
       });

       $(document).on('click', '.update', function(){
            var id_temuan = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(); ?>admin/lhp_temuan/fetch_single_user",
                 method:"POST",
                 data:{id_temuan:id_temuan},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal').modal('show');
                      $('#no_lhpm').val(data.no_lhpm);
                      $('#no_temuan').val(data.no_temuan);
                      $('#kode_temuan').val(data.kode_temuan);
                      $('#judul_temuan').val(data.judul_temuan);
                      CKEDITOR.instances['kondisi'].setData(data.kondisi);
                      CKEDITOR.instances['kriteria_aturan'].setData(data.kriteria_aturan);
                      $('#kode_sebab').val(data.kode_sebab);
                      CKEDITOR.instances['sebab'].setData(data.sebab);
                      CKEDITOR.instances['akibat'].setData(data.akibat);
                      CKEDITOR.instances['tanggapan'].setData(data.tanggapan);
                      CKEDITOR.instances['komentar_tanggapan'].setData(data.komentar_tanggapan);
                      $('#nilai_temuan').val(data.nilai_temuan);

                      $('.modal-title').text("Edit Temuan");
                      $('#id_temuan').val(id_temuan);
                      $('#action').val("Edit");
                 },
                 error: function (jqXHR, textStatus, errorThrown)
                 {
                   swal(
                     'Alert',
                     'Anda dilarang mengubah temuan yang bukan dari inputan temuan anda di LHP ini.',
                     'error'
                   )
                 }
            })
       });

       $(document).on('click', '.delete', function(){
            var id_temuan = $(this).attr("id");
            if (confirm("Yakin data Temuan dihapus?"))
            {
                $.ajax({
                  url:"<?php echo base_url() . 'admin/lhp_temuan/delete_single_user' ?>",
                  method:"POST",
                  data:{id_temuan:id_temuan},
                  dataType:"json",
                  success:function(data,status)
                  {
                    if (data.status!='error') {
                      var table = $('#user_data').dataTable();
                      table.fnReloadAjax();
                      swal(
                        'Info',
                        'Data telah dihapus.',
                        'success'
                      )
                    } else {
                      swal(
                        'Alert',
                        'Anda dilarang menghapus temuan yang bukan dari inputan temuan anda di LHP ini.',
                        'error'
                      )
                    }
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

       $("#user_data_kkp").dataTable().fnDestroy();
       var no_spt = $('#no_spt').val();
       var dataTable = $('#user_data_kkp').DataTable({
         "processing":true,
         "serverSide":true,
         "bFilter":false,
         "order":[],
         "ajax":{
              url:"<?php echo base_url() . 'admin/lhp_temuan/fetch_user_kkp'; ?>",
              data:{no_spt:no_spt},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[5],
                   "orderable":false,
                   "className": 'text-center'
              }
         ],
       });

       $("#user_data").dataTable().fnDestroy();
       var no_lhp = $('#no_lhp').val();
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
              url:"<?php echo base_url() . 'admin/lhp_temuan/fetch_user'; ?>",
              data:{no_lhp:no_lhp},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[4, 5, 6, 7],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });
  </script>

<?php $this->load->view('back/footer'); ?>
