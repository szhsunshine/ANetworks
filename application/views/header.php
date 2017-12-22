<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ANetwork | Create your own web for addons</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url();  ?>assets/new/bootstrap.css" media="screen">
  <link rel="stylesheet" href="<?= base_url();  ?>assets/new/usebootstrap.css">
  <link rel="stylesheet" href="<?= base_url();  ?>assets/new/style.css">
  <script src='<?= base_url(); ?>assets/editor/tinymce/js/tinymce/tinymce.min.js'></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="bootstrap/html5shiv.js"></script>
    <script src="bootstrap/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">
   tinymce.init({
       selector: "textarea"
    });
   </script>
</head>
<body class="bfa">
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="" class="navbar-brand">A<font color="orange">Network</font></a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">

		<ul class="nav navbar-nav">

			<li>
				<a href="<?= base_url();  ?>">Home</a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Addons <span class="caret"></span></a>
				<ul class="dropdown-menu" aria-labelledby="themes">
					<li><a href="<?= base_url();  ?>addons/addons?type=vanilla" class="current-sub-nav"> <?= $this->lang->line('exp_classic'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/addons?type=tbc" class="current-sub-nav"> <?= $this->lang->line('exp_tbc'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/addons?type=wtlk" class="current-sub-nav"> <?= $this->lang->line('exp_wtlk'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/addons?type=cata" class="current-sub-nav"> <?= $this->lang->line('exp_cata'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/addons?type=mop" class="current-sub-nav"> <?= $this->lang->line('exp_mop'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/addons?type=wod" class="current-sub-nav"> <?= $this->lang->line('exp_wod'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/addons?type=legion" class="current-sub-nav"> <?= $this->lang->line('exp_legion'); ?></a></li>
				</ul>
				</li>
				<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Tools <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a href="#">Database</a></li>
								<li><a href="#">Calculator talents</a></li>
								<li><a href="#">Calculator Stats</a></li>
							</ul>
				</li>
				<li>
						<a href="#">Support</a>
				</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
				<?php if($this->m_data->isLoggedIn()) { ?>
					<li><a href="<?= base_url();  ?>user/settings">My Account</a></li>
					<li><a href="<?= base_url();  ?>user/logout">Logout</a></li>
				<?php }else{ ?>
					<li><a href="<?= base_url();  ?>user/login">Login</a></li>
					<li><a href="<?= base_url();  ?>user/register">Register</a></li>
				<?php } ?>
		</ul>

			</div>
		</div>
	</div>
