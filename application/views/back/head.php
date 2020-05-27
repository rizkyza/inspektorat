<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url()?>assets/template/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url()?>assets/template/backend/bootstrap/js/bootstrap.min.js"></script>

    <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/skins/skin-black.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/skins/skin-green.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/skins/skin-red.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/skins/skin-yellow.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jQueryUI/jquery-ui-1.10.3.min.js"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/template/backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?php echo base_url()?>assets/plugins/iCheck/all.css" rel="stylesheet" >

    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/template/backend/dist/js/app.min.js" type="text/javascript"></script>

    <!-- Slim Scroll -->
    <script src="<?php echo base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/fav.ico" />

    <!-- DATA TABLES -->
    <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.16/api/fnReloadAjax.js" type="text/javascript"></script>

    <!-- Fonts and Icons -->
    <link href="<?php echo base_url()?>assets/plugins/font-awesome4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    <!-- Datepicker -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url() ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.min.js"charset="UTF-8"></script>


    <!-- full calendar-->
    <link href='<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <script src='<?php echo base_url();?>assets/plugins/fullcalendar/lib/moment.min.js'></script>
    <script src='<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.min.js'></script>

    <!--alerts CSS -->
    <link href="<?php echo base_url()?>assets/template/backend/formwizard/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url()?>assets/template/backend/formwizard/sweetalert/sweetalert.min.js"></script>

    <!-- Wizard CSS -->
    <link href="<?php echo base_url()?>assets/template/backend/formwizard/jquery-wizard-master/css/wizard.css" rel="stylesheet">
    <script src="<?php echo base_url()?>assets/template/backend/formwizard/jquery-wizard-master/dist/jquery-wizard.min.js"></script>
    <link   href="<?php echo base_url()?>assets/template/backend/formwizard/jquery-wizard-master/libs/formvalidation/formValidation.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>assets/template/backend/formwizard/jquery-wizard-master/libs/formvalidation/formValidation.min.js"></script>
    <script src="<?php echo base_url()?>assets/template/backend/formwizard/jquery-wizard-master/libs/formvalidation/bootstrap.min.js"></script>


    <!-- Custom CSS -->
    <style type="text/css">
    .white-box{padding:25px;margin-bottom:30px}
    .white-box .box-title{margin:0 0 12px;font-weight:500;text-transform:uppercase;font-size:16px}.panel{border-radius:0;margin-bottom:30px;border:0;box-shadow:none}
    .box-title{margin:0 0 12px;font-weight:500;text-transform:uppercase;font-size:16px}
    .text-muted,a.list-group-item:focus,a.list-group-item:hover,button.list-group-item:focus,button.list-group-item:hover,h1 .small,h1 small,h2 .small,h2 small,h3 .small,h3 small,h4 .small,h4 small,h5 .small,h5 small,h6 .small,h6 small,tbody,th{color:#96a2b4}
    .wizard-steps{display:table;width:100%}.wizard-steps>li{display:table-cell;padding:10px 20px;background:rgba(0,0,0,.1)}.wizard-steps>li span{border-radius:100%;border:1px solid rgba(120,130,140,.13);width:40px;height:40px;display:inline-block;vertical-align:middle;padding-top:9px;margin-right:8px;text-align:center}.wizard-content{padding:25px;border-color:rgba(120,130,140,.13);margin-bottom:30px}.wizard-steps>li.current,.wizard-steps>li.done{background:#2cabe3;color:#fff}.wizard-steps>li.current span,.wizard-steps>li.done span{border-color:#fff;color:#fff}.wizard-steps>li.current h4,.wizard-steps>li.done h4{color:#fff}.wizard-steps>li.done{background:#53e69d}.wizard-steps>li.error{background:#ff7676}
    .wizard-content{padding:25px;border-color:rgba(120,130,140,.13);margin-bottom:30px}
    .form-horizontal .form-group{margin-bottom:25px}
    .list-group-item,.list-group-item:first-child,.list-group-item:last-child{border-radius:0;border-color:rgba(120,130,140,.13)}
    .form-group{position:relative}.floating-labels .form-control{font-size:20px;padding:10px 10px 10px 0;display:block;border:none;border-bottom:1px solid rgba(120,130,140,.2)}
    .floating-labels select.form-control>option{font-size:14px}
    .has-error .form-control{border-bottom:1px solid #ff7676}
    .has-warning .form-control{border-bottom:1px solid #ffc36d}
    .has-success .form-control{border-bottom:1px solid #53e69d}
  </style>



  </head>

  <body class="skin-blue fixed sidebar-mini">
    <div class="wrapper">
