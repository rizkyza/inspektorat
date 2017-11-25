<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tim_model extends CI_Model
{
  public $table = 'tim_auditor_spt';
  public $id    = 'id_tim';
  public $nama_irban = 'nama_irban';
  public $no_spt = 'no_spt';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_by_tim()
  {
    $this->load->model('Ion_auth_model');
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->where('no_spt',$this->form_validation->set_value('no_spt'));
    $this->db->order_by('nama', 'ASC');
    return $this->db->get($this->table)->result();
  } else {
    $this->db->where('no_spt',$this->no_spt);
    $this->db->order_by('nama', 'ASC');
    return $this->db->get($this->table)->result();
  }
  }

  function get_combo_tim()
  {
    $this->db->order_by('nama', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama']] = $row['nama'];
      }
      return $data;
    }
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('nip', $id);
    return $this->db->get($this->table)->row();
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
