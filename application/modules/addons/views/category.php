        <div class="container">
          <div class="page-header" id="banner">
            <div class="row">
              <div class="col-lg-6">
                <h3>Welcome, Hero of Azeroth!</h3>
              </div>
            </div>
          </div>


<div class="col-lg-3">

		<div class="panel panel-addons">

			<div class="panel-body-white">
	<?php foreach($this->addon_model->getCategory()->result() as $cat) { ?>
	<ul class="text-primary" style="max-width: 300px;">
		<li><a href="<?= base_url() ?>addons/cat/<?= $cat->id ?>"><?= $cat->category ?> </a></li>
	</ul>
<?php } ?>
</div>
	</div>
</div>


<div class="col-lg-9">
	<div class="panel panel-addons">
		<div class="panel-heading">
					<section class="panel-title text-primary">
                      <time class="pull-right">
												<form class="navbar-form navbar-left">
      									<input class="form-control col-lg-8" placeholder="Search" type="text">
    										</form>
                      </time>
                      <section class="pull-left" id="id">
                	       <?php foreach($this->addon_model->categorySelected($idcategory)->result() as $cat) { ?>
                        <abbr title="count of posts in this topic">Filtrer by Category | <?= $cat->category ?></abbr>
                      </section>
					</section>
					<br />
					<br />
				</div>

        <?php } ?>
	  <div class="panel-body panel-body-white">

			<form method="post">
 <div class="col-lg-4">
	 <select class="form-control" name="expansion" onchange="location = this.value;" id="select">
     <option  value="<?= base_url() ?>addons/1">Vanilla</option>
     <option  value="<?= base_url() ?>addons/2">Burning Crusade</option>
     <option  value="<?= base_url() ?>addons/3">Wrath of the Lich King</option>
     <option  value="<?= base_url() ?>addons/4">Cataclysm</option>
     <option  value="<?= base_url() ?>addons/5">Mist of Pandaria</option>
     <option  value="<?= base_url() ?>addons/6">Warlords of Draenor</option>
     <option  value="<?= base_url() ?>addons/7">Legion</option>
	 </select>
</div>


 <div class="col-lg-4">
	 <select class="form-control" name="filtrer-by" id="select">
     <option value="0">No filtrer selected</option>
     <option value="1">Popularidad</option>
     <option value="2">Most Downloaded</option>
     <option value="3">Recent update</option>
	 </select>
</div>
        <button type="submit" class="btn btn-primary">Filtrer</button>
			</form>
	  </div>
	</div>



<?php foreach($this->addon_model->grabCategory($idcategory)->result() as $addons) { ?>
	<div class="panel panel-addons">
	  <div class="panel-body panel-body-white">
      <section class="panel-title text-primary">
                          <section class="pull-left" id="id">
                            <a href="<?= base_url()?>addons/view/<?= $addons->id ?>"><?= $addons->addon_name ?></a>
                          </section>
    					</section>
    					<br />
    					<br />
				<section class="col-md-8 ">
        <p class="list-item__stats">
            <i class="fa fa-download"></i>
            <small> <?= $addons->downloads ?> |
          </small>
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <small> <?= date('Y-m-d', $addons->updated) ?>
          </small>
        </p>
					<?= substr($addons->addon_description, 0, 50) ?>
				</section>

        <section class="col-md-4 ">
          <a href="view/<?= $addons->id ?>" class="btn btn-primary btn-sm nounderline">DOWNLOAD</a>
        </section>
	  </div>
	</div>
<?php } ?>


</div>

</div>
