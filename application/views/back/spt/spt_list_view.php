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
      <td style="text-align: left;">Data SPT</td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Irbanwil</b></th>
      <td style="text-align: left;"> : </td>
      <?php foreach ($spt_data as $spt): ?>
      <td style="text-align: left;"><?php echo $spt->nama_irban; ?></td>
      <?php endforeach;?>
    </tr>
  </table>

  <br /><br />

    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:12px; font-family:chelvetica;">
            <thead>
              <tr>
                <th style="text-align: center; border:1px solid #000;" >No.</th>
                <th style="text-align: center; border:1px solid #000;">Tahun</th>
                <th style="text-align: center; border:1px solid #000;">No SPT</th>
                <th style="text-align: center; border:1px solid #000;">SKPD</th>
                <th style="text-align: center; border:1px solid #000;">Keperluan</th>
                <th style="text-align: center; border:1px solid #000;">Tanggal SPT</th>
                <th style="text-align: center; border:1px solid #000;">Tanggal Tugas</th>
              </tr>
            </thead>
            <tbody>
              <?php $start = 0; foreach ($spt_data as $spt):?>
              <tr>
                <td style="text-align:center; border:1px solid #000;"><?php echo ++$start ?></td>
                <td style="text-align:left; border:1px solid #000;"><?php echo $spt->tahun ?></td>
                <td style="text-align:left; border:1px solid #000;"><?php echo $spt->no_spt ?></td>
                <td style="text-align:left; border:1px solid #000;"><?php echo $spt->nama_skpd ?></td>
                <td style="text-align:left; border:1px solid #000;"><?php echo $spt->keperluan_spt ?></td>
                <td style="text-align:left; border:1px solid #000;"><?php echo $spt->tanggal_spt ?></td>
                <td style="text-align:left; border:1px solid #000;"><?php echo $spt->tanggal_tugas ?></td>
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
