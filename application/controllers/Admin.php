<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		//Load the admin page. Header and Footer seperated to load common files on to any view
		$this->load->view('include/header');
		$this->load->view('admin_view');
		$this->load->view('include/footer');
	}

}