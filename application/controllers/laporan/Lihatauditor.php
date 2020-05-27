<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lihatauditor extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Lihatauditor_model');
    $this->load->model('Irban_model');
    $this->load->model('Auditor_model');
    // $this->load->model('LihatLihatauditor_model');

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
    $this->data['title'] = "Laporan Hasil Kerja Auditor";

    $this->data['auditor_data'] = $this->Lihatauditor_model->get_all();
    $this->load->view('back/laporan/auditor_list', $this->data);
  }

  public function view($nip)
  {
    $this->data['title'] = "Laporan Hasil Kerja Auditor";
    $this->data['nip'] = $nip;
    $this->data['kkp_data'] = $this->Lihatauditor_model->view_by_auditor($nip);
    $this->data['auditor'] = $this->Auditor_model->get_by_nip_laporan($nip);
    $this->load->view('back/laporan/auditor_view', $this->data);
  }

  function foto_auditor(){
    $output = array();
    $this->load->model("Lihatauditor_model");
    $nip = $this->input->post('nip');
    $data = $this->Lihatauditor_model->get_by_nip($nip);
    foreach($data as $row)
    {
         $output['foto'] = $row->foto;
         $output['nama'] = $row->nama_auditor;
    }
    echo json_encode($output);
  }

}
