<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

    public function login()
    {
        $this->load->model('user_model');

        if ($this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');

        $this->load->view("header");
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function register()
    {
        $this->load->model('user_model');

        if ($this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');

        $this->load->view("header");
        $this->load->view('register');
        $this->load->view('footer');
    }

    public function logout()
    {
        $this->load->model('user_model');
        $this->user_model->isLoggedOut();
    }

    public function settings()
    {
        $this->load->model('user_model');

        if (!$this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');

        $this->load->view("header");
        $this->load->view('ucp');
        $this->load->view('footer');
    }

    public function changepass()
    {
        $this->load->model('user_model');

        if (!$this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');

        $this->load->view('header');
        $this->load->view('changepass');
        $this->load->view('footer');
    }

    public function editaddon()
    {
        $this->load->model('user_model');

        if (!$this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');

        $this->load->view('header');
        $this->load->view('editaddon');
        $this->load->view('footer');
    }



}
