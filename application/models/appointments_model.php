<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments_model extends CI_Model {

	public function get_form_data() {

		// Get user data from session and sets it for symptom checker
		$form_data = array(
			'update_id' => '',
			'doctor_id' => '',
			'doctor' => '',
			'location' => '',
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'feedback' => '',
			'ratings' => '',
			'processed' => false
		);

		if($this->uri->segment(3) != '') {
			$this->db->join('doctor', 'doctor.doctor_id = appointment.doctor_id');
			$this->db->where('appointment.appointment_id', $this->uri->segment(3));
			$temp_data = $this->db->get('appointment')->row_array();

			$form_data = array(
				'update_id' => $this->uri->segment(3),
				'doctor_id' => $temp_data['doctor_id'],
				'doctor' => $temp_data['first_name'] . ' ' . $temp_data['last_name'],
				'location' => $temp_data['location'],
				'date' => $temp_data['date'],
				'time' => $temp_data['time'],
				'feedback' => $temp_data['feedback'],
				'ratings' => $temp_data['ratings'],
				'processed' => true
			);
		}


		return $form_data;
	}

	function get_make_appointment_data() {

		if($this->uri->segment(3) != '') {
			$this->db->where('doctor_id', $this->uri->segment(3));
			$doc_data = $this->db->get('doctor')->row_array();
		}

		$form_data = array(
			'doctor_id' => $this->uri->segment(3),
			'doctor' => $doc_data['first_name'] . ' ' . $doc_data['last_name'] ,
			'location' => $doc_data['location'],
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'feedback' => '',
			'ratings' => '',
			'update_id' => '',
			'processed' => false
		);

		return $form_data;
	}

	function submit() {

		if($_POST['update_id'] != '') {
			$this->db->where('appointment_id', $_POST['update_id']);
			$this->db->update('appointment', array(
				'feedback' => $this->input->post('feedback'),
				'ratings' => $this->input->post('ratings')
			));

			$this->session->set_flashdata('success', 'Your appointment was successfully updated. Thank you for your feedback.');
			return $_POST['update_id'];
		}

		$this->db->insert('appointment', array(
			'user_id' => $this->session->userdata('id'),
			'doctor_id' => $_POST['doctor_id'],
			'medical_condition' => '',
			'date' => $_POST['date'],
			'time' => $_POST['time'],
			'location' => $_POST['location'],
			'status' => 1,
			'feedback' => $this->input->post('feedback'),
			'ratings' => $this->input->post('ratings')
		));

		$this->session->set_flashdata('success', 'Your appointment was successfully created.');
		return $this->db->insert_id();
	}

	public function my_appointments() {

		// Get user data from session and sets it for symptom checker
		$form_data = array(
			'table_data' => ''
		);

		$this->db->join('doctor', 'doctor.doctor_id = appointment.doctor_id');
		$this->db->where('user_id', $this->session->userdata('id'));
		$form_data['table_data'] = $this->db->get('appointment')->result_array();

		$count = 1;
		foreach($form_data['table_data'] AS $e => &$ref)
			$ref['count'] = $count++;

		return $form_data;
	}


	
}