<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekomendasi_model extends CI_Model
 {
      public $table = "rekomendasi";
      public $order_column = array("kode_rekomendasi", "rekomendasi", "judul_rekomendasi", "uraian_rekomendasi", null, null);


      function make_query()
      {

           $this->db->select("*");
           $this->db->from('rekomendasi');
           //$this->db->where('no_lhp',$no_lhp);

           if(isset($_POST["search"]["value"]))
           {
                $this->db->like('id_rekomendasi',$_POST["search"]["value"]);
           }
           if(isset($_POST["order"]))
           {
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
           }
           else
           {
                $this->db->order_by('id_rekomendasi', 'DESC');
           }
      }

      function total_rows() {
        return $this->db->get($this->table)->num_rows();
      }

      function get_data_temuan($id_temuan){
           $this->db->select("*");
           $this->db->from('rekomendasi');
           $this->db->where('id_temuan',$id_temuan);

           $query = $this->db->get();
           return $query->result();
      }

      function make_datatables($id_temuan){
           $this->db->select("*");
           $this->db->from('rekomendasi');
           $this->db->where('id_temuan',$id_temuan);

           //$this->make_query();
           if($_POST["length"] != -1)
           {
                $this->db->limit($_POST['length'], $_POST['start']);
           }
           $query = $this->db->get();
           return $query->result();
      }

      function get_filtered_data($id_temuan){
            $this->db->select("*");
            $this->db->from('rekomendasi');
            $this->db->where('id_temuan',$id_temuan);
           //$this->make_query();
           $query = $this->db->get();
           return $query->num_rows();
      }
      function get_all_data($id_temuan)
      {
           $this->db->select("*");
           $this->db->from($this->table);
           $this->db->where('id_temuan',$id_temuan);
           return $this->db->count_all_results();
      }
      function get_by_id($id_rekomendasi)
      {
        $this->db->where('id_rekomendasi', $id_rekomendasi);
        return $this->db->get($this->table)->row();
      }
      function insert_crud($data)
      {
           $this->db->insert('rekomendasi', $data);
      }
      function fetch_single_user($id_rekomendasi)
      {
           $this->db->where("id_rekomendasi", $id_rekomendasi);
           $query=$this->db->get('rekomendasi');
           return $query->result();
      }
      function update_crud($id_rekomendasi, $data)
      {
           $this->db->where("id_rekomendasi", $id_rekomendasi);
           $this->db->update("rekomendasi", $data);
      }
      function delete_single_user($id_rekomendasi)
      {
           $this->db->where("id_rekomendasi", $id_rekomendasi);
           $this->db->delete("rekomendasi");
      }
 }
