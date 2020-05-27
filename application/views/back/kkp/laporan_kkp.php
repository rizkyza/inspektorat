<style type="text/css" media="print">
@page Section1
    {size:11 8.5in;
    margin:.5in 13.6pt 0in 13.6pt;
    mso-header-margin:.5in;
    mso-footer-margin:.5in;
    mso-paper-source:4;}
div.Section1
    {page:Section1;}
</style>
<style type="text/css">
table.center {
        margin-left: auto;
        margin-right: auto;
    }
</style>
<TABLE WIDTH="25%">
<TR>
<TD ALIGN="left" WIDTH="20%"><IMG SRC="<?php echo base_url('assets/images/header.png') ?>" WIDTH="100%" HEIGHT="80"></TD>
</TR>
</TABLE>
<HR SIZE="3" COLOR="BLACK">
<br />
<br />
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div>
          <table width="100%">
            <tr>
              <th style="text-align: center;"><b><h2>KERTAS KERJA PEMERIKSA</h2></b></th>
            </tr>
          </table>
        </div>

        <table>
          <tr>
            <th style="text-align: left;"><b>No KKP</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $kkp->no_kkp ?></td>
          </tr>
          <tr>
            <th style="text-align: left;"><b>Dibuat Oleh</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $kkp->auditor ?></td>
          </tr>
          <tr>
            <th style="text-align: left;"><b>Tanggal</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $kkp->tanggal_kkp ?></td>
          </tr>
          <tr>
            <th style="text-align: left;"><b>TA. Yg di Rik</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $thn ?></td>
          </tr>
          <tr>
            <th style="text-align: left;"><b>Objek</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $kkp->skpd ?></td>
          </tr>
        </table>
        <br />
        <br />

        <div>
          <table width="97%" bgcolor="#bec1c6" class="center">
            <tr>
              <th style="text-align: center; border:1px solid #000;"><b><h3><?php echo $kkp->temuan ?></h3></b></th>
            </tr>
          </table>
        </div>
        <br />

        <div>
          <table width="100%" class="center">
            <tr>
              <td style="text-align: left;"><?php echo $kkp->kondisi_temuan ?></td>
            </tr>
          </table>
        </div>

        <br />
        <br />
        <table class="center" cellspacing="0" width="80%">
          <thead>
            <th style="text-align: center; border:1px solid #000;" colspan="4"><b><h4>ISI REVIU SUVERVISOR</h4></b></th>
            <tr>
              <th style="text-align: center; border:1px solid #000;">Tanggal Reviu Ketua Tim</th>
              <th style="text-align: center; border:1px solid #000;">Reviu Ketua Tim</th>
              <th style="text-align: center; border:1px solid #000;">Tanggal Reviu Dalnis</th>
              <th style="text-align: center; border:1px solid #000;">Reviu Dalnis</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($reviu as $row):?>
            <tr>
              <td style="text-align:left; border:1px solid #000;"><?php echo $row->tanggal_reviu_ketua_tim ?></td>
              <td style="text-align:left; border:1px solid #000;"><?php echo $row->isi_reviu_ketua_tim ?></td>
              <td style="text-align:left; border:1px solid #000;"><?php echo $row->tanggal_reviu_dalnis ?></td>
              <td style="text-align:left; border:1px solid #000;"><?php echo $row->isi_reviu_dalnis ?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>

      </div>
      <div class="box-body table-responsive padding">

      </div>
    </div>
  </section>
</div>
