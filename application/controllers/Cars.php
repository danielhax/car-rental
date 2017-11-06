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
}
