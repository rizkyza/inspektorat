<header class="main-header">
  <a href="<?php echo base_url('admin/dashboard') ?>" class="logo">
    <span class="logo-mini"><b>SW</b></span>
    <span class="logo-lg"><b>SIWASIT</b></span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="logo-lg"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Inspektorat Daerah Kalsel</li>
              <li>
                <ul class="menu">
                  <!-- <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url()?>assets/images/admin.png" width="160px" height="160px" class="user-image" alt="User Image"/>
            <span class="hidden-xs">
              Halo, <?php echo $this->session->userdata('nama'); ?> (<?php echo $this->session->userdata('username') ?>)
            </span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <?php if ($this->ion_auth->is_superadmin()): ?>
              <img src="<?php echo base_url()?>assets/images/auditor/superadmin.png" class="img-circle" alt="User Image" />
              <?php endif ?>
              <?php if ($this->ion_auth->is_auditor()): ?>
              <img id="foto_auditor" name="foto_auditor" class="img-circle" alt="User Image" />
              <?php endif ?>
              <p>
              <?php echo $this->session->userdata('identity') ?>
              <input type="hidden" name="nip_auditor" id="nip_auditor" value="<?php echo $this->session->userdata('nip') ?>" />
              </p>
            </li>
            <li class="user-body">
              <div class="col-xs-6 text-center">
                <a href='<?php $user_id = $this->session->userdata('user_id'); echo base_url('admin/auth/edit_user/'.$user_id.'') ?>' class='btn btn-default btn-flat'>Ubah Password</a>
              </div>
              <div class="col-xs-6 text-center">
                <a href='<?php echo base_url() ?>admin/auth/logout' class='btn btn-default btn-flat'>Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<script type="text/javascript">
  $(document).ready(function(){
      var nip = $('#nip_auditor').val();
      var logo = document.getElementById('foto_auditor');

      $.ajax({
           url:"<?php echo base_url(); ?>admin/auditor/foto_auditor",
           method:"POST",
           data:{nip:nip},
           dataType:"json",
           success:function(data)
           {
             if (data.foto != ''){
                $('#foto_auditor').val(data.foto);
                logo.src = "<?php echo base_url()?>assets/images/auditor/"+data.foto;

             } else {
               $('#foto_auditor').val(data.foto);
               logo.src = "<?php echo base_url()?>assets/images/no_image_thumb.png";

             }
             //swal('SELAMAT DATANG',data.nama,'success');
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
             //swal('Alert', '', 'error');
           }
      })
  });
</script>
