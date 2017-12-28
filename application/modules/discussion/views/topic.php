<div class="container">
  <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
            <h1>Welcome</h1>
          </div>
        </div>
      </div>

  	<div class="row">
<div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Important!</strong> The forums are in development, they are in an alpha version so several features are disabled.
</div>
          <section class="row panel-body">
<section class="col-lg-10">
      <ul class="breadcrumb">
      <li><a href="<?= base_url();  ?>forums">Home </a></li>
      <?php foreach($this->discussion_model->categoryName($idtopic)->result() as $category) { ?>
      <li class="active"><?= $category->category ?></li>
    </ul>
    </section>
    <section class="col-lg-2">
        <a class="btn btn-primary" href="<?= base_url() ?>forums/topic/create/<?= $category->id ?>"> Create new topic </a>
    </section>
  <?php } ?>
    </section>
    <section class="panel panel-info">
    <?php foreach($this->discussion_model->getTopics($idtopic)->result() as $topic) { ?>
        <section class="row panel-body">
        <section class="col-md-6">
          <h4> <a href="<?= base_url() ?>forums/thread/<?= $topic->id ?>"><i class="text-primary"> <?= substr($topic->title, 0, 40) ?> ..  </i> </h4></a>


        </section>
        <section class="col-md-2">
          <ul id="post-topic">
            <li class="list-unstyled"> <p class="text-primary"><i class="fa fa-reply" aria-hidden="true"></i> Reply: <?= $this->discussion_model->counReply($topic->id); ?> </p> </li>
          </ul>
        </section>
        <section class="col-md-3">
     <?php foreach($this->discussion_model->lastReply($topic->id)->result() as $last)  {?>

   <a href="#"><i class="fa fa-link"> </i> <?= substr($last->msg, 0, 15); ?> ... </a> <br />
   <a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $last->author ?> </a>
    (<a class"nounderline"><i class="fa fa-calendar text-primary"></i><?= date('Y-m-d', $last->date); ?></a>)
  <?php } ?>
        </section>
        <hr>
      </section>
    <?php } ?>
    </section>
</div>
</div> <!-- End container -->
