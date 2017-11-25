<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entry_tim_model extends CI_Model
 {
      public $table = "tim_auditor_spt";
      public $select_column = array("id", "nip", "nama", "jabatan", "foto");
      public $order_column = array(null, "nip", "nama", "jabatan", null, null);


      function make_query()
      {

           $this->db->select($this->select_column);
           $this->db->from($this->table);

           if(isset($_POST["search"]["value"]))
           {
                $this->db->where('nama_irban',$this->session->userdata('usertype'));
                //$this->db-> where('no_spt',$no_spt);
                $this->db->like("nip", $_POST["search"]["value"]);
                $this->db->or_like("nama", $_POST["search"]["value"]);
                $this->db->or_like("no_spt", $_POST["search"]["value"]);
           }
           if(isset($_POST["order"]))
           {
                $this->db->where('nama_irban',$this->session->userdata('usertype'));
                //$this->db-> where('no_spt',$no_spt);
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
           }
           else
           {
                $this->db->where('nama_irban',$this->session->userdata('usertype'));
                //$this->db-> where('no_spt',$no_spt);
                $this->db->order_by('jabatan', 'DESC');
           }
      }
      function make_datatables(){
           $this->make_query();
           if($_POST["length"] != -1)
           {
                $this->db->limit($_POST['length'], $_POST['start']);
           }
           $query = $this->db->get();
           return $query->result();
      }
      function get_filtered_data(){
           $this->make_query();
           $query = $this->db->get();
           return $query->num_rows();
      }
      function get_all_data()
      {
           $this->db->select("*");
           $this->db->from($this->table);
           $this->db->where('nama_irban',$this->session->userdata('usertype'));
           return $this->db->count_all_results();
      }
      function insert_crud($data)
      {
           $this->db->insert('tim_auditor_spt', $data);
      }
      function fetch_single_user($user_id)
      {
           $this->db->where("id", $user_id);
           $query=$this->db->get('tim_auditor_spt');
           return $query->result();
      }
      function update_crud($user_id, $data)
      {
           $this->db->where("id", $user_id);
           $this->db->update("tim_auditor_spt", $data);
      }
      function delete_single_user($user_id)
      {
           $this->db->where("id", $user_id);
           $this->db->delete("tim_auditor_spt");
      }
 }
