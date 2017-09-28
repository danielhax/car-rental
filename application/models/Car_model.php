<?php
class Car_model extends CI_Model {

	private $company;
	private $model;
	private $year;
	private $carVariation;

	public function insert_car(){
		$company = $this->input->post('company');
		$model = $this->input->post('model');
		$year = $this->input->post('model');
		$carVariation = $this->input->post('model');


		$this->db->insert('users', $this);
	}
}
?>