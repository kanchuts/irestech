<?php 
class M_comments extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_comments(){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->order_by('created_at');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_comment($id){
		$this->db->select('*');
		$this->db->where('id_post', $id);
		$this->db->from('comments');
		$this->db->order_by('created_at');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function create_comment(){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'comment' => $this->input->post('comment'),
			'id_post' => $this->input->post('id_post')
		);

		return $this->db->insert('comments', $data);
	}

	public function delete_comment($id){
		$this->db->where('id', $id);
		$this->db->delete('comments');
		return true;
	}
}
