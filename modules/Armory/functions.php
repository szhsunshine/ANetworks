<?php

function LogData($page, $data)
{
	global $con;

	$username   = $_SESSION['username'];
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$ip_address = $_SERVER['REMOTE_ADDR'];

	$query = $con->prepare('INSERT INTO logs (username, page, data, user_agent, ip, time) VALUES(:username, :page, :data, :user_agent, :ip, :time)');
	$query->execute(array(
		':username'   => $username,
		':page'       => $page,
		':data'       => $data,
		':user_agent' => $user_agent,
		':ip'         => $ip_address,
		':time'       => time()
	));
}

