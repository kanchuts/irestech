<?php 
class contact extends CI_Controller{
	function __construct(){
		parent::__construct();

		$active = ['dashboard', 'tags', 'posts', 'events', 'categories', 'comments'];
		$this->session->unset_userdata($active);

		$this->session->set_flashdata('contact', 'active');	
		// $this->load->model('m_users');

		if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}
	}

	public function index(){
		$data['title'] = 'IRESTECH';

		$data['contact'] = $this->M_contact->get_contact();

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/contact/index', $data);
		$this->load->view('components/footer');
	}

	public function delete($id){
		$this->M_contact->delete_contact($id);
		redirect('contacts');
	}
}
