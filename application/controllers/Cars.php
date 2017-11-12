<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Cars
	 *	- or -
	 * 		http://example.com/index.php/Cars/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Cars/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('Car_model');
	}

	public function index()
	{
		$data['cars'] = $this->get_cars();
		$this->load->view('templates/header.php');
		$this->load->view('cars', $data);
		$this->load->view('templates/footer.php');
	}

	public function get_cars(){
		return $this->Car_model->get_all_cars();
	}

	public function set_car_rented(){
		$car_id = $this->input->post('id');
		$total_qty = $this->Car_model->get_total_qty($car_id);
		$rented_qty = $this->Car_model->get_rented_qty($car_id);
		$rented_qty += 1; 

		if($rented_qty > $total_qty){
			echo json_encode(array("success"=> false, "message"=> "Something went wrong in the renting process."));
		} else if(!$this->Car_model->set_car_rented($car_id, $rented_qty)){
			echo json_encode(array("success"=> false, "message"=> "Something went wrong in the updating car details."));
		}
		else {
			echo json_encode(array("success"=> true, "message"=> "Updating car rented quantity successful.", "new_rented" => $total_qty - $rented_qty));
		}

		
	}
}
