<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkpt_calendar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pkpt_calendar_model');
		$this->load->model('Irban_model');
		$this->load->model('Skpd_model');

		$this->data['module'] = 'PKPT';

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

	public function index(){
		$this->data['title'] = "Kalender PKPT";

		$this->data['irbanwilt'] = array(
      'name'  => 'irbanwilt',
      'id'    => 'irbanwilt',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('irbanwilt'),
    );

		$this->data['skpdt'] = array(
      'name'  => 'skpdt',
      'id'    => 'skpdt',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('skpdt'),
		);

		$this->data['get_combo_skpd'] = $this->Skpd_model->get_combo_skpd_by_pkpt();
    $this->data['get_combo_irban'] = $this->Irban_model->get_combo_irban();
		$this->load->view('back/pkpt/pkpt_add', $this->data);
	}

	public function get_pkpt(){
		$r = $this->Pkpt_calendar_model->get_pkpt();
		echo json_encode($r);
	}

	public function create_pkpt(){

		$param['skpd'] = $this->input->post('skpd');
		$param['irbanwil'] = $this->input->post('irbanwil');
		$param['date_start'] = $this->input->post('date_start');
		$param['date_end'] = $this->input->post('date_end');
		$param['color'] = $this->input->post('color');
		$param['bulan'] = date("m-Y", strtotime($this->input->post('date_start')));
		$param['status'] = 'sedia';
		$param['uploader'] = $this->session->userdata('identity');
		$param['time_uploader'] = date('Y-m-d H:i:s');

		$this->Pkpt_calendar_model->insert_pkpt($param);
	}

	public function update_pkpt(){
		$param['id_pkpt'] = $this->input->post('id_pkpt');
		$param['date_start'] = $this->input->post('date_start');
		$param['date_end'] = $this->input->post('date_end');

		$r = $this->Pkpt_calendar_model->update_pkpt($param);

		echo $r;
	}

	public function delete_pkpt(){
		$id_pkpt = $this->input->post('id_pkpt');
		$r = $this->Pkpt_calendar_model->delete_pkpt($id_pkpt);
		echo $r;
	}

	public function updEvento2(){
		$param['id'] = $this->input->post('id');
		$param['nome'] = $this->input->post('nom');
		$param['web'] = $this->input->post('web');

		$r = $this->Pkpt_calendar_model->updEvento2($param);

		echo $r;
	}
}
