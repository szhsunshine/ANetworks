<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
  }




  public function LogData($page, $data)
    {

    	$username   = $_SESSION['username'];
    	$user_agent = $_SERVER['HTTP_USER_AGENT'];
    	$ip_address = $_SERVER['REMOTE_ADDR'];
      $time = time();
      $this->db->query("INSERT INTO logs (username, page, data, user_agent, ip, time) VALUES('$username', '$page', '$data', '$user_agent', '$ip_address', '$time')");

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


        $page = 'Login UserCP';
        $data = 'Logged into UserCP';
        $this->user_model->LogData($page, $data);

				echo '<div class="callout success">Success, logging in..</div>';
				echo '<script>
							setTimeout(function () {
							   window.location.href = "user/settings";
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
											   window.location.href = "user/login";
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

public function getAccinfo(){
    $username = $_SESSION['username'];
    return $this->db->query("SELECT * FROM users WHERE username = '$username'");
}

public function getAccAddons(){
      $username = $_SESSION['username'];
      return $this->db->query("SELECT addon_uploader FROM addons WHERE addon_uploader = '$username'")->num_rows();
}

public function acceptedAddon(){
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 2")->num_rows();
}

public function declinedAddon(){
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 1")->num_rows();
}

public function pendingAddon(){
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 0")->num_rows();
}

public function delAddon(){
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 3")->num_rows();
}

public function deleteAddon($id, $username){

	if(isset($_POST['delete']))
	{
		if(!empty($_POST['id']))
		{

			$id = $_POST['id'];
    		$username = $_SESSION['username'];

    		$data = $this->db->query("SELECT * FROM addons WHERE id = '$id' AND addon_uploader = '$username'")->num_rows();

			if($data == 1)
			{

        $this->db->query("UPDATE addons SET status = 3 WHERE id = '$id' AND addon_uploader = '$username'");

        $page = 'UCP | Addon deleted';
        $data = 'Status set 3';
        $this->user_model->LogData($page, $data);

				echo '<div class="callout success">El addon se ha borrado correctamente.</div>';
				echo '<script>
							setTimeout(function () {
							   window.location.href = "/user/settings";
							}, 3000);
						</script>';
			} else {

				echo '<div class="callout alert">Ha ocurrido un error al editar el addon, intentelo más tarde.</div>';
			}



	}else{
				echo '<div class="callout alert">¡No se ha podido borrar!</div>';
				echo '<script>
							setTimeout(function () {
							   window.location.href = "/user/settings";
							}, 3000);
						</script>';
			}
}

}

};
