<?php

class Login extends MX_Controller {


public function index()
{
  $this->load->model('login_model');
  $this->load->view('header');
  $this->load->view('login');
  $this->load->view('footer');
}


};
