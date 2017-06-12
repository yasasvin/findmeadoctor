<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specializations_model extends CI_Model {

	public function get_form_data() {
		$form_data = array(
			'specialization_id' => '',
			'specialization_name' => '',
			'status' => ''
		);

		$multi_set_data = array();
		if($this->uri->segment(3) != '') {
			$this->db->where('specialization_id', $this->uri->segment(3));
			$temp_data = $this->db->get('specialization')->row_array();

			if(!empty($temp_data))
				$form_data = $temp_data;

			//Fetch data that need to be set on the multiselect.
			$this->db->select('medical_cond_id');
			$this->db->where('specialization_id', $this->uri->segment(3));
			$temp_data = $this->db->get('specialization_medical_con')->result_array();

			foreach($temp_data as $e)
				$multi_set_data[] = $e['medical_cond_id'];
		}

		//Fetch Symtoms data to create a relationship.
		$this->db->select('medical_cond_id AS "id", medical_condition_name AS "display", status AS "status"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('medical_condition')->result_array();

		$form_data['related_medical_conditions'] = '';
		foreach($temp_data as $e)
			$form_data['related_medical_conditions'] .= '<option value="'.$e['id'].'"  '.(in_array($e['id'], $multi_set_data) ? 'selected' : '').' >' . $e['display'] . '</option>';

		$this->db->select('specialization_id AS "id", specialization_name AS "display", status AS "status"');
		$form_data['table_data'] = $this->db->get('specialization')->result_array();

		return $form_data;
	}	

	public function submit() { 
		
		//Validation Check
		$this->form_validation->set_rules('specialization_name', 'Doctor Specialization', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		//Check if an ID exists. If so update instead of inserting.
		if($_POST['update_id'] != '') {

			$this->db->where('specialization_id', $_POST['update_id']);
			$this->db->update('specialization',
				array(
					'specialization_name' => $_POST['specialization_name'],
					'status' => $_POST['status']
				)
			);

			$this->db->where('specialization_id', $_POST['update_id']);
			$this->db->delete('specialization_medical_con');

			$insert_medical_condition_data = array();
			foreach($_POST['related_medical_conditions'] as $e) {
				$insert_medical_condition_data[] = array(
					'specialization_id' =>  $_POST['update_id'],
					'medical_cond_id' => $e
				);
			}

			if(!empty($insert_medical_condition_data)) {
				$this->db->insert_batch('specialization_medical_con', $insert_medical_condition_data);
			}

			$this->session->set_flashdata('success', 'You have successfully update a record.');
			return true;
		}

		// By defualt save a record
		$this->db->insert('specialization',
			array(
				'specialization_name' => $_POST['specialization_name'],
				'status' => $_POST['status']
			)
		);

		$insert_id = $this->db->insert_id();

		$insert_medical_condition_data = array();
		foreach($_POST['related_medical_conditions'] as $e) {
			$insert_medical_condition_data[] = array(
				'specialization_id' =>  $insert_id,
				'medical_cond_id' => $e
			);
		}

		if(!empty($insert_medical_condition_data)) {
			$this->db->insert_batch('specialization_medical_con', $insert_medical_condition_data);
		}

		$this->session->set_flashdata('success', 'You have successfully saved a record.');
		return true;
	}
	
}