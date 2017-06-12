<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_services_model extends CI_Model {

	public function get_form_data() {

		// Get user data from session and sets it for symptom checker
		$form_data = array(
			'service_type' => '',
			'medical_services' => '<option value="all">All</option>',
		);

		$this->db->select('medical_service_type_id AS "id", description AS "display"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('medical_service_type')->result_array();

		foreach ($temp_data as $key => $value) {
			$form_data['medical_services'] .= '<option value="'.$value['id'].'" '.($value['id'] == $this->input->post('service_type') ? 'selected' : '').'>' . $value['display'] . '</option>';
		}

		if($this->input->post('service_type') != '') {

			if($this->input->post('service_type') != 'all')
				$this->db->where('medical_service_type_id', $this->input->post('service_type'));
			$form_data['table_data'] = $this->db->get('medical_service')->result_array();

			$count = 1;
			foreach($form_data['table_data'] as $e => &$ref)
				$ref['count'] = $count++;

		}

		return $form_data;
	}	

	
}