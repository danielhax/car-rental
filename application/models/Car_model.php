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

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

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
		$this->db->select('*');
		$this->db->from('Car');
		$this->db->join('CarImage', 'CarImage.id = Car.car_image_fk');
		$this->db->join('CarType', 'CarType.id = Car.type_fk');
		$this->db->join('CarVariation', 'CarVariation.id = Car.variation_fk');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_car($id){
		$this->db->select('*');
		$this->db->from('Car');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}
}
?>