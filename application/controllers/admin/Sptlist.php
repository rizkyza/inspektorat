<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sptlist extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Spt_model');
    $this->load->model('Lhp_model');
    $this->load->model('Tim_model');
    $this->load->model('Ion_auth_model');

    $this->data['module'] = 'LHP';

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
    $this->data['title'] = "Data SPT Entry LHP";

    $this->data['spt_data_sudahada'] = $this->Spt_model->get_all_by_irban_sudahada();
    $this->data['spt_data_belumada'] = $this->Spt_model->get_all_by_irban_belumada();
    $this->load->view('back/lhp/lhp_spt_list', $this->data);
  }

  public function create($id)
  {
    $this->data['module2'] = 'Data SPT Entry LHP';

    $this->data['spt'] = $this->Spt_model->get_by_idspt($id);
    $nospt = $this->data['spt']->no_spt;

    $this->data['users'] = $this->Tim_model->get_by_nospt_nip($nospt);
    $user = $this->Tim_model->get_by_nospt_nip($nospt);
    if (!$user)
    {
      $this->session->set_flashdata('message', 'Anda tidak termasuk dalam Tim Auditor SPT ini. ');
      redirect(site_url('admin/sptlist'));
    } else {

        $this->data['ketuatim'] = $this->Spt_model->get_by_nospt_nip_ketuatim($nospt);
        if ($this->data['ketuatim']->ketua_tim <> $this->session->userdata('username'))
        {
          $this->session->set_flashdata('message', 'Hanya Ketua Tim yang dapat mengakses SPT ini.');
          redirect(site_url('admin/sptlist'));
        } else {


            $row = $this->Lhp_model->get_by_idspt($id);
            $this->data['lhp'] = $this->Lhp_model->get_by_idspt($id);
            if ($row)
            {
              $this->session->set_flashdata('message', 'Data LHP Sudah Ada. Tidak boleh membuat LHP baru dari SPT ini.');
              redirect(site_url('admin/sptlist'));

            } else {

                $this->data['title']          = 'Entry LHP';
                $this->data['action']         = site_url('admin/sptlist/create_action');
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

                $this->data['nama_irban'] = array(
                  'name'  => 'nama_irban',
                  'id'    => 'nama_irban',
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

                $this->data['no_lhp'] = array(
                  'name'  => 'no_lhp',
                  'id'    => 'no_lhp',
                  'type'  => 'text',
                  'class' => 'form-control',
                  'value' => $this->form_validation->set_value('no_lhp'),
                );

                $this->data['tanggal_lhp'] = array(
                  'name'  => 'tanggal_lhp',
                  'id'    => 'tanggal_lhp',
                  'type'  => 'text',
                  'class' => 'form-control',
                  'readonly' => 'redonly',
                  'value' => $this->form_validation->set_value('tanggal_lhp'),
                );
                //$this->session->set_flashdata('message', $nospt);
                $this->load->view('back/lhp/lhp_add', $this->data);
            }
        }
    }
  }

  public function create_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->create();
      }
        else
        {
          $this->db->select("no_spt`");
          $this->db->where('no_spt',$this->input->post('no_spt'));
          $query = $this->db->get('lhp');
          $row = $query->row();

          if ($row) {
            $this->session->set_flashdata('message', 'Data LHP Sudah ada dibuat.');
            redirect(site_url('admin/lhp/'));
          } else {

          $data = array(
            'tahun'  => $this->input->post('tahun'),
            'id_spt'  => $this->input->post('id_spt'),
            'no_spt'  => $this->input->post('no_spt'),
            'nama_irban'  => $this->input->post('nama_irban'),
            'nama_irban_seo'  => char_seo($this->input->post('nama_irban')),
            'skpd'    => $this->input->post('skpd'),
            'skpd_seo'  => char_seo($this->input->post('skpd')),
            'no_lhp'    => $this->input->post('no_lhp'),
            'tanggal_lhp'    => $this->input->post('tanggal_lhp'),

            'file_pkp'    => 'nofile',
            'file_ba'    => 'nofile',
            'file_kkp'    => 'nofile',
            'file_bheb'    => 'nofile',
            'file_ne'    => 'nofile',
            'file_kl'    => 'nofile',
            'file_ndli'    => 'nofile',
            'file_ndlg'    => 'nofile',
            'ketua_tim'    => $this->session->userdata('username'),

            'uploader'               =>     $this->session->userdata('identity'),
            'time_uploader'       => date('Y-m-d H:i:s')
          );

          // eksekusi query INSERT
          $this->Lhp_model->insert($data);

          $datastatus = array(
            'status'              => 'Sudah Ada'
          );
          $this->Spt_model->update($this->input->post('id_spt'), $datastatus);

          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', 'Data berhasil dibuat');
          redirect(site_url('admin/lhp/'));
        }
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
      $this->form_validation->set_rules('no_lhp', 'No LHP', 'trim|required');
      $this->form_validation->set_rules('tanggal_lhp', 'Tanggal LHP', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_lhp', 'id_lhp', 'trim');
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


  }
