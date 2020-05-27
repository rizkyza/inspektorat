<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporanpkp extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Spt_model');
    $this->load->model('Pkp_model');
    $this->load->model('Ion_auth_model');
    $this->load->model('Entry_tim_model');
    $this->load->model('Auditor_model');

    $this->data['module'] = 'PKP';

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
    $this->data['title'] = "Data PKP";

    $this->data['pkp_data'] = $this->Spt_model->get_all_by_irban_ketuatim();
    $this->load->view('back/laporan/pkp_list_view', $this->data);
  }

  public function total_kkp_by_nip()
  {
    $this->data['totalkkpnip'] = $this->Pkp_model->total_kkp_by_nip();
    $r = $this->data['totalkkpnip'];
    echo json_encode($r);
  }

  public function create($id_spt)
  {
    $this->data['module2'] = 'Input PKP';

    $row = $this->Spt_model->get_by_id($id_spt);
    $this->data['spt'] = $this->Spt_model->get_by_id($id_spt);
    $nospt = $this->data['spt']->no_spt;
    $this->data['tim_data'] = $this->Entry_tim_model->get_auditor_tim($nospt);
    $username = $this->data['spt']->ketua_tim;
    $this->data['nama'] = $this->Ion_auth_model->get_username_by_username($username);

    $this->data['pkp_data'] = $this->Pkp_model->get_data_pkp($id_spt);

      if ($row)
      {
        $this->data['title']          = 'Form Input PKP';
        $this->data['action']         = site_url('laporan/laporanpkp/create_action');
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
          'readonly' => 'readonly',
        );

        $this->data['tahun'] = array(
          'name'  => 'tahun',
          'id'    => 'tahun',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['nama_skpd'] = array(
          'name'  => 'nama_skpd',
          'id'    => 'nama_skpd',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['nama_irban'] = array(
          'name'  => 'nama_irban',
          'id'    => 'nama_irban',
          'type'  => 'text',
          'readonly' => 'readonly',
          'class' => 'form-control',
          'value' => $this->session->userdata('usertype'),
        );

        $this->data['ketua_tim'] = array(
          'name'  => 'ketua_tim',
          'id'    => 'ketua_tim',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['nipcombo'] = array(
          'name'  => 'nipcombo',
          'id'    => 'nipcombo',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['tanggal_spt'] = array(
          'name'  => 'tanggal_spt',
          'id'    => 'tanggal_spt',
          'type'  => 'date',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );


        $this->data['get_combo_tim_auditor'] = $this->Entry_tim_model->get_combo_tim_auditor($nospt);
        $this->load->view('back/laporan/pkp_view', $this->data);
      }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('laporan/laporanpkp'));
      }
  }

  function fetch_user(){
       $id_spt = $this->input->post('id_spt');
       $fetch_data = $this->Pkp_model->make_datatables($id_spt);
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->no_langkah_kerja;
            $sub_array[] = $row->langkah_kerja;
            $sub_array[] = $row->auditor;
            $sub_array[] = $row->hari;
            $sub_array[] = $row->no_kkp;
            $sub_array[] = $row->tahun;
            $sub_array[] = $row->kegiatan;
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"          =>      $this->Pkp_model->get_all_data($id_spt),
            "recordsFiltered"     =>     $this->Pkp_model->get_filtered_data($id_spt),
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function fetch_user_by_nospt(){
       $no_spt = $this->input->post('no_spt');
       $fetch_data = $this->Pkp_model->make_datatables_by_nospt($no_spt);
       $data = array();
       foreach($fetch_data as $row)
       {
            $no_pkp = $row->no_pkp;
            $sub_array = array();
            $sub_array[] = $row->no_langkah_kerja;
            $sub_array[] = $row->langkah_kerja;
            $sub_array[] = $row->auditor;
            $sub_array[] = $row->hari. ' Hari';
            $sub_array[] = $row->no_kkp;
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"          =>      $this->Pkp_model->get_all_data_by_nospt($no_spt),
            "recordsFiltered"     =>     $this->Pkp_model->get_filtered_data_by_nospt($no_spt),
            "no_pkp"              => $no_pkp,
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function user_action(){
       $this->load->helper('char_seo_helper');
       $id_spt = $this->input->post('id_sptm');
       //echo $no_spt;
       if($_POST["action"] == "Add")
       {
            $insert_data = array(
                 'id_spt'             =>     $this->input->post('id_sptm'),
                 'no_spt'             =>     $this->input->post('no_sptm'),
                 'no_pkp'             =>     $this->input->post('no_pkp'),
                 'skpd'               =>     $this->input->post('skpdm'),
                 'no_langkah_kerja'   =>     $this->input->post('no_langkah_kerja'),
                 'langkah_kerja'      =>     $this->input->post('langkah_kerja'),
                 'nip'                =>     $this->input->post('nip'),
                 'auditor'            =>     $this->input->post('nama'),
                 'hari'               =>     $this->input->post('hari'),
                 'no_kkp'             =>     $this->input->post('no_kkp'),
                 'tahun'              =>     $this->input->post('tahunm'),
                 'kegiatan'           =>     $this->input->post('kegiatanm'),
                 'uploader'           =>     $this->session->userdata('identity'),
                 'time_uploader'      =>     date('Y-m-d H:i:s')
            );
            $this->Pkp_model->insert_crud($insert_data);
       }
       if($_POST["action"] == "Edit")
       {
            $updated_data = array(
              'id_spt'             =>     $this->input->post('id_sptm'),
              'no_spt'             =>     $this->input->post('no_sptm'),
              'no_pkp'             =>     $this->input->post('no_pkp'),
              'no_langkah_kerja'   =>     $this->input->post('no_langkah_kerja'),
              'langkah_kerja'      =>     $this->input->post('langkah_kerja'),
              'nip'                =>     $this->input->post('nip'),
              'auditor'            =>     $this->input->post('nama'),
              'hari'               =>     $this->input->post('hari'),
              'no_kkp'             =>     $this->input->post('no_kkp'),
              'uploader'           =>     $this->session->userdata('identity'),
              'time_uploader'      =>     date('Y-m-d H:i:s')
            );
            $this->Pkp_model->update_crud($this->input->post("id_pkp"), $updated_data);
       }
  }

  function fetch_single_user()
  {
       $output = array();
       $data = $this->Pkp_model->fetch_single_user($_POST["id_pkp"]);
       foreach($data as $row)
       {
            $output['id_sptm'] = $row->id_spt;
            $output['no_sptm'] = $row->no_spt;
            $output['no_pkp'] = $row->no_pkp;
            $output['nama_skpd'] = $row->skpd;
            $output['no_langkah_kerja'] = $row->no_langkah_kerja;
            $output['langkah_kerja'] = $row->langkah_kerja;
            $output['nip'] = $row->nip;
            $output['nama'] = $row->auditor;
            $output['hari'] = $row->hari;
            $output['no_kkp'] = $row->no_kkp;
       }
       echo json_encode($output);
  }

  function fetch_single_user_by_nospt()
  {
       $output = array();
       $no_spt = $this->input->post('no_spt');
       $data = $this->Pkp_model->fetch_single_user_by_nospt($no_spt);
       foreach($data as $row)
       {
            $output['no_pkp'] = $row->no_pkp;
            $output['nama_skpd'] = $row->skpd;
            $output['tahun'] = $row->tahun;
            $output['kegiatan'] = $row->kegiatan;
       }
       echo json_encode($output);
  }

  function delete_single_user()
  {
      $this->Pkp_model->delete_single_user($_POST["id_pkp"]);
      echo 'Data telah dihapus';
  }



  }
