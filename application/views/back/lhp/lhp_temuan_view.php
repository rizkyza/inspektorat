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
      <td style="text-align: left;">Daftar Temuan LHP</td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Irbanwil</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $irbanwil; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>No LHP</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $lhp->no_lhp; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Tanggal LHP</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $lhp->tanggal_lhp; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>SKPD</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $lhp->skpd; ?></td>
    </tr>
  </table>

  <br /><br />

    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th style="text-align: center; border:1px solid #000; font-size:11px; font-family:chelvetica;" width="5%" >No</th>
                <th style="text-align: center; border:1px solid #000; font-size:11px; font-family:chelvetica;" width="15%">No Temuan</th>
                <th style="text-align: center; border:1px solid #000; font-size:11px; font-family:chelvetica;" width="20%">Kode Temuan</th>
                <th style="text-align: center; border:1px solid #000; font-size:11px; font-family:chelvetica;" width="40%">Judul Temuan</th>
                <th style="text-align: center; border:1px solid #000; font-size:11px; font-family:chelvetica;" width="20%">Nilai Temuan</th>
              </tr>
            </thead>
            <tbody>
              <?php $start = 0; foreach ($lhp_temuan as $lhptemuan):?>
              <tr>
                <td style="text-align:center; border:1px solid #000; font-size:11px; font-family:chelvetica; vertical-align: top;"><?php echo ++$start ?></td>
                <td style="text-align:left; border:1px solid #000; font-size:11px; font-family:chelvetica; vertical-align: top;"><?php echo $lhptemuan->no_temuan ?></td>
                <td style="text-align:left; border:1px solid #000; font-size:11px; font-family:chelvetica; vertical-align: top;"><?php echo $lhptemuan->kode_temuan ?></td>
                <td style="text-align:left; border:1px solid #000; font-size:11px; font-family:chelvetica; vertical-align: top;"><?php echo $lhptemuan->judul_temuan ?></td>
                <td style="text-align:left; border:1px solid #000; font-size:11px; font-family:chelvetica; vertical-align: top;">Rp.<?php echo number_format($lhptemuan->nilai_temuan, 0, '.', '.')  ?>,-</td>
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
