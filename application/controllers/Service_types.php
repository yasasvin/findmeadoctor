<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_types extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('service_types_model');
	}

	public function index()
	{
		//Load the symptoms page. Header and Footer seperated to load common files on to any view
		$data['form_data'] = $this->service_types_model->get_form_data();
		$this->load->view('include/header');
		$this->load->view('service_types_view', $data);
		$this->load->view('include/footer');
	}

	public function submit() { 
		//Function triggered to register user
		$result = $this->service_types_model->submit();
		$this->index();
	}

}