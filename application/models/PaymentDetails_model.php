
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentDetails_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function index()
	{

	}

	public function save_credit_card_details(){
		$details = json_decode($this->input->post('paymentDetails'), true);

		$data = array(
			'type' => $details['type'],
			'card_number' => $details['card_number'],
			'card_expiry' => $details['card_expiry'],
			'cvv' => $details['cvv'],
			'user_fk' => $this->session->userdata('id')
		);

		if(!$this->db->insert('PaymentDetails', $data)){
			//return $this->db->error();
			return json_encode(array("success" => false, "message" => "Cannot save your credit card details"));
		} else {
			return json_encode(array("success" => true, "message" => "Credit card details saved", "payment_id" => $this->db->insert_id()));
		}
	}
	
	private function credit_card_details_exists($user_id, $card_type)
	{
	    $this->db->where('user_fk',$user_id);
	    $this->db->where('type', $card_type);
	    $query = $this->db->get('PaymentDetails');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}
}

/* End of file PaymentDetails_model.php */
/* Location: ./application/models/PaymentDetails_model.php */
?>