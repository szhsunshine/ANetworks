<div class="container">
  <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
            <h1>Welcome</h1>
          </div>
        </div>
      </div>

  	<div class="row">
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Important!</strong> The forums are in development, they are in an alpha version so several features are disabled.
</div>

<br />
  <section class="row panel-body">
<section class="col-md-10">
      <ul class="breadcrumb">
      <li><a href="<?= base_url();  ?>forums">Home </a></li>
      <?php foreach($this->discussion_model->threadById($idlink)->result() as $breadthread) { ?>
      <li class="active">Reply post in <?= $breadthread->title ?></li>
  </ul>
</section>
<section class="col-lg-2">
<?php if ($this->m_data->isLoggedIn()) { ?>
    <a type="button" class="btn btn-success" href="<?= base_url() ?>forums/topic/create/<?= $breadthread->id_cat ?>" type="button">Create a new topic</a>
<?php } ?>
<?php } ?>
</section>
</section>
<?php if(isset($_POST['button_send_reply']))
  {
    $msg = $_POST['msg'];
    $this->discussion_model->replyPost($idlink, $this->session->userdata('ac_sess_username'));
  } ?>

<section class="panel panel-info">
  <?php foreach($this->discussion_model->getThread($idlink)->result() as $thread) { ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <section class="panel-title">
        You are responding to following content :
        <time class="pull-right">
          <i class="fa fa-calendar"></i> <?= date('j F Y', $thread->date); ?>
        </time>
      </section>
      <br />
    </div>
    <section class="row panel-body">
      <section class="col-md-9">
                  <h2> <i class="fa fa-smile-o"></i> <?= $thread->title ?></h2>
                  <hr>
                  <?= $thread->msg ?>
      </section>
</div>
<?php } ?>
<br/>
<form class="form-horizontal" method="post">
  <fieldset>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Your response</label>
      <div class="col-lg-8">
        <textarea class="form-control" rows="3" name="msg" id="textArea"></textarea>
        <span class="help-block">Writte post.</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2" align="center">
        <button class="btn btn-default">Go to topic page</button>
        <input type="submit" class="btn btn-primary" name="button_send_reply"  value="Send new reply" />
      </div>
    </div>
  </fieldset>
</form>


</section>




</div> <!-- End container -->
