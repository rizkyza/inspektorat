
    <TABLE WIDTH="25%">
    <TR>
    <TD ALIGN="left" WIDTH="20%"><IMG SRC="<?php echo base_url('assets/images/header.png')?>" WIDTH="100%" HEIGHT="80"></TD>
    </TR>
    </TABLE>
    <HR SIZE="5" COLOR="BLACK">
    <BR>


<div class="content-wrapper">
  <section class="content-header">
  </section>
  <section class='content'>
    <div class='row'>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div>
        <!-- kolom kiri -->
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-body">
            <div class="box-body">
              <table style="font-size:12px; font-family:chelvetica;" >
                <tr>
                  <td style="text-align: left;" rowspan="6">                 <?php
                                    if(empty($auditor->foto)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='100'>";}
                                    else { echo " <img src='".base_url()."assets/images/auditor/".$auditor->foto."' width='100'> ";}
                                    ?></b></th>
                </tr>
                <tr>
                  <td style="text-align: left;"><b>Laporan</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;">Hasil Kerja Auditor</td>
                </tr>
                <tr>
                  <td style="text-align: left;"><b>Nama Auditor</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $auditor->nama_auditor ?></td>
                </tr>
                <tr>
                  <td style="text-align: left;"><b>NIP</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $auditor->nip ?></td>
                </tr>
                <tr>
                  <td style="text-align: left;"><b>Tanggal Sekarang</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo date("Y-m-d");?></td>
                </tr>


                <tr>
                  <td style="text-align: left;">
                  </td>
                </tr>
              </table>
                <br>
              <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <th style="text-align: center; border:1px solid #000;" colspan="6">Hasil Kerja Auditor</th>
                  <tr>
                    <th style="text-align: center; border:1px solid #000;">No</th>
                    <th style="text-align: center; border:1px solid #000;">No KKP</th>
                    <th style="text-align: center; border:1px solid #000;">Tanggal KKP</th>
                    <th style="text-align: center; border:1px solid #000;">SOPD</th>
                    <th style="text-align: center; border:1px solid #000;">Judul Temuan</th>
                    <th style="text-align: center; border:1px solid #000;">Time Uploader</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $start = 0; foreach ($kkp_data as $pkp):?>
                  <tr>
                    <td style="text-align: center; border:1px solid #000;"><?php echo ++$start ?></td>
                    <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->no_kkp ?></td>
                    <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->tanggal_kkp ?></td>
                    <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->skpd ?></td>
                    <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->temuan ?></td>
                    <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->time_uploader ?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
                </div><hr/>
             </div>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>
<script>
document.getElementById("tanggal").innerHTML = Date();
</script>
<!-- Disable enter keypress form -->
