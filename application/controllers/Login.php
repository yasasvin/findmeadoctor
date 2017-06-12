<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		//Load the login page. Header and Footer seperated to load common files on to any view
		$this->load->view('include/header');
		$this->load->view('login_view');
		$this->load->view('include/footer');
	}

	public function submit() { 
		//Function triggered to register user
		$result = $this->login_model->submit();

		if($result)
			redirect('home');
		else
			$this->index();
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You have successfully logged out.');
		redirect('home');
	}

}