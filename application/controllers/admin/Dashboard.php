<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		$this->load->model('Irban_model');
		$this->load->model('Skpd_model');
		$this->load->model('Spt_model');
		$this->load->model('Auditor_model');
    $this->load->model('Ion_auth_model');
		$this->load->model('Entry_tim_model');
		$this->load->model('Lhp_model');
		$this->load->model('Temuan_model');
		$this->load->model('Rekomendasi_model');

    /* cek status login */
		if (!$this->ion_auth->logged_in()){
			// apabila belum login maka diarahkan ke halaman login
			redirect('admin/auth/login', 'refresh');
		}
		elseif($this->ion_auth->is_user()){
			// apabila belum login maka diarahkan ke halaman login
			redirect('admin/auth/login', 'refresh');
		}
		else{
			$this->data = array(
	      'title' 							=> 'Dashboard',
	      'button' 							=> 'Tambah',
		    'total_irban' 				=> $this->Irban_model->total_rows(),
		    'total_skpd' 					=> $this->Skpd_model->total_rows(),
				'total_auditor' 			=> $this->Auditor_model->total_rows(),
				'total_user' 					=> $this->Ion_auth_model->total_rows(),
				'total_lhp' 					=> $this->Lhp_model->total_rows(),
				'total_spt' 					=> $this->Spt_model->total_rows(),
				'total_temuan' 				=> $this->Temuan_model->total_rows(),
				'total_rekomendasi' 	=> $this->Rekomendasi_model->total_rows(),
			);

			$this->load->view('back/dashboard',$this->data);
		}
	}

}
