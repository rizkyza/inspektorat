<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lhp_model extends CI_Model
{
  public $table = 'lhp';
  public $id    = 'id_lhp';
  public $no_spt = 'no_lhp';
  public $nama_irban = 'nama_irban';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_by_irban()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  } else {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  }

  public function get_cekberkaslhp($id)
  {
    $this->db->where('id_lhp', $id);
    $this->db->where('file_pkp', 'nofile');
    $this->db->where('file_ba', 'nofile');
    $this->db->where('file_kkp', 'nofile');
    $this->db->where('file_bheb', 'nofile');
    $this->db->where('file_ne', 'nofile');
    $this->db->where('file_kl', 'nofile');
    $this->db->where('file_ndli', 'nofile');
    $this->db->where('file_ndlg', 'nofile');
    return $this->db->get($this->table)->row();

  }

  function get_combo_skpd()
  {
    $this->db->order_by('no_spt', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['no_spt']] = $row['no_spt'];
      }
      return $data;
    }
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('no_spt', $id);
    return $this->db->get($this->table)->row();
  }

  function get_id_by_nolhp($nolhp)
  {
    $this->db->where('no_lhp', $nolhp);
    return $this->db->get($this->table)->row()->id_lhp;
  }

  function get_nama_irban_by_nolhp($nolhp)
  {
    $this->db->where('no_lhp', $nolhp);
    return $this->db->get($this->table)->row()->nama_irban;
  }

  function get_by_idspt($id)
  {
    $this->db->where('id_spt', $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_idlhp($id)
  {
    $this->db->where('id_lhp', $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_no_spt($no_spt)
  {
    $this->db->where($this->no_spt, $no_spt);
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
