<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-6">
        <h1>Welcome, <?=  $this->session->userdata('ac_sess_username') ?></h1>
        <p class="lead">This is your personal UCP.</p>
      </div>
    </div>
  </div>


<div class="col-md-8">


	<div class="panel panel-info">


    <div class="panel-heading">Your account info</div>
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th><i class="fa fa-user" aria-hidden="true"></i> Nombre de usuario</th>
		      <th><p class="text-primary"><?= $this->m_data->getUsernameID($this->session->userdata('ac_sess_id')); ?></p></th>
					<?php foreach($this->m_data->getRankinfo()->result() as $myacc) {  ?>
			    <th><i class="fa fa-wrench" aria-hidden="true"></i> Rango de cuenta</th>
					<?php $rank = array(
														0 => '<span style="color: #1abc9c;">Leecher</span>',
														1 => '<p class="text-success">Uploader</p>',
														2 => '<p class="text-primary">Moderator</p>',
														3 => '<p class="text-danger">Administrator</p>'
										); ?>
                    <th> <?= $rank[$myacc->permission ] ?> </th>
					<?php } ?>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td> <i class="fa fa-envelope-o" aria-hidden="true"></i> E-Mail</td>
		      <td><?= $this->m_data->getEmailID($this->session->userdata('ac_sess_id')); ?></td>
			      <td><i class="fa fa-shield" aria-hidden="true"></i> Estado</td>
			      <td>Active</td>
		    </tr>
		  </tbody>
		</table>

</div>


<div class="panel panel-info">


  <div class="panel-heading">Your password</div>
  <ul class="nav nav-pills">
    <li><a href="settings">My addons</a></li>
    <li class="active"><a href="changepassword">Change Password</a></li>
    <li class="disabled"><a href="#">Upload new Addon</a></li>
  </ul>

<br />

<?php if(isset($_POST['changepass']))
       {
         $username = $this->session->userdata['ac_sess_username'];
         $oldpassword = $_POST['oldpassword'];
         $password = $_POST['newpassword'];
         $repassword= $_POST['repass'];
         $this->user_model->changepass($username, $oldpassword, $password, $repassword);
       } ?>

<div class="panel-body">
  <form class="form-horizontal" method="post">
    <fieldset>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2" control-label">Old password  </label>
          <div class="col-lg-12">
          <input class="form-control" id="inputEmail" placeholder="Old password" name="oldpassword" type="password">
          </div>

        </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-12" control-label">Password</label>
        <div class="col-lg-6">
          <input class="form-control" id="inputPassword" placeholder="Password" name="newpassword" type="password">
        </div>
        <div class="col-lg-6">
          <input class="form-control" id="inputPassword" placeholder="Retype your password" name="repass" type="password">
        </div>
      </div>
      <center>
        <input type="submit" class="btn btn-primary" name="changepass" value="Change password" />
      </center>
    </fieldset>
    </form>

  </div>

  </div>
</div>
  <div class="col-md-4">
  	<div class="panel panel-info">

    <div class="panel-heading">Your addons stats</div>
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <tr>
            <th><i class="fa fa-user" aria-hidden="true"></i> <?= $this->lang->line('uploaded'); ?></th>
            <th><?= $this->user_model->getAccAddons($this->session->userdata('ac_sess_username')); ?></th>
          </tr>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td> <i class="fa fa-bell" aria-hidden="true"></i> <?= $this->lang->line('Upload_Pending'); ?></td>
          <td><?= $this->user_model->pendingAddon($this->session->userdata('ac_sess_username')); ?></td>
        </tr>
        <tr>
          <td> <i class="fa fa-check" aria-hidden="true"></i> <?= $this->lang->line('Upload_accepted'); ?></td>
          <td><?= $this->user_model->acceptedAddon($this->session->userdata('ac_sess_username')); ?></td>
        </tr>
        <tr>
          <td> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?= $this->lang->line('Upload_declined'); ?></td>
          <td><?= $this->user_model->declinedAddon($this->session->userdata('ac_sess_username')); ?></td>
        </tr>
        <tr>
          <td> <i class="fa fa-eraser" aria-hidden="true"></i> <?= $this->lang->line('Upload_delete'); ?> </td>
          <td><?= $this->user_model->delAddon($this->session->userdata('ac_sess_username')); ?></td>
        </tr>
      </tbody>
    </table>

  </div>



  </div> <!-- End col-md-8 -->

  </div>
