<div class="row">
  <div class="content-box column small-12 medium-8">
    <?php foreach($this->home_model->getNews()->result() as $list) { ?>
      <div class="content-box-header column small-12">
          <div class="title-text">
              <?= $list->news_title ?>
          </div>
          <div class="title-date">
            by <small><?= $list->news_author ?></small> at <?= date('Y-m-d', $list->post_date);?>
          </div>
      </div>
      <div class="content-box-content column small-12">
          <div class="content-text">
              <?= $list->news_content ?>
          </div>

      </div>


    <?php } ?>
  </div>
	<div class="content column small-12 medium-5 large-4">
		<div class="content-box-sidebar column small-12">
    <div class="discord-widget"></div>
		</div>
	</div>
</div>
