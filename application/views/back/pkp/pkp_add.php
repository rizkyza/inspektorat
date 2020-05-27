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
                <?php echo form_input($tahun, $spt->tahun);?>
              </div>

              <div class="form-group"><label>No SPT</label>
                <?php echo form_input($id_spt,$spt->id_spt);?>
                <?php echo form_input($no_spt, $spt->no_spt);?>
              </div>

              <div class="form-group"><label>SOPD</label>
                <?php echo form_input($nama_skpd, $spt->nama_skpd);?>
              </div>

              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban, $spt->nama_irban);?>
              </div>

              <div class="form-group"><label>Ketua Tim</label>
                <?php echo form_input($ketua_tim, $nama);?>
              </div>

              <div class="form-group"><label>Tanggal SPT</label>
                <?php echo form_input($tanggal_spt, $spt->tanggal_spt);?>
              </div>

              <div class="form-group"><label>Kegiatan Pemeriksaan</label>
                <input type="text" name="kegiatan" id="kegiatan" class="form-control" value="Reguler"/>
              </div>

              <div class="form-group"><label>No PKP</label>
                <input type="text" name="no_pkph" id="no_pkph" class="form-control" />
              </div>

              <hr />

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <label for="kode">Table susunan tim auditor</label>
                </div>
                <div class="box-body table-responsive padding">
                  <table id="datatabletim" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th style="text-align: center" >No</th>
                        <th style="text-align: center" >Foto</th>
                        <th style="text-align: center" >NIP</th>
                        <th style="text-align: center" >Nama</th>
                        <th style="text-align: center" >Jabatan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $start = 0; foreach ($tim_data as $tim):?>
                      <tr>
                        <td style="text-align:center"><?php echo ++$start ?></td>
                        <?php if($tim->foto != ''){ ?>
                             <td style="text-align:center"><img src="<?php echo base_url(); ?>assets/images/auditor/<?php echo $tim->foto ?>" class="img-thumbnail" width="50" height="35" />
                        <? } else { ?>
                             <td style="text-align:center"><img src="<?php echo base_url(); ?>assets/images/no_image_thumb.png" class="img-thumbnail" width="50" height="35" />
                        <? } ?>
                        <td style="text-align:left"><?php echo $tim->nip ?></td>
                        <td style="text-align:left"><?php echo $tim->nama ?></td>
                        <td style="text-align:left"><?php echo $tim->jabatan ?></td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="panel panel-primary">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Tabel PKP</b></div>
                <div class="panel-body">
                  <div class="box-body">

                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info">Tambah kegiatan PKP</button>
                         <br /><br /><hr/>
                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                       <th style="text-align: center">No Langkah Kerja</th>
                                       <th style="text-align: center">Langkah Kerja</th>
                                       <th style="text-align: center">Dilaksanakan</th>
                                       <th style="text-align: center">Waktu Pemeriksaan</th>
                                       <th style="text-align: center">No KKP</th>
                                       <th style="text-align: center">Tahun</th>
                                       <th style="text-align: center">Kegiatan</th>
                                       <th style="text-align: center">Ubah</th>
                                       <th style="text-align: center">Hapus</th>
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

<div id="userModal" class="modal fade ">
      <div class="modal-dialog modal-lg" >
           <form method="post" id="user_form">
                <div class="modal-content">
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Kegiatan PKP</h4>
                     </div>
                     <div class="modal-body">
                       <div class="form-group"><label>No PKP</label>
                         <input type="text" name="no_pkp" id="no_pkp" class="form-control"/>
                       </div>

                         <div class="box box-primary box-solid">
                           <div class="box-header with-border">
                             <label for="kode">Data Auditor</label>
                           </div>
                           <div class="box-body">
                             <div class="form-group"><label>Pilih Auditor <a class="text-warning">*</a></label>
                                <?php echo form_dropdown('',$get_combo_tim_auditor,'',$nipcombo); ?>
                             </div>
                             <div class="form-group"><label>NIP</label>
                               <input type="text" name="nip" id="nip" class="form-control" readonly/>
                             </div>
                             <div class="form-group"><label>Nama Auditor</label>
                               <input type="text" name="nama" id="nama" class="form-control" readonly/>
                             </div>
                           </div>
                         </div>

                       <div class="form-group"><label>No Langkah Kerja</label>
                         <input type="text" name="no_langkah_kerja" id="no_langkah_kerja" class="form-control" />
                       </div>

                       <div class="form-group"><label>Langkah Kerja</label>
                         <textarea type="text" name="langkah_kerja" id="langkah_kerja" class="form-control"/></textarea>
                       </div>

                       <div class="form-group"><label>Waktu Pemeriksaan (hari)</label>
                         <input type="text" name="hari" id="hari" class="form-control" />
                       </div>

                       <div class="form-group"><label>No KKP</label>
                         <input type="text" name="no_kkp" id="no_kkp" class="form-control" />
                       </div>

                       <input type="hidden" name="id_pkp" id="id_pkp" readonly/>
                       <input type="hidden" name="id_sptm" id="id_sptm" class="form-control" readonly/>
                       <input type="hidden" name="no_sptm" id="no_sptm" class="form-control" readonly/>
                       <input type="hidden" name="skpdm" id="skpdm" class="form-control" readonly/>
                       <input type="hidden" name="tahunm" id="tahunm" class="form-control" readonly/>
                       <input type="hidden" name="kegiatanm" id="kegiatanm" class="form-control" readonly/>
                       <input type="hidden" name="foto" id="foto" class="form-control" readonly/>

                     </div>
                     <div class="modal-footer">
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

<script type="text/javascript">
  var irban = $('#nama_irban').val();
  var idpkp = $('#id_spt').val();
  var year = new Date().getFullYear();
    if (irban == 'Irbanwil 01') {
      var ibw = 'IBW.I';
    } else if (irban == 'Irbanwil 02') {
      var ibw = 'IBW.II';
    } else if (irban == 'Irbanwil 03') {
      var ibw = 'IBW.III';
    } else if (irban == 'Irbanwil 04') {
      var ibw = 'IBW.IV';
    };
  $('#no_pkph').val('700/'+idpkp+'/'+ibw+'/'+year);
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

<!-- CKeditor -->
<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('langkah_kerja');

    CKEDITOR.config.skin = 'office2013';
    CKEDITOR.config.extraPlugins = 'justify,find,pastefromword,print,selectall,showblocks,table,tableresize,tableselection';
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!-- end CKeditor -->

<!-- validation modal -->
<script>
function setURL(url){
    document.getElementById('iframe').src = url;
}
</script>

<script type="text/javascript" language="javascript" >

      $(document).ready(function(){
        $('#add_button').click(function(){
            var id_spt = $("#id_spt").val();
            var no_spt = $("#no_spt").val();
            var tahun = $("#tahun").val();
            var kegiatan = $("#kegiatan").val();
            var skpd = $("#nama_skpd").val();

            if(no_spt != ''){
              $('#user_form')[0].reset();
              $('#id_sptm').val(id_spt);
              $('#no_sptm').val(no_spt);
              $('#tahunm').val(tahun);
              $('#kegiatanm').val(kegiatan);
              $('#skpdm').val(skpd);
              $('.modal-title').text("Form Input PKP");
              $('#action').val("Add");
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
            var id_spt = $('#id_sptm').val();
            var no_spt = $('#no_sptm').val();
            var no_pkp = $('#no_pkp').val();
            var no_langkah_kerja = $('#no_langkah_kerja').val();
            var langkah_kerja = $('#langkah_kerja').val();
            var hari = $('#hari').val();
            var no_kkp = $('#no_kkp').val();


            if(no_pkp != '' && no_langkah_kerja != '' && langkah_kerja != '' && hari != '' && no_kkp != '')
            {
                 $.ajax({
                      url:"<?php echo base_url() . 'admin/pkp/user_action'?>",
                      method:'POST',
                      data: new FormData(this),
                      contentType:false,
                      processData:false,
                      success:function(data)
                      {
                           $('#user_form')[0].reset();
                           $('#userModal').modal('hide');
                           dataTable.ajax.reload();
                           swal('Data PKP', 'berhasil ditambah/ubah', 'success');
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                           alert('Error adding / update data');
                      }
                 });

            }
            else
            {
                 swal("Alert","Inputan PKP Harus Lengkap","error");
            }
            var table = $('#user_data').dataTable();
            table.fnReloadAjax();
       });

       $(document).on('click', '.update', function(){
            var id_pkp = $(this).attr("id");
            $.ajax({
                 url:"<?php echo base_url(). 'admin/pkp/fetch_single_user'?>",
                 method:"POST",
                 data:{id_pkp:id_pkp},
                 dataType:"json",
                 success:function(data)
                 {
                      $('#userModal').modal('show');
                      $('#id_sptm').val(data.id_sptm);
                      $('#no_sptm').val(data.no_sptm);
                      $('#no_pkp').val(data.no_pkp);
                      $('#nip').val(data.nip);
                      $('#nama').val(data.nama);
                      $('#nama_skpd').val(data.nama_skpd);
                      $('#no_langkah_kerja').val(data.no_langkah_kerja);
                      CKEDITOR.instances['langkah_kerja'].setData(data.langkah_kerja);
                      $('#hari').val(data.hari);
                      $('#no_kkp').val(data.no_kkp);

                      $('.modal-title').text("Form Edit PKP");
                      $('#id_pkp').val(id_pkp);
                      $('#action').val("Edit");
                 }
            })
       });

       $(document).on('click', '.delete', function(){
            var id_pkp = $(this).attr("id");
            if (confirm("Yakin data PKP dihapus?"))
            {
                $.ajax({
                  url:"<?php echo base_url() . 'admin/pkp/delete_single_user' ?>",
                  method:"POST",
                  data:{id_pkp:id_pkp},
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

       $("#user_data").dataTable().fnDestroy();
       var id_spt = $('#id_spt').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bAutoWidth": false,
         "scrollX": true,
         "bFilter": false,
         "order":[],

         "ajax":{
              url:"<?php echo base_url() . 'admin/pkp/fetch_user'; ?>",
              data:{id_spt:id_spt},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[7, 8],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });dataTable.ajax.reload();
  </script>

  <script type="text/javascript">
  function confirmDialog() {
   return confirm('Apakah anda yakin?')
  }
    $('#datatabletim').dataTable({
      "bPaginate": false,
      "bLengthChange": true,
      "bFilter": false,
      "bSort": true,
      "bInfo": false,
      "bAutoWidth": false,
      "aaSorting": [[0,'desc']],
      "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]],
      "columnDefs":[
           {
                "targets":[0,1,2,3,4],
                "orderable":true,
           }
      ],
    });

</script>



<?php $this->load->view('back/footer'); ?>
