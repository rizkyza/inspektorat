<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Skpd extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Skpd_model');
    $this->load->model('Irban_model');

    $this->data['module'] = 'Skpd';

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
    $this->data['title'] = "Data SKPD (PKPT)";

    $this->data['skpd_data'] = $this->Skpd_model->get_all();
    $this->load->view('back/skpd/skpd_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah SKPD Baru';
    $this->data['action']         = site_url('admin/skpd/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_skpd'] = array(
      'name'  => 'id_skpd',
      'id'    => 'id_skpd',
      'type'  => 'hidden',
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
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban'),
    );

    $this->data['nama_irban_seo'] = array(
      'name'  => 'nama_irban_seo',
      'id'    => 'nama_irban_seo',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban_seo'),
    );

    $this->data['get_combo_irban'] = $this->Irban_model->get_combo_irban();
    $this->load->view('back/skpd/skpd_add', $this->data);
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
        $data = array(
          'nama_skpd'  => $this->input->post('nama_skpd'),
          'nama_skpd_seo'  => char_seo($this->input->post('nama_skpd')),
          'nama_irban'  => $this->input->post('nama_irban'),
          'nama_irban_seo'  => char_seo($this->input->post('nama_irban'))
        );

        // eksekusi query INSERT
        $this->Skpd_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/Skpd'));
      }
  }

  public function update($id)
  {
    $row = $this->Skpd_model->get_by_id($id);
    $this->data['skpd'] = $this->Skpd_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Data SKPD';
      $this->data['action']         = site_url('admin/skpd/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_skpd'] = array(
        'name'  => 'id_skpd',
        'id'    => 'id_skpd',
        'type'  => 'hidden',
      );

      $this->data['nama_skpd'] = array(
        'name'  => 'nama_skpd',
        'id'    => 'nama_skpd',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['nama_irban'] = array(
        'name'  => 'nama_irban',
        'id'    => 'nama_irban',
        'type'  => 'text',
        'class' => 'form-control',
        'value' => $this->form_validation->set_value('nama_irban'),
      );

      $this->data['nama_irban_seo'] = array(
        'name'  => 'nama_irban_seo',
        'id'    => 'nama_irban_seo',
        'type'  => 'text',
        'class' => 'form-control',
        'value' => $this->form_validation->set_value('nama_irban_seo'),
      );

      $this->data['get_combo_irban'] = $this->Irban_model->get_combo_irban();
      $this->load->view('back/skpd/skpd_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/skpd'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_skpd'));
      }
        else
        {
          $data = array(
            'nama_skpd'  => $this->input->post('nama_skpd'),
            'nama_skpd_seo'    => char_seo($this->input->post('nama_skpd')),
            'nama_irban'  => $this->input->post('nama_irban'),
            'nama_irban_seo'  => char_seo($this->input->post('nama_irban'))
          );

          $this->Skpd_model->update($this->input->post('id_skpd'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/skpd'));
        }
    }

    public function delete($id)
    {
      $row = $this->Skpd_model->get_by_id($id);

      if ($row)
      {
        $this->Skpd_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/skpd'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/skpd'));
        }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('nama_skpd', 'Nama SKPD', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_skpd', 'id_skpd', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
