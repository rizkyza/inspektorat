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
  <section class="content">

    <div class="alert alert-info alert-dismissible fade in hidden" id="alertinfo">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>'<a id="infoalerta"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></a>'</div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <label for="kode">Table SPT (Input PKP)</label>
      </div>
      <div class="box-body table-responsive padding">

        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" >No.</th>
              <th style="text-align: center">Tahun</th>
              <th style="text-align: center">No SPT</th>
              <th style="text-align: center">Objek</th>
              <th style="text-align: center">Tanggal SPT</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($pkp_data as $spt):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $spt->tahun ?></td>
              <td style="text-align:left"><?php echo $spt->no_spt ?></td>
              <td style="text-align:left"><?php echo $spt->nama_skpd ?></td>
              <td style="text-align:left"><?php echo $spt->tanggal_spt ?></td>
              <td style="text-align:center">
                <button type="button" name="update" id="<?php echo $spt->no_spt ?>" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-list-alt"></i></button>
                <?php echo anchor(site_url('admin/pkp/create/'.$spt->id_spt),'<i class="glyphicon glyphicon-pencil"></i>','title="Isi PKP", class="btn btn-sm btn-primary"'); echo ' '; ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
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
                         <input type="text" name="no_pkp" id="no_pkp" class="form-control" readonly/>
                       </div>

                       <div class="form-group"><label>SOPD</label>
                         <input type="text" name="skpdm" id="skpdm" class="form-control" readonly/>
                       </div>

                       <div class="form-group"><label>Tahun</label>
                         <input type="text" name="tahunm" id="tahunm" class="form-control" readonly/>
                       </div>

                       <div class="form-group"><label>Kegiatan</label>
                         <input type="text" name="kegiatanm" id="kegiatanm" class="form-control" readonly/>
                       </div>

                       <div class="panel panel-primary">
                         <div class="panel-heading">
                           <label for="kode">Table PKP</label>
                         </div>
                           <div class="box-body table-responsive padding">
                           <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                     <tr>
                                         <th style="text-align: center" width="15%">No Langkah Kerja</th>
                                         <th style="text-align: center" width="40%">Langkah Kerja</th>
                                         <th style="text-align: center" width="15%">Dilaksanakan</th>
                                         <th style="text-align: center" width="10%">Waktu Pemeriksaan</th>
                                         <th style="text-align: center" width="15%">No KKP</th>
                                     </tr>
                                </thead>
                           </table>
                         </div>
                       </div>

                     </div>
                     <div class="modal-footer">
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

<script type="text/javascript" language="javascript" >
       $(document).on('click', '.update', function(){
         var no_spt = $(this).attr("id");

            $.ajax({
                 url:"<?php echo base_url(). 'admin/pkp/fetch_single_user_by_nospt'?>",
                 method:"POST",
                 data:{no_spt:no_spt},
                 dataType:"json",
                 success:function(data)
                 {
                    if (data.no_pkp == ''){
                      alert('wew');
                    } else {
                      $('#userModal').modal('show');
                      $('#no_pkp').val(data.no_pkp);
                      $('#skpdm').val(data.nama_skpd);
                      $('#tahunm').val(data.tahun);
                      $('#kegiatanm').val(data.kegiatan);
                      $('.modal-title').text("Detail PKP");

                      $("#user_data").dataTable().fnDestroy();
                      var dataTable = $('#user_data').DataTable({
                        "processing":false,
                        "serverSide":true,
                        "keys":    true,
                        "bFilter": false,
                        "order":[],

                        "ajax":{
                             url:"<?php echo base_url() . 'admin/pkp/fetch_user_by_nospt'; ?>",
                             data:{no_spt:no_spt},
                             dataType:"JSON",
                             type:"POST",

                             error: function (jqXHR, textStatus, errorThrown)
                             {
                                  $('#userModal').modal('hide');
                                  swal('Alert','Data PKP belum ada','error');
                             }
                        },

                      });
                    }
                 }
            });
         table.fnReloadAjax();
      });
</script>

<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
function confirmDialog() {
 return confirm('Apakah anda yakin?')
}
  $('#datatable').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "aaSorting": [[0,'desc']],
    "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
  });
  $('#datatable2').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "aaSorting": [[0,'desc']],
    "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
  });
</script>

<?php $this->load->view('back/footer'); ?>
