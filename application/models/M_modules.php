<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_modules extends CI_Model {


  public function __construct()
  	{
  		parent::__construct();
  	}
  	public function getStatusDiscordExperimental()
  	{
  		return $this->db->query("SELECT status FROM ac_modules WHERE id = '1'")->row()->status;
  	}
  	public function getStatusDiscordClassic()
  	{
  		return $this->db->query("SELECT status FROM ac_modules WHERE id = '2'")->row()->status;
  	}

    public function register()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '3'")->row()->status;
    }

    public function login()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '4'")->row()->status;
    }

    public function comments()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '5'")->row()->status;
    }

    public function addons()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '6'")->row()->status;
    }

}
