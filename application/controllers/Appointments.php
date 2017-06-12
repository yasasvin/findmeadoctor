<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('appointments_model');
	}

	public function index()
	{
		//Load the doctor page. Header and Footer seperated to load common files on to any view
		$data['form_data'] = $this->appointments_model->get_form_data();
		$this->load->view('include/header');
		$this->load->view('appointments_view', $data);
		$this->load->view('include/footer');
	}

	public function make_appointment() {
		$data['form_data'] = $this->appointments_model->get_make_appointment_data();
		$this->load->view('include/header');
		$this->load->view('appointments_view', $data);
		$this->load->view('include/footer');
	}

	public function submit() {
		$id = $this->appointments_model->submit();
		redirect('appointments/index/' . $id);
	}

	public function my_appointments() {
		$data['form_data'] = $this->appointments_model->my_appointments();
		$this->load->view('include/header');
		$this->load->view('appointment_list_view', $data);
		$this->load->view('include/footer');

	}

}