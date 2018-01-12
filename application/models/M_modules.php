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

    public function getStatusRegister()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '3'")->row()->status;
    }

    public function getStatusLogin()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '4'")->row()->status;
    }

    public function getStatusNews()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '5'")->row()->status;
    }

    public function getStatusAddons()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '6'")->row()->status;
    }

    public function getStatusDiscussion()
    {
      return $this->db->query("SELECT status FROM ac_modules WHERE id = '7'")->row()->status;
    }
}
