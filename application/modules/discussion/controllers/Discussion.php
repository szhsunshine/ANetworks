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

    public function category($idcat)
    {
      $this->load->model('user/user_model');
      $this->load->model('discussion_model');
      $category = array
          ('idcat' => $idcat
        );
      $this->load->view('header');
      $this->load->view('forum', $category);
      $this->load->view('footer');
    }

    public function view($idlink)
    {
        $this->load->model('user/user_model');
        $this->load->model('discussion_model');
        $thread = array
            ('idlink' => $idlink
          );
        $this->load->view('header');
        $this->load->view('thread', $thread);
        $this->load->view('footer');
    }

}
