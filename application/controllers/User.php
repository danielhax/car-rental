<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Home
	 *	- or -
	 * 		http://example.com/index.php/Home/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Home/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User_model');
		$this->load->model('PaymentDetails_model');
		$this->load->model('Car_model');
	}

	public function index(){
		$this->load->view('templates/user-page-header');
		if(session_id()){
			if($this->session->userdata['isAdmin'] == 1)
				$this->load->view('user/dashboard');
			else
				redirect('','refresh');
		}
		$this->load->view('templates/user-page-footer');
	}

	public function login(){
		if($this->session->has_userdata('email')){
			echo json_encode(array("success" => false, "message" => "A session is logged in"));
		}
		else{
			echo $this->User_model->login();
		}

	}

	public function logout(){
		session_destroy();
		redirect(site_url(),'refresh');
	}

	public function register()
	{
		echo $this->User_model->insert_user();
	}

	public function save_credit_card_details(){
		echo $this->PaymentDetails_model->save_credit_card_details();
	}

	public function manage_users(){
		$this->load->view('user/forms');
	}
}
