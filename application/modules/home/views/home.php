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
    <div class="divider"> </div>
    <p><?= $list->news_content ?> <a href="
        <?= $list->id ?>">More</a>. </p>
        <?php } ?>
            <div class="panel-footer">
              <ul class="pager">
                  <li><a href="#">Previous</a></li>
                  <li><a href="#">Next</a></li>
              </ul>
            </div>
    </div>
  </div>
</div>

  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">Our discord server</div>
    <div class="panel-body">
      <iframe src="https://discordapp.com/widget?id=381298424827478027&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
    </div>
    </div>
  </div>

</div>
