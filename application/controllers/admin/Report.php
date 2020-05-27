<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library("Pdf_report");
        $this->load->model('Spt_model');
    }

    public function index()
    {
      $this->data['spt_data'] = $this->Spt_model->get_all_by_irban();
      $this->load->view('back/laporan/v_spt', $this->data);
    }


}

/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php */
