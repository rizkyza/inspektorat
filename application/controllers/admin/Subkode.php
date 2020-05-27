<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subkode extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Subkode_model');
    $this->load->model('Kode_model');
    $this->data['module'] = 'Subkode';

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
    $this->data['title'] = "SUBKODE TEMUAN PEMERIKSAAN";

    $this->data['subkode_data'] = $this->Subkode_model->get_all();
    $this->load->view('back/kode/subkode_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Subkode Baru';
    $this->data['action']         = site_url('admin/subkode/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_subkode'] = array(
      'kode'  => 'id_subkode',
      'subkode'  => 'id_subkode',
      'keterangan'    => 'id_subkode',
      'type'  => 'hidden',
    );

    $this->data['kode'] = array(
      'name'  => 'kode',
      'id'    => 'kode',
      'type'  => 'hidden',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('kode'),
    );

    $this->data['subkode'] = array(
      'name'  => 'subkode',
      'id'    => 'subkode',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('subkode'),
    );

    $this->data['keterangan'] = array(
      'name'  => 'keterangan',
      'id'    => 'keterangan',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('keterangan'),
    );
    $this->data['get_combo_kode']=$this->Kode_model->get_combo_kode();
    $this->load->view('back/kode/subkode_add', $this->data);
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
          'kode'  => $this->input->post('kode'),
          'subkode'  => $this->input->post('subkode'),
          'keterangan'  => $this->input->post('keterangan')
        );

        // eksekusi query INSERT
        $this->Subkode_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/subkode'));
      }
  }

  public function update($id)
  {
    $row = $this->Subkode_model->get_by_id($id);
    $this->data['kodex'] = $this->Subkode_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Subkode';
      $this->data['action']         = site_url('admin/subkode/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_subkode'] = array(
        'name'  => 'id_subkode',
        'id'    => 'id_subkode',
        'type'  => 'hidden',
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

      $this->data['keterangan'] = array(
        'name'  => 'keterangan',
        'id'    => 'keterangan',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->view('back/kode/subkode_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/subkode'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('kode'));
      }
        else
        {
          $data = array(
            'kode'  => $this->input->post('kode'),
            'subkode'  => $this->input->post('subkode'),
            'keterangan'  => $this->input->post('keterangan'),

          );

          $this->Subkode_model->update($this->input->post('id_subkode'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/subkode'));
        }
    }

    public function delete($id)
    {
      $row = $this->Subkode_model->get_by_id($id);

      if ($row)
      {
        $this->Subkode_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/subkode'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/subkode'));
        }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
      $this->form_validation->set_rules('subkode', 'Subkode', 'trim|required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_subkode', 'id_subkode', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
