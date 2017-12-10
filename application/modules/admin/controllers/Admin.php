<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

    public function index()
    {
        $this->load->model('user/user_model');
        $this->load->model('admin_model');

        if (!$this->user_model->isLoggedIn())
        redirect(base_url(),'refresh');
        if ($this->admin_model->isAdmin($this->session->userdata('ac_permisions')) != 1);
        redirect(base_url(),'refresh');
        $this->load->view('header_admin');
        $this->load->view('dashboard');
        $this->load->view('footer_admin');
    }




}
