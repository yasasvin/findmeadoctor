<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_doctors_model extends CI_Model {

	public function get_form_data() {

		// Get user data from session and sets it for symptom checker
		$form_data = array(
			'specialization' => '',
			'specializations' => '<option value="all">All</option>',
		);

		$this->db->select('specialization_id AS "id", specialization_name AS "display"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('specialization')->result_array();

		foreach ($temp_data as $key => $value) {
			$form_data['specializations'] .= '<option value="'.$value['id'].'" '.($value['id'] == $this->input->post('specialization') ? 'selected' : '').'>' . $value['display'] . '</option>';
		}

		if($this->input->post('specialization') != '') {

			$this->db->join('specialization', 'specialization.specialization_id = doctor.specialization');
			if($this->input->post('specialization') != 'all')
				$this->db->where('specialization', $this->input->post('specialization'));
			$form_data['table_data'] = $this->db->get('doctor')->result_array();

			$count = 1;
			foreach($form_data['table_data'] as $e => &$ref)
				$ref['count'] = $count++;

		}

		return $form_data;
	}	

	
}