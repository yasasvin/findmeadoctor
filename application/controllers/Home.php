<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		//Load the initial landing page. Header and Footer seperated to load common files on to any view
		$this->load->view('include/header');
		$this->load->view('home_view');
		$this->load->view('include/footer');
	}

}