<?php
class Events extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$active = ['categories', 'dashboard', 'tags', 'posts', 'comments', 'contact'];
		$this -> session -> unset_userdata($active);

		$this -> session -> set_flashdata('events', 'active');
		// $this->load->model('m_users');

		if (!$this -> session -> userdata('logged_in')) {
			redirect(base_url("login"));
		}
	}
	
	public function index(){
		
		$data['title'] = 'IRESTECH';
		$data['events'] = $this->M_events->get_events();
		

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/events/index', $data);
		$this->load->view('components/footer');
	}

	public function create(){
		$data['title'] = 'IRESTECH';
		$username = $this->session->userdata('username');
		$data['user'] = $this->M_users->get_user($username);

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		// $this->form_validation->set_rules('poster', 'poster', 'required');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('components/header', $data);
			$this->load->view('components/sidenav');
			$this->load->view('admin/events/add', $data);
			$this->load->view('components/footer');
		} else {
			$config['upload_path'] = './assets/poster/';
			$config['overwrite'] = true;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '1587';
			$config['max_height'] = '2245';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('poster')) {
				$data = array('upload_data' => $this->upload->data());
				$poster = $_FILES['poster']['name'];
			} else {
				$errors = array('error' => $this->upload->display_errors());
				$poster = 'noimage.jpg';
				print_r($errors);
			}

			$this->M_events->create_event($poster);

			redirect('events');
		}
	}

	public function delete($id){
		$this->M_events->delete_event($id);
		redirect('events');
	}

	public function update($id){
		$data['event'] = $this->M_events->get_event($id);
		$username = $this->session->userdata('username');
		$data['title'] = 'IRESTECH';
		$data['user'] = $this->M_users->get_user($username);

		if(empty($data['event'])){
			show_404();
		}

		$this->load->view('components/header', $data);
		$this->load->view('components/sidenav');
		$this->load->view('admin/events/edit', $data);
		$this->load->view('components/footer');
	}

	public function edit(){
		$this->M_events->update_event();
		redirect('events');
	}
}
