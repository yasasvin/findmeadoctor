<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_services_model extends CI_Model {

	public function get_form_data() {
		$form_data = array(
			'medical_service_id' => '',
			'description' => '',
			'location' => '',
			'address_line1' => '',
			'address_line2' => '',
			'city' => '',
			'state' => '',
			'postal_code' => '',
			'country' => 'New Zealand',
			'medical_service_type_id' => '',
			'status' => ''
		);

		$select_data = '';
		if($this->uri->segment(3) != '') {
			$this->db->where('medical_service_id', $this->uri->segment(3));
			$temp_data = $this->db->get('medical_service')->row_array();

			if(!empty($temp_data))
				$form_data = $temp_data;
		}

		//Fetch Symtoms data to create a relationship.
		$this->db->select('medical_service_type_id AS "id", description AS "display", status AS "status"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('medical_service_type')->result_array();

		$form_data['medical_services'] = '';
		foreach($temp_data as $e)
			$form_data['medical_services'] .= '<option value="'.$e['id'].'"  '.($e['id'] == $form_data['medical_service_type_id'] ? 'selected' : '').' >' . $e['display'] . '</option>';

		$country_list = array("Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cabo Verde","Cambodia","Cameroon","Canada","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica","Côte d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Democratic People's Republic of Korea (North Korea)","Democratic Republic of the Cong","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Kuwait","Kyrgyzstan","Lao People's Democratic Republic (Laos)","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia (Federated States of)","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Republic of Korea (South Korea)","Republic of Moldova","Romania","Russian Federation","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syrian Arab Republic","Tajikistan","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom of Great Britain and Northern Ireland","United Republic of Tanzania","United States of America","Uruguay","Uzbekistan","Vanuatu","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");

		$form_data['countries'] = '';
		foreach($country_list as $e)
			$form_data['countries'] .= '<option value="'.$e.'"' .($e == $form_data['country'] ? 'selected' : '').' >' . $e . '</option>';

		$this->db->select('medical_service_id AS "id", description AS "display", status AS "status"');
		$form_data['table_data'] = $this->db->get('medical_service')->result_array();

		return $form_data;
	}	

	public function submit() { 
		
		//Validation Check
		$this->form_validation->set_rules('description', 'Medical Service Name', 'trim|required');
		$this->form_validation->set_rules('medical_service_type_id', 'Medical Service Type', 'trim|required');
		$this->form_validation->set_rules('address_line1', 'Address Line 1', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('postal_code', 'Postal Code', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		//Check if an ID exists. If so update instead of inserting.
		if($_POST['update_id'] != '') {

			$this->db->where('medical_service_id', $_POST['update_id']);
			$this->db->update('medical_service',
				array(
					'description' => $_POST['description'],
					'address_line1' => $_POST['address_line1'],
					'address_line2' => $_POST['address_line2'],
					'city' => $_POST['city'],
					'state' => $_POST['state'],
					'postal_code' => $_POST['postal_code'],
					'country' => $_POST['country'],
					'location' => $_POST['location'],
					'status' => $_POST['status'],
					'medical_service_type_id' => $_POST['medical_service_type_id']
				)
			);

			$this->session->set_flashdata('success', 'You have successfully update a record.');
			return true;
		}

		// By defualt save a record
		$this->db->insert('medical_service',
			array(
				'description' => $_POST['description'],
				'address_line1' => $_POST['address_line1'],
				'address_line2' => $_POST['address_line2'],
				'city' => $_POST['city'],
				'state' => $_POST['state'],
				'postal_code' => $_POST['postal_code'],
				'country' => $_POST['country'],
				'location' => $_POST['location'],
				'status' => $_POST['status'],
				'medical_service_type_id' => $_POST['medical_service_type_id']
			)
		);

		$this->session->set_flashdata('success', 'You have successfully saved a record.');
		return true;
	}
	
}