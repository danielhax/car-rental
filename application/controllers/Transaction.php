<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Transaction_model');
		$this->load->model('Car_model');
	}

	public function index()
	{
		
	}

	public function rent_car(){
		echo $this->Transaction_model->insert_transaction_details();
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */
?>