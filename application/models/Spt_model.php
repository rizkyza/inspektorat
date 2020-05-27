<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spt_model extends CI_Model
{
  public $table = 'spt';
  public $id    = 'id_spt';
  public $no_spt = 'no_spt';
  public $nama_irban = 'nama_irban';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function total_rows_spt_created() {
    //$this->db->where('status','belum ada');
    if ($this->session->userdata('usertype') <> 'superadmin'){
      $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
      $this->db->where('ketua_tim',$this->session->userdata('username'));
      return $this->db->get($this->table)->num_rows();
    } else {
      return $this->db->get($this->table)->num_rows();
    }
  }

  function total_by_irban_ketuatim()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->where('ketua_tim',$this->session->userdata('username'));
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->num_rows();
  } else {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->num_rows();
  }
  }

  function total_tim_by_irban()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->num_rows();
  } else {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->num_rows();
  }
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

  function get_all_by_irban_ketuatim()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->where('ketua_tim',$this->session->userdata('username'));
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  } else {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  }

  function get_all_by_irban_sudahada()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->where('status','sudah ada');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  } else {
    $this->db->where('status','sudah ada');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  }

  function get_all_by_irban_belumada()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where($this->nama_irban,$this->session->userdata('usertype'));
    $this->db->where('status','belum ada');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  } else {
    $this->db->where('status','belum ada');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
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

  function get_by_nospt_nip_ketuatim($nospt)
  {
    if($this->session->userdata('usertype') == 'superadmin'){
      return $this->db->get($this->table)->row();
    } else {
      $this->db->where('no_spt', $nospt);
      $this->db->like('ketua_tim', $this->session->userdata('username'));
      return $this->db->get($this->table)->row();
    }
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('no_spt', $id);
    return $this->db->get($this->table)->row();
  }

  function get_irban_by_nospt($nospt)
  {
    $this->db->where('no_spt', $nospt);
    return $this->db->get($this->table)->row('nama_irban');
  }


  function get_by_idspt($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_no_spt($nospt)
  {
    $this->db->where($this->no_spt, $nospt);
    return $this->db->get($this->table)->row();
  }

  function get_by_no_spt_dalnis($nospt)
  {
    $this->db->where($this->no_spt, $nospt);
    return $this->db->get($this->table)->row('dalnis');
  }

  function get_by_no_spt_ketuatim($nospt)
  {
    $this->db->where($this->no_spt, $nospt);
    return $this->db->get($this->table)->row('ketua_tim');
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

  function update_by_nospt($no_spt, $data)
  {
    $this->db->where('no_spt',$no_spt);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

}
