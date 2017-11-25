<?php

class Home extends MX_Controller {


	public function index()
	{
		$this->load->model('home_model');
    $this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
