
<div class="row">
	<div class="content-menu column small-12">
		<div class="content-bar">
			<ul class="usercp-bar">
				<li><a href="" class="current-nav"><?= $this->lang->line('my_addons'); ?></a></li>
				<li><a href=""><?= $this->lang->line('change_addon'); ?></a></li>
				<li><a href=""><?= $this->lang->line('upload_addon'); ?></a></li>
			</ul>
		</div>
	</div>

	<div class="content column small-12 medium-7 large-8">
	<div class="content-box column small-12">
					<div class="content-box-header column small-12">
						<div class="title-text">
							<?= $this->lang->line('my_addons'); ?>
						</div>
					</div>

					<div class="content-box-content column small-12">
						<table class="addons-list">
							<th><?= $this->lang->line('tab_name'); ?></th>
							<th><?= $this->lang->line('tab_version'); ?></th>
							<th><?= $this->lang->line('tab_expansion'); ?></th>
							<th><?= $this->lang->line('tab_updated'); ?></th>
							<th><?= $this->lang->line('tab_downloads'); ?></th>
							<th><?= $this->lang->line('tab_status'); ?></th>
							<th></th>
							<th></th>



					<?php foreach($this->user_model->getAddons()->result() as $myadons) { ?>
												<?php
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
										<tr>
													<td> <?= $myadons->addon_name ?></td>
													<td> <?= $myadons->addon_version ?></td>
													<td> <?= $type[$myadons->expansion] ?></td>
													<td> <?= $myadons->updated ?></td>
													<td> <?= $myadons->downloads ?></td>
													<td> <?= $myadons->status ?></td>
													<td><a href="user/edit=<?= $myadons->id ?>" title="Edit"><i class="fa fa-pencil yellow" aria-hidden="true"></i></a></td>
													<td><a href="user/delete=<?= $myadons->id ?>" title="Delete" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash red" aria-hidden="true"></i></a></td>

										</tr>
						<?php } ?>


				</table>
	</div>

	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<div class="content-box-header column small-12">
				<div class="title-text">
					<?= $this->lang->line('acc_info'); ?>
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="account-info">
					<tr>
						<td><?= $this->lang->line('username'); ?></td>
						<td><?php echo GrabAccountInfo('USERNAME'); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('email'); ?></td>
						<td><?php echo GrabAccountInfo('EMAIL'); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('rank'); ?></td>
						<td><?php echo GrabAccountInfo('RANK'); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('addons'); ?></td>
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
					<?= $this->lang->line('Your_upload'); ?>
				</div>
			</div>

			<div class="content-box-content column small-12">
				<table class="account-info">
					<tr>
						<td><?= $this->lang->line('uploaded'); ?></td>
						<td><?php echo GrabAccountInfo('TOTAL'); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('Upload_accepted'); ?></td>
						<td><?php echo GrabAccountInfo('ACTIVE'); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('Upload_declined'); ?></td>
						<td><?php echo GrabAccountInfo('DECLINED'); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('Upload_Pending'); ?></td>
						<td><?php echo GrabAccountInfo('PENDING'); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
