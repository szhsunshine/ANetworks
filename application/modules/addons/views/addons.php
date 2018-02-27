<div class="about" id="about">
  <div class="container bg-addons">
    <div class="welcome">
      <div class="agileits-title">
        <h2>Select your expansion</h2>
        </div>
<br/>
    </div>

<div class="row">
      <div class="col-lg-4">
        <div class="panel panel-addons">
          <div class="panel-body panel-body-white">
            <?php foreach($this->addon_model->getCategory()->result() as $cat) { ?>
            <section class="panel-title text-primary">
                <a href="<?= base_url()?>addons/cat/<?= $cat->id ?>"><img src="<?= base_url()?><?= $cat->icon ?>" width="32" height="32" /> <?= $cat->category  ?></a>
            </section>
            <br/>
            <?php } ?>
          </div>
        </div>

      </div>

<div class="col-md-8">
  <center>
    <h4>Filtrer addons</h4>
  </center>
<form class="form-inline">
  <div class="form-group col-md-6 mb-4">
    <select class="form-control" id="exampleFormControlSelect1" onchange="location = this.value;" id="select">
      <option>Select expansion</option>
      <option value="<?= base_url() ?>addons/1">Vanilla</option>
      <option value="<?= base_url() ?>addons/2">TBC</option>
      <option value="<?= base_url() ?>addons/3">TLK</option>
      <option value="<?= base_url() ?>addons/4">CATA</option>
      <option value="<?= base_url() ?>addons/5">MOP</option>
      <option value="<?= base_url() ?>addons/6">WOD</option>
      <option value="<?= base_url() ?>addons/6">Legion</option>
    </select>
  </div>
  <div class="form-group col-md-6 mb-4">
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Select versión</option>
    </select>
  </div>
</form>
<br />
<br />
<br />
<center>
  <h4>List addons</h4>
</center>
<br />
<?php foreach ($results as $addons) { ?>

  <div class="card">
  <div class="card-header text-center text-white bg-dark">
    <?= $addons->addon_name ?>
  </div>
  <div class="card-body">
    <p class="card-text"><?= substr($addons->addon_description, 0, 250) ?></p>
    <div class="text-right">
    <a href="<?= base_url()?>addons/view/<?= $addons->id ?>" class="btn-sm btn-primary">Go to <?= $addons->addon_name ?></a>
    <br />
    <br />
    </div>
  </div>
  <div class="card-footer text-muted text-right">
    <i class="fa fa-download"></i> <small> <?= $addons->downloads ?> | </small>
    <i class="fa fa-calendar" aria-hidden="true"></i> <small> <?= date('Y-m-d', $addons->updated) ?> </small>
  </div>
</div>


<?php } ?>

<?php if (isset($links)) { ?>
    <?php echo $links ?>
<?php } ?>
</div>
</div>
</div>
</div>
