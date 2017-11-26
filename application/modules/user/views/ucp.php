
<div class="row">
	<div class="content-menu column small-12">
		<div class="content-bar">
			<ul class="usercp-bar">
				<li><a href="" class="current-nav">My Addons</a></li>
				<li><a href="">Change Password</a></li>
				<li><a href="">Upload Addon</a></li>
			</ul>
		</div>
	</div>

	<div class="content column small-12 medium-7 large-8">
	<div class="content-box column small-12">
					<div class="content-box-header column small-12">
						<div class="title-text">
							My Addons
						</div>
					</div>

					<div class="content-box-content column small-12">
						<table class="addons-list">
							<th>Name</th>
							<th>Version</th>
							<th>Expansion</th>
							<th>Updated</th>
							<th>Downloads</th>
							<th>Status</th>
							<th></th>
							<th></th>


					<tr>

						    <?php foreach($this->user_model->getAddons()->result() as $myadons) { ?>
								<td> <?= $myadons->addon_name ?></td>
								<td> <?= $myadons->addon_version ?></td>
								<td> <?= $myadons->expansion ?></td>
								<td> <?= $myadons->updated ?></td>
								<td> <?= $myadons->downloads ?></td>
								<td> <?= $myadons->status ?></td>
								<td><a href="?edit=<?= $myadons->id ?>" title="Edit"><i class="fa fa-pencil yellow" aria-hidden="true"></i></a></td>
								<td><a href="?delete=<?= $myadons->id ?>" title="Delete" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash red" aria-hidden="true"></i></a></td>
							<?php } ?>
					</tr>



				</table>
	</div>

	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					Account Information
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="account-info">
					<tr>
						<td>Username</td>
						<td><?php echo GrabAccountInfo('USERNAME'); ?></td>
					</tr>

					<tr>
						<td>Email</td>
						<td><?php echo GrabAccountInfo('EMAIL'); ?></td>
					</tr>

					<tr>
						<td>Rank</td>
						<td><?php echo GrabAccountInfo('RANK'); ?></td>
					</tr>

					<tr>
						<td>Addons</td>
						<td><?php echo GrabAccountInfo('ADDONS'); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					My Uploads
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="account-info">
					<tr>
						<td>Uploaded</td>
						<td><?php echo GrabAccountInfo('TOTAL'); ?></td>
					</tr>

					<tr>
						<td>Accepted</td>
						<td><?php echo GrabAccountInfo('ACTIVE'); ?></td>
					</tr>

					<tr>
						<td>Declined</td>
						<td><?php echo GrabAccountInfo('DECLINED'); ?></td>
					</tr>

					<tr>
						<td>Pending</td>
						<td><?php echo GrabAccountInfo('PENDING'); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
