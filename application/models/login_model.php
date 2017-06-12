<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function submit() { 

		//Validation to check if login data is entered
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		$this->db->select('user.*');
		$this->db->where('username', $_POST['username']);
		$user_data = $this->db->get('user')->row_array();

		if(empty($user_data)) {
			$this->session->set_flashdata('error', 'Username not found. Try Again');
			return false;
		}

		if($user_data['password'] != md5($_POST['password'])) {
			$this->session->set_flashdata('error', 'Passwords does not match. Try Again');
			return false;
		}

		$this->session->set_userdata(
			array(
				'id' => $user_data['user_id'],
				'status' => true,
				'username' => $user_data['username'],
				'first_name' => $user_data['first_name'],
				'last_name' => $user_data['last_name'],
				'gender' => $user_data['gender'],
				'email' => $user_data['email'],
				'dob' => $user_data['dob'],
				'location' => $user_data['location'],
				'user_level' => $user_data['user_level']
			)

		);

		$this->session->set_flashdata('success', 'You have successfully logged in.');
		return true;
	}
}