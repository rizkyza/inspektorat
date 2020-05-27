<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subsubkodepk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Subsubkodepk_model');
    $this->load->model('Subkodepk_model');
    $this->load->model('Kodepk_model');
    $this->data['module'] = 'Subsubkodepk';

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
    $this->data['title'] = "SUB SUBKODE TEMUAN PEMERIKSAAN";

    $this->data['subkode_data'] = $this->Subsubkodepk_model->get_all();
    $this->load->view('back/kodepk/subsubkode_list', $this->data);
  }

  function get_subkodepk($kode){
    $this->load->model('Subkodepk_model');
    header('Content-Type: application/x-json; charset=utf-8');
    echo(json_encode($this->Subkodepk_model->get_subkodepk($kode)));
  }

  function get_subsubkodepk($subkode){
    $this->load->model('Subsubkodepk_model');
    header('Content-Type: application/x-json; charset=utf-8');
    echo(json_encode($this->Subsubkodepk_model->get_subsubkodepk($subkode)));
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Subsubkode Baru';
    $this->data['action']         = site_url('admin/subsubkodepk/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['id_subsubkode'] = array(
      'kode'  => 'id_subsubkode',
      'subkode'  => 'id_subsubkode',
      'keterangan'    => 'id_subsubkode',
      'type'  => 'hidden',
    );

    $this->data['kode'] = array(
      'name'  => 'kode',
      'id'    => 'kode',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('kode'),
    );

    $this->data['subkode'] = array(
      'name'  => 'subkode',
      'id'    => 'subkode',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('kode'),
    );

    $this->data['subsubkode'] = array(
      'name'  => 'subsubkode',
      'id'    => 'subsubkode',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('subsubkode'),
    );

    $this->data['keterangan'] = array(
      'name'  => 'keterangan',
      'id'    => 'keterangan',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('keterangan'),
    );
    $this->data['get_combo_kode']=$this->Kodepk_model->get_combo_kode();
    $this->load->view('back/kodepk/subsubkode_add', $this->data);
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
          'subsubkode'  => $this->input->post('subsubkode'),
          'keterangan'  => $this->input->post('keterangan')
        );

        // eksekusi query INSERT
        $this->Subsubkodepk_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/subsubkodepk'));
      }
  }

  public function update($id)
  {
    $row = $this->Subsubkodepk_model->get_by_id($id);
    $this->data['kodex'] = $this->Subsubkodepk_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Subsubkode';
      $this->data['action']         = site_url('admin/subsubkodepk/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_subsubkode'] = array(
        'name'  => 'id_subsubkode',
        'id'    => 'id_subsubkode',
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

      $this->data['subsubkode'] = array(
        'name'  => 'subsubkode',
        'id'    => 'subsubkode',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->data['keterangan'] = array(
        'name'  => 'keterangan',
        'id'    => 'keterangan',
        'type'  => 'text',
        'class' => 'form-control',
      );

      $this->load->view('back/kodepk/subsubkode_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/subsubkodepk'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_subsubkode'));
      }
        else
        {
          $data = array(
            'id_kode'  => $this->input->post('id_kode'),
            'id_kode'  => $this->input->post('id_subkode'),
            'subkode'  => $this->input->post('subsubkode'),
            'keterangan'  => $this->input->post('keterangan'),

          );

          $this->Subkodepk_model->update($this->input->post('id_subsubkode'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/subsubkodepk'));
        }
    }

    public function delete($id)
    {
      $row = $this->Subsubkodepk_model->get_by_id($id);

      if ($row)
      {
        $this->Subsubkodepk_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/subsubkodepk'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/subsubkodepk'));
        }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
      $this->form_validation->set_rules('subkode', 'Subkode', 'trim|required');
      $this->form_validation->set_rules('subsubkode', 'Subsubkode', 'trim|required');
      $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_subsubkode', 'id_subsubkode', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
