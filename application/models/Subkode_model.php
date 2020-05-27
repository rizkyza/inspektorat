<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subkode_model extends CI_Model
{
  public $table = 'sub_kode';
  public $id    = 'id_subkode';
  public $order = 'DESC';

  public function __construct() {
 $this -> load -> database();

}

function get_subkode($kode = null){
  if($kode != NULL){
    $this->db->where('kode', $kode);
  }
  $query = $this->db->get('sub_kode');

  if($query->num_rows() > 0){
    $data = array();
    foreach ($query->result_array() as $row)
    {
      $data['subkode'] = 'Pilih Sub Kode Temuan';
      $data[$row['subkode']] = $row['subkode'].' - '.$row['keterangan'];
    }
    return $data;
  }else{
    return FALSE;
  }
}

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_subkode()
  {
    $this->db->order_by('subkode', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['subkode'] = 'Pilih Sub kode temuan';
        $data[$row['subkode']] = $row['subkode'];
      }
      return $data;
    }
  }

  function get_combo_subkode_by_kode($kode)
  {
    $this->db->where('kode', $kode);
    $this->db->order_by('subkode', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['kode'] = 'Pilih kode temuan';
        $data[$row['subkode']] = $row['subkode'];
      }
      return $data;
    }
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
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
