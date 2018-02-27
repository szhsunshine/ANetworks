

  <?php foreach($this->home_model->getIdNews($idnews)->result() as $new) { ?>
    <!-- markets -->
    <div class="markets bg-dark" id="markets">
      <div class="container">
        <div class="agileits-title">
          <h3><?= $new->news_title ?></h3>
        </div>

      </div>
    </div>
    <!-- //markets -->

<div class="container">
  <div class="row" >
  <div class="col-sm-8">
  <div class="card">
    <div class="card-header bg-dark text-white">
        <?= $new->news_short ?>
        <br/>
        <br/>
        <br/>
    </div>
    <div class="card-body bg-default">
      <p class="card-text">
          <?= $new->news_content ?></p>
    </div>
    <div class="card-footer bg-dark text-white">
      Posted <?= date('Y-m-d', $new->post_date);?><br/>
      <hr>
      <div class="col-md-12">
        <center>
          <ul class="social-network social-circle">
              <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
              <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </center>
</div>

    </div>
  </div>
</div>
  <div class="col-sm-4">

            <div class="card hovercard bg-dark">
              <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="http://lorempixel.com/100/100/people/2/">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#"><?= $new->news_author ?></a>
                    </div>
                    <!-- Comming soon feature -->
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>

        </div>
</Div>
</div>
<?php } ?>


<!-- Coments -->
