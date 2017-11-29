<?php

class Addons extends MX_Controller {


	public function index()
	{
		$this->load->model('user/user_model');
		$this->load->model('addon_model');
    $this->load->view('header');
		$this->load->view('addons');
		$this->load->view('footer');
	}
