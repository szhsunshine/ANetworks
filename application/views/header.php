<html>
<head>
	<title><?= $this->config->item('name'); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="World of Warcraft Private Server HUB for Addons, Databases and Developer tools for creating SQL Queries.">
	<meta name="keywords" content="PrivateDB,Private Server,Addons,Database,wotlk,tbc,vanilla,cata,private addons, private server addons, server addons, wow, world of warcraft, server">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- CSS Stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/foundation.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/font-awesome.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/header.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/content.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/footer.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/fonts.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/colors.css" media="screen" />
</head>
<body>

<div class="top-line">
	<div class="row">
		<div class="header column small-12">
			<div class="header-logo column small-12 medium-2 large-2">
				<a href="<?= base_url(); ?>">
					A<span class="yellow bold">Network</span>
				</a>
			</div>

			<div class="header-menu column show-for-large small-12 large-7">
				<ul class="main-menu dropdown menu" data-dropdown-menu>
					<li><a href="<?= base_url(); ?>"><?= $this->lang->line('menu_news'); ?></a></li>
					<li><a href="#"> ADDONS </a>
						<ul class="menu">
						<li><a href="<?= base_url();  ?>addons.php?type=vanilla" class="current-sub-nav"> <?= $this->lang->line('exp_classic'); ?></a></li>
						<li><a href="<?= base_url();  ?>addons.php?type=tbc" class="current-sub-nav"> <?= $this->lang->line('exp_tbc'); ?></a></li>
						<li><a href="<?= base_url();  ?>addons.php?type=wtlk" class="current-sub-nav"> <?= $this->lang->line('exp_wtlk'); ?></a></li>
						<li><a href="<?= base_url();  ?>addons.php?type=cata" class="current-sub-nav"> <?= $this->lang->line('exp_cata'); ?></a></li>
						<li><a href="<?= base_url();  ?>addons.php?type=mop" class="current-sub-nav"> <?= $this->lang->line('exp_mop'); ?></a></li>
						<li><a href="<?= base_url();  ?>addons.php?type=wod" class="current-sub-nav"> <?= $this->lang->line('exp_wod'); ?></a></li>
						<li><a href="<?= base_url();  ?>addons.php?type=legion" class="current-sub-nav"> <?= $this->lang->line('exp_legion'); ?></a></li>

						</ul>
					</li>
					<li><a href="#"><?= $this->lang->line('menu_database'); ?></a></li>
					<li><a href="#"><?= $this->lang->line('menu_support'); ?></a></li>

				</ul>
			</div>


			<div class="acc-menu column show-for-large small-12 large-3">
				<?php if($this->user_model->isLoggedIn()) { ?>
				<ul class="account-menu2 dropdown menu" data-dropdown-menu>
						<li><a href=""><?= $this->lang->line('my_account'); ?></a>
							<ul class="menu">
								<li><a href="<?= base_url();  ?>user/ucp" class="current-sub-nav"; ?><?= $this->lang->line('my_account'); ?></a></li>
								<li><a href="<?= base_url();  ?>user/logout"><span class="red"><?= $this->lang->line('menu_logout'); ?></span></a></li>
							</ul>
						</li>
					</ul>
	<?php }else{ ?>
			<ul class="account-menu">
				<li><a href="<?= base_url();  ?>user/login" class="current-nav"><?= $this->lang->line('menu_login'); ?></a></li>
				<li><a href="<?= base_url();  ?>user/register" class="current-nav"><?= $this->lang->line('menu_register'); ?></a></li>
			</ul>
<?php } ?>

			</div>

		</div>
	</div>
</div>
