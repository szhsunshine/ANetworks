<div class="container">


  	<div class="row">
          <section class="row panel-body">
<section class="col-lg-10">
<?php foreach($this->discussion_model->categoryName($idtopic)->result() as $category) { ?>
      <ul class="breadcrumb">
      <li><a href="<?= base_url();  ?>forums">Home </a></li>
      <li class="active"><?= $category->category ?></li>
    </ul>
    </section>
    <section class="col-lg-2">
      <?php if ($this->m_data->isLoggedIn()) { ?>
        <a class="btn btn-primary" href="<?= base_url() ?>forums/topic/create/<?= $category->id ?>"> Create new topic </a>
      <?php } ?>
    </section>
  <?php } ?>
    </section>
    <section class="panel panel-info">
    <?php foreach($this->discussion_model->getTopics($idtopic)->result() as $topic) { ?>
        <section class="row panel-body">
        <section class="col-md-6">
          <h5> <a href="<?= base_url() ?>forums/thread/<?= $topic->id ?>"><i class="text-primary"> <?= substr($topic->title, 0, 40) ?>  </i> </h5></a>
        </section>
        <section class="col-md-2">
          <ul id="post-topic">
            <li class="list-unstyled"> <p class="text-primary"><i class="fa fa-reply" aria-hidden="true"></i> Reply: <?= $this->discussion_model->counReply($topic->id); ?> </p> </li>
          </ul>
        </section>
        <section class="col-md-3">
     <?php foreach($this->discussion_model->lastReply($topic->id)->result() as $last)  {?>
       <a class"nounderline">By <i class="fa fa-user text-primary"></i> <?= $last->author ?> </a>
       (<a class"nounderline"><i class="fa fa-calendar text-primary"></i> <?= date('Y-m-d', $last->date); ?></a>)
     <?php } ?>
        </section>
        <hr>
      </section>
    <?php } ?>
    </section>
</div>
</div> <!-- End container -->
