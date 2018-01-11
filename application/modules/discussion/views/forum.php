<div class="container">
<br/>
  	<div class="row">
      <ul class="breadcrumb">
      <li class="active"><?= $this->lang->line('menu_home') ?> </li>
    </ul>
<div class="alert alert-dismissable alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <?= $this->lang->line('forums_development') ?>
</div>

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
          <a class"nounderline"><i class="fa fa-share"></i> <?= $this->discussion_model->counThreads($cat->id); ?> </a> /
          <a class"nounderline"><i class="fa fa-reply"></i> <?= $this->discussion_model->counPost($cat->id); ?> </a>
        </section>
        <section class="col-md-3">
          <?php foreach($this->discussion_model->lastPost($cat->id)->result() as $lastpost) { ?>
          <small> <a href="forums/thread/<?= $lastpost->id ?>"><i class="fa fa-link"> </i> <?= substr($lastpost->title, 0, 30) ?> </a></small><br/>
          <a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $lastpost->author ?> </a>
           (<a class"nounderline"><i class="fa fa-calendar text-primary"></i> <?= date('Y-m-d', $lastpost->date);?></a>)
        <?php } ?>
        </section>
      </section>
      <hr>
    <?php } ?>
    </section>
  <?php } ?>

</div>
</div> <!-- End container -->
