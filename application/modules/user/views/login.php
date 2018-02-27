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

    <div class="col-md-12">
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
            echo 'Error pass';
          }
        } ?>
          <div class="panel-body">
            <form class="form-horizontal" method="post">
              <fieldset>
                <div class="form-group">

                  <label class="sr-only" for="inlineFormInputGroup">Username</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control"  id="inputEmail" placeholder="Username" name="username" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="inlineFormInputGroup">Password</label>
                    <div class="input-group mb-2">
                      <input type="password" class="form-control"  id="inputPassword" placeholder="Password" name="password" type="password">
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



<br />
<br />
<br />

    </div>

        </div>
