<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-6">
        <h1><?= $this->lang->line('welcome'); ?> <?=  $this->session->userdata('ac_sess_username') ?></h1>
        <p class="lead"><?= $this->lang->line('lead_text_addon'); ?></p>
      </div>
    </div>
  </div>


<div class="col-md-8">


	<div class="panel panel-info">


    <div class="panel-heading"><?= $this->lang->line('heading_accinfo'); ?></div>
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th><i class="fa fa-user" aria-hidden="true"></i> <?= $this->lang->line('username'); ?></th>
		      <th><p class="text-primary"><?= $this->m_data->getUsernameID($this->session->userdata('ac_sess_id')); ?></p></th>
			    <th><i class="fa fa-wrench" aria-hidden="true"></i> <?= $this->lang->line('rank'); ?></th>
					<?php $rank = array(
														0 => '<p class="text-success">Leecher</p>',
														1 => '<p class="text-success">Uploader</p>',
														2 => '<p class="text-primary">Moderator</p>',
														3 => '<p class="text-danger">Administrator</p>'
										); ?>
                    <th> <?= $rank[$this->session->userdata('ac_sess_rank') ] ?> </th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td> <i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $this->lang->line('email'); ?></td>
		      <td><?= $this->m_data->getEmailID($this->session->userdata('ac_sess_id')); ?></td>
			      <td><i class="fa fa-shield" aria-hidden="true"></i> <?= $this->lang->line('status'); ?></td>
			      <td>Active</td>
		    </tr>
		  </tbody>
		</table>

</div>

	<div class="panel panel-info">


    <div class="panel-heading"><?= $this->lang->line('my_addons'); ?></div>
    <ul class="nav nav-pills">
      <li class="active"><a href="settings"><?= $this->lang->line('my_addons'); ?></a></li>
      <li><a href="changepassword"><?= $this->lang->line('change_pass'); ?></a></li>
      <li><a href="add"><?= $this->lang->line('acc_info'); ?></a></li>
    </ul>

<br />

    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <tr>
            <th><?= $this->lang->line('tab_name'); ?></th>
            <th><?= $this->lang->line('tab_version'); ?></th>
            <th><?= $this->lang->line('tab_expansion'); ?></th>
            <th><?= $this->lang->line('tab_updated'); ?></th>
            <th><?= $this->lang->line('tab_downloads'); ?></th>
            <th><?= $this->lang->line('tab_status'); ?></th>
          </tr>
        </tr>
      </thead>
      <tbody>


<?php foreach($this->user_model->getAddons($this->session->userdata('ac_sess_username'))->result() as $myaddons) { ?>
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
          <td> <?= date('j F Y', $myaddons->updated) ?></td>
          <td> <?= $myaddons->downloads ?></td>
          <td> <?= $myaddons->status ?></td>

              <td>
                <a class="btn btn-default" href="edit?id=<?= $myaddons->id ?>"><i class="fa fa-pencil yellow" aria-hidden="true"></i></a>
              </td>

              <form method="post" action="">
                  <input type="hidden" name="id" value="<?= $myaddons->id ?>" />
                  <td> <button class="btn btn-default" type="submit" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
              </form>

              						<?php } ?>

              						<?php if(isset($_POST['delete']))
              			        {
                      			$id = $_POST['id'];
                            $username = $this->session->userdata('ac_sess_username');
              			        $this->user_model->deleteAddon($id, $username);
              			        } ?>
        </tr>
      </tbody>
    </table>



</div>

</div> <!-- End col-md-8 -->

<div class="col-md-4">
	<div class="panel panel-info">

  <div class="panel-heading">Your addons stats</div>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <tr>
          <th><i class="fa fa-user" aria-hidden="true"></i> <?= $this->lang->line('uploaded'); ?></th>
          <th><?= $this->user_model->getAccAddons($this->session->userdata('ac_sess_username')); ?></th>
        </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> <i class="fa fa-bell" aria-hidden="true"></i> <?= $this->lang->line('Upload_Pending'); ?></td>
        <td><?= $this->user_model->pendingAddon($this->session->userdata('ac_sess_username')); ?></td>
      </tr>
      <tr>
        <td> <i class="fa fa-check" aria-hidden="true"></i> <?= $this->lang->line('Upload_accepted'); ?></td>
        <td><?= $this->user_model->acceptedAddon($this->session->userdata('ac_sess_username')); ?></td>
      </tr>
      <tr>
        <td> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?= $this->lang->line('Upload_declined'); ?></td>
        <td><?= $this->user_model->declinedAddon($this->session->userdata('ac_sess_username')); ?></td>
      </tr>
      <tr>
        <td> <i class="fa fa-eraser" aria-hidden="true"></i> <?= $this->lang->line('Upload_delete'); ?> </td>
        <td><?= $this->user_model->delAddon($this->session->userdata('ac_sess_username')); ?></td>
      </tr>
    </tbody>
  </table>

</div>



</div> <!-- End col-md-8 -->

</div>
