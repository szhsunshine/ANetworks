<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    public function index()
    {
        $this->load->model('user/user_model');
        $this->load->model('home_model');

        // load Pagination library
        $this->load->library('pagination');

        // init params
        $params = array();
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->home_model->getCount();

        // load config file
        $this->config->load('pagination', TRUE);
        $settings = $this->config->item('pagination');
        $settings['per_page'] = 4;
        $settings["uri_segment"] = 3;
        $settings['total_rows'] = $this->home_model->getCount();
        $settings['base_url'] = base_url() . 'home/index';

        if ($total_records > 0)
        {
        // get current page records
       $params["result"] = $this->home_model->get_current_page_records($settings['per_page'], $start_index);

        // use the settings to initialize the library
        $this->pagination->initialize($settings);

        // build paging links
          $params["links"] = $this->pagination->create_links();
        }

        $this->load->view('header');
        $this->load->view('home', $params);
        $this->load->view('footer');
    }

    public function news($idnews)
    {
      $this->load->model('user/user_model');
      $this->load->model('home_model');

      $news = array
      ('idnews' => $idnews );
      $this->load->view('header');
      $this->load->view('news', $news);
      $this->load->view('footer');
    }
}
