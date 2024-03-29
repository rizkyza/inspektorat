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
    <div class="box box-primary">
      <div class="box-body table-responsive padding">
        <a href="<?php echo base_url('admin/spt/create') ?>">
          <button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data SPT Baru</button>
        </a>

        <h4 align="center"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h4>

        <hr/>
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center" >No.</th>
              <th style="text-align: center">Tahun</th>
              <th style="text-align: center">No SPT</th>
              <th style="text-align: center">Objek</th>
              <th style="text-align: center">Tanggal SPT</th>
              <th style="text-align: center">Tanggal Tugas</th>
              <th style="text-align: center">Files</th>
              <th style="text-align: center">Status</th>
              <th style="text-align: center">Aksi</th>
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
              <td style="text-align:left"><?php echo $spt->tanggal_tugas ?></td>
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
              <td style="text-align:left"><?php echo $spt->status ?></td>
              <td style="text-align:center">
              <?php echo anchor(site_url('admin/spt/update/'.$spt->id_spt),'<i class="glyphicon glyphicon-pencil"></i>','title="Edit", class="btn btn-sm btn-warning"'); echo ' '; ?>
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
  </section>
</div>

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
