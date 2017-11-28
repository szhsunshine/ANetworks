
<div class="row">
	<div class="content column small-12 medium-7 large-8">
<?

$type = array(
1 => 'vanilla',
2 => 'tbc',
3 => 'wotlk',
4 => 'cata',
5 => 'mop',
6 => 'wod',
7 => 'legion'
);

?>

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

					<?php else: ?>

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

					<?php else: ?>

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

					<?php else: ?>

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

		<?php else: ?>

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

					<?php else: ?>

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

					<?php else: ?>

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

					<?php else: ?>

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

            <?php foreach($this->home_model->mostDownloadedLegion()->result() as $legion) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $legion->id ?>"><?= $legion->addon_name ?></a></td>
					     <td><?= $legion->downloads ?></td>
				    </tr>
          <?php } ?>

					<?php elseif($_GET['type'] == 'wod'): ?>
            <?php foreach($this->home_model->mostDownloadedWod()->result() as $wod) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $wod->id ?>"><?= $wod->addon_name ?></a></td>
					     <td><?= $wod->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'mop'): ?>
            <?php foreach($this->home_model->mostDownloadedMop()->result() as $mop) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $mop->id ?>"><?= $mop->addon_name ?></a></td>
					     <td><?= $mop->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'cata'): ?>
            <?php foreach($this->home_model->mostDownloadedCata()->result() as $cata) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $cata->id ?>"><?= $cata->addon_name ?></a></td>
					     <td><?= $cata->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'wotlk'): ?>
            <?php foreach($this->home_model->mostDownloadedTlk()->result() as $tlk) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $tlk->id ?>"><?= $tlk->addon_name ?></a></td>
					     <td><?= $tlk->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'tbc'): ?>
            <?php foreach($this->home_model->mostDownloadedTbc()->result() as $tbc) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $tbc->id ?>"><?= $tbc->addon_name ?></a></td>
					     <td><?= $tbc->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php else: ?>
            <?php foreach($this->home_model->mostDownloadedClassic()->result() as $classic) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $classic->id ?>"><?= $classic->addon_name ?></a></td>
					     <td><?= $classic->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php endif; ?>
				</table>
			</div>
		</div>
	</div>
</div>
