<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_model extends CI_Model {

	public function get_form_data() {
		$form_data = array(
			'doctor_id' => '',
			'first_name' => '',
			'last_name' => '',
			'dob' => '',
			'location' => '',
			'address_line1' => '',
			'address_line2' => '',
			'city' => '',
			'state' => '',
			'postcode' => '',
			'country' => 'New Zealand',
			'specialization' => '',
			'status' => '',
			'email' => '',
			'contactno' => '',
			'gender' => '',
			'monday_start_hour' => '00:00',
			'monday_end_hour' => '23:59',
			'tuesday_start_hour' => '00:00',
			'tuesday_end_hour' => '23:59',
			'wednesday_start_hour' => '00:00',
			'wednesday_end_hour' => '23:59',
			'thursday_start_hour' => '00:00',
			'thursday_end_hour' => '23:59',
			'friday_start_hour' => '00:00',
			'friday_end_hour' => '23:59',
			'saturday_start_hour' => '00:00',
			'saturday_end_hour' => '23:59',
			'sunday_start_hour' => '00:00',
			'sunday_end_hour' => '23:59'
		);

		$select_data = '';
		if($this->uri->segment(3) != '') {
			$this->db->where('doctor.doctor_id', $this->uri->segment(3));
			$this->db->join('doctor_schedule', 'doctor_schedule.doctor_id = doctor.doctor_id', 'LEFT');
			$temp_data = $this->db->get('doctor')->row_array();

			if(!empty($temp_data))
				$form_data = $temp_data;
		}

		//Fetch Symtoms data to create a relationship.
		$this->db->select('specialization_id AS "id", specialization_name AS "display", status AS "status"');
		$this->db->where('status', 1);
		$temp_data = $this->db->get('specialization')->result_array();

		$form_data['specializations'] = '';
		foreach($temp_data as $e)
			$form_data['specializations'] .= '<option value="'.$e['id'].'"  '.($e['id'] == $form_data['specialization'] ? 'selected' : '').' >' . $e['display'] . '</option>';

		$country_list = array("Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cabo Verde","Cambodia","Cameroon","Canada","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica","Côte d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Democratic People's Republic of Korea (North Korea)","Democratic Republic of the Cong","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Kuwait","Kyrgyzstan","Lao People's Democratic Republic (Laos)","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia (Federated States of)","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Republic of Korea (South Korea)","Republic of Moldova","Romania","Russian Federation","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syrian Arab Republic","Tajikistan","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom of Great Britain and Northern Ireland","United Republic of Tanzania","United States of America","Uruguay","Uzbekistan","Vanuatu","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");

		$form_data['countries'] = '';
		foreach($country_list as $e)
			$form_data['countries'] .= '<option value="'.$e.'"' .($e == $form_data['country'] ? 'selected' : '').' >' . $e . '</option>';

		$this->db->select('doctor_id AS "id", CONCAT(first_name, " ", last_name) AS "display", status AS "status"', false);
		$form_data['table_data'] = $this->db->get('doctor')->result_array();

		return $form_data;
	}	

	public function submit() { 
		
		//Validation Check
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('address_line1', 'Address Line 1', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('postcode', 'Postal Code', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('specialization', 'Specialization', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('contactno', 'Contact No', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');

		if(!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			return false;
		}

		//Check if an ID exists. If so update instead of inserting.
		if($_POST['update_id'] != '') {

			$this->db->where('doctor_id', $_POST['update_id']);
			$this->db->update('doctor',
				array(
					'first_name' => $_POST['first_name'],
					'last_name' => $_POST['last_name'],
					'dob' => $_POST['dob'],
					'address_line1' => $_POST['address_line1'],
					'address_line2' => $_POST['address_line2'],
					'city' => $_POST['city'],
					'state' => $_POST['state'],
					'postcode' => $_POST['postcode'],
					'country' => $_POST['country'],
					'specialization' => $_POST['specialization'],
					'email' => $_POST['email'],
					'contactno' => $_POST['contactno'],
					'gender' => $_POST['gender'],
					'location' => $_POST['location'],
					'status' => $_POST['status']
				)
			);

			$this->db->where('doctor_id', $_POST['update_id']);
			$this->db->delete('doctor_schedule');

			$this->db->insert('doctor_schedule',
				array(
					'doctor_id' => $_POST['update_id'],
					'monday_start_hour' => $_POST['monday_start_hour'],
					'monday_end_hour' => $_POST['monday_end_hour'],
					'tuesday_start_hour' => $_POST['tuesday_start_hour'],
					'tuesday_end_hour' => $_POST['tuesday_end_hour'],
					'wednesday_start_hour' => $_POST['wednesday_start_hour'],
					'wednesday_end_hour' => $_POST['wednesday_end_hour'],
					'thursday_start_hour' => $_POST['thursday_start_hour'],
					'thursday_end_hour' => $_POST['thursday_end_hour'],
					'friday_start_hour' => $_POST['friday_start_hour'],
					'friday_end_hour' => $_POST['friday_end_hour'],
					'saturday_start_hour' => $_POST['saturday_start_hour'],
					'saturday_end_hour' => $_POST['saturday_end_hour'],
					'sunday_start_hour' => $_POST['sunday_start_hour'],
					'sunday_end_hour' => $_POST['sunday_end_hour']
				)
			);

			$this->session->set_flashdata('success', 'You have successfully update a record.');
			return true;
		}

		// By defualt save a record
		$this->db->insert('doctor',
			array(
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'dob' => $_POST['dob'],
				'address_line1' => $_POST['address_line1'],
				'address_line2' => $_POST['address_line2'],
				'city' => $_POST['city'],
				'state' => $_POST['state'],
				'postcode' => $_POST['postcode'],
				'country' => $_POST['country'],
				'specialization' => $_POST['specialization'],
				'email' => $_POST['email'],
				'contactno' => $_POST['contactno'],
				'gender' => $_POST['gender'],
				'location' => $_POST['location'],
				'status' => $_POST['status']
			)
		);

		$insert_id = $this->db->insert_id();

		$this->db->insert('doctor_schedule',
			array(
				'doctor_id' => $insert_id,
				'monday_start_hour' => $_POST['monday_start_hour'],
				'monday_end_hour' => $_POST['monday_end_hour'],
				'tuesday_start_hour' => $_POST['tuesday_start_hour'],
				'tuesday_end_hour' => $_POST['tuesday_end_hour'],
				'wednesday_start_hour' => $_POST['wednesday_start_hour'],
				'wednesday_end_hour' => $_POST['wednesday_end_hour'],
				'thursday_start_hour' => $_POST['thursday_start_hour'],
				'thursday_end_hour' => $_POST['thursday_end_hour'],
				'friday_start_hour' => $_POST['friday_start_hour'],
				'friday_end_hour' => $_POST['friday_end_hour'],
				'saturday_start_hour' => $_POST['saturday_start_hour'],
				'saturday_end_hour' => $_POST['saturday_end_hour'],
				'sunday_start_hour' => $_POST['sunday_start_hour'],
				'sunday_end_hour' => $_POST['sunday_end_hour']
			)
		);

		$this->session->set_flashdata('success', 'You have successfully saved a record.');
		return true;
	}
	
}