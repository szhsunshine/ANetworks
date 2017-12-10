<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getTimestamp()
    {
        $date = new DateTime();
        $date = $date->getTimestamp();
        return $date;
    }

    public function getNews()
    {
        return $this->db->query("SELECT * FROM news");
    }

    public function getLastnews()
    {
      return $this->db->query("SELECT * FROM news ORDER BY post_date DESC LIMIT 10");
    }

    public function getIdNews()
    {
      $id = $_GET['id'];
      return $this->db->query("SELECT * FROM news WHERE id = '$id'");
    }

    public function getComments($id)
    {
      return $this->db->query("SELECT * FROM news_comments WHERE id_new = '$id' ORDER BY date DESC LIMIT 10");
    }

    public function newComment()
    {
      if (isset($_POST['button_send']))
      {
          if (!empty($_POST['text']))
          {
              $username   = $_SESSION['username'];
              $content = $_POST['text'];
              $id = $_POST['id'];
              $time = time();

              $this->db->query("INSERT INTO news_comments (id_new, Nick, date, comment) VALUES('$id', '$username', '$time', '$content')");
          }

    }
  }

    public function totalComments($id)
    {
        return $this->db->query("SELECT * FROM news_comments WHERE id_new = '$id'")->num_rows();
    }
}
