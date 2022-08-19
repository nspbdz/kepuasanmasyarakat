<?php

class Auth extends CI_Controller
{
	public function index()
	{
        // load view admin/overview.php
		$this->load->model('auth_model');
		$data = $this->auth_model->current_user();
		$array = (array) $data;
		if(!empty($array) ){
        $this->load->view("admin/overview");
		}else{
			redirect('/auth/login');
		}
	}
	

	public function login()
	{
		// print_r( $this->input->post('username'));
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('login_form');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// current_user
		if($this->auth_model->login($username, $password)){
			$data = $this->auth_model->current_user();
			if($data->role == 1){
			redirect('/admin');

			}else{
			redirect('/');

			}
			
		}
		 else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('login_form');
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}
}
