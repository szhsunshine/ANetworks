<!-- Forums display -->


<div class="container bg-addons">

    <?php if (!$this->discussion_model->getCategoryFather()->num_rows()) {?>
 No hay foros
<?php } else { ?>
<?php foreach($this->discussion_model->getCategoryFather()->result() as $category) { ?>

  <hr>
  <h4> <?= $category->category ?> </h4>
  <hr>
  <table class="table table-noborder">
    <thead class="thead-dark">
      <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Threads</th>
        <th scope="col">Post</th>
        <th scope="col">Last Post</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->discussion_model->getCategorys($category->id)->result() as $cat) { ?>
      <tr>
        <th scope="row">
        </th>
        <th scope="row"><a href="forums/topic/<?= $cat->id ?>"><?= $cat->category ?></a><br/>
          <?= $cat->description ?>
          <br />

          <?php foreach($this->discussion_model->GetSubforums($cat->id)->result() as $subforum) { ?>
          <a href="forums/topic/<?= $subforum->id ?>" class="btn-dark btn-sm nounderline"><?= $subforum->category ?></a>
          <?php } ?>
        </th>
        <td><?= $this->discussion_model->counThreads($cat->id); ?></td>
        <td><?= $this->discussion_model->counPost($cat->id); ?></td>
        <td>

          <?php foreach($this->discussion_model->lastPost($cat->id)->result() as $lastpost) { ?>
                <div class="text-right">
                <small> <a href="forums/thread/<?= $lastpost->id ?>"><i class="fa fa-link"> </i> <?= substr($lastpost->title, 0, 30) ?> </a></small><br/>
                <a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $lastpost->author ?> </a><br/>
                <a class"nounderline"><i class="fa fa-calendar text-primary"></i> <?= date('Y-m-d', $lastpost->date);?></a>
              </div>
                <?php } ?>

      </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

  <?php } ?>


    <?php } ?>


<!-- End forums display -->

<!-- Statics display -->

<div class="card text-center">
  <div class="card-header bg-dark text-white h5">
    Statics
  </div>
  <div class="card-body">

  </div>
  <div class="card-footer bg-dark text-white">
    Users online :
    <?php foreach($this->discussion_model->isOnline()->result() as $online) { ?>
    <?= $online->username ?>
    <?php } ?>
    <br />
      Groups :
    <?php foreach($this->discussion_model->userGroups()->result() as $gp) { ?>
     <?= $gp->group_name ?>,
    <?php } ?>
  </div>
</div>

<br/>
<!-- End statics display -->

</div>
