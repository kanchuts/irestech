<?php

class Tags extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$active = ['categories', 'dashboard', 'posts', 'events', 'comments', 'contact'];
		$this -> session -> unset_userdata($active);

		$this -> session -> set_flashdata('tags', 'active');
		// $this->load->model('m_users');

		if (!$this -> session -> userdata('logged_in')) {
			redirect(base_url("login"));
		}
	}

	public function index(){
		$data['title'] = 'IRESTECH';
		$data['tags'] = $this->M_tags->get_tags();

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/tag/index', $data);
		$this->load->view('components/footer');
	}

	public function create(){
		$data['title'] = 'IRESTECH';

		$this->form_validation->set_rules('tag', 'tag', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('components/header', $data);
			$this->load->view('components/sidenav');
			$this->load->view('admin/tag/add', $data);
			$this->load->view('components/footer');
		} else {
			$this->M_tags->create_tag();

			redirect('tags');
		}
	}

	public function delete($id){
		$this->M_tags->delete_tag($id);
		redirect('tags');
	}
}
