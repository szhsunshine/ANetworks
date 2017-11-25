<?php

class Register extends MX_Controller {


public function index()
{
  $this->load->model('register_model');
  $this->load->view('header');
  $this->load->view('register');
  $this->load->view('footer');
}


};
