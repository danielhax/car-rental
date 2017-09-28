<?php
class User_model extends CI_Model {

	public $email;
	public $password;
	public $first_name;
	public $last_name;

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	} 

	public function insert_user(){
		
		$this->email = $this->input->post('email');
		$this->password = $this->input->post('password');
		$this->first_name = $this->input->post('first_name');
		$this->last_name = $this->input->post('last_name');
		
		if(!$this->db->insert('User', $this)){
			return $this->db->error();
		} else {
			return "success!!";
		}
	}
}
?>