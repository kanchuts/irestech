<?php 
class Comments extends CI_Controller{
	function __construct(){
		parent::__construct();

		$active = ['dashboard', 'tags', 'posts', 'events', 'categories', 'contact'];
		$this->session->unset_userdata($active);

		$this->session->set_flashdata('comments', 'active');	
		// $this->load->model('m_users');

		if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}
	}

	public function index(){
		$data['title'] = 'IRESTECH';

		$data['comments'] = $this->M_comments->get_comments();

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/comments/index', $data);
		$this->load->view('components/footer');
	}

	public function delete($id){
		$this->M_comments->delete_comment($id);
		redirect('comments');
	}
}
