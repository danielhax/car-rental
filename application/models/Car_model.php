<?php
class Car_model extends CI_Model {

	public $company;
	public $model;
	public $year;
	public $color;
	public $type_fk;
	public $number_of_seats;
	public $total_qty;
	public $rented_qty;


	public function insert_car(){
		$company = $this->input->post('company');
		$model = $this->input->post('model');
		$year = $this->input->post('year');
		$car_variation_fk = $this->input->post('color');

		$this->db->insert('users', $this);
	}

	public function get_type($type_id){
		
	}

	public function get_all_cars(){
		
	}
}
?>