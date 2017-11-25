<div class="row">
	<div class="content column small-12">
		<div class="input-box">
			<div class="input-box-header">
				Login | <span class="white">UserCP</span>
			</div>

			<div class="input-box-content">
				<form method="POST">
					<label>Username</label>
					<input type="text" name="username" />

					<label>Password</label>
					<input type="password" name="password" />

					<input type="submit" class="small button" name="button_login" value="Login" />
				</form>
			</div>
		</div>

		<div class="response">
      <?php if(isset($_POST['button_login']))
        {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $this->login_model->Login($username, $password);
        } ?>
		</div>
	</div>
</div>
