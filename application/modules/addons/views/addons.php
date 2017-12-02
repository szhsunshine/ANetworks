

<?php

if(!isset($_GET['type']))
{
	die('No page found!');
}


$type = array(
1 => 'vanilla',
2 => 'tbc',
3 => 'wotlk',
4 => 'cata',
5 => 'mop',
6 => 'wod',
7 => 'legion'
);
$value = $_GET['type'];
?>

	<div class="row">
	<?php if(isset($_GET['type']) && $_GET['type'] ==  'legion'):?>
	<div class="content column small-12 medium-7 large-8">
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
				<table class="addons-list">
					<th>Name</th>
					<th>Version</th>
					<th>Updated</th>
					<th>Downloads</th>
					<th></th>


				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabLegion) { ?>
											<tr>
														<td> <?= $grabLegion->addon_name ?></td>
														<td> <?= $grabLegion->addon_version ?></td>
														<td> <?= $grabLegion->updated ?></td>
														<td> <?= $grabLegion->downloads ?></td>
									 				 <td><a href="download.php?id=<?= $grabLegion->id ?>" class="small button">DOWNLOAD</a></td>
											</tr>
							<?php } ?>
					<?php else: ?>
						<?php
						$type = $_GET['type'];
						$name = $_GET['name'];
 						?>


				<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

					<tr>
				 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
				 <td><?= $search->addon_version ?></td>
				 <td><?= $search->updated ?></td>
				 <td><?= $search->downloads ?></td>
				 <td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
			 </tr>

			 <?php } ?>
					<?php endif; ?>
					</table>
					</div>
	<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'wod'):?>
	<div class="content column small-12 medium-7 large-8">
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
				<table class="addons-list">
					<th>Name</th>
					<th>Version</th>
					<th>Updated</th>
					<th>Downloads</th>
					<th></th>


				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabWod) { ?>

											<tr>
														<td> <?= $grabWod->addon_name ?></td>
														<td> <?= $grabWod->addon_version ?></td>
														<td> <?= $grabWod->updated ?></td>
														<td> <?= $grabWod->downloads ?></td>
									 				 <td><a href="download.php?id=<?= $grabWod->id ?>" class="small button">DOWNLOAD</a></td>
											</tr>

							<?php } ?>
							<?php else: ?>
							<?php
							$name = $_GET['name'];
						 	?>

										<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

									<tr>
										 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
										 <td><?= $search->addon_version ?></td>
										 <td><?= $search->updated ?></td>
										 <td><?= $search->downloads ?></td>
										 <td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
									</tr>

						<?php } ?>
					<?php endif; ?>
					</table>
				</div>


		<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'mop'): ?>
	<div class="content column small-12 medium-7 large-8">
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

				<table class="addons-list">
					<th>Name</th>
					<th>Version</th>
					<th>Updated</th>
					<th>Downloads</th>
					<th></th>


				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabMop) { ?>

											<tr>
														<td> <?= $grabMop->addon_name ?></td>
														<td> <?= $grabMop->addon_version ?></td>
														<td> <?= $grabMop->updated ?></td>
														<td> <?= $grabMop->downloads ?></td>
									 				 <td><a href="download.php?id=<?= $grabMop->id ?>" class="small button">DOWNLOAD</a></td>
											</tr>

							<?php } ?>
					<?php else: ?>
						<?php
						$type = $_GET['type'];
						$name = $_GET['name'];
						?>

					<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

					<tr>
					<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
					<td><?= $search->addon_version ?></td>
					<td><?= $search->updated ?></td>
					<td><?= $search->downloads ?></td>
					<td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
					</tr>

					<?php } ?>
					<?php endif; ?>

					</table>
				</div>
		<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'cata'): ?>
	<div class="content column small-12 medium-7 large-8">
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

				<table class="addons-list">
					<th>Name</th>
					<th>Version</th>
					<th>Updated</th>
					<th>Downloads</th>
					<th></th>


				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabCata) { ?>

											<tr>
														<td> <?= $grabCata->addon_name ?></td>
														<td> <?= $grabCata->addon_version ?></td>
														<td> <?= $grabCata->updated ?></td>
														<td> <?= $grabCata->downloads ?></td>
													 <td><a href="download.php?id=<?= $grabCata->id ?>" class="small button">DOWNLOAD</a></td>
											</tr>

							<?php } ?>
					<?php else: ?>
					<?php
						$type = $_GET['type'];
					$name = $_GET['name'];
					?>

		<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

						<tr>
							<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
							<td><?= $search->addon_version ?></td>
							<td><?= $search->updated ?></td>
							<td><?= $search->downloads ?></td>
							<td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
						</tr>
		<?php } ?>
					<?php endif; ?>

								</table>
							</div>
		<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'wotlk'): ?>
	<div class="content column small-12 medium-7 large-8">
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



				<table class="addons-list">
					<th>Name</th>
					<th>Version</th>
					<th>Updated</th>
					<th>Downloads</th>
					<th></th>


				<div class="content-box-content column small-12">
									<?php if(!isset($_GET['name'])): ?>
										<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabTlk) { ?>

															<tr>
																		<td> <?= $grabTlk->addon_name ?></td>
																		<td> <?= $grabTlk->addon_version ?></td>
																		<td> <?= $grabTlk->updated ?></td>
																		<td> <?= $grabTlk->downloads ?></td>
																	 <td><a href="download.php?id=<?= $grabTlk->id ?>" class="small button">DOWNLOAD</a></td>
																	 </tr>

											<?php } ?>
					<?php else: ?>
						<?php
						$type = $_GET['type'];
						$name = $_GET['name'];
						?>

					<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

					<tr>
					<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
					<td><?= $search->addon_version ?></td>
					<td><?= $search->updated ?></td>
					<td><?= $search->downloads ?></td>
					<td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
					</tr>

					<?php } ?>
					<?php endif; ?>

					</table>
				</div>

		<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'tbc'): ?>
	<div class="content column small-12 medium-7 large-8">
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


				<table class="addons-list">
							<th>Name</th>
							<th>Version</th>
							<th>Updated</th>
							<th>Downloads</th>
							<th></th>
				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabTbc) { ?>
				<tr>
					<td> <?= $grabTbc->addon_name ?></td>
					<td> <?= $grabTbc->addon_version ?></td>
					<td> <?= $grabTbc->updated ?></td>
					<td> <?= $grabTbc->downloads ?></td>
					<td><a href="download.php?id=<?= $grabTbc->id ?>" class="small button">DOWNLOAD</a></td>

							<?php } ?>
					<?php else: ?>
						<?php
						$type = $_GET['type'];
						$name = $_GET['name'];
						?>

					<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

					<tr>
					<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
					<td><?= $search->addon_version ?></td>
					<td><?= $search->updated ?></td>
					<td><?= $search->downloads ?></td>
					<td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
					</tr>

					<?php } ?>
					<?php endif; ?>
					</table>
				</div>
			<?php else: ?>
	<div class="content column small-12 medium-7 large-8">
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

				<table class="addons-list">
							<th>Name</th>
							<th>Version</th>
							<th>Updated</th>
							<th>Downloads</th>
							<th></th>
				<div class="content-box-content column small-12">
					<?php if(!isset($_GET['name'])): ?>
						<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabClassic) { ?>
				<tr>
					<td> <?= $grabClassic->addon_name ?></td>
					<td> <?= $grabClassic->addon_version ?></td>
					<td> <?= $grabClassic->updated ?></td>
					<td> <?= $grabClassic->downloads ?></td>
					<td><a href="download.php?id=<?= $grabClassic->id ?>" class="small button">DOWNLOAD</a></td>
				</tr>
							<?php } ?>
					<?php else: ?>
						<?php
						$type = $_GET['type'];
						$name = $_GET['name'];
						?>
					<?php foreach($this->addon_model->searchAddons($type,$name)->result() as $search) { ?>

					<tr>
					<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
					<td><?= $search->addon_version ?></td>
					<td><?= $search->updated ?></td>
					<td><?= $search->downloads ?></td>
					<td><a href="download.php?id=<?= $search->id ?>" class="small button">DOWNLOAD</a></td>
					</tr>

					<?php } ?>
					<?php endif; ?>
					</table>
				</div>
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

            <?php foreach($this->addon_model->mostDownloadedLegion()->result() as $legion) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $legion->id ?>"><?= $legion->addon_name ?></a></td>
					     <td><?= $legion->downloads ?></td>
				    </tr>
          <?php } ?>

					<?php elseif($_GET['type'] == 'wod'): ?>
            <?php foreach($this->addon_model->mostDownloadedWod()->result() as $wod) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $wod->id ?>"><?= $wod->addon_name ?></a></td>
					     <td><?= $wod->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'mop'): ?>
            <?php foreach($this->addon_model->mostDownloadedMop()->result() as $mop) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $mop->id ?>"><?= $mop->addon_name ?></a></td>
					     <td><?= $mop->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'cata'): ?>
            <?php foreach($this->addon_model->mostDownloadedCata()->result() as $cata) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $cata->id ?>"><?= $cata->addon_name ?></a></td>
					     <td><?= $cata->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'wotlk'): ?>
            <?php foreach($this->addon_model->mostDownloadedTlk()->result() as $tlk) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $tlk->id ?>"><?= $tlk->addon_name ?></a></td>
					     <td><?= $tlk->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php elseif($_GET['type'] == 'tbc'): ?>
            <?php foreach($this->addon_model->mostDownloadedTbc()->result() as $tbc) { ?>
            <tr>
					     <td><a href="view.php?id=<?= $tbc->id ?>"><?= $tbc->addon_name ?></a></td>
					     <td><?= $tbc->downloads ?></td>
				    </tr>
          <?php } ?>
					<?php else: ?>
            <?php foreach($this->addon_model->mostDownloadedClassic()->result() as $classic) { ?>
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
