<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('register_model');
	}

	public function index()
	{
		//Load the initial landing page. Header and Footer seperated to load common files on to any view
		$this->load->view('include/header');
		$this->load->view('register_view');
		$this->load->view('include/footer');
	}

	public function submit() { 
		//Function triggered to register user
		$result = $this->register_model->submit();
		$this->index();
	}

}