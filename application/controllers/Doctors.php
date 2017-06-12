<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('doctors_model');
	}

	public function index()
	{
		//Load the doctor page. Header and Footer seperated to load common files on to any view
		$data['form_data'] = $this->doctors_model->get_form_data();
		$this->load->view('include/header');
		$this->load->view('doctors_view', $data);
		$this->load->view('include/footer');
	}

	public function submit() { 
		//Function triggered to register doctor
		$result = $this->doctors_model->submit();
		$this->index();
	}

}