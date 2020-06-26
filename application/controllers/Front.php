<?php

class Front extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index(){		
		$limit = 4;
		$lim = 2;
		$data['title'] = 'IRESTECH';
		$data['events'] = $this->M_events->get_events($limit);
		$data['posts'] = $this->M_posts->get_posts($lim);
		$this->load->view('front/index', $data);
	}

	public function upcoming(){
		$data['title'] = 'IRESTECH';
		$data['events'] = $this->M_events->get_events();

		$this->load->view('front/event', $data);
	}

	public function upcome($id){
		$data['title'] = 'IRESTECH';
		$data['single'] = $this->M_events->get_event($id);

		$this->load->view('front/event-single', $data);
	}

	public function blog($offset = 0){
		$config['base_url'] = base_url().'post/index/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');
		
		$this->pagination->initialize($config);

		$data['links'] = $this->pagination->create_links();

		$data['title'] = 'IRESTECH';
		$data['posts'] = $this->M_posts->get_posts(FALSE, $config['per_page'], $offset);
		$this->load->view('front/blog', $data);
	}

	public function single($id){
		$limit = 4;
		$data['title'] = 'IRESTECH';
		$data['single'] = $this->M_posts->get_post($id);
		$data['posts'] = $this->M_posts->get_posts($limit);
		$data['comment'] = $this->M_comments->get_comment($id);

		if(empty($data['single'])){
			show_404();
		}

		$this->load->view('front/blog-single', $data);
	}

	public function addComment(){
			$this->M_comments->create_comment();
			redirect($this);
	}

	public function contact(){
		$data['title'] = 'IRESTECH';

		$this->load->view('front/contact', $data);
	}

	public function sendContact(){
		$this->M_contact->send_contact();
		redirect('front/contact');
	}
}
