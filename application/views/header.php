<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php foreach($this->m_data->getNameSite()->result() as $site) {  ?>
  <title><?= $site->value ?></title>
  <?php } ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url();  ?>assets/new/style.css">
  <link rel="stylesheet" href="<?= base_url();  ?>assets/new/bootstrap.css" media="screen">
  <link rel="stylesheet" href="<?= base_url();  ?>assets/new/usebootstrap.css">
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
				<a href="" class="navbar-brand">A<font color="orange">Network</font> HUB</a>
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
      <?php if ($this->m_modules->getStatusAddons() == '1') { ?>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Addons <span class="caret"></span></a>
				<ul class="dropdown-menu" aria-labelledby="themes">
					<li><a href="<?= base_url();  ?>addons/1" class="current-sub-nav"> <?= $this->lang->line('exp_classic'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/2" class="current-sub-nav"> <?= $this->lang->line('exp_tbc'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/3" class="current-sub-nav"> <?= $this->lang->line('exp_wtlk'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/4" class="current-sub-nav"> <?= $this->lang->line('exp_cata'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/5" class="current-sub-nav"> <?= $this->lang->line('exp_mop'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/6" class="current-sub-nav"> <?= $this->lang->line('exp_wod'); ?></a></li>
					<li><a href="<?= base_url();  ?>addons/7" class="current-sub-nav"> <?= $this->lang->line('exp_legion'); ?></a></li>
				</ul>
				</li>
      <?php } ?>
				<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Tools <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a href="#">Database</a></li>
								<li><a href="#">Calculator talents</a></li>
								<li><a href="#">Calculator Stats</a></li>
							</ul>
				</li>
				<li>
						<a href="<?= base_url();  ?>forums">Forums</a>
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
