<?php 
class M_events extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}	

	public function get_events($limit = null){
		$this->db->select('*, events.id as event_id');
		$this->db->from('events');
		$this->db->join('users', 'events.user_id = users.id');
		$this->db->order_by('title');

		if ($limit != '') {
			$this->db->limit($limit);
		}
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_event($id){
		$this->db->select('*, events.id as event_id');
		$this->db->from('events');
		$this->db->join('users', 'events.user_id = users.id');
		$this->db->order_by('title');
		$query = $this->db->where(array('events.id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	public function create_event($poster){
		$data = array(
			'title' => $this->input->post('title'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'location' => $this->input->post('location'),
			'description' => $this->input->post('description'),
			'poster' => $poster,
			'user_id' => $this->input->post('user_id')
		);
		return $this->db->insert('events', $data);
	}

	public function delete_event($id){
		$image_file_name = $this->db->select('poster')->get_where('events', array('id' => $id))->row()->poster;
		$cwd = getcwd();
		chdir("assets/poster");
		unlink($image_file_name);
		chdir($cwd);
		$this->db->where('id', $id);
		$this->db->delete('events');
		return true;
	}
	
	public function update_event(){
		$data = array(
			'title' => $this->input->post('title'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			
			'location' => $this->input->post('location'),
			'description' => $this->input->post('description')
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('events', $data);
	}
}
