

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



        <div class="container">


          <div class="page-header" id="banner">
            <div class="row">
              <div class="col-lg-6">
                <h3>Welcome, Hero of Azeroth!</h3>
                <blockquote>
                <p>You have to forget me, Tirion! If the world is to live free from the tyranny of fear, it must not know what has happened here today.</p>
                <small>- Bolvar Fordragón</small>
                </blockquote>
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-md-8">

				<?php if(isset($_GET['type']) && $_GET['type'] ==  'legion'):?>
          <div class="panel panel-info">
            <div class="panel-heading">Legion</div>
          <form class="form-horizontal" method="GET">
            <fieldset>
              <div class="form-group">
                <div class="col-lg-12">
									<input type="hidden" name="type" value="legion" />
                  <input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
                </div>
              </div>
            </fieldset>
          </form>
          <div class="panel-body">
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Version</th>
									<th>Updated</th>
                  <th>Downloads</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
								<?php if(!isset($_GET['name'])): ?>
									<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabLegion) { ?>
														<tr>
																	<td> <?= $grabLegion->addon_name ?></td>
																	<td> <?= $grabLegion->addon_version ?></td>
																	<td> <?= date('j F Y', $grabLegion->updated) ?></td>
																	<td> <?= $grabLegion->downloads ?></td>
																 <td><a href="view?id=<?= $grabLegion->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
														</tr>
										<?php } ?>
								<?php else: ?>

								<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>

								<tr>
							 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
							 <td><?= $search->addon_version ?></td>
							 <td><?= date('j F Y', $search->updated) ?></td>
							 <td><?= $search->downloads ?></td>
							 <td><a href="view?id=id=<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
						 </tr>

						 <?php } ?>
								<?php endif; ?>

              </tbody>
            </table>

          </div>

          </div>
						<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'wod'):?>
							<div class="panel panel-info">
								<div class="panel-heading">Warlords of Draenor</div>
							<form class="form-horizontal" method="GET">
								<fieldset>
									<div class="form-group">
										<div class="col-lg-12">
											<input type="hidden" name="type" value="wod" />
											<input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
										</div>
									</div>
								</fieldset>
							</form>
							<div class="panel-body">
								<table class="table table-striped table-hover ">
									<thead>
										<tr>
											<th>Name</th>
											<th>Version</th>
											<th>Updated</th>
											<th>Downloads</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php if(!isset($_GET['name'])): ?>
											<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabWod) { ?>
																		<tr>
																					<td> <?= $grabWod->addon_name ?></td>
																					<td> <?= $grabWod->addon_version ?></td>
																					<td> <?= date('j F Y', $grabWod->updated) ?></td>
																					<td> <?= $grabWod->downloads ?></td>
																				 <td><a href="view?id==<?= $grabWod->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																		</tr>

														<?php } ?>
														<?php else: ?>

												<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>

																<tr>
																	 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
																	 <td><?= $search->addon_version ?></td>
																	 <td><?= date('j F Y', $search->updated) ?></td>
																	 <td><?= $search->downloads ?></td>
																	 <td><a href="view?id==<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																</tr>

													<?php } ?>
												<?php endif; ?>

									</tbody>
								</table>

							</div>

							</div>
						<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'mop'): ?>
									<div class="panel panel-info">
											<div class="panel-heading">Mist of Pandaria</div>
										<form class="form-horizontal" method="GET">
											<fieldset>
												<div class="form-group">
													<div class="col-lg-12">
														<input type="hidden" name="type" value="mop" />
														<input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
													</div>
												</div>
											</fieldset>
										</form>
										<div class="panel-body">
											<table class="table table-striped table-hover ">
												<thead>
													<tr>
														<th>Name</th>
														<th>Version</th>
														<th>Updated</th>
														<th>Downloads</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php if(!isset($_GET['name'])): ?>
														<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabMop) { ?>
																					<tr>
																								<td> <?= $grabMop->addon_name ?></td>
																								<td> <?= $grabMop->addon_version ?></td>
																								<td> <?= date('j F Y', $grabMop->updated) ?></td>
																								<td> <?= $grabMop->downloads ?></td>
																							 <td><a href="view?id==<?= $grabMop->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																					</tr>
																	<?php } ?>
																	<?php else: ?>
															<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>
																			<tr>
																				 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
																				 <td><?= $search->addon_version ?></td>
																				 <td><?= date('j F Y', $search->updated) ?></td>
																				 <td><?= $search->downloads ?></td>
																				 <td><a href="view?id==<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																			</tr>

																<?php } ?>
															<?php endif; ?>
												</tbody>
											</table>
										</div>
								</div>
						<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'cata'): ?>
							<div class="panel panel-info">
									<div class="panel-heading">Cataclysm</div>
								<form class="form-horizontal" method="GET">
									<fieldset>
										<div class="form-group">
											<div class="col-lg-12">
												<input type="hidden" name="type" value="cata" />
												<input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
											</div>
										</div>
									</fieldset>
								</form>
								<div class="panel-body">
									<table class="table table-striped table-hover ">
										<thead>
											<tr>
												<th>Name</th>
												<th>Version</th>
												<th>Updated</th>
												<th>Downloads</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php if(!isset($_GET['name'])): ?>
												<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabCata) { ?>
																			<tr>
																						<td> <?= $grabCata->addon_name ?></td>
																						<td> <?= $grabCata->addon_version ?></td>
																						<td> <?= date('j F Y', $grabCata->updated) ?></td>
																						<td> <?= $grabCata->downloads ?></td>
																					 <td><a href="view?id==<?= $grabCata->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																			</tr>
															<?php } ?>
															<?php else: ?>
													<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>
																	<tr>
																		 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
																		 <td><?= $search->addon_version ?></td>
																		 <td><?= date('j F Y', $search->updated) ?></td>
																		 <td><?= $search->downloads ?></td>
																		 <td><a href="view?id==<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																	</tr>

														<?php } ?>
													<?php endif; ?>
										</tbody>
									</table>
								</div>
						</div>
								<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'wtlk'): ?>
									<div class="panel panel-info">
											<div class="panel-heading">Wrath of the Lich King</div>
										<form class="form-horizontal" method="GET">
											<fieldset>
												<div class="form-group">
													<div class="col-lg-12">
														<input type="hidden" name="type" value="wtlk" />
														<input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
													</div>
												</div>
											</fieldset>
										</form>
										<div class="panel-body">
											<table class="table table-striped table-hover ">
												<thead>
													<tr>
														<th>Name</th>
														<th>Version</th>
														<th>Updated</th>
														<th>Downloads</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php if(!isset($_GET['name'])): ?>
														<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabTlk) { ?>
																					<tr>
																								<td> <?= $grabTlk->addon_name ?></td>
																								<td> <?= $grabTlk->addon_version ?></td>
																								<td> <?= date('j F Y', $grabTlk->updated) ?></td>
																								<td> <?= $grabTlk->downloads ?></td>
																							 <td><a href="view?id==<?= $grabTlk->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																					</tr>
																	<?php } ?>
																	<?php else: ?>
															<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>
																			<tr>
																				 <td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
																				 <td><?= $search->addon_version ?></td>
																				 <td><?= date('j F Y', $search->updated) ?></td>
																				 <td><?= $search->downloads ?></td>
																				 <td><a href="view?id==<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
																			</tr>

																<?php } ?>
															<?php endif; ?>
												</tbody>
											</table>
										</div>
								</div>
							<?php elseif(isset($_GET['type']) && $_GET['type'] ==  'tbc'): ?>
								<div class="panel panel-info">
									<div class="panel-heading">The burning Crusade</div>
									<form class="form-horizontal" method="GET">
										<fieldset>
											<div class="form-group">
												<div class="col-lg-12">
													<input type="hidden" name="type" value="tbc" />
													<input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
												</div>
											</div>
										</fieldset>
									</form>

									<div class="panel-body">
											<table class="table table-striped table-hover ">
												<thead>
													<tr>
														<th>Name</th>
														<th>Version</th>
														<th>Updated</th>
														<th>Downloads</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php if(!isset($_GET['name'])): ?>
														<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabTbc) { ?>
															<tr>
																<td> <?= $grabTbc->addon_name ?></td>
																<td> <?= $grabTbc->addon_version ?></td>
																<td> <?= date('j F Y', $grabTbc->updated) ?></td>
																<td> <?= $grabTbc->downloads ?></td>
																<td><a href="view?id==<?= $grabTbc->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
															</tr>
														<?php } ?>
													<?php else: ?>
														<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>
															<tr>
																<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
																 <td><?= $search->addon_version ?></td>
																 <td><?= date('j F Y', $search->updated) ?></td>
																 <td><?= $search->downloads ?></td>
																 <td><a href="view?id==<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
															 </tr>
														 <?php } ?>
													 <?php endif; ?>
												 </tbody>
											 </table>
										 </div>
									 </div>
								 <?php else: ?>
									 <div class="panel panel-info">
	 									<div class="panel-heading">Vanilla</div>
	 									<form class="form-horizontal" method="GET">
	 										<fieldset>
	 											<div class="form-group">
	 												<div class="col-lg-12">
														<input type="hidden" name="type" value="vanilla" />
	 													<input class="form-control" id="inputEmail" name="name" placeholder="Search addon ...." type="text">
	 												</div>
	 											</div>
	 										</fieldset>
	 									</form>

	 									<div class="panel-body">
	 											<table class="table table-striped table-hover ">
	 												<thead>
	 													<tr>
	 														<th>Name</th>
	 														<th>Version</th>
	 														<th>Updated</th>
	 														<th>Downloads</th>
	 														<th></th>
	 													</tr>
	 												</thead>
	 												<tbody>
	 													<?php if(!isset($_GET['name'])): ?>
	 														<?php foreach($this->addon_model->grabExpansion($this->addon_model->getExpansion($value))->result() as $grabClassic) { ?>
	 															<tr>
	 																<td> <?= $grabClassic->addon_name ?></td>
	 																<td> <?= $grabClassic->addon_version ?></td>
	 																<td> <?= date('j F Y', $grabClassic->updated) ?></td>
	 																<td> <?= $grabClassic->downloads ?></td>
	 																<td><a href="view?id==<?= $grabClassic->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
	 															</tr>
	 														<?php } ?>
	 													<?php else: ?>
	 														<?php foreach($this->addon_model->searchAddons($this->addon_model->getExpansion($value))->result() as $search) { ?>
	 															<tr>
	 																<td><a href="view.php?id=<?= $search->id ?>"><?= $search->addon_name ?></a></td>
	 																 <td><?= $search->addon_version ?></td>
	 																 <td><?= date('j F Y', $search->updated) ?></td>
	 																 <td><?= $search->downloads ?></td>
	 																 <td><a href="view?id==<?= $search->id ?>" class="btn btn-primary btn-sm">DOWNLOAD</a></td>
	 															 </tr>
	 														 <?php } ?>
	 													 <?php endif; ?>
	 												 </tbody>
	 											 </table>
	 										 </div>
	 									 </div>

										 <?php endif; ?>
				</div>

				<div class="col-md-4">

		            <div class="panel panel-default">
		            <div class="panel-heading">Most downloaded</div>
		            <div class="panel-body">
									<?php if($_GET['type'] == 'legion'): ?>
										<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $legion) { ?>
		              <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
		                      <li><a href="view?id=<?= $legion->id ?>"><?= $legion->addon_name ?> <small>(<?= $legion->downloads ?>)</small></a></li>
		              </ul>
									<?php } ?>
								<?php elseif($_GET['type'] == 'wod'): ?>
										<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $wod) { ?>
											<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
															<li><a href="view?id=<?= $wod->id ?>"><?= $wod->addon_name ?> <small>(<?= $wod->downloads ?>)</small></a></li>
											</ul>
								<?php } ?>
							<?php elseif($_GET['type'] == 'mop'): ?>
									<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $mop) { ?>
										<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
											<li><a href="view?id=<?= $mop->id ?>"><?= $mop->addon_name ?> <small>(<?= $mop->downloads ?>)</small></a></li>
										</ul>
								<?php } ?>
							<?php elseif($_GET['type'] == 'cata'): ?>
									<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $cata) { ?>
										<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
											<li><a href="view?id=<?= $cata->id ?>"><?= $cata->addon_name ?> <small>(<?= $cata->downloads ?>)</small></a></li>
										</ul>
								<?php } ?>
							<?php elseif($_GET['type'] == 'wtlk'): ?>
									<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $wtlk) { ?>
										<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
											<li><a href="view?id=<?= $wtlk->id ?>"><?= $wtlk->addon_name ?> <small>(<?= $wtlk->downloads ?>)</small></a></li>
										</ul>
								<?php } ?>

							<?php elseif($_GET['type'] == 'tbc'): ?>
									<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $tbc) { ?>
										<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
											<li><a href="view?id=<?= $tbc->id ?>"><?= $tbc->addon_name ?> <small>(<?= $tbc->downloads ?>)</small></a></li>
										</ul>
								<?php } ?>
							<?php else: ?>
								<?php foreach($this->addon_model->mostDownloaded($this->addon_model->getExpansion($value))->result() as $classic) { ?>
									<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
										<li><a href="view?id=<?= $classic->id ?>"><?= $classic->addon_name ?> <small>(<?= $classic->downloads ?>)</small></a></li>
									</ul>
          <?php } ?>
<?php endif; ?>
		            </div>
		            </div>
		        </div>



</div>
