<?php
class M_contact extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function send_contact(){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message')
		);

		return $this->db->insert('contact', $data);
	}

	public function get_contact(){
		$this->db->select('*');
		$this->db->from('contact');
		$this->db->order_by('id');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_contact($id){
		$this->db->where('id', $id);
		$this->db->delete('contact');
		return true;
	}
	
}
