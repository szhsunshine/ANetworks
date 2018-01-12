<?php
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

	$expansion = array(
	1 => 'Classic',
	2 => 'The Burning Crusader',
	3 => 'Wrath of the Lich King',
	4 => 'Cataclysm',
	5 => 'Mist of Pandaría',
	6 => 'Warlords of Draenor',
	7 => 'Legión'
);

	?>
<div class="container">

		<div class="page-header" id="banner">
            <div class="row">
              <div class="col-lg-6">
                <h3>Welcome, Hero of Azeroth!</h3>
              </div>
            </div>
					</div>

					<div class="col-lg-8">
						<div class="panel panel-addons">
							<div class="panel-heading">
								 <?php foreach($this->addon_model->getInformation($idaddon)->result() as $add) { ?>
										<section class="panel-title text-primary">
					              <section class="pull-left" id="id">
														<?= $add->addon_name ?>
														<br/>
														<small> Game Versión :
              								 <?php foreach($this->addon_model->versionSelected($add->addon_version)->result() as $version) { ?>
                                 <?= $version->gameversion ?></small>
                               <?php } ?>
                                 | <small> Uploaded : <?= date('Y-m-d', $add->uploaded); ?> </small>
												</section>
										</section>
							</div>
						  <div class="panel-body panel-body-white">
								<br/>
								<br/>
								<br/>
								<ul class="nav nav-pills">
									<li class="active"><a href="#">Introdution</a></li>
									<li><a href="#" class="text-primary">Screenshots </a></li>
									<li class="disabled"><a href="#">Changelog</a></li>
								</ul>
						  </div>
						</div>


						<div class="panel panel-addons">
						  <div class="panel-body panel-body-white">
									<section class="col-md-12 ">
												<?= $add->addon_description ?>
									</section>
						  </div>
						</div>

</div>




<div class="col-md-4">
	<div class="panel panel-addons">
		<div class="panel-heading">
					<section class="panel-title text-primary">
							<section class="pull-left" id="id">
									+ Information
									<br/>
							</section>
					</section>
		</div>

		<div class="panel-body panel-body-white">
			<br/>
			<br/>

		<table class="table table-striped table-hover ">
				<?php foreach($this->addon_model->getFileId($idaddon)->result() as $size) { ?>
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
				<td><?= $add->addon_uploader ?></td>
			</tr>

			<tr>
				<td>Downloads</td>
				<td><?= $add->downloads ?></td>
			</tr>

			<tr>
				<td>Category</td>
				<td><?= $category[$add->category] ?></td>
			</tr>

			<tr>
				<td>Expansion</td>
				<td><?= $expansion[$add->expansion] ?></td>
			</tr>
		</table>

		<div class="download-info">
			<center>
			<form class="form-horizontal"  method="post">
				<?php if(isset($_POST['button_get']))
					{
						$this->addon_model->download($idaddon);
					} ?>
				<input type="submit" class="btn btn-primary" name="button_get" value="Direct Link #1 " />
			</form>
			</center>
</div>
<?php } ?>
		</div>
	</div>
	</div>


</div>
