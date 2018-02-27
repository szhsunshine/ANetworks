<!DOCTYPE html>
<html lang="en">
<head>
  <?php foreach($this->m_data->getNameSite()->result() as $site) {  ?>
  <title><?= $site->value ?></title>
  <?php } ?><meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Games Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
 <!-- <link href="<?= base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
 <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="<?= base_url()?>assets/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- portfolio -->
<link rel="stylesheet" href="<?= base_url()?>assets/css/chocolat.css" type="text/css" media="all">
<!-- //portfolio -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
  <nav class="navbar navbar-expand-lg  text-center navbar-dark bg-dark">
    <a class="navbar-brand" href="#">ANetwork HUB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Addons</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Community
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Forums</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Tools</a>
        </li>
      </ul>

    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <?php if($this->m_data->isLoggedIn()) { ?>

        <li class="nav-item dropdown"><a class="nav-link" href="<?= base_url();  ?>user/settings">My Account</a></li>

        <li class="nav-item dropdown"><a class="nav-link" href="<?= base_url();  ?>user/logout">Logout</a></li>
      <?php }else{ ?>

        <li class="nav-item dropdown"><a class="nav-link" href="<?= base_url();  ?>user/login">Login</a></li>

        <li class="nav-item dropdown"><a class="nav-link" href="<?= base_url();  ?>user/register">Register</a></li>
      <?php } ?>
    </ul>
    </span>
    </div>






  </nav>

<body>
<!--

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
-->
