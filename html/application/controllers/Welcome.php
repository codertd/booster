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



	/**
	* Constructor for the controller
	*
	* @param	none
	* @return	none
	*/
	 public function __construct() {
		 parent::__construct();

		 $this->load->model("fundraiser_model");
	 }


	/**
	* landing page for /welcome
	*
	* @param	none
	* @return	none
	*/

	public function index()
	{

		$data = array();

		$data = array();
		$data['fundraisers'] = $this->fundraiser_model->getFundraisersByAvg();
		$data['test'] = $this->addStuff();

		$data['fundraiser_name'] = array(
			'type' => 'input',
			'name' => 'fundraiser_name',
			'id' => 'fundraiser_name_id',
			'placeholder' => 'Please Enter Name'
		);


		$this->load->view('header', $data);
		$this->load->view('welcome_message',$data);
		$this->load->view('footer', $data);		
	}

	/**
	* Retrieve a fundraiser by id, including a non posting form for display of data.
	*
	* @param	$fundraiser_id
	* @return	none
	*/

	public function fundraiser($fundraiser_id = 1)
	{

		$data = array();

		$data['fundraiser'] = $this->fundraiser_model->getFundraiser($fundraiser_id);
		$data['reviews'] = $this->fundraiser_model->getFundraiserReviews($fundraiser_id);

		// if we've already reviewed, then we dont want to allow another review.
		$data['has_reviewed'] = $this->fundraiser_model->hasReviewedFundraiser($fundraiser_id,$_SERVER['REMOTE_ADDR']);

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

		$this->load->view('header', $data);

		if (count($data['has_reviewed']) > 0) {
			$this->load->view('welcome_message_view_fundraiser_already_reviewed', $data);
		} else {			
			$this->load->view('welcome_message_view_fundraiser', $data);		
		}

		$this->load->view('footer', $data);

	}	

	/**
	* Post url for a new review.
	*
	* @param	(form data from post)
	* @return	none
	*/
	public function fundraiser_review()
	{

		$data = array();

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
						'rules' => 'required|integer|regex_match[/^[1-5]$/]',
						'errors' => array(
								'required' => 'You must provide a %s.',
						),
				),				
				array(
						'field' => 'review_textarea',
						'label' => 'Review',
						'rules' => 'required|min_length[10]',
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


	/**
	* Create a new Fundraiser from post data.
	*
	* @param	none
	* @return	none
	*/

	public function fundraiser_new()
	{

		$data = array();

		$data['fundraiser_name'] = array(
		'type' => 'input',
		'name' => 'fundraiser_name',
		'value' => $this->input->post('fundraiser_name'),		
		'id' => 'fundraiser_name_id',
		'placeholder' => 'Please Enter Name'
		);

		$config = array(
				array(
						'field' => 'fundraiser_name',
						'label' => 'Name',
						'rules' => 'required|alpha_numeric_spaces',
						'errors' => array(
								'required' => 'You must provide a %s.',
						),	
				),		
		);

		$this->form_validation->set_rules($config);

		$this->load->view('header', $data);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('welcome_message', $data);
		}
		else
		{

			$does_exist = $this->fundraiser_model->getFundraiserByName($this->input->post('fundraiser_name'));
			if (count($does_exist) > 0) {

				$data['fundraisers'] = $this->fundraiser_model->getFundraisersByAvg();

				$data['fundraiser_name'] = array(
					'type' => 'input',
					'name' => 'fundraiser_name',
					'id' => 'fundraiser_name_id',
					'placeholder' => 'Please Enter Name'
				);

				$data['already_exists'] = 1;

				$this->load->view('welcome_message', $data);
			} else {
				$new_fundraiser = array(
					'fundraiser_id' => '',
					'fundraiser_name' => $this->input->post('fundraiser_name'),
				);
				$this->fundraiser_model->createFundraiser($new_fundraiser);

				$data['fundraisers'] = $this->fundraiser_model->getFundraisersByAvg();

				$data['fundraiser_name'] = array(
					'type' => 'input',
					'name' => 'fundraiser_name',
					'id' => 'fundraiser_name_id',
					'placeholder' => 'Please Enter Name'
				);

				$this->load->view('welcome_message', $data);
			}

		}

		$this->load->view('footer', $data);		
	}	


	/**
	* test method
	*
	* @param	$fundraiser_id
	* @return	none
	*/	
	public function addStuff() {

		return $this->fundraiser_model->add('1','2');
	}


	public function tests() {

		/*
			Model tests 
		*/
		// addStuff
		$test = $this->addStuff();
		$expected_result = 3;
		$test_name = "testing function addStuff array.value returns 3";
		$this->unit->run($test['value'], $expected_result, $test_name);


		// getFundraisersByAvg
		$test = $this->fundraiser_model->getFundraisersByAvg();
		$test_name = "testing model function getFundraisersByAvg returns an array";
		$this->unit->run($test, 'is_array', $test_name);

		$test = (count($test) > 0);
		$expected_result = true;
		$test_name = "testing model function getFundraisersByAvg has at least one element";
		$this->unit->run($test, $expected_result, $test_name);


		// getFundraisers
		$test = $this->fundraiser_model->getFundraisers();
		$test_name = "testing model function getFundraisers returns an array";
		$this->unit->run($test, 'is_array', $test_name);

		$test = (count($test) > 0);
		$expected_result = true;
		$test_name = "testing model function getFundraisers has at least one element";
		$this->unit->run($test, $expected_result, $test_name);


		// getFundraiser with id 1
		$test = $this->fundraiser_model->getFundraiser(1);
		$test_name = "testing model function getFundraiser with fundraiser_id 1 returns an array";
		$this->unit->run($test, 'is_array', $test_name);

		$test = $this->fundraiser_model->getFundraiser(1);
		$fundraiser_name = $test[0]->fundraiser_name;
		$expected_result = 'Fundraiser 1';
		$test_name = "fundraiser_id 1 should be Fundraiser 1";
		$this->unit->run($fundraiser_name, $expected_result, $test_name);



		//echo var_dump($test);
		echo $this->unit->report();

	}


}
