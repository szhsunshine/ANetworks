
<div class="row">
  <div class="content-menu column small-12">
		<div class="content-bar">
			<ul class="usercp-bar">
				<li><a href="settings"><?= $this->lang->line('my_addons'); ?></a></li>
				<li><a href="changepass" class="current-nav"><?= $this->lang->line('change_pass'); ?></a></li>
				<li><a href=""><?= $this->lang->line('upload_addon'); ?></a></li>
			</ul>
		</div>
	</div>

	<div class="content column small-12 medium-7 large-8">
		<div class="content-box column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					Change Password
				</div>
			</div>

			<div class="content-box-content column small-12">
				<div class="content-text">
					<div class="password-change">
						<form method="POST">
							<label>Current Password</label>
							<input type="password" name="oldpassword" />

							<label>New Password</label>
							<input type="password" name="newpassword" />

							<label>Re-Password</label>
							<input type="password" name="repass" />

							<input type="submit" name="changepass" class="small button" value="Confirm" />
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="response-full column small-12">
    <?php if(isset($_POST['changepass']))
           {
             $username = $_SESSION['username'];
             $oldpassword = $_POST['oldpassword'];
             $password = $_POST['newpassword'];
             $repassword= $_POST['repass'];
             $this->user_model->changepass($username, $oldpassword, $password, $repassword);
           } ?>
		</div>
	</div>

  <div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					<?= $this->lang->line('acc_info'); ?>
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="account-info">
		<?php foreach($this->user_model->getAccinfo()->result() as $myacc) { ?>
			<?php $rank = array(
				0 => '<span style="color: #1abc9c;">Leecher</span>',
				1 => '<span class="blue">Uploader</span>',
				2 => '<span class="red">Moderator</span>',
				3 => '<span class="green">Administrator</span>'
			); ?>
					<tr>
						<td><?= $this->lang->line('username'); ?></td>
						<td><?= $myacc->username ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('email'); ?></td>
						<td><?= $myacc->email ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('rank'); ?></td>
						<td><?= $rank[$myacc->access] ?></td>
					</tr>
			<?php } ?>

					<tr>
						<td><?= $this->lang->line('addons'); ?></td>
						<td> <?= $this->user_model->getAccAddons(); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

  <div class="content column small-12 medium-5 large-4">
  		<div class="content-box-sidebar column small-12">
  			<div class="content-box-header column small-12">
  				<div class="title-text">
  					<?= $this->lang->line('Your_upload'); ?>
  				</div>
  			</div>

  			<div class="content-box-content column small-12">
  				<table class="account-info">
  					<tr>
  						<td><?= $this->lang->line('uploaded'); ?></td>
  						<td><?= $this->user_model->getAccAddons(); ?></td>
  					</tr>

  					<tr>
  						<td><?= $this->lang->line('Upload_accepted'); ?></td>
  						<td><?= $this->user_model->acceptedAddon(); ?></td>
  					</tr>

  					<tr>
  						<td><?= $this->lang->line('Upload_declined'); ?></td>
  						<td><?= $this->user_model->declinedAddon(); ?></td>
  					</tr>

  					<tr>
  						<td><?= $this->lang->line('Upload_Pending'); ?></td>
  						<td><?= $this->user_model->pendingAddon(); ?></td>
  					</tr>
  					<tr>
  						<td><?= $this->lang->line('Upload_delete'); ?></td>
  						<td><?= $this->user_model->delAddon(); ?></td>
  					</tr>
  				</table>
  			</div>
  		</div>
  	</div>
  </div>
