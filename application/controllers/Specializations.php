<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specializations extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('specializations_model');
	}

	public function index()
	{
		//Load the symptoms page. Header and Footer seperated to load common files on to any view
		$data['form_data'] = $this->specializations_model->get_form_data();
		$this->load->view('include/header');
		$this->load->view('specializations_view', $data);
		$this->load->view('include/footer');
	}

	public function submit() { 
		//Function triggered to register user
		$result = $this->specializations_model->submit();
		$this->index();
	}

}