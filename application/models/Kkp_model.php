<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kkp_model extends CI_Model
{
  public $table = 'kkp';
  public $id    = 'id_kkp';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function make_datatables_kkp_temuan($no_spt){
       $this->db->select("*");
       $this->db->from('kkp');
       $this->db->where('no_spt',$no_spt);
       $this->db->where('nip',$this->session->userdata('nip'));

       //$this->make_query();
       if($_POST["length"] != -1)
       {
            $this->db->limit($_POST['length'], $_POST['start']);
       }
       $query = $this->db->get();
       return $query->result();
  }

  function get_filtered_data_kkp_temuan($no_spt){
        $this->db->select("*");
        $this->db->from('kkp');
        $this->db->where('no_spt',$no_spt);
       //$this->make_query();
       $query = $this->db->get();
       return $query->num_rows();
  }

  function get_all_data_kkp_temuan($no_spt)
  {
       $this->db->select("*");
       $this->db->from('kkp');
       $this->db->where('no_spt',$no_spt);
       return $this->db->count_all_results();
  }

  function make_datatables($id_pkp){
       $this->db->select("*");
       $this->db->from('kkp');
       $this->db->where('id_pkp',$id_pkp);

       //$this->make_query();
       if($_POST["length"] != -1)
       {
            $this->db->limit($_POST['length'], $_POST['start']);
       }
       $query = $this->db->get();
       return $query->result();
  }

  function make_datatables_reviu_kkp($id_kkp){
       $this->db->select("*");
       $this->db->from('reviu_kkp');
       $this->db->where('id_kkp',$id_kkp);

       //$this->make_query();
       if($_POST["length"] != -1)
       {
            $this->db->limit($_POST['length'], $_POST['start']);
       }
       $query = $this->db->get();
       return $query->result();
  }

  function make_datatables_reviu_kkp_laporan($id_kkp){
       $this->db->select("*");
       $this->db->from('reviu_kkp');
       $this->db->where('id_kkp',$id_kkp);

       $query = $this->db->get();
       return $query->result();
  }

  function get_filtered_data_reviu($id_kkp){
        $this->db->select("*");
        $this->db->from('reviu_kkp');
        $this->db->where('id_kkp',$id_kkp);
       //$this->make_query();
       $query = $this->db->get();
       return $query->num_rows();
  }

  function get_all_data_reviu($id_kkp)
  {
       $this->db->select("*");
       $this->db->from('reviu_kkp');
       $this->db->where('id_kkp',$id_kkp);
       return $this->db->count_all_results();
  }

  function get_filtered_data($id_pkp){
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('id_pkp',$id_pkp);
       //$this->make_query();
       $query = $this->db->get();
       return $query->num_rows();
  }

  function get_all_data($id_pkp)
  {
       $this->db->select("*");
       $this->db->from($this->table);
       $this->db->where('id_pkp',$id_pkp);
       return $this->db->count_all_results();
  }

  function insert_crud($data)
  {
       $this->db->insert('kkp', $data);
  }

  function insert_crud_reviu($data)
  {
       $this->db->insert('reviu_kkp', $data);
  }

  function update_crud($id_pkp, $data)
  {
       $this->db->where("id_kkp", $id_pkp);
       $this->db->update("kkp", $data);
  }

  function update_crud_status($id_kkp, $data)
  {
       $this->db->where("id_kkp", $id_kkp);
       $this->db->update("kkp", $data);
  }

  function update_crud_reviu($id_reviu, $data)
  {
       $this->db->where("id_reviu", $id_reviu);
       $this->db->update("reviu_kkp", $data);
  }

  function fetch_single_user($id_kkp)
  {
       $this->db->where("id_kkp", $id_kkp);
       $query=$this->db->get('kkp');
       return $query->result();
  }

  function get_by_id($id_kkp)
  {
    $this->db->where('id_kkp', $id_kkp);
    return $this->db->get('kkp')->row();
  }

  function get_data_kkp($id_pkp)
  {
    $this->db->where('id_pkp', $id_pkp);
    return $this->db->get('kkp')->result();
  }

  function fetch_single_user_kkp($id_kkp)
  {
       $this->db->where("id_kkp", $id_kkp);
       $query=$this->db->get('kkp');
       return $query->result();
  }

  function delete_single_user($id_pkp)
  {
       $this->db->where("id_kkp", $id_pkp);
       $this->db->delete("kkp");
  }

}
