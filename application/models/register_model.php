<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function submit() { 
		//Use of Form Validation library to validate data
		$this->form_validation->set_rules('username', 'Username' , 'trim|required');
		$this->form_validation->set_rules('email', 'Email' , 'trim|required');
		$this->form_validation->set_rules('password', 'Password' , 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password' , 'trim|required|matches[password]');
		$this->form_validation->set_rules('first_name', 'First Name' , 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name' , 'trim|required');
		$this->form_validation->set_rules('address_line1', 'Address Line 1' , 'trim|required');
		$this->form_validation->set_rules('city', 'City' , 'trim|required');
		$this->form_validation->set_rules('postal_code', 'Postal Code' , 'trim|required');
		$this->form_validation->set_rules('country', 'Country' , 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender' , 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone' , 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth' , 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		//Check if email or username already exists
		$this->db->select('username');
		$this->db->where('username', $_POST['username']);
		$this->db->or_where('email', $_POST['email']);
		$t = $this->db->get('user')->row_array();

		if(!empty($t)) {
			$this->session->set_flashdata('error', 'Username or Email has already been registered previously.');
			return false;
		}

		//Save user to database
		$this->db->insert('user',
			array(
				'username' => $_POST['username'],
				'password' => md5($_POST['password']),
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'dob' => $_POST['dob'],
				'location' => $_POST['location'],
				'address_line1' => $_POST['address_line1'],
				'address_line2' => $_POST['address_line2'],
				'city' => $_POST['city'],
				'state' => $_POST['state'],
				'postal_code' => $_POST['postal_code'],
				'country' => $_POST['country'],
				'status' => 1,
				'user_level' => 'user',
				'email' =>  $_POST['email'],
				'contactno' =>  $_POST['phone'],
				'gender' =>  $_POST['gender']
			)
		);

		//Provide user feedback
		$this->session->set_flashdata('success', 'You have been successfully registed. Please <a href="'.site_url('login').'">click here</a> to login.');
		return true;
	}

}