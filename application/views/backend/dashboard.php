<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <div class="box-body">
    <div class="callout callout-success "><i class='fa fa-bullhorn'></i> Selamat Datang <b><?php echo $this->session->userdata('nama') ?></b>
    </div>
  </div>

<?php if ($this->ion_auth->is_superadmin()): ?>

  <section class='content'>
    <div class='row'>
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carousel</h3>
            </div>
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>


  <section class='content'>
    <div class='row'>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-university"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Irbanwil</span>
              <span class="info-box-number"><?php echo $total_irban ?> Data</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-yellow'>
          <div class='inner'><h3> <?php echo $total_irban ?> </h3><p>Data Irbanwil</p></div>
          <div class='icon'><i class='fa fa-university'></i></div>
          <a href='<?php echo base_url('admin/irban') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-blue'>
          <div class='inner'><h3> <?php echo $total_auditor ?> </h3><p>Auditor</p></div>
          <div class='icon'><i class='fa fa-male'></i></div>
          <a href='<?php echo base_url('admin/auditor') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

      <div class='col-lg-3 col-xs-12'>
        <div class='small-box bg-gray'>
          <div class='inner'><h3> <?php echo $total_user ?> </h3><p>User</p></div>
          <div class='icon'><i class='fa fa-user'></i></div>
          <a href='<?php echo base_url('admin/auth/user') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
        </div>
      </div>

    </div>



  </section>
<?php endif ?>
</div>

<?php $this->load->view('back/footer'); ?>
