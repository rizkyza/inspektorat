
<TABLE WIDTH="25%">
<TR>
<TD ALIGN="left" WIDTH="20%"><IMG SRC="<?php echo base_url('assets/images/header.png') ?>" WIDTH="100%" HEIGHT="80"></TD>
</TR>
</TABLE>
<HR SIZE="5" COLOR="BLACK">
<br />
<br />
    <div class="panel panel-primary">
      <div class="panel-heading">
        <table>
          <tr>
            <th style="text-align: left;"><b>Laporan</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;">PKPT</td>
          </tr>
          <tr>
            <th style="text-align: left;"><b>Periode</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $tahun; ?></td>
          </tr>
          <tr>
            <th style="text-align: left;"><b>Irbanwil</b></th>
            <td style="text-align: left;"> : </td>
            <td style="text-align: left;"><?php echo $this->session->userdata('usertype'); ?></td>
          </tr>
        </table>
      </div>
      <div class="box-body table-responsive padding">
        <br />
        <br />


        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align: center; text-align: center; border:1px solid #000;" >No.</th>
              <th style="text-align: center; text-align: center; border:1px solid #000;">Irbanwil</th>
              <th style="text-align: center; text-align: center; border:1px solid #000;">SOPD</th>
              <th style="text-align: center; text-align: center; border:1px solid #000;">Kegiatan</th>
              <th style="text-align: center; text-align: center; border:1px solid #000;">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php $start = 0; foreach ($pkpt_data as $pkpt):?>
            <tr>
              <td style="text-align:center; border:1px solid #000;"><?php echo ++$start ?></td>
              <td style="text-align:left; border:1px solid #000;"><?php echo $pkpt->irbanwil ?></td>
              <td style="text-align:left; border:1px solid #000;"><?php echo $pkpt->skpd ?></td>
              <td style="text-align:left; border:1px solid #000;">Reguler</td>
              <td style="text-align:left; border:1px solid #000;"><?php echo $pkpt->date_start ?> s/d <?php echo $pkpt->date_end ?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
