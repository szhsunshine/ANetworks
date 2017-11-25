<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {


	 public function __construct()
	 {
		parent::__construct();
	 }


// Functions LOGS


public function LogData($page, $data)
{

	$username   = $_SESSION['username'];
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$ip_address = $_SERVER['REMOTE_ADDR'];


  $this->db->query("INSERT INTO logs (username, page, data, user_agent, ip, time) VALUES (:username, :page, :data, :user_agent, :ip, :time)");
  $this->execute(array(
		':username'   => $username,
		':page'       => $page,
		':data'       => $data,
		':user_agent' => $user_agent,
		':ip'         => $ip_address,
		':time'       => time()
	));
}



// Function GrabNews

public function getNews()
{
return $this->db->query("SELECT * FROM news);
}



};
