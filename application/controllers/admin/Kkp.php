<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kkp extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Kkp_model');
    $this->load->model('Spt_model');
    $this->load->model('Pkp_model');
    $this->load->model('Ion_auth_model');
    $this->load->model('Entry_tim_model');
    $this->load->model('Auditor_model');

    $this->data['module'] = 'KKP';

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
    $this->data['title'] = "Data KKP";

    $this->data['kkp_data'] = $this->Pkp_model->get_all_data_by_nip();
    $this->load->view('back/kkp/kkp_pkp_list', $this->data);
  }

  public function create($id_pkp)
  {
    $this->data['module2'] = 'Input KKP';

    $row = $this->Pkp_model->get_by_id($id_pkp);
    $this->data['pkp'] = $this->Pkp_model->get_by_id($id_pkp);

      if ($row)
      {
        $this->data['title']          = 'Form Input KKP';
        $this->data['action']         = site_url('admin/kkp/create_action');
        $this->data['button_submit']  = 'Submit';
        $this->data['button_reset']   = 'Reset';

        $this->data['id_kkp'] = array(
          'name'  => 'id_kkp',
          'id'    => 'id_kkp',
          'type'  => 'hidden',
        );

        $this->data['no_kkp'] = array(
          'name'  => 'no_kkp',
          'id'    => 'no_kkp',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

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

        $this->data['id_pkp'] = array(
          'name'  => 'id_pkp',
          'id'    => 'id_pkp',
          'type'  => 'hidden',
        );

        $this->data['no_pkp'] = array(
          'name'  => 'no_pkp',
          'id'    => 'no_pkp',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['nip'] = array(
          'name'  => 'nip',
          'id'    => 'nip',
          'type'  => 'hidden',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['auditor'] = array(
          'name'  => 'auditor',
          'id'    => 'auditor',
          'type'  => 'hidden',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['kegiatan'] = array(
          'name'  => 'kegiatan',
          'id'    => 'kegiatan',
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

        $this->data['no_langkah_kerja'] = array(
          'name'  => 'no_langkah_kerja',
          'id'    => 'no_langkah_kerja',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['langkah_kerja'] = array(
          'name'  => 'langkah_kerja',
          'id'    => 'langkah_kerja',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['hari'] = array(
          'name'  => 'hari',
          'id'    => 'hari',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['skpd'] = array(
          'name'  => 'skpd',
          'id'    => 'skpd',
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

        $this->data['no_kkpm'] = array(
          'name'  => 'no_kkpm',
          'id'    => 'no_kkpm',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('no_kkpm'),
        );

        $this->data['tanggal_kkp'] = array(
          'name'  => 'tanggal_kkp',
          'id'    => 'tanggal_kkp',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => date('Y-m-d'),
        );

        $this->data['temuan'] = array(
          'name'  => 'temuan',
          'id'    => 'temuan',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('temuan'),
        );

        $this->data['kondisi_temuan'] = array(
          'name'  => 'kondisi_temuan',
          'id'    => 'kondisi_temuan',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('kondisi_temuan'),
        );

        $this->data['lampiran'] = array(
          'name'  => 'lampiran',
          'id'    => 'lampiran',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('lampiran'),
        );

        $this->load->view('back/kkp/kkp_add', $this->data);
      }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/pkp'));
      }
  }

  function fetch_user(){
       $id_pkp = $this->input->post('id_pkp');
       $fetch_data = $this->Kkp_model->make_datatables($id_pkp);
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->tanggal_kkp;
            $sub_array[] = $row->temuan;
            //$sub_array[] = $row->kondisi_temuan;
            $sub_array[] = $row->lampiran;
            $sub_array[] = $row->status;
            $sub_array[] = '<button type="button" name="reviu" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs reviu"><i class="fa fa-list"></i></button>';
            $sub_array[] = '<a id="file_kkp" name="file_kkp" type="button" target="_blank" class="btn btn-xs btn-primary" href="'.base_url().'assets/files/kkp/'.$row->file_lampiran.'"><i class="fa fa-file-pdf-o"></i></a> <button type="button" name="upload" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs upload">Upload</button>';
            $sub_array[] = '<button type="button" name="laporan" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs laporan"><i class="fa fa-print"></i></button>';
            $sub_array[] = '<button type="button" name="update" id="'.$row->id_kkp.'" class="btn btn-warning btn-xs update">Update</button>';
            $sub_array[] = '<button type="button" name="delete" id="'.$row->id_kkp.'" class="btn btn-danger btn-xs delete">Delete</button>';
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"          =>      $this->Kkp_model->get_all_data($id_pkp),
            "recordsFiltered"     =>     $this->Kkp_model->get_filtered_data($id_pkp),
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function user_action(){
       $this->load->helper('char_seo_helper');
       $id_pkp = $this->input->post('id_pkpm');
       //echo $no_spt;
       if($_POST["action"] == "Add")
       {
            $insert_data = array(
                 'no_kkp'             =>     $this->input->post('no_kkpm').'.'.$this->input->post('no_kkp'),
                 'id_spt'             =>     $this->input->post('id_sptm'),
                 'no_spt'             =>     $this->input->post('no_sptm'),
                 'id_pkp'             =>     $this->input->post('id_pkpm'),
                 'no_pkp'             =>     $this->input->post('no_pkpm'),
                 'nip'                =>     $this->session->userdata('nip'),
                 'auditor'            =>     $this->session->userdata('nama'),
                 'skpd'               =>     $this->input->post('skpdm'),
                 'tanggal_kkp'        =>     $this->input->post('tanggal_kkp'),
                 'temuan'             =>     $this->input->post('temuan'),
                 'kondisi_temuan'     =>     $this->input->post('kondisi_temuan'),
                 'uploader'           =>     $this->session->userdata('identity'),
                 'time_uploader'      =>     date('Y-m-d H:i:s')
            );
            $this->Kkp_model->insert_crud($insert_data);
       }
       if($_POST["action"] == "Edit")
       {
            $updated_data = array(
              'no_kkp'             =>     $this->input->post('no_kkp'),
              'id_spt'             =>     $this->input->post('id_sptm'),
              'no_spt'             =>     $this->input->post('no_sptm'),
              'id_pkp'             =>     $this->input->post('id_pkpm'),
              'no_pkp'             =>     $this->input->post('no_pkpm'),
              'nip'                =>     $this->session->userdata('nip'),
              'auditor'            =>     $this->session->userdata('nama'),
              'skpd'               =>     $this->input->post('skpdm'),
              'tanggal_kkp'        =>     $this->input->post('tanggal_kkp'),
              'temuan'             =>     $this->input->post('temuan'),
              'kondisi_temuan'     =>     $this->input->post('kondisi_temuan'),
              'updater'           =>     $this->session->userdata('identity'),
              'time_updater'      =>     date('Y-m-d H:i:s')
            );
            $this->Kkp_model->update_crud($this->input->post("id_kkp"), $updated_data);
       }
  }

  function fetch_single_user()
  {
       $output = array();
       $data = $this->Kkp_model->fetch_single_user($_POST["id_kkp"]);
       foreach($data as $row)
       {
            $output['no_kkp'] = $row->no_kkp;
            $output['id_sptm'] = $row->id_spt;
            $output['no_sptm'] = $row->no_spt;
            $output['id_pkpm'] = $row->id_pkp;
            $output['no_pkpm'] = $row->no_pkp;
            $output['nip'] = $row->nip;
            $output['nama'] = $row->auditor;
            $output['skpd'] = $row->skpd;
            $output['tanggal_kkp'] = $row->tanggal_kkp;
            $output['temuan'] = $row->temuan;
            $output['kondisi_temuan'] = $row->kondisi_temuan;
            $output['auditor'] = $row->auditor;
       }
       echo json_encode($output);
  }

  public function uploadkkp()
  {
    if($_FILES["kkp"]["error"] <> 4)
    {
    $this->db->where('id_kkp',$this->input->post('id_kkp'));
    $query = $this->db->get('kkp');
    $row = $query->row();

    $dir = "assets/files/kkp/".$row->file_lampiran;

    $config['upload_path'] = './assets/files/kkp';
    $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
    $config['file_name']        = 'kkp-'.$this->input->post('id_kkp');

    $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('kkp')){
          $status = "error";
          $msg = $this->upload->display_errors();
      } else {
        if (file_exists($dir))
        {
          unlink($dir);
          $dataupload = $this->upload->data();
          $data = array(
            'lampiran'  => $this->input->post('lampiran'),
            'file_lampiran'  => $dataupload['file_name']
          );
          $this->Kkp_model->update_crud($this->input->post('id_kkp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
        } else {
          $dataupload = $this->upload->data();
          $data = array(
            'lampiran'  => $this->input->post('lampiran'),
            'file_lampiran'  => $dataupload['file_name']
          );
          $this->Kkp_model->update_crud($this->input->post('id_kkp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
        };
      }
      $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
  }

  function delete_single_user()
  {
      $this->Kkp_model->delete_single_user($_POST["id_kkp"]);
      echo 'Data telah dihapus';
  }

  public function kkp_list_reviu()
  {
    $this->data['title'] = "Data KKP";

    $this->data['kkp_data'] = $this->Pkp_model->get_all_data_by_spt();
    $this->load->view('back/kkp/kkp_list_reviu', $this->data);
  }

  public function kkp_list_reviu_dalnis()
  {
    $this->data['title'] = "Data KKP";

    $this->data['kkp_data'] = $this->Pkp_model->get_all_data_by_spt_dalnis();
    $this->load->view('back/kkp/kkp_list_reviu_dalnis', $this->data);
  }

  public function total_kkp_list_reviu()
  {
    $this->data['totalkkplistreviu'] = $this->Pkp_model->total_data_by_spt();
    $r = $this->data['totalkkplistreviu'];
    echo json_encode($r);
  }

  public function total_kkp_list_reviu_dalnis()
  {
    $this->data['totalkkplistreviudalnis'] = $this->Pkp_model->total_data_by_spt_dalnis();
    $r = $this->data['totalkkplistreviudalnis'];
    echo json_encode($r);
  }

  public function reviu($id_pkp)
  {
    $this->data['module2'] = 'Reviu KKP';

    $row = $this->Pkp_model->get_by_id($id_pkp);
    $this->data['pkp'] = $this->Pkp_model->get_by_id($id_pkp);

      if ($row)
      {
        $this->data['action']         = site_url('admin/kkp/create_action');
        $this->data['button_submit']  = 'Submit';
        $this->data['button_reset']   = 'Reset';

        $this->data['id_kkp'] = array(
          'name'  => 'id_kkp',
          'id'    => 'id_kkp',
          'type'  => 'hidden',
        );

        $this->data['no_kkp'] = array(
          'name'  => 'no_kkp',
          'id'    => 'no_kkp',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

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

        $this->data['id_pkp'] = array(
          'name'  => 'id_pkp',
          'id'    => 'id_pkp',
          'type'  => 'hidden',
        );

        $this->data['no_pkp'] = array(
          'name'  => 'no_pkp',
          'id'    => 'no_pkp',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['nip'] = array(
          'name'  => 'nip',
          'id'    => 'nip',
          'type'  => 'hidden',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['auditor'] = array(
          'name'  => 'auditor',
          'id'    => 'auditor',
          'type'  => 'hidden',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['kegiatan'] = array(
          'name'  => 'kegiatan',
          'id'    => 'kegiatan',
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

        $this->data['no_langkah_kerja'] = array(
          'name'  => 'no_langkah_kerja',
          'id'    => 'no_langkah_kerja',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['langkah_kerja'] = array(
          'name'  => 'langkah_kerja',
          'id'    => 'langkah_kerja',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['hari'] = array(
          'name'  => 'hari',
          'id'    => 'hari',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $this->data['skpd'] = array(
          'name'  => 'skpd',
          'id'    => 'skpd',
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

        $this->data['no_kkpm'] = array(
          'name'  => 'no_kkpm',
          'id'    => 'no_kkpm',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('no_kkpm'),
          'readonly' => 'readonly',
        );

        $this->data['tanggal_kkp'] = array(
          'name'  => 'tanggal_kkp',
          'id'    => 'tanggal_kkp',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => date('Y-m-d'),
          'readonly' => 'readonly',
          'disabled' => 'disabled',
        );

        $this->data['temuan'] = array(
          'name'  => 'temuan',
          'id'    => 'temuan',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('temuan'),
          'readonly' => 'readonly',
        );

        $this->data['kondisi_temuan'] = array(
          'name'  => 'kondisi_temuan',
          'id'    => 'kondisi_temuan',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('kondisi_temuan'),
          'readonly' => 'readonly',
        );

        $this->data['lampiran'] = array(
          'name'  => 'lampiran',
          'id'    => 'lampiran',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('lampiran'),
        );

        $this->data['reviu_ketuatim'] = array(
          'name'  => 'reviu_ketuatim',
          'id'    => 'reviu_ketuatim',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('reviu_ketuatim'),
        );

        $this->data['reviu_dalnis'] = array(
          'name'  => 'reviu_dalnis',
          'id'    => 'reviu_dalnis',
          'type'  => 'text',
          'class' => 'form-control',
          'value' => $this->input->post('reviu_dalnis'),
        );

        $this->data['id_reviu'] = array(
          'name'  => 'id_reviu',
          'id'    => 'id_reviu',
          'type'  => 'text',
          'class' => 'form-control',
          'readonly' => 'readonly',
        );

        $nospt = $this->data['pkp']->no_spt;
        $ketuatimspt = $this->Spt_model->get_by_no_spt_ketuatim($nospt);
        $dalnisspt = $this->Spt_model->get_by_no_spt_dalnis($nospt);

        //mainkan halaman untuk dalnis
        if ($dalnisspt == $this->session->userdata('username')){
          $this->data['title']          = 'Form Input Reviu & Verifikasi KKP Pengendali Teknis';
          $this->load->view('back/kkp/kkp_reviu_dalnis', $this->data);
        } else
        if ($ketuatimspt == $this->session->userdata('username')){
          $this->data['title']          = 'Form Input Reviu & Verifikasi KKP Ketua Tim';
          $this->load->view('back/kkp/kkp_reviu', $this->data);
        } else {

        }
      }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/pkp'));
      }
  }

  function fetch_user_reviu(){
       $id_pkp = $this->input->post('id_pkp');
       $fetch_data = $this->Kkp_model->make_datatables($id_pkp);
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->tanggal_kkp;
            $sub_array[] = $row->temuan;
            $sub_array[] = $row->kondisi_temuan;
            $sub_array[] = $row->lampiran;
            $sub_array[] = $row->status;
            $sub_array[] = '<button type="button" name="reviu" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs reviu"><i class="fa fa-list"></i></button>';
            $sub_array[] = '<button type="button" name="update" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs reviu_add"><i class="fa fa-share-square-o"></i> Isi Reviu</button>';
            $sub_array[] = '<a id="file_kkp" name="file_kkp" type="button" target="_blank" class="btn btn-xs btn-primary" href="'.base_url().'assets/files/kkp/'.$row->file_lampiran.'"><i class="fa fa-file-pdf-o"></i></a>';
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"            =>      $this->Kkp_model->get_all_data($id_pkp),
            "recordsFiltered"         =>     $this->Kkp_model->get_filtered_data($id_pkp),
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function user_action_reviu_ketuatim(){
       $this->load->helper('char_seo_helper');
       $id_kkp = $this->input->post('id_kkp');

       if($_POST["action"] == "Input Reviu")
       {
            $insert_data = array(
                 'id_kkp'                  =>     $this->input->post('id_kkp'),
                 'no_kkp'                  =>     $this->input->post('no_kkpm'),
                 'tanggal_reviu_ketua_tim' =>     date('Y-m-d H:i:s'),
                 'isi_reviu_ketua_tim'     =>     $this->input->post('reviu_ketuatim'),
                 'ketua_tim'               =>     $this->session->userdata('identity')
            );
            $this->Kkp_model->insert_crud_reviu($insert_data);
       }

  }

  function fetch_user_reviu_detail(){
       $id_kkp = $this->input->post('id_kkp');
       $fetch_data = $this->Kkp_model->make_datatables_reviu_kkp($id_kkp);
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->tanggal_reviu_ketua_tim;
            $sub_array[] = $row->isi_reviu_ketua_tim;
            $sub_array[] = $row->ketua_tim;
            $sub_array[] = $row->tanggal_reviu_dalnis;
            $sub_array[] = $row->isi_reviu_dalnis;
            $sub_array[] = $row->dalnis;
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"            =>      $this->Kkp_model->get_all_data($id_kkp),
            "recordsFiltered"         =>     $this->Kkp_model->get_filtered_data($id_kkp),
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function fetch_user_reviu_dalnis(){
       $id_pkp = $this->input->post('id_pkp');
       $fetch_data = $this->Kkp_model->make_datatables($id_pkp);
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->tanggal_kkp;
            $sub_array[] = $row->temuan;
            $sub_array[] = $row->kondisi_temuan;
            $sub_array[] = $row->lampiran;
            $sub_array[] = $row->status;
            $sub_array[] = '<button type="button" name="reviu" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs reviu"><i class="fa fa-list"></i></button>';
            $sub_array[] = '<a id="file_kkp" name="file_kkp" type="button" target="_blank" class="btn btn-xs btn-primary" href="'.base_url().'assets/files/kkp/'.$row->file_lampiran.'"><i class="fa fa-file-pdf-o"></i></a>';
            $sub_array[] = '<button type="button" name="statusv" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs status"><i class="fa fa-check"></i> Verifikasi</button>';
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"            =>      $this->Kkp_model->get_all_data($id_pkp),
            "recordsFiltered"         =>     $this->Kkp_model->get_filtered_data($id_pkp),
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function fetch_user_reviu_detail_dalnis(){
       $id_kkp = $this->input->post('id_kkp');
       $fetch_data = $this->Kkp_model->make_datatables_reviu_kkp($id_kkp);
       $data = array();
       foreach($fetch_data as $row)
       {
            $sub_array = array();
            $sub_array[] = $row->tanggal_reviu_ketua_tim;
            $sub_array[] = $row->isi_reviu_ketua_tim;
            $sub_array[] = $row->ketua_tim;
            $sub_array[] = $row->tanggal_reviu_dalnis;
            $sub_array[] = $row->isi_reviu_dalnis;
            $sub_array[] = $row->dalnis;
            $sub_array[] = '<button type="button" name="'.$row->id_reviu.'" id="'.$row->id_kkp.'" class="btn btn-primary btn-xs reviu_add"><i class="fa fa-share-square-o"></i> Isi Reviu</button>';
            $data[] = $sub_array;
       }
       $output = array(
            "draw"                    =>     intval($_POST["draw"]),
            "recordsTotal"            =>      $this->Kkp_model->get_all_data($id_kkp),
            "recordsFiltered"         =>     $this->Kkp_model->get_filtered_data($id_kkp),
            "data"                    =>     $data
       );
       echo json_encode($output);
  }

  function user_action_reviu_dalnis(){
       $this->load->helper('char_seo_helper');
       $id_reviu = $this->input->post('id_reviu');

       if($_POST["action"] == "Input Reviu")
       {
            $update_data = array(
                 'tanggal_reviu_dalnis' =>     date('Y-m-d H:i:s'),
                 'isi_reviu_dalnis'     =>     $this->input->post('reviu_dalnis'),
                 'dalnis'               =>     $this->session->userdata('identity')
            );
            $this->Kkp_model->update_crud_reviu($id_reviu, $update_data);
       }

  }

  function user_action_status(){
       $this->load->helper('char_seo_helper');
       $id_kkp = $this->input->post('id_kkpv');

       $update_data = array(
                 'status'               =>     $this->input->post('status'),
                 'time_status'               =>     date('Y-m-d H:i:s')
       );

       $this->Kkp_model->update_crud_status($id_kkp, $update_data);
  }

  function laporan_kkp($id_kkp){
    $this->data['title'] = 'Laporan KKP Auditor';

    $this->data['kkp'] = $this->Kkp_model->get_by_id($id_kkp);
    $this->data['id_kkp'] = $id_kkp;
    $this->data['reviu'] = $this->Kkp_model->make_datatables_reviu_kkp_laporan($id_kkp);
    $thn = $this->Kkp_model->get_by_id($id_kkp)->tanggal_kkp;
    $this->data['thn'] = date('Y', strtotime($thn));

    $this->load->view('back/kkp/laporan_kkp', $this->data);
  }

}
