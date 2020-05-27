<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lhp extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Lhp_model');
    $this->load->model('Tim_model');

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

  public function index()
  {
    $this->data['title'] = "Data LHP";

    $this->data['lhp_data'] = $this->Lhp_model->get_all_by_irban();
    $this->load->view('back/lhp/lhp_list', $this->data);
  }

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
                                  <td width="33%" style="font-size:9px; font-family:chelvetica;">{DATE j-m-Y}</td>
                                  <td width="33%" align="center" style="font-size:9px; font-family:chelvetica;">{PAGENO}/{nbpg}</td>
                                  <td width="33%" style="font-size:9px; font-family:chelvetica; text-align: right;">Downloader: '.$this->session->userdata('username').'</td>
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

    $this->data['lhp_data'] = $this->Lhp_model->get_all_by_irban();
    $html = $this->load->view('back/lhp/lhp_list_view', $this->data,true);
		$pdf->WriteHTML($html,2);

		$pdf->Output($pdfFilePath, "D");
    exit();
  }

  public function view()
  {
    $this->data['title'] = "Data LHP";

    $this->data['lhp_data'] = $this->Lhp_model->get_all_by_irban();
    $this->load->view('back/lhp/lhp_list_view', $this->data);
  }


  public function uploadpkp()
  {
    if($_FILES["pkp"]["error"] <> 4)
    {
    $this->db->where('id_lhp',$this->input->post('id_lhp'));
    $query = $this->db->get('lhp');
    $row = $query->row();

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/files/pkp/".$row->file_pkp;

    $config['upload_path'] = './assets/files/pkp';
    $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
    $config['file_name']        = 'pkp-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
    //$config['overwrite'] = TRUE;
    //$config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('pkp')){
          $status = "error";
          $msg = $this->upload->display_errors();
      }
      else{
        if (file_exists($dir))
        {
          unlink($dir);
          $dataupload = $this->upload->data();
          $data = array(
            'file_pkp'  => $dataupload['file_name']
          );
          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
        } else {
          $dataupload = $this->upload->data();
          $data = array(
            'file_pkp'  => $dataupload['file_name']
          );
          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
        };

      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
}

  public function uploadba()
  {
    if($_FILES["ba"]["error"] <> 4)
    {
    $this->db->where('id_lhp',$this->input->post('id_lhp'));
    $query = $this->db->get('lhp');
    $row = $query->row();

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/files/ba/".$row->file_ba;

    $config['upload_path'] = './assets/files/ba';
    $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
    $config['file_name']        = 'ba-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
    //$config['overwrite'] = TRUE;
    //$config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('ba')){
          $status = "error";
          $msg = $this->upload->display_errors();
      }
      else{

        if (file_exists($dir))
        {
          unlink($dir);
        }
          $dataupload = $this->upload->data();
          $data = array(
            'file_ba'  => $dataupload['file_name']
          );
          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
}

  public function uploadkkp()
  {
    if($_FILES["kkp"]["error"] <> 4)
    {
    $this->db->where('id_lhp',$this->input->post('id_lhp'));
    $query = $this->db->get('lhp');
    $row = $query->row();

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/files/kkp/".$row->file_kkp;

    $config['upload_path'] = './assets/files/kkp';
    $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
    $config['file_name']        = 'kkp-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
    //$config['overwrite'] = TRUE;
    //$config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('kkp')){
          $status = "error";
          $msg = $this->upload->display_errors();
      }
      else{
        if (file_exists($dir))
        {
          unlink($dir);
        }
          $dataupload = $this->upload->data();
          $data = array(
            'file_kkp'  => $dataupload['file_name']
          );
          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
}

  public function uploadbheb()
  {
    if($_FILES["bheb"]["error"] <> 4)
    {
    $this->db->where('id_lhp',$this->input->post('id_lhp'));
    $query = $this->db->get('lhp');
    $row = $query->row();

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/files/bheb/".$row->file_bheb;

    $config['upload_path'] = './assets/files/bheb';
    $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
    $config['file_name']        = 'bheb-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
    //$config['overwrite'] = TRUE;
    //$config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('bheb')){
          $status = "error";
          $msg = $this->upload->display_errors();
      }
      else{
        if (file_exists($dir))
        {
          unlink($dir);
        }
          $dataupload = $this->upload->data();
          $data = array(
            'file_bheb'  => $dataupload['file_name']
          );
          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
}

  public function uploadne()
  {
    if($_FILES["ne"]["error"] <> 4)
    {
    $this->db->where('id_lhp',$this->input->post('id_lhp'));
    $query = $this->db->get('lhp');
    $row = $query->row();

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/files/ne/".$row->file_ne;

    $config['upload_path'] = './assets/files/ne';
    $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
    $config['file_name']        = 'ne-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
    //$config['overwrite'] = TRUE;
    //$config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('ne')){
          $status = "error";
          $msg = $this->upload->display_errors();
      }
      else{
        if (file_exists($dir))
        {
          unlink($dir);
        }
          $dataupload = $this->upload->data();
          $data = array(
            'file_ne'  => $dataupload['file_name']
          );
          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $status = "success";
          $msg = $dataupload['file_name'];
      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }
}

public function uploadkl()
{
  if($_FILES["kl"]["error"] <> 4)
  {
  $this->db->where('id_lhp',$this->input->post('id_lhp'));
  $query = $this->db->get('lhp');
  $row = $query->row();

  // menyimpan lokasi gambar dalam variable
  $dir = "assets/files/kl/".$row->file_kl;

  $config['upload_path'] = './assets/files/kl';
  $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
  $config['file_name']        = 'kl-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
  //$config['overwrite'] = TRUE;
  //$config['encrypt_name'] = TRUE;

  $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('kl')){
        $status = "error";
        $msg = $this->upload->display_errors();
    }
    else{
      if (file_exists($dir))
      {
        unlink($dir);
      }
        $dataupload = $this->upload->data();
        $data = array(
          'file_kl'  => $dataupload['file_name']
        );
        $this->Lhp_model->update($this->input->post('id_lhp'), $data);
        $status = "success";
        $msg = $dataupload['file_name'];
    }
  $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
}
}

public function uploadndli()
{
  if($_FILES["ndli"]["error"] <> 4)
  {
  $this->db->where('id_lhp',$this->input->post('id_lhp'));
  $query = $this->db->get('lhp');
  $row = $query->row();

  // menyimpan lokasi gambar dalam variable
  $dir = "assets/files/ndli/".$row->file_ndli;

  $config['upload_path'] = './assets/files/ndli';
  $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
  $config['file_name']        = 'ndli-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
  //$config['overwrite'] = TRUE;
  //$config['encrypt_name'] = TRUE;

  $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('ndli')){
        $status = "error";
        $msg = $this->upload->display_errors();
    }
    else{
      if (file_exists($dir))
      {
        unlink($dir);
      }
        $dataupload = $this->upload->data();
        $data = array(
          'file_ndli'  => $dataupload['file_name']
        );
        $this->Lhp_model->update($this->input->post('id_lhp'), $data);
        $status = "success";
        $msg = $dataupload['file_name'];
    }
  $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
}
}

public function uploadndlg()
{
  if($_FILES["ndlg"]["error"] <> 4)
  {
  $this->db->where('id_lhp',$this->input->post('id_lhp'));
  $query = $this->db->get('lhp');
  $row = $query->row();

  // menyimpan lokasi gambar dalam variable
  $dir = "assets/files/ndlg/".$row->file_ndlg;

  $config['upload_path'] = './assets/files/ndlg';
  $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xls|xlsx|pptx|ppt|zip|rar';
  $config['file_name']        = 'ndlg-'.$this->input->post('id_lhp'); //nama yang terupload nantinya
  //$config['overwrite'] = TRUE;
  //$config['encrypt_name'] = TRUE;

  $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('ndlg')){
        $status = "error";
        $msg = $this->upload->display_errors();
    }
    else{
      if (file_exists($dir))
      {
        unlink($dir);
      }
        $dataupload = $this->upload->data();
        $data = array(
          'file_ndlg'  => $dataupload['file_name']
        );
        $this->Lhp_model->update($this->input->post('id_lhp'), $data);
        $status = "success";
        $msg = $dataupload['file_name'];
    }
  $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
}
}

  public function update($id)
  {
    $this->data['lhp_user'] = $this->Lhp_model->get_by_idlhp($id);
    $nospt = $this->data['lhp_user']->no_spt;

    $user = $this->Tim_model->get_by_nospt_nip($nospt);
    $this->data['users'] = $this->Tim_model->get_by_nospt_nip($nospt);

    if (!$user)
    {
      $this->session->set_flashdata('message', 'Anda tidak termasuk dalam Tim Auditor LHP ini. '.$this->data['users']->no_spt);
      redirect(site_url('admin/lhp'));
    } else {

    $row = $this->Lhp_model->get_by_id($id);
    $this->data['lhp'] = $this->Lhp_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update Data LHP dan Upload Berkas';
      $this->data['action']         = site_url('admin/lhp/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_lhp'] = array(
        'name'  => 'id_lhp',
        'id'    => 'id_lhp',
        'type'  => 'hidden',
      );

      $this->data['no_lhp'] = array(
        'name'  => 'no_lhp',
        'id'    => 'no_lhp',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['tanggal_lhp'] = array(
        'name'  => 'tanggal_lhp',
        'id'    => 'tanggal_lhp',
        'type'  => 'date',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['no_spt'] = array(
        'name'  => 'no_spt',
        'id'    => 'no_spt',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['tahun'] = array(
        'name'  => 'tahun',
        'id'    => 'tahun',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['skpd'] = array(
        'name'  => 'skpd',
        'id'    => 'skpd',
        'type'  => 'text',
        'class' => 'form-control',
        'readonly' => 'readonly',
      );

      $this->data['nama_irban'] = array(
        'name'  => 'nama_irban',
        'id'    => 'nama_irban',
        'type'  => 'text',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilepkp_no_lhp'] = array(
        'name'  => 'namafilepkp_no_lhp',
        'id'    => 'namafilepkp_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafileba_no_lhp'] = array(
        'name'  => 'namafileba_no_lhp',
        'id'    => 'namafileba_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilekkp_no_lhp'] = array(
        'name'  => 'namafilekkp_no_lhp',
        'id'    => 'namafilekkp_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilebheb_no_lhp'] = array(
        'name'  => 'namafilebheb_no_lhp',
        'id'    => 'namafilebheb_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilene_no_lhp'] = array(
        'name'  => 'namafilene_no_lhp',
        'id'    => 'namafilene_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilekl_no_lhp'] = array(
        'name'  => 'namafilekl_no_lhp',
        'id'    => 'namafilekl_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilendli_no_lhp'] = array(
        'name'  => 'namafilendli_no_lhp',
        'id'    => 'namafilendli_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->data['namafilendlg_no_lhp'] = array(
        'name'  => 'namafilendlg_no_lhp',
        'id'    => 'namafilendlg_no_lhp',
        'type'  => 'hidden',
        'readonly' => 'readonly',
        'class' => 'form-control',
      );

      $this->load->view('back/lhp/lhp_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', 'Data tidak ditemukan');
        redirect(site_url('admin/lhp'));
      }
    }
  }

  public function update_action()
    {
      $this->load->helper('char_seo_helper');
      $this->_rules_update();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_spt'));
      }
        else
        {
          $data = array(
            'tanggal_lhp'        => $this->input->post('tanggal_lhp'),
            'Updater'            => $this->session->userdata('identity'),
            'time_updater'       => date('Y-m-d H:i:s')
          );


          $this->Lhp_model->update($this->input->post('id_lhp'), $data);
          $this->session->set_flashdata('message', 'Edit Data Berhasil');
          redirect(site_url('admin/lhp/update/'.$this->input->post('id_lhp')));
        }
    }

    public function delete($id)
    {
      $row = $this->Lhp_model->get_by_id($id);

      if ($row)
      {
        $this->Spt_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect(site_url('admin/lhp'));
      }
        // Jika data tidak ada
        else
        {
          $this->session->set_flashdata('message', 'Data tidak ditemukan');
          redirect(site_url('admin/lhp'));
        }
    }

    public function _rules()
    {

      //$this->form_validation->set_rules('tahun', 'Tahun SPT', 'trim|required');
      $this->form_validation->set_rules('no_spt', 'No SPT', 'trim|required');
      $this->form_validation->set_rules('keperluan_spt', 'Keperluan SPT', 'trim|required');
      $this->form_validation->set_rules('tanggal_spt', 'Tanggal SPT', 'trim|required');
      $this->form_validation->set_rules('tanggal_tugas', 'Tanggal Tugas', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_spt', 'id_spt', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');
    }

    public function _rules_update()
    {

      //$this->form_validation->set_rules('tahun', 'Tahun SPT', 'trim|required');
      $this->form_validation->set_rules('no_spt', 'No SPT', 'trim|required');

      // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_spt', 'id_spt', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>', '</div>');
    }

    function fetch_user(){
         $this->load->model("Entry_tim_model");
         $this->load->model("Spt_model");
         $no_spt = $this->input->post('no_spt');

         $fetch_data = $this->Entry_tim_model->make_datatables();
         $data = array();
         foreach($fetch_data as $row)
         {
              $sub_array = array();
              $sub_array[] = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" />';
              $sub_array[] = $row->nip;
              $sub_array[] = $row->nama;
              $sub_array[] = $row->jabatan;
              //$sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';
              $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
              $data[] = $sub_array;
         }
         $output = array(
              "draw"                    =>     intval($_POST["draw"]),
              "recordsTotal"          =>      $this->Entry_tim_model->get_all_data(),
              "recordsFiltered"     =>     $this->Entry_tim_model->get_filtered_data(),
              "data"                    =>     $data
         );
         echo json_encode($output);
    }
    function user_action(){
         $this->load->helper('char_seo_helper');
         $no_spt = $this->input->post('no_spt');
         //echo $no_spt;
         if($_POST["action"] == "Add")
         {
              $insert_data = array(
                   'no_spt'          =>     $this->input->post('no_sptau'),
                   'nama_irban'          =>     $this->input->post('nama_irbanau'),
                   'nama_irban_seo'          =>     char_seo($this->input->post('nama_irbanau')),
                   'tanggal_tugas'          =>     $this->input->post('tanggal_tugasau'),
                   'nip'          =>     $this->input->post('nip'),
                   'nama'               =>     $this->input->post("nama"),
                   'jabatan'               =>     $this->input->post("jabatan"),
                   'foto'               =>     $this->input->post("foto"),
                   'uploader'               =>     $this->session->userdata('identity'),
                   'time_uploader'       => date('Y-m-d H:i:s')
              );
              $this->load->model('Entry_tim_model');
              $this->Entry_tim_model->insert_crud($insert_data);
         }
         if($_POST["action"] == "Edit")
         {
              $user_image = '';
              if($_FILES["user_image"]["name"] != '')
              {
                   $user_image = $this->upload_image();
              }
              else
              {
                   $user_image = $this->input->post("hidden_user_image");
              }
              $updated_data = array(
                  'no_spt'          =>     $this->input->post('no_sptau'),
                  'nama_irban'          =>     $this->input->post('nama_irbanau'),
                  'nama_irban_seo'          =>     char_seo($this->input->post('nama_irbanau')),
                  'tanggal_tugas'          =>     $this->input->post('tanggal_tugasau'),
                   'nip'          =>     $this->input->post('nip'),
                   'nama'               =>     $this->input->post("nama"),
                   'jabatan'               =>     $this->input->post("jabatan"),
                   'foto'               =>     $this->input->post("foto")
                   //'foto'                    =>     $user_image
              );
              $this->load->model('Entry_tim_model');
              $this->Entry_tim_model->update_crud($this->input->post("user_id"), $updated_data);
              echo 'Data Updated';
         }
    }
    function upload_image()
    {
         if(isset($_FILES["user_image"]))
         {
              $extension = explode('.', $_FILES['user_image']['name']);
              $new_name = rand() . '.' . $extension[1];
              $destination = './assets/images/auditor/' . $new_name;
              move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
              return $new_name;
         }
    }
    function fetch_single_user()
    {
         $output = array();
         $this->load->model("Entry_tim_model");
         $data = $this->Entry_tim_model->fetch_single_user($_POST["user_id"]);
         foreach($data as $row)
         {
              $output['nip'] = $row->nip;
              $output['nama'] = $row->nama;
              if($row->foto != '')
              {
                   $output['user_image'] = '<img src="'.base_url().'assets/images/auditor/'.$row->foto.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';
              }
              else
              {
                   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
              }
         }
         echo json_encode($output);
    }

    function delete_single_user()
    {
        $this->load->model('Entry_tim_model');
        $this->Entry_tim_model->delete_single_user($_POST["user_id"]);
        echo 'Data telah dihapus';

    }
    function fetch_single_id()
    {
        $output = array();
        $this->load->model("Auditor_model");
        $data = $this->Auditor_model->fetch_single_id($_POST["nip"]);
        foreach($data as $row)
        {
             $output['nama_auditor'] = $row->nama_auditor;
             $output['foto'] = $row->foto;
        }
        echo json_encode($output);

    }


  }
