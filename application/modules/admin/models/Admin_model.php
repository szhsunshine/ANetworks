<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAddons()
    {
        return $this->db->query("SELECT * FROM ac_addons")->num_rows();
    }

    public function getUsers()
    {
      return $this->db->query("SELECT * FROM ac_users")->num_rows();
    }

    public function getLogs()
    {
      return $this->db->query("SELECT * FROM ac_logs ORDER BY time DESC LIMIT 8");
    }

    public function getLastAddons()
    {
      return $this->db->query("SELECT * FROM ac_addons ORDER BY updated DESC LIMIT 8");
    }

}
