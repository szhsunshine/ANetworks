<div class="container">
  <?php foreach($this->discussion_model->getThread($_GET['thread'])->result() as $thread) { ?>
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
<?php } ?>
<div class="col-lg-4">

  <div class="panel panel-default">
    <div class="panel-body">
  <div class="card hovercard">

               <div class="avatar">
                 <center>
                   Your avatar
                </center>
               </div>
               <div class="info">
                 <center>
                   <div class="title">
                       <h2> Sayghteight </h2>
                   </div>

                   <div class="desc text-primary">Post : 422</div>
                   <div class="desc text-primary">Reply : 422</div>
                   <div class="desc text-danger">Rank : Administrator</div>
                 </center>
               </div>
             </div>
           </div>
</div>

</div>

<div class="col-lg-12">

    <div class="panel panel-default">
      <div class="comments-container">

      <ul id="comments-list" class="comments-list">
        <li>
          <div class="comment-main-level">
              <div class="comment-avatar"><img src="" alt=""></div>
            <div class="comment-box">
              <div class="comment-head">
                <h6 class="comment-name by-author"><a></a></h6>
                <h6 class="comment-name"><a></a></h6>
                <span></span>
                <i class="fa fa-reply"></i>
                <i class="fa fa-heart"></i>
              </div>
              <div class="comment-content">
              </div>
            </div>
          </div>
        </li>
        <br/>
      </ul>
    </div>
</div>
</div>

</div> <!-- End container -->
