<?php
$id = $_GET['id'];
?>
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

  <?php
  foreach($this->user_model->getAddon($id)->result() as $addon) {
  ?>

  <div class="panel-heading">Edit addon | <?= $addon->addon_name ?></div>

<br />

<?php
if(isset($_POST['edit']))
       {
         $name = $_POST['addon_name'];
         $version = $_POST['addon_version'];
         $description = $_POST['desc'];
         $expansion = $_POST['expansion'];
         $category = $_POST['category'];
         $id = $_GET['id'];
         $this->user_model->editAddon($id, $name, $version, $description, $expansion, $category);
       } ?>

<div class="panel-body">
  <form class="form-horizontal" method="post">
    <fieldset>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2" control-label">Name</label>
          <div class="col-lg-12">
          <input class="form-control" name="addon_name" value="<?= $addon->addon_name ?>" type="text">
          </div>
        </div>


        <div class="form-group">
          <label for="inputEmail" class="col-lg-2" control-label">Version</label>
            <div class="col-lg-12">
            <input class="form-control" name="addon_version" value="<?= $addon->addon_version ?>" type="text">
            </div>
        </div>

        <div class="form-group">
          <label for="inputEmail" class="col-lg-2" control-label">Descripcion</label>
            <div class="col-lg-12">
            <textarea class="col-lg-12" name="desc"> <?= $addon->addon_description ?> </textarea>
            </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-4" control-label">Select expansion</label>
          <div class="col-lg-8">
            <select class="form-control" name="expansion" id="select">
              <option <?php if ($addon->expansion == 1 ) echo 'selected' ; ?> value="1">Vanilla</option>
              <option <?php if ($addon->expansion == 2 ) echo 'selected' ; ?> value="2">Burning Crusade</option>
              <option <?php if ($addon->expansion == 3 ) echo 'selected' ; ?> value="3">Wrath of the Lich King</option>
              <option <?php if ($addon->expansion == 4 ) echo 'selected' ; ?> value="4">Cataclysm</option>
              <option <?php if ($addon->expansion == 5 ) echo 'selected' ; ?> value="5">Mist of Pandaria</option>
              <option <?php if ($addon->expansion == 6 ) echo 'selected' ; ?> value="6">Warlords of Draenor</option>
              <option <?php if ($addon->expansion == 7 ) echo 'selected' ; ?> value="7">Legion</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-4" control-label">Category</label>
          <div class="col-lg-8">
          <select class="form-control" name="category">
										<option <?php if ($addon->category == 1 ) echo 'selected' ; ?> value="1">Action Bars</option>
										<option <?php if ($addon->category == 2 ) echo 'selected' ; ?> value="2">Chat & Communication</option>
										<option <?php if ($addon->category == 3 ) echo 'selected' ; ?> value="3">Artwork</option>
										<option <?php if ($addon->category == 4 ) echo 'selected' ; ?> value="4">Auction & Economy</option>
										<option <?php if ($addon->category == 5 ) echo 'selected' ; ?> value="5">Audio & Video</option>
										<option <?php if ($addon->category == 6 ) echo 'selected' ; ?> value="6">Bags & Inventory</option>
										<option <?php if ($addon->category == 7 ) echo 'selected' ; ?> value="7">Boss Encounters</option>
										<option <?php if ($addon->category == 8 ) echo 'selected' ; ?> value="8">Buffs & Debuffs</option>
										<option <?php if ($addon->category == 9 ) echo 'selected' ; ?> value="9">Class</option>
										<option <?php if ($addon->category == 10 ) echo 'selected' ; ?> value="10">Combat</option>
										<option <?php if ($addon->category == 11 ) echo 'selected' ; ?> value="11">Guild</option>
										<option <?php if ($addon->category == 12 ) echo 'selected' ; ?> value="12">Mail</option>
										<option <?php if ($addon->category == 13 ) echo 'selected' ; ?> value="13">Map & Minimap</option>
										<option <?php if ($addon->category == 14 ) echo 'selected' ; ?> value="14">Minigames</option>
										<option <?php if ($addon->category == 15 ) echo 'selected' ; ?> value="15">Miscellaneous</option>
										<option <?php if ($addon->category == 16 ) echo 'selected' ; ?> value="16">Professions</option>
										<option <?php if ($addon->category == 17 ) echo 'selected' ; ?> value="17">PvP</option>
										<option <?php if ($addon->category == 18 ) echo 'selected' ; ?> value="18">Quests & Leveling</option>
										<option <?php if ($addon->category == 19 ) echo 'selected' ; ?> value="19">Roleplay</option>
										<option <?php if ($addon->category == 20 ) echo 'selected' ; ?> value="20">Tooltip</option>
										<option <?php if ($addon->category == 21 ) echo 'selected' ; ?> value="21">Unitframes</option>
									</select>
        </div>
      </div>

      <center>
        <input type="submit" class="btn btn-primary" name="edit" value="Edit addon" />
      </center>
    </fieldset>
    </form>

  </div>

<?php
}
  ?>

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
