<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kodetl_model extends CI_Model
{
  public $table = 'kodetl';
  public $id    = 'id_kode';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_kode()
  {
    $this->db->order_by('kode', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['kode'] = 'Pilih Kode Tindak Lanjut';
        $data[$row['kode']] = $row['kode'];
      }
      return $data;
    }
  }

  function get_combo_kodetl()
  {
    $this->db->order_by('kode', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data['kode'] = 'Pilih kode Tindak Lanjut';
        $data[$row['kode']] = $row['kode'].' - '.$row['keterangan'];
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
