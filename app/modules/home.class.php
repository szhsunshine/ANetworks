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



function GrabNews()
{
	global $con;

	$page    = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = NEWS_RESULTS;

	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	$total = $con->prepare('SELECT COUNT(*) FROM news');
	$total->execute();

	$total = $total->fetchColumn();

	$pages = ceil($total / $perPage);

	$data = $con->prepare('SELECT * FROM news ORDER BY id DESC LIMIT ' . $start . ', ' . $perPage);
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

		echo '<li><a href="?page=1"><<</a></li>';

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



function Register()
{
	if(isset($_POST['register']))
	{
		if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['re-password']))
		{
			global $con;

			$username   = $_POST['username'];
			$email      = $_POST['email'];
			$password   = $_POST['password'];
			$repassword = $_POST['re-password'];

			$lastip     = $_SERVER['REMOTE_ADDR'];
			// $captcha    = $_POST['g-recaptcha-response'];
			$secret     = '6LcViC8UAAAAADfc0VgbaAcTVEtRpJw3tWrSOWAq';

			if(strlen($username) <= 50)
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					// $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $lastip);
					// $decode   = json_decode($response, true);

					if(intval($decode['success']) == 0)
					{
						if($password == $repassword)
						{
							$data = $con->prepare('SELECT COUNT(*) FROM users WHERE username = :username OR email = :email');
							$data->execute(array(
								':username' => $username,
								':email'    => $email
							));

							if($data->fetchColumn() == 0)
							{
								$data = $con->prepare('INSERT INTO users (username, email, password, access, registered, ip) 
									VALUES(:username, :email, :password, :access, :registered, :ip)');
								$data->execute(array(
									':username'   => $username,
									':email'      => $email,
									':password'   => sha1($password),
									':access'     => 0,
									':registered' => time(),
									':ip'         => $lastip
								));

								echo '<div class="callout success">Success, Redirecting..</div>';
								echo '<script>
											setTimeout(function () {
											   window.location.href = "login.php";
											}, 3000);
										</script>';
							}
							else
							{
								echo '<div class="callout alert">Username or email already in use!</div>';
							}
						}
						else
						{
							echo '<div class="callout alert">Passwords dont match!</div>';
						}
					}
					else
					{
						echo '<div class="callout alert">Captcha was wrong!</div>';
					}
				}
				else
				{
					echo '<div class="callout alert">Email is not valid!</div>';
				}
			}
			else
			{
				echo '<div class="callout alert">Username is too long!</div>';
			}
		}
		else
		{
			echo '<div class="callout alert">All fields are required!</div>';
		}
	}
}

function Login()
{
	if(isset($_POST['login']))
	{
		if(!empty($_POST['username']) && !empty($_POST['password']))
		{
			global $con;

			$username = $_POST['username'];
			$password = sha1($_POST['password']);

			$data = $con->prepare('SELECT COUNT(*) FROM users WHERE username = :username AND password = :password');
			$data->execute(array(
				':username' => $username,
				':password' => $password
			));

			if($data->fetchColumn() == 1)
			{
				$data = $con->prepare('UPDATE users SET last_login = :last_login WHERE username = :username');
				$data->execute(array(
					':last_login' => time(),
					':username'   => $username
				));

				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;

				LogData('Login UserCP', 'Logged into UserCP');
				
				echo '<div class="callout success">Success, logging in..</div>';
				echo '<script>
							setTimeout(function () {
							   window.location.href = "usercp.php";
							}, 3000);
						</script>';
			}
			else
			{
				echo '<div class="callout alert">Wrong username or password!</div>';
			}
		}
		else
		{
			echo '<div class="callout alert">Please fill in all fields!</div>';
		}
	}
}


function GrabAccountInfo($type)
{
	global $con;

	$username = $_SESSION['username'];

	switch($type)
	{
		case 'USERNAME':
			return ucfirst($username);
		break;

		case 'EMAIL':
			$data = $con->prepare('SELECT * FROM users WHERE username = :username');
			$data->execute(array(
				':username' => $username
			));

			$result = $data->fetchAll(PDO::FETCH_ASSOC);

			foreach($result as $row)
			{
				return $row['email'];
			}
		break;

		case 'RANK':
			$access = array(
				0 => '<span style="color: #1abc9c;">Leecher</span>',
				1 => '<span class="blue">Uploader</span>',
				2 => '<span class="red">Moderator</span>',
				3 => '<span class="green">Administrator</span>'
			);

			$data = $con->prepare('SELECT * FROM users WHERE username = :username');
			$data->execute(array(
				':username' => $username
			));

			$result = $data->fetchAll(PDO::FETCH_ASSOC);

			foreach($result as $row)
			{
				return $access[$row['access']];
			}
		break;

		case 'ADDONS':
			$data = $con->prepare('SELECT COUNT(*) FROM addons WHERE addon_uploader = :username AND status = 2');
			$data->execute(array(
				':username' => $username
			));

			return $data->fetchColumn();
		break;

		case 'TOTAL':
			$data = $con->prepare('SELECT COUNT(*) FROM addons WHERE addon_uploader = :username AND status != 3');
			$data->execute(array(
				':username' => $username
			));

			return $data->fetchColumn();
		break;

		case 'PENDING':
			$data = $con->prepare('SELECT COUNT(*) FROM addons WHERE addon_uploader = :username AND status = 0');
			$data->execute(array(
				':username' => $username
			));

			return $data->fetchColumn();
		break;

		case 'ACTIVE':
			$data = $con->prepare('SELECT COUNT(*) FROM addons WHERE addon_uploader = :username AND status = 2');
			$data->execute(array(
				':username' => $username
			));

			return $data->fetchColumn();
		break;

		case 'DECLINED':
			$data = $con->prepare('SELECT COUNT(*) FROM addons WHERE addon_uploader = :username AND status = 1');
			$data->execute(array(
				':username' => $username
			));

			return $data->fetchColumn();
		break;
	}
}

function isLoggedOut()
{
	if(!isset($_SESSION['username']))
	{
		if(!isset($_SESSION['password']))
		{
			header('Location: login.php');
			exit();
		}

		header('Location: login.php');
		exit();
	}
}

function isLoggedIn()
{
	if(isset($_SESSION['username']))
	{
		if(isset($_SESSION['password']))
		{
			header('Location: usercp.php');
			exit();
		}

		header('Location: usercp.php');
		exit();
	}
}

function ChangePassword()
{
	if(isset($_POST['change']))
	{
		if(!empty($_POST['oldpassword']) && !empty($_POST['newpassword']) && !empty($_POST['re-password']))
		{
			global $con;

			$username    = $_SESSION['username'];
			$oldpassword = sha1($_POST['oldpassword']);
			$newpassword = sha1($_POST['newpassword']);
			$repassword  = sha1($_POST['re-password']);

			$data = $con->prepare('SELECT COUNT(*) FROM users WHERE username = :username');
			$data->execute(array(
				':username' => $username
			));

			if($data->fetchColumn() == 1)
			{
				$data = $con->prepare('SELECT * FROM users WHERE username = :username');
				$data->execute(array(
					':username' => $username
				));

				$result = $data->fetchAll(PDO::FETCH_ASSOC);

				foreach($result as $row)
				{
					if($oldpassword == $row['password'])
					{
						if($newpassword == $repassword)
						{
							$data = $con->prepare('UPDATE users SET password = :password WHERE username = :username');
							$data->execute(array(
								':username' => $username,
								':password' => $newpassword
							));

							echo '<div class="callout success">Password has been changed!</div>';
						}
						else
						{
							echo '<div class="callout alert">Passwords doesn\'t match!</div>';
						}
					}
					else
					{
						echo '<div class="callout alert">Current password doesn\'t match!</div>';
					}
				}
			}
			else
			{
				header('Location: index.php');
			}
		}
		else
		{
			echo '<div class="callout alert">Please fill in all fields!</div>';
		}
	}
}
