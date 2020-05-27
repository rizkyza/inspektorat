<!--Import materialize.css-->
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url()?>assets/template/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div class="box-body mdl-cell--12-col">
<span style="font-family:chelvetica;"></span>

  <table style="font-size:12px; font-family:chelvetica;">
    <tr>
      <th style="text-align: left;"><b>Laporan</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;">Data Tim Auditor</td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Irbanwil</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $spt->nama_irban; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>No SPT</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $spt->no_spt; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>SKPD</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $spt->nama_skpd; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Tanggal Tugas</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $spt->tanggal_tugas; ?></td>
    </tr>
  </table>

    <br /><br />

    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:12px; font-family:chelvetica;">
            <thead>
              <tr>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;" width="5%" >No</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;" width="15%">Foto</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;" width="20%">NIP</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;" width="40%">Nama</th></span>
                <span style="font-size:12px"><th style="text-align: center; border:1px solid #000;" width="20%">Jabatan</th></span>
              </tr>
            </thead>
            <tbody>
              <?php $start = 0; foreach ($auditor_data as $sptauditor):?>
              <tr>
                <span style="font-size:12px"><td style="text-align:center; border:1px solid #000;"><?php echo ++$start ?></td></span>
                <?php if ($sptauditor->foto){
                  $pathfoto = base_url().'assets/images/auditor/'.$sptauditor->foto;
                } else {
                  $pathfoto = base_url().'assets/images/no_image_thumb.png';
                } ?>
                <span style="font-size:12px"><td style="text-align:center; border:1px solid #000;"><img src="<?php echo $pathfoto ?>" class="img-thumbnail" width="75" height="60" /></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $sptauditor->nip ?></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $sptauditor->nama ?></td></span>
                <span style="font-size:12px"><td style="text-align:left; border:1px solid #000;"><?php echo $sptauditor->jabatan ?></td></span>
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
