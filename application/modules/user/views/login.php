<div class="container">


          <div class="page-header" id="banner">
            <div class="row">
              <div class="col-lg-6">
                <h1>Welcome</h1>
                <p class="lead">To a new theme for ANetwork.</p>
              </div>
            </div>
          </div>

<div class="row">

    <div class="col-md-6">
    <div class="panel panel-info">
			<?php if(isset($_POST['button_login']))
				{
					$username = $_POST['username'];
          $password = sha1($_POST['password']);
          
          $id = $this->m_data->getIDAccount($username);
          if ($id == "0")
          echo 'error acc';
          else
          {
            if ($password == $this->m_data->getPasswordAccountID($id))
            {
              $this->m_data->arraySession($id);
            }
            else
            echo $this->m_data->encryptAccount($username, $password).'<br>';
            echo $this->m_data->getPasswordAccountID($id);
          }
        } ?>
          <div class="panel-body">
            <form class="form-horizontal" method="post">
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2" control-label">Username  </label>
                  	<div class="col-lg-12">
                    <input class="form-control" id="inputEmail" placeholder="Username" name="username" type="text">
                  	</div>
                		</div>
                <div class="form-group">
                  <label for="inputPassword" class="col-lg-2" control-label">Password</label>
                  <div class="col-lg-12">
                    <input class="form-control" id="inputPassword" placeholder="Password" name="password" type="password">
                  </div>
                </div>
                <center>
                  <input type="submit" class="btn btn-primary" name="button_login" value="Login" />
                </center>
              </fieldset>
              </form>

            </div>
          </div>

        </div>

              <div class="col-md-6">
              <div class="panel panel-info">
                <div class="panel-body">
                  You do not have an account? It does not matter, you can create an account to share your addons or publish and
                  make yourself known as a new developer.

                  <h3>When creating an account you will have the following advantages:</h3>
                  <ul>
                    <li> Request  be Publisher </li>
                    <li> Add addons of yours or of other people (as long as you give credits) </li>
                    <li> Modify said addons with new revisions. </li>
                    <li> Save your favorite addons and create a list to share with your friends. </li>
                    <li> Participate in our discussion forums.  </li>
                    <li> Share your builds for your character. </li>
                  </ul>
                  <center>
                    <button type="button" href="" class="btn btn-primary">Register</button>
                  </center>
                </div>
              </div>
</div>


    </div>
