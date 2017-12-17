<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function isLoggedIn()
    {
        if ($this->session->userdata('username'))
            return true;
        else
            return false;
    }

    public function isAdmin($username)
    {
      return $this->db->query("SELECT permission FROM ac_ranks WHERE username = '$username'")->row_array()['permission'];
    }



}
