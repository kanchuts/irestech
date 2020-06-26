<?php
class Posts extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$active = ['categories', 'dashboard', 'tags', 'events','comments', 'contact'];
		$this -> session -> unset_userdata($active);

		$this -> session -> set_flashdata('posts', 'active');
		// $this->load->model('m_users');

		if (!$this -> session -> userdata('logged_in')) {
			redirect(base_url("login"));
		}
	}

	public function index(){
		
		$data['title'] = 'IRESTECH';
		$data['posts'] = $this->M_posts->get_posts();

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/post/index', $data);
		$this->load->view('components/footer');
	}

	public function create(){
		$username = $this->session->userdata('username');
		$data['title'] = 'IRESTECH';
		$data['categories'] = $this->M_categories->get_categories();
		$data['tags'] = $this->M_tags->get_tags();
		$data['user'] = $this->M_users->get_user($username);
		
		$this->form_validation->set_rules('title', 'title', 'required');
		// $this->form_validation->set_rules('image', 'image', 'required');
		$this->form_validation->set_rules('article', 'article', 'required');
		$this->form_validation->set_rules('category_id', 'category_id', 'required');
		$this->form_validation->set_rules('tag_id', 'tag_id', 'required');
		// $this->form_validation->set_rules('user_id', 'user_id', 'required');
		
		


		if($this->form_validation->run() === FALSE) {
			$this->load->view('components/header', $data);
			$this->load->view('components/sidenav');
			$this->load->view('admin/post/add', $data);
			$this->load->view('components/footer');
		} else {
			$config['upload_path'] = './assets/banner/';
			$config['overwrite'] = true;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('userFile')) {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userFile']['name'];
			} else {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
				print_r($errors);
			}

			$this->M_posts->create_post($post_image);
			
			redirect('posts');
		}
	}
	public function delete($id){
		$this->M_posts->delete_post($id);
		redirect('posts');
	}

	public function update($id){
		$data['post'] = $this->M_posts->get_post($id);
		$username = $this->session->userdata('username');
		$data['title'] = 'IRESTECH';
		$data['categories'] = $this->M_categories->get_categories();
		$data['tags'] = $this->M_tags->get_tags();
		$data['user'] = $this->M_users->get_user($username);

		if(empty($data['post'])){
			show_404();
		}
		
		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/post/edit', $data);
		$this->load->view('components/footer');
	}

	public function edit(){
		$this->M_posts->update_post();
		
		redirect('posts');
	}
}
