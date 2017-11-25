<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
  }

  public function getUser()
  {
    return $this->db->query("SELECT * FROM users");
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



};
