<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tl_temuan_rekomendasi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Rekomendasi_model');
    $this->load->model('Temuan_model');

    $this->data['module'] = 'Data LHP';

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
    $this->data['title'] = "Data Rekomendasi Temuan LHP";

    $this->data['lhp_data'] = $this->Lhp_model->get_all_by_irban();
    $this->load->view('back/tl/lhp_list_temuan', $this->data);
  }

  public function update($id_temuan)
  {
    $this->data['module2'] = 'Data Temuan LHP';
    $row = $this->Temuan_model->get_by_id($id_temuan);
    $this->data['temuan'] = $this->Temuan_model->get_by_id($id_temuan);


    if ($row)
    {
      $this->data['title']          = 'Data Rekomendasi Temuan LHP';
      $this->data['action']         = site_url('admin/Tl_temuan_rekomendasi/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_temuan'] = array(
        'name'  => 'id_temuan',
        'id'    => 'id_temuan',
        'type'  => 'hidden',
      );

      $this->data['no_lhp'] = array(
        'name'  => 'no_lhp',
        'id'    => 'no_lhp',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['no_temuan'] = array(
        'name'  => 'no_temuan',
        'id'    => 'no_temuan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['kode_temuan'] = array(
        'name'  => 'kode_temuan',
        'id'    => 'kode_temuan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['judul_temuan'] = array(
        'name'  => 'judul_temuan',
        'id'    => 'judul_temuan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['uraian_temuan'] = array(
        'name'  => 'uraian_temuan',
        'id'    => 'uraian_temuan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['kondisi'] = array(
        'name'  => 'kondisi',
        'id'    => 'kondisi',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['kriteria_aturan'] = array(
        'name'  => 'kriteria_aturan',
        'id'    => 'kriteria_aturan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['kode_sebab'] = array(
        'name'  => 'kode_sebab',
        'id'    => 'kode_sebab',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['sebab'] = array(
        'name'  => 'sebab',
        'id'    => 'sebab',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['akibat'] = array(
        'name'  => 'akibat',
        'id'    => 'akibat',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['tanggapan'] = array(
        'name'  => 'tanggapan',
        'id'    => 'tanggapan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['komentar_tanggapan'] = array(
        'name'  => 'komentar_tanggapan',
        'id'    => 'komentar_tanggapan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['nilai_temuan'] = array(
        'name'  => 'nilai_temuan',
        'id'    => 'nilai_temuan',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['kodetl'] = array(
        'name'  => 'kodetl',
        'id'    => 'kodetl',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['subkodetl'] = array(
        'name'  => 'subkodetl',
        'id'    => 'subkodetl',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->model('Kodetl_model');
      $this->data['get_combo_kodetl']=$this->Kodetl_model->get_combo_kodetl();
      $this->load->view('back/tl/tl_edit_temuan_rekomendasi', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/lhp_temuan'));
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
          $data = array(
            'tanggal_lhp'        => $this->input->post('tanggal_lhp'),
            'Updater'            => $this->session->userdata('identity'),
            'time_updater'       => date('Y-m-d H:i:s')
          );


          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/lhp/update/'.$this->input->post('id_lhp')));
        }
    }

    public function delete($id)
    {
      $row = $this->Lhp_model->get_by_id($id);

      if ($row)
      {
        $this->Spt_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/lhp'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/lhp'));
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
         $this->load->model("Rekomendasi_model");

         $id_temuan = $this->input->post('id_temuan');
         $fetch_data = $this->Rekomendasi_model->make_datatables($id_temuan);
         $data = array();
         foreach($fetch_data as $row)
         {
              $sub_array = array();
              $sub_array[] = '<button type="button" name="view" id="'.$row->id_rekomendasi.'" class="btn btn-primary btn-sm view">'.$row->no_tindaklanjut.'</button>';
              $sub_array[] = $row->kode_rekomendasi;
              $sub_array[] = $row->uraian_rekomendasi;
              $sub_array[] = '<button type="button" name="update" id="'.$row->id_rekomendasi.'" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon glyphicon-share"> Tindak Lanjut</i></button>';
              //$sub_array[] = '<a href="'.base_url().'admin/tl_temuan_rekomendasi/update/'.$row->id_temuan.'" type="button" name="rekomendasi" id="'.$row->id_temuan.'" class="btn btn-primary btn-sm rekomendasi"><i class="glyphicon glyphicon glyphicon-share"> Tindak Lanjut</i></button>';
              $data[] = $sub_array;
         }
         $output = array(
              "draw"                    =>     intval($_POST["draw"]),
              "recordsTotal"          =>      $this->Rekomendasi_model->get_all_data($id_temuan),
              "recordsFiltered"     =>     $this->Rekomendasi_model->get_filtered_data($id_temuan),
              "data"                    =>     $data
         );
         echo json_encode($output);
    }
    function user_action(){
         $this->load->helper('char_seo_helper');
         $id_temuan = $this->input->post('id_temuanm');
         //echo $no_spt;
         if($_POST["action"] == "Add")
         {
              $insert_data = array(
                   'id_temuan'          =>     $this->input->post('id_temuanm'),
                   'no_temuan'          =>     $this->input->post('no_temuanm'),
                   'judul_temuan'          =>     $this->input->post('judul_temuanm'),
                   'koderk'          =>     $this->input->post('koder'),
                   'subkoderk'          =>     $this->input->post('subkoder'),
                   'kode_rekomendasi'          =>     $this->input->post('kode_rekomendasi'),
                   'uraian_rekomendasi'          =>     $this->input->post('uraian_rekomendasi'),
                   'uploader'               =>     $this->session->userdata('identity'),
                   'time_uploader'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Rekomendasi_model');
              $this->Rekomendasi_model->insert_crud($insert_data);
         }
         if($_POST["action"] == "Edit")
         {
              $updated_data = array(
                'kodetl'          =>     $this->input->post('kodetl'),
                'subkodetl'          =>     $this->input->post('subkodetl'),
                'kode_tindaklanjut'          =>     $this->input->post('kode_tindaklanjut'),
                'no_tindaklanjut'          =>     $this->input->post('no_tindaklanjut'),
                'uraian_tindaklanjut'          =>     $this->input->post('uraian_tindaklanjut'),
                'evaluator'               =>     $this->session->userdata('identity'),
                'time_evaluator'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Rekomendasi_model');
              $this->Rekomendasi_model->update_crud($this->input->post("id_rekomendasi"), $updated_data);
         }
         if($_POST["actiondetail"] == "Delete")
         {
              $updated_data = array(
                'kodetl'          =>     '',
                'subkodetl'          =>    '',
                'kode_tindaklanjut'          =>     '',
                'no_tindaklanjut'          =>     '',
                'uraian_tindaklanjut'          =>     '',
                'evaluator'               =>     $this->session->userdata('identity'),
                'time_evaluator'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Rekomendasi_model');
              $this->Rekomendasi_model->update_crud($this->input->post("id_rekomendasidetail"), $updated_data);
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
         $this->load->model("Rekomendasi_model");
         $data = $this->Rekomendasi_model->fetch_single_user($_POST["id_rekomendasi"]);
         foreach($data as $row)
         {
              $output['id_temuan'] = $row->id_temuan;
              $output['no_temuan'] = $row->no_temuan;
              $output['id_rekomendasi'] = $row->id_rekomendasi;
              $output['kode_rekomendasi'] = $row->kode_rekomendasi;
              $output['uraian_rekomendasi'] = $row->uraian_rekomendasi;
              $output['kode_tindaklanjut'] = $row->kode_tindaklanjut;
              $output['no_tindaklanjut'] = $row->no_tindaklanjut;
              $output['uraian_tindaklanjut'] = $row->uraian_tindaklanjut;

         }
         echo json_encode($output);
    }

    function delete_single_user()
    {
        $this->load->model('Rekomendasi_model');
        $this->Rekomendasi_model->delete_single_user($_POST["id_rekomendasi"]);
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
