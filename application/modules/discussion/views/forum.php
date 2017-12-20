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


<div class="col-lg-8">
<div class="panel panel-default">
    <?php if(empty($_GET["cat"])) { ?>
    <div class="panel-heading">
      <h3 class="panel-title">Last 5 Discussions</h3>
    </div>
  <div class="panel-body">
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Thread</th>
        <th>Category</th>
        <th>Replies</th>
        <th>Staff reply</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href=""></a></td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>

    </tbody>
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
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Thread</th>
        <th>Category</th>
        <th>Replies</th>
        <th>Staff reply</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href=""></a></td>
        <td>Column content</td>
        <td>Column content</td>
        <td>Column content</td>
      </tr>

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


<div class="col-lg-4">
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
