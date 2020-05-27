<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subsubkodepk_model extends CI_Model
{
  public $table = 'sub_sub_kodepk';
  public $id    = 'id_subsubkode';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_subsubkodepk($kode = null){
    if($kode != NULL){
      $this->db->where('subkode', $kode);
    }
    $query = $this->db->get('sub_sub_kodepk');
    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['subsubkode'] = 'Pilih Sub Child Kode Sebab';
        $data[$row['subsubkode']] = $row['subsubkode'].' - '.$row['keterangan'];
      }
      return $data;
    }else{
      return FALSE;
    }
  }

  function get_combo_subsubkode()
  {
    $this->db->order_by('keterangan', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['keterangan']] = $row['keterangan'];
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