<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		// $this->load->model('m_users');
		if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}

		$active = ['categories', 'tags', 'posts', 'events', 'comments', 'contact'];
		$this->session->unset_userdata($active);

		$this->session->set_flashdata('dashboard', 'active');
	}

	public function index(){
		$data['title'] = "IRESTECH";
		// $data['user'] = $this->m_users->tampil_user()->result();
		$username = $this->session->userdata('username');
		$data['user'] = $this->M_users->get_user($username);

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('components/footer');
	}
}
