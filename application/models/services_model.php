<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_types_model extends CI_Model {

	public function get_form_data() {
		$form_data = array(
			'medical_service_type_id' => '',
			'description' => '',
			'status' => ''
		);

		if($this->uri->segment(3) != '') {
			$this->db->where('medical_service_type_id', $this->uri->segment(3));
			$temp_data = $this->db->get('medical_service_type')->row_array();

			if(!empty($temp_data))
				$form_data = $temp_data;
		}

		$this->db->select('medical_service_type_id AS "id", description AS "display", status AS "status"');
		$form_data['table_data'] = $this->db->get('medical_service_type')->result_array();

		return $form_data;
	}	

	public function submit() { 
		
		//Validation Check
		$this->form_validation->set_rules('symptoms_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		//Check if an ID exists. If so update instead of inserting.
		if($_POST['update_id'] != '') {

			$this->db->where('symptoms_id', $_POST['update_id']);
			$this->db->update('symptoms',
				array(
					'symptoms_description' => $_POST['symptoms_description'],
					'status' => $_POST['status']
				)
			);

			$this->session->set_flashdata('success', 'You have successfully update a record.');
			return true;
		}

		// By defualt save a record
		$this->db->insert('symptoms',
			array(
				'symptoms_description' => $_POST['symptoms_description'],
				'status' => $_POST['status']
			)
		);

		$this->session->set_flashdata('success', 'You have successfully saved a record.');
		return true;
	}
	
}