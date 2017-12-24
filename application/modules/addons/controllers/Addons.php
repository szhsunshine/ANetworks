<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addons extends MX_Controller {

    public function index($idexpansion)
    {
        $this->load->model('user/user_model');
        $this->load->model('addon_model');


        $expansion = array
        ('idexpansion' => $idexpansion
        );

        $this->load->view('header');
        $this->load->view('addons', $expansion);
        $this->load->view('footer');
    }

    public function view()
    {
        $this->load->model('user/user_model');
        $this->load->model('addon_model');

        $this->load->view('header');
        $this->load->view('view');
        $this->load->view('footer');
    }
}
