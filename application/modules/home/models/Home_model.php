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

public function GrabNews()
{
	$page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = $this->config->item('news_results');

	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	$total = $con->prepare('SELECT COUNT(*) FROM news');
	$total->execute();

	$total = $total->fetchColumn();

	$pages = ceil($total / $perPage);

  $data = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT ' . $start .', ' .$perpage");
	$data->execute();

	while($result = $data->fetchAll(PDO::FETCH_ASSOC))
	{
		foreach($result as $row)
		{
			echo '<div class="content-box column small-12">
					<div class="content-box-header column small-12">
						<div class="title-text">
							' . $row['news_title'] . '
						</div>

						<div class="title-date">
							' . $row['post_date'] . '
						</div>
					</div>

					<div class="content-box-content column small-12">
						<div class="content-text">
							' . $row['news_content'] . '
						</div>
					</div>
				</div>';
		}
	}

	echo '<div class="navigation column small-12"><ul class="nav-box">';

		echo '<li><a href="'.base_url().'?page=1"><<</a></li>';


		$min = max($page - 2, 1);
		$max = min($page + 2, $pages);

		for($x = $min; $x <= $max; $x++)
		{
			if(@$page == $x)
			{
				echo '<li><a href="?page=' . $x . '" class="current-nav">' . $x . '</a></li>';
			}
			elseif(@!isset($page))
			{
				echo '<li><a href="?page=' . $x . '" class="current-nav">' . $x . '</a></li>';
			}
			else
			{
				echo '<li><a href="?page=' . $x . '">' . $x . '</a></li>';
			}
		}

		echo '<li><a href="?page=' . $pages . '">>></a></li>';

	echo '</ul></div>';
}


};
