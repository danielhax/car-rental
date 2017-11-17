<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function insert_transaction_details(){
		$transaction_data = json_decode($this->input->post('transaction_data'), true);
		$data = array('user_fk' => $transaction_data['user_fk'],
					'car_fk' => $transaction_data['car_fk'],
					'start_date' => $transaction_data['start_date'],
					'end_date' => $transaction_data['end_date'],
					'payment_details_fk' => $transaction_data['payment_details_fk']);

		if(!$this->db->insert('Transaction', $data)){
			return json_encode(array("success" => false, "message" => "There was a system error in creating transaction."));
		} else {
			return json_encode(array("success" => true, "message" => "Transaction successfuly recorded"));
		}
	}

}

/* End of file Transaction_model.php */
/* Location: ./application/models/Transaction_model.php */
?>