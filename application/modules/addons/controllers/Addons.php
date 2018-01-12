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

    public function view($idaddon)
    {
        $this->load->model('user/user_model');
        $this->load->model('addon_model');

        $addonid = array
        ('idaddon' => $idaddon, );
        $this->load->view('header');
        $this->load->view('view', $addonid);
        $this->load->view('footer');
    }

    public function category($idcategory)
    {

          $this->load->model('user/user_model');
          $this->load->model('addon_model');

          $cat = array
          ('idcategory' => $idcategory, );

          $this->load->view('header');
          $this->load->view('category', $cat);
          $this->load->view('footer');
    }
}
