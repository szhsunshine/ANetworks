<?php

session_start();

include('app/config/database.php');

if(isset($_GET['logout']))
{
	if($_GET['logout'] == 'true')
	{
		session_start();
		session_destroy();
		header('Location: index.php');
		exit();
	}
}

?>
<html>
<head>
	<title>ANetwork | Your favorites addons for anything game</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="World of Warcraft Private Server HUB for Addons, Databases and Developer tools for creating SQL Queries.">
	<meta name="keywords" content="PrivateDB,Private Server,Addons,Database,wotlk,tbc,vanilla,cata,private addons, private server addons, server addons, wow, world of warcraft, server">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- CSS Stylesheets -->
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/foundation.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/font-awesome.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/main.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/header.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/content.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/footer.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/fonts.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="app/theme/default/css/colors.css" media="screen" />
</head>
<body>

<div class="top-line">
	<div class="row">
		<div class="header column small-12">
			<div class="header-logo column small-12 medium-2 large-2">
				<a href="<?php echo SITE_URL; ?>">
					A<span class="yellow bold">Network</span>
				</a>
			</div>

			<div class="header-menu column show-for-large small-12 large-7">
				<ul class="main-menu dropdown menu" data-dropdown-menu>
					<li><a href="index.php"    <?php echo (basename($_SERVER["PHP_SELF"]) == "index.php" || "")?"class=\"current-nav\"":""; ?>>NEWS</a></li>
					
					<li><a href="#"   <?php echo (basename($_SERVER["PHP_SELF"]) == "addons.php")?"class=\"current-nav\"":""; ?>>ADDONS</a>
						<ul class="menu">
							<li><a href="addons.php?type=vanilla" <?php echo (isset($_GET['type']) && $_GET['type'] == "vanilla")?"class=\"current-sub-nav\"":""; ?>>Vanilla</a></li>
							<li><a href="addons.php?type=tbc"     <?php echo (isset($_GET['type']) && $_GET['type'] == "tbc")?"class=\"current-sub-nav\"":""; ?>>Burning Crusade</a></li>
							<li><a href="addons.php?type=wotlk"   <?php echo (isset($_GET['type']) && $_GET['type'] == "wotlk")?"class=\"current-sub-nav\"":""; ?>>Wrath of the Lich King</a></li>
							<li><a href="addons.php?type=cata"   <?php echo (isset($_GET['type']) && $_GET['type'] == "cata")?"class=\"current-sub-nav\"":""; ?>>Cataclysm</a></li>
							<li><a href="addons.php?type=mop"   <?php echo (isset($_GET['type']) && $_GET['type'] == "mop")?"class=\"current-sub-nav\"":""; ?>>Mist of Pandaria</a></li>
							<li><a href="addons.php?type=wod"   <?php echo (isset($_GET['type']) && $_GET['type'] == "wod")?"class=\"current-sub-nav\"":""; ?>>Warlords of Draenor</a></li>
							<li><a href="addons.php?type=legion"   <?php echo (isset($_GET['type']) && $_GET['type'] == "legion")?"class=\"current-sub-nav\"":""; ?>>Legion</a></li>
						</ul>
					</li>
			<!---
					<li><a href="database.php" <?php echo (basename($_SERVER["PHP_SELF"]) == "database.php")?"class=\"current-nav\"":""; ?>>DATABASE</a></li>
--->
					<li><a href="#"    <?php echo (basename($_SERVER["PHP_SELF"]) == "tools.php")?"class=\"current-nav\"":""; ?>>ARMORY (SOON)</a></li>

				</ul>
			</div>

			<div class="acc-menu column show-for-large small-12 large-3">
				<?php if(!isset($_SESSION['username']) || !isset($_SESSION['password'])): ?>
						<ul class="account-menu">
							<li><a href="login.php" <?php echo (basename($_SERVER["PHP_SELF"]) == "login.php")?"class=\"current-nav\"":""; ?>>LOGIN</a></li>
							<li><a href="register.php" <?php echo (basename($_SERVER["PHP_SELF"]) == "register.php")?"class=\"current-nav\"":""; ?>>REGISTER</a></li>
						</ul>
				<?php else: ?>
					<ul class="account-menu2 dropdown menu" data-dropdown-menu>
						<li><a href="usercp.php" <?php echo (basename($_SERVER["PHP_SELF"]) == "usercp.php" || basename($_SERVER["PHP_SELF"]) == "change_password.php" || basename($_SERVER["PHP_SELF"]) == "upload.php")?"class=\"current-nav\"":""; ?>><?php echo ucfirst($_SESSION['username']); ?></a>
							<ul class="menu">
								<li><a href="usercp.php" <?php echo (basename($_SERVER["PHP_SELF"]) == "usercp.php")?"class=\"current-sub-nav\"":""; ?>>UserCP</a></li>
								<li><a href="?logout=true"><span class="red">Logout</span></a></li>
							</ul>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>