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

        if($this->m_modules->register() != '1')
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

    public function changepassword()
    {
        $this->load->model('user_model');

        if (!$this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');

        $this->load->view('header');
        $this->load->view('changepass');
        $this->load->view('footer');
    }

    public function edit()
    {
        $this->load->model('user_model');

        if (!$this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');
        $this->load->view('header');
        $this->load->view('edit');
        $this->load->view('footer');
    }


    public function add()
    {
        $this->load->model('user_model');
        if (!$this->user_model->isLoggedIn())
            redirect(base_url(),'refresh');
        $this->load->view('header');
        $this->load->view('add');
        $this->load->view('footer');
    }




}
