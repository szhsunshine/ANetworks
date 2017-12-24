<section class="container">
  <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
            <h1>Welcome</h1>
          </div>
        </div>
      </div>

  	<div class="row">
      <ul class="breadcrumb">
      <li><a href="<?= base_url();  ?>forums">Home </a></li>
      <?php foreach($this->discussion_model->categoryById($idlink)->result() as $category) { ?>
      <li><?= $category->category ?></li>
      <?php } ?>
      <?php foreach($this->discussion_model->threadById($idlink)->result() as $breadthread) { ?>
      <li class="active"><?= $breadthread->title ?></li>
      <?php } ?>
    </ul>
	<section class="row clearfix">
		<section class="col-md-12 column">


          <div class="row clearfix">
		<div class="col-md-12 column">
      <?php foreach($this->discussion_model->getThread($idlink)->result() as $thread) { ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<section class="panel-title">
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
          <section id="user-description" class="col-md-3 ">
      <?php foreach($this->discussion_model->getUsernameID($idlink)->result() as $username) { ?>
            <section class="well">
              <div class="dropdown">
                <center>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cricle"></i> <?= $username->username ?>
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#"><i class="fa fa-code"></i>View all Articles</a></li>
                      <li><a href="#"><i class="fa fa-th-list"></i>View all Posts</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="fa fa-cogs"></i> Manage User (for adminstrator)</a></li>
                    </ul>
                  </center>
                 </div>
                 <figure>
                   <center>
                     <img class="img-rounded img-responsive" src="http://www.webdesignforums.net/img/wdf_avatar.jpg" >
                   </center>
                 </figure>
                 <ul class="dl-horizontal text-center">
                     <li>joined date:15 September 2014</li>
                     <li>Posts: 5000</li>
                     <li>Rank: Administrator</li>
                     <li>Reputacion : Notable</li>
                    </ul>
                  </section>
            <?php } ?>
                </section>
              </section>
				<div class="panel-footer">
          <div class="row">
            <section class="col-md-8 ">
              <i class="fa fa-thumbs-up "></i><a href="#"> Thanks </a>| <i class="fa fa-warning "></i><a href="#"> Report </a>
            </section>
            <section class="col-md-4">
              <span class="fa-stack">
                <i class="fa fa-quote-right fa-stack-1x"></i>
                <i class="fa fa-comment-o fa-lg fa-stack-1x"></i>
              </span>
              <a href="#"> Reply With Quote </a> |
              <i class="fa fa-mail-reply "></i><a href="#"> Reply </a>|
              <i class="fa fa-edit "></i><a href="#"> Edit Post </a>
            </section>
          </div>
        </div>
			</div>
    <?php } ?>
		</div>
	</div>
</section>
</section>


<!-- User responses -->


  <section class="col-md-12 column">


        <div class="row clearfix">
  <div class="col-md-12 column">
    <?php foreach($this->discussion_model->getReplies($idlink)->result() as $reply) { ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <section class="panel-title">
          <time class="pull-right">
            <i class="fa fa-calendar"></i> <?= date('j F Y', $reply->date); ?>
          </time>
          <section class="pull-left" id="id">
            <abbr>#1</abbr>
          </section>
        </section>
        <br />
      </div>
      <section class="row panel-body">
        <section class="col-md-9">
                    <?= $reply->msg ?>
        </section>
        <section id="user-description" class="col-md-3 ">
          <section class="well">
            <div class="dropdown">
              <center>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cricle"></i> <?= $reply->author ?>
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-code"></i>View all Articles</a></li>
                    <li><a href="#"><i class="fa fa-th-list"></i>View all Posts</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-cogs"></i> Manage User (for adminstrator)</a></li>
                  </ul>
                </center>
               </div>
               <ul class="dl-horizontal text-center">
                   <li>joined date:15 September 2014</li>
                   <li>Posts: 5000</li>
                   <li>Rank: Administrator</li>
                   <li>Reputacion : Notable</li>
                  </ul>
                </section>
              </section>
            </section>
      <div class="panel-footer">
        <div class="row">
          <section class="col-md-8 ">
            <i class="fa fa-thumbs-up "></i><a href="#"> Thanks </a>| <i class="fa fa-warning "></i><a href="#"> Report </a>
          </section>
          <section class="col-md-4">
            <i class="fa fa-edit "></i><a href="#"> Edit Post </a>
          </section>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
</div>
</section>
</section>


</section>
