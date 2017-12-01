<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

}
