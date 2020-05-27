<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lihatlhp extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Lihatlhp_model');
    $this->load->model('Irban_model');
    $this->load->model('Skpd_model');
    $this->data['module'] = 'LHP';

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
//download semua data
  public function report_data_lhp()
  {
    $this->load->library('m_pdf');


    $pdfFilePath ="DATA LHP-".time()."-download.pdf";
    $stylesheet = file_get_contents('mpdf.css');

    include('mpdf60/mpdf.php');
    $pdf = $this->m_pdf->load();

    $pdf->SetHTMLHeader('<div style="text-align:left; font-weight:bold;">
                            <img height="80" src="' . base_url() . 'assets/images/header.png"/></div>
                          <hr />');

    $pdf->SetHTMLFooter('<hr />
                <table width="100%">
                    <tr>
                        <td width="33%">{DATE j-m-Y}</td>
                        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                        <td width="33%" style="text-align: right;">Data LHP</td>
                    </tr>
                </table>');

    $pdf->WriteHTML($stylesheet, 1);

    $pdf->AddPage('L', // L - landscape, P - portrait
        '', '', '', '',
        20, // margin_left
        20, // margin right
        40, // margin top
        20, // margin bottom
        5, // margin header
        5); // margin footer
    $pdf->SetDisplayMode('fullpage');

    $this->data['lhp_data'] = $this->Lihatlhp_model->get_all_by_irban();
    $html = $this->load->view('back/laporan/lhp_list_view', $this->data,true);
    $pdf->WriteHTML($html,2);

    $pdf->Output($pdfFilePath, "D");
    exit();
  }
//download berdasarkan tahun
  public function report_data_tahun_lhp($id)
  {
    $this->load->library('m_pdf');


    $pdfFilePath ="DATA LHP-".time()."-download.pdf";
    $stylesheet = file_get_contents('mpdf.css');

    include('mpdf60/mpdf.php');
    $pdf = $this->m_pdf->load();

    $pdf->SetHTMLHeader('<div style="text-align:left; font-weight:bold;">
                            <img height="80" src="' . base_url() . 'assets/images/header.png"/></div>
                          <hr />');

    $pdf->SetHTMLFooter('<hr />
                <table width="100%">
                    <tr>
                        <td width="33%">{DATE j-m-Y}</td>
                        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                        <td width="33%" style="text-align: right;">Data LHP</td>
                    </tr>
                </table>');

    $pdf->WriteHTML($stylesheet, 1);

    $pdf->AddPage('L', // L - landscape, P - portrait
        '', '', '', '',
        20, // margin_left
        20, // margin right
        40, // margin top
        20, // margin bottom
        5, // margin header
        5); // margin footer
    $pdf->SetDisplayMode('fullpage');

    $this->data['lhp_data'] = $this->Lihatlhp_model->get_lhp_by_tahun($id);
    $html = $this->load->view('back/laporan/lhp_list_view', $this->data,true);
    $pdf->WriteHTML($html,2);

    $pdf->Output($pdfFilePath, "D");
    exit();
  }

  //download berdasarkan tahun dan irban
    public function report_data_tahun_and_irban_lhp($id,$id2)
    {
      $this->load->library('m_pdf');


      $pdfFilePath ="DATA LHP-".time()."-download.pdf";
      $stylesheet = file_get_contents('mpdf.css');

      include('mpdf60/mpdf.php');
      $pdf = $this->m_pdf->load();

      $pdf->SetHTMLHeader('<div style="text-align:left; font-weight:bold;">
                              <img height="80" src="' . base_url() . 'assets/images/header.png"/></div>
                            <hr />');

      $pdf->SetHTMLFooter('<hr />
                  <table width="100%">
                      <tr>
                          <td width="33%">{DATE j-m-Y}</td>
                          <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                          <td width="33%" style="text-align: right;">Data LHP</td>
                      </tr>
                  </table>');

      $pdf->WriteHTML($stylesheet, 1);

      $pdf->AddPage('L', // L - landscape, P - portrait
          '', '', '', '',
          20, // margin_left
          20, // margin right
          40, // margin top
          20, // margin bottom
          5, // margin header
          5); // margin footer
      $pdf->SetDisplayMode('fullpage');

      $this->data['lhp_data'] = $this->Lihatlhp_model->get_lhp_by_tahun_and_irban($id,$id2);
      $html = $this->load->view('back/laporan/lhp_list_view', $this->data,true);
      $pdf->WriteHTML($html,2);

      $pdf->Output($pdfFilePath, "D");
      exit();
    }

    //download berdasarkan tahun dan skpd
      public function report_data_tahun_and_skpd_lhp($id,$id2)
      {
        $this->load->library('m_pdf');


        $pdfFilePath ="DATA LHP-".time()."-download.pdf";
        $stylesheet = file_get_contents('mpdf.css');

        include('mpdf60/mpdf.php');
        $pdf = $this->m_pdf->load();

        $pdf->SetHTMLHeader('<div style="text-align:left; font-weight:bold;">
                                <img height="80" src="' . base_url() . 'assets/images/header.png"/></div>
                              <hr />');

        $pdf->SetHTMLFooter('<hr />
                    <table width="100%">
                        <tr>
                            <td width="33%">{DATE j-m-Y}</td>
                            <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                            <td width="33%" style="text-align: right;">Data LHP</td>
                        </tr>
                    </table>');

        $pdf->WriteHTML($stylesheet, 1);

        $pdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            20, // margin_left
            20, // margin right
            40, // margin top
            20, // margin bottom
            5, // margin header
            5); // margin footer
        $pdf->SetDisplayMode('fullpage');

        $this->data['lhp_data'] = $this->Lihatlhp_model->get_lhp_by_tahun_and_skpd($id,$id2);
        $html = $this->load->view('back/laporan/lhp_list_view', $this->data,true);
        $pdf->WriteHTML($html,2);

        $pdf->Output($pdfFilePath, "D");
        exit();
      }

  public function tahunlhp($id)
  {
    $this->data['lhp_data'] = $this->Lihatlhp_model->get_lhp_by_tahun($id);
    $this->load->view('back/laporan/lhp_list_view', $this->data);
  }

  public function tahunirbanlhp($id,$id2)
  {
    $this->data['lhp_data'] = $this->Lihatlhp_model->get_lhp_by_tahun_and_irban($id,$id2);
    $this->load->view('back/laporan/lhp_list_view', $this->data);
  }

  public function tahunskpdlhp($id,$id2)
  {
    $this->data['lhp_data'] = $this->Lihatlhp_model->get_lhp_by_tahun_and_skpd($id,$id2);
    $this->load->view('back/laporan/lhp_list_view', $this->data);
  }



  public function laporanlhp()
  {
    $this->data['title'] = "Laporan LHP";
    $this->data['action']         = site_url('admin/laporan/view/');

    $this->data['tahun'] = array(
      'name'  => 'tahun',
      'id'    => 'tahun',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('tahun'),
    );

    $this->data['nama_irban'] = array(
      'name'  => 'nama_irban',
      'id'    => 'nama_irban',
      'type'  => 'text',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_irban'),
      );
      $this->data['nama_skpd'] = array(
        'name'  => 'nama_skpd',
        'id'    => 'nama_skpd',
        'type'  => 'text',
        'class' => 'form-control',
        'value' => $this->form_validation->set_value('nama_skpd'),
      );


    $this->data['laporan_data'] = $this->Lihatlhp_model->get_all();
    $this->data['get_combo_irban'] = $this->Irban_model->get_combo_irban_seo();
    $this->data['get_combo_skpd'] = $this->Skpd_model->get_combo_skpd_seo();
    $this->load->view('back/laporan/laporan_lhp', $this->data);
  }
}
