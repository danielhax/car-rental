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
		$this->load->model('CarImage_model');
	}

	public function index()
	{
		$data['cars'] = $this->get_cars();
		$this->load->view('templates/header.php');
		$this->load->view('cars', $data);
		$this->load->view('templates/footer.php');
	}

	public function manage_cars(){
		if($this->session->userdata('isAdmin') == 1){
			$data['cars'] = $this->get_cars();
			$data['carVariations'] = $this->get_car_variations();
			$this->load->view('templates/user-page-header');
			$this->load->view('user/manage-cars', $data);
			$this->load->view('templates/user-page-footer');
		} else {
			redirect('','refresh');
		}
	}

	public function insert_car(){
		echo var_dump($this->input->post());
		// $image_name = $this->input->post('image_name');
		// $image_id = $this->CarImage_model->insert_image($image_name);
		// echo $this->Car_model->insert_car($image_id);
	}

	public function insert_car_variation(){
		echo $this->Car_model->insert_car_variation();
	}

	public function get_cars(){
		return $this->Car_model->get_all_cars();
	}

	public function set_car_rented(){
		$car_id = $this->input->post('id');

		if(!$this->Car_model->set_car_rented($car_id)){
			echo json_encode(array("success"=> false, "message"=> "Something went wrong in the updating car details."));
		}
		else {
			echo json_encode(array("success"=> true, "message"=> "Updating car rented quantity successful."));
		}
	}

	public function get_car_variations(){
		return $this->Car_model->get_car_variations();
	}

	public function upload_image()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
        }
    }
}
