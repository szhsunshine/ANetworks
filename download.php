<?php

include('app/views/html/header.php');
include('app/modules/Home/home.class.php');

?>

<div class="row">
	<div class="download-box">
<!--
		<div class="ad-box">
			<img src="http://via.placeholder.com/600x100">
		</div>
-->

		<div class="download-text">
			Preparing download..
		</div>

<!--
		<div class="ad-box">
			<img src="http://via.placeholder.com/600x100">
		</div>

		<div class="ad-box">
			<img src="http://via.placeholder.com/600x100">
		</div>

		<div class="ad-box">
			<img src="http://via.placeholder.com/600x100">
		</div>
-->

		<?php Download(); ?>
	</div>
</div>

<?php

include('app/views/html/footer.php');

?>