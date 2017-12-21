<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discussion extends MX_Controller {

    public function index()
    {
        $this->load->model('user/user_model');
        $this->load->model('discussion_model');

        $this->load->view('header');
        $this->load->view('forum');
        $this->load->view('footer');
    }

}
