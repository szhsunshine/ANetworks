<div class="container bg-addons">

<?php foreach($this->discussion_model->categoryName($idtopic)->result() as $category) { ?>
  <hr>
  <h4> <?= $category->category ?> </h4>
  <hr>
  <table class="table table-noborder">
      <nav class="breadcrumb">
          <a class="breadcrumb-item" href="<?= base_url('forums');  ?>">Home </a>
          <a class="breadcrumb-item active" href="#"><?= $category->category ?> </a>
      </nav>

      <?php } ?>

      <div class="text-right">
      <?php if ($this->m_data->isLoggedIn()) { ?>
        <a class="btn-lg btn-info" href="<?= base_url() ?>forums/topic/create/<?= $category->id ?>"> Create new topic </a>
      <?php } ?>
      <br />
      <br />
      </div>
<!-- Get Topic Pinned -->
            <tbody class="bg-dark text-white">

      <?php foreach($this->discussion_model->getTopicsPinned($idtopic)->result() as $topics) { ?>

        <tr>
          <th scope="row"><i class="fa fa-exclamation text-warning" aria-hidden="true"></i></th>
          <th scope="row"><a class="text-warning" href="<?= base_url('');  ?>forums/thread/<?= $topics->id ?>"> <?= substr($topics->title, 0, 40) ?>  </a><br/>
          <small><p class="text-muted">Created by <?= $topics->author ?> at <?= date('Y-m-d', $topics->date); ?> </p></small>
          </th>
          <td><i class="fa fa-comments-o text-warning" aria-hidden="true"></i> Reply: <?= $this->discussion_model->counReply($topics->id); ?> </td>

            <?php if (!$this->discussion_model->lastReply($topics->id)->num_rows()) {?>
              <td><a class"nounderline"><i class="fa fa-user text-warning"></i><?= $topics->author ?></td>
              <td><a class"nounderline"><i class="fa fa-calendar text-warning"></i> <?= date('Y-m-d', $topics->date); ?></td>
            <?php } else { ?>
            <?php foreach($this->discussion_model->lastReply($topics->id)->result() as $lasts)  {?>
                <td><a class"nounderline"><i class="fa fa-user text-warning"></i> <?= $lasts->author ?> </a> </td>
                <td><a class"nounderline"><i class="fa fa-calendar text-warning"></i> <?= date('Y-m-d', $lasts->date); ?></a></td>
            <?php } ?>

            <?php } ?>
        </tr>
      <?php } ?>
</tbody>
<!-- Get Topics NOT PINNED -->
<tbody>
  <?php if (!$this->discussion_model->getTopics($idtopic)->num_rows()) {?>
    <div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">It seems that there is no content!</h4>
    <p>Be the first to create content, and share it with the community that makes up this site, earn post and prestige doing it.</p>

    <?php if ($this->m_data->isLoggedIn()) { ?>
    <a class="btn btn-primary" href="<?= base_url() ?>forums/topic/create/<?= $category->id ?>"> Create new topic </a>
  <?php }else{ ?>
    <p> It seems that you are not registered or your session is not started, please register or login. </p>
  <?php } ?>
  </div>
  <?php } else { ?>
    <?php foreach($this->discussion_model->getTopics($idtopic)->result() as $topic) { ?>
      <tr>
        <th scope="row"><i class="fa fa-newspaper-o text-primary" aria-hidden="true"></i></th>
        <th scope="row"><a href="<?= base_url('');  ?>forums/thread/<?= $topic->id ?>"> <?= substr($topic->title, 0, 40) ?>  </a><br/>
        <small><p class="text-muted">Created by <?= $topic->author ?> at <?= date('Y-m-d', $topic->date); ?> </p></small>
        </th>
        <td><i class="fa fa-comments-o" aria-hidden="true"></i> Reply: <?= $this->discussion_model->counReply($topic->id); ?> </td>
        <?php if (!$this->discussion_model->lastReply($topic->id)->num_rows()) {?>
          <td><a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $topic->author ?></td>
          <td><a class"nounderline"><i class="fa fa-calendar text-primary"></i> <?= date('Y-m-d', $topic->date); ?></td>
        <?php } else { ?>
          <?php foreach($this->discussion_model->lastReply($topic->id)->result() as $last)  {?>
                      <td>  <a class"nounderline"><i class="fa fa-user text-primary"></i> <?= $last->author ?> </a>    </td>
                <td>  <a class"nounderline"><i class="fa fa-calendar text-primary"></i> <?= date('Y-m-d', $last->date); ?></a>   </td>
          <?php } ?>
    <?php } ?>
      </tr>
    <?php } ?>
  <?php } ?>
</tbody>

  </table>


<br />
<br />
<br />
<!-- End forums display -->


</div>
