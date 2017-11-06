<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Car_model');
	}

	public function index()
	{
		
	}

	public function rent_car($id, $paymentType){
		if($this->session->userdata('email')){
			$car_data = $this->Car_model->get_car($id);
		} else {
			redirect('','refresh');
		}
	}

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */
?>