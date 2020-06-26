<?php

class M_tags extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_tags(){
		$this->db->order_by('tag');
		$query = $this->db->get('tags');
		return $query->result_array();
	}

	public function get_tag($id){
		$query = $this->db->set_where('tags', array('id' => $id));
		return $query->row();
	}

	public function create_tag(){
		$data = array(
			'tag' => $this->input->post('tag')
		);
		return $this->db->insert('tags', $data);
	}

	public function delete_tag($id){
		$this->db->where('id', $id);
		$this->db->delete('tags');
		return true;
	}
}
