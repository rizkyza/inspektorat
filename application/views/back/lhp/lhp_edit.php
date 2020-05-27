<?php $this->load->view('back/head'); ?>
<?php $this->load->view('back/header'); ?>
<?php $this->load->view('back/leftbar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $title ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><?php echo $module ?></li>
      <li class="active"><a href="<?php echo current_url() ?>"><?php echo $title ?></a></li>
    </ol>
  </section>
  <section class='content'>
    <div class='row'>
      <?php echo form_open_multipart($action);?>
        <div class="col-md-12"> <?php echo validation_errors() ?> </div>
        <!-- kolom kiri -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="panel panel-info">
            <div class="panel-heading"><b>Detail SPT</b></div>
            <div class="panel-body">
            <div class="box-body">
              <div class="col-md-6">
              <div class="form-group"><label>No SPT</label>
                <?php echo form_input($no_spt, $lhp->no_spt);?>
              </div></div>
              <div class="col-md-6">
              <div class="form-group"><label>Tahun</label>
                <?php echo form_input($tahun, $lhp->tahun);?>
              </div></div>
              <div class="col-md-6">
              <div class="form-group"><label>SKPD</label>
                <?php echo form_input($skpd, $lhp->skpd);?>
              </div></div>
              <div class="col-md-6">
              <div class="form-group"><label>Irbanwil</label>
                <?php echo form_input($nama_irban, $lhp->nama_irban);?>
              </div></div><hr />
            </div>
          </div>
        </div>
          </div>
        </div>
            <div class="col-md-12">
              <div class="box box-primary">
              <div class="panel panel-info">
              <div class="panel-heading"><b>Detail LHP</b></div>
              <div class="panel-body">
                <div class="box-body">
                  <div class="form-group">

                   <div class="row">
                    <div class="col-md-12">
                    <label>No LHP</label>
                      <?php echo form_input($no_lhp, $lhp->no_lhp);?>
                    </div>
                    <div class="col-md-12">
                    <label>Tanggal LHP *</label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <?php echo form_input($tanggal_lhp, $lhp->tanggal_lhp);?>
                    </div>
                    </div>

                   </div>
                 </div>
            </div>
              <?php echo form_input($id_lhp,$lhp->id_lhp);?>
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
                <button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>

        <div class="box box-primary">
        <div class="panel panel-info">
        <div class="panel-heading"><b>Program Kerja Pemeriksaan (PKP) Makro & Mikro</b></div>
        <div class="panel-body">
          <div class="box-body">
            <div class="form-group">
             <div class="row">
               <form action="#" id="uploadpkp" name="uploadpkp">
                 <div class="form-group col-md-12">
                    <div class="form-group">
                      <label>Upload File Program Kerja Pemeriksaan (PKP) Makro & Mikro</label>
                    </div>

                    <?php echo form_input($namafilepkp_no_lhp, $lhp->no_lhp);?>
                    <input class="form-control" name='pkp' type='file' id='pkp'>
                    <div class="form-group">
                      <div class="progress">
                        <div id="barprogresspkp" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                          <span id="statuspkp">0%</span>
                        </div>
                      </div>
                    </div>

                    <p>Status File : <i><?php echo $lhp->file_pkp ?></i></p>
                    <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

                 <div class="box-footer col-md-12">
                   <a id="file_pkp" name="file_pkp" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/pkp/'.$lhp->file_pkp ?>"><i class="fa fa-file-pdf-o"></i></a>
                    <button class="btn btn-info" id='tambahpkp'>Upload</button>
                    <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                 </div>

               </form>
             </div>
           </div>
         </div>
      </div>
      </div>
      </div>
      </div>

      <div class="box box-primary">
      <div class="panel panel-info">
      <div class="panel-heading"><b>Berita Acara Entry Briefing & Daftar Hadir Entry Briefing</b></div>
      <div class="panel-body">
        <div class="box-body">
          <div class="form-group">
           <div class="row">
             <form action="#" id="uploadba" name="uploadba">
               <div class="form-group col-md-12">
                  <div class="form-group">
                    <label>Upload File Berita Acara Entry Briefing & Daftar Hadir Entry Briefing</label>
                  </div>

                  <?php echo form_input($namafileba_no_lhp, $lhp->no_lhp);?>
                  <input class="form-control" name='ba' type='file' id='ba'>
                  <div class="form-group">
                    <div class="progress">
                      <div id="barprogressba" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                        <span id="statusba">0%</span>
                      </div>
                    </div>
                  </div>

                  <p>Status File : <i><?php echo $lhp->file_ba ?></i></p>
                  <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

               <div class="box-footer col-md-12">
                  <a id="file_ba" name="file_ba" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/ba/'.$lhp->file_ba ?>"><i class="fa fa-file-pdf-o"></i></a>
                  <button class="btn btn-info" id='tambahba'>Upload</button>
                  <button type="reset" name="reset" class="btn btn-danger">Reset</button>

               </div>

             </form>
           </div>
         </div>
       </div>
    </div>
    </div>
    </div>
    </div>

    <div class="box box-primary">
    <div class="panel panel-info">
    <div class="panel-heading"><b>Kertas Kerja Pemeriksaan (KKP), Pokok-pokok Hasil Pemeriksaan (P2HP), Tanggapan Auditan</b></div>
    <div class="panel-body">
      <div class="box-body">
        <div class="form-group">
         <div class="row">
           <form action="#" id="uploadkkp" name="uploadkkp">
             <div class="form-group col-md-12">
                <div class="form-group">
                  <label>Upload File Kertas Kerja Pemeriksaan (KKP), Pokok-pokok Hasil Pemeriksaan (P2HP), Tanggapan Auditan</label>
                </div>

                <?php echo form_input($namafilekkp_no_lhp, $lhp->no_lhp);?>
                <input class="form-control" name='kkp' type='file' id='kkp'>
                <div class="form-group">
                  <div class="progress">
                    <div id="barprogresskkp" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                      <span id="statuskkp">0%</span>
                    </div>
                  </div>
                </div>

                <p>Status File : <i><?php echo $lhp->file_kkp ?></i></p>
                <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

             <div class="box-footer col-md-12">
               <a id="file_kkp" name="file_kkp" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/kkp/'.$lhp->file_kkp ?>"><i class="fa fa-file-pdf-o"></i></a>
                <button class="btn btn-info" id='tambahkkp'>Upload</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
             </div>

           </form>
         </div>
       </div>
     </div>
  </div>
  </div>
  </div>
  </div>

  <div class="box box-primary">
  <div class="panel panel-info">
  <div class="panel-heading"><b>Daftar Hadir Exit Briefing</b></div>
  <div class="panel-body">
    <div class="box-body">
      <div class="form-group">
       <div class="row">
         <form action="#" id="uploadbheb" name="uploadbheb">
           <div class="form-group col-md-12">
              <div class="form-group">
                <label>Upload File Daftar Hadir Exit Briefing</label>
              </div>
              <?php echo form_input($namafilebheb_no_lhp, $lhp->no_lhp);?>
              <input class="form-control" name='bheb' type='file' id='bheb'>
              <div class="form-group">
                <div class="progress">
                  <div id="barprogressbheb" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                    <span id="statusbheb">0%</span>
                  </div>
                </div>
              </div>

              <p>Status File : <i><?php echo $lhp->file_bheb ?></i></p>
              <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

           <div class="box-footer col-md-12">
             <a id="file_bheb" name="file_bheb" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/bheb/'.$lhp->file_bheb ?>"><i class="fa fa-file-pdf-o"></i></a>
              <button class="btn btn-info" id='tambahbheb'>Upload</button>
              <button type="reset" name="reset" class="btn btn-danger">Reset</button>
           </div>

         </form>
       </div>
     </div>
   </div>
</div>
</div>
</div>
</div>

          <div class="box box-primary">
          <div class="panel panel-info">
          <div class="panel-heading"><b>Notulen Ekspose & Daftar Hadir</b></div>
          <div class="panel-body">
            <div class="box-body">
              <div class="form-group">
               <div class="row">
                 <form action="#" id="uploadne" name="uploadne">
                   <div class="form-group col-md-12">
                      <div class="form-group">
                        <label>Upload Notulen Ekspose dan Daftar Hadir</label>
                      </div>

                      <?php echo form_input($namafilene_no_lhp, $lhp->no_lhp);?>
                      <input class="form-control" name='ne' type='file' id='ne'>
                      <div class="form-group">
                        <div class="progress">
                          <div id="barprogressne" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            <span id="statusne">0%</span>
                          </div>
                        </div>
                      </div>

                      <p>Status File : <i><?php echo $lhp->file_ne ?></i></p>
                      <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

                   <div class="box-footer col-md-12">
                     <a id="file_ne" name="file_ne" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/ne/'.$lhp->file_ne ?>"><i class="fa fa-file-pdf-o"></i></a>
                      <button class="btn btn-info" id='tambahne'>Upload</button>
                      <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                   </div>

                 </form>
               </div>
             </div>
           </div>
          </div>
          </div>
          </div>
          </div>

          <div class="box box-primary">
          <div class="panel panel-info">
          <div class="panel-heading"><b>Konsep LHP</b></div>
          <div class="panel-body">
            <div class="box-body">
              <div class="form-group">
               <div class="row">
                 <form action="#" id="uploadkl" name="uploadkl">
                   <div class="form-group col-md-12">
                      <div class="form-group">
                        <label>Upload Konsep LHP</label>
                      </div>

                      <?php echo form_input($namafilekl_no_lhp, $lhp->no_lhp);?>
                      <input class="form-control" name='kl' type='file' id='kl'>
                      <div class="form-group">
                        <div class="progress">
                          <div id="barprogresskl" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            <span id="statuskl">0%</span>
                          </div>
                        </div>
                      </div>

                      <p>Status File : <i><?php echo $lhp->file_kl ?></i></p>
                      <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

                   <div class="box-footer col-md-12">
                     <a id="file_kl" name="file_kl" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/kl/'.$lhp->file_kl ?>"><i class="fa fa-file-pdf-o"></i></a>
                      <button class="btn btn-info" id='tambahkl'>Upload</button>
                      <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                   </div>

                 </form>
               </div>
             </div>
           </div>
          </div>
          </div>
          </div>
          </div>

          <div class="box box-primary">
          <div class="panel panel-info">
          <div class="panel-heading"><b>Nota Dinas dari Irbanwil ke Inspektur melalui Sekretaris Inspektur</b></div>
          <div class="panel-body">
            <div class="box-body">
              <div class="form-group">
               <div class="row">
                 <form action="#" id="uploadndli" name="uploadndli">
                   <div class="form-group col-md-12">
                      <div class="form-group">
                        <label>Upload File Nota Dinas dari Irbanwil ke Inspektur melalui Sekretaris Inspektur</label>
                      </div>

                      <?php echo form_input($namafilendli_no_lhp, $lhp->no_lhp);?>
                      <input class="form-control" name='ndli' type='file' id='ndli'>
                      <div class="form-group">
                        <div class="progress">
                          <div id="barprogressndli" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            <span id="statusndli">0%</span>
                          </div>
                        </div>
                      </div>

                      <p>Status File : <i><?php echo $lhp->file_ndli ?></i></p>
                      <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

                   <div class="box-footer col-md-12">
                     <a id="file_ndli" name="file_ndli" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/ndli/'.$lhp->file_ndli ?>"><i class="fa fa-file-pdf-o"></i></a>
                      <button class="btn btn-info" id='tambahndli'>Upload</button>
                      <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                   </div>

                 </form>
               </div>
             </div>
           </div>
          </div>
          </div>
          </div>
          </div>

          <div class="box box-primary">
          <div class="panel panel-info">
          <div class="panel-heading"><b>Nota Dinas LHP dari Inspektur ke Gubernur melalui Sekda Provinsi</b></div>
          <div class="panel-body">
            <div class="box-body">
              <div class="form-group">
               <div class="row">
                 <form action="#" id="uploadndlg" name="uploadndlg">
                   <div class="form-group col-md-12">
                      <div class="form-group">
                        <label>Upload File Nota Dinas LHP dari Inspektur ke Gubernur melalui Sekda Provinsi</label>
                      </div>

                      <?php echo form_input($namafilendlg_no_lhp, $lhp->no_lhp);?>
                      <input class="form-control" name='ndlg' type='file' id='ndlg'>
                      <div class="form-group">
                        <div class="progress">
                          <div id="barprogressndlg" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            <span id="statusndlg">0%</span>
                          </div>
                        </div>
                      </div>

                      <p>Status File : <i><?php echo $lhp->file_ndlg ?></i></p>
                      <p>Format File yang bisa diupload : <i>png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar</i></p><br>

                   <div class="box-footer col-md-12">
                     <a id="file_ndlg" name="file_ndlg" type="button" target="_blank" class="btn btn-primary" href="<?php echo base_url().'assets/files/ndlg/'.$lhp->file_ndlg ?>"><i class="fa fa-file-pdf-o"></i></a>
                      <button class="btn btn-info" id='tambahndlg'>Upload</button>
                      <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                   </div>

                 </form>
               </div>
             </div>
           </div>
          </div>
          </div>
          </div>
          </div>

  </section>
</div>

<script>
  $("#uploadpkp").submit(function(e){
            e.preventDefault();
            var file_data = $('#pkp').prop('files')[0];
            var id_lhp = $('#id_lhp').val();
            var no_lhp = $('#namafilepkp_no_lhp').val();
            var pkp = $('#pkp').val();
            var form_data = new FormData(this);
            var progressBar = document.getElementById("progress");
            var loadBtn = document.getElementById("tambahpkp");

        if (pkp == ''){

          alert('Tidak ada file untuk diupload');
          loadBtn.disabled = false;

        } else {

            console.log(form_data);

            form_data.append('file', file_data);
            form_data.append('id_lhp', id_lhp);
            form_data.append('no_lhp', no_lhp);
            form_data.append('pkp', pkp);
            $.ajax({
                url: '<?php echo base_url() . 'admin/lhp/uploadpkp' ?>', // point to server-side PHP script
                dataType: 'json',
                data: form_data,
                type: 'POST',
                xhr: function() {
        	         var xhr = new window.XMLHttpRequest();

				           xhr.upload.addEventListener("progress", function(evt) {
      			            if (evt.lengthComputable) {
      				                var percentComplete = evt.loaded / evt.total;
                              loadBtn.disabled = true;
      				                console.log(percentComplete);
      				                $('#barprogresspkp').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                              $('#statuspkp').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                        }
   			           }, false);

                return xhr;},
                success: function(data,status){

                  if (data.status=='error') {
                      alert(data.msg);
                      loadBtn.disabled = false;
                      $("#statuspkp").html('Error Uploading');
                  };
                  if (data.status=='success') {
                    $('#pkp').val('');
                    $("#statuspkp").html('File berhasil Diupload');
                    $('#barprogresspkp').removeClass('active');
                    loadBtn.disabled = false;
                    $('#file_pkp').attr('href','<?php echo base_url('assets/files/pkp/')?>'+data.msg);
                    //alert(data.msg);
                  };

                },
                cache: false,
                contentType: false,
                processData: false,
            });
            return false;
          };

    });

    $("#uploadba").submit(function(e){
              e.preventDefault();
              var file_data = $('#ba').prop('files')[0];
              var id_lhp = $('#id_lhp').val();
              var no_lhp = $('#namafileba_no_lhp').val();
              var form_data = new FormData(this);
              var progressBar = document.getElementById("progress");
              var loadBtn = document.getElementById("tambahba");
              var ba = $('#ba').val();

              if (ba == ''){

                alert('Tidak ada file untuk diupload');
                loadBtn.disabled = false;

              } else {

              console.log(form_data);

              form_data.append('file', file_data);
              form_data.append('id_lhp', id_lhp);
              form_data.append('no_lhp', no_lhp);
              $.ajax({
                  url: '<?php echo base_url() . 'admin/lhp/uploadba' ?>', // point to server-side PHP script
                  dataType: 'json',
                  data: form_data,
                  type: 'POST',
                  xhr: function() {
                     var xhr = new window.XMLHttpRequest();

                     xhr.upload.addEventListener("progress", function(evt) {
                          if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                loadBtn.disabled = true;
                                console.log(percentComplete);
                                $('#barprogressba').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                $('#statusba').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                          }
                     }, false);

                  return xhr;},
                  success: function(data,status){
                      if (data.status!='error') {
                        $('#ba').val('');
                        $("#statusba").html('File berhasil Diupload');
                        $('#barprogressba').removeClass('active');
                        loadBtn.disabled = false;
                        $('#file_ba').attr('href','<?php echo base_url('assets/files/ba/')?>'+data.msg);
                      }else{
                          alert(data.msg);
                          loadBtn.disabled = false;
                          $("#statusba").html('Error Uploading');
                      }
                  },
                  cache: false,
                  contentType: false,
                  processData: false,
              });
              return false;
            };

    });

    $("#uploadkkp").submit(function(e){
              e.preventDefault();
              var file_data = $('#kkp').prop('files')[0];
              var id_lhp = $('#id_lhp').val();
              var no_lhp = $('#namafilekkp_no_lhp').val();
              var form_data = new FormData(this);
              var progressBar = document.getElementById("progress");
              var loadBtn = document.getElementById("tambahkkp");
              var kkp = $('#kkp').val();

              if (kkp == ''){

                alert('Tidak ada file untuk diupload');
                loadBtn.disabled = false;

              } else {

              console.log(form_data);

              form_data.append('file', file_data);
              form_data.append('id_lhp', id_lhp);
              form_data.append('no_lhp', no_lhp);
              $.ajax({
                  url: '<?php echo base_url() . 'admin/lhp/uploadkkp' ?>', // point to server-side PHP script
                  dataType: 'json',
                  data: form_data,
                  type: 'POST',
                  xhr: function() {
                     var xhr = new window.XMLHttpRequest();

                     xhr.upload.addEventListener("progress", function(evt) {
                          if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                loadBtn.disabled = true;
                                console.log(percentComplete);
                                $('#barprogresskkp').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                $('#statuskkp').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                          }
                     }, false);

                  return xhr;},
                  success: function(data,status){
                      if (data.status!='error') {
                        $('#kkp').val('');
                        $("#statuskkp").html('File berhasil Diupload');
                        $('#barprogresskkp').removeClass('active');
                        loadBtn.disabled = false;
                        $('#file_kkp').attr('href','<?php echo base_url('assets/files/kkp/')?>'+data.msg);
                      }else{
                          alert(data.msg);
                          loadBtn.disabled = false;
                          $("#statuskkp").html('Error Uploading');
                      }
                  },
                  cache: false,
                  contentType: false,
                  processData: false,
              });
              return false;
            };


    });

    $("#uploadbheb").submit(function(e){
              e.preventDefault();
              var file_data = $('#bheb').prop('files')[0];
              var id_lhp = $('#id_lhp').val();
              var no_lhp = $('#namafilebheb_no_lhp').val();
              var form_data = new FormData(this);
              var progressBar = document.getElementById("progress");
              var loadBtn = document.getElementById("tambahbheb");
              var bheb = $('#bheb').val();

              if (bheb == ''){

                alert('Tidak ada file untuk diupload');
                loadBtn.disabled = false;

              } else {

              console.log(form_data);

              form_data.append('file', file_data);
              form_data.append('id_lhp', id_lhp);
              form_data.append('no_lhp', no_lhp);
              $.ajax({
                  url: '<?php echo base_url() . 'admin/lhp/uploadbheb' ?>', // point to server-side PHP script
                  dataType: 'json',
                  data: form_data,
                  type: 'POST',
                  xhr: function() {
                     var xhr = new window.XMLHttpRequest();

                     xhr.upload.addEventListener("progress", function(evt) {
                          if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                loadBtn.disabled = true;
                                console.log(percentComplete);
                                $('#barprogressbheb').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                $('#statusbheb').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                          }
                     }, false);

                  return xhr;},
                  success: function(data,status){
                      if (data.status!='error') {
                        $('#bheb').val('');
                        $("#statusbheb").html('File berhasil Diupload');
                        $('#barprogressbheb').removeClass('active');
                        loadBtn.disabled = false;
                        $('#file_bheb').attr('href','<?php echo base_url('assets/files/bheb/')?>'+data.msg);
                      }else{
                          alert(data.msg);
                          loadBtn.disabled = false;
                          $("#statusbheb").html('Error Uploading');
                      }
                  },
                  cache: false,
                  contentType: false,
                  processData: false,
              });
              return false;
            };


    });

    $("#uploadne").submit(function(e){
              e.preventDefault();
              var file_data = $('#ne').prop('files')[0];
              var id_lhp = $('#id_lhp').val();
              var no_lhp = $('#namafilene_no_lhp').val();
              var form_data = new FormData(this);
              var progressBar = document.getElementById("progress");
              var loadBtn = document.getElementById("tambahne");
              var ne = $('#ne').val();

              if (ne == ''){

                alert('Tidak ada file untuk diupload');
                loadBtn.disabled = false;

              } else {

              console.log(form_data);

              form_data.append('file', file_data);
              form_data.append('id_lhp', id_lhp);
              form_data.append('no_lhp', no_lhp);
              $.ajax({
                  url: '<?php echo base_url() . 'admin/lhp/uploadne' ?>', // point to server-side PHP script
                  dataType: 'json',
                  data: form_data,
                  type: 'POST',
                  xhr: function() {
                     var xhr = new window.XMLHttpRequest();

                     xhr.upload.addEventListener("progress", function(evt) {
                          if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                loadBtn.disabled = true;
                                console.log(percentComplete);
                                $('#barprogressne').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                $('#statusne').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                          }
                     }, false);

                  return xhr;},
                  success: function(data,status){
                      if (data.status!='error') {
                        $('#ne').val('');
                        $("#statusne").html('File berhasil Diupload');
                        $('#barprogressne').removeClass('active');
                        loadBtn.disabled = false;
                        $('#file_ne').attr('href','<?php echo base_url('assets/files/ne/')?>'+data.msg);
                      }else{
                          alert(data.msg);
                          loadBtn.disabled = false;
                          $("#statusne").html('Error Uploading');
                      }
                  },
                  cache: false,
                  contentType: false,
                  processData: false,
              });
              return false;
            };


    });

    $("#uploadkl").submit(function(e){
              e.preventDefault();
              var file_data = $('#kl').prop('files')[0];
              var id_lhp = $('#id_lhp').val();
              var no_lhp = $('#namafilekl_no_lhp').val();
              var kl = $('#kl').val();
              var form_data = new FormData(this);
              var progressBar = document.getElementById("progress");
              var loadBtn = document.getElementById("tambahkl");

          if (kl == ''){

            alert('Tidak ada file untuk diupload');
            loadBtn.disabled = false;

          } else {

              console.log(form_data);

              form_data.append('file', file_data);
              form_data.append('id_lhp', id_lhp);
              form_data.append('no_lhp', no_lhp);
              form_data.append('kl', pkp);
              $.ajax({
                  url: '<?php echo base_url() . 'admin/lhp/uploadkl' ?>', // point to server-side PHP script
                  dataType: 'json',
                  data: form_data,
                  type: 'POST',
                  xhr: function() {
          	         var xhr = new window.XMLHttpRequest();

  				           xhr.upload.addEventListener("progress", function(evt) {
        			            if (evt.lengthComputable) {
        				                var percentComplete = evt.loaded / evt.total;
                                loadBtn.disabled = true;
        				                console.log(percentComplete);
        				                $('#barprogresskl').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                $('#statuskl').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                          }
     			           }, false);

                  return xhr;},
                  success: function(data,status){

                    if (data.status=='error') {
                        alert(data.msg);
                        loadBtn.disabled = false;
                        $("#statuskl").html('Error Uploading');
                    };
                    if (data.status=='success') {
                      $('#kl').val('');
                      $("#statuskl").html('File berhasil Diupload');
                      $('#barprogresskl').removeClass('active');
                      loadBtn.disabled = false;
                      $('#file_kl').attr('href','<?php echo base_url('assets/files/kl/')?>'+data.msg);
                      //alert(data.msg);
                    };

                  },
                  cache: false,
                  contentType: false,
                  processData: false,
              });
              return false;
            };

      });

      $("#uploadndli").submit(function(e){
                e.preventDefault();
                var file_data = $('#ndli').prop('files')[0];
                var id_lhp = $('#id_lhp').val();
                var no_lhp = $('#namafilendli_no_lhp').val();
                var ndli = $('#ndli').val();
                var form_data = new FormData(this);
                var progressBar = document.getElementById("progress");
                var loadBtn = document.getElementById("tambahndli");

            if (ndli == ''){

              alert('Tidak ada file untuk diupload');
              loadBtn.disabled = false;

            } else {

                console.log(form_data);

                form_data.append('file', file_data);
                form_data.append('id_lhp', id_lhp);
                form_data.append('no_lhp', no_lhp);
                form_data.append('ndli', pkp);
                $.ajax({
                    url: '<?php echo base_url() . 'admin/lhp/uploadndli' ?>', // point to server-side PHP script
                    dataType: 'json',
                    data: form_data,
                    type: 'POST',
                    xhr: function() {
            	         var xhr = new window.XMLHttpRequest();

    				           xhr.upload.addEventListener("progress", function(evt) {
          			            if (evt.lengthComputable) {
          				                var percentComplete = evt.loaded / evt.total;
                                  loadBtn.disabled = true;
          				                console.log(percentComplete);
          				                $('#barprogressndli').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                  $('#statusndli').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                            }
       			           }, false);

                    return xhr;},
                    success: function(data,status){

                      if (data.status=='error') {
                          alert(data.msg);
                          loadBtn.disabled = false;
                          $("#statusndli").html('Error Uploading');
                      };
                      if (data.status=='success') {
                        $('#ndli').val('');
                        $("#statusndli").html('File berhasil Diupload');
                        $('#barprogressndli').removeClass('active');
                        loadBtn.disabled = false;
                        $('#file_ndli').attr('href','<?php echo base_url('assets/files/ndli/')?>'+data.msg);
                        //alert(data.msg);
                      };

                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                });
                return false;
              };

        });

        $("#uploadndlg").submit(function(e){
                  e.preventDefault();
                  var file_data = $('#ndlg').prop('files')[0];
                  var id_lhp = $('#id_lhp').val();
                  var no_lhp = $('#namafilendlg_no_lhp').val();
                  var ndlg = $('#ndlg').val();
                  var form_data = new FormData(this);
                  var progressBar = document.getElementById("progress");
                  var loadBtn = document.getElementById("tambahndlg");

              if (ndlg == ''){

                alert('Tidak ada file untuk diupload');
                loadBtn.disabled = false;

              } else {

                  console.log(form_data);

                  form_data.append('file', file_data);
                  form_data.append('id_lhp', id_lhp);
                  form_data.append('no_lhp', no_lhp);
                  form_data.append('ndlg', pkp);
                  $.ajax({
                      url: '<?php echo base_url() . 'admin/lhp/uploadndlg' ?>', // point to server-side PHP script
                      dataType: 'json',
                      data: form_data,
                      type: 'POST',
                      xhr: function() {
              	         var xhr = new window.XMLHttpRequest();

      				           xhr.upload.addEventListener("progress", function(evt) {
            			            if (evt.lengthComputable) {
            				                var percentComplete = evt.loaded / evt.total;
                                    loadBtn.disabled = true;
            				                console.log(percentComplete);
            				                $('#barprogressndlg').addClass('active').css('width', (Math.round(percentComplete*100))+'%').attr('aria-valuenow', (Math.round(percentComplete*100)));
                                    $('#statusndlg').html('Uploading'+ (Math.round(percentComplete*100)) +'%');
                              }
         			           }, false);

                      return xhr;},
                      success: function(data,status){

                        if (data.status=='error') {
                            alert(data.msg);
                            loadBtn.disabled = false;
                            $("#statusndlg").html('Error Uploading');
                        };
                        if (data.status=='success') {
                          $('#ndlg').val('');
                          $("#statusndlg").html('File berhasil Diupload');
                          $('#barprogressndlg').removeClass('active');
                          loadBtn.disabled = false;
                          $('#file_ndlg').attr('href','<?php echo base_url('assets/files/ndlg/')?>'+data.msg);
                          //alert(data.msg);
                        };

                      },
                      cache: false,
                      contentType: false,
                      processData: false,
                  });
                  return false;
                };

          });
</script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
$(document).ready(function(){
  $('#checkboxnotadinas').each(function(){
  var self = $(this),
    label = self.next(),
    label_text = label.text();

  label.remove();
  self.iCheck({
    checkboxClass: 'icheckbox_line-blue',
    insert: '<div class="icheck_line-icon"></div>' + label_text
    });

    $('#checkboxnotadinas').on('ifChecked', function(event){
    //alert("File Nota Dinas ada dan siap diupload");
    $("#notadinasfile").removeAttr('disabled');
    $("#no_notadinas").removeAttr('disabled');
    $("#tanggal_notadinas").removeAttr('disabled');
    $("#tanggal_disposisi_sekretaris").removeAttr('disabled');
    $("#pengesah_disposisi_sekretaris").removeAttr('disabled');
    $("#tanggal_disposisi_inspektur").removeAttr('disabled');
    $("#pengesah_disposisi_inspektur").removeAttr('disabled');
    });

    $('#checkboxnotadinas').on('ifUnchecked', function(event){
    //alert("File Nota Dinas belum siap diupload");
    $("#notadinasfile").attr('disabled',true);
    $("#no_notadinas").attr('disabled',true);
    $("#tanggal_notadinas").attr('disabled',true);
    $("#tanggal_disposisi_sekretaris").attr('disabled',true);
    $("#pengesah_disposisi_sekretaris").attr('disabled',true);
    $("#tanggal_disposisi_inspektur").attr('disabled',true);
    $("#pengesah_disposisi_inspektur").attr('disabled',true);
    });

  });

  $('#checkboxspt').each(function(){
  var self = $(this),
    label = self.next(),
    label_text = label.text();

  label.remove();
  self.iCheck({
    checkboxClass: 'icheckbox_line-blue',
    insert: '<div class="icheck_line-icon"></div>' + label_text
    });

    $('#checkboxspt').on('ifChecked', function(event){
    //alert("File SPT ada dan siap diupload");
    $("#sptfile").removeAttr('disabled');
    $("#tanggal_ttd_spt_inspektur").removeAttr('disabled');
    $("#pengesah_spt_inspektur").removeAttr('disabled');
    });

    $('#checkboxspt').on('ifUnchecked', function(event){
    //alert("File SPT belum siap diupload");
    $("#sptfile").attr('disabled','disabled');
    $("#tanggal_ttd_spt_inspektur").attr('disabled','disabled');
    $("#pengesah_spt_inspektur").attr('disabled','disabled');
    });

  });

  $('#checkboxsuratkeluar').each(function(){

    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-blue',
      insert: '<div class="icheck_line-icon"></div>' + label_text
      });
  });

  $('#checkboxsuratkeluar').on('ifChanged', function(event){
    var checkboxChecked = $(this).is(':checked');

    if(checkboxChecked) {
        //alert("File Surat Keluar ada dan siap diupload");
        $("#suratkeluarfile").removeAttr('disabled');
        $("#no_surat_keluar").removeAttr('disabled');
        $("#perihal_surat_keluar").removeAttr('disabled');
        $("#tanggal_surat_keluar").removeAttr('disabled');
        $("#pengesah_surat_keluar").removeAttr('disabled');
    }else{
        //alert("File Surat Keluar belum siap diupload");
        $("#suratkeluarfile").attr('disabled','disabled');
        $("#no_surat_keluar").attr('disabled','disabled');
        $("#perihal_surat_keluar").attr('disabled','disabled');
        $("#tanggal_surat_keluar").attr('disabled','disabled');
        $("#pengesah_surat_keluar").attr('disabled','disabled');
    }
  });
});
</script>
<!-- end icheck box-->


<!-- datepicker -->
<script>
  $(document).ready(function(){

    $('#tanggal_lhp').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    });
  });
</script>
<!-- End Datepicker -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
function ajaxfilemanager(field_name, url, type, win)
{
 var ajaxfilemanagerurl = "<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
 switch (type) {
  case "image":
   break;
  case "media":
   break;
  case "flash":
   break;
  case "file":
   break;
  default:
   return false;
 }
  tinyMCE.activeEditor.windowManager.open(
  {
      url: "<?php echo base_url() ?>assets/plugins/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
      width: 782,
      height: 440,
      inline : "yes",
      close_previous : "no"
  },
  {
      window : win,
      input : field_name
  });
}
</script>

<script type="text/javascript">
tinyMCE.init(
{

// General options
mode : "textareas",
elements : "ajaxfilemanager",
file_browser_callback : 'ajaxfilemanager',

theme : "advanced",
plugins : "fullscreen,safari,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,print,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

// Theme options
theme_advanced_buttons1 : "fullscreen,undo,redo,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,insertfile,insertimage",
theme_advanced_buttons3 : "sub,sup,search,replace,|,bullist,numlist,|,outdent,indent,emotions,iespell,media,advhr",
theme_advanced_buttons4 : "image,charmap,preview,forecolor,backcolor,hr,removeformat,link,unlink,anchor,cite,visualaid",
theme_advanced_buttons5 : "tablecontrols",

theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
relative_urls : false,
remove_script_host : false,
});
</script>

<?php $this->load->view('back/footer'); ?>
