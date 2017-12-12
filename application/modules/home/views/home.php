<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-6">
        <h1>Welcome</h1>
        <p class="lead">To a new theme for ANetwork.</p>
      </div>
    </div>
  </div>

  <div class="alert alert-dismissable alert-warning">
<button type="button" class="close" data-dismiss="alert">×</button>
<h4>Warning!</h4>
<p>Your admin file is not written</a>.</p>
</div>

<div class="row">
  <div class="col-md-8">

    <div class="panel panel-info">

  <div class="panel-body">


    <?php foreach($this->home_model->getNews()->result() as $list) { ?>
    <h3><?= $list->news_title ?></h3>
    <p align="right"><small>Created by <cite title="Source Title"><?= $list->news_author ?></cite> at  <?= date('Y-m-d', $list->post_date);?></small></p>
    <hr>
    <p><?= $list->news_content ?> </p>

    <hr>
    <div class="divider"></div>
    <div class="row">
     <div class="col-xs-6">Comments <span class="badge"> <?= $this->home_model->totalComments($list->id) ?></span></div>
     <div class="col-xs-6"><a href="home/view?id=<?= $list->id ?>">Read more.</a></div>
    </div>
    <?php } ?>
    <br />
    <br />
            <div class="panel-footer">
              <ul class="pager">
                <li class="previous disabled"><a href="#">← Older</a></li>
                <li class="next"><a href="#">Newer →</a></li>
              </ul>
            </div>
    </div>
  </div>
</div>

  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">Last news</div>
    <div class="panel-body">
        <?php foreach($this->home_model->getLastnews()->result() as $lastest) { ?>
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li><a href="home/view?id=<?= $lastest->id ?>"><?= $lastest->news_title ?> <small>(<?= $lastest->news_author ?>)</small></a></li>
          </ul>
        <?php } ?>

    </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">Last news</div>
    <div class="panel-body">
        <?php foreach($this->home_model->getLastnews()->result() as $lastest) { ?>
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li><a href="home/view?id=<?= $lastest->id ?>"><?= $lastest->news_title ?> <small>(<?= $lastest->news_author ?>)</small></a></li>
          </ul>
        <?php } ?>

    </div>
    </div>
  </div>

</div>
