
<div class="row">
  <div class="content-box column small-12">
    <?php foreach($this->home_model>getNews()->result() as $list) { ?>
      <div class="content-box-header column small-12">
          <div class="title-text">
              <?= $list->news_title ?> by <?= $list->news_author ?>
          </div>
          <div class="title-date">
              <?= $list->post_date ?>
          </div>
      </div>
      <div class="content-box-content column small-12">
          <div class="content-text">
              <?= $list->news_content ?>
          </div>
      </div>
  </div>
	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
			<iframe src="https://discordapp.com/widget?id=355021208246288384&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
		</div>
	</div>
</div>
