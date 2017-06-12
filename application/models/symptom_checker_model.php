<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Symptom_checker_model extends CI_Model {

	public function get_form_data() {

		// Get user data from session and sets it for symptom checker
		$form_data = array(
			'name' => $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'),
			'age' => round(date('Y-m-d') - $this->session->userdata('dob')) . ' Years',
			'gender' => ucfirst($this->session->userdata('gender')),
			'location' => $this->session->userdata('location'),
			'symptoms' => ''
		);

		$selected_symptoms = array();
		if(isset($_POST['symptoms']) && !empty($_POST['symptoms'])) {

			foreach($_POST['symptoms'] as $e)
				$selected_symptoms[] = $e;

			//Fetch all possible medical conditions and doctors
			$this->db->join('symptom_medical_condition', 'symptom_medical_condition.symptom_id = symptoms.symptoms_id');
			$this->db->join('medical_condition', 'medical_condition.medical_cond_id = symptom_medical_condition.medical_cond_id');
			$this->db->join('specialization_medical_con', 'specialization_medical_con.medical_cond_id = medical_condition.medical_cond_id');
			$this->db->join('specialization', 'specialization.specialization_id = specialization_medical_con.specialization_id');
			$this->db->join('doctor', 'doctor.specialization = specialization.specialization_id');
			$this->db->where('symptoms.status', 1);
			$this->db->where('specialization.status',1);
			$this->db->where('medical_condition.status',1);
			$this->db->where('doctor.status',1);
			$result = $this->db->get('symptoms')->result_array();

			// Iterate dataset agaisnt selected symptoms to find possible condition and doctor for appointment
			$temp_data = array(); $count = 1;
			foreach($result as $e) {
				if(in_array($e['symptoms_id'], $selected_symptoms)) {
					//If previously selected, increase hit ratio so that medical condition will appear above
					if(isset($temp_data[$e['medical_cond_id'] . '|' . $e['doctor_id']])) {
						$temp_data[$e['medical_cond_id'] . '|' . $e['doctor_id']]['hit_ratio']++;
					}
					else {
						$temp_data[$e['medical_cond_id'] . '|' . $e['doctor_id']] = array(
							'count' => $count++,
							'hit_ratio' => 1,
							'medical_condition_name' => $e['medical_condition_name'],
							'doctor_name' => $e['first_name'] . ' ' . $e['last_name'],
							'doctor_id' => $e['doctor_id'],
							'specialization_name' => $e['specialization_name'],
							'location' => $e['location']
						);
					}
				}
			}

			//Sort temp_data according to hit ratio
			usort($temp_data, function($a, $b) {
			    return $b['hit_ratio'] - $a['hit_ratio'];
			});

			$form_data['table_data'] = array();
			if(!empty($temp_data))
				$form_data['table_data'] = array_values($temp_data);
		}

		// Get all active symptoms registered by admin
		$this->db->select('symptoms_id AS "id", symptoms_description AS "display"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('symptoms')->result_array();

		foreach($temp_data as $e) {
			$form_data['symptoms'] .= '<option value="'.$e['id'].'"  ' . (in_array($e['id'], $selected_symptoms) ? 'selected' : '') . '>' . $e['display'] . '</option>';
		}

		$select_data = '';
		if($this->uri->segment(3) != '') {
			$this->db->where('medical_service_id', $this->uri->segment(3));
			$temp_data = $this->db->get('medical_service')->row_array();

			if(!empty($temp_data))
				$form_data = $temp_data;
		}

		return $form_data;
	}	

	
}