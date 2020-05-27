<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		/* memanggil model untuk ditampilkan pada masing2 modul*/

    /* menyiapkan data yang akan disertakan/ ditampilkan pada view */
		$this->data['page'] = 'Home';
		$this->data['title'] = 'E-Auditor Inspektorat Daerah Kalimantan Selatan';

		/* memanggil function dari masing2 model yang akan digunakan */

		/* memanggil view yang telah disiapkan dan passing data dari model ke view*/
		$this->load->view('front/home/body', $this->data);
	}

}
