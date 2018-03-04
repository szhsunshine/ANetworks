
<br />
<div class="container bg-addons">
<br />
      <nav class="breadcrumb">
      <?php foreach($this->discussion_model->threadById($idlink)->result() as $breadthread) { ?>
          <a class="breadcrumb-item" href="<?= base_url('forums');  ?>">Home </a>
          <?php foreach($this->discussion_model->categoryById($breadthread->id_cat)->result() as $category) { ?>
          <a class="breadcrumb-item" href="<?= base_url('');  ?>forums/topic/<?= $breadthread->id_cat ?>"><?= $category->category ?> </a>
          <?php } ?>
          <a class="breadcrumb-item active" href="#"><?= $breadthread->title ?> </a>
      </nav>
<div class="row col-sm-12">
      <div class="card bg-dark text-white col-sm-9">
        <h5 class="card-header"><?= $breadthread->title ?></h5>
        <div class="card-body">
          <p class="card-text"><?= $breadthread->msg ?></p>
          <br />
        </div>
        <div class="card-footer ">
        <!-- User Sign -->
        <footer class="text-center blockquote-footer">Your Sign</footer>
          <div class="row">
            <div class="col-sm-8">
              <a href="#">#<?= $breadthread->id ?></a>
            </div>

            <div class="col-sm-4 text-right">
              <?= date('Y-m-d', $breadthread->date); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="card bg-default col-sm-3">
        <?php foreach($this->discussion_model->getUsernameID($idlink)->result() as $username) { ?>
              <section class="well">
                <div class="dropdown">
                  <figure>
                    <center>
                      <div class="photo">
                        <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
                      </div>
                    </center>
                  </figure>
                  <center>
                    <a href="#" >
                      <i class="fa fa-user text-primary"></i> <?= $username->username ?> </a>
                    </center>
                   </div>
                       <p class="text-center">Administrator</p>
                       <?php foreach($this->discussion_model->CountPost($breadthread->author)->result() as $post) { ?>
                         <center>
                        <i class="text-info">Posts: <?= $post->post ?> </i>
                      </center>
                     <?php } ?>
                    </section>
              <?php } ?>
      </div>
      <br />

    </div> <!-- End Thread  -->
    <hr>
    <?php if(isset($_POST['button_send_reply']))
      {
        $msg = $_POST['msg'];
        $this->discussion_model->replyPost($idlink, $this->session->userdata('ac_sess_username'), $msg);
      } ?>
    <div class="container comments"><!-- Start comments -->
    		<div class="comment-wrap">
    				<div class="comment-block">
    						<form action="" method="post">
    								<textarea cols="30" rows="3" name="msg" id="textArea" placeholder="Add comment..."></textarea>

                    <div class="col-lg-10 col-lg-offset-2" align="center">
                      <input type="submit" class="btn-primary" name="button_send_reply"  value="Send new reply" />
                    </div>
    						</form>
    				</div>
    		</div>
        <?php
        if(isset($_POST['thanks_reply']))
          {
            $this->discussion_model->thanksPost($idlink, $this->session->userdata('ac_sess_username'));
          }

        if(isset($_POST['report_reply']))
          {
            $msg = $_POST['msg'];
            $this->discussion_model->reportPost($idlink, $this->session->userdata('ac_sess_username'), $msg);
          }

        ?>
<?php foreach($this->discussion_model->getReplies($idlink)->result() as $reply) { ?>

    <div class="comment-wrap">
  				<div class="comment-block bg-dark text-white col-sm-9">
  						<p class="comment-text"><?= $reply->msg ?></p>
  						<div class="bottom-comment">
                  <div class="row">
                    <section class="col-md-8">
        							<div class="comment-date">Publish by <?= $reply->author ?>  at <?= date('j F Y', $reply->date); ?></div>
                    </section>
                    <section class="col-md-4">
                    <form method="post" action="">
                    <input type="hidden" name="msg" value="<?= $reply->msg ?>" />
                    <button class="btn-warning" type="submit" name="thanks_reply"><i class="fa fa-thumbs-up" aria-hidden="true">Thanks</i></button>
                    <input type="hidden" name="msg" value="<?= $reply->msg ?>" />
                    <button class="btn-warning" type="submit" name="report_reply"><i class="fa fa-warning" aria-hidden="true">Report</i></button>
                    </form>
                    </section>
                  </div>
  						</div>
  				</div>
          <div class="photo bg-dark text-white text-center col-sm-4">
              <div class="dl-horizontal text-center">
                  <h4 class="text-warning"><?= $reply->author ?> </h3>
                  <?php foreach($this->discussion_model->CountPost($reply->author)->result() as $reply) { ?>
                  <small> Posts: <?= $reply->post ?> </small>
                  <?php } ?>
                 </div >
          </div>
  		</div>
      <?php } ?>

      <br />
</div><!-- End comments -->


    <?php } ?>


</div> <!-- end page -->
