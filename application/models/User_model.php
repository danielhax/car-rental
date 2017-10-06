<?php
class User_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	} 

	public function insert_user(){
		
		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name')
		);
		
		if(!$this->db->insert('User', $data)){
			//return $this->db->error();
			return json_encode(array("success" => false, "message" => "Email is already registered!"));
		} else {
			return json_encode(array("success" => true, "message" => "Registration successful!"));
		}
	}

	public function login(){

		$user_data;

		if(!($user_data = $this->get_row_if_user_exist($this->input->post('email')))){
			return json_encode(array("success" => false, "message" => "Email is not registered!"));
		}

		$this->set_session_data($user_data);

		if(!$this->password_match($this->input->post('password'), $this->session->password)){
			session_destroy();
			return json_encode(array("success" => false, "message" => "Incorrect password!"));
		}

		return json_encode(array("success" => true, "message" => "Login successful!"));
	}

	public function get_row_if_user_exist($email){
		$user_data = $this->db->query("select * from User where email='" . $email . "'")->row();
		return $user_data;
	}

	public function password_match($inputted_password, $real_password){
		return $inputted_password == $real_password;
	}

	public function set_session_data($user_data){
		// $this->session->set_userdata(array(
		// 	'email' => $user_data->email,
		// 	'first_name' => $user_data->first_name,
		// 	'last_name' => $user_data->last_name,
		// 	'password' => $user_data->password,
		// 	'isAdmin' => $user_data->isAdmin
		// ));

		$this->session = $user_data;
	}
}
?>