<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/plugins/images/favicon.png">
<title>Inspektorat Kalimantan Selatan - Login</title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>assets/template/backend/ampleadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url()?>assets/template/backend/ampleadmin/css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="<?php echo base_url()?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!--alerts CSS -->
<link href="<?php echo base_url()?>assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Custom CSS -->
<link href="<?php echo base_url()?>assets/template/backend/ampleadmin/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url()?>assets/template/backend/ampleadmin/css/colors/default.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
            <div class="lg-info-panel">
              <div class="inner-panel">
                  <a href="javascript:void(0)" class="p-20 di"></a>
                  <div class="lg-content">
                      <h2>INSPEKTORAT KALIMANTAN SELATAN</h2>
                      <p class="text-muted">Website e-LHP inspektur pembantu wilayah provinsi kalimantan selatan. </p>
                      <a href="#" class="btn btn-rounded btn-info p-l-20 p-r-20"> Kembali ke Homepage</a>
                  </div>
              </div>
            </div>

              <div class="new-login-box">
                <div class="white-box">
                  <div id="infoMessage"><?php echo $message;?></div>
                  <?php echo form_open("admin/auth/login");?>
                    <h3 class="box-title m-b-0">Sign In to Admin</h3>
                    <small>Masukkan detail anda dibawah</small>
                  <form class="form-horizontal new-lg-form" id="loginform" action="#">

                    <div class="form-group  m-t-20">
                      <div class="col-xs-12">
                        <label>Username</label>
                        <div class="form-group has-feedback">
                          <?php echo form_input(array('name' => 'username', 'value' => set_value('username'), 'placeholder' => 'Username', 'class' => 'form-control')); ?>
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>Password</label>
                        <div class="form-group has-feedback">
                          <?php echo form_password(array('name' => 'password', 'value' => set_value('password'), 'placeholder' => 'Password', 'class' => 'form-control')); ?>
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" name="submit" data-toggle="modal" data-target="modal">Login</button>
                      </div>
                    </div>
                  </form>
                  <?php echo form_close();?>
                </div>
              </div>


</section>


<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()?>assets/template/backend/ampleadmin/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url()?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="<?php echo base_url()?>assets/template/backend/ampleadmin/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url()?>assets/template/backend/ampleadmin/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url()?>assets/template/backend/ampleadmin/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url()?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url()?>assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
</body>
</html>
