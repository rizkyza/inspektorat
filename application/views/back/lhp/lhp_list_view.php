<!--Import materialize.css-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url()?>assets/template/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div class="box-body mdl-cell--12-col">

  <table style="font-size:12px; font-family:chelvetica;">
    <tr>
      <th style="text-align: left;"><b>Laporan</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;">Data LHP</td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Irbanwil</b></th>
      <td style="text-align: left;"> : </td>
      <?php $start = 0; foreach ($lhp_data as $lhp):?>
      <td style="text-align: left;"><?php echo $lhp->nama_irban; ?></td>
      <?php endforeach;?>
    </tr>
  </table>

    <br /><br />

    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:12px; font-family:chelvetica;">
            <thead>
              <tr>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;" >No.</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;">Tahun</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;">No LHP</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;">SKPD</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;">Tanggal LHP</th></span>
              </tr>
            </thead>
            <tbody>
              <?php $start = 0; foreach ($lhp_data as $lhp):?>
              <tr>
                <span style="font-size:12px"><td style="text-align:center; border:1px solid #000;"><?php echo ++$start ?></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $lhp->tahun ?></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $lhp->no_lhp ?></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $lhp->skpd ?></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $lhp->tanggal_lhp ?></td></span>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div></div>
</div>

<div class="box-footer clearfix">
    <?php //echo $jum_penguji;  ?>
</div>
</div>

</body>
