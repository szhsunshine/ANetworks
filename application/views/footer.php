<!--   Footer   -->
<br />
<footer class="myfooter">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<h4 class="title-widget">Anetwork HUB</h4>
				<p>This project consists of creating a HUB for addons and allowing people to create their own website.</p>

			</div>
			<div class="col-sm-3">
				<h4 class="title-widget">My Account</h4>
				<span class="acount-icon">
	      <?php if($this->m_data->isLoggedIn()) { ?>
					<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> My Addons</a>
					<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> My profile</a>
					<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Forum Settings</a>
					<a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>
					<?php }else{ ?>
						<a href="#"><i class="fa fa-key" aria-hidden="true"></i> Login </a>
						<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Register</a>
					<?php } ?>
				</span>
			</div>
			<div class="col-sm-3">
				<h4 class="title-widget">Top Addons</h4>
				<div class="category">
					<a href="#" class="zoom">men</a>
					<a href="#" class="zoom">women</a>
					<a href="#" class="zoom">boy</a>
					<a href="#" class="zoom">girl</a>
					<a href="#" class="zoom">bag</a>
					<a href="#" class="zoom">teshart</a>
					<a href="#" class="zoom">top</a>
					<a href="#" class="zoom">shos</a>
					<a href="#" class="zoom">glass</a>
					<a href="#" class="zoom">kit</a>
					<a href="#" class="zoom">baby dress</a>
					<a href="#" class="zoom">kurti</a>
				</div>
			</div>
			<div class="col-sm-3">
				<h4 class="title-widget">Social media</h4>
				<p>Follow us in our Social Networks.</p>
				<ul class="social social-circle">
					<li> <a href="#" class="icoFacebook"><i class="fa fa-facebook"></i></a></li>
					<li> <a href="#" class="icoTwitter"> <i class="fa fa-twitter"></i> </a> </li>
					<li> <a href="#" class="icoGoogle"> <i class="fa fa-google-plus"></i> </a> </li>
					<li> <a href="#" class="icoRss"> <i class="fa fa-youtube"></i> </a> </li>
				</ul>
			</div>
		</div>
		<hr>

		<div class="text-white text-center"> © 2018. Designed by Sayghteight | ANetwork CMS</div>
	</div> <!-- ./container -->



	</footer>


	<script src="<?= base_url() ?>assets/js/jarallax.js"></script>
	<script src="<?= base_url() ?>assets/js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<script src="<?= base_url() ?>assets/js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/move-top.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- Tabs-JavaScript -->
	<script src="<?= base_url() ?>assets/js/jquery.filterizr.js"></script>
		<script src="<?= base_url() ?>assets/js/controls.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.filtr-container').filterizr();
			});
		</script>
	<!-- //Tabs-JavaScript -->
	<!-- PopUp-Box-JavaScript -->
		<script src="<?= base_url() ?>assets/js/jquery.chocolat.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.filtr-item a').Chocolat();
			});
		</script>
	<!-- //PopUp-Box-JavaScript -->
</body>
</html>
