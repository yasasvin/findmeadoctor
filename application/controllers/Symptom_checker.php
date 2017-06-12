<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Symptom_checker extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('symptom_checker_model');
	}

	public function index()
	{
		//Load the doctor page. Header and Footer seperated to load common files on to any view
		$data['form_data'] = $this->symptom_checker_model->get_form_data();
		$this->load->view('include/header');
		$this->load->view('symptom_checker_view', $data);
		$this->load->view('include/footer');
	}

}