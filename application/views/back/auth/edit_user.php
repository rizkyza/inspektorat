<?php if ($this->ion_auth->is_superadmin()){ ?>
<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Cuci</li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <div id="infoMessage"></div>
      <?php echo form_open(uri_string());?>
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <?php echo $message;?>
              <div class="row">
                <div class="col-xs-6"><label>Nama</label>
                  <?php echo form_input($nama);?>
                </div>
                <div class="col-xs-6"><label>NIP</label>
                  <?php echo form_input($nip);?>
                </div>
              </div><br>
              <div class="row">
                <div class="col-xs-6"><label>Username</label>
                  <?php echo form_input($username);?>
                </div>
                <div class="col-xs-6"><label>Email</label>
                  <?php echo form_input($email);?>
                </div>
              </div><br>
              <div class="form-group"><label>No. HP</label>
                <?php echo form_input($phone);?>
              </div>
              <div class="form-group"><label>Alamat</label>
                <?php echo form_textarea($alamat);?>
              </div>
              <?php if ($this->ion_auth->is_superadmin()): ?>
              <div class="form-group"><label>Tipe user</label>
              <?php echo form_dropdown('',$get_all_users_group,$user->usertype,$usertype);?>
              </div>
              <?php endif ?>
              <div class="row">
                <div class="col-xs-6"><label>Password</label>
                  <?php echo form_input($password);?>
                </div>
                <div class="col-xs-6"><label>Konfirmasi Password</label>
                  <?php echo form_input($password_confirm);?>
                </div>
              </div>
              <?php echo form_hidden('id', $user->id);?>
              <?php echo form_hidden($csrf); ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
              <button type="reset" name="reset" class="btn btn-danger">Reset</button>
            </div>
          </div><!-- /.box -->
          <!-- left column -->
        </div>
      <?php echo form_close(); ?>
    </div>
  </section>
</div>

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
