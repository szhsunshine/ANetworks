<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		$this->load->model('user/user_model');
		$this->load->model('home_model');
		
    	$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}


};
