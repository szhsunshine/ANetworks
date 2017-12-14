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

    public function do_upload() {
        $config['upload_path']   = $this->user_model->getDIR($value);
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
           $error = array('error' => $this->upload->display_errors());
           $this->load->view('upload_form', $error);
        }

        else {
           $data = array('upload_data' => $this->upload->data());
           $this->load->view('upload_success', $data);
        }
     }


     public function external_upload() {

     }




}
