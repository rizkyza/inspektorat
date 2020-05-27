<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihatauditor_model extends CI_Model
{
  public $table = 'auditor';
  public $id    = 'id_auditor';
  public $nama_irban = 'nama_irban';
  public $nama_auditor = 'nama_auditor';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function view_by_auditor($nip){
    $this->db->where('nip', $nip);
    $this->db->where('status', 'disetujui');
    return $this->db->get('kkp')->result();
  }

  function get_combo_auditor()
  {
    $this->db->order_by('nama_auditor', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama_auditor']] = $row['nama_auditor'];
      }
      return $data;
    }
  }

  // get combo filter irban
  function get_combo_auditor_by_irban()
  {
    $this->load->model('Ion_auth_model');
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->order_by('nama_auditor', 'ASC');
    $query = $this->db->get($this->table);
    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['nip'] = 'Pilih Auditor';
        $data[$row['nip']] = $row['nip'].' - '.$row['nama_auditor'];
      }
      return $data;
    }
  } else {
    $this->db->order_by('nama_auditor', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['nip'] = 'Pilih Auditor';
        $data[$row['nip']] = $row['nip'].'-'.$row['nama_auditor'];
      }
      return $data;
    }
  }
  }

  // get data by id
  function get_by_id($id)
  {
    $query=$this->db->where('id_auditor', $id);
    $this->db->or_where('nama_auditor', $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_nip($nip)
  {
    $query=$this->db->where('nip', $nip);
    $query=$this->db->get('auditor');
    return $query->result();
  }

  function get_foto_by_nip($nip)
  {
    $query=$this->db->where('nip', $nip);
    return $this->db->get($this->table)->row()->foto;
  }

  function fetch_single_id($nip)
  {
    $this->db->where("nip", $nip);
    $query=$this->db->get('auditor');
    return $query->result();
  }

  // get total rows
  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}
