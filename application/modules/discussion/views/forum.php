<div class="container">
  <br/>
  	<div class="row">
      <ul class="breadcrumb">
      <li class="active"><?= $this->lang->line('menu_home') ?> </li>
    </ul>

<div class="col-lg-9">
<?php foreach($this->discussion_model->getCategoryFather()->result() as $category) { ?>
    <section class="panel panel-primary">
        <header class="panel-heading">
          <h4><?= $category->category ?></h4>
        </header>
        <?php foreach($this->discussion_model->getCategorys($category->id)->result() as $cat) { ?>
        <section class="row panel-body">
        <section class="col-md-6">
          <h4> <a href="forums/topic/<?= $cat->id ?>"><i class="fa fa-th-list text-primary"> <?= $cat->category ?>  </i> </h4>
          <h6> <?= $cat->description ?> </h6></a>
        </section>
        <section class="col-md-2">
          <small class"nounderline">
          <strong><?= $this->discussion_model->counThreads($cat->id); ?></strong>
          Post created
          </small>
        </section>
        <section class="col-md-3">
          <?php foreach($this->discussion_model->lastPost($cat->id)->result() as $lastpost) { ?>
          <small> <a href="forums/thread/<?= $lastpost->id ?>"><i class="fa fa-link"> </i> <?= substr($lastpost->title, 0, 30) ?> </a></small><br/>
          <a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $lastpost->author ?> </a><br/>
          <a class"nounderline"><i class="fa fa-calendar text-primary"></i> <?= date('Y-m-d', $lastpost->date);?></a>
        <?php } ?>
        </section>
      </section>
      <hr>
    <?php } ?>
    </section>
  <?php } ?>

  <section class="panel panel-default">
      <header class="panel-heading">
        <h4> Who's online? </h4>
      </header>
      <section class="row panel-body">
      <?php foreach($this->discussion_model->isOnline()->result() as $online) { ?>
          <center> <?= $online->username ?> </center>
      <?php } ?>
      </section>
      <section class="panel-footer">
          Groups
      </section>
  </section>


</div> <!-- End Col lg 8 -->


<div class="col-lg-3">
  <section class="panel panel-default">
      <header class="panel-heading">
        <center>
        <h4> User profile </h4>
      </center>
      </header>
      <section class="row panel-body">
      <?php foreach($this->discussion_model->userRanked()->result() as $rank) { ?>
        <center>
        <h5> Username</h5>
        <small> <?= $rank->username ?></small>
        <h5> Group</h5>
        <small> <?= $rank->group ?></small>
        <h5> Post </h5>
        <small> <?= $rank->post ?>  </small>
        <hr>
        <a href="">[Profile]</a> | <a href="">[Logout]</a>
        </center>

      </section>
      <?php } ?>
  </section>

  <section class="panel panel-default">
      <header class="panel-heading">
        <center>
        <h4> Forum post </h4>
      </center>
      </header>
      <section class="row panel-body">
        <center>
        <?php foreach($this->m_plugins->lastForumPost()->result() as $last) { ?>
          <section class="row">
            <a href="<?= base_url() ?>forums/thread/<?= $last->id ?>"> <?= $last->title ?> </a>
            <br/>
            <h5 class="text-info"><?= $last->author ?></h5>
            <hr>
          </section>
        <?php } ?>
        </center>
      </section>
  </section>

</div> <!-- End Col lg 3 -->

</div>
</div> <!-- End container -->
