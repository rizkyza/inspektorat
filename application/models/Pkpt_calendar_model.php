<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkpt_calendar_model extends CI_Model
{
	public $table = 'pkpt';

	function get_all_data()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
	    $this->db->where('irbanwil',$this->session->userdata('usertype'));
			$this->db->order_by('date_start', 'ASC');
    	return $this->db->get('pkpt')->result();
  	} else {
			$this->db->order_by('date_start', 'ASC');
	    return $this->db->get('pkpt')->result();
  	}
  }

	function get_all_data_by_tahun($tahun)
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
	    $this->db->where('irbanwil',$this->session->userdata('usertype'));
			$this->db->like('bulan',$tahun);
			$this->db->order_by('date_start', 'ASC');
    	return $this->db->get('pkpt')->result();
  	} else {
			$this->db->like('bulan',$tahun);
			$this->db->order_by('date_start', 'ASC');
	    return $this->db->get('pkpt')->result();
  	}
  }

	function get_all_by_irban_sedia()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
	    $this->db->where('irbanwil',$this->session->userdata('usertype'));
			$this->db->where('status','sedia');
			$this->db->where('bulan', date("m-Y"));
			$this->db->order_by('date_start', 'ASC');
    	return $this->db->get('pkpt')->result();
  	} else {
			$this->db->where('status','sedia');
			$this->db->order_by('date_start', 'ASC');
	    return $this->db->get('pkpt')->result();
  	}
  }

	function get_all_by_irban_created()
  {
    if($this->session->userdata('usertype') <> 'superadmin'){
	    $this->db->where('irbanwil',$this->session->userdata('usertype'));
			$this->db->where('status','created');
			//$this->db->where('bulan', date("m-Y"));
			//$this->db->where('date_end >=', date("Y-m-d"));
			$this->db->order_by('date_start', 'ASC');
    	return $this->db->get('pkpt')->result();
  	} else {
			$this->db->where('status','created');
			$this->db->order_by('date_start', 'ASC');
	    return $this->db->get('pkpt')->result();
  	}
  }

	function total_rows_sedia() {
		if($this->session->userdata('usertype') <> 'superadmin'){
	    $this->db->where('irbanwil',$this->session->userdata('usertype'));
			$this->db->where('status','sedia');
			$this->db->where('bulan', date("m-Y"));
			//$this->db->where('date_end >=', date("Y-m-d"));
    	return $this->db->get('pkpt')->num_rows();
  	} else {
			$this->db->where('status','sedia');
	    return $this->db->get('pkpt')->num_rows();
  	}

	}

	public function get_pkpt(){
		$this->db->select('id_pkpt id, skpd title, date_start start, date_end end, color, irbanwil');
		$this->db->from('pkpt');
		$this->db->order_by('date_start', 'DESC');

		return $this->db->get()->result();
	}

	public function get_pkpt_by_id($id){
		$this->db->where('id_pkpt', $id);
		$this->db->order_by('date_start', 'ASC');

		return $this->db->get('pkpt')->row();
	}

	function insert_pkpt($param) {
		$this->db->insert('pkpt', $param);
	}

	public function update_pkpt($param){
		$data = array(
			'date_start' => $param['date_start'],
			'date_end' => $param['date_end']
			);

		$this->db->where('id_pkpt',$param['id_pkpt']);
		$this->db->update('pkpt',$data);

		if ($this->db->affected_rows() == 1) {
			return 1;
		}else{
			return 0;
		}
	}

	public function delete_pkpt($id_pkpt){
		$this->db->where('id_pkpt', $id_pkpt);
		return $this->db->delete('pkpt');
	}

	public function update_pkpt_2($param){
		$data = array(
			'nombre' => $param['nome'],
			'url' => $param['web']
			);

		$this->db->where('id_pkpt',$param['id']);
		$this->db->update('eventos',$campos);

		if ($this->db->affected_rows() == 1) {
			return 1;
		}else{
			return 0;
		}
	}

	function update($id_pkpt, $data)
  {
    $this->db->where('id_pkpt',$id_pkpt);
    $this->db->update($this->table, $data);
  }
}
