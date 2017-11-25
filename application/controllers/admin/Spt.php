<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Spt extends CI_Controller
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
    $this->data['title'] = "Data SPT";

    $this->data['spt_data'] = $this->Spt_model->get_all_by_irban();
    $this->load->view('back/spt/spt_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Input SPT';
    $this->data['action']         = site_url('admin/spt/create_action');
    $this->data['button_submit']  = 'Submit';
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
      'value' => $this->form_validation->set_value('no_spt'),
    );

    $this->data['tahun'] = array(
      'name'  => 'tahun',
      'id'    => 'tahun',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('tahun'),
    );

    $this->data['nama_skpd'] = array(
      'name'  => 'nama_skpd',
      'id'    => 'nama_skpd',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_skpd'),
    );

    $this->data['nama_skpd_seo'] = array(
      'name'  => 'nama_skpd_seo',
      'id'    => 'nama_skpd_seo',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_skpd_seo'),
    );

    $this->data['nama_irban'] = array(
      'name'  => 'nama_irban',
      'id'    => 'nama_irban',
      'type'  => 'text',
      'readonly' => 'readonly',
      'class' => 'form-control',
      'value' => $this->session->userdata('usertype'),
    );

    $this->data['nama_irban_seo'] = array(
      'name'  => 'nama_irban_seo',
      'id'    => 'nama_irban_seo',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban_seo'),
    );

    $this->data['tanggal_spt'] = array(
      'name'  => 'tanggal_spt',
      'id'    => 'tanggal_spt',
      'type'  => 'date',
      'class' => 'form-control',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_spt'),
    );

    $this->data['keperluan_spt'] = array(
      'name'  => 'keperluan_spt',
      'id'    => 'keperluan_spt',
      'type'  => 'date',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('keperluan_spt'),
    );

    $this->data['tanggal_tugas'] = array(
      'name'  => 'tanggal_tugas',
      'id'    => 'tanggal_tugas',
      'type'  => 'date',
      'class' => 'form-control',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_tugas'),
    );

    $this->data['nama_auditor'] = array(
      'name'  => 'nama_auditor',
      'id'    => 'nama_auditor',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_auditor'),
    );

    $this->data['status'] = array(
      'name'  => 'status',
      'id'    => 'status',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => 'open',
    );

    $this->data['nip'] = array(
      'name'  => 'nip',
      'id'    => 'nip',
      'type'  => 'text',
      'class' => 'form-control',
    );

    $this->data['no_notadinas'] = array(
      'name'  => 'no_notadinas',
      'id'    => 'no_notadinas',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('no_notadinas'),
      'disabled' => 'disabled',
    );

    $this->data['tanggal_notadinas'] = array(
      'name'  => 'tanggal_notadinas',
      'id'    => 'tanggal_notadinas',
      'type'  => 'date',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_notadinas'),
    );

    $this->data['tanggal_disposisi_sekretaris'] = array(
      'name'  => 'tanggal_disposisi_sekretaris',
      'id'    => 'tanggal_disposisi_sekretaris',
      'type'  => 'date',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_disposisi_sekretaris'),
    );

    $this->data['pengesah_disposisi_sekretaris'] = array(
      'name'  => 'pengesah_disposisi_sekretaris',
      'id'    => 'pengesah_disposisi_sekretaris',
      'type'  => 'text',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'value' => $this->form_validation->set_value('pengesah_disposisi_sekretaris'),
    );

    $this->data['tanggal_disposisi_inspektur'] = array(
      'name'  => 'tanggal_disposisi_inspektur',
      'id'    => 'tanggal_disposisi_inspektur',
      'type'  => 'date',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_disposisi_inspektur'),
    );

    $this->data['pengesah_disposisi_inspektur'] = array(
      'name'  => 'pengesah_disposisi_inspektur',
      'id'    => 'pengesah_disposisi_inspektur',
      'type'  => 'text',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'value' => $this->form_validation->set_value('pengesah_disposisi_inspektur'),
    );

    $this->data['tanggal_spt_inspektur'] = array(
      'name'  => 'tanggal_spt_inspektur',
      'id'    => 'tanggal_spt_inspektur',
      'type'  => 'date',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_spt_inspektur'),
    );

    $this->data['pengesah_spt_inspektur'] = array(
      'name'  => 'pengesah_spt_inspektur',
      'id'    => 'pengesah_spt_inspektur',
      'type'  => 'text',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'value' => $this->form_validation->set_value('pengesah_spt_inspektur'),
    );

    $this->data['no_surat_keluar'] = array(
      'name'  => 'no_surat_keluar',
      'id'    => 'no_surat_keluar',
      'type'  => 'text',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'value' => $this->form_validation->set_value('no_surat_keluar'),
    );

    $this->data['perihal_surat_keluar'] = array(
      'name'  => 'perihal_surat_keluar',
      'id'    => 'perihal_surat_keluar',
      'type'  => 'text',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'value' => $this->form_validation->set_value('perihal_surat_keluar'),
    );

    $this->data['tanggal_surat_keluar'] = array(
      'name'  => 'tanggal_surat_keluar',
      'id'    => 'tanggal_surat_keluar',
      'type'  => 'date',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'readonly' => 'readonly',
      'value' => $this->form_validation->set_value('tanggal_surat_keluar'),
    );

    $this->data['pengesah_surat_keluar'] = array(
      'name'  => 'pengesah_surat_keluar',
      'id'    => 'pengesah_surat_keluar',
      'type'  => 'text',
      'class' => 'form-control',
      'disabled' => 'disabled',
      'value' => $this->form_validation->set_value('pengesah_surat_keluar'),
    );

    $this->data['tim_data'] = $this->Tim_model->get_all_by_tim();
    $this->data['get_combo_skpd'] = $this->Skpd_model->get_combo_skpd_by_pkpt();
    $this->data['get_combo_auditor_by_irban'] = $this->Auditor_model->get_combo_auditor_by_irban();
    $this->load->view('back/spt/spt_add', $this->data);
  }

  public function create_action()
  {
    $no_spt = $this->input->post('no_spt');
    $row = $this->Spt_model->get_by_no_spt($no_spt);
    $this->data['spt'] = $this->Spt_model->get_by_no_spt($no_spt);

    if ($row)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      No SPT sudah ada
      </div>');
      redirect(site_url('admin/spt/create'));
    }
    else
    {

    $this->load->helper('char_seo_helper');
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->create();
    }
      else
    {

        $checked1 = $this->input->post('checkboxnotadinas');
        if(isset($checked1) == 1)
        {
          $namanotadinasfile = 'notadinas-'.char_seo($this->input->post('no_spt'));

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/files/notadinas/';
          $config['allowed_types']    = 'png|jpg|jpeg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar';
          $config['max_width']        = '0'; //pixels
          $config['max_height']       = '0'; //pixels
          $config['file_name']        = $namanotadinasfile; //nama yang terupload nantinya

          $this->load->library('upload', $config, 'upload1');

          $this->upload1->initialize($config);

          $this->upload1->do_upload('notadinasfile');

          $notadinasfile = $this->upload1->data();

          $notadinasfile_ext = $notadinasfile['file_ext'];
          $notadinasfile_size = $notadinasfile['file_size'];

          $no_notadinas = $this->input->post('no_notadinas');
          $tanggal_notadinas = $this->input->post('tanggal_notadinas');
          $tanggal_disposisi_sekretaris = $this->input->post('tanggal_disposisi_sekretaris');
          $pengesah_disposisi_sekretaris = $this->input->post('pengesah_disposisi_sekretaris');
          $tanggal_disposisi_inspektur = $this->input->post('tanggal_disposisi_inspektur');
          $pengesah_disposisi_inspektur = $this->input->post('pengesah_disposisi_inspektur');
          ///////////////////////////////////////
        } else {
          $namanotadinasfile = '';
          $notadinasfile_ext = '';
          $notadinasfile_size = 0;

          $no_notadinas = '';
          $tanggal_notadinas = '';
          $tanggal_disposisi_sekretaris = '';
          $pengesah_disposisi_sekretaris = '';
          $tanggal_disposisi_inspektur = '';
          $pengesah_disposisi_inspektur = '';
        };

        $checked2 = $this->input->post('checkboxspt');
        if(isset($checked2) == 1)
        {
          $namasptfile = 'spt-'.char_seo($this->input->post('no_spt'));

          /* memanggil library upload ci */
          $config2['upload_path']      = './assets/files/spt/';
          $config2['allowed_types']    = 'png|jpg|jpeg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar';
          $config2['max_width']        = '0'; //pixels
          $config2['max_height']       = '0'; //pixels
          $config2['file_name']        = $namasptfile; //nama yang terupload nantinya

          $this->load->library('upload', $config2, 'upload2');

          $this->upload2->initialize($config2);

          $this->upload2->do_upload('sptfile');

          $sptfile = $this->upload2->data();

          $sptfile_ext = $sptfile['file_ext'];
          $sptfile_size = $sptfile['file_size'];

          $tanggal_spt_inspektur = $this->input->post('tanggal_spt_inspektur');
          $pengesah_spt_inspektur = $this->input->post('pengesah_spt_inspektur');
          /////////////////////////////////
        } else {
          $namasptfile = '';
          $sptfile_ext = '';
          $sptfile_size = 0;

          $tanggal_spt_inspektur = '';
          $pengesah_spt_inspektur = '';
        };

        $checked3 = $this->input->post('checkboxsuratkeluar');
        if(isset($checked3) == 1)
        {
          $namasuratkeluarfile = 'suratkeluar-'.char_seo($this->input->post('no_spt'));

          /* memanggil library upload ci */
          $config3['upload_path']      = './assets/files/suratkeluar/';
          $config3['allowed_types']    = 'png|jpg|jpeg|doc|docx|txt|pdf|xls|xlsx|ptt|pttx|zip|rar';
          $config3['max_width']        = '0'; //pixels
          $config3['max_height']       = '0'; //pixels
          $config3['file_name']        = $namasuratkeluarfile; //nama yang terupload nantinya

          $this->load->library('upload', $config3, 'upload3');

          $this->upload3->initialize($config3);

          $this->upload3->do_upload('suratkeluarfile');

          $suratkeluarfile = $this->upload3->data();

          $suratkeluarfile_ext = $suratkeluarfile['file_ext'];
          $suratkeluarfile_size = $suratkeluarfile['file_size'];

          $no_surat_keluar = $this->input->post('no_surat_keluar');
          $perihal_surat_keluar = $this->input->post('perihal_surat_keluar');
          $tanggal_surat_keluar = $this->input->post('tanggal_surat_keluar');
          $pengesah_surat_keluar = $this->input->post('pengesah_surat_keluar');

          /////////////////////////////////////////
        } else {
          $namasuratkeluarfile = '';
          $suratkeluarfile_ext = '';
          $suratkeluarfile_size = 0;

          $no_surat_keluar = '';
          $perihal_surat_keluar = '';
          $tanggal_surat_keluar = '';
          $pengesah_surat_keluar = '';
        };
              $data = array(
                'no_spt'  => $this->input->post('no_spt'),
                'tahun'  => $this->input->post('tahun'),
                'nama_skpd'  => $this->input->post('nama_skpd'),
                'nama_skpd_seo'  => char_seo($this->input->post('nama_skpd')),
                'nama_irban'  => $this->input->post('nama_irban'),
                'nama_irban_seo'  => char_seo($this->input->post('nama_irban')),
                'tanggal_spt'  => $this->input->post('tanggal_spt'),
                'keperluan_spt'  => $this->input->post('keperluan_spt'),
                'tanggal_tugas'  => $this->input->post('tanggal_tugas'),
                'status'  => 'open',
                'notadinasfile'               => $namanotadinasfile,
                'notadinasfile_type'          => $notadinasfile_ext,
                'notadinasfile_size'          => $notadinasfile_size,

                'sptfile'               => $namasptfile,
                'sptfile_type'          => $sptfile_ext,
                'sptfile_size'          => $sptfile_size,

                'suratkeluarfile'               => $namasuratkeluarfile,
                'suratkeluarfile_type'          => $suratkeluarfile_ext,
                'suratkeluarfile_size'          => $suratkeluarfile_size,

                'no_notadinas'              => $no_notadinas,
                'tanggal_notadinas'              => $tanggal_notadinas,
                'tanggal_disposisi_sekretaris'              => $tanggal_disposisi_sekretaris,
                'pengesah_disposisi_sekretaris'              => $pengesah_disposisi_sekretaris,

                'tanggal_spt_inspektur'              => $tanggal_spt_inspektur,
                'pengesah_spt_inspektur'              => $pengesah_spt_inspektur,

                'no_surat_keluar'              => $no_surat_keluar,
                'perihal_surat_keluar'              => $perihal_surat_keluar,
                'tanggal_surat_keluar'              => $tanggal_surat_keluar,
                'pengesah_surat_keluar'              => $pengesah_surat_keluar,

                'uploader'              => $this->session->userdata('identity'),
                'time_uploader'       => date('Y-m-d H:i:s')
              );

              // eksekusi query INSERT
              $this->Spt_model->insert($data);
              // set pesan data berhasil dibuat
              $this->session->set_flashdata('message', 'Data berhasil dibuat');
              redirect(site_url('admin/Spt'));
      }
    }
  }

  public function update($id)
  {
    $row = $this->Spt_model->get_by_id($id);
    $this->data['spt'] = $this->Spt_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Data SPT';
      $this->data['action']         = site_url('admin/spt/update_action');
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
      );

      $this->load->view('back/spt/spt_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/spt'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_spt'));
      }
        else
        {
          $data = array(
            'no_spt'  => $this->input->post('no_spt')
          );

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

    function fetch_user(){
         $this->load->model("Entry_tim_model");
         $this->load->model("Spt_model");
         $no_spt = $this->input->post('no_spt');

         $fetch_data = $this->Entry_tim_model->make_datatables();
         $data = array();
         foreach($fetch_data as $row)
         {
              $sub_array = array();
              $sub_array[] = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" />';
              $sub_array[] = $row->nip;
              $sub_array[] = $row->nama;
              $sub_array[] = $row->jabatan;
              //$sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';
              $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
              $data[] = $sub_array;
         }
         $output = array(
              "draw"                    =>     intval($_POST["draw"]),
              "recordsTotal"          =>      $this->Entry_tim_model->get_all_data(),
              "recordsFiltered"     =>     $this->Entry_tim_model->get_filtered_data(),
              "data"                    =>     $data
         );
         echo json_encode($output);
    }
    function user_action(){
         $this->load->helper('char_seo_helper');
         $no_spt = $this->input->post('no_spt');
         //echo $no_spt;
         if($_POST["action"] == "Add")
         {
              $insert_data = array(
                   'no_spt'          =>     $this->input->post('no_sptau'),
                   'nama_irban'          =>     $this->input->post('nama_irbanau'),
                   'nama_irban_seo'          =>     char_seo($this->input->post('nama_irbanau')),
                   'tanggal_tugas'          =>     $this->input->post('tanggal_tugasau'),
                   'nip'          =>     $this->input->post('nip'),
                   'nama'               =>     $this->input->post("nama"),
                   'jabatan'               =>     $this->input->post("jabatan"),
                   'foto'               =>     $this->input->post("foto")
                   //'foto'                    =>     $this->upload_image()
              );
              $this->load->model('Entry_tim_model');
              $this->Entry_tim_model->insert_crud($insert_data);
              //echo $no_spt;
         }
         if($_POST["action"] == "Edit")
         {
              $user_image = '';
              if($_FILES["user_image"]["name"] != '')
              {
                   $user_image = $this->upload_image();
              }
              else
              {
                   $user_image = $this->input->post("hidden_user_image");
              }
              $updated_data = array(
                  'no_spt'          =>     $this->input->post('no_sptau'),
                  'nama_irban'          =>     $this->input->post('nama_irbanau'),
                  'nama_irban_seo'          =>     char_seo($this->input->post('nama_irbanau')),
                  'tanggal_tugas'          =>     $this->input->post('tanggal_tugasau'),
                   'nip'          =>     $this->input->post('nip'),
                   'nama'               =>     $this->input->post("nama"),
                   'jabatan'               =>     $this->input->post("jabatan"),
                   'foto'               =>     $this->input->post("foto")
                   //'foto'                    =>     $user_image
              );
              $this->load->model('Entry_tim_model');
              $this->Entry_tim_model->update_crud($this->input->post("user_id"), $updated_data);
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
        $this->load->model("Auditor_model");
        $data = $this->Auditor_model->fetch_single_id($_GET["nama_auditor"]);
        foreach($data as $row)
        {
             $output['nip'] = $row->nip;
             $output['foto'] = $row->foto;
        }
        echo json_encode($output);

    }


  }
