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
		$data['fundraisers'] = $this->fundraiser_model->getFundraisersByAvg();
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
		$data['reviews'] = $this->fundraiser_model->getFundraiserReviews($fundraiser_id);

		// Form Fields. 


		$data['fundraiser_id'] = array(
		'fundraiser_id' => $fundraiser_id
		);

		$data['review_textarea'] = array(
		'name' => 'textarea',
		'rows' => 10,
		'cols' => 50
		);

		$data['review_name'] = array(
		'type' => 'input',
		'name' => 'review_name',
		'id' => 'review_name_id',
		'placeholder' => 'Please Enter Name'
		);

		$data['review_email'] = array(
		'type' => 'email',
		'name' => 'review_email',
		'id' => 'review_email_id',
		'placeholder' => 'Please Enter Email Address'
		);

		$data['rating_radio1'] = array(
		'name' => 'rating_radio',
		'value' => '1',
		//'checked' => TRUE,
		);
		$data['rating_radio2'] = array(
		'name' => 'rating_radio',
		'value' => '2',
		);
		$data['rating_radio3'] = array(
		'name' => 'rating_radio',
		'value' => '3',
		);
		$data['rating_radio4'] = array(
		'name' => 'rating_radio',
		'value' => '4',
		);
		$data['rating_radio5'] = array(
		'name' => 'rating_radio',
		'value' => '5',
		);						

		$data['all'] = $data;


		$this->load->view('header', $data);
		$this->load->view('welcome_message_view_fundraiser', $data);
		$this->load->view('footer', $data);		
	}	


	public function fundraiser_review()
	{

		$data = array();

		$data['all'] = '';

		$fundraiser_id = $this->input->post('fundraiser_id');
		$data['fundraiser'] = $this->fundraiser_model->getFundraiser($fundraiser_id);
		$data['reviews'] = $this->fundraiser_model->getFundraiserReviews($fundraiser_id);		

		$data['fundraiser'] = $this->fundraiser_model->getFundraiser($fundraiser_id);
		$data['reviews'] = $this->fundraiser_model->getFundraiserReviews($fundraiser_id);

		// Form Fields. 
		$data['fundraiser_id'] = array(
		'fundraiser_id' => $fundraiser_id
		);

		$data['review_textarea'] = array(
		'name' => 'textarea',
		'rows' => 10,
		'cols' => 50,
		'value' => $this->input->post('review_textarea'),
		);

		$data['review_name'] = array(
		'type' => 'input',
		'name' => 'review_name',
		'value' => $this->input->post('review_name'),		
		'id' => 'review_name_id',
		'placeholder' => 'Please Enter Name'
		);

		$data['review_email'] = array(
		'type' => 'email',
		'name' => 'review_email',
		'value' => $this->input->post('review_email'),
		'id' => 'review_email_id',
		'placeholder' => 'Please Enter Email Address'
		);

		$data['rating_radio1'] = array(
		'name' => 'rating_radio',
		'value' => '1',
		//'checked' => TRUE,
		);
		$data['rating_radio2'] = array(
		'name' => 'rating_radio',
		'value' => '2',
		);
		$data['rating_radio3'] = array(
		'name' => 'rating_radio',
		'value' => '3',
		);
		$data['rating_radio4'] = array(
		'name' => 'rating_radio',
		'value' => '4',
		);
		$data['rating_radio5'] = array(
		'name' => 'rating_radio',
		'value' => '5',
		);	


		$config = array(
				array(
						'field' => 'review_name',
						'label' => 'Name',
						'rules' => 'required|alpha_numeric_spaces',
						'errors' => array(
								'required' => 'You must provide a %s.',
						),	
				),
				array(
						'field' => 'review_email',
						'label' => 'Email',
						'rules' => 'required|valid_email',
						'errors' => array(
								'required' => 'You must provide an %s.',
						),
				),
				array(
						'field' => 'rating_radio',
						'label' => 'Rating',
						'rules' => 'required|integer',
						'errors' => array(
								'required' => 'You must provide a %s.',
						),
				),				
				array(
						'field' => 'review_textarea',
						'label' => 'Review',
						'rules' => 'required|min_length[25]',
						'errors' => array(
								'required' => 'You must provide a %s.',
						),
				),				
		);

		$this->form_validation->set_rules($config);

		$this->load->view('header', $data);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('welcome_message_view_fundraiser', $data);
		}
		else
		{

			//Storing all  values travelled through POST method
			$checkbox_array = $this->input->post('qualification');

			$data['all'] = array(
			'fundraiser_id' => $this->input->post('fundraiser_id'),
			'review_email' => $this->input->post('review_email'),
			'review_name' => $this->input->post('review_name'),
			'rating_radio' => $this->input->post('rating_radio'),
			'review_textarea' => $this->input->post('review_textarea')
			);

            /*
            +---------------+--------------+------+-----+---------+----------------+
            | Field         | Type         | Null | Key | Default | Extra          |
            +---------------+--------------+------+-----+---------+----------------+
            | review_id     | int(11)      | NO   | PRI | NULL    | auto_increment |
            | fundraiser_id | int(11)      | NO   |     | NULL    |                |
            | review_rating | int(11)      | NO   |     | NULL    |                |
            | review_text   | text         | YES  |     | NULL    |                |
            | review_name   | varchar(255) | YES  |     | NULL    |                |
            | review_email  | varchar(255) | YES  |     | NULL    |                |
            | review_date   | datetime     | NO   |     | NULL    |                |
            | review_ip     | varchar(25)  | YES  |     | NULL    |                |
            +---------------+--------------+------+-----+---------+----------------+
            */

			if (!date_default_timezone_get('date.timezone')) {
				// insert here the default timezone
				date_default_timezone_set('America/Los_Angeles');
			}

			$new_fundraiser = array(
			'review_id'		=> '',
			'fundraiser_id' => $this->input->post('fundraiser_id'),
			'review_email' 	=> $this->input->post('review_email'),
			'review_name' 	=> $this->input->post('review_name'),
			'review_rating'	=> $this->input->post('rating_radio'),
			'review_text' 	=> $this->input->post('review_textarea'),
			'review_date'	=> date('Y-m-d H:i:s'),
			'review_ip' 	=> $_SERVER['REMOTE_ADDR'],
			);			

			$this->fundraiser_model->createFundraiserReview($new_fundraiser);

			$this->load->view('welcome_message_view_fundraiser_post', $data);
		}

		$this->load->view('footer', $data);		
	}	


	public function addStuff() {
		//$this->load->model("fundraiser_model");
		$this->fundraiser_model->add('1','2');
	}
}
