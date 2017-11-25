<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tim extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Spt_model');
    $this->load->model('Skpd_model');
    $this->load->model('Auditor_model');
    $this->load->model('Ion_auth_model');
    $this->load->model('Tim_model');

    $this->data['module'] = 'SPT';

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
    $this->data['tim_data'] = $this->Spt_model->get_all_by_tim();
  }

  public function create()
  {
    $this->data['title']          = 'Input SPT';
    $this->data['action']         = site_url('admin/spt/create_action');
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
      'value' => $this->form_validation->set_value('no_spt'),
    );

    $this->data['tahun'] = array(
      'name'  => 'tahun',
      'id'    => 'tahun',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('tahun'),
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
      'readonly' => 'readonly',
      'class' => 'form-control',
      'value' => $this->session->userdata('usertype'),
    );

    $this->data['nama_irban_seo'] = array(
      'name'  => 'nama_irban_seo',
      'id'    => 'nama_irban_seo',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban_seo'),
    );

    $this->data['tanggal_spt'] = array(
      'name'  => 'tanggal_spt',
      'id'    => 'tanggal_spt',
      'type'  => 'date',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('tanggal_spt'),
    );

    $this->data['keperluan_spt'] = array(
      'name'  => 'keperluan_spt',
      'id'    => 'keperluan_spt',
      'type'  => 'date',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('keperluan_spt'),
    );

    $this->data['tanggal_tugas'] = array(
      'name'  => 'tanggal_tugas',
      'id'    => 'tanggal_tugas',
      'type'  => 'date',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('tanggal_tugas'),
    );

    $this->data['nama_auditor'] = array(
      'name'  => 'nama_auditor',
      'id'    => 'nama_auditor',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_auditor'),
    );

    $this->data['status'] = array(
      'name'  => 'status',
      'id'    => 'status',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => 'open',
    );

    $this->data['nip'] = array(
      'name'  => 'nip',
      'id'    => 'nip',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nip'),
    );

    $this->data['nama'] = array(
      'name'  => 'nama',
      'id'    => 'nama',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama'),
    );

    $this->data['tim_data'] = $this->Tim_model->get_all_by_tim();
    $this->data['get_combo_skpd'] = $this->Skpd_model->get_combo_skpd();
    $this->data['get_combo_auditor_by_irban'] = $this->Auditor_model->get_combo_auditor_by_irban();
    $this->load->view('back/spt/spt_add', $this->data);
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
          'no_spt'  => $this->input->post('no_spt'),
          'tahun'  => $this->input->post('tahun'),
          'nama_skpd'  => $this->input->post('nama_skpd'),
          'nama_skpd_seo'  => char_seo($this->input->post('nama_skpd')),
          'nama_irban'  => $this->input->post('nama_irban'),
          'nama_irban_seo'  => char_seo($this->input->post('nama_irban')),
          'tanggal_spt'  => $this->input->post('tanggal_spt'),
          'keperluan_spt'  => $this->input->post('keperluan_spt'),
          'tanggal_tugas'  => $this->input->post('tanggal_tugas'),
          'status'  => 'open'
        );

        // eksekusi query INSERT
        $this->Spt_model->insert($data);
        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', 'Data berhasil dibuat');
        redirect(site_url('admin/Spt'));
      }
  }

  public function update($id)
  {
    $row = $this->Spt_model->get_by_id($id);
    $this->data['spt'] = $this->Spt_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Data SPT';
      $this->data['action']         = site_url('admin/spt/update_action');
      $this->data['button_submit']  = 'Update';
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
      );

      $this->load->view('back/spt/spt_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/spt'));
      }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_spt'));
      }
        else
        {
          $data = array(
            'no_spt'  => $this->input->post('no_spt')
          );

          $this->Spt_model->update($this->input->post('id_spt'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/spt'));
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
      $this->form_validation->set_rules('no_spt', 'No SPT', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_spt', 'id_spt', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
    }

  }
