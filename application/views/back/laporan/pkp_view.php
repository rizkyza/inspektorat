
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
      <?php echo form_open_multipart($action);?>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div>
        <!-- kolom kiri -->
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-body">
            <div class="box-body">
              <table style="font-size:12px; font-family:chelvetica;">
                <?php echo form_input($id_spt,$spt->id_spt);?>
                <tr>
                  <th style="text-align: left;"><b>Laporan</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;">Data PKP</td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Tahun</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $spt->tahun;?></td></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>No Spt</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $spt->no_spt;?></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>SOPD</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $spt->nama_skpd;?></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Irbanwil</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $spt->nama_irban;?></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Ketua Tim</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $nama;?></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Tanggal SPT</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;"><?php echo $spt->tanggal_spt;?></td>
                </tr>
                <tr>
                  <th style="text-align: left;"><b>Kegiatan Pemeriksaan</b></th>
                  <td style="text-align: left;"> : </td>
                  <td style="text-align: left;">Regular</td>
                </tr>
              </table>
<br>
                  <table id="datatabletim" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <th style="text-align: center; border:1px solid #000;" colspan="5" >SUSUNAN TIM AUDITOR</th>
                      <tr>
                        <th style="text-align: center; border:1px solid #000;" >No</th>
                        <th style="text-align: center; border:1px solid #000;" >Foto</th>
                        <th style="text-align: center; border:1px solid #000;" >NIP</th>
                        <th style="text-align: center; border:1px solid #000;" >Nama</th>
                        <th style="text-align: center; border:1px solid #000;" >Jabatan</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $start = 0; foreach ($tim_data as $tim):?>
                      <tr>
                        <td style="text-align: center; border:1px solid #000;"><?php echo ++$start ?></td>
                        <?php if($tim->foto != ''){ ?>
                             <td style="text-align: center; border:1px solid #000;"><img src="<?php echo base_url(); ?>assets/images/auditor/<?php echo $tim->foto ?>" class="img-thumbnail" width="50" height="35" />
                        <? } else { ?>
                             <td style="text-align: center; border:1px solid #000;"><img src="<?php echo base_url(); ?>assets/images/no_image_thumb.png" class="img-thumbnail" width="50" height="35" />
                        <? } ?>
                        <td style="text-align: left; border:1px solid #000;"><?php echo $tim->nip ?></td>
                        <td style="text-align: left; border:1px solid #000;"><?php echo $tim->nama ?></td>
                        <td style="text-align: left; border:1px solid #000;"><?php echo $tim->jabatan ?></td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
              <br />
              <br />

                         <table id="user_data" class="table table-bordered table-striped" cellspacing="0" width="100%">
                              <thead>
                                <th style="text-align: center; border:1px solid #000;" colspan="7" >TABEL PKP</th>
                                   <tr>
                                       <th style="text-align: center; border:1px solid #000;">No Langkah Kerja</th>
                                       <th style="text-align: center; border:1px solid #000;">Langkah Kerja</th>
                                       <th style="text-align: center; border:1px solid #000;">Dilaksanakan</th>
                                       <th style="text-align: center; border:1px solid #000;">Waktu Pemeriksaan</th>
                                       <th style="text-align: center; border:1px solid #000;">No KKP</th>
                                       <th style="text-align: center; border:1px solid #000;">Tahun</th>
                                       <th style="text-align: center; border:1px solid #000;">Kegiatan</th>
                                   </tr>
                              </thead>
                              <tbody>
                                <?php $start = 0; foreach ($pkp_data as $pkp):?>
                                <tr>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->no_langkah_kerja ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->langkah_kerja ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->auditor ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->hari ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->no_kkp ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->tahun ?></td>
                                  <td style="text-align: center; border:1px solid #000;"><?php echo $pkp->kegiatan ?></td>
                                </tr>
                                <?php endforeach;?>
                              </tbody>
                </div>
             </div>
            </div>
          </div>
        </div>

      <?php echo form_close(); ?>
    </div>
  </section>
</div>

<!-- Disable enter keypress form -->
<script type="text/javascript">
  window.addEventListener('keydown',function(e){
    if(e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter'||e.keyCode==13){
      if(e.target.nodeName == 'INPUT' && e.target.type == 'text'){
        e.preventDefault();
        return false;
      }
    }
  },
  true
);
</script>

<script type="text/javascript" language="javascript" >

       $("#user_data").dataTable().fnDestroy();
       var id_spt = $('#id_spt').val();
       var dataTable = $('#user_data').DataTable({
         "processing":true,
         "serverSide":true,
         "bAutoWidth": false,
         "scrollX": true,
         "bFilter": false,
         "order":[],

         "ajax":{
              url:"<?php echo base_url() . 'laporan/laporanpkp/fetch_user'; ?>",
              data:{id_spt:id_spt},
              dataType:"JSON",
              type:"POST"
         },
         "columnDefs":[
              {
                   "targets":[7, 8],
                   "orderable":false,
              }
         ],
    });table.fnReloadAjax();

  });dataTable.ajax.reload();
  </script>
