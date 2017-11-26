<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
  }

public function Login($username, $password)
{
	if(isset($_POST['button_login']))
	{
		if(!empty($_POST['username']) && !empty($_POST['password']))
		{

			$username = $_POST['username'];
			$password = sha1($_POST['password']);

      $data = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'")->num_rows();


			if($data == 1)
			{

				$last_login = time();

        $this->db->query("UPDATE users SET last_login = '$last_login' WHERE username = '$username'");



				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;

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


public function Register()
{
	if(isset($_POST['register']))
	{
		if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['re-password']))
		{

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

              $data = $this->db->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'")->num_rows();


				if($data == 0)
				{
                $passecure = sha1($password);
                $time = time();
                $access = 0;

                $data = $this->db->query("INSERT INTO users (username, email, password, access, registered, ip)
									VALUES('$username', '$email', '$passecure', '$access', '$time', '$lastip')");


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

public function isLoggedOut()
{
    $this->session->sess_destroy();
		redirect(base_url(),'refresh');

}

public function isLoggedIn()
{
	{
    	if ($this->session->userdata('username'))
			return true;
		else
			return false;
    }

}

public function getAddons(){

  $username = $_SESSION['username'];
  return $this->db->query("SELECT * FROM addons WHERE addon_uploader = '$username' AND status != 3");
}

public getAccinfo($id){


    $username = $_SESSION['username'];
    return $this->db->query("SELECT * FROM addons WHERE addon_uploader = '$username' AND status != 3");



}

public function editAddon(){




  	if(isset($_GET['edit']))
    {
        $id = (int)$_GET['edit'];
        return $this->db->query("SELECT * FROM addons WHERE addon_uploader = '$username' AND id = '$id'");
    }

    if(isset($_POST['edit']))
    {

      /* 'UPDATE addons SET addon_name = :name, addon_version = :version, addon_description = :description, category = :category, expansion = :expansion, updated = :time, status = 0 WHERE addon_uploader = :username AND id = :id AND status != 3');*/

      $this->db->query("");


    }
}


};
