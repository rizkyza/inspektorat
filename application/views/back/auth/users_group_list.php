<?php if ($this->ion_auth->is_superadmin()){ ?>
<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title"><b>Data Group</b></h4>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive padding">
        <a href="<?php echo base_url('admin/auth/create_group') ?>">
          <button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Group Baru</button>
        </a>

        <h4 align="center"><?php echo $message ?></h4>

        <hr/>
        <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center">No.</th>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($groups as $group):?>
            <tr>
              <td style="text-align:center"><?php echo ++$start ?></td>
              <td style="text-align:center"><?php echo $group->name ?></td>
              <td style="text-align:center">
              <?php
              //echo anchor(site_url('admin/auth/edit_group/'.$group->id_group),'<i class="glyphicon glyphicon-pencil"></i>','title="Edit", class="btn btn-sm btn-warning"'); echo ' ';
              echo anchor(site_url('admin/auth/delete_group/'.$group->id_group),'<i class="glyphicon glyphicon-trash"></i>','title="Hapus", class="btn btn-sm btn-danger", onclick="javasciprt: return confirm(\'Apakah Anda yakin ?\')"');
              ?>
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
  $(document).ready(function () {
      $("#mytable").dataTable();
  });
</script>

<?php $this->load->view('back/footer'); ?>
<?php } else { ?>
<html lang="en"><head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
<style type="text/css"></style></head>
<body>
	<div id="container">
		<h1>404 Page Not Found</h1>
		<p>The page you requested was not found.</p>	</div>

</body></html>
<?php }?>
