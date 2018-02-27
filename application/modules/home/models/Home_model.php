<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }




    public function getCount()
    {
    return $this->db->count_all('ac_news');
    }

    public function get_current_page_records($limit, $start)
    {
      $this->db->limit($limit, $start);
      $query = $this->db->order_by('post_date', 'ASC')
      ->get("ac_news");

      if ($query->num_rows() > 0)
      {
          foreach ($query->result() as $row)
          {
              $data[] = $row;
          }

          return $data;
      }

      return false;
  }

    public function getIdNews($idnews)
    {
      $this->db->limit(1);
      $this->db->where('id', $idnews);
      return $this->db->get('ac_news');
    }
}
