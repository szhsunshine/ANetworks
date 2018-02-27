<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends MX_Controller {

    public function index()
    {
        $this->load->model('user/user_model');
        $this->load->model('support_model');

        $this->load->view('header');
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function view()
    {
      $this->load->model('user/user_model');
      $this->load->model('support_model');

      $this->load->view('header');
      $this->load->view('view');
      $this->load->view('footer');
    }
}
