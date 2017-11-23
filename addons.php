<?php

if(!isset($_GET['type']))
{
	die('No page found!');
}

include('header.php');

?>

<div class="row">
	<div class="content column small-12 medium-7 large-8">
	<?php if($_GET['type'] == 'legion'): ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="legion" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Legion
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(7); ?>
					<?php else: ?>
						<?php SearchAddon(7); ?>
					<?php endif; ?>
	<?php elseif($_GET['type'] == 'wod'): ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="wod" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Warlords of Draenor
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(6); ?>
					<?php else: ?>
						<?php SearchAddon(6); ?>
					<?php endif; ?>
					
		<?php elseif($_GET['type'] == 'mop'): ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="mop" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Mist of Pandaria
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(5); ?>
					<?php else: ?>
						<?php SearchAddon(5); ?>
					<?php endif; ?>
		<?php elseif($_GET['type'] == 'cata'): ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="cata" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Cataclysm
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(4); ?>
		<?php else: ?>
						<?php SearchAddon(4); ?>
		<?php endif; ?>
		<?php elseif($_GET['type'] == 'wotlk'): ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="wotlk" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Wrath of the Lich King Addons
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(3); ?>
					<?php else: ?>
						<?php SearchAddon(3); ?>
					<?php endif; ?>
		<?php elseif($_GET['type'] == 'tbc'): ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="tbc" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Burning Crusade Addons
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(2); ?>
					<?php else: ?>
						<?php SearchAddon(2); ?>
					<?php endif; ?>
		<?php else: ?>
			<div class="search-box">
				<form method="GET">
					<input type="hidden" name="type" value="vanilla" />
					<input type="text" name="name" autocomplete="OFF" placeholder="Search for addon.." />
				</form>
			</div>

			<div class="content-box column small-12">
				<div class="content-box-header column small-12">
					<div class="title-text">
						Vanilla Addons
					</div>
				</div>

				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php GrabAddons(1); ?>
					<?php else: ?>
						<?php SearchAddon(1); ?>
					<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					Most Downloaded
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="addons-list">
					<?php if($_GET['type'] == 'legion'): ?>
						<?php GrabMostDownloaded(7); ?>
					<?php elseif($_GET['type'] == 'wod'): ?>
						<?php GrabMostDownloaded(6); ?>
					<?php elseif($_GET['type'] == 'mop'): ?>
						<?php GrabMostDownloaded(5); ?>
					<?php elseif($_GET['type'] == 'cata'): ?>
						<?php GrabMostDownloaded(4); ?>
					<?php elseif($_GET['type'] == 'wotlk'): ?>
						<?php GrabMostDownloaded(3); ?>
					<?php elseif($_GET['type'] == 'tbc'): ?>
						<?php GrabMostDownloaded(2); ?>
					<?php else: ?>
						<?php GrabMostDownloaded(1); ?>
					<?php endif; ?>
				</table>
			</div>
		</div>
	</div>
</div>

<?php

include('footer.php');

?>