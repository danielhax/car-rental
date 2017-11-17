<?php
class Car_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function insert_car($image_id){
		$data = array('color' => $this->input->post('color'),
						'plate_no' => $this->input->post('plate_no'),
						'rate' => $this->input->post('rate'),
						'is_rented' => 0,
						'car_image_fk' => $image_id,
						'car_variation_fk' => $this->input->post('car_variation'));

		if(!$this->db->insert('Car', $data)){
			return json_encode(array('success' => false, 'message' => 'Error adding car'));
		} else {
			return json_encode(array('success' => true, 'message' => 'Success adding car'));
		}
	}

	public function insert_car_variation(){
		$data = array('company' => $this->input->post('company'),
						'model' => $this->input->post('model'),
						'type' => $this->input->post('type'),
						'year' => $this->input->post('year'),
						'number_of_seats' => $this->input->post('number_of_seats'));

		if(!$this->db->insert('CarVariation', $data)){
			return json_encode(array('success' => false, 'message' => 'Error adding car variation'));
		} else {
			return json_encode(array('success' => true, 'message' => 'Success adding variety'));
		}
	}

	public function get_car_variations(){
		$this->db->select('*');
		$this->db->from('CarVariation');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_cars(){
		$this->db->select('*');
		$this->db->from('Car');
		$this->db->join('CarImage', 'CarImage.id = Car.car_image_fk');
		$this->db->join('CarVariation', 'CarVariation.id = Car.car_variation_fk');
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

	public function set_car_rented($car_id){
		$this->db->where('id', $car_id);

		return $this->db->update('Car', array('is_rented' => 1));
	}

	public function set_car_available($car_id){
		$this->db->where('id', $car_id);

		return $this->db->update('Car', array('is_rented' => 0));
	}
}
?>