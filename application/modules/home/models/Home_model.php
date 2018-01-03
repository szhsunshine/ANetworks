<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function getNews()
    {
          return $this->db->query("SELECT * FROM ac_news ORDER BY post_date DESC LIMIT 1");
    }

    public function getIdNews($idnews)
    {
          return $this->db->query("SELECT * FROM ac_news WHERE id = '$idnews' LIMIT 1");
    }


    public function getLastnews()
    {
      return $this->db->query("SELECT * FROM ac_news ORDER BY post_date DESC LIMIT 10");
    }


}
