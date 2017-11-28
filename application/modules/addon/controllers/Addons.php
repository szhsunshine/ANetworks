<?php

class Addon extends MX_Controller {


	public function index()
	{
    $this->load->view('header');
		$this->load->view('addons');
		$this->load->view('footer');
	}
