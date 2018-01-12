<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

    public function index()
    {
        $this->load->model('user/user_model');
        $this->load->model('admin_model');
        if (!$this->m_data->isLoggedIn())
        redirect(base_url(),'refresh');
        if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
          redirect(base_url(),'refresh');
        $this->load->view('header_admin');
        $this->load->view('dashboard');
        $this->load->view('footer_admin');
    }


    public function news(){

      $this->load->model('user/user_model');
      $this->load->model('admin_model');
      if (!$this->m_data->isLoggedIn())
      redirect(base_url(),'refresh');
      if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
        redirect(base_url(),'refresh');
      $this->load->view('header_admin');
      $this->load->view('news/news');
      $this->load->view('footer_admin');
    }


    public function edit_news($idnews)
    {
      $this->load->model('user/user_model');
      $this->load->model('admin_model');
      if (!$this->m_data->isLoggedIn())
      redirect(base_url(),'refresh');
      if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
        redirect(base_url(),'refresh');
      $edit = array
        ('idnews' => $idnews
      );
      $this->load->view('header_admin');
      $this->load->view('news/editnew', $edit);
      $this->load->view('footer_admin');

    }

    public function create_news()
    {
      $this->load->model('user/user_model');
      $this->load->model('admin_model');
      if (!$this->m_data->isLoggedIn())
      redirect(base_url(),'refresh');
      if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
        redirect(base_url(),'refresh');
      $this->load->view('header_admin');
      $this->load->view('news/create');
      $this->load->view('footer_admin');
    }


    public function version(){

      $this->load->model('user/user_model');
      $this->load->model('admin_model');
      if (!$this->m_data->isLoggedIn())
      redirect(base_url(),'refresh');
      if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
        redirect(base_url(),'refresh');
      $this->load->view('header_admin');
      $this->load->view('version/version');
      $this->load->view('footer_admin');
    }


    public function edit_version($idversion)
    {
      $this->load->model('user/user_model');
      $this->load->model('admin_model');
      if (!$this->m_data->isLoggedIn())
      redirect(base_url(),'refresh');
      if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
        redirect(base_url(),'refresh');
      $versionedit = array
        ('idversion' => $idversion
      );
      $this->load->view('header_admin');
      $this->load->view('version/editversion', $versionedit);
      $this->load->view('footer_admin');

    }

    public function create_version()
    {
      $this->load->model('user/user_model');
      $this->load->model('admin_model');
      if (!$this->m_data->isLoggedIn())
      redirect(base_url(),'refresh');
      if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) != 3)  # Rank for Administrator
        redirect(base_url(),'refresh');
      $this->load->view('header_admin');
      $this->load->view('version/create');
      $this->load->view('footer_admin');
    }





}
