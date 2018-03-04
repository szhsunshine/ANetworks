<!-- Forums display -->


<div class="container bg-addons">
<br />
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Important!</strong> The forums are in development, they are in an alpha version so several features are disabled.
</div>

      <nav class="breadcrumb">
          <a class="breadcrumb-item" href="<?= base_url('forums');  ?>">Home </a>
      </nav>
<br />

<?php if(isset($_POST['button_send_topic']))
  {
    $msg = $_POST['msg'];
    $title = $_POST['title'];
    $this->discussion_model->addPost($idtopic, $this->session->userdata('ac_sess_username'), $msg, $title);
  } ?>
  <br/>

<form class="form-horizontal col-lg-12" method="post">
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-12 control-label">Title for your post</label>
      <div class="col-lg-8">
        <input class="form-control" id="inputEmail" name="title" placeholder="Your title" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-12 control-label">Textarea</label>
      <div class="col-lg-8">
        <textarea class="form-control" rows="3" name="msg" id="textArea"></textarea>
        <span class="help-block">Writte post.</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-12" align="center">
        <input type="submit" class="btn-primary" name="button_send_topic"  value="Send new topic" />
      </div>
    </div>
  </fieldset>
</form>






</div> <!-- End container -->
