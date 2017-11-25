
<div class="row">
	<div class="content column small-12">
		<div class="input-box">
			<div class="input-box-header">
				Register a new account
			</div>

			<div class="input-box-content">
				<form method="POST">
					<label>Username</label>
					<input type="text" name="username" />

					<label>Email</label>
					<input type="text" name="email" />

					<label>Password</label>
					<input type="password" name="password" />

					<label>Re-Password</label>
					<input type="password" name="re-password" />
<!--
					<center>
						<div class="g-recaptcha" data-sitekey="6LcViC8UAAAAADrFO63pGaX0dZ9ZVAVnVETZv0nh"></div>
					</center>
-->

					<br>

					<center>
						<input type="submit" class="small button" name="register" value="Register" />
					</center>
				</form>
			</div>
		</div>

		<div class="response">
      <?php if(isset($_POST['register']))
        {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $repassword= $_POST['re-password'];
          $email = $_POST['email'];
          $this->register_model->Register($username, $password, $repassword, $email);
        } ?>
		</div>
	</div>
</div>
