<?php 

class M_users extends CI_Model{
	public function login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this ->db->get('users');
		if($result->num_rows()==1){
			return $result->row(0)->id;
		}else{
			return false;
		}
	}

	public function get_user($username){
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->result();
	}
}
