<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conditions_model extends CI_Model {

	public function get_form_data() {
		$form_data = array(
			'medical_cond_id' => '',
			'medical_condition_name' => '',
			'status' => ''
		);

		$multi_set_data = array();
		if($this->uri->segment(3) != '') {
			$this->db->where('medical_cond_id', $this->uri->segment(3));
			$temp_data = $this->db->get('medical_condition')->row_array();

			if(!empty($temp_data))
				$form_data = $temp_data;

			//Fetch data that need to be set on the multiselect.
			$this->db->select('symptom_id');
			$this->db->where('medical_cond_id', $this->uri->segment(3));
			$temp_data = $this->db->get('symptom_medical_condition')->result_array();

			foreach($temp_data as $e)
				$multi_set_data[] = $e['symptom_id'];
		}

		//Fetch Symtoms data to create a relationship.
		$this->db->select('symptoms_id AS "id", symptoms_description AS "display", status AS "status"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('symptoms')->result_array();

		$form_data['related_symptoms'] = '';
		foreach($temp_data as $e)
			$form_data['related_symptoms'] .= '<option value="'.$e['id'].'"  '.(in_array($e['id'], $multi_set_data) ? 'selected' : '').' >' . $e['display'] . '</option>';

		$this->db->select('medical_cond_id AS "id", medical_condition_name AS "display", status AS "status"');
		$form_data['table_data'] = $this->db->get('medical_condition')->result_array();

		return $form_data;
	}	

	public function submit() { 
		
		//Validation Check
		$this->form_validation->set_rules('medical_condition_name', 'Description', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		//Check if an ID exists. If so update instead of inserting.
		if($_POST['update_id'] != '') {

			$this->db->where('medical_cond_id', $_POST['update_id']);
			$this->db->update('medical_condition',
				array(
					'medical_condition_name' => $_POST['medical_condition_name'],
					'status' => $_POST['status']
				)
			);

			$this->db->where('medical_cond_id', $_POST['update_id']);
			$this->db->delete('symptom_medical_condition');

			$insert_symptoms_data = array();
			foreach($_POST['related_symptoms'] as $e) {
				$insert_symptoms_data[] = array(
					'medical_cond_id' =>  $_POST['update_id'],
					'symptom_id' => $e
				);
			}

			if(!empty($insert_symptoms_data)) {
				$this->db->insert_batch('symptom_medical_condition', $insert_symptoms_data);
			}

			$this->session->set_flashdata('success', 'You have successfully update a record.');
			return true;
		}

		// By defualt save a record
		$this->db->insert('medical_condition',
			array(
				'medical_condition_name' => $_POST['medical_condition_name'],
				'status' => $_POST['status']
			)
		);

		$insert_id = $this->db->insert_id();

		$insert_symptoms_data = array();
		foreach($_POST['related_symptoms'] as $e) {
			$insert_symptoms_data[] = array(
				'medical_cond_id' =>  $insert_id,
				'symptom_id' => $e
			);
		}

		if(!empty($insert_symptoms_data)) {
			$this->db->insert_batch('symptom_medical_condition', $insert_symptoms_data);
		}

		$this->session->set_flashdata('success', 'You have successfully saved a record.');
		return true;
	}
	
}