<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	public function login(){
		$data['title'] = 'IRESTECH';
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if ($this->form_validation->run() === false) {
			$this->load->view('admin/login', $data);
		} else {
			$username =$this->input->post('username');
			$password = md5($this->input->post('password'));

			$user_id = $this->M_users->login($username, $password);

			if ($user_id) {
				$user_data = array (
					'username' => $username,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($user_data);
				$this->session->flashdata('user_loggedin', 'YOU ARE NOW LOGGED IN');

				redirect(base_url('admin'));
				
			}else {
				$this->session->flashdata('login_failed', 'Login is Invalid');
				
				redirect('user/login');
			}
		}
	}
	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		redirect(base_url('user/login'));
	}
}
