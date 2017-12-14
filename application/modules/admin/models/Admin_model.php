<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function LogData($page, $data)
    {
        $username   = $_SESSION['username'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $time = time();
        $this->db->query("INSERT INTO logs (username, page, data, user_agent, ip, time) VALUES('$username', '$page', '$data', '$user_agent', '$ip_address', '$time')");
    }

    public function isLoggedIn()
    {
        if ($this->session->userdata('username'))
            return true;
        else
            return false;
    }


    public function isAdmin()
    {
      $id = $this->session->userdata('ac_sess_rank');
      return $this->db->query("SELECT permission FROM ac_ranks WHERE id = '".$id."'")->row_array()['permission'];
    }

}
