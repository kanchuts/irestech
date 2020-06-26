<?php
class M_posts extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_posts($lim = FALSE, $offset = FALSE){
		$this->db->select('*, posts.id as post_id');
		$this->db->from('posts');
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('tags', 'posts.tag_id = tags.id');
		$this->db->join('users', 'posts.user_id = users.id');

		if ($lim) {
			$this->db->limit($lim, $offset);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_post($id){
		$this->db->select('*, posts.id as post_id');
		$this->db->from('posts');
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('tags', 'posts.tag_id = tags.id');
		$this->db->join('users', 'posts.user_id = users.id');
		$this->db->where(array('posts.id' => $id));
		$query = $this->db->get();
		return $query->result();
	}

	public function create_post($post_image){ 
		$data = array(
			'title' => $this->input->post('title'),
			'article' => $this->input->post('article'),
			'image' => $post_image,
			'enabled' => $this->input->post('enabled'),
			'category_id' => $this->input->post('category_id'),
			'tag_id' => $this->input->post('tag_id'),
			'user_id' => $this->input->post('user_id')
		);

		return $this->db->insert('posts', $data);
	}

	public function delete_post($id){
		$image_file_name = $this->db->select('image')->get_where('posts', array('id' => $id))->row()->image;
		$cwd = getcwd();
		chdir("assets/banner");
		unlink($image_file_name);
		chdir($cwd);
		$this->db->where('id', $id);
		$this->db->delete('posts');
		return true;
	}

	public function update_post(){
		$data = array(
			'title' => $this->input->post('title'),
			'article' => $this->input->post('article'),
			'enabled' => $this->input->post('enabled'),
			'category_id' => $this->input->post('category_id'),
			'tag_id' => $this->input->post('tag_id')
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('posts', $data);
	}
}
