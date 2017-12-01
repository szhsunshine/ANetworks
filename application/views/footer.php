<div class="row">
	<div class="footer">
		<div class="copyright">
			Copyright &copy; <?php echo date('Y'); ?> <a href="https://github.com/sayghteight/ANetworks">ANetwork Core</a> - All rights reserved.
		</div>
	</div>
</div>

<!-- Javascript Files -->
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100691014-1', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/vendor/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/vendor/what-input.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/vendor/foundation.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/discord-widget/latest/discord-widget.min.js"></script>
<script type="text/javascript">
discordWidget.init({
  serverId: '381298424827478027', // Your id
  title: 'ProjectCMS Discord',
  join: true,
  alphabetical: false,
  theme: 'dark',
  showAllUsers: true,
  allUsersDefaultState: true,
  showNick: false
});
discordWidget.render();
</script>
<script type="text/javascript">
	function nameq()
	{
		var searchTxt = $("input[name='search']").val();

		$.post("ajax/search.php", {search: searchTxt}, function(output) {
			$("#output").html(output);
		});
	}
</script>



</body>
</html>
