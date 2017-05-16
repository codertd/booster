<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	 public function __construct() {
		 parent::__construct();
		 //
		 echo "This is the initialization";

		 $this->load->model("fundraiser_model");
	 }

	public function index()
	{

		$data = array();

		$data = array();
		$data['fundraisers'] = $this->fundraiser_model->getFundraisers();
		$data['test'] = $this->addStuff();
		$data['all'] = $data;

		$this->load->view('header', $data);
		$this->load->view('welcome_message',$data);
		$this->load->view('footer', $data);		
	}

	public function fundraiser($fundraiser_id = 1)
	{

		$data = array();
		$data['fundraiser'] = $this->fundraiser_model->getFundraiser($fundraiser_id);
		$data['all'] = $data;

		$this->load->view('header', $data);
		$this->load->view('welcome_message_view_fundraiser', $data);
		$this->load->view('footer', $data);		
	}	



	public function addStuff() {
		//$this->load->model("fundraiser_model");
		$this->fundraiser_model->add('1','2');
	}
}
