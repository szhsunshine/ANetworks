<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    public function Register()
    {
        if (isset($_POST['register']))
        {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['re-password']))
            {
                $username   = $_POST['username'];
                $email      = $_POST['email'];
                $password   = $_POST['password'];
                $repassword = $_POST['re-password'];

                $lastip     = $_SERVER['REMOTE_ADDR'];
                $secret     = '6LcViC8UAAAAADfc0VgbaAcTVEtRpJw3tWrSOWAq';

                if (strlen($username) <= 50)
                {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if ($password == $repassword)
                        {
                            $data = $this->db->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'")->num_rows();

                            if ($data == 0)
                            {
                                $passecure = sha1($password);
                                $time = time();
                                $access = 0;

                                $data = $this->db->query("INSERT INTO users (username, email, password, access, registered, ip) VALUES('$username', '$email', '$passecure', '$access', '$time', '$lastip')");

                                echo '<div class="alert alert-dismissable alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <h4>Register success</h4>
                                                    <p>Redirecting ...</a></p>
                                                </div>';
                                echo '<script>
                                        setTimeout(function () {
                                        window.location.href = "login";
                                        }, 3000);
                                    </script>';
                            }
                            else
                            {
                                echo '<div class="alert alert-dismissable alert-warning">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                      <h4>Warning</h4>
                                      <p>Username or email already used</a>.</p>
                                    </div>';
                            }
                        }
                        else
                        {
                            echo '<div class="alert alert-dismissable alert-warning">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <h4>Warning</h4>
                                  <p>Passwords dont match</a>.</p>
                                </div>';
                        }
                    }
                    else
                    {
                        echo '<div class="alert alert-dismissable alert-warning">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <h4>Warning</h4>
                              <p>Email is not valid</a>.</p>
                            </div>';
                    }
                }
                else
                {
                    echo '<div class="alert alert-dismissable alert-warning">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <h4>Warning</h4>
                          <p>Username is too long</a>.</p>
                        </div>';
                }
            }
            else
            {
                echo '<div class="alert alert-dismissable alert-warning">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <h4>Warning</h4>
                      <p>All fields are required</a>.</p>
                    </div>';
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
        if ($this->session->userdata('ac_sess_username'))
            return true;
        else
            return false;
    }

    public function getAddons()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT * FROM addons WHERE addon_uploader = '$username' AND status != 3");
    }

    public function getAccinfo()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT * FROM users WHERE username = '$username'");
    }

    public function getAccAddons()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT addon_uploader FROM addons WHERE addon_uploader = '$username'")->num_rows();
    }

    public function acceptedAddon()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 2")->num_rows();
    }

    public function declinedAddon()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 1")->num_rows();
    }

    public function pendingAddon()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 0")->num_rows();
    }

    public function delAddon()
    {
        $username = $_SESSION['username'];
        return $this->db->query("SELECT status FROM addons WHERE addon_uploader = '$username' AND status = 3")->num_rows();
    }

    public function deleteAddon($id, $username)
    {
        if (isset($_POST['delete']))
        {
            if (!empty($_POST['id']))
            {
                $id = $_POST['id'];
                $username = $_SESSION['username'];

                $data = $this->db->query("SELECT * FROM addons WHERE id = '$id' AND addon_uploader = '$username'")->num_rows();

                if ($data == 1)
                {
                    $this->db->query("UPDATE addons SET status = 3 WHERE id = '$id' AND addon_uploader = '$username'");

                    $page = 'UCP | Addon deleted';
                    $data = 'Status set 3';
                    $this->user_model->LogData($page, $data);

                    echo "<div class='callout success'>The addon has been deleted correctly</div>";
                    echo '<script>
                            setTimeout(function () {
                            window.location.href = "settings";
                            }, 3000);
                        </script>';
                }
                else
                {
                    echo "<div class='callout alert'>The addon has been deleted correctly</div>";
                }
            }
            else
            {
                echo '<div class="callout alert">An error occurred while delete the addon, try later</div>';
                echo '<script>
                        setTimeout(function () {
                        window.location.href = "settings";
                        }, 3000);
                    </script>';
            }
        }
    }

    public function changepass($username, $oldpassword, $password, $repassword)
    {
        $username = $_SESSION['username'];
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['newpassword'];
        $repassword = $_POST['repass'];
        $oldpassecure = sha1($oldpassword);

        $change = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$oldpassecure'")->num_rows();

        if ($change == 1)
        {
            if ($password == $repassword)
            {
                $pasecure = sha1($password);

                $this->db->query("UPDATE users SET password = '$pasecure' WHERE username = '$username'");

                echo "<div class='callout success'>The password has been changed</div>";
                echo '<script>
                        setTimeout(function () {
                        window.location.href = "settings";
                        }, 3000);
                    </script>';
            }
            else
            {
                echo "<div class='callout alert'>Passwords don`t match</div>";
            }
        }
        else
        {
            echo "<div class='callout alert'>The old pass is incorrected</div>";
            echo '<script>
                    setTimeout(function () {
                    window.location.href = "settings";
                    }, 3000);
                </script>';
        }
    }
}
