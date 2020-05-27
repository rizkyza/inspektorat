<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkp_model extends CI_Model
{
  public $table = 'pkp';
  public $id    = 'id_pkp';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function total_kkp_by_nip()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
    $this->db->where('nip',$this->session->userdata('nip'));
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->num_rows();
  } else {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->num_rows();
  }
  }

  public function get_all_data_by_nip()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
      $this->db->where('nip',$this->session->userdata('nip'));
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    } else {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    }
  }

  public function get_all_data_by_spt_dalnis()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
      $this->db->from('spt');
      $this->db->where('spt.no_spt = pkp.no_spt');
      //$this->db->where('spt.ketua_tim', $this->session->userdata('username'));
      $this->db->where('spt.dalnis', $this->session->userdata('username'));
      return $this->db->get($this->table)->result();
    } else {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    }
  }

  public function total_data_by_spt_dalnis()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
      $this->db->from('spt');
      $this->db->where('spt.no_spt = pkp.no_spt');
      //$this->db->where('spt.ketua_tim', $this->session->userdata('username'));
      $this->db->where('spt.dalnis', $this->session->userdata('username'));
      return $this->db->get($this->table)->num_rows();
    } else {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->num_rows();
    }
  }

  public function get_all_data_by_spt()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
      $this->db->from('spt');
      $this->db->where('spt.no_spt = pkp.no_spt');
      $this->db->where('spt.ketua_tim', $this->session->userdata('username'));
      //$this->db->where('spt.dalnis', $this->session->userdata('username'));
      return $this->db->get($this->table)->result();
    } else {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    }
  }

  public function total_data_by_spt()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
      $this->db->from('spt');
      $this->db->where('spt.no_spt = pkp.no_spt');
      $this->db->where('spt.ketua_tim', $this->session->userdata('username'));
      //$this->db->or_where('spt.dalnis', $this->session->userdata('username'));
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
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    } else {
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

  function get_filtered_data($id_spt){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('id_spt',$id_spt);
       //$this->make_query();
       $query = $this->db->get();
       return $query->num_rows();
  }

  function get_all_data($id_spt)
  {
       $this->db->select("*");
       $this->db->from($this->table);
       $this->db->where('id_spt',$id_spt);
       return $this->db->count_all_results();
  }

  function make_datatables($id_spt){
       $this->db->select("*");
       $this->db->from('pkp');
       $this->db->where('id_spt',$id_spt);

       //$this->make_query();
       if($_POST["length"] != -1)
       {
            $this->db->limit($_POST['length'], $_POST['start']);
       }
       $query = $this->db->get();
       return $query->result();
  }

  function get_filtered_data_by_nospt($no_spt){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('no_spt',$no_spt);
       //$this->make_query();
       $query = $this->db->get();
       return $query->num_rows();
  }

  function get_all_data_by_nospt($no_spt)
  {
       $this->db->select("*");
       $this->db->from($this->table);
       $this->db->where('no_spt',$no_spt);
       return $this->db->count_all_results();
  }

  function make_datatables_by_nospt($no_spt){
       $this->db->select("*");
       $this->db->from('pkp');
       $this->db->where('no_spt',$no_spt);

       //$this->make_query();
       if($_POST["length"] != -1)
       {
            $this->db->limit($_POST['length'], $_POST['start']);
       }
       $query = $this->db->get();
       return $query->result();
  }

  function insert_crud($data)
  {
       $this->db->insert('pkp', $data);
  }

  function update_crud($id_pkp, $data)
  {
       $this->db->where("id_pkp", $id_pkp);
       $this->db->update("pkp", $data);
  }

  function fetch_single_user($id_pkp)
  {
       $this->db->where("id_pkp", $id_pkp);
       $query=$this->db->get('pkp');
       return $query->result();
  }

  function fetch_single_user_by_nospt($no_spt)
  {
       $this->db->where("no_spt", $no_spt);
       $query=$this->db->get('pkp');
       return $query->result();
  }

  function delete_single_user($id_pkp)
  {
       $this->db->where("id_pkp", $id_pkp);
       $this->db->delete("pkp");
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('no_spt', $id);
    return $this->db->get($this->table)->row();
  }

  function get_data_pkp($id_spt)
  {
    $this->db->where('id_spt', $id_spt);
    return $this->db->get($this->table)->result();
  }

  function get_by_idspt($id)
  {
    $this->db->where('id_spt', $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_no_spt($no_spt)
  {
    $this->db->where($this->no_spt, $no_spt);
    return $this->db->get($this->table)->row();
  }

  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }


}
