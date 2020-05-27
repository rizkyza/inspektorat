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

    <div class="alert alert-info alert-dismissible fade in hidden" id="alertinfo">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>'<a id="infoalerta"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></a>'</div>

  </section>
  <section class="content">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <label for="kode">Tabel Data SPT</label>
      </div>
      <div class="panel-body">
      <div class="box-body table-responsive padding">
        <a href="<?php echo base_url('admin/spt/pkpt_list') ?>">
          <button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data SPT Baru</button>
          <a href="<?php echo base_url('admin/spt/report_data_spt');?>" target="_blank" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Lihat Data SPT</a>
        </a>

        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" width="5%">No.</th>
              <th style="text-align: center" width="5%">Tahun</th>
              <th style="text-align: center" width="10%">No SPT</th>
              <th style="text-align: center" width="30%">Objek</th>
              <th style="text-align: center" width="10%">Tanggal SPT</th>
              <th style="text-align: center" width="20%">Files</th>
              <th style="text-align: center" width="20%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($spt_data as $spt):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:left"><?php echo $spt->tahun ?></td>
              <td style="text-align:left"><?php echo $spt->no_spt ?></td>
              <td style="text-align:left"><?php echo $spt->nama_skpd ?></td>
              <td style="text-align:left"><?php echo $spt->tanggal_spt ?></td>
              <td style="text-align:left">
                <?php
                if(empty($spt->notadinasfile)) {echo "Tidak ada file.";}
                else { echo " <a href='".base_url()."assets/files/notadinas/".$spt->notadinasfile.$spt->notadinasfile_type."' width='100' target='_blank'>Nota Dinas </a><br /> ";}
                if(empty($spt->sptfile)) {echo "Tidak ada file.";}
                else { echo " <a href='".base_url()."assets/files/spt/".$spt->sptfile.$spt->sptfile_type."' width='100' target='_blank'>SPT </a><br /> ";}
                if(empty($spt->suratkeluarfile)) {echo "Tidak ada file.";}
                else { echo " <a href='".base_url()."assets/files/suratkeluar/".$spt->suratkeluarfile.$spt->suratkeluarfile_type."' width='100' target='_blank'>Surat Keluar </a> ";}
                ?>
              </td>
              <td style="text-align:center">
              <?php echo anchor(site_url('admin/spt/update/'.$spt->id_spt),'<i class="glyphicon glyphicon-pencil"> Update & Upload Berkas</i>','title="Edit", class="btn btn-sm btn-primary"'); echo ' '; ?>
              <?php if ($this->ion_auth->is_superadmin()): ?>
              <?php echo anchor(site_url('admin/spt/delete/'.$spt->id_spt),'<i class="glyphicon glyphicon-trash"></i>','title="Hapus", class="btn btn-sm btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"'); ?>
              <?php endif ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </section>
</div>


<script type="text/javascript">
var alertinfo = $('#infoalerta').html();

if (alertinfo == '')
{
} else if (alertinfo == 'Data berhasil dibuat'){
  swal(
    'Info',
    alertinfo,
    'success'
  )
} else if (alertinfo == 'Edit Data Berhasil'){
  swal(
    'Info',
    alertinfo,
    'success'
  )
} else{
  swal(
    'Alert',
    alertinfo,
    'error'
  )
}
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
</script>

<?php $this->load->view('back/footer'); ?>
