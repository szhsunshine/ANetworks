<div class="container">
  <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
            <h1>Welcome</h1>
          </div>
        </div>
      </div>

  	<div class="row">
      <ul class="breadcrumb">
      <li class="active">Home</li>
    </ul>
<div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Important!</strong> The forums are in development, they are in an alpha version so several features are disabled.
</div>

<?php foreach($this->discussion_model->getCategoryFather()->result() as $category) { ?>
    <section class="panel panel-info">
        <header class="panel-heading">
          <h4><?= $category->category ?></h4>
        </header>

        <?php foreach($this->discussion_model->getCategorys($category->id)->result() as $cat) {
        ?>
        <section class="row panel-body">
        <section class="col-md-6">
          <h4> <a href="forums/topic/<?= $cat->id ?>"><i class="fa fa-th-list text-primary"> <?= $cat->category ?>  </i> </h4>
          <h6><?= $cat->description ?> </h6> </a>

        </section>
        <section class="col-md-2">
          <ul id="post-topic">
            <li class="list-unstyled"> <p class="text-primary"><i class="fa fa-share" aria-hidden="true"></i> Topics: <?= $this->discussion_model->counThreads($cat->id); ?> </p> </li>
            <li class="list-unstyled"> <p class="text-primary"><i class="fa fa-reply" aria-hidden="true"></i> Reply: <?= $this->discussion_model->counPost($cat->id); ?> </p> </li>
          </ul>
        </section>
        <section class="col-md-3">
          <?php foreach($this->discussion_model->lastPost($cat->id)->result() as $lastpost) { ?>
          <h5> <a href="#"><i class="fa fa-link"> </i> <?= $lastpost->title ?> </a></h5> <hr>
          <a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $lastpost->author ?> </a>
           (<a class"nounderline"><i class="fa fa-calendar text-primary"></i><?= date('Y-m-d', $lastpost->date);?></a>)
        <?php } ?>
        </section>
      </section>
      <hr>
    <?php } ?>
    </section>
  <?php } ?>
</div>
</div> <!-- End container -->
