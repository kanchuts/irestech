<?php

class Categories extends CI_Controller{
	function __construct(){
		parent::__construct();

		$active = ['dashboard', 'tags', 'posts', 'events', 'comments', 'contact'];
		$this->session->unset_userdata($active);

		$this->session->set_flashdata('categories', 'active');	
		// $this->load->model('m_users');

		if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}
		
	}
		
	public function index(){
		$data['title'] = 'IRESTECH';
		
		$data['categories'] = $this->M_categories->get_categories();

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/category/index', $data);
		$this->load->view('components/footer');
	}

	public function create(){
		$data['title'] = 'IRESTECH';

		$this->form_validation->set_rules('category', 'category', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('components/header', $data);
			$this->load->view('components/sidenav');
			$this->load->view('admin/category/add', $data);
			$this->load->view('components/footer');
		} else {
			$this->M_categories->create_category();

			redirect('categories');
		}
	}

	public function delete($id){
		$this->M_categories->delete_category($id);
		redirect('categories');
	}
}
