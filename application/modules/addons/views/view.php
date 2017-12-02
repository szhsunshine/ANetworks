<?php

	$id = $_GET['id'];
	$expansion = array(
		1 => 'Classic',
		2 => 'The Burning Crusader',
		3 => 'Wrath of the Lich King',
		4 => 'Cataclysm',
		5 => 'Mist of Pandaría',
		6 => 'Warlords of Draenor',
		7 => 'Legión'
	);

	$category = array(
     1 => 'Action Bars',
     2 => 'Chat & Communication',
     3 => 'Artwork',
     4 => 'Auction & Economy',
     5 => 'Audio & Video',
     6 => 'Bags & Inventory',
     7 => 'Boss Encounters',
     8 => 'Buffs & Debuffs',
     9 => 'Class',
     10 => 'Combat',
     11 => 'Guild',
     12 => 'Mail',
     13 => 'Map & Minimap',
     14 => 'Minigames',
     15 => 'Miscellaneous',
     16 => 'Professions',
     17 => 'PvP',
     18 => 'Quests & Leveling',
     19 => 'Roleplay',
     20 => 'Tooltip',
     21 => 'Unitframes'
	);
?>


<?php foreach($this->addon_model->getInformation($id)->result() as $addon) { ?>
<div class="row">
	<div class="content column small-12 medium-7 large-8">
		<div class="content-box column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					<?= $addon->addon_name ?>
				</div>

				<div class="title-date">
					<?= date('j F Y', $addon->uploaded) ?>
				</div>
			</div>

			<div class="content-box-content column small-12">
				<div class="content-text">
					<?= $addon->addon_description ?>
				</div>
			</div>
		</div>
	</div>

	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar border column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					Download Information
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="addons-info">
						<?php foreach($this->addon_model->getFileId($id)->result() as $size) { ?>
					<tr>
						<td>Filename</td>
						<td><?= $size->file_name ?></td>
					</tr>

					<tr>
						<td>Size</td>
						<td><?= $size->file_size ?></td>

					</tr>

						<?php } ?>

					<tr>
						<td>Uploader</td>
						<td><?= $addon->addon_uploader ?></td>
					</tr>

					<tr>
						<td>Downloads</td>
						<td><?= $addon->downloads ?></td>
					</tr>

					<tr>
						<td>Category</td>
						<td><?= $category[$addon->category] ?></td>
					</tr>

					<tr>
						<td>Expansion</td>
						<td><?= $expansion[$addon->expansion] ?></td>
					</tr>
				</table>

				<div class="download-info">
					<center>
						<a href="addons/download?id=" class="small button">DOWNLOAD</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
