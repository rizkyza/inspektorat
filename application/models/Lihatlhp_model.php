<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihatlhp_model extends CI_Model
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

  function get_lhp_by_tahun($tahun)
  {
    $this->db->where('tahun', $tahun);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  public function get_lhp_by_tahun_and_irban($id,$id2)
  {
    $this->db->where('tahun', $id);
    $this->db->where('nama_irban_seo', $id2);
    return $this->db->get($this->table)->result();
  }

  public function get_lhp_by_tahun_and_skpd($id,$id2)
  {
    $this->db->where('tahun', $id);
    $this->db->where('skpd_seo', $id2);
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
    $this->db->where($this->id, $id);
    $this->db->like('file_pkp', 'nofile');
    $this->db->or_like('file_ba', 'nofile');
    $this->db->or_like('file_kkp', 'nofile');
    $this->db->or_like('file_bheb', 'nofile');
    $this->db->or_like('file_ne', 'nofile');
    $this->db->or_like('file_kl', 'nofile');
    $this->db->or_like('file_ndli', 'nofile');
    $this->db->or_like('file_ndlg', 'nofile');
    return $this->db->get($this->table)->row();

  }


  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('no_spt', $id);
    return $this->db->get($this->table)->row();
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


}
