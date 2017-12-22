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

<div class="col-md-8">


	<div class="panel panel-info">


    <div class="panel-heading">Addon information</div>

<?php foreach($this->addon_model->getInformation($id)->result() as $addon) { ?>
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th><i class="fa fa-user" aria-hidden="true"></i> Addon</th>
		      <th><p class="text-primary">	<?= $addon->addon_name ?></p></th>
			    <th><i class="fa fa-wrench" aria-hidden="true"></i> Date</th>
                    <th><small> <?= date('j F Y', $addon->uploaded) ?> </small></th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td> <i class="fa fa-envelope-o" aria-hidden="true"></i> Uploader</td>
		      <td><?= $addon->addon_uploader ?></td>
			      <td><i class="fa fa-shield" aria-hidden="true"></i> Game Versión</td>
			      <td><?= $addon->addon_version ?></td>
		    </tr>
		  </tbody>
		</table>


		<?php } ?>
		<hr>
		<div class="panel panel-default">
  	<div class="panel-heading">Description</div>
  	<div class="panel-body">
				<p><?= $addon->addon_description ?></p>
  	</div>
</div>
</div>

<div class="panel panel-info">


	<div class="panel-heading"> Other links </div>

<?php foreach($this->addon_model->getExternalDownload($id)->result() as $external) { ?>
	<table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th><i class="fa fa-cloud-download" aria-hidden="true"></i> Server external</th>
				<th><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><i class="fa fa-download" aria-hidden="true"></i> <?= $external->external?> </td>
				<td> <?= $external->date?></td>
				<td><a href="<?= $external->url ?>" class="btn btn-primary btn-sm nounderline"><i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD</a></td>
				<?php if ($this->m_data->isLoggedIn()){
				?>
					<td><a href="" class="btn btn-primary btn-sm nounderline"><i class="fa fa-download" aria-hidden="true"></i> Edit</a></td>
				<?php } else { ?>
					<td> </td>
				<?php } ?>
			</tr>
		</tbody>
	</table>


	<?php } ?>
	<br/>
	<center>
		<?php if ($this->m_data->isLoggedIn()){
		?>
				<a href="" class="btn btn-primary btn-sm"><i class="fa fa-external-link-square" aria-hidden="true"></i> Insert external link</a>
		<?php }?>
</center>
<hr>

	</div>
</div> <!-- End col-md-8 -->



<div class="col-md-4">


	<div class="panel panel-info">


    <div class="panel-heading">+ Information</div>

		<table class="table table-striped table-hover ">
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
			<form class="form-horizontal"  method="post">
				<?php if(isset($_POST['button_get']))
					{
						$id = $_GET['id'];
						$this->addon_model->download($id);
					} ?>
				<input type="submit" class="btn btn-primary" name="button_get" value="Direct Link #1 " />
			</form>
			</center>
		</div>

</div>


</div>

</div>
