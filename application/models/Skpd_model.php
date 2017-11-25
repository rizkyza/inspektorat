<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skpd_model extends CI_Model
{
  public $table = 'data_skpd';
  public $id    = 'id_skpd';
  public $nama_irban = 'nama_irban';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_skpd()
  {
    $this->db->order_by('nama_skpd', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama_skpd']] = $row['nama_skpd'];
      }
      return $data;
    }
  }

  function get_combo_skpd_by_pkpt()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->order_by('nama_skpd', 'ASC');
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $query = $this->db->get($this->table);
  } else {
    $this->db->order_by('nama_skpd', 'ASC');
    $query = $this->db->get($this->table);
  }

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama_skpd']] = $row['nama_skpd'];
      }
      return $data;
    }
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('nama_skpd_seo', $id);
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
