<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_doctors extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('find_doctors_model');
	}

	public function index()
	{
		//Load the doctor page. Header and Footer seperated to load common files on to any view
		$data['form_data'] = $this->find_doctors_model->get_form_data();
		$this->load->view('include/header');
		$this->load->view('find_doctors_view', $data);
		$this->load->view('include/footer');
	}

	public function submit() {
		$this->index();
	}

}