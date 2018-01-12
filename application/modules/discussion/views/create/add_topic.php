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
      <?php foreach($this->discussion_model->categoryName($idtopic)->result() as $category) { ?>
      <li class="active">Create post in <?= $category->category ?></li>
  </ul>
</section>
<section class="col-lg-2">
<?php if ($this->m_data->isLoggedIn()) { ?>
    <a type="button" class="btn btn-success" href="<?= base_url() ?>forums/topic/create/<?= $category->id ?>" type="button" disabled>Create a new topic</a>
<?php } ?>
<?php } ?>
</section>
</section>
<?php if(isset($_POST['button_send_topic']))
  {
    $msg = $_POST['msg'];
    $title = $_POST['title'];
    $this->discussion_model->addPost($idtopic, $this->session->userdata('ac_sess_username'));
  } ?>

<section class="panel panel-info">
  <br/>
<form class="form-horizontal" method="post">
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Title for your post</label>
      <div class="col-lg-8">
        <input class="form-control" id="inputEmail" name="title" placeholder="Your title" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-8">
        <textarea class="form-control" rows="3" name="msg" id="textArea"></textarea>
        <span class="help-block">Writte post.</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2" align="center">
        <button class="btn btn-default">Go to topic page</button>
        <input type="submit" class="btn btn-primary" name="button_send_topic"  value="Send new topic" />
      </div>
    </div>
  </fieldset>
</form>






</div> <!-- End container -->
