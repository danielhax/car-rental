<?php
class CarType_model extends CI_Model {

	public function get_car_types(){
		$query = $this->db->query('select * from CarType');
		$types = array();
		foreach($query->result() as $row){
			$types[] = $row;
		}
		return json_encode($types);
	}
}
?>