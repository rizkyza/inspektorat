<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tl_temuan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Lhp_model');

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
    $this->data['title'] = "Data LHP";

    $this->data['lhp_data'] = $this->Lhp_model->get_all();
    $this->load->view('back/tl/tl_list_temuan', $this->data);
  }

  public function update($id)
  {
    $row = $this->Lhp_model->get_by_id($id);
    $this->data['lhp'] = $this->Lhp_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Data Temuan LHP';
      $this->data['action']         = site_url('admin/tl/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_lhp'] = array(
        'name'  => 'id_lhp',
        'id'    => 'id_lhp',
        'type'  => 'hidden',
      );

      $this->data['no_lhp'] = array(
        'name'  => 'no_lhp',
        'id'    => 'no_lhp',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['tanggal_lhp'] = array(
        'name'  => 'tanggal_lhp',
        'id'    => 'tanggal_lhp',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
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
      );

      $this->data['kode'] = array(
        'name'  => 'kode',
        'id'    => 'kode',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['subkode'] = array(
        'name'  => 'subkode',
        'id'    => 'subkode',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['subsubkode'] = array(
        'name'  => 'subsubkode',
        'id'    => 'subsubkode',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['kodes'] = array(
        'name'  => 'kodes',
        'id'    => 'kodes',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['subkodes'] = array(
        'name'  => 'subkodes',
        'id'    => 'subkodes',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['subsubkodes'] = array(
        'name'  => 'subsubkodes',
        'id'    => 'subsubkodes',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->model('Kode_model');
      $this->data['get_combo_kode']=$this->Kode_model->get_combo_kode_uraian();
      $this->load->model('Kodepk_model');
      $this->data['get_combo_kodes']=$this->Kodepk_model->get_combo_kode_uraian();
      $this->load->view('back/tl/tl_edit_temuan', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/lhp'));
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
         $this->load->model("Temuan_model");

         $no_lhp = $this->input->post('no_lhp');
         $fetch_data = $this->Temuan_model->make_datatables($no_lhp);
         $data = array();
         foreach($fetch_data as $row)
         {
              $sub_array = array();
              $sub_array[] = $row->no_temuan;
              $sub_array[] = $row->kode_temuan;
              $sub_array[] = $row->judul_temuan;
              $sub_array[] = $row->nilai_temuan;
              $sub_array[] = '<a href="'.base_url().'admin/tl_temuan_rekomendasi/update/'.$row->id_temuan.'" type="button" name="rekomendasi" id="'.$row->id_temuan.'" class="btn btn-primary btn-sm rekomendasi"><i class="glyphicon glyphicon-triangle-right"> Rekomendasi</i></button>';
              $data[] = $sub_array;
         }
         $output = array(
              "draw"                    =>     intval($_POST["draw"]),
              "recordsTotal"          =>      $this->Temuan_model->get_all_data($no_lhp),
              "recordsFiltered"     =>     $this->Temuan_model->get_filtered_data($no_lhp),
              "data"                    =>     $data
         );
         echo json_encode($output);
    }
    function user_action(){
         $this->load->helper('char_seo_helper');
         $no_lhp = $this->input->post('no_lhpm');
         //echo $no_spt;
         if($_POST["action"] == "Add")
         {
              $insert_data = array(
                   'no_lhp'          =>     $this->input->post('no_lhpm'),
                   'no_temuan'          =>     $this->input->post('no_temuan'),
                   'kode'          =>     $this->input->post('kode'),
                   'subkode'          =>     $this->input->post('subkode'),
                   'subsubkode'          =>     $this->input->post('subsubkode'),
                   'kode_temuan'          =>     $this->input->post('kode_temuan'),
                   'judul_temuan'          =>     $this->input->post('judul_temuan'),
                   'uraian_temuan'          =>     $this->input->post('uraian_temuan'),
                   'kondisi'          =>     $this->input->post('kondisi'),
                   'kriteria_aturan'          =>     $this->input->post('kriteria_aturan'),
                   'kodepk'          =>     $this->input->post('kodes'),
                   'subkodepk'          =>     $this->input->post('subkodes'),
                   'subsubkodepk'          =>     $this->input->post('subsubkodes'),
                   'kode_sebab'          =>     $this->input->post('kode_sebab'),
                   'sebab'          =>     $this->input->post('sebab'),
                   'akibat'          =>     $this->input->post('akibat'),
                   'tanggapan'          =>     $this->input->post('tanggapan'),
                   'komentar_tanggapan'          =>     $this->input->post('komentar_tanggapan'),
                   'nilai_temuan'          =>     $this->input->post('nilai_temuan'),
                   'uploader'               =>     $this->session->userdata('identity'),
                   'time_uploader'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Temuan_model');
              $this->Temuan_model->insert_crud($insert_data);
         }
         if($_POST["action"] == "Edit")
         {
              $updated_data = array(
                'no_lhp'          =>     $this->input->post('no_lhpm'),
                'kode'          =>     $this->input->post('kode'),
                'subkode'          =>     $this->input->post('subkode'),
                'subsubkode'          =>     $this->input->post('subsubkode'),
                'kode_temuan'          =>     $this->input->post('kode_temuan'),
                'judul_temuan'          =>     $this->input->post('judul_temuan'),
                'uraian_temuan'          =>     $this->input->post('uraian_temuan'),
                'kondisi'          =>     $this->input->post('kondisi'),
                'kriteria_aturan'          =>     $this->input->post('kriteria_aturan'),
                'kodepk'          =>     $this->input->post('kodes'),
                'subkodepk'          =>     $this->input->post('subkodes'),
                'subsubkodepk'          =>     $this->input->post('subsubkodes'),
                'kode_sebab'          =>     $this->input->post('kode_sebab'),
                'sebab'          =>     $this->input->post('sebab'),
                'akibat'          =>     $this->input->post('akibat'),
                'tanggapan'          =>     $this->input->post('tanggapan'),
                'komentar_tanggapan'          =>     $this->input->post('komentar_tanggapan'),
                'nilai_temuan'          =>     $this->input->post('nilai_temuan'),
                'updater'               =>     $this->session->userdata('identity'),
                'time_updater'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Temuan_model');
              $this->Temuan_model->update_crud($this->input->post("id_temuan"), $updated_data);
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
         $this->load->model("Temuan_model");
         $data = $this->Temuan_model->fetch_single_user($_POST["id_temuan"]);
         foreach($data as $row)
         {
              $output['no_temuan'] = $row->no_temuan;
              $output['no_lhpm'] = $row->no_lhp;
              $output['kode_temuan'] = $row->kode_temuan;
              $output['judul_temuan'] = $row->judul_temuan;
              $output['uraian_temuan'] = $row->uraian_temuan;
              $output['kondisi'] = $row->kondisi;
              $output['kriteria_aturan'] = $row->kriteria_aturan;
              $output['kode_sebab'] = $row->kode_sebab;
              $output['sebab'] = $row->sebab;
              $output['akibat'] = $row->akibat;
              $output['tanggapan'] = $row->tanggapan;
              $output['komentar_tanggapan'] = $row->komentar_tanggapan;
              $output['nilai_temuan'] = $row->nilai_temuan;

         }
         echo json_encode($output);
    }

    function delete_single_user()
    {
        $this->load->model('Temuan_model');
        $this->Temuan_model->delete_single_user($_POST["id_temuan"]);
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
