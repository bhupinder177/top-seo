<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('common');


	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('profile');
		$this->load->view('footer');
	}

	 public function listing()
	 {
		 $this->load->view('header');
 		 $this->load->view('profile_listing');
 		 $this->load->view('footer');
	 }







}
