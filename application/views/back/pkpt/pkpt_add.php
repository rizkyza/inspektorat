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
    <div class="box-body">
      <div class='row'>
          <div class="col-md-12">
              <div class="panel panel-primary">
              <div class="panel-heading"><b>Info Irbanwil</b></div>
                <div class="panel-body">
                  <div class="box-body">
                    <div id="external-events">
                      <div class="col-md-3">
                        <div class="external-event bg-light-blue">Irbanwil 01</div>
                      </div>
                      <div class="col-md-3">
                        <div class="external-event bg-yellow">Irbanwil 02</div>
                      </div>
                      <div class="col-md-3">
                        <div class="external-event bg-green">Irbanwil 03</div>
                      </div>
                      <div class="col-md-3">
                        <div class="external-event bg-red">Irbanwil 04</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  <div class="box-body">
    <div class='row'>
        <div class="col-md-12">
            <div class="panel panel-primary">
            <div class="panel-heading"><b>PKPT</b></div>
              <div class="panel-body">
                <!-- <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jadwal Pemeriksaan</button> -->
                <div class="box-body">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div id="userModal" class="modal fade ">
      <div class="modal-dialog modal-lg" >
           <form method="post" id="user_form">
                <div class="modal-content">
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Detail Jadwal Pemeriksaan</h4>
                     </div>
                     <div class="modal-body">

                       <div class="form-group"><label>SKPD</label>
                         <input type="text" name="skpd" id="skpd" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Irbanwil</label>
                         <input type="text" name="irbanwil" id="irbanwil" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Tanggal Awal</label>
                         <input type="text" name="date_start" id="date_start" class="form-control" readonly/>
                       </div>
                       <div class="form-group"><label>Tanggal Akhir</label>
                         <input type="text" name="date_end" id="date_end" class="form-control" readonly/>
                       </div>


                     </div>
                     <div class="modal-footer">
                          <input type="hidden" name="id_pkpt" id="id_pkpt" class="form-control" readonly/>
                          <button type="button" class="btn btn-danger" name="hapuspkpt" id="hapuspkpt">Delete</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                </div>
           </form>
      </div>
 </div>

 <div id="useraddModal" class="modal fade ">
       <div class="modal-dialog modal-lg" >
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Jadwal Pemeriksaan</h4>
              </div>
                  <div class="modal-body">

                    <div class="col-md-3">
                      <div class="external-event bg-light-blue">Irbanwil 01</div>
                    </div>
                    <div class="col-md-3">
                      <div class="external-event bg-yellow">Irbanwil 02</div>
                    </div>
                    <div class="col-md-3">
                      <div class="external-event bg-green">Irbanwil 03</div>
                    </div>
                    <div class="col-md-3">
                      <div class="external-event bg-red">Irbanwil 04</div>
                    </div>

                      <form method="post" id="user_form_add">
                        <div class="form-group"><label>SKPD</label>
                          <?php echo form_dropdown('',$get_combo_skpd,'',$skpdt); ?>
                        </div>
                        <div class="form-group"><label>Irbanwil</a></label>
                           <?php echo form_dropdown('',$get_combo_irban,'',$irbanwilt); ?>
                        </div>
                        <div class="form-group"><label>Tanggal Awal</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                             </div>
                              <input type="date" name="date_startt" id="date_startt" class="form-control" readonly/>
                          </div>
                        </div>
                        <div class="form-group"><label>Tanggal Akhir</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                             </div>
                             <input type="date" name="date_endt" id="date_endt" class="form-control"/>
                          </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                           <input type="hidden" name="id_pkptt" id="id_pkptt" class="form-control" readonly/>
                           <input type="hidden" name="colort" id="colort" class="form-control" readonly/>
                           <input type="submit" name="action" id="action" class="btn btn-success" value="Tambah" />
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </form>
       </div>
  </div>

<script type="text/javascript" language="javascript" >
  $('#irbanwilt').change(function(){
    var colorirbanwil1 = '#3C8DBC';
    var colorirbanwil2 = '#F39C12';
    var colorirbanwil3 = '#01A65A';
    var colorirbanwil4 = '#DD4B39';
    var irbanwil1 = 'Irbanwil 01';
    var irbanwil2 = 'Irbanwil 02';
    var irbanwil3 = 'Irbanwil 03';
    var irbanwil4 = 'Irbanwil 04';

    if (irbanwil1 == $("#irbanwilt :selected").text()){
      //alert('1 '+colorirbanwil1);
      $('#colort').val(colorirbanwil1);
    } else
    if (irbanwil2 == $("#irbanwilt :selected").text()){
      //alert('2 '+colorirbanwil2);
      $('#colort').val(colorirbanwil2);
    } else
    if (irbanwil3 == $("#irbanwilt :selected").text()){
      // alert('3 '+colorirbanwil3);
      $('#colort').val(colorirbanwil3);
    } else
    if (irbanwil4 == $("#irbanwilt :selected").text()){
      // alert('4 '+colorirbanwil4);
      $('#colort').val(colorirbanwil4);
    };
  });


</script>

<script src='<?php echo base_url();?>assets/plugins/fullcalendar/locale/id.js'></script>
<script>
	$(document).ready(function() {

    //update pkpt drag
    $.post('<?php echo base_url();?>admin/pkpt_calendar/get_pkpt',
			function(data){
				//alert(data);
        $('#calendar').fullCalendar({
    			header: {
    				left: 'prev,next today',
    				center: 'title',
    				right: 'month',
    			},
    			defaultDate: new Date(),
    			navLinks: true, // can click day/week names to navigate views
    			editable: true,
    			eventLimit: true, // allow "more" link when too many events
          businessHours: true,
    			events: $.parseJSON(data),

          eventDrop: function(event, delta, revertFunc){
						var id_pkpt = event.id;
						var start = event.start.format();
						var end = event.end.format();
            //alert (event.title+" - "+event.id+" - "+event.start.format()+" - "+event.end.format());
            if (!confirm("Yakin untuk memindah jadwal pemeriksaan?")) {
							revertFunc();
						}else{
							$.post("<?php echo base_url();?>admin/pkpt_calendar/update_pkpt",
							{
								id_pkpt:id_pkpt,
								date_start:start,
								date_end:end
							},
							function(data){
								if (data == 1) {
									swal('Info','Jadwal pemeriksaan berhasil dipindahkan','success');
								}else{
									swal('Alert','Terjadi Error dalam pemindahan jadwal pemeriksaan','error');
								}
							});
						}
          },

          //update pkpt resize
          eventResize: function(event, delta, revertFunc) {
				    var id_pkpt = event.id;
            var skpd = event.skpd;
						var start = event.start.format();
						var end = event.end.format();

						if (!confirm("Yakin untuk mengubah panjang jadwal pemeriksaan?")) {
							revertFunc();
						}else{
							$.post("<?php echo base_url();?>admin/pkpt_calendar/update_pkpt",
							{
								id_pkpt:id_pkpt,
								date_start:start,
								date_end:end
							},
							function(data){
								if (data == 1) {
									swal('Info','Panjang jadwal pemeriksaan disimpan','success');
								}else{
									swal('Alert','Terjadi Error dalam pengubahan panjang jadwal pemeriksaan','error');
								}
							});
						}
				  },

          //detail pkpt view
          eventClick: function(event, jsEvent, view) {
            var datestart = ($.fullCalendar.moment(event.start).format('YYYY-MM-DD'));
            var dateend = ($.fullCalendar.moment(event.end).format('YYYY-MM-DD'));
            var week = new Date(datestart);
                week.setDate(week.getDate()+7);
                week = ($.fullCalendar.moment(week).format('YYYY-MM-DD'));
                //alert(datestart+' - '+week);

             //alert(event.title);
             $('#id_pkpt').val(event.id);
             $('#skpd').val(event.title);
             $('#irbanwil').val(event.irbanwil);
             $('#date_start').val(datestart);
             $('#date_end').val(dateend);
            // $('#mtitulo').html(event.title);
            // $('#txtBandaRP').val(event.title);
            $('#userModal').modal();

            if (event.url) {
              window.open(event.url);
              return false;
            }
          },

          //detail pkpt delete
          dayClick: function(date, jsEvent, view) {
            var dateclick = date.format();
            var dateend = date.format();
                // dateend.setDate(dateend.getDate()+7);
                // dateend = ($.fullCalendar.moment(dateend).format('YYYY-MM-DD'));
            //alert('Clicked on: ' + date.format());
            //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            //alert('Current view: ' + view.name);
            if (!confirm("Apakah ingin menambah jadwal pemeriksaan ditanggal "+dateclick+"?")) {
              return false;
            }else{
              $('#date_startt').val(date.format());
              $('#date_endt').val(date.format());
              $('#useraddModal').modal();

            }
          }
    		});

        //hapus pkpt
        $('#hapuspkpt').click(function(){
          var id_pkpt = $('#id_pkpt').val();
          //alert(id_pkpt);
          if (!confirm("Yakin untuk menghapus jadwal pemeriksaan ditanggal?")) {
            return false;
          }else{

            $.post("<?php echo base_url();?>admin/pkpt_calendar/delete_pkpt",
            {
              id_pkpt:id_pkpt
            },
            function(data){
              //alert(data);
              if (data == 1) {
                $('#userModal').modal('hide');
                swal('Info','Jadwal pemeriksaan berhasil dihapus','success');
              }else{
                swal('Alert','Terjadi Error dalam penghapusan jadwal pemeriksaan','error');
              }
            });
          }
          $('#calendar').fullCalendar( 'removeEvents', id_pkpt);
        });

        $(document).on('submit', '#user_form_add', function(){
             var skpd = $('#skpdt').val();
             var irbanwil = $('#irbanwilt').val();
             var date_start = $('#date_startt').val();
             var date_end = $('#date_endt').val();
             var color = $('#colort').val();
             var uploader = $('#colort').val();
             //alert();

             if ((date_end == '') || (skpd == '') || (irbanwil == '') || (color == ''))
             {
               swal("Alert","Ada data yang belum dilengkapi.","error");
             } else {
               $.post("<?php echo base_url();?>admin/pkpt_calendar/create_pkpt",
               {
                 skpd:skpd,
                 irbanwil:irbanwil,
                 date_start:date_start,
                 date_end:date_end,
                 color:color
               },
               function(data){
                 if (data == 0) {
                   $('#user_form_add')[0].reset();
                   $('#useraddModal').modal('hide');
                   swal('Info','Jadwal pemeriksaan berhasil disimpan','success');
                   //$('#calendar').fullCalendar('refetchEvents');
                   $('#calendar').fullCalendar('updateEvent',event);

                   //$('#calendar').fullCalendar( 'removeEvents', id_pkpt);
                 }else{
                   swal('Alert','Terjadi Error dalam penyimpanan jadwal pemeriksaan','error');
                 }
               });
           }
        });

			});
	});
</script>

<!-- datepicker -->
<script>
  $(document).ready(function(){

    $('#date_endt').datepicker({
      format: "yyyy-mm-dd",
      language: 'id',
      autoclose: true
    }).datepicker("setDate", new Date());

  });
</script>

<style>
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>

<?php $this->load->view('back/footer'); ?>
