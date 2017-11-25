<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Irban extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Irban_model');

    $this->data['module'] = 'Irban';

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
    $this->data['title'] = "Data Irban";

    $this->data['irban_data'] = $this->Irban_model->get_all();
    $this->load->view('back/irban/irban_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Irban Baru';
    $this->data['action']         = site_url('admin/irban/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_irban'] = array(
      'name'  => 'id_irban',
      'id'    => 'id_irban',
      'type'  => 'hidden',
    );

    $this->data['no_irban'] = array(
      'name'  => 'no_irban',
      'id'    => 'no_irban',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('no_irban'),
    );

    $this->data['nama_irban'] = array(
      'name'  => 'nama_irban',
      'id'    => 'nama_irban',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban'),
    );

    $this->data['kepala_irban'] = array(
      'name'  => 'kepala_irban',
      'id'    => 'kepala_irban',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('kepala_irban'),
    );

    $this->load->view('back/irban/irban_add', $this->data);
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
          'no_irban'  => $this->input->post('no_irban'),
          'nama_irban'  => $this->input->post('nama_irban'),
          'nama_irban_seo'  => char_seo($this->input->post('nama_irban')),
          'kepala_irban'    => $this->input->post('kepala_irban')
        );

        // eksekusi query INSERT
        $this->Irban_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/irban'));
      }
  }

  public function update($id)
  {
    $row = $this->Irban_model->get_by_id($id);
    $this->data['irban'] = $this->Irban_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Irban';
      $this->data['action']         = site_url('admin/irban/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_irban'] = array(
        'name'  => 'id_irban',
        'id'    => 'id_irban',
        'type'  => 'hidden',
      );

      $this->data['no_irban'] = array(
        'name'  => 'no_irban',
        'id'    => 'no_irban',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['nama_irban'] = array(
        'name'  => 'nama_irban',
        'id'    => 'nama_irban',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['kepala_irban'] = array(
        'name'  => 'kepala_irban',
        'id'    => 'kepala_irban',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->view('back/irban/irban_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/irban'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_irban'));
      }
        else
        {
          $data = array(
            'no_irban'  => $this->input->post('no_irban'),
            'nama_irban'  => $this->input->post('nama_irban'),
            'nama_irban_seo'    => char_seo($this->input->post('nama_irban')),
            'kepala_irban'  => $this->input->post('kepala_irban')
          );

          $this->Irban_model->update($this->input->post('id_irban'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/irban'));
        }
    }

    public function delete($id)
    {
      $row = $this->Irban_model->get_by_id($id);

      if ($row)
      {
        $this->Irban_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/irban'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/irban'));
        }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('no_irban', 'No Irban', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_irban', 'id_irban', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
