<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addons extends MX_Controller {

  public function __construct()
  {
    parent::__construct();

  }

  public function index()
  {
      $this->load->model('user/user_model');
      $this->load->model('addon_model');

      // load Pagination library
      $this->load->library('pagination');

      // init params
      $params = array();
      $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $total_records = $this->addon_model->getCount();

      // load config file
      $this->config->load('pagination', TRUE);
      $settings = $this->config->item('pagination');
      $settings['total_rows'] = $this->addon_model->getCount();
      $settings['per_page'] = 6;
      $settings["uri_segment"] = 3;
      $settings['base_url'] = base_url() . 'addons/index';

      if ($total_records > 0)
      {
      // get current page records
     $params["results"] = $this->addon_model->get_current_page_records($settings['per_page'], $start_index);

      // use the settings to initialize the library
      $this->pagination->initialize($settings);

      // build paging links
        $params["links"] = $this->pagination->create_links();
      }

      $this->load->view('header');
      $this->load->view('addons', $params);
      $this->load->view('footer');
  }

public function select($idexpansion)
{
  /*
    $this->load->model('user/user_model');
    $this->load->model('addon_model');

    $expansion = array
    ('idexpansion' => $idexpansion
    );

    $this->load->view('select', $expansion);
  */

    // load db and model
    $this->load->database();
    $this->load->model('user/user_model');
    $this->load->model('addon_model');


    // Array expansion

    $expansion = array
    ('idexpansion' => $idexpansion
    );

    $this->load->view('header');
    $this->load->view('select', $expansion);
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
