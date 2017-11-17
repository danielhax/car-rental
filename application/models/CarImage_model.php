<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class CarImage_model extends CI_Model {
 
 	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function insert_image($image_name){
		$this->db->insert('CarImage', array('image_name' => $image_name));
		return $this->db->insert_id();
	}
 }
 
 /* End of file CarImage_model.php */
 /* Location: ./application/models/CarImage_model.php */ ?>