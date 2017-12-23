
<div class="container">
  <?php foreach($this->discussion_model->getThread($idlink)->result() as $thread) { ?>
  <div class="page-header jumbotron" id="banner">
            <div class="row">
              <div class="col-lg-6">
                <h3><?= $thread->title ?>  </h3>
              </div>
                <div class="col-lg-6">
                  <?php if ($this->m_data->getPermission($this->session->userdata('ac_sess_username')) >= 2)  { ?>
                  <button type="button" class="btn btn-warning btn-block">Block</button>
                  <button type="button" class="btn btn-info btn-block">Edit thread</button>
                  <button type="button" class="btn btn-primary btn-block">Closed thread</button>
                  <?php } else { ?>
                  <!-- User -->
                    <button type="button" class="btn btn-default btn-lg btn-block">Report thread</button>
                  <?php } ?>
                </div>
              </div>
            </div>
  <div class="col-lg-8">
  <div class="panel panel-primary">
    <div class="panel-body">
      <?= $thread->msg ?>
    </div>
    <div class="panel-body">
      <div class="col-lg-4">
        <small> Published by <?= $thread->author ?>  at <?= $thread->date ?>  </small>
      </div>
      <div class="col-lg-8">
        <button type="button" class="btn btn-primary">Send your Reply</button>
      </div>
    </div>
  </div>

</div>
<div class="col-lg-4">

  <div class="panel panel-default">
    <div class="panel-body">
      <div class="card hovercard">

      <?php foreach($this->discussion_model->getUsernameID($idlink)->result() as $username) { ?>
               <div class="avatar">
                 <center>
                   Your avatar
                </center>
               </div>
               <div class="info">
                 <center>
                   <div class="title">
                       <h2> <?= $username->username ?> </h2>
                   </div>

                   <div class="desc text-primary">Post : 422</div>
                   <div class="desc text-primary">Reply : 422</div>
                   <!--- <div class="desc text-primary">Reputation : 1 (<i class="fa fa-plus" aria-hidden="true"></i> / <i class="fa fa-minus" aria-hidden="true"></i>)

                   </div> -->
                  <?php foreach($this->discussion_model->getRanked($idlink)->result() as $perms) { ?>
         					<?php $rank = array(
         														0 => '<div class="desc text-info">Rank : Leecher</div>',
         														1 => '<div class="desc text-success">Rank : Uploader</div>',
         														2 => '<div class="desc text-primary">Rank : Moderator</div>',
         														3 => '<div class="desc text-warning">Rank : Administrator</div>'
         										); ?>
                            <?= $rank[$perms->permission] ?>
                <?php } ?>
                 </center>
               </div>
      <?php } ?>
             </div>
  </div>

</div>

</div>

<div class="col-lg-12">

    <div class="panel panel-default">
      <div class="comments-container">

      <ul id="comments-list" class="comments-list">
     <?php foreach($this->discussion_model->getReplies($idlink)->result() as $replie) { ?>
        <li>
          <div class="comment-main-level">
              <div class="comment-avatar"><img src="" alt=""></div>
            <div class="comment-box">
              <div class="comment-head">
                <?php if($replie->author == $thread->author){ ?>
                <h6 class="comment-name by-author"><a> <?= $replie->author ?> </a></h6>
              <?php } else { ?>
                <h6 class="comment-name"><a> <?= $replie->author ?>  </a></h6>
              <?php } ?>
                <span><?= $replie->date ?> </span>
                <i class="fa fa-reply"></i>
                <i class="fa fa-heart"></i>
              </div>
              <div class="comment-content">
                <?= $replie->msg ?>
              </div>
            </div>
          </div>
        </li>
        <br/>
      <?php } ?>
      </ul>
    </div>
</div>
</div>

<?php } ?>
</div> <!-- End container -->
