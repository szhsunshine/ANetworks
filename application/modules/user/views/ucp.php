
<div class="row">
	<div class="content-menu column small-12">
		<div class="content-bar">
			<ul class="usercp-bar">
				<li><a href="" class="current-nav"><?= $this->lang->line('my_addons'); ?></a></li>
				<li><a href=""><?= $this->lang->line('change_pass'); ?></a></li>
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



					<?php foreach($this->user_model->getAddons()->result() as $myaddons) { ?>
												<?php
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
										<tr>
													<td> <?= $myaddons->addon_name ?></td>
													<td> <?= $myaddons->addon_version ?></td>
													<td> <?= $expansion[$myaddons->expansion] ?></td>
													<td> <?= $myaddons->updated ?></td>
													<td> <?= $myaddons->downloads ?></td>
													<td> <?= $myaddons->status ?></td>


			<td><a href="user/edit=<?= $myaddons->id ?>" title="Edit"><i class="fa fa-pencil yellow" aria-hidden="true"></i></a></td>
              <form method="post" action="">
				      <input type="hidden" name="id" value="<?= $myaddons->id ?>" />
           <td> <button class="small button" type="submit" name="delete"><i class="fa fa-trash red" aria-hidden="true"></i></a></td>
			</form>

						<?php } ?>

						<?php if(isset($_POST['delete']))
			        {
        			$id = $_POST['id'];
    				$username = $_SESSION['username'];
			        $this->user_model->deleteAddon($id, $username);
			        } ?>
										</tr>
				</table>
	</div>
</div>
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
		<?php foreach($this->user_model->getAccinfo()->result() as $myacc) { ?>
			<?php $rank = array(
				0 => '<span style="color: #1abc9c;">Leecher</span>',
				1 => '<span class="blue">Uploader</span>',
				2 => '<span class="red">Moderator</span>',
				3 => '<span class="green">Administrator</span>'
			); ?>
					<tr>
						<td><?= $this->lang->line('username'); ?></td>
						<td><?= $myacc->username ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('email'); ?></td>
						<td><?= $myacc->email ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('rank'); ?></td>
						<td><?= $rank[$myacc->access] ?></td>
					</tr>
			<?php } ?>

					<tr>
						<td><?= $this->lang->line('addons'); ?></td>
						<td> <?= $this->user_model->getAccAddons(); ?></td>
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
						<td><?= $this->user_model->getAccAddons(); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('Upload_accepted'); ?></td>
						<td><?= $this->user_model->acceptedAddon(); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('Upload_declined'); ?></td>
						<td><?= $this->user_model->declinedAddon(); ?></td>
					</tr>

					<tr>
						<td><?= $this->lang->line('Upload_Pending'); ?></td>
						<td><?= $this->user_model->pendingAddon(); ?></td>
					</tr>
					<tr>
						<td><?= $this->lang->line('Upload_delete'); ?></td>
						<td><?= $this->user_model->delAddon(); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
