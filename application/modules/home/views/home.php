<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-6">
        <h1><?= $this->lang->line('home_welcome'); ?></h1>
        <p class="lead"><?= $this->lang->line('home_lead'); ?></p>
      </div>
    </div>
  </div>


<div class="row">
  <div class="col-md-8">

    <div class="panel panel-info">

  <div class="panel-body">

    <ul class="breadcrumb">
      <li class="active"><?= $this->lang->line('last_news'); ?></li>
    </ul>
    <?php foreach($this->home_model->getNews()->result() as $list) { ?>

    <h3><?= $list->news_title ?></h3>
    <p align="right"><small><?= $this->lang->line('created'); ?> <cite title="Source Title"><?= $list->news_author ?></cite> <?= $this->lang->line('at'); ?>  <?= date('Y-m-d', $list->post_date);?></small></p>
    <hr>
    <p><?= $list->news_content ?> </p>

    <hr>
    <div class="divider"></div>
    <div class="row">
     <div class="col-xs-6"><?= $this->lang->line('Comments'); ?> <span class="badge"> <?= $this->home_model->totalComments($list->id) ?></span></div>
     <div class="col-xs-6"><a href="home/view?id=<?= $list->id ?>"><?= $this->lang->line('read_more'); ?>.</a></div>
    </div>
    <?php } ?>
    <br />
    <br />
            <div class="panel-footer">
              <ul class="pager">
                <li class="previous disabled"><a href="#"><?= $this->lang->line('older'); ?></a></li>
                <li class="next"><a href="#"><?= $this->lang->line('newer'); ?></a></li>
              </ul>
            </div>
    </div>
  </div>
</div>

  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading"><?= $this->lang->line('last_5_news'); ?></div>
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
