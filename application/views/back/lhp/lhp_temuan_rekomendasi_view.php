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
      <td style="text-align: left;">Detail Data Temuan</td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>Irbanwil</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $irbanwil ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>No LHP</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $temuan->no_lhp; ?></td>
    </tr>
    <tr>
      <th style="text-align: left;"><b>No Temuan</b></th>
      <td style="text-align: left;"> : </td>
      <td style="text-align: left;"><?php echo $temuan->no_temuan; ?></td>
    </tr>
  </table>

    <br />


    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b><?php echo $temuan->judul_temuan; ?> (<?php echo $temuan->subsubkode; ?>)</b></span><br /><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->uraian_temuan; ?></span><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->kondisi; ?></span><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->kriteria_aturan; ?></span><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->akibat; ?></span><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->sebab.'('.$temuan->subsubkodepk.')';?></span><br /><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->tanggapan; ?></span><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b></b><?php echo $temuan->komentar_tanggapan; ?></span><br />
    <span style="text-align:justify; font-size:12px; font-family:chelvetica;"><b>Nilai Temuan :  </b>Rp.<?php echo number_format($temuan->nilai_temuan, 0, '.', '.')  ?>,-</span><br />


    <br />

    <span style="font-size:12px"><b>Direkomendasikan :</b></span><br /><br />

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:12px; font-family:chelvetica;">
            <thead>
              <tr>
                <span style="font-size:10px; font-family:chelvetica;"><th style="text-align: center; border:1px solid #000; font-size:10px; font-family:chelvetica;" width="5%" >No</th></span>
                <span style="font-size:10px; font-family:chelvetica;"><th style="text-align: center; border:1px solid #000; font-size:10px; font-family:chelvetica;" width="15%">Kode Rekomendasi</th></span>
                <span style="font-size:10px; font-family:chelvetica;"><th style="text-align: center; border:1px solid #000; font-size:10px; font-family:chelvetica;" width="80%">Uraian Rekomendasi</th></span>
              </tr>
            </thead>
            <tbody>
              <?php $start = 0; foreach ($rekomendasi_temuan as $rekomendasi):?>
              <tr>
                <td style="text-align:center; border:1px solid #000; font-size:10px; font-family:chelvetica; vertical-align: top;"><?php echo ++$start ?></td></span>
                <td style="text-align:left; border:1px solid #000; font-size:10px; font-family:chelvetica; vertical-align: top;"><?php echo $rekomendasi->subkoderk ?></td></span>
                <td style="text-align:left; border:1px solid #000; font-size:10px; font-family:chelvetica; vertical-align: top;"><?php echo $rekomendasi->uraian_rekomendasi ?></td></span>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
</div>

<div class="box-footer clearfix">
    <?php //echo $jum_penguji;  ?>
</div>
</div>

</body>
