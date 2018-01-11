<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function getNews()
    {
        $this->db->limit(1);
        $this->db->order_by('post_date', 'ASC');
        return $this->db->get('ac_news');
    }

    public function getIdNews($idnews)
    {
      $this->db->limit(1);
      $this->db->where('id', $idnews);
      return $this->db->get('ac_news');
    }

    public function getLastnews()
    {
      $this->db->limit(10);
      $this->db->order_by('post_date', 'ASC');
      return $this->db->get('ac_news');
    }
}
