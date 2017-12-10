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
														1 => '<p class="text-success">Uploader</span>',
														2 => '<p class="text-Primary">Moderator</span>',
														3 => '<p class="text-Danger">Administrator</span>'
										); ?>
                    <th> <?= $rank[$myacc->permission ] ?> </th>
					<?php } ?>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td> <i class="fa fa-envelope-o" aria-hidden="true"></i> E-Mail</td>
		      <td><?= $this->m_data->getEmailID($this->session->userdata('ac_sess_id')); ?></td>
			      <td>Estado</td>
			      <td>Active</td>
		    </tr>
		  </tbody>
		</table>

</div>


<div class="panel panel-info">



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



</div>
