<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temuan_model extends CI_Model
 {
      public $table = "temuan";
      public $order_column = array("no_temuan", "kode_temuan", "judul_temuan", "nilai_temuan", null, null);


      function total_rows() {
        return $this->db->get($this->table)->num_rows();
      }

      function make_query()
      {

           $this->db->select("*");
           $this->db->from('temuan');
           //$this->db->where('no_lhp',$no_lhp);

           if(isset($_POST["search"]["value"]))
           {
                $this->db->like('no_lhp',$_POST["search"]["value"]);
           }
           if(isset($_POST["order"]))
           {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
           }
           else
           {
                $this->db->order_by('no_temuan', 'DESC');
           }
      }
      function make_datatables($no_lhp){
           $this->db->select("*");
           $this->db->from('temuan');
           $this->db->where('no_lhp',$no_lhp);

           //$this->make_query();
           if($_POST["length"] != -1)
           {
                $this->db->limit($_POST['length'], $_POST['start']);
           }
           $query = $this->db->get();
           return $query->result();
      }

      function get_data_temuan($no_lhp){
           $this->db->select("*");
           $this->db->from('temuan');
           $this->db->where('no_lhp',$no_lhp);

           $query = $this->db->get();
           return $query->result();
      }

      function get_data_temuan_by_user($id_temuan){
        if($this->session->userdata('usertype') <> 'superadmin'){

           $this->db->select("*");
           $this->db->from('temuan');
           $this->db->where('id_temuan',$id_temuan);
           $this->db->like('uploader',$this->session->userdata('identity'));

           $query = $this->db->get();
           return $query->result();

         } else {

           $this->db->select("*");
           $this->db->from('temuan');

           $query = $this->db->get();
           return $query->result();
         }
      }

      function get_filtered_data($no_lhp){
            $this->db->select("*");
            $this->db->from('temuan');
            $this->db->where('no_lhp',$no_lhp);
           //$this->make_query();
           $query = $this->db->get();
           return $query->num_rows();
      }
      function get_all_data($no_lhp)
      {
           $this->db->select("*");
           $this->db->from($this->table);
           $this->db->where('no_lhp',$no_lhp);
           return $this->db->count_all_results();
      }
      function get_by_id($id_temuan)
      {
        $this->db->where('id_temuan', $id_temuan);
        return $this->db->get($this->table)->row();
      }
      function get_by_id_kkp($id_kkp)
      {
        $this->db->where('id_kkp', $id_kkp);
        return $this->db->get($this->table)->row('status_kkp');
      }
      function get_by_id_temuan($id)
      {
        $this->db->where('id_temuan', $id);
        return $this->db->get($this->table)->row();
      }
      function insert_crud($data)
      {
           $this->db->insert('temuan', $data);
      }
      function fetch_single_user($id_temuan)
      {
           $this->db->where("id_temuan", $id_temuan);
           $query=$this->db->get('temuan');
           return $query->result();
      }
      function update_crud($user_id, $data)
      {
           $this->db->where("id_temuan", $user_id);
           $this->db->update("temuan", $data);
      }
      function delete_single_user($id_temuan)
      {
           $this->db->where("id_temuan", $id_temuan);
           $this->db->delete("temuan");
      }
 }
