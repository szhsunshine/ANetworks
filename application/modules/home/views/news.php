<?
$id = $_GET['id'];
?>
<div class="container">
  <?php foreach($this->home_model->getIdNews()->result() as $list) { ?>
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-12">
        <h1><?= $list->news_title ?></h1>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-info">

  <div class="panel-body">
    <p align="right"><small><?= date('Y-m-d', $list->post_date);?></small></p>
    <hr>
    <p><?= $list->news_content ?> </p>

    <hr>
    <div class="divider"></div>
    <div class="row">
     <div class="col-xs-6">Created by <?= $list->news_author ?></div>
    </div>
    <br />
    <br />
            <div class="panel-footer">
        			<?php if(isset($_POST['button_send']))
        				{
        					$username = $_SESSION['username'];
        					$content = $_POST['text'];
                  $id = $_POST['id'];
                  $this->home_model->newComment();
        				} ?>
              <?php if ($this->user_model->isLoggedIn()) { ?>
              <form class="form-horizontal"  method="post">
                  <div class="form-group">
  									<input type="hidden" name="id" value="<?= $list->id?>" />
                    <label for="textArea" class="col-lg-4 control-label">Your comment</label>
                    <div class="col-lg-6">
                      <textarea class="form-control" rows="3" name="text" id="textArea"></textarea>
                    </div>
                  </div>

                  <center>
                    <input type="submit" class="btn btn-primary" name="button_send" value="Send comment" />
                  </center>
                </form>
              <?php }else{ ?>
                <div class="alert alert-dismissable alert-warning">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <h4>Not permission</h4>
                      <p>You do not have access to publish, register or login in our page</a>.</p>
                    </div>
              <?php } ?>

                <hr>
                <div class="row">
  <div class="comments-container">

  <ul id="comments-list" class="comments-list">
    <?php foreach($this->home_model->getComments($list->id)->result() as $comment) { ?>
    <li>
      <div class="comment-main-level">
					<div class="comment-avatar"><img src="" alt=""></div>
        <div class="comment-box">
          <div class="comment-head">
            <?php if($comment->Nick == $list->news_author){ ?>
            <h6 class="comment-name by-author"><a><?= $comment->Nick ?></a></h6>
          <?php }else{ ?>
            <h6 class="comment-name"><a><?= $comment->Nick ?></a></h6>
          <?php } ?>
            <span><?= $comment->date ?></span>
            <i class="fa fa-reply"></i>
            <i class="fa fa-heart"></i>
          </div>
          <div class="comment-content">
            <?= $comment->comment ?>
          </div>
        </div>
      </div>
    </li>
    <br/>
    <?php } ?>
  </ul>
</div>
</div>


<?php } ?>
            </div>
    </div>
  </div>
</div>


</div>
</div>
