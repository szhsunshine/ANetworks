<div class="container">
<h1>Latest News</h1>


<div class="col-md-8">
<?php foreach($this->home_model->getNews()->result() as $list) { ?>
<div class="latest-news panel panel-primary">
    <div class="panel-heading">
      <div class="text-center">
          <div class="row">
              <div class="col-sm-8">
                  <h3 class="pull-left"><?= $list->news_title ?></h3>
              </div>
              <div class="col-sm-3">
                  <i class="pull-right text-info">
                      <small><em><?= date('Y-m-d', $list->post_date);?> <BR> By <?= $list->news_author ?></em></small>
                  </i>
              </div>
          </div>
      </div>


    </div>

    <div class="panel-body">
        <?= $list->news_content ?>
    </div>
    <div class="panel-footer">
    </div>
</div>
<?php } ?>
</div>
<div class="col-md-4">
<div class="latest-news panel panel-primary">
    <div class="panel-heading">Latest Articles</div>
    <div class="panel-body" style="padding-left: 0!important; padding-right: 0!important;">
        <?php foreach($this->home_model->getLastnews()->result() as $lastest) { ?>
        <ul class="list-group">
          <li class="list-group-item"><i class="fa fa-sticky-note"></i> <a href="<?= base_url() ?>/home/news/<?= $lastest->id ?>"><?= $lastest->news_title ?></a></li>
        </ul>
      <?php } ?>
    </div>
</div>
</div>
</div>
