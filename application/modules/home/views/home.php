
<div class="row">
    <?php foreach($this->home_model->getNews()->result() as $list) { ?>
  <div class="content-box column small-12 medium-8">
      <div class="content-box-header column small-12">
          <div class="title-text">
              <?= $list->news_title ?>
          </div>
          <div class="title-date">
            by <small><?= $list->news_author ?></small> at <?= $list->post_date ?>
          </div>
      </div>
      <div class="content-box-content column small-12">
          <div class="content-text">
              <?= $list->news_content ?>
          </div>

      </div>
  </div>
    <?php } ?>
	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<iframe src="https://discordapp.com/widget?id=355021208246288384&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
		</div>
	</div>
</div>
