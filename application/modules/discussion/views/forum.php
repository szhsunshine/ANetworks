<div class="container">
  <div class="page-header jumbotron" id="banner">
            <div class="row">
              <div class="col-lg-6">
                <h3>Welcome to the our forums!</h3>
                <p class="text-primary">You have to forget me, Tirion! If the world is to live free from the tyranny of fear, it must not know what has happened here today.</p>
              </div>
              <div class="col-lg-6">
                <p class="text-primary">¿Eres nuevo en nuestros foros?</p>
                <button type="button" class="btn btn-default btn-lg btn-block">Registrate ahora</button>
                <p class="text-primary">¿Ya tienes cuenta?</p>
                <button type="button" class="btn btn-default btn-lg btn-block">Conectate y empieza a opinar</button>

                <!-- Opcional -->


                  <p class="text-primary">¿Quieres formar parte del equipo de ANetwork?</p>
                  <button type="button" class="btn btn-default btn-lg btn-block">Manda tu solicitud ahora</button>
              </div>
            </div>
  </div>


<div class="col-lg-9">
<div class="panel panel-default">
    <?php if(empty($_GET["cat"])) { ?>
    <div class="panel-heading">
      <h3 class="panel-title">Last Ten Discussions</h3>
    </div>
  <div class="panel-body">
  <table class="table table-striped table-hover ">
  <div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Important!</strong> Remember that to browse our forums you must do it from the categories section, this only shows the topics currently created by our users in a simplified way.
</div>
  <?php foreach($this->discussion_model->lastest()->result() as $lastest) { ?>
    <tbody>
      <tr>
        <td><a href="<?= $lastest->id ?>"><?= $lastest->title ?></a></td>
        <td><?= $lastest->author ?></td>
      </tr>

    </tbody>
  <?php } ?>
  </table>
</div>
<?php } else {
  $cat = $_GET['cat'];
?>
<?php
foreach($this->discussion_model->getIdCategory($cat)->result() as $category) { ?>
    <div class="panel-heading">
      <h3 class="panel-title"><?= $category->category ?></h3>
    </div>
<?php } ?>
  <div class="panel-body">
  <table class="table table-striped table-hover">
  <?php
  foreach($this->discussion_model->getThreadId($cat)->result() as $threads) { ?>
    <tbody>
      <tr <?php if ($threads->announcement == 1 ) echo 'class="info"' ; ?>>
        <td> <!-- Support fa fa-icons -->
          <i class="fa fa-bullhorn fa-2x" aria-hidden="true"></i>
        </td>
        <td>
          <a href="view?thread=<?= $threads->id ?>" class="nounderline"><?= $threads->title ?></a>
          <br/>
          <small> <?= $threads->description ?></small>
        </td>
        <td><?= $threads->author ?></td>
        <td>N/A</td>
        <td>N/A</td>
        <td><?= $threads->date ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>
<center>
  <!-- <ul class="pagination" disabled>
    <li class="disabled"><a href="#">«</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">»</a></li>
  </ul> -->
</center>

</div>
</div>


<div class="col-lg-3">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Categories</h3>
    </div>
<div class="panel-body">
  <ul class="nav nav-pills nav-stacked">
    <?php foreach($this->discussion_model->getCategory()->result() as $cat) { ?>
    <li ><a href="?cat=<?=$cat->id ?>"><?= $cat->category ?></a></li>
  <?php } ?>
  </ul>

</div>
</div>
</div>
</div> <!-- End container -->
