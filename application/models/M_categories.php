<?php 

class M_categories extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_categories(){
		$this->db->order_by('category');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	public function get_category($id){
		$query = $this->db->set_where('categories', array('id' => $id));
		return $query->row();
	}

	public function create_category(){
		$data = array(
			'category' => $this->input->post('category')
		);

		return $this->db->insert('categories', $data);
	}

	public function delete_category($id){
		$this->db->where('id', $id);
		$this->db->delete('categories');
		return true;
	}
}
