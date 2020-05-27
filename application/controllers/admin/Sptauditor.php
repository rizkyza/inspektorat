<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sptauditor extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Spt_model');
    $this->load->model('Skpd_model');
    $this->load->model('Auditor_model');
    $this->load->model('Ion_auth_model');
    $this->load->model('Tim_model');
    $this->load->model('Entry_tim_model');

    $this->data['module'] = 'SPT';

    /* cek login */
    if (!$this->ion_auth->logged_in()){
      // apabila belum login maka diarahkan ke halaman login
      redirect('admin/auth/login', 'refresh');
    }
    elseif($this->ion_auth->is_user()){
      // apabila belum login maka diarahkan ke halaman login
      redirect('admin/auth/login', 'refresh');
    }
  }

  public function index()
  {
    $this->data['title'] = "Data SPT Tim Auditor";

    $this->data['spt_data'] = $this->Spt_model->get_all_by_irban();
    $this->load->view('back/spt/spt_list_auditor', $this->data);
  }

  public function total_tim_by_irban()
  {
    $this->data['totaltimbyirban'] = $this->Spt_model->total_tim_by_irban();
    $r = $this->data['totaltimbyirban'];
    echo json_encode($r);
  }

  public function report_tim_auditor($id)
  {
		$this->load->library('m_pdf');


		$pdfFilePath ="DATA TIM AUDITOR-".time()."-download.pdf";
    $stylesheet = file_get_contents('mpdf.css');

    include('mpdf60/mpdf.php');
		$pdf = $this->m_pdf->load();

    $pdf->SetHTMLHeader('<div style="text-align:left; font-weight:bold;">
                          <img height="80" src="' . base_url() . 'assets/images/header.png"/>
                         </div><hr />');

    $pdf->SetHTMLFooter('<hr />
                <table width="100%">
                    <tr>
                        <td width="33%" style="font-size:9px; font-family:chelvetica;">{DATE j-m-Y}</td>
                        <td width="33%" align="center" style="font-size:9px; font-family:chelvetica;">{PAGENO}/{nbpg}</td>
                        <td width="33%" style="font-size:9px; font-family:chelvetica; text-align: right;">Downloader: '.$this->session->userdata('username').'</td>
                    </tr>
                </table>');

    $pdf->WriteHTML($stylesheet, 1);

    $pdf->AddPage('P', // L - landscape, P - portrait
        '', '', '', '',
        15, // margin_left
        15, // margin right
       40, // margin top
       20, // margin bottom
        5, // margin header
        5); // margin footer
    $pdf->SetDisplayMode('fullpage');

    $this->data['spt'] = $this->Spt_model->get_by_id($id);
    $no_spt = $this->data['spt']->no_spt;

    $this->data['auditor_data'] = $this->Entry_tim_model->get_auditor_tim($no_spt);
    $html=$this->load->view('back/spt/spt_auditor_view', $this->data,true);

		$pdf->WriteHTML($html,2);

		$pdf->Output($pdfFilePath, "D");
    exit();
  }

  public function view($id)
  {
    $this->data['spt'] = $this->Spt_model->get_by_id($id);
    $no_spt = $this->data['spt']->no_spt;

    $this->data['auditor_data'] = $this->Entry_tim_model->get_auditor_tim($no_spt);
    $this->load->view('back/spt/spt_auditor_view', $this->data);
  }

  public function update($id)
  {
    $this->data['sptx'] = $this->Spt_model->get_by_idspt($id);
    $nospt = $this->data['sptx']->no_spt;

    $rows = $this->Entry_tim_model->get_id_by_nospt_ketuatim($nospt);
    $nipketuatim = $rows;

    $user = $this->Tim_model->get_by_nospt_nip($nospt);
    $this->data['users'] = $this->Tim_model->get_by_nospt_nip($nospt);

    if (!$user)
    {
      $this->session->set_flashdata('message', 'Anda tidak termasuk dalam Tim Auditor SPT ini. '.$this->data['users']->no_spt);
      redirect(site_url('admin/sptauditor'));
    } else {

    $this->data['module2'] = 'Data SPT Tim Auditor';

    $row = $this->Spt_model->get_by_id($id);
    $this->data['spt'] = $this->Spt_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Data Tim Auditor';
      $this->data['action']         = site_url('admin/sptauditor/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_spt'] = array(
        'name'  => 'id_spt',
        'id'    => 'id_spt',
        'type'  => 'hidden',
      );

      $this->data['no_spt'] = array(
        'name'  => 'no_spt',
        'id'    => 'no_spt',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['nip_ketuatim'] = $nipketuatim;

      $this->data['nip_user'] = array(
        'name'  => 'nip_user',
        'id'    => 'nip_user',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
        'value' => $nipketuatim,
      );

      $this->data['nipcombo'] = array(
        'name'  => 'nipcombo',
        'id'    => 'nipcombo',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['nama_irban'] = array(
        'name'  => 'nama_irban',
        'id'    => 'nama_irban',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['tanggal_tugas'] = array(
        'name'  => 'tanggal_tugas',
        'id'    => 'tanggal_tugas',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['tim_data'] = $this->Tim_model->get_all_by_tim();
      $this->data['get_combo_auditor_by_irban'] = $this->Auditor_model->get_combo_auditor_by_irban();
      $this->load->view('back/spt/spt_edit_auditor', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/sptauditor'));
      }
    }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules_update();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_spt'));
      }
        else
        {
          $no_spt = $this->input->post('no_spt');

          $no_notadinas = $this->input->post('no_notadinas');
          $tanggal_notadinas = $this->input->post('tanggal_notadinas');
          $tanggal_disposisi_sekretaris = $this->input->post('tanggal_disposisi_sekretaris');
          $pengesah_disposisi_sekretaris = $this->input->post('pengesah_disposisi_sekretaris');
          $tanggal_disposisi_inspektur = $this->input->post('tanggal_disposisi_inspektur');
          $pengesah_disposisi_inspektur = $this->input->post('pengesah_disposisi_inspektur');

          $tanggal_ttd_spt_inspektur = $this->input->post('tanggal_ttd_spt_inspektur');
          $pengesah_spt_inspektur = $this->input->post('pengesah_spt_inspektur');

          $no_surat_keluar = $this->input->post('no_surat_keluar');
          $perihal_surat_keluar = $this->input->post('perihal_surat_keluar');
          $tanggal_surat_keluar = $this->input->post('tanggal_surat_keluar');
          $pengesah_surat_keluar = $this->input->post('pengesah_surat_keluar');

          $checked1 = $this->input->post('checkboxnotadinas');
          if(isset($checked1) == 1)
          {
            if($_FILES["notadinasfile"]["error"] <> 4)
            {
              $namanotadinasfile = 'notadinas-'.char_seo($this->input->post('no_spt'));

              $this->db->select("notadinasfile, notadinasfile_type");
              $this->db->where('no_spt',$no_spt);
              $query1 = $this->db->get('spt');
              $row1 = $query1->row();

              // menyimpan lokasi gambar dalam variable
              $dir1 = "assets/files/notadinas/".$row1->notadinasfile.$row1->notadinasfile_type;
              if (file_exists($dir1))
              {
                unlink($dir1);

              } else {

              };



              /* memanggil library upload ci */
              $config1['upload_path']      = './assets/files/notadinas/';
              $config1['allowed_types']    = 'png|jpg|jpeg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar';
              $config1['file_name']        = $namanotadinasfile; //nama yang terupload nantinya

              $this->load->library('upload', $config1, 'upload1');

              $this->upload1->initialize($config1);

              $this->upload1->do_upload('notadinasfile');

              $notadinasfile = $this->upload1->data();

              $notadinasfile_ext = $notadinasfile['file_ext'];
              $notadinasfile_size = $_FILES['notadinasfile']['size'];

              $data1 = array(
                'notadinasfile'               => $namanotadinasfile,
                'notadinasfile_type'          => $notadinasfile_ext,
                'notadinasfile_size'          => $notadinasfile_size,
                'no_notadinas'              => $no_notadinas,
                'tanggal_notadinas'              => $tanggal_notadinas,
                'tanggal_disposisi_sekretaris'              => $tanggal_disposisi_sekretaris,
                'pengesah_disposisi_sekretaris'              => $pengesah_disposisi_sekretaris
              );

              ///////////////////////////////////////
            } else {
              $data1 = array (
                'no_notadinas'              => $no_notadinas,
                'tanggal_notadinas'              => $tanggal_notadinas,
                'tanggal_disposisi_sekretaris'              => $tanggal_disposisi_sekretaris,
                'pengesah_disposisi_sekretaris'              => $pengesah_disposisi_sekretaris
              );
            };
          } else {
            $data1 = array (
            );
          };

          $checked2 = $this->input->post('checkboxspt');
          if(isset($checked2) == 1)
          {
            if($_FILES["sptfile"]["error"] <> 4)
            {
              $namasptfile = 'spt-'.char_seo($this->input->post('no_spt'));

              $this->db->select("sptfile, sptfile_type");
              $this->db->where('no_spt',$no_spt);
              $query2 = $this->db->get('spt');
              $row2 = $query2->row();

              // menyimpan lokasi gambar dalam variable
              $dir2 = "assets/files/spt/".$row2->sptfile.$row2->sptfile_type;
                if (file_exists($dir2))
                {
                  unlink($dir2);

                } else {

                };

              /* memanggil library upload ci */
              $config2['upload_path']      = './assets/files/spt/';
              $config2['allowed_types']    = 'png|jpg|jpeg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar';
              $config2['file_name']        = $namasptfile; //nama yang terupload nantinya

              $this->load->library('upload', $config2, 'upload2');

              $this->upload2->initialize($config2);

              $this->upload2->do_upload('sptfile');

              $sptfile = $this->upload2->data();

              $sptfile_ext = $sptfile['file_ext'];
              $sptfile_size = $sptfile['file_size'];

              $data2 = array(
                'sptfile'               => $namasptfile,
                'sptfile_type'          => $sptfile_ext,
                'sptfile_size'          => $sptfile_size,
                'tanggal_ttd_spt_inspektur'              => $tanggal_ttd_spt_inspektur,
                'pengesah_spt_inspektur'              => $pengesah_spt_inspektur
              );

            ///////////////////////////////////////
          } else {
            $data2 = array (
              'tanggal_ttd_spt_inspektur'              => $tanggal_ttd_spt_inspektur,
              'pengesah_spt_inspektur'              => $pengesah_spt_inspektur
            );
          };
        } else {
          $data2 = array (
          );
        };

        $checked3 = $this->input->post('checkboxsuratkeluar');
        if(isset($checked3) == 1)
        {
          if($_FILES["suratkeluarfile"]["error"] <> 4)
          {
            $namasuratkeluarfile = 'suratkeluar-'.char_seo($this->input->post('no_spt'));

            $this->db->select("suratkeluarfile, suratkeluarfile_type");
            $this->db->where('no_spt',$no_spt);
            $query3 = $this->db->get('spt');
            $row3 = $query3->row();

            // menyimpan lokasi gambar dalam variable

            $dir3 = "assets/files/suratkeluar/".$row3->suratkeluarfile.$row3->suratkeluarfile_type;
              if (file_exists($dir3))
              {
                unlink($dir3);

              } else {

              };

            /* memanggil library upload ci */
            $config3['upload_path']      = './assets/files/suratkeluar/';
            $config3['allowed_types']    = 'png|jpg|jpeg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar';
            $config3['file_name']        = $namasuratkeluarfile; //nama yang terupload nantinya

            $this->load->library('upload', $config3, 'upload3');

            $this->upload3->initialize($config3);

            $this->upload3->do_upload('suratkeluarfile');

            $suratkeluarfile = $this->upload3->data();

            $suratkeluarfile_ext = $suratkeluarfile['file_ext'];
            $suratkeluarfile_size = $suratkeluarfile['file_size'];

            $data3 = array(
              'suratkeluarfile'               => $namasuratkeluarfile,
              'suratkeluarfile_type'          => $suratkeluarfile_ext,
              'suratkeluarfile_size'          => $suratkeluarfile_size,
              'no_surat_keluar'              => $no_surat_keluar,
              'perihal_surat_keluar'              => $perihal_surat_keluar,
              'tanggal_surat_keluar'              => $tanggal_surat_keluar,
              'pengesah_surat_keluar'              => $pengesah_surat_keluar
            );

          ///////////////////////////////////////
        } else {
          $data3 = array (
            'no_surat_keluar'              => $no_surat_keluar,
            'perihal_surat_keluar'              => $perihal_surat_keluar,
            'tanggal_surat_keluar'              => $tanggal_surat_keluar,
            'pengesah_surat_keluar'              => $pengesah_surat_keluar
          );
        };
      } else {
        $data3 = array (
        );
      };

          $arraynospt = array('no_spt'  => $this->input->post('no_spt'));

          $data4 = array(
            'updater'              => $this->session->userdata('identity'),
            'time_updater'       => date('Y-m-d H:i:s')
          );

          $data = array_merge($arraynospt, $data1, $data2, $data3, $data4);

          $this->Spt_model->update($this->input->post('id_spt'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/spt'));
        }
    }

    public function delete($id)
    {
      $row = $this->Spt_model->get_by_id($id);

      if ($row)
      {
        $this->Spt_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/spt'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/spt'));
        }
    }

    public function _rules()
    {

      //$this->form_validation->set_rules('tahun', 'Tahun SPT', 'trim|required');
      $this->form_validation->set_rules('no_spt', 'No SPT', 'trim|required');
      $this->form_validation->set_rules('keperluan_spt', 'Keperluan SPT', 'trim|required');
      $this->form_validation->set_rules('tanggal_spt', 'Tanggal SPT', 'trim|required');
      $this->form_validation->set_rules('tanggal_tugas', 'Tanggal Tugas', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_spt', 'id_spt', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');
    }

    public function _rules_update()
    {

      //$this->form_validation->set_rules('tahun', 'Tahun SPT', 'trim|required');
      $this->form_validation->set_rules('no_spt', 'No SPT', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_spt', 'id_spt', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');
    }

    function fetch_user(){
         $this->load->model("Entry_tim_model");
         $this->load->model("Spt_model");
         $no_spt = $_POST["no_spt"];

         $rows = $this->Entry_tim_model->get_id_by_nospt_ketuatim($no_spt);
         $nipketuatim = $rows;

         $fetch_data = $this->Entry_tim_model->make_datatables($no_spt);
         $data = array();

         if($this->ion_auth->is_superadmin()){
             foreach($fetch_data as $row)
             {
                  if ($row->foto){
                    $pathfoto = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" />';
                  } else {
                    $pathfoto = '<img src="'.base_url().'assets/images/no_image_thumb.png" class="img-thumbnail" width="50" height="35" />';
                  }
                  $sub_array = array();
                  $sub_array[] = $pathfoto;
                  $sub_array[] = $row->nip;
                  $sub_array[] = $row->nama;
                  $sub_array[] = $row->jabatan;
                  if ($row->jabatan <> 'Ketua Tim'){
                  $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
                  } else {
                  $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
                  }
                  $data[] = $sub_array;
             }

             $output = array(
                  "draw"                    =>     intval($_POST["draw"]),
                  "recordsTotal"          =>      $this->Entry_tim_model->get_all_data(),
                  "recordsFiltered"     =>     $this->Entry_tim_model->get_filtered_data(),
                  "data"                    =>     $data
             );
             echo json_encode($output);
          } else if ($this->ion_auth->is_auditor() && $nipketuatim == $this->session->userdata('nip')){
              foreach($fetch_data as $row)
              {
                  if ($row->foto){
                    $pathfoto = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" />';
                  } else {
                    $pathfoto = '<img src="'.base_url().'assets/images/no_image_thumb.png" class="img-thumbnail" width="50" height="35" />';
                  }
                   $sub_array = array();
                   $sub_array[] = $pathfoto;
                   $sub_array[] = $row->nip;
                   $sub_array[] = $row->nama;
                   $sub_array[] = $row->jabatan;
                   if ($row->jabatan <> 'Ketua Tim'){
                   $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
                   } else {
                   $sub_array[] = '';
                   }
                   $data[] = $sub_array;
              }

              $output = array(
                   "draw"                    =>     intval($_POST["draw"]),
                   "recordsTotal"          =>      $this->Entry_tim_model->get_all_data(),
                   "recordsFiltered"     =>     $this->Entry_tim_model->get_filtered_data(),
                   "nip"                => $nipketuatim,
                   "data"                    =>     $data
              );
              echo json_encode($output);
          } else {
            foreach($fetch_data as $row)
            {
                if ($row->foto){
                  $pathfoto = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" />';
                } else {
                  $pathfoto = '<img src="'.base_url().'assets/images/no_image_thumb.png" class="img-thumbnail" width="50" height="35" />';
                }
                 $sub_array = array();
                 $sub_array[] = $pathfoto;
                 $sub_array[] = $row->nip;
                 $sub_array[] = $row->nama;
                 $sub_array[] = $row->jabatan;
                 $data[] = $sub_array;
            }

            $output = array(
                 "draw"                    =>     intval($_POST["draw"]),
                 "recordsTotal"          =>      $this->Entry_tim_model->get_all_data(),
                 "recordsFiltered"     =>     $this->Entry_tim_model->get_filtered_data(),
                 "nip"                => $nipketuatim,
                 "data"                    =>     $data
            );
            echo json_encode($output);
          }

    }
    function user_action(){
         $this->load->helper('char_seo_helper');
         $no_spt = $this->input->post('no_spt');
         //echo $no_spt;
         if($_POST["action"] == "Add")
         {
              $insert_data = array(
                   'no_spt'          =>     $this->input->post('no_spt'),
                   'nama_irban'          =>     $this->input->post('nama_irban'),
                   'nama_irban_seo'          =>     char_seo($this->input->post('nama_irban')),
                   'tanggal_tugas'          =>     $this->input->post('tanggal_tugas'),
                   'nip'          =>     $this->input->post('nip'),
                   'nama'               =>     $this->input->post("nama"),
                   'jabatan'               =>     $this->input->post("jabatan"),
                   'foto'               =>     $this->input->post("foto"),
                   'uploader'               =>     $this->session->userdata('identity'),
                   'time_uploader'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Entry_tim_model');
              $this->Entry_tim_model->insert_crud($insert_data);


              $this->load->model('Ion_auth_model');
              $username = $this->Ion_auth_model->get_username_by_nip($this->input->post('nip'));

              if ($this->input->post("jabatan") == 'Pengendali Teknis'){
                    $datadalnis = array(
                      'dalnis'              => $username
                    );
                    $this->Spt_model->update_by_nospt($no_spt, $datadalnis);
              }

              if ($this->ion_auth->is_superadmin()){
                if ($this->input->post("jabatan") == 'Ketua Tim'){
                      $dataketuatim = array(
                        'ketua_tim'              => $username
                      );
                      $this->Spt_model->update_by_nospt($this->input->post('no_spt'), $dataketuatim);
                }
              }
         }
         if($_POST["action"] == "Edit")
         {
              $updated_data = array(
                  'no_spt'          =>     $this->input->post('no_sptau'),
                  'nama_irban'          =>     $this->input->post('nama_irbanau'),
                  'nama_irban_seo'          =>     char_seo($this->input->post('nama_irbanau')),
                  'tanggal_tugas'          =>     $this->input->post('tanggal_tugasau'),
                   'nip'          =>     $this->input->post('nip'),
                   'nama'               =>     $this->input->post("nama"),
                   'jabatan'               =>     $this->input->post("jabatan"),
                   'foto'               =>     $this->input->post("foto")
              );
              $this->load->model('Entry_tim_model');
              $this->Entry_tim_model->update_crud($this->input->post("user_id"), $updated_data);


              $this->load->model('Ion_auth_model');
              $username = $this->Ion_auth_model->get_username_by_nip($this->input->post('nip'));

              if ($this->input->post("jabatan") == 'Pengendali Teknis'){
                    $dataketuatim = array(
                      'dalnis'              => $username
                    );
                    $this->Spt_model->update_by_nospt($this->input->post('no_spt'), $dataketuatim);
              }

              if ($this->ion_auth->is_superadmin()){
                if ($this->input->post("jabatan") == 'Ketua Tim'){
                      $dataketuatim = array(
                        'ketua_tim'              => $username
                      );
                      $this->Spt_model->update_by_nospt($this->input->post('no_spt'), $dataketuatim);
                }
              }

              echo 'Data Updated';
         }
    }
    function upload_image()
    {
         if(isset($_FILES["user_image"]))
         {
              $extension = explode('.', $_FILES['user_image']['name']);
              $new_name = rand() . '.' . $extension[1];
              $destination = './assets/images/auditor/' . $new_name;
              move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
              return $new_name;
         }
    }
    function fetch_single_user()
    {
         $output = array();
         $this->load->model("Entry_tim_model");
         $data = $this->Entry_tim_model->fetch_single_user($_POST["user_id"]);
         foreach($data as $row)
         {
              $output['nip'] = $row->nip;
              $output['nama'] = $row->nama;
              if($row->foto != '')
              {
                   $output['user_image'] = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';
              }
              else
              {
                   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
              }
         }
         echo json_encode($output);
    }

    function delete_single_user()
    {
        $this->load->model('Entry_tim_model');
        $this->Entry_tim_model->delete_single_user($_POST["user_id"]);
        echo 'Data telah dihapus';

    }
    function fetch_single_id()
    {
        $output = array();
        $this->load->model("Auditor_model");
        $data = $this->Auditor_model->fetch_single_id($_POST["nip"]);
        foreach($data as $row)
        {
             $output['nama_auditor'] = $row->nama_auditor;
             $output['foto'] = $row->foto;
        }
        echo json_encode($output);

    }
    function fetch_single_penanggungjawab()
    {
        $output = array();
        $this->load->model("Auditor_model");
        $data = $this->Auditor_model->fetch_single_penanggungjawab($_POST["jabatan"]);
        foreach($data as $row)
        {
             $output['nama'] = $row->nama;
             $output['nip'] = $row->nip;
             $output['foto'] = $row->foto;
        }
        echo json_encode($output);

    }


  }
