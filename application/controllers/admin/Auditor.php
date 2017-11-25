<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auditor extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Auditor_model');
    $this->load->model('Irban_model');

    $this->data['module'] = 'Auditor';

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
    $this->data['title'] = "Data Auditor";

    $this->data['auditor_data'] = $this->Auditor_model->get_all();
    $this->load->view('back/auditor/auditor_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Auditor Baru';
    $this->data['action']         = site_url('admin/auditor/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_auditor'] = array(
      'name'  => 'id_auditor',
      'id'    => 'id_auditor',
      'type'  => 'hidden',
    );

    $this->data['nip'] = array(
      'name'  => 'nip',
      'id'    => 'nip',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nip'),
    );

    $this->data['nama_auditor'] = array(
      'name'  => 'nama_auditor',
      'id'    => 'nama_auditor',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_auditor'),
    );

    $this->data['nama_irban'] = array(
      'name'  => 'nama_irban',
      'id'    => 'nama_irban',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban'),
    );

    $this->data['get_combo_irban'] = $this->Irban_model->get_combo_irban();
    $this->load->view('back/auditor/auditor_add', $this->data);
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
        if ($_FILES['userfile']['error'] <> 4)
        {
          $nmfile = char_seo($this->input->post('nip'));

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/images/auditor/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['max_width']        = '2000'; //pixels
          $config['max_height']       = '2000'; //pixels
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload())
          {   //file gagal diupload -> kembali ke form tambah
            $this->create();
          }
            //file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $userfile = $this->upload->data();
              $thumbnail                = $config['file_name'];
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2';
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/auditor/'.$userfile['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 400;
              // tinggi
              $config['height']         = 200;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

        $data = array(
          'nip'  => $this->input->post('nip'),
          'nama_auditor'  => $this->input->post('nama_auditor'),
          'nama_irban'    => $this->input->post('nama_irban'),
          'nama_irban_seo'    => char_seo($this->input->post('nama_irban')),
          'foto'          => $nmfile.$userfile['file_ext']
        );

        // eksekusi query INSERT
        $this->Auditor_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/auditor'));
      }
  }
  else
  {
    $data = array(
      'nip'  => $this->input->post('nip'),
      'nama_auditor'  => $this->input->post('nama_auditor'),
      'nama_irban'    => $this->input->post('nama_irban'),
      'nama_irban_seo'    => char_seo($this->input->post('nama_irban'))
    );

    // eksekusi query INSERT
    $this->Auditor_model->insert($data);
    // set pesan data berhasil dibuat
    $this->session->set_flashdata('message', 'Data berhasil dibuat');
    redirect(site_url('admin/auditor'));
    }
  }
}


  public function update($id)
  {
    $row = $this->Auditor_model->get_by_id($id);
    $this->data['auditor'] = $this->Auditor_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Auditor';
      $this->data['action']         = site_url('admin/auditor/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_auditor'] = array(
        'name'  => 'id_auditor',
        'id'    => 'id_auditor',
        'type'  => 'hidden',
      );

      $this->data['nip'] = array(
        'name'  => 'nip',
        'id'    => 'nip',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['nama_auditor'] = array(
        'name'  => 'nama_auditor',
        'id'    => 'nama_auditor',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['nama_irban'] = array(
        'name'  => 'nama_irban',
        'id'    => 'nama_irban',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['get_combo_irban'] = $this->Irban_model->get_combo_irban();
      $this->load->view('back/auditor/auditor_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/auditor'));
      }
  }

  public function update_action()
  {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_auditor'));
      }
        else
        {
        $nmfile = char_seo($this->input->post('nip'));
        $id['id_auditor'] = $this->input->post('id_auditor');

        /* Jika file upload diisi */
        if ($_FILES['userfile']['error'] <> 4)
        {
          // select column yang akan dihapus (gambar) berdasarkan id
          $this->db->select("foto");
          $this->db->where($id);
          $query = $this->db->get('auditor');
          $row = $query->row();

          // menyimpan lokasi gambar dalam variable
          $dir = "assets/images/auditor/".$row->foto;
          $dir_thumb = "assets/images/auditor/".'thumb_'.$row->foto;

          // Jika ada foto lama, maka hapus foto kemudian upload yang baru
          if($dir)
          {
            $nmfile = char_seo($this->input->post('nip'));

            // Hapus foto
            unlink($dir);
            unlink($dir_thumb);

            //load uploading file library
            $config['upload_path']      = './assets/images/auditor/';
            $config['allowed_types']    = 'jpg|jpeg|png|gif';
            $config['max_size']         = '2048'; // 2 MB
            $config['max_width']        = '2000'; //pixels
            $config['max_height']       = '2000'; //pixels
            $config['file_name']        = $nmfile; //nama yang terupload nantinya

            $this->load->library('upload', $config);

            // Jika file gagal diupload -> kembali ke form update
            if (!$this->upload->do_upload())
            {
              $this->update();
            }
              // Jika file berhasil diupload -> lanjutkan ke query INSERT
              else
              {
                $userfile = $this->upload->data();
                // library yang disediakan codeigniter
                $thumbnail                = $config['file_name'];
                //nama yang terupload nantinya
                $config['image_library']  = 'gd2';
                // gambar yang akan dibuat thumbnail
                $config['source_image']   = './assets/images/auditor/'.$userfile['file_name'].'';
                // membuat thumbnail
                $config['create_thumb']   = TRUE;
                // rasio resolusi
                $config['maintain_ratio'] = FALSE;
                // lebar
                $config['width']          = 400;
                // tinggi
                $config['height']         = 200;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

          $data = array(
            'nip'  => $this->input->post('nip'),
            'nama_auditor'  => $this->input->post('nama_auditor'),
            'nama_irban'  => $this->input->post('nama_irban'),
            'nama_irban_seo'  => char_seo($this->input->post('nama_irban')),
            'foto'        => $nmfile.$userfile['file_ext']
          );

          $this->Auditor_model->update($this->input->post('id_auditor'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/auditor'));
        }
    }
    else
    {
                $config['upload_path']      = './assets/images/auditor/';
                $config['allowed_types']    = 'jpg|jpeg|png|gif';
                $config['max_size']         = '2048'; // 2 MB
                $config['max_width']        = '2000'; //pixels
                $config['max_height']       = '2000'; //pixels
                $config['file_name']        = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                // Jika file gagal diupload -> kembali ke form update
                if (!$this->upload->do_upload())
                {
                  $this->update();
                }
                  // Jika file berhasil diupload -> lanjutkan ke query INSERT
                  else
                  {
                    $userfile = $this->upload->data();
                    // library yang disediakan codeigniter
                    $thumbnail                = $config['file_name'];
                    //nama yang terupload nantinya
                    $config['image_library']  = 'gd2';
                    // gambar yang akan dibuat thumbnail
                    $config['source_image']   = './assets/images/auditor/'.$userfile['file_name'].'';
                    // membuat thumbnail
                    $config['create_thumb']   = TRUE;
                    // rasio resolusi
                    $config['maintain_ratio'] = FALSE;
                    // lebar
                    $config['width']          = 400;
                    // tinggi
                    $config['height']         = 200;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = array(
                      'nip'  => $this->input->post('nip'),
                      'nama_auditor'  => $this->input->post('nama_auditor'),
                      'nama_irban'  => $this->input->post('nama_irban'),
                      'nama_irban_seo'  => char_seo($this->input->post('nama_irban')),
                      'foto'        => $nmfile.$userfile['file_ext']
                    );

                    $this->Auditor_model->update($this->input->post('id_auditor'), $data);
                    $this->session->set_flashdata('message', 'Edit Data Berhasil');
                    redirect(site_url('admin/auditor'));
                  }
                }
              }
              else
              {
                $data = array(
                  'nip'  => $this->input->post('nip'),
                  'nama_auditor'  => $this->input->post('nama_auditor'),
                  'nama_irban'  => $this->input->post('nama_irban'),
                  'nama_irban_seo'  => char_seo($this->input->post('nama_irban'))
                );

                $this->Auditor_model->update($this->input->post('id_auditor'), $data);
                $this->session->set_flashdata('message', 'Edit Data Berhasil');
                redirect(site_url('admin/auditor'));
              }
        }
    }

    public function delete($id)
    {
      $row = $this->Auditor_model->get_by_id($id);

      $this->db->select("foto");
      $this->db->where('id_auditor',$row->id_auditor);
      $query = $this->db->get('auditor');
      $row2 = $query->row();

      // menyimpan lokasi gambar dalam variable
      $dir = "assets/images/auditor/".$row2->foto;
      //$dir_thumb = "assets/images/auditor/".'thumb_'.$row2->foto;

      if ($row)
      {
        // Hapus foto
        unlink($dir);
        unlink($dir_thumb);

        $this->Auditor_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/auditor'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/auditor'));
        }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('nip', 'NIP', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_auditor', 'id_auditor', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
