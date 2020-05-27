<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kodepk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Kodepk_model');

    $this->data['module'] = 'Kode';

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
    $this->data['title'] = "KODE URAIAN KELOMPOK PENYEBAB PENYIMPANGAN";

    $this->data['kode_data'] = $this->Kodepk_model->get_all();
    $this->load->view('back/kodepk/kode_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Kode Baru';
    $this->data['action']         = site_url('admin/kodepk/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_kode'] = array(
      'kode'  => 'id_kode',
      'keterangan'    => 'id_kode',
      'uraian'    => 'id_kode',
      'type'  => 'hidden',
    );

    $this->data['kode'] = array(
      'name'  => 'kode',
      'id'    => 'kode',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('kode'),
    );

    $this->data['keterangan'] = array(
      'name'  => 'keterangan',
      'id'    => 'keterangan',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('keterangan'),
    );

    $this->data['uraian'] = array(
      'name'  => 'uraian',
      'id'    => 'uraian',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('uraian'),
    );

    $this->load->view('back/kodepk/kode_add', $this->data);
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
          'keterangan'  => $this->input->post('keterangan'),
          'uraian'  => $this->input->post('uraian')
        );

        // eksekusi query INSERT
        $this->Kodepk_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/kodepk'));
      }
  }

  public function update($id)
  {
    $row = $this->Kodepk_model->get_by_id($id);
    $this->data['kodex'] = $this->Kodepk_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Kode';
      $this->data['action']         = site_url('admin/kodepk/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_kode'] = array(
        'name'  => 'id_kode',
        'id'    => 'id_kode',
        'type'  => 'hidden',
      );

      $this->data['kode'] = array(
        'name'  => 'kode',
        'id'    => 'kode',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['keterangan'] = array(
        'name'  => 'keterangan',
        'id'    => 'keterangan',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['uraian'] = array(
        'name'  => 'uraian',
        'id'    => 'uraian',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->view('back/kodepk/kode_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/kodepk'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_kode'));
      }
        else
        {
          $data = array(
            'kode'  => $this->input->post('kode'),
            'keterangan'  => $this->input->post('keterangan'),
            'uraian'  => $this->input->post('uraian'),
          );

          $this->Kodepk_model->update($this->input->post('id_kode'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/kodepk'));
        }
    }

    public function delete($id)
    {
      $row = $this->Kodepk_model->get_by_id($id);

      if ($row)
      {
        $this->Kodepk_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/kodepk'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/kodepk'));
        }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_kode', 'id_kode', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
