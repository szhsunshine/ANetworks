<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-6">
        <h1>Welcome, <?=  $this->session->userdata('ac_sess_username') ?></h1>
        <p class="lead">This is your personal UCP.</p>
      </div>
    </div>
  </div>


<div class="col-md-8">


	<div class="panel panel-info">


    <div class="panel-heading">Your account info</div>
		<table class="table table-striped table-hover ">
		  <thead>
		    <tr>
		      <th><i class="fa fa-user" aria-hidden="true"></i> Nombre de usuario</th>
		      <th><p class="text-primary"><?= $this->m_data->getUsernameID($this->session->userdata('ac_sess_id')); ?></p></th>
					<?php foreach($this->m_data->getRankinfo()->result() as $myacc) {  ?>
			    <th><i class="fa fa-wrench" aria-hidden="true"></i> Rango de cuenta</th>
					<?php $rank = array(
														0 => '<span style="color: #1abc9c;">Leecher</span>',
														1 => '<p class="text-success">Uploader</p>',
														2 => '<p class="text-primary">Moderator</p>',
														3 => '<p class="text-danger">Administrator</p>'
										); ?>
                    <th> <?= $rank[$myacc->permission ] ?> </th>
					<?php } ?>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td> <i class="fa fa-envelope-o" aria-hidden="true"></i> E-Mail</td>
		      <td><?= $this->m_data->getEmailID($this->session->userdata('ac_sess_id')); ?></td>
			      <td><i class="fa fa-shield" aria-hidden="true"></i> Estado</td>
			      <td>Active</td>
		    </tr>
		  </tbody>
		</table>

</div>


<div class="panel panel-info">

  <div class="panel-heading">Add Adddon</div>
  <ul class="nav nav-pills">
    <li><a class="text-primary" href="<?= base_url() ?>ucp"><?= $this->lang->line('my_addons'); ?></a></li>
    <li><a href="<?= base_url() ?>ucp/pass"><?= $this->lang->line('change_pass'); ?></a></li>
    <li class="active"><a href="<?= base_url() ?>ucp/add"><?= $this->lang->line('upload_addon'); ?></a></li>
  </ul>

<br />

<?php
if(isset($_POST['add']))
       {
         $username = $this->session->userdata('ac_sess_username');
         $name = $_POST['addon_name'];
         $version = $_POST['addon_version'];
         $description = $_POST['desc'];
         $category = $_POST['category'];
         $expansion = $_POST['expansion'];
         $file = $_FILES['files'];
				    $max_size = 20971520;
         $this->user_model->addAddon($username, $name, $version, $description, $expansion, $category);
} ?>

<div class="panel-body">
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <fieldset>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2" control-label">Name addon</label>
          <div class="col-lg-12">
          <input class="form-control" name="addon_name" type="text">
          </div>
        </div>


        <div class="form-group">
          <label for="inputEmail" class="col-lg-2" control-label">Game version</label>
            <div class="col-lg-12">
            <input class="form-control" name="addon_version" value="Example 7.2.5" type="text">
            </div>
        </div>

        <div class="form-group">
          <label for="inputEmail" class="col-lg-2" control-label">Descripcion</label>
            <div class="col-lg-12">
            <textarea class="col-lg-12" name="desc">  </textarea>
            </div>
        </div>

        <div class="form-group">
          <label for="inputEmail" class="col-lg-2" control-label">Internal download</label>
            <div class="col-lg-12">
            <input name="files" type="file">
            </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-4" control-label">Select expansion</label>
          <div class="col-lg-8">
            <select class="form-control" name="expansion" id="select">
              <option value="1">Vanilla</option>
              <option value="2">Burning Crusade</option>
              <option value="3">Wrath of the Lich King</option>
              <option value="4">Cataclysm</option>
              <option value="5">Mist of Pandaria</option>
              <option value="6">Warlords of Draenor</option>
              <option value="7">Legion</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-4" control-label">Category</label>
          <div class="col-lg-8">
          <select class="form-control" name="category">
										<option value="1">Action Bars</option>
										<option value="2">Chat & Communication</option>
										<option value="3">Artwork</option>
										<option value="4">Auction & Economy</option>
										<option value="5">Audio & Video</option>
										<option value="6">Bags & Inventory</option>
										<option value="7">Boss Encounters</option>
										<option value="8">Buffs & Debuffs</option>
										<option value="9">Class</option>
										<option value="10">Combat</option>
										<option value="11">Guild</option>
										<option value="12">Mail</option>
										<option value="13">Map & Minimap</option>
										<option value="14">Minigames</option>
										<option value="15">Miscellaneous</option>
										<option value="16">Professions</option>
										<option value="17">PvP</option>
										<option value="18">Quests & Leveling</option>
										<option value="19">Roleplay</option>
										<option value="20">Tooltip</option>
										<option value="21">Unitframes</option>
									</select>
        </div>
      </div>

      <center>
        <input type="submit" class="btn btn-primary" name="add" value="Add addon" />
      </center>
    </fieldset>
    </form>

  </div>

  </div>
</div>
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
