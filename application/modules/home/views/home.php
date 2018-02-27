<div class="about bg-home-intro" id="about">
  <div class="container">
    <div class="welcome">
      <div class="agileits-title">
        <h2>Welcome to ANetwork</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at placerat ante. Praesent nulla nunc, pretium dapibus efficitur in, auctor eget elit. Lorem ipsum dolor sit amet</p>
      </div>
    </div>
  </div>
</div>

<!-- blog -->
<div id="blog" class="blog">
  <div class="container">
    <div class="agileits-title">
      <h3>Our Blog</h3>
    </div>
<div class="index-content">
    <div class="row">
    <?php if (isset($result)) { ?>
    <?php foreach ($result as $list) { ?>
      <a href="">
              <div class="col-sm-6">
                <div class="card">
    <img class="card-img-top" src="http://cevirdikce.com/proje/hasem-2/images/finance-2.jpg" alt="Card image cap">
                    <div class="card-header">
                        <h4><?= $list->news_title ?></h4>
                    </div>
                    <div class="card-body">
                         <p class="card-text"><?= $list->news_short ?></p>
                         <div class="text-right">
                         <a href="" class="blue-button">Read More</a>
                         </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-muted col-sm-8">
                        2 days ago

                      </div>

                    </div>
                </div>
          </div>
      </a>
          <?php } ?>
    </div>
  <?php } else { ?>
    <br/>
    <div class="alert alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Oh nooo!</strong> It seems that we have found any news.
</div>
  <?php } ?>
    <?php if (isset($links)) { ?>
        <?php echo $links ?>
    <?php } ?>
  </div>
</div>
</div>
<!-- //blog -->

<div class="about bg-home-intro" id="team">
  <div class="container">
    <div class="welcome">




    </div>
    </div>
  </div>
