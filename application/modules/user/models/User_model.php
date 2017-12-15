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
        $this->db->query("INSERT INTO ac_logs (username, page, data, user_agent, ip, time) VALUES('$username', '$page', '$data', '$user_agent', '$ip_address', '$time')");
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
                            $data = $this->db->query("SELECT * FROM ac_users WHERE username = '$username' OR email = '$email'")->num_rows();

                            if ($data == 0)
                            {
                                $passecure = sha1($password);
                                $time = time();
                                $access = 0;

                                $data1 = $this->db->query("INSERT INTO ac_users (username, email, password, registered, ip) VALUES('$username', '$email', '$passecure', '$time', '$lastip')");

                               if ($data1 == true)
                               {
                                 $data2 = $this->db->query("INSERT INTO ac_ranks (username, permission) VALUES ('$username', 1)");

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
                                } else {

                                   echo '<div class="alert alert-dismissable alert-success">
                                   <button type="button" class="close" data-dismiss="alert">×</button>
                                                       <h4>Error generating permission</h4>
                                                       <p>Redirecting ...</a></p>
                                                   </div>';
                                  echo '<script>
                                  setTimeout(function () {
                                    window.location.href = "login";
                                  }, 3000);
                                  </script>';
                                }
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

    public function getAddons($username)
    {
        return $this->db->query("SELECT * FROM ac_addons WHERE addon_uploader = '$username' AND status != 3");
    }

    public function getAddon($id)
    {
      $username = $this->session->userdata('ac_sess_username');
      return $this->db->query("SELECT * FROM ac_addons WHERE id = '$id' and addon_uploader = '$username'");
    }

    public function getAccAddons($username)
    {
        return $this->db->query("SELECT addon_uploader FROM ac_addons WHERE addon_uploader = '$username'")->num_rows();
    }

    public function acceptedAddon($username)
    {
        return $this->db->query("SELECT status FROM ac_addons WHERE addon_uploader = '$username' AND status = 2")->num_rows();
    }

    public function declinedAddon($username)
    {
        return $this->db->query("SELECT status FROM ac_addons WHERE addon_uploader = '$username' AND status = 1")->num_rows();
    }

    public function pendingAddon($username)
    {
        return $this->db->query("SELECT status FROM ac_addons WHERE addon_uploader = '$username' AND status = 0")->num_rows();
    }

    public function delAddon($username)
    {
        return $this->db->query("SELECT status FROM ac_addons WHERE addon_uploader = '$username' AND status = 3")->num_rows();
    }

    public function getDir($dir)
    {
        switch($dir)
        {
            case 'upload/vanilla':
                return 1;
                break;
            case 'upload/tbc':
                return 2;
                break;
            case 'upload/wtlk':
                return 3;
                break;
            case 'upload/cata':
                return 4;
                break;
            case 'upload/mop':
                return 5;
                break;
            case 'upload/wod':
                return 6;
                break;
            case 'upload/legion':
                return 7;
                break;
        }
    }

    public function deleteAddon($id, $username)
    {
        if (isset($_POST['delete']))
        {
            if (!empty($_POST['id']))
            {
                $id = $_POST['id'];
                $username = $this->session->userdata('ac_sess_username');

                $data = $this->db->query("SELECT * FROM ac_addons WHERE id = '$id' AND addon_uploader = '$username'")->num_rows();

                if ($data == 1)
                {
                    $this->db->query("UPDATE ac_addons SET status = 3 WHERE id = '$id' AND addon_uploader = '$username'");

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

    public function changepass($oldpassword, $password, $repassword)
    {
        $username = $this->session->userdata('ac_sess_username');
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['newpassword'];
        $repassword = $_POST['repass'];
        $oldpassecure = sha1($oldpassword);

        $change = $this->db->query("SELECT * FROM ac_users WHERE username = '$username' AND password = '$oldpassecure'")->num_rows();

        if ($change == 1)
        {
            if ($password == $repassword)
            {
                $pasecure = sha1($password);

                $this->db->query("UPDATE ac_users SET password = '$pasecure' WHERE username = '$username'");

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

    public function editAddon ($id, $name, $version, $description, $expansion, $category)
    {
      $username = $this->session->userdata('ac_sess_username');
      $name = $_POST['addon_name'];
      $version = $_POST['addon_version'];
      $description = $_POST['desc'];
      $expansion = $_POST['expansion'];
      $category = $_POST['category'];
      $time = time();

      if (isset($_POST['edit']))
      {

        $checkPermissions = $this->db->query("SELECT * FROM ac_addons WHERE addon_uploader = '$username' AND id = '$id'")->num_rows();
      if ($checkPermissions == 1)
      {

          $this->db->query("UPDATE ac_addons SET addon_name = '$name', addon_version = '$version', addon_description = '$description',
            category = $category, expansion = $expansion, updated = '$time' WHERE addon_uploader = '$username' AND id = '$id'");

            echo '  <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Edited!</strong> Your addon has been edited.
          </div> ';
          echo '<script>
                setTimeout(function () {
                window.location.href = "settings";
                }, 3000);
            </script>';
      } else {
          echo " <div class='callout alert'>ID Incorrect </div>";
      }

    }else{
      echo '<div class="alert alert-dismissable alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Do not have permissions</strong>
      </div>';

      echo '<script>
            setTimeout(function () {
            window.location.href = "settings";
            }, 3000);
        </script>';
    }
    }

    public function getExternal($id)
    {
        return $this->db->query("SELECT * FROM ac_external_download WHERE addon_id = '$id'");
    }


}
